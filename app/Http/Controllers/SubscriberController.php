<?php

namespace miner_junction\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use miner_junction\Http\Controllers\Controller;
use miner_junction\Subscriber;

class SubscriberController extends Controller
{
    /**
     * Display listing of all the subscribers.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $subscribers= Subscriber::orderBy('id','DESC')->paginate(5);
        return view('Subscriber.index',compact('subscribers'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    /**
     * Show form for registering a subscriber.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Subscriber.create');
    }
    /**
     * Store a newly created subscriber in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $name = $request->get('full_name');
        $email = $request->get('email');
        $code = $request->get('subscription_code');
        $this->validate($request, [
            'subscription_code' => 'required',
            'full_name' => 'required',
            'email' => 'required|unique:subscribers,email',
            'phone_number' => 'required|unique:subscribers,phone_number'            
        ]);
        
        $saved = Subscriber::create($request->all());
        
        if($saved) {
            Mail::send('emails.subscribe', ['full_name' => $name, 'code' => $code], function($message) use ($email, $name)
            {
                $message->to($email, $name)->subject('Subscribed');    
            });
        }
        return redirect()->back()
                        ->with('success','Subscribed successfully');
    }
    /**
     * Remove the specified subscriber from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Subscriber::find($id)->delete();
        return redirect()->route('subscriber.index')
                        ->with('success','Subscriber removed successfully');
    }
}
