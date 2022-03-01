@extends('admin.layout.app')

@section('title') Find Out Report @endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div class="breadcrumb-holder">
                <h1 class="main-title float-left">Dashboard</h1>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Find Out Report</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->
      <div class="container card">
          <h4 class="text-center mt-3">Find Out Report</h4>
          <form method="get" action="{{route('report.datewise.find')}}">
            <div class="form-group row">
              <label for="start" class="col-md-2">Start</label>
              <div class="col-md-4">
                @php
                  $max = date('Y-m-d');
                  if(isset($start)) {
                    $start = date('Y-m-d', strtotime($start));
                  } else {
                    $start = date('Y-m-d', strtotime($max));
                  }
                @endphp
                <input type="date" name="start" id="start" required class="form-control" max="{{ $max }}" value="{{ $start }}">
              </div>
              <label for="end" class="col-md-2">End</label>
              <div class="col-md-4">
                @php
                  $default = date('Y-m-d');
                  if(isset($end)) {
                    $end = date('Y-m-d', strtotime($end));
                  } else {
                    $end = date('Y-m-d', strtotime($default));
                  }
                @endphp
                <input type="date" name="end" id="end" required class="form-control" value="{{ $end }}">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2"></label>
              <div class="col-md-4">
                <button type="submit" class="btn btn-success mt-3 mb-3">Find</button>
              </div>
            </div>
        </form>
      </div>

      <!-- Table Data -->
      @if(count($logs) > 0)
        <div class="container card">
          <form method="post" action="{{route('report.export_file')}}">
            @csrf 
            @if(isset($start) && isset($end))
              <input type="hidden" name="start" value="{{ $start }}">
              <input type="hidden" name="end" value="{{ $end }}">
            @endif 
            <div class="form-group row">
              <label class="col-md-2"></label>
              <div class="col-md-4">
                <button type="submit" class="btn btn-success mt-3 mb-3">Export File</button>
              </div>
            </div>
          </form>
          <div class="table-responsive">
            <table class="table table-bordered datatable table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th>User</th>
                  <th>Link</th>
                  <th>IP</th>
                  <th>Location</th>
                  <th>Latitude</th>
                  <th>Longititude</th>
                  <th>Browser</th>
                  <th>OS</th>
                  <th>Device</th>
                </tr>
              </thead>
              <tbody>            
                @foreach($logs as $key => $log)
                  <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $log->user }}</td>
                    <td>{{ $log->link }}</td>
                    <td>{{ $log->ip }}</td>
                    <td>{{ $log->location }}</td>
                    <td>{{ $log->latitude }}</td>
                    <td>{{ $log->longitude }}</td>
                    <td>{{ $log->browser }}</td>
                    <td>{{ $log->os }}</td>
                    <td>{{ $log->device }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      @endif 
@endsection