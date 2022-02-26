<section class="section-padding mb-30"> 
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0">
                <h4 class="section-title style-1 mb-30 animated animated">Top Selling</h4>
                <div class="product-list-small animated animated">
                    @foreach($topSellingProducts as $topSellingProduct)
                        <article class="row align-items-center hover-up">
                            <figure class="col-md-4 mb-0">
                                <a href="{{ url('product/'.$topSellingProduct->id.'/'.$topSellingProduct->slug) }}"><img src="{{ asset('/img/products/thumb').'/'.$topSellingProduct->thumb_image }}" alt=""></a>
                            </figure>
                            <div class="col-md-8 mb-0">
                                <h6>
                                    <a href="{{ url('product/'.$topSellingProduct->id.'/'.$topSellingProduct->slug) }}">{{ get_title($topSellingProduct->title) }}</a>
                                </h6>
                                <!-- <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div> -->
                                <div class="product-price">
                                    @php
                                        $attributes = App\Models\admin\ProductAttribute::where('product_id', $topSellingProduct->id)->get();
                                    @endphp

                                    @if(count($attributes) > 0)
                                        <span>${{ number_format((float)$attributes[0]->price, 2, '.', '') }}</span>
                                    @else
                                        @if($topSellingProduct->discount)
                                            @php
                                                $mainPrice = $topSellingProduct->selling_price;
                                                $discount = ( $mainPrice * $topSellingProduct->discount ) / 100;
                                                $price = $mainPrice - $discount;
                                            @endphp
                                            <span>${{ number_format((float)$price, 2, '.', '') }}</span>
                                            <span class="old-price">${{ number_format((float)$mainPrice, 2, '.', '') }}</span>
                                        @else
                                            <span>${{ number_format((float)$topSellingProduct->selling_price, 2, '.', '') }}</span>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 mb-md-0">
                <h4 class="section-title style-1 mb-30 animated animated">Trending Products</h4>
                <div class="product-list-small animated animated">
                    @foreach($trendingProducts as $trendingProduct)
                    <article class="row align-items-center hover-up">
                        <figure class="col-md-4 mb-0">
                            <a href="{{ url('product/'.$trendingProduct->id.'/'.$trendingProduct->slug) }}"><img src="{{ asset('/img/products/thumb').'/'.$trendingProduct->thumb_image }}" alt=""></a>
                        </figure>
                        <div class="col-md-8 mb-0">
                            <h6>
                                <a href="{{ url('product/'.$trendingProduct->id.'/'.$trendingProduct->slug) }}">{{ get_title($trendingProduct->title) }}</a>
                            </h6>
                            <!-- <div class="product-rate-cover">
                                <div class="product-rate d-inline-block">
                                    <div class="product-rating" style="width: 90%"></div>
                                </div>
                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                            </div> -->
                            <div class="product-price">
                                @php
                                    $attributes = App\Models\admin\ProductAttribute::where('product_id', $trendingProduct->id)->get();
                                @endphp

                                @if(count($attributes) > 0)
                                    <span>${{ number_format((float)$attributes[0]->price, 2, '.', '') }}</span>
                                @else
                                    @if($trendingProduct->discount)
                                        @php
                                            $mainPrice = $trendingProduct->selling_price;
                                            $discount = ( $mainPrice * $trendingProduct->discount ) / 100;
                                            $price = $mainPrice - $discount;
                                        @endphp
                                        <span>${{ number_format((float)$price, 2, '.', '') }}</span>
                                        <span class="old-price">${{ number_format((float)$mainPrice, 2, '.', '') }}</span>
                                    @else
                                        <span>${{ number_format((float)$trendingProduct->selling_price, 2, '.', '') }}</span>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </article>
                    @endforeach
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-lg-block">
                <h4 class="section-title style-1 mb-30 animated animated">Recently Added</h4>
                <div class="product-list-small animated animated">
                    @foreach($recentlyProducts as $recentlyProduct)
                        <article class="row align-items-center hover-up">
                            <figure class="col-md-4 mb-0">
                                <a href="{{ url('product/'.$recentlyProduct->id.'/'.$recentlyProduct->slug) }}"><img src="{{ asset('/img/products/thumb').'/'.$recentlyProduct->thumb_image }}" alt=""></a>
                            </figure>
                            <div class="col-md-8 mb-0">
                                <h6>
                                    <a href="{{ url('product/'.$recentlyProduct->id.'/'.$recentlyProduct->slug) }}">{{ get_title($recentlyProduct->title) }}</a>
                                </h6>
                                <!-- <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div> -->
                                <div class="product-price">
                                    @php
                                        $attributes = App\Models\admin\ProductAttribute::where('product_id', $recentlyProduct->id)->get();
                                    @endphp

                                    @if(count($attributes) > 0)
                                        <span>${{number_format((float)$attributes[0]->price, 2, '.', '') }}</span>
                                    @else
                                        @if($recentlyProduct->discount)
                                            @php
                                                $mainPrice = $recentlyProduct->selling_price;
                                                $discount = ( $mainPrice * $recentlyProduct->discount ) / 100;
                                                $price = $mainPrice - $discount;
                                            @endphp
                                            <span>${{number_format((float)$price, 2, '.', '') }}</span>
                                            <span class="old-price">${{number_format((float)$mainPrice, 2, '.', '') }}</span>
                                        @else
                                            <span>${{number_format((float)$recentlyProduct->selling_price, 2, '.', '') }}</span>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-xl-block">
                <h4 class="section-title style-1 mb-30 animated animated">Top Rated</h4>
                <div class="product-list-small animated animated">
                    @foreach ($topRatedProducts as $topRatedProduct)
                        <article class="row align-items-center hover-up">
                            <figure class="col-md-4 mb-0">
                                <a href="{{ url('product/'.$topRatedProduct->id.'/'.$topRatedProduct->slug) }}"><img src="{{ asset('/img/products/thumb').'/'.$topRatedProduct->thumb_image }}" alt=""></a>
                            </figure>
                            <div class="col-md-8 mb-0">
                                <h6>
                                    <a href="{{ url('product/'.$topRatedProduct->id.'/'.$topRatedProduct->slug) }}">{{ get_title($topRatedProduct->title) }}</a>
                                </h6>
                                <!-- <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div> -->
                                <div class="product-price">
                                    @php
                                        $attributes = App\Models\admin\ProductAttribute::where('product_id', $topRatedProduct->id)->get();
                                    @endphp

                                    @if(count($attributes) > 0)
                                        <span>${{number_format((float)$attributes[0]->price, 2, '.', '') }}</span>
                                    @else
                                        @if($topRatedProduct->discount)
                                            @php
                                                $mainPrice = $topRatedProduct->selling_price;
                                                $discount = ( $mainPrice * $topRatedProduct->discount ) / 100;
                                                $price = $mainPrice - $discount;
                                            @endphp
                                            <span>${{number_format((float)$price, 2, '.', '') }}</span>
                                            <span class="old-price">${{number_format((float)$mainPrice, 2, '.', '') }}</span>
                                        @else
                                            <span>${{number_format((float)$topRatedProduct->selling_price, 2, '.', '') }}</span>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
