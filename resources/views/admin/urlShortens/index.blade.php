@extends('admin.layout.app')

@section('title') URL List @endsection

@section('content')
<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
<div class="container-fluid">
  <div class="row">
    <div class="col-xl-12">
      <div class="breadcrumb-holder">
        <h1 class="main-title float-left">Dashboard</h1>
        <ol class="breadcrumb float-right">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>
<!-- end row -->
<div class="card-body">
 @include('message.message')
 <div class="table-responsive">
  <table class="table table-bordered datatable table-bordered">
    <thead>
      <tr>
        <th>No</th>
        <th>Link</th>
        <th>Click Limitation</th>
        <th>Expire Date</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>
</div>   
</div>   

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>


{{-- datatable --}}
<script type="text/javascript">
  $(function () {
    var table = $('.datatable').DataTable({
      processing: true,
      serverSide: true,
      ajax: "{{ route('urlShorten.index') }}",
      columns: [
      {data: 'DT_RowIndex', name: 'DT_RowIndex'},
      {data: 'link', name: 'link'},
      {data: 'click_limitation', name: 'click_limitation'},
      {data: 'expiry_time', name: 'expiry_time'},
      {
        data: 'action', 
        name: 'action', 
        orderable: true, 
        searchable: true
      },
      ]
    });
    
  });
</script>
@endsection