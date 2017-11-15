<?php

namespace miner_junction\Http\Controllers\Auth;

use miner_junction\User;
use miner_junction\SocialProvider;
use miner_junction\Mail\verifyEmailToken;
use miner_junction\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Str;
use Mail;
use Session;
use Socialite;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \miner_junction\User
     */
    protected function create(array $data)
    {
        Session::flash('status', 'Registered!, but verify your email to activate your account');
        $user = User::create([
            'name' => $data['name'],
            'phone_number' => $data['phone_number'],
            'email' => $data['email'],
            'verify_token' => Str::random(40),
            'password' => bcrypt($data['password']),
        ]);

        $thisUser = User::findOrFail($user->id);
        $this->sendVerifyEmail($thisUser);

        return $user;
    }

    public function sendVerifyEmail($thisUser)
    {
        mail::to($thisUser['email'])->send(new verifyEmailToken($thisUser));
    }

    public function sendEmailDone($email, $verify_token)
    {
        $user = User::where(['email' => $email, 'verify_token' => $verify_token])->first();

        if ($user) {
            User::where(['email' => $email, 'verify_token' => $verify_token])->update(['status' => 1, 'verify_token' => NULL]);
            return redirect(route('login'));            
        } else {
            return 'User not found';
        }
    }

    /**
     * Redirect the user to the provider page.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from provider.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        try
        {
            $socialUser = Socialite::driver($provider)->user();
        }
        catch(\Exception $e)
        {
            return redirect('/');
        }

        // Check if we have logged provider
        $socialProvider = SocialProvider::where('provider_id', $socialUser->getId())->first();
        if(!$socialProvider)
        {
            // Create a new user and provider
            $user = User::firstOrCreate(
                ['email' => $socialUser->getEmail()],
                ['name' => $socialUser->getName()]                
            );

            $user->socialProviders()->create(
                ['provider_id' => $socialUser->getId(), 'provider' => $provider]
            );
        }
        else
        {
            $user = $socialProvider->user;
        }

        auth()->login($user);

        return redirect('/home');
    }

    public function sendOTP(Request $request)
    {
        $phone_number = $request->get('phone_number');
        $nexmo = app('Nexmo\Client');
        $verification = $nexmo->verify()->start([
            'number' => '91' . $phone_number,
            'brand'  => 'Miner Junction'
        ]);
        if($verification)
        {
            Session::put('OTPverification', $verification);
            Session::put('phone_number', $phone_number);          
            return view('auth.verify-otp', ["phone_number" => $phone_number]);
        }
        return redirect()->route('register');
    }

    public function cancelOTP($resend = false)
    {
        if(Session::has('OTPverification') && Session::has('phone_number'))
        {
            $nexmo = app('Nexmo\Client');
            $verification = Session::get('OTPverification');
            $cancel = $nexmo->verify()->cancel($verification);           
            Session::forget('OTPverification');
            if($resend) 
            {
                return true;    
            }
            Session::forget('phone_number'); 
        }
        return redirect()->route('register');
    }

    public function resendOTP()
    {
        if($this->cancelOTP(true))
        {
            if(Session::has('phone_number'))
            {
                $phone_number = Session::get('phone_number');
                $nexmo = app('Nexmo\Client');
                $verification = $nexmo->verify()->start([
                    'number' => '91' . $phone_number,
                    'brand'  => 'Miner Junction'
                ]);
                if($verification)
                {
                    Session::put('OTPverification', $verification);
                    Session::put('phone_number', $phone_number);
                }
            }
        }
    }

    public function verifyOTP(Request $request)
    {
        if(Session::has('OTPverification') && Session::has('phone_number'))
        {
            $otp = $request->get('otp');
            $nexmo = app('Nexmo\Client');
            $verification = Session::get('OTPverification');
            $phone_number = Session::get('phone_number');
            if($nexmo->verify()->check($verification, $otp))
            {
                Session::forget('OTPverification');
                Session::forget('phone_number');
                return view('auth.register', ["phone_number" => $phone_number]);
            }
        }
        return redirect()->route('register');
    }
}
