@extends('admin.layout.app')

@section('title') User Create @endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div class="breadcrumb-holder">
                <h1 class="main-title float-left">Dashboard</h1>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">URL Create/Edit</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->
      <div class="container card">
          <h4 class="text-center mt-3">Create URL</h4>
         <form method="post" action="{{route('urlShorten.store')}}" enctype="multipart/form-data">
            @csrf 

            <input type="hidden" name="id" class="form-control" value="{{getValue('id', $urlShorten)}}">

           <div class="form-group">
               <label>Expire Date</label>
               <input type="date" name="expiry_time" class="form-control" value="{{getValue('expiry_time', $urlShorten)}}">
           </div>
           <button type="submit" class="btn btn-success mt-3 mb-3">Create</button>
        </form>
      </div>
@endsection