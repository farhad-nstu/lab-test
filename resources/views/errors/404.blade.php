@extends('front.layout.app')
@section('title') Tohfabd - We Deliver Happiness @endsection

@section('content')
<div class="page-content pt-150 pb-150">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-10 col-md-12 m-auto text-center">
                <p class="mb-20"><img src="assets/imgs/page/page-404.png" alt="" class="hover-up"></p>
                <h1 class="display-2 mb-30">404 <span style="font-size: 16px; color: red;">- Error</span></h1>
                <p class="font-lg text-grey-700 mb-30">
                    Sorry, we can't find what you are looking for.<br>
                    visit the <a href="{{ url('/') }}"> <span> Homepage</span></a> or <a href="{{ url('contact-us') }}"><span>Contact us</span></a> about the problem
                </p>
                <div class="search-form">
                    {{-- <form action="#">
                        <input type="text" placeholder="Search…">
                        <button type="submit"><i class="fi-rs-search"></i></button>
                    </form> --}}
                </div>
                <a class="btn btn-default submit-auto-width font-xs hover-up mt-30" href="{{ url('/') }}"><i class="fi-rs-home mr-5"></i> Back To Home Page</a>
            </div>
        </div>
    </div>
</div>
@endsection
