@php
    $footerTopContents = App\Models\admin\FooterContent::where(['type' => 'top', 'status' => 1])->limit(3)->get();
@endphp

<section class="banners">
    <div class="row">
        @foreach($footerTopContents as $footerTopContent)
            <div class="col-lg-4 col-md-6">
                <a href="{{ $footerTopContent->link }}">
                <div class="banner-img" style="width: 100%">
                    <img src="{{asset('/img/footer-contents').'/'.$footerTopContent->cont_img }}" alt="">
                    <!-- <div class="banner-text"> -->
     <!--                    <h4>
                            {{ $footerTopContent->title }}
                        </h4> -->
                        
                    <!-- </div> -->
                </div>
            </a>
            </div>
        @endforeach
    </div>
</section>
