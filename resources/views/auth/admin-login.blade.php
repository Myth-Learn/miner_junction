@extends('layouts.app')

@section('content')

<!-- main -->
<div class="top-content">
    <div class="inner-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-box card">
                        <div class="card-block">
                            <div class="form-top-left">
                                <h3 class="card-title">Admin Login</h3>
                            </div>
                            <div class="form-bottom">
                                <form role="form"  class="login-form" method="POST" action="{{ route('admin.login.submit') }}">
                                    {{ csrf_field() }}

                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="email" class="sr-only" for="form-username">E-Mail</label>
                                        <input placeholder="Email..." class="form-username form-control input-error" id="email" type="email" name="email" value="{{ old('email') }}" required autofocus />
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label for="password" class="sr-only" for="form-password">Password</label>
                                        <input placeholder="Password..." class="form-password form-control input-error" id="password" type="password" class="form-control" name="password" required />
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-4">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Sign in!</button>
                                    <a href="{{ route('admin.password.request') }}" class="pull-right">Forget password ?</a>
                                </form>
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
