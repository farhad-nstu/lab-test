@if(count($popularProducts) > 0)
    @foreach($popularProducts as $popularProduct)
        <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
            <div class="product-cart-wrap mb-30">
                <div class="product-img-action-wrap">
                    <div class="product-img product-img-zoom">
                        <a href="{{ url('product/'.$popularProduct->id.'/'.$popularProduct->slug) }}">
                            <img class="default-img"
                                src="{{ asset('/img/products/thumb').'/'.$popularProduct->thumb_image }}" alt="">
                            <img class="hover-img"
                                src="{{ asset('/img/products/thumb').'/'.$popularProduct->thumb_image }}" alt="">
                        </a>
                    </div>
                    <div class="product-action-1">
                        <a aria-label="Add To Wishlist" class="action-btn" href="javascript:void(0)" onclick="add_to_wish(`{{ $popularProduct->id }}`)"><i
                                class="fi-rs-heart"></i></a>
                    </div>
                    <div class="product-badges product-badges-position product-badges-mrg">
                        @if($popularProduct->flag == "hot")
                            <span class="hot">Hot</span>
                        @elseif($popularProduct->flag == "new")
                            <span class="new">New</span>
                        @elseif($popularProduct->flag == "sale")
                            <span class="sale">Sale</span>
                        @elseif($popularProduct->flag == "best_sale")
                            <span class="best_sale">Best Sale</span>
                        @endif
                    </div>
                </div>
                <div class="product-content-wrap">
                    <div class="product-category">
                        <a href="{{ url('category/'.$popularProduct->category_id.'/'.$popularProduct->category_slug) }}">{{ $popularProduct->category }}</a>
                    </div>
                    <h2><abbr title="{{ $popularProduct->title }}" style="text-decoration: none;"><a href="{{ url('product/'.$popularProduct->id.'/'.$popularProduct->slug) }}">{{ get_title($popularProduct->title) }}</a></abbr></h2>
                    <div>
                        <span class="font-small text-muted">By <a
                                href="#">{{ $popularProduct->subcategory }}</a></span>
                    </div>
                    <div class="product-card-bottom">
                        <div class="product-price">
                            @php
                                $attributes = App\Models\admin\ProductAttribute::where('product_id', $popularProduct->id)->get();
                            @endphp

                            @if(count($attributes) > 0)
                                <span>${{number_format((float)$attributes[0]->price, 2, '.', '') }}</span>
                            @else
                                @if($popularProduct->discount)
                                    @php
                                        $mainPrice = $popularProduct->selling_price;
                                        $discount = ( $mainPrice * $popularProduct->discount ) / 100;
                                        $price = $mainPrice - $discount;
                                    @endphp
                                    <span>${{number_format((float)$price, 2, '.', '') }}</span>
                                    <span class="old-price">${{number_format((float)$mainPrice, 2, '.', '') }}</span>
                                @else
                                    <span>${{number_format((float)$popularProduct->selling_price, 2, '.', '') }}</span>
                                @endif
                            @endif
                        </div>
                        <div class="add-cart">
                            @php
                                $attNo = App\Models\admin\ProductAttribute::where('product_id', $popularProduct->id)->count();
                            @endphp

                            @if(count($attributes) > 0)
                                <a class="add" href="{{ url('product/'.$popularProduct->id.'/'.$popularProduct->slug) }}"><i
                                    class="fi-rs-shopping-cart mr-5"></i>Add </a>
                            @else
                                <a class="add" href="javascript:void(0)" onclick="common_add_to_cart(`{{ $popularProduct->id }}`)"><i
                                class="fi-rs-shopping-cart mr-5"></i>Add </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    @if(count($popularProducts) >= 15)
        <div class="d-block" style="text-align: right;">
            <a class="btn btn-sm btn-primary" href="{{ url('category/'.$popularProduct->category_id.'/'.$popularProduct->category_slug) }}">See More</a>
        </div>
    @endif
@endif


