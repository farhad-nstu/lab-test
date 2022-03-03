<header class="header-area header-style-1 header-height-2">

  <style>
    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f1f1f1;
      width: 100%;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
    }
    .dropdown-content a:hover {
      left: 0;
      top: 0;
    }
    .dropdown:hover .dropdown-content {display: block; left: 100%; top: 0; padding: 5px 0px; background-color: #ffffff;   }
  </style>

  <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
    <div class="container">
      <div class="header-wrap">
        <div class="logo logo-width-1">
          
        </div>
        <div class="header-right">
          <div class="search-style-2">
            
          </div>

          <div class="header-action-right">
            <div class="header-action-2">

              <div class="header-action-icon-2">

              </div>

              <div class="header-action-icon-2" id="cartBucketSection">
              </div>

              <div class="header-action-icon-2">
                @guest
                <a href="javascript:void(0)"><span class="lable ml-0">Account</span></a>
                <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                  <ul>
                    <li><a href="{{ url('/login') }}"><i class="fi fi-rs-location-alt mr-10"></i>Login</a></li>
                    <li><a href="{{ url('/register') }}"><i class="fi fi-rs-user mr-10"></i>Register</a></li>
                  </ul>
                </div>
                @else
                <a href="{{ url('/') }}" style="border-radius: 10px;">
                  @if(auth()->user()->user_photo)
                  <img class="svgInject user_profile_photo" src="{{ asset('img/profile').'/'.auth()->user()->user_photo }}">
                  @else
                  <img class="svgInject user_profile_photo" src="{{ asset('img/profile/user.png') }}">
                  @endif
                </a>
                <a href="{{ url('/') }}"><span class="lable ml-0">{{ auth()->user()->name }}</span></a>
                <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                  <ul>
                    <li><a href="{{ url('/') }}"><i class="fi fi-rs-user mr-10"></i>My Page</a></li>
                    <li>
                      <a href="{{ route('user.logout') }}"><i class="fi fi-rs-sign-out mr-10"></i>
                        Logout
                      </a>
                    </li>
                  </ul>
                </div>
                @endguest
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>