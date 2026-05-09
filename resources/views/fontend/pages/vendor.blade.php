@extends('fontend.layouts.app')
@section('title', 'About - ')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('fontend/js/smart-forms/smart-forms.css') }}">

@endsection
@section('content')
    @include('fontend.component.inner_header', [
        'title' => 'Vendor',
        'subtitle' => 'We are welcome you',
        'bread' => 'Join as Vendor',
        'image' => 'fontend/images/bg_header.jpg',
    ])



    <section class="sec-padding">
        <div class="container">
            <div class="row">

                <div class="col-md-8">
                    <div class="smart-forms bmargin">

                        <h3>Became Retailer</h3>
                        <p>If you are a retailer interested in carrying our products, please complete the form below. Due to
                            high demand, we are actively seeking new retailers across the country.</p>
                        <br />
                        <br />

                        <form method="post" action="{{ route('sites.dealer_form_submit') }}" id="smart-form">
                            @csrf
                            <div>
                                <div class="section">
                                    <label class="field prepend-icon">
                                        <input type="text" name="companyname" id="companyname" class="gui-input"
                                            placeholder="Company Name">
                                        <span class="field-icon"><i class="fa fa-building"></i></span> </label>
                                </div>
                                <div class="section">
                                    <label class="field prepend-icon">
                                        <input type="text" name="sendername" id="sendername" class="gui-input"
                                            placeholder="Enter name">
                                        <span class="field-icon"><i class="fa fa-user"></i></span> </label>
                                </div>
                                <!-- end section -->

                                <div class="section">
                                    <label class="field prepend-icon">
                                        <input type="email" name="emailaddress" id="emailaddress" class="gui-input"
                                            placeholder="Email address">
                                        <span class="field-icon"><i class="fa fa-envelope"></i></span> </label>
                                </div>
                                <!-- end section -->

                                <div class="section colm colm6">
                                    <label class="field prepend-icon">
                                        <input type="tel" name="telephone" id="telephone" class="gui-input"
                                            placeholder="Telephone">
                                        <span class="field-icon"><i class="fa fa-phone-square"></i></span> </label>
                                </div>
                                <!-- end section -->
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="section ">
                                            <label class="field prepend-icon">
                                                <input type="text" name="country" id="country" class="gui-input"
                                                    placeholder="Country">
                                                <span class="field-icon"><i class="fa fa-flag"></i></span> </label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="section ">
                                            <label class="field prepend-icon">
                                                <input type="text" name="state" id="state" class="gui-input"
                                                    placeholder="State">
                                                <span class="field-icon"><i class="fa fa-location-arrow"></i></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="section ">
                                            <label class="field prepend-icon">
                                                <input type="text" name="city" id="city" class="gui-input"
                                                    placeholder="City">
                                                <span class="field-icon"><i class="fa fa-location-arrow"></i></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="section ">
                                            <label class="field prepend-icon">
                                                <input type="text" name="zip" id="zip" class="gui-input"
                                                    placeholder="Zip Code">
                                                <span class="field-icon"><i class="fa fa-code"></i></span> </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="section">
                                    <label class="field prepend-icon">
                                        <input type="text" name="address" id="address" class="gui-input"
                                            placeholder="Street Address">
                                        <span class="field-icon"><i class="fa fa-map-marker"></i></span> </label>
                                </div>
                                <div class="section">
                                    <label class="field prepend-icon">
                                        <input type="text" name="sendersubject" id="sendersubject" class="gui-input"
                                            placeholder="Enter subjec">
                                        <span class="field-icon"><i class="fa fa-lightbulb-o"></i></span> </label>
                                </div>
                                <!-- end section -->

                                <div class="section">
                                    <label class="field prepend-icon">
                                        <textarea class="gui-textarea" id="sendermessage" name="sendermessage" placeholder="Enter message"></textarea>
                                        <span class="field-icon"><i class="fa fa-comments"></i></span> <span
                                            class="input-hint"> <strong>Hint:</strong> Please enter between 80 - 300
                                            characters.</span>
                                    </label>
                                </div>
                                <!-- end section -->
                                <div class="section">
                                    <label class="field prepend-icon">Product Are you Interested</label>
                                    <div class="clearfix"></div>
                                    <br />
                                    <ul class="filter list-inline">
                                        <li><label><input type="checkbox" name="product_category[]" value="Out door"/> Out door <span></span></label></li>
                                        <li><label><input type="checkbox" name="product_category[]" value="Commercial"/> Commercial <span></span></label></li>
                                        <li><label><input type="checkbox" name="product_category[]" value="Parking"/> Parking <span></span></label></li>
                                        <li><label><input type="checkbox" name="product_category[]" value="Kitchen"/> Kitchen <span></span></label></li>
                                        <li><label><input type="checkbox" name="product_category[]" value="Domestic"/> Domestic <span></span></label></li>
                                    </ul>
                                </div>
                                <div class="section">
                                    <label class="field prepend-icon">
                                        <input type="checkbox" /> Are you agree with our terms and conditions of retailer ?
                                    </label>
                                </div>
                                <div class="section">
                                    <div class="smart-widget sm-left sml-120">
                                        <label class="field">
                                            <input type="text" name="captcha" id="captcha" class="gui-input sfcode"
                                                maxlength="6" placeholder="Enter CAPTCHA">
                                        </label>
                                        <label class="button captcode">
                                            <img src="{{ route('sites.captcha') }}?<?php echo time(); ?>" id="captchax"
                                                alt="captcha">
                                            <span class="refresh-captcha"><i class="fa fa-refresh"></i></span>
                                        </label>
                                    </div>
                                </div>

                                <div class="result"></div>
                                <!-- end .result  section -->

                            </div>
                            <!-- end .form-body section -->
                            <div class="form-footer">
                                <button type="submit" data-btntext-sending="Sending..."
                                    class="button btn-primary orange-2">Submit</button>
                                <button type="reset" class="button"> Cancel </button>
                            </div>
                            <!-- end .form-footer section -->
                        </form>
                    </div>
                    <!-- end .smart-forms section -->
                </div>


                <div class="col-md-4">
                    <br />
                    <h4>Address Info</h4>
                    {!! config('app.address') !!} <br /><br />
                    Telephone: {!! config('app.phone1') !!}<br />
                    FAX: {!! config('app.phone1') !!}<br />
                    <br />
                    E-mail: <a href="mailto:{{ config('app.email') }}">{{ config('app.email') }}</a><br />
                    Website: <a href="{{ url('/') }}">{{ config('app.website') }}</a>
                    <div class="clearfix"></div>
                    <br /><br />
                    <h4>Find the Address</h4>

                    <div class="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3676.816763718588!2d70.84901501496452!3d22.84626778504262!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39598d19c20b154b%3A0xc943f7c873df9b28!2sBansiyi%20Overseas%20LLP!5e0!3m2!1sen!2sin!4v1650288370964!5m2!1sen!2sin"  style="border:0;" class="map" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--end section-->
    <div class="clearfix"></div>

@section('js')

    <script type="text/javascript" src="{{ asset('fontend/js/smart-forms/jquery.form.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('fontend/js/smart-forms/jquery.validate.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('fontend/js/smart-forms/additional-methods.min.js') }}"></script>
    {{-- <script type="text/javascript" src="{{ asset('fontend/js/smart-forms/smart-form.js') }}"></script> --}}
    <script>
        $(function() {

            function reloadCaptcha() {
                $("#captchax").attr("src", "{{route('sites.captcha')}}?r=" + Math.random());
            }
            $('.captcode').click(function(e) {
                e.preventDefault();
                reloadCaptcha();
            });

            function swapButton() {
                var txtswap = $(".form-footer button[type='submit']");
                if (txtswap.text() == txtswap.data("btntext-sending")) {
                    txtswap.text(txtswap.data("btntext-original"));
                } else {
                    txtswap.data("btntext-original", txtswap.text());
                    txtswap.text(txtswap.data("btntext-sending"));
                }
            }

            $("#smart-form").validate({

                /* @validation states + elements 
                ------------------------------------------- */
                errorClass: "state-error",
                validClass: "state-success",
                errorElement: "em",
                onkeyup: false,
                onclick: false,

                /* @validation rules 
                ------------------------------------------ */
                rules: {
                    sendername: {
                        required: true,
                        minlength: 2
                    },
                    emailaddress: {
                        required: true,
                        email: true
                    },
                    sendersubject: {
                        required: true,
                        minlength: 4
                    },
                    sendermessage: {
                        required: true,
                        minlength: 10
                    },
                    captcha: {
                        required: true,
                        remote: '{{route("sites.captcha_process")}}'
                    }
                },
                messages: {
                    sendername: {
                        required: 'Enter your name',
                        minlength: 'Name must be at least 2 characters'
                    },
                    emailaddress: {
                        required: 'Enter your email address',
                        email: 'Enter a VALID email address'
                    },
                    sendersubject: {
                        required: 'Subject is important',
                        minlength: 'Subject must be at least 4 characters'
                    },
                    sendermessage: {
                        required: 'Oops you forgot your message',
                        minlength: 'Message must be at least 10 characters'
                    },
                    captcha: {
                        required: 'You must enter the captcha code',
                        remote: 'Captcha code is incorrect'
                    }
                },

                /* @validation highlighting + error placement  
                ---------------------------------------------------- */
                highlight: function(element, errorClass, validClass) {
                    $(element).closest('.field').addClass(errorClass).removeClass(validClass);
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).closest('.field').removeClass(errorClass).addClass(validClass);
                },
                errorPlacement: function(error, element) {
                    if (element.is(":radio") || element.is(":checkbox")) {
                        element.closest('.option-group').after(error);
                    } else {
                        error.insertAfter(element.parent());
                    }
                },

                /* @ajax form submition 
                ---------------------------------------------------- */
                submitHandler: function(form) {
                    $(form).ajaxSubmit({
                        method:'post',
                        target: '.result',
                        beforeSubmit: function() {
                            swapButton();
                            $('.form-footer').addClass('progress');
                        },
                        error: function() {
                            swapButton();
                            $('.form-footer').removeClass('progress');
                        },
                        success: function() {
                            console.log('success');
                            swapButton();
                            $('.form-footer').removeClass('progress');
                            $('.alert-success').show().delay(7000).fadeOut();
                            $('.field').removeClass("state-error, state-success");
                            if ($('.alert-error').length == 0) {
                                $('#smart-form').resetForm();
                                reloadCaptcha();
                            }
                        }
                    });
                }

            });

        });
    </script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript" src="{{ asset('fontend/js/gmaps/jquery.gmap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('fontend/js/gmaps/examples.js') }}"></script>

@endsection

@endsection
