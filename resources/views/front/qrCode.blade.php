@extends('front.layout.app')
@section('title') Mohammad Forhad @endsection

@section('content')
<div class="page-content pt-150 pb-150">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 m-auto">
        <div class="row">
          <div class="col-md-9">
            <div class="tab-content account dashboard-content pl-50">             
              <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                <div class="card">
                  <div class="card-header">
                    <h3 class="mb-0">Scan The QR Code</h3>
                  </div>
                  <div class="card-body">
                    {!! $qrcode !!}
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
@endsection
