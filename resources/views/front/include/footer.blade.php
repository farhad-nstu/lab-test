<footer class="main">
  <section class="section-padding footer-mid">
    <div class="container pt-15 pb-20">
      <div class="row">
        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
          <div class="widget-about font-md mb-md-3 mb-lg-3 mb-xl-0  wow animate__animated animate__fadeInUp" data-wow-delay="0">
            <div class="logo mb-30 footer-logo-content">
              <a href="{{ route('front.index') }}" class="mb-15 footer-brand-logo"><img src="" alt="logo"></a>
              <p class="font-lg text-heading">Mohammad Forhad</p>
            </div>
            <h5 class="footer-content-help">Bangladesh</h5>
            <address class="footer-content-text top my-2">
              <span>House # 12, Road# 19,</span><br>
              <span>Nikunja 2,</span><br>
              <span>Khilkhet, Dhaka- 1213</span><br>
            </address>
          </div>
        </div>
        <div class=" col-xl-2 col-lg-2 col-md-12 col-sm-12  wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
          <h4 class="widget-title widget-title-content">Account</h4>
          <ul class="footer-list  mb-sm-5 mb-md-0">
            <li><a href="{{ route('login') }}">Sign In</a></li>
            <li><a href="{{ url('register') }}">Sign Up</a></li>
          </ul>
        </div>
        <div class=" col-xl-2 col-lg-2 col-md-12 col-sm-12  wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
          <h4 class="widget-title widget-title-content"></h4>
          <ul class="footer-list  mb-sm-5 mb-md-0">

          </ul>
        </div>
        <div class=" widget-install-app col-xl-3 col-lg-3 col-md-4 col-sm-5  wow animate__animated animate__fadeInUp" data-wow-delay=".5s">

          <div class="download-app ">

          </div>
        </div>
      </div>
    </div>
  </section>


  <div class="container pb-30  wow animate__animated animate__fadeInUp" data-wow-delay="0">
    <div class="row align-items-center">
      <div class="col-12 mb-30">
        <div class="footer-bottom"></div>
      </div>
      <div class="col-xl-4 col-lg-6 col-md-6">
        <p class="font-sm mb-0 footer-end-content">&copy; {{ date('Y') }}, <strong class="text-brand">Mohammad Forhad</strong> - All rights reserved</p>
      </div>
      <div class="col-xl-4 col-lg-6 text-center d-none d-xl-block">

        <div class="hotline d-lg-inline-flex" style="font-size: 16px;">
          <img src="{{asset('front/assets/imgs/theme/icons/phone-call.svg')}}" alt="hotline">
          <p style="font-size: 16px; margin-top: 7px;">01735693811</p>
        </div>
      </div>
      <div class="col-xl-4 col-lg-6 col-md-6 text-end d-none d-md-block">
        <div class="mobile-social-icon">
          <h6>Follow Us</h6>
          <a href="https://www.facebook.com/farhad681/"><img src="{{asset('front/assets/imgs/theme/icons/icon-facebook-white.svg')}}" alt=""></a>
          <a href="#"><img src="{{asset('front/assets/imgs/theme/icons/icon-instagram-white.svg')}}" alt=""></a>
        </div>
      </div>
    </div>
  </div>
</footer>