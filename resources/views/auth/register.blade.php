@extends('front.layout.app')
@section('title') Mohammad Forhad @endsection

@section('content')
<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{ url('/') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
            <span></span> Pages <span></span> My Account
        </div>
    </div>
</div>
<div class="page-content pt-150 pb-150">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                <div class="row">
                    <div class="col-lg-6 col-md-8">
                        <div class="login_wrap widget-taber-content background-white">
                            <div class="padding_eight_all bg-white">
                                <div class="heading_s1">
                                    <h1 class="mb-5">Create an Account</h1>
                                    <p class="mb-30">Already have an account? <a href="{{ route('login') }}">Login</a></p>
                                </div>
                                <form method="post" action="{{ route('register') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input id="firstname" type="text" placeholder="First Name *" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>

                                        @error('firstname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input id="lastname" type="text" placeholder="Last Name *" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>

                                        @error('lastname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input id="email" type="email" placeholder="Email *" onchange="register_email_validate()" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                        <span id="regEmailMessage" style="color: red;"></span>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input id="phone" type="phone" placeholder="Phone No" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" autocomplete="phone">
                                    </div>
                                    <div class="form-group">
                                        <input id="password" type="password" placeholder="Password *" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input id="password-confirm" placeholder="Confirm Password *" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>

                                    <div class="form-group">
                                        <div class="captcha">
                                            <span style="vertical-align: sub !important">{!! captcha_img() !!}</span>
                                            <button type="button" class="btn btn-danger mb-3" style="padding:8px 25px!important; margin-top: -5px" class="reload" id="reload">
                                                &#x21bb;
                                            </button>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha" required>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-1">
                                            <input onclick="check_agree(this.value)" id="termCheckbox" type="checkbox" style="width: 25px; height: 25px;" name="term-agree" value="1">
                                        </div>
                                        <div class="col-sm-5">
                                            <label class="form-check-label" for="exampleCheckbox12"><span>I agree to <a href="{{ url('terms') }}">terms</a> &amp; <a href="{{ url('privacy-policy') }}">Policy</a>.</span></label>
                                        </div>
                                    </div>

                                    {{-- <div class="login_footer form-group mb-50">
                                        <div class="chek-form">
                                            <div class="custome-checkbox">
                                                <input class="" style="width: 25px; height: 25px;" type="checkbox" name="checkbox" value="1" id="termCheckbox">
                                                <label class="form-check-label" for="exampleCheckbox12"><span>I agree to terms &amp; Policy.</span></label>
                                            </div>
                                        </div>
                                        <a href="{{ url('terms') }}"><i class="fi-rs-book-alt mr-5 text-muted"></i>Lean more</a>
                                    </div> --}}
                                    <div class="form-group mb-30">
                                        <button type="submit" class="btn font-weight-bold" id="regbtn">Submit &amp; Register</button>
                                    </div>
                                    {{-- <p class="font-xs text-muted"><strong>Note:</strong>Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our privacy policy</p> --}}
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $("#regbtn").prop("disabled","disabled");

    function register_email_validate() {
        var email = $("#email").val();

        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

        if (filter.test(email)) {
            $("#regEmailMessage").text("");
        } else {
            $("#regEmailMessage").text("Email is not valid. Please insert a valid email and try again.");
        }
    }

    function check_agree(value) {
        if(value == 1) {
            $("#regbtn").prop("disabled",false);
            $("#termCheckbox").val(0);
        } else {
            $("#regbtn").prop("disabled","disabled");
            $("#termCheckbox").val(1);
        }
    }

    $('#reload').click(function () {
        $.ajax({
            type: 'GET',
            url: 'reload-captcha',
            success: function (data) {
                $(".captcha span").html(data.captcha);
            }
        });
    });


</script>
@endsection
