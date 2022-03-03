@extends('front.layout.app')
@section('title') Mohammad Forhad @endsection

@section('content')
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
                <p id="forgot_line" class="mb-30">Forgot Password? <a href="#">Click here</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
