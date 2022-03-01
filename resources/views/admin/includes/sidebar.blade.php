@php $url=Route::currentRouteName();  @endphp
<div class="left main-sidebar">
  <div class="sidebar-inner leftscroll">
    <div id="sidebar-menu">
      <ul>
        <li class="submenu">
          <a class="@if($url==='admin.dashboard') active @endif" href="{{route('admin.dashboard')}}">
            <i class="fas fa-bars"></i>
            <span> Dashboard </span>
          </a>
        </li>

        <!-- admin permission start -->
        @if(auth()->user()->role==1)
        <li class="submenu">
          <a id="tables" class="@if($url==='users.index' || $url==='users.create' || $url==='users.edit') active @endif" href="#">
            <i class="fas fa-table"></i>
            <span> Users </span>
            <span class="menu-arrow"></span>
          </a>
          <ul class="list-unstyled">
            <li class="@if($url==='users.index') active @endif">
              <a href="{{route('users.index')}}">List</a>
            </li>
            <li class="@if($url==='users.create') active @endif">
              <a href="{{route('users.create')}}">Add New</a>
            </li>
          </ul>
        </li>

        <li class="submenu">
          <a id="tables" class="@if($url==='urlShorten.index' || $url==='urlShorten.create' || $url==='urlShorten.edit' || $url==='urlShorten.show') active @endif" href="#">
            <i class="fas fa-table"></i>
            <span>URL </span>
            <span class="menu-arrow"></span>
          </a>
          <ul class="list-unstyled">
            <li class="@if($url==='urlShorten.index') active @endif">
              <a href="{{route('urlShorten.index')}}">List</a>
            </li>
            <li class="@if($url==='urlShorten.create') active @endif">
              <a href="{{route('urlShorten.create')}}">Add New</a>
            </li>
          </ul>
        </li>

        <li class="submenu">
          <a id="tables" class="@if($url==='report.datewise') active @endif" href="#">
            <i class="fas fa-table"></i>
            <span>Report</span>
            <span class="menu-arrow"></span>
          </a>
          <ul class="list-unstyled">
            <li class="@if($url==='report.datewise') active @endif">
              <a href="{{route('report.datewise')}}">Datewise Report</a>
            </li>
          </ul>
        </li>
        @endif
        <!-- admin permission end  -->

        <li class="submenu">
          <a href="{{ route('user.logout') }}">
            <i class="fas fa-sign-out-alt"></i>
            <span> Logout </span>
          </a>
        </li>

      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
  </div>
</div>
