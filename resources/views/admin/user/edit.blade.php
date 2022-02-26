@extends('admin.layout.app')

@section('title') User Edit @endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div class="breadcrumb-holder">
                <h1 class="main-title float-left">Dashboard</h1>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">User Edit</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->
      <div class="container card">
          <h4 class="text-center mt-3">Edit User Information</h4>
         <form method="post" action="{{route('users.update',$User->id)}}" enctype="multipart/form-data">
            @csrf 
            {{method_field('PATCH')}}
           <div class="form-group">
               <label>First Name <span class="text-danger">*</span></label>
               <input type="text" name="firstname" class="form-control" value="{{$User->firstname}}"  placeholder="First Name">
               @if($errors->has('firstname'))
                 <span class="text-danger"> {{$errors->first('firstname')}}</span>
               @endif
           </div>
           <div class="form-group">
               <label>Last Name <span class="text-danger">*</span></label>
               <input type="text" name="lastname" value="{{$User->lastname}}" class="form-control"  placeholder="Last Name">
               @if($errors->has('lastname'))
                 <span class="text-danger"> {{$errors->first('lastname')}}</span>
               @endif
           </div>
           <div class="form-group">
                <label>Email <span class="text-danger">*</span></label>
                <input type="email" name="email" value="{{$User->email}}" class="form-control"  placeholder="Email">
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
            <input type="text" name="phone" value="{{$User->phone}}" class="form-control"  placeholder="Phone">
                @if($errors->has('phone'))
                <span class="text-danger"> {{$errors->first('phone')}}</span>
            @endif
           </div>
           <div class="form-group">
                <label>Role <span class="text-danger">*</span></label>
                <select class="form-control" name="role">
                    <option {{ ($User->role) == 1 ? 'selected' : '' }}  value="1">Admin</option>
                    <option {{ ($User->role) == 2 ? 'selected' : '' }}  value="2">Customer</option>
                    <option {{ ($User->role) == 3 ? 'selected' : '' }}  value="3">Logistics</option>
                    <option {{ ($User->role) == 4 ? 'selected' : '' }}  value="4">Accountant</option>
                    <option {{ ($User->role) == 5 ? 'selected' : '' }}  value="5">Cs</option>
                </select>
                @if($errors->has('role'))
                  <span class="text-danger"> {{$errors->first('role')}}</span>
                @endif
           </div>
           <div class="form-group">
                <label>Image</label>
                <img width="40px" height="40px" src="{{asset(''.$User->user_photo)}}">
                <input type="file" name="user_photo" class="form-control">
           </div>
           <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="status">
                    <option {{ ($User->active) == 1 ? 'selected' : '' }}  value="1">Active</option>
                    <option {{ ($User->active) == 0 ? 'selected' : '' }}  value="0">Inactive</option>
                </select>
           </div>
           <button type="submit" class="btn btn-success mt-3 mb-3">Update</button>
        </form>
      </div>
@endsection