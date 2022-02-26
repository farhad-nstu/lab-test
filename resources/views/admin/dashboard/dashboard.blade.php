@extends('admin.layout.app')

@section('title') Admin Dashboard @endsection

@section('content')
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
<!-- end row -->
<div class="row">
    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card-box noradius noborder bg-info">
            <i class="fa fa-user float-right text-white"></i>
            <h6 class="text-white text-uppercase m-b-20">Total Users</h6>
            <h1 class="m-b-20 text-white counter">{{$users}}</h1>
        </div>
    </div>
</div>
<!-- end row -->
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
        <div class="card mb-3">
            <div class="card-header">
                <h3><i class="fas fa-chart-bar"></i> Chart 1</h3>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus non luctus metus. Vivamus fermentum ultricies orci sit amet sollicitudin.
            </div>

            <div class="card-body">
                <canvas id="comboBarLineChart"></canvas>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
        <!-- end card-->
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
        <div class="card mb-3">
            <div class="card-header">
                <h3><i class="fas fa-chart-bar"></i> Chart 2</h3>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus non luctus metus. Vivamus fermentum ultricies orci sit amet sollicitudin.
            </div>
            <div class="card-body">
                <canvas id="barChart"></canvas>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
        <!-- end card-->
    </div>
</div>
<!-- end row -->
</div><!-- end container fluid-->
@endsection
