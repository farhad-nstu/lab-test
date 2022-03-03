@extends('front.layout.app')
@section('title') Mohammad Forhad @endsection

@section('content')
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
                            <th>Scan</th>
                            <th>Share Qrcode</th>
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
                            <td>
                              <a class="btn btn-sm btn-info" href="{{ url('get-qrcode'.'/'.$url->link) }}">Scan QR Code</a>
                            </td>
                            <td>
                             <ul class="list-unstyled social-icon mb-0">
                              <li class="list-inline-item"><a href="https://www.facebook.com/sharer/sharer.php?u={{ url('get-qrcode'.'/'.$url->link) }}" class="rounded"><img src="/img/socialicon/facebook.jpg" style="width: 40px; height: 40px; border-radius: 50%;" /></a></li>
                              <li class="list-inline-item"><a href="https://www.linkedin.com/shareArticle?mini=true&url={{ url('get-qrcode'.'/'.$url->link) }}" class="rounded"><img src="/img/socialicon/linkedin.jpg" style="width: 40px; height: 40px; border-radius: 50%;" /></a></li>
                              <li class="list-inline-item"><a href="https://twitter.com/intent/tweet?url={{ url('get-qrcode'.'/'.$url->link) }}&text=" class="rounded"><img src="/img/socialicon/twitter.jpg" style="width: 40px; height: 40px; border-radius: 50%;" /></a></li>
                              <li class="list-inline-item"><a href="https://pinterest.com/pin/create/button/?url={{ url('get-qrcode'.'/'.$url->link) }}&media=&description=" class="rounded"><img src="/img/socialicon/instagram.jpg" style="width: 40px; height: 40px; border-radius: 50%;" /></a></li>
                            </ul>  
                          </td>
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
