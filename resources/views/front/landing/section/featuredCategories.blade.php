@php
    $featuredCategories = App\Models\admin\Category::where(['is_popular' => 1, 'status' => 1])->orderBy('id', 'desc')->limit(8)->get();
@endphp

<style>
    .card-1 {
    position: relative;
    background: #f4f6fa;
    text-align: center;
    border: 1px solid #f4f6fa;
    border-radius: 10px;
    padding: 39px 24px 23px 23px;
    margin-bottom: 20px;
    min-height: 215px;
    -webkit-transition: .2s;
    transition: .2s;
}
</style>


        <div class="section-title">
            <div class="title">
                <h3>Featured Categories</h3>
                {{-- <a class="show-all" href="shop-grid-right.html">
                    All Bra
                    <i class="fi-rs-angle-right"></i>
                </a> --}}
            </div>
            <div class="slider-arrow slider-arrow-2 flex-right carausel-8-columns-arrow" id="carausel-8-columns-arrows"></div>
        </div>
        <div class="carausel-8-columns-cover position-relative">
            <div class="carausel-8-columns" id="carausel-8-columns">
                @foreach($featuredCategories as $featuredCategory)
                <div class="card-1">
                    <figure class="img-hover-scale overflow-hidden">
                        <a href="{{ url('category/'.$featuredCategory->id.'/'.$featuredCategory->slug) }}"><img src="{{ asset('/img/category').'/'.$featuredCategory->cat_img }}" alt=""></a>
                    </figure>
                    <h6>
                        <a href="{{ url('category/'.$featuredCategory->id.'/'.$featuredCategory->slug) }}">{{ $featuredCategory->name }}</a>
                    </h6>
                </div>
                @endforeach
            </div>
        </div>


