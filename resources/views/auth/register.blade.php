@extends('front.layout.app')
@section('title') Mohammad Forhad @endsection

@section('content')
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
                    <input id="name" type="text" placeholder="Name *" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <input id="email" type="email" placeholder="Email *" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
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

                  <div class="form-group mb-30">
                    <button type="submit" class="btn font-weight-bold" id="regbtn">Submit &amp; Register</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
