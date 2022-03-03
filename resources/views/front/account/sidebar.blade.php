<div class="col-md-3">
  <div class="dashboard-menu">
    <ul class="nav flex-column" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="dashboard-tab" data-bs-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="false"><i class="fi-rs-settings-sliders mr-10"></i>Dashboard</a>
      </li>
      @if(auth()->id())
      <li class="nav-item">
        <a class="nav-link" href="{{ route('user.logout') }}"><i class="fi-rs-sign-out mr-10"></i>Logout</a>
      </li>
      @endif 
    </ul>
  </div>
</div>
