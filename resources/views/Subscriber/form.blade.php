<h4>Sign up to find out more!</h4>
<p>
    <span>
        {!! Form::text('full_name', null, array('placeholder' => 'Full Name', 'class' => 'form-control', 'size' => '40', 'aria-required' => 'true', 'aria-invalid' => 'false', 'required' => 'required')) !!}
    </span>
</p>
<p>
    <span>
        {!! Form::email('email', null, array('placeholder' => 'Enter your email', 'class' => 'form-control', 'size' => '40', 'aria-required' => 'true', 'aria-invalid' => 'false', 'required' => 'required')) !!}                    
    </span>
</p>
<p>
    <span>
        {!! Form::text('phone_number', null, array('placeholder' => 'Phone Number', 'class' => 'form-control', 'size' => '40', 'aria-required' => 'true', 'aria-invalid' => 'false', 'required' => 'required', 'maxlength' => '10')) !!}
    </span>
</p>
<p>
    <span>
        {!! Form::hidden('subscription_code', uniqid()) !!}
    </span>
</p>
<div class="raw_code content_element raw_html">
    <div class="wrapper">
        <div class="text-center">
            <button type="submit" class="btn btn-theme">Subscribe Now</button>
        </div>
    </div>
    <p class="form_text" style="margin-top:15px">
        Refer your buddy and avail Rs100 free on first purchase T&C apply
    </p>
</div>
