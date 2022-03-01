@extends('front.layout.app')
@section('title') Mohammad Forhad @endsection

@section('content')
<style>
    .or_der input {
    border: 1px solid #ececec;
    border-radius: 10px;
    height: 14px !important;
    -webkit-box-shadow: none;
    box-shadow: none;
    padding-left: 20px;
    font-size: 16px;
    width: 100%;
}

textarea {
  width: 100% !important;
  height: 100px !important;
}
</style>
<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <span></span> Home
        </div>
    </div>
</div>
<div class="page-content pt-150 pb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 m-auto">
                <div class="row">

                    @include('front.account.sidebar')

                    <div class="col-md-9">
                        <div class="tab-content account dashboard-content pl-50">
                            
                            <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="mb-0">URL List</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive" id="orderSection">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>SI</th>
                                                        <th>Link</th>
                                                        <th>Expire Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($urls as $key => $url)
                                                        <tr>
                                                            <td>{{ ++$key }}</td>
                                                            <td>
                                                                <a href="{{ url('/hit-check/'.$url->link) }}">{{ $url->link }}</a>
                                                            </td>
                                                            <td>{{ $url->expiry_time }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    @if(Session::has('message'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
        toastr.success("{{ session('message') }}");
    @endif

    @if(Session::has('stillBlockMessage'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
        toastr.warning("{{ session('stillBlockMessage') }}");
    @endif

    @if(Session::has('blockMessage'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
        toastr.error("{{ session('blockMessage') }}");
    @endif
</script>
@endsection
