<!--start Popup  Modal -->
<div class="modal fade custom-modal" id="onloadModal">
    <div class="modal-dialog vertical-align-center modal-lg">
        <div class="modal-content">
            <img src="{{asset('img/popup').'/'.$settings->popup_img}}" alt="" style="width: 100%; border-radius: 25px">
        </div>
    </div>
</div>
{{-- end popup modal --}}

<div class="container mb-30">
    <div class="row flex-row-reverse">
        <div class="col-lg-4-5">
            {{-- Slider Start --}}
            <section class="home-slider position-relative mb-30">
                <div class="home-slide-cover mt-30">
                    <div class="hero-slider-1 style-4 dot-style-1 dot-style-1-position-1 desktopSlider">
                        @foreach($sliders as $key => $slider)
                            <div class="single-hero-slider single-animation-wrap" style="background-image: url({{ asset('img/sliders').'/'.$slider->image }})"></div>
                        @endforeach
                    </div>
                    <div class="hero-slider-1 style-4 dot-style-1 dot-style-1-position-1 mobileSlider">
                        @foreach($sliders as $key => $slider)
                            <div class="single-hero-slider single-animation-wrap" style="background-image: url({{ asset('img/sliders/mobile').'/'.$slider->mobile_img }})"></div>
                        @endforeach
                    </div>
                    <div class="slider-arrow hero-slider-1-arrow"></div>
                </div>
            </section>
            <!--Slider End-->

            {{-- Footer Top Content Start --}}
            @include('front.landing.section.promotion')
            {{-- Footer Top Content End --}}

            {{-- Popular Products Section Start --}}
            @include('front.landing.section.popularProducts')
            {{-- Popular Products Section Start --}}

            {{-- Deal Start --}}
            @include('front.common.deals')
            <!--End Deals-->

        </div>

        {{-- Sticky Sidebar Start --}}
        @include('front.common.stickySidebar')
        {{-- Sticky Sidebar End --}}

    </div>
</div>

<!-- Home page content start -->
    @if($settings->home_content)
        <section class="section-padding mb-30"> 
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 mb-sm-12 mb-md-0">

                        <div class="border p-3" >
                            <div id="textArea">
                                {!! $settings->home_content !!}
                            </div>
                            <span class="mt-1">
                                <a class="btn btn-sm btn-success" 
                                  id="more_less"
                                  onclick="toggleText();"
                                  href="javascript:void(0);"
                                ></a>
                            </span>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    @endif
<!-- Home PAge Content End -->

{{-- Footer Top Product Section Start --}}
@include('front.landing.section.footerTop')
{{-- Footer Top Product Section End --}}
