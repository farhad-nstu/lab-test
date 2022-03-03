<!DOCTYPE html>
<html lang="en">

<head>
  <title>@yield('title')</title>
  <meta name="description" content="Dashboard | Mohammad Forhad">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Your website">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Favicon -->
  <link rel="shortcut icon" href="{{asset('admin/assets/images/favicon.ico')}}">

  <!-- Bootstrap CSS -->
  <link href="{{asset('admin/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />

  <!-- Font Awesome CSS -->
  <link href="{{asset('admin/assets/font-awesome/css/all.css')}}" rel="stylesheet" type="text/css" />

  <!-- Custom CSS -->
  <link href="{{asset('admin/assets/css/style.css')}}" rel="stylesheet" type="text/css" />

  <!-- BEGIN CSS for this page -->
  <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/plugins/select2/css/select2.min.css')}}" />
  <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/plugins/chart.js/Chart.min.css')}}" />
  <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/plugins/datatables/datatables.min.css')}}" />
  <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/plugins/summernote/summernote-bs4.min.css')}}" />
  <!-- END CSS for this page -->
</head>
<body class="adminbody">
  <div id="main">
    <!-- top bar navigation -->
    <div class="headerbar">
      <!-- LOGO -->
      <div class="headerbar-left">
        <a href="index.html" class="logo">
          <img alt="Logo" src="{{asset('admin/assets/images/logo.png')}}" />
          <span>Admin</span>
        </a>
      </div>
      <nav class="navbar-custom">
        <ul class="list-inline float-right mb-0">
          <li class="list-inline-item dropdown notif">
            <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" aria-haspopup="false" aria-expanded="false">
              <i class="far fa-bell"></i>
              <span class="notif-bullet"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-arrow-success dropdown-lg">
              <!-- item-->
              <div class="dropdown-item noti-title">
                <h5>
                  <small>
                    <span class="label label-danger pull-xs-right">5</span>Allerts</small>
                  </h5>
                </div>
                <!-- item-->
                <a href="#" class="dropdown-item notify-item">
                  <div class="notify-icon bg-faded">
                    <img src="{{asset('admin/assets/images/avatars/avatar4.png')}}" alt="img" class="rounded-circle img-fluid">
                  </div>
                  <p class="notify-details">
                    <b>Michelle Dolores</b>
                    <span>New job completed</span>
                    <small class="text-muted">35 minutes ago</small>
                  </p>
                </a>
                <!-- All-->
                <a href="#" class="dropdown-item notify-item notify-all">
                  View All Allerts
                </a>

              </div>
            </li>

            <li class="list-inline-item dropdown notif">
              <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" aria-haspopup="false" aria-expanded="false">
                <img src="{{ asset('img/profile'.'/'.Auth::user()->user_photo) }}" class="avatar-rounded">
              </a>
              <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                <!-- item-->
                <div class="dropdown-item noti-title">
                  <h5 class="text-overflow">
                    <small>{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</small>
                  </h5>
                </div>


                <a href="{{ route('user.logout') }}" class="dropdown-item notify-item"><i class="fas fa-power-off"></i>
                  <span>Logout</span>
                </a>
              </div>
            </li>
          </ul>

          <ul class="list-inline menu-left mb-0">
            <li class="float-left">
              <button class="button-menu-mobile open-left">
                <i class="fas fa-bars"></i>
              </button>
            </li>
          </ul>
        </nav>
      </div>
      <!-- End Navigation -->

      <!-- Left Sidebar -->
      @include('admin.includes.sidebar')
      <!-- End Sidebar -->

      <div class="content-page">

        <!-- Start content -->
        <div class="content">
         {{-- content start --}}
         @yield('content')
         {{-- content end --}}
       </div>
       <!-- END content -->
     </div>
     <!-- END content-page -->

     {{-- footer start --}}
     @include('admin.includes.footer')
     {{-- footer end --}}

     <script src="{{asset('admin/assets/js/modernizr.min.js')}}"></script>
     <script src="{{asset('admin/assets/js/jquery.min.js')}}"></script>
     <script src="{{asset('admin/assets/js/moment.min.js')}}"></script>

     <script src="{{asset('admin/assets/js/popper.min.js')}}"></script>
     <script src="{{asset('admin/assets/js/bootstrap.min.js')}}"></script>

     <script src="{{asset('admin/assets/js/detect.js')}}"></script>
     <script src="{{asset('admin/assets/js/fastclick.js')}}"></script>
     <script src="{{asset('admin/assets/js/jquery.blockUI.js')}}"></script>
     <script src="{{asset('admin/assets/js/jquery.nicescroll.js')}}"></script>

     <!-- App js -->
     <script src="{{asset('admin/assets/js/admin.js')}}"></script>

   </div>
   <!-- END main -->

   <!-- BEGIN Java Script for this page -->
   <script src="{{asset('admin/assets/plugins/select2/js/select2.min.js')}}"></script>
   <script src="{{asset('admin/assets/plugins/chart.js/Chart.min.js')}}"></script>
   <script src="{{asset('admin/assets/plugins/datatables/datatables.min.js')}}"></script>

   <!-- Counter-Up-->
   <script src="{{asset('admin/assets/plugins/waypoints/lib/jquery.waypoints.min.js')}}"></script>
   <script src="{{asset('admin/assets/plugins/counterup/jquery.counterup.min.js')}}"></script>

   <!-- dataTabled data -->
   <script src="{{asset('admin/assets/data/data_datatables.js')}}"></script>

   <!-- Charts data -->
   <script src="{{asset('admin/assets/data/data_charts_dashboard.js')}}"></script>
   <script src="{{asset('admin/assets/plugins/summernote/summernote-bs4.min.js')}}"></script>
   <script>

    $(function () {
      $('.select2').select2()
    })

    $('.summernote').summernote();

    $(document).on('ready', function() {
            // data-tables
            $('#dataTable').DataTable({
              data: dataSet,
              columns: [{
                title: "Name"
              }, {
                title: "Position"
              }, {
                title: "Office"
              }, {
                title: "Extn."
              }, {
                title: "Date"
              }, {
                title: "Salary"
              }]
            });

            // counter-up
            $('.counter').counterUp({
              delay: 10,
              time: 600
            });
          });

        </script>
        <!-- END Java Script for this page -->

      </body>

      </html>
