@extends('admin.layout.app')

@section('title') Profile Edit @endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div class="breadcrumb-holder">
                <h1 class="main-title float-left">Dashboard</h1>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Profile Edit</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->
    <div class="container card">
        <h4 class="text-center mt-3">Profile Edit</h4>

        @if(Session::has('message'))
            <p style="color: green; font-weight: bold;">{{ Session::get('message') }}</p>
        @endif

         <form method="post" action="{{ route('admin.profile_update') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group row">
                <label for="firstname" class="col-sm-2">First Name <code>*</code></label>
                <div class="col-sm-4">
                    <input type="text" name="firstname" class="form-control" value="{{ getValue('firstname', $user) }}"  placeholder="Enter First Name">
                    @if($errors->has('firstname'))
                        <span class="text-danger"> {{$errors->first('firstname')}}</span>
                    @endif
                </div>
                <label for="lastname" class="col-sm-2">Last Name <code>*</code></label>
                <div class="col-sm-4">
                    <input type="text" name="lastname" class="form-control" value="{{ getValue('lastname', $user) }}"  placeholder="Enter Last Name">
                    @if($errors->has('lastname'))
                        <span class="text-danger"> {{$errors->first('lastname')}}</span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-sm-2">Email <code>*</code></label>
                <div class="col-sm-4">
                    <input type="email" name="email" class="form-control" value="{{ getValue('email', $user) }}">
                    @if($errors->has('email'))
                        <span class="text-danger"> {{$errors->first('email')}}</span>
                    @endif
                </div>
                <label for="phone" class="col-sm-2">Phone</label>
                <div class="col-sm-4">
                    <input type="text" name="phone" class="form-control" value="{{ getValue('phone', $user) }}"  placeholder="Enter Your Phone">
                </div>
            </div>

            <div class="form-group row">
                <label for="user_photo" class="col-sm-2">Profile Image</label>
                <div class="col-sm-4">
                    <input type="file" name="user_photo" class="form-control">
                </div>
                <label for="address" class="col-sm-2">Address</label>
                <div class="col-sm-4">
                    <textarea name="address" class="form-control"  placeholder="Enter Your Address">{{ getValue('address', $user) }}</textarea>
                </div>
            </div>

            <div class="form-group row">
                <label for="cpassword" class="col-sm-2">Current Password</label>
                <div class="col-sm-2">
                    <input type="password" name="cpassword" class="form-control" placeholder="Enter Current Password">
                    @if(Session::has('notMatchMessage'))
                        <span style="color: red;">{{ Session::get('notMatchMessage') }}</span>
                    @endif
                </div>
                <label for="npassword" class="col-sm-2">New Password</label>
                <div class="col-sm-2">
                    <input type="password" name="npassword" class="form-control" placeholder="Enter New Password">
                </div>
                <label for="password_confirmation" class="col-sm-2">Confirm Password</label>
                <div class="col-sm-2">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
                    @if(Session::has('notConfirmMessage'))
                        <span style="color: red;">{{ Session::get('notConfirmMessage') }}</span>
                    @endif
                </div>
            </div>

            <div class="form-group row pl-2">
                <button type="submit" class="btn btn-success mt-3 mb-3">Update Profile</button>&nbsp;&nbsp;
                <a href="{{ route('admin.dashboard') }}" class="btn btn-primary mt-3 mb-3">Cancel</a>
            </div>
        </form>
      </div>
@endsection
