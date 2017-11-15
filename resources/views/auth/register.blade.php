@extends('layouts.app')

@section('content')
<div class="top-content">
    <div class="inner-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-block">
                            <h3 class="card-title">Sign Up</h3>
                            @if (empty($phone_number))
                                <div class="text-center">
                                    <div>
                                        <label>Are you Social! Signup with any social accounts</label>
                                    </div>
                                    <a href="{{ url('auth/facebook') }}">
                                        <button class="social-signin facebook">Log in with facebook</button>
                                    </a>
                                    <a href="{{ url('auth/google') }}">
                                        <button class="social-signin google">Log in with Google+</button>
                                    </a>
                                </div>
                                <hr/>
                                <div class="or-lbl"><label>Or</label></div>
                            @endif
                            <div class="form-bottom">
                                @if (empty($phone_number))
                                    <form role="form" class="login-form" method="POST" action="{{ route('user.phonenumber.submit') }}">
                                        {{ csrf_field() }}
                                        <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
                                            <label class="custom-sr-only" for="phone_number">Mobile</label>
                                            <input placeholder="10 Digit Mobile" id="phone_number" type="text" class="form-control" name="phone_number" value="{{ old('phone_number') }}" maxlength="10" required />
                                        </div>
                                        <button type="submit" class="btn btn-primary">Send OTP</button>
                                    </form>
                                @else
                                    <form role="form" class="login-form" method="POST" action="{{ route('register') }}">
                                        {{ csrf_field() }}
                                        
                                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                            <label for="name" class="custom-sr-only">Name</label>
                                            <input placeholder="Name..." id="name" type="text" class="form-username form-control input-error" name="name" value="{{ old('name') }}" required autofocus />
                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="phone_number" class="custom-sr-only">Mobile</label>
                                            <input id="phone_number" type="text" placeholder="10 digit Mobile" class="form-password form-control input-error" name="phone_number" value="{{ $phone_number }}" maxlength="10" readonly />
                                        </div>

                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label for="email" class="custom-sr-only">E-Mail</label>
                                            <input id="email" type="email" placeholder="Enter your business email" class="form-password form-control input-error" name="email" value="{{ old('email') }}" required />
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                            <label for="password" class="custom-sr-only">Password</label>
                                            <input id="password" type="password" placeholder="Password..." class="form-password form-control input-error" name="password" required />
                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="password-confirm" class="custom-sr-only">Confirm Password</label>
                                            <input id="password-confirm" type="password" placeholder="Confirm Password..." class="form-password form-control input-error" name="password_confirmation" required />
                                        </div>
                                        <button type="submit" class="btn btn-primary">
                                            Lets Mine
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 text-left hdng-fnt-wht">
                    <h1> Welcome to<strong> Miner </strong>Junction</h1>
                    <div class="description">
                        <p>
                            India's very first bitcoin cloud mining platform. Now get benefit of the automated Payout facility round the clock from our platform and start mining.
                        </p>
                    </div>
                    <div class="form-box">
                        <div class="important-updates-cate">
                            <div class="updates-wrapper-first-holiday">
                                <ul>
                                    <li>
                                        <a><i class="fa fa-check-circle" aria-hidden="true"></i> 3 Steps Signup</a>
                                    </li>
                                    <li>
                                        <a><i class="fa fa-check-circle" aria-hidden="true"></i> Easy Transactions</a>
                                    </li>
                                    <li>
                                        <a><i class="fa fa-check-circle" aria-hidden="true"></i> Free for life time account</a>
                                    </li>
                                    <li>
                                        <a><i class="fa fa-check-circle" aria-hidden="true"></i> Safe & Secure</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
