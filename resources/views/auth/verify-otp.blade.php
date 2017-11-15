@extends('layouts.app')

@section('content')
<div class="top-content">
    <div class="inner-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-block">
                            <h3 class="card-title">Verify OTP</h3>
                            <div class="form-bottom">
                                <form class="text-center" role="form" method="POST" action="{{ route('user.verifyOTP.submit') }}">
                                    {{ csrf_field() }}
                                    <div class="form-group mbl-otp-p">
                                        <p>We have sent you OTP on <span class="user-mbl-dgt">+91-{{ $phone_number }}</span> please enter the OTP below</p>
                                    </div>
                                    <input type="text" placeholder="4 Digit OTP" maxlength="4" name="otp" class="form-control" id="otp" required />
                                    <br/>
                                    <a href="/cancel-otp">
                                        <button type="button" class="btn btn-danger">Cancel</button>
                                    </a>
                                    <button type="submit" class="btn btn-success">Verify</button>
                                    <a href="/resend-otp">
                                        <button type="button" class="btn btn-primary">Resend OTP</button>
                                    </a>
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
