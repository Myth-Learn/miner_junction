@extends('layouts.default')
@section('content')
      
    <div id="containerWrapp" class="clearfix">
        <section id="section_home" class="section_area">
      	    <div class="wt_pattern_overlay"></div>
            <div class="pattern_overlay"></div>
            <div id="home_content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7 ">
                            <div class="raw_code content_element raw_html">
                                <div class="wrapper">
                        	        <img class="logo" src="images/mjjj.png">
                                    <h1>PRE-LAUNCH<br><span class="sle-txt">SALE</span></h1>
                                </div>
                            </div>
                            <div class="text_column content_element  intro_feature">
                                <div class="wrapper">
                                    <p>Register today with Miner Junction and get the Premium feature of Trigger Payout avbsolutely free for first 6 months .</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 ">
                            <div class="form-bx-wrapper">
                                {!! Form::open(array('route' => 'subscriber.store', 'method' => 'POST', 'class' => 'form')) !!}
                                    @include('Subscriber.form')
                                {!! Form::close() !!}
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success">
                                        <p>{{ $message }}</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    
@endsection
