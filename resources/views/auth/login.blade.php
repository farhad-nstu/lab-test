@extends('front.layout.app')
@section('title') Mohammad Forhad @endsection

@section('content')
<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{ url('/') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
            <span></span> Pages <span></span> Login
        </div>
    </div>
</div>
<div class="page-content pt-150 pb-150">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                <div class="row">
                    <div class="col-lg-6 pr-30 d-none d-lg-block">
                        <img style="background-color: #F8F8F8;" class="border-radius-15" src="{{ asset('/img/login.svg') }}" alt="">
                    </div>
                    <div class="col-lg-6 col-md-8">
                        <div class="login_wrap widget-taber-content background-white">
                            <div class="padding_eight_all bg-white" id="login_section">
                                <div class="heading_s1">
                                    <h1 class="mb-5">Login</h1>
                                    <p class="mb-30">Don't have an account? <a href="{{ url('register') }}">Create here</a></p>
                                </div>

                                <form method="post" action="{{ route('login') }}" id="login_form">
                                    @csrf

                                    @if(Session::has('message'))
                                    <div class="form-group">
                                        <h5 style="color: red;">{{ Session::get('message') }}</h5>
                                    </div>
                                    @endif

                                    <div class="form-group">
                                        <input id="email" type="email" onchange="login_email_validate()" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        <span id="loginMessage" style="color: red;"></span>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-sm btn-primary btn-block w-100" class="form-control" style="font-size: 18px;" id="logInbtn">Log In</button>
                                    </div>
                                </form>
                                <p id="forgot_line" class="mb-30">Forgot Password? <a href="javascript:void(0)" onclick="show_email_enter_form()">Click here</a></p>
                                <div class="form-group">
                                    <div class="d-inline">
                                        <a href="{{url('auth/google')}}"><img style="width: 48%; vertical-align:middle;" src="{{ asset('img/Fixed.svg') }}"></a>
                                    </div>
                                    <div class="d-inline">
                                        <a href="{{ url('auth/facebook') }}"><img style="width: 48%; vertical-align:middle;" src="{{ asset('img/Fixed2.svg') }}"></a>
                                    </div>
                                </div>

                                <div id="email_enter_form">
                                    <div class="form-group">
                                        <input id="forgot_email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="forgot_email" required autocomplete="email" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-heading btn-block hover-up" onclick="match_email()">Submit</button>
                                    </div>
                                    <p class="mb-30" id="matchMessage" style="color: red;"></p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $("#email_enter_form").hide();
    $("#logInbtn").prop("disabled","disabled");

    function login_email_validate() {
        var email = $("#email").val();

        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

        if (filter.test(email)) {
            $("#logInbtn").prop("disabled", false);
            $("#loginMessage").text("");
        } else {
            $("#logInbtn").prop("disabled","disabled");
            $("#loginMessage").text("Email is not valid. Please insert a valid email and try again.");
        }
    }

    function show_email_enter_form() {
        $("#email_enter_form").show();
        $("#login_form").hide();
        $("#forgot_line").hide();
    }

    function match_email() {
        var email = $("#forgot_email").val();

        if(email == null || email == 0) {
            $("#matchMessage").text("Please insert email first");
        } else {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "post",
                url : '{{url("email-match")}}',
                data: {
                    email: email,
                },
                success:function(data) {
                    if(data.message) {
                        $("#matchMessage").text(data.message)
                    } else {
                        $('#login_section').empty().html(data);
                        $("#change_email").val(email);
                    }
                }
            });
        }
    }

    function change_password() {
        var password = $("#forgot_password").val();
        var confirm_password = $("#confirm_password").val();

        if(password == confirm_password) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "post",
                url : '{{url("change-password")}}',
                data: {
                    password: password,
                    confirm_password: confirm_password,
                    email: $("#change_email").val(),
                },
                success:function(data) {
                    if(data.success_message != null || data.success_message != 0) {
                        $("#passMessage").text(data.success_message);
                        window.location.href = "{{ url('/') }}";
                    } else {
                        $("#passNotMatchMessage").text("Password Not Matched!");
                    }

                }
            });
        } else {
            $("#passNotMatchMessage").text("Password Not Matched!");
        }

    }
</script>
@endsection
