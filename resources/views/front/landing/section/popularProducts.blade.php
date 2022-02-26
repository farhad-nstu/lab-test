

@php
    use App\Models\admin\Category;
    use App\Models\Tag;
    use DB as db;

    $categories = Category::where(['status' => 1, 'category_type' => 1])->orderBy('is_promotional', 'desc')->get();
    $homeTags = Tag::where(['status' => 1, 'type' => 1])->whereIn('name', ['Gift Packages', 'Urgent Delivery'])->get();
@endphp
<section class="product-tabs section-padding position-relative" id="popularProductsSection">



{{-- Shop By Featured Categories Section Start --}}
@include('front.landing.section.featuredCategories')
{{-- Shop By Featured Categories Section End --}}


    <div class="section-title style-2">





        <h3>Popular Products</h3>
        <ul class="nav nav-tabs links" id="myTab" role="tablist">
            {{-- <li class="nav-item" role="presentation">
                <button onclick="get_cat_products('all')" class="nav-link" id="nav-tab-one" data-bs-toggle="tab" data-bs-target="#tab-one"
                    type="button" role="tab" aria-controls="tab-one" aria-selected="false">All</button>
            </li> --}}
            @php
                $homeCategories = App\Models\admin\Category::where(['status' => 1, 'is_mega_menu' => 1, 'category_type' => 1])->orderBy('id', 'asc')->limit(4)->get();
            @endphp
            @if(count($homeCategories) > 0)
                @for($i=1; $i <= count($homeCategories); $i++)
                    @if($homeCategories[$i-1]->name == "Cakes")
                        <li class="nav-item" role="presentation">
                            <button onclick="get_cat_products(`{{ $homeCategories[$i-1]->id }}`)" class="nav-link active" id="nav-tab-{{ $i + 1 }}" data-bs-toggle="tab" data-bs-target="#tab-{{ $i + 1 }}"
                                type="button" role="tab" aria-controls="tab-{{ $i + 1 }}" aria-selected="true">
                                    {{ $homeCategories[$i-1]->name }}
                            </button>
                        </li>
                    @else
                        <li class="nav-item" role="presentation">
                            <button onclick="get_cat_products(`{{ $homeCategories[$i-1]->id }}`)" class="nav-link" id="nav-tab-{{ $i + 1 }}" data-bs-toggle="tab" data-bs-target="#tab-{{ $i + 1 }}"
                                type="button" role="tab" aria-controls="tab-{{ $i + 1 }}" aria-selected="false">
                                    {{ $homeCategories[$i-1]->name }}
                            </button>
                        </li>
                    @endif
                @endfor
            @endif
        </ul>
    </div>
    <!--End nav-tabs-->
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
            <div class="row product-grid-4" id="productSection">
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
            </div>
        </div>
    </div>
</section>

@foreach($homeTags as $homeTag)
<section class="product-tabs section-padding position-relative" id="popularProductsSection">
    <div class="section-title style-2">
        <h3>{{ $homeTag->name }}</h3>
    </div>
    @php
        $products = db::table('products')
                    ->join('categories', 'categories.id', '=', 'products.category_id')
                    ->leftjoin('sub_categories', 'sub_categories.id', '=', 'products.sub_category_id')
                    ->select('products.*', 'categories.name as category', 'categories.slug as category_slug', 'sub_categories.title as subcategory')
                    ->where('product_status', 1)
                    ->whereJsonContains('tags', "$homeTag->id")
                    ->orderBy('id', 'asc')
                    ->limit(10)
                    ->get();
    @endphp
    <!--End nav-tabs-->
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
            <div class="row product-grid-4" id="productSection">
                @if(count($products) > 0)
                    @foreach($products as $popularProduct)
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
                    @if(count($popularProducts) >= 10)
                        <div class="d-block" style="text-align: right;">
                            <a class="btn btn-sm btn-primary" href="{{ url('tag/'.$homeTag->id.'/'.$homeTag->slug.'/products') }}">See More</a>
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </div>
</section>
@endforeach
