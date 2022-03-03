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
          <li class="breadcrumb-item active">User Create</li>
        </ol>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>
<!-- end row -->
<div class="container card">
  <h4 class="text-center mt-3">Create User Information</h4>
  <form method="post" action="{{route('users.store')}}" enctype="multipart/form-data">
    @csrf 
    <div class="form-group">
     <label>Name <span class="text-danger">*</span></label>
     <input type="text" name="name" class="form-control" value="{{old('name')}}"  placeholder="Name">
     @if($errors->has('name'))
     <span class="text-danger"> {{$errors->first('name')}}</span>
     @endif
   </div>
   <div class="form-group">
    <label>Email <span class="text-danger">*</span></label>
    <input type="email" name="email" value="{{old('email')}}" class="form-control"  placeholder="Email">
    @if($errors->has('email'))
    <span class="text-danger"> {{$errors->first('email')}}</span>
    @endif
  </div>
  <div class="form-group">
    <label>Password <span class="text-danger">*</span></label>
    <input type="text" name="password" value="{{old('password')}}" class="form-control" placeholder="Password">
    @if($errors->has('password'))
    <span class="text-danger"> {{$errors->first('password')}}</span>
    @endif
  </div>
  <div class="form-group">
    <label>Phone <span class="text-danger">*</span></label>
    <input type="text" name="phone" value="{{old('phone')}}" class="form-control"  placeholder="Phone">
    @if($errors->has('phone'))
    <span class="text-danger"> {{$errors->first('phone')}}</span>
    @endif
  </div>
  <div class="form-group">
    <label>Role <span class="text-danger">*</span></label>
    <select class="form-control" name="role">
      <option value="1">Admin</option>
      <option value="2">User</option>
    </select>
    @if($errors->has('role'))
    <span class="text-danger"> {{$errors->first('role')}}</span>
    @endif
  </div>
  <div class="form-group">
    <label>Image</label>
    <input type="file" name="user_photo" class="form-control">
  </div>
  <button type="submit" class="btn btn-success mt-3 mb-3">Create</button>
</form>
</div>
@endsection