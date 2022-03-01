@extends('front.layout.app')
@section('title') Mohammad Forhad @endsection

@section('content')
<style>
    .or_der input {
    border: 1px solid #ececec;
    border-radius: 10px;
    height: 14px !important;
    -webkit-box-shadow: none;
    box-shadow: none;
    padding-left: 20px;
    font-size: 16px;
    width: 100%;
}

textarea {
  width: 100% !important;
  height: 100px !important;
}
</style>
<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{ url('/') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
            <span></span> Pages <span></span> My Account
        </div>
    </div>
</div>
<div class="page-content pt-150 pb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 m-auto">
                <div class="row">

                    @include('front.account.sidebar')

                    <div class="col-md-9">
                        <div class="tab-content account dashboard-content pl-50">
                            <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="mb-0">Hello {{ auth()->user()->firstname }} {{ auth()->user()->lastname }}!</h3>
                                    </div>
                                    <div class="card-body">
                                        <p>
                                            From your account dashboard. you can easily check &amp; view your recent orders<br>
                                            manage your profile, track orders and edit your password.</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="mb-0">Your Orders</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive" id="orderSection">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Order</th>
                                                        <th>Date</th>
                                                        <th>Status</th>
                                                        <th>Total</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($myOrders as $myOrder)
                                                        <tr>
                                                            <td>#{{ $myOrder->invoice_no }}</td>
                                                            <td>{{ $myOrder->created_at->format('Y-m-d h:i:s') }}</td>
                                                            <td>
                                                                @if($myOrder->status == 1)
                                                                    Processing
                                                                @elseif($myOrder->status == 2)
                                                                    Logistic Assign
                                                                @elseif($myOrder->status == 3)
                                                                    Purchased
                                                                @else
                                                                    Delivered
                                                                @endif
                                                            </td>
                                                            <td>${{ $myOrder->order_total_price }} for {{ $myOrder->total_items }} item</td>
                                                            <td>
                                                                <a href="javascript:void(0)" onclick="fetch_order_items(`{{ $myOrder->invoice_no }}`)" class="btn-small d-block">Details</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="track-orders" role="tabpanel" aria-labelledby="track-orders-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="mb-0">Orders tracking</h3>
                                    </div>
                                    <div class="card-body contact-from-area">

                                        @if(Session::has('message'))
                                            <span style="color: red;">{{ Session::get('message') }}</span>
                                        @endif

                                        <p>To track your order please enter your Order Invoice in the box below and press "Track" button. This was given to you on your receipt and in the confirmation email you should have received.</p>
                                        <div class="row">
                                            <div class="col-lg-8">
                                                {{-- <form class="contact-form-style mt-30 mb-50" action="#" method="post"> --}}
                                                    <div class="input-style mb-20">
                                                        <label>Order Invoice No</label>
                                                        <input name="order-id" id="track_invoice_no" placeholder="Enter Your Order Invoice No..." type="text">
                                                    </div>
                                                    <a class="btn btn-sm btn-success" onclick="track_order()">Track</a>
                                                {{-- </form> --}}
                                            </div>
                                        </div>

                                        <div id="trackOrderSection"></div>

                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Account Details</h5>
                                    </div>
                                    <div class="card-body">
                                        {{-- <p>Already have an account? <a href="page-login.html">Log in instead!</a></p> --}}
                                        <form method="post" name="enq" action="{{ url('account/setting') }}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label>First Name <span class="required">*</span></label>
                                                    <input required="" class="form-control" name="firstname" type="text" value="{{ $user->firstname }}">
                                                    @if ($errors->has('firstname'))
                                                        <span class="text-danger"> {{ $errors->first('firstname') }}</span>
                                                    @endif
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Last Name <span class="required">*</span></label>
                                                    <input required="" class="form-control" name="lastname" value="{{ $user->lastname }}">
                                                    @if ($errors->has('lastname'))
                                                        <span class="text-danger"> {{ $errors->first('lastname') }}</span>
                                                    @endif
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Email Address <span class="required">*</span></label>
                                                    <input required="" class="form-control" name="email" type="email" value="{{ $user->email }}">
                                                    @if ($errors->has('email'))
                                                        <span class="text-danger"> {{ $errors->first('email') }}</span>
                                                    @endif
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Phone <span class="required">*</span></label>
                                                    <input required="" class="form-control" name="phone" type="text" value="{{ $user->phone }}">
                                                    @if ($errors->has('phone'))
                                                        <span class="text-danger"> {{ $errors->first('phone') }}</span>
                                                    @endif
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>City</label>
                                                    <select name="city" id="city" class="form-control">
                                                        @foreach ($cities as $city)
                                                            <option {{ $user->city == $city->id ? 'selected' : '' }} value="{{ $city->id }}">{{ $city->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Current Address</label>
                                                    <textarea class="form-control" name="address">{{ $user->address }}</textarea>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Permanent Address</label>
                                                    <textarea class="form-control" name="parmanent_address">{{ $user->parmanent_address }}</textarea>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Birth Date </label>
                                                    <input type="date" name="birth_date" placeholder="Birth Date" value="{{ $user->birth_date }}" class="form-control">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Profile Picture </label>
                                                    <input type="file" name="user_photo" class="form-control">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Current Password</label>
                                                    <input class="form-control" name="cpassword" type="password">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>New Password</label>
                                                    <input class="form-control" name="password" type="password">
                                                    @if ($errors->has('password'))
                                                        <span class="text-danger"> {{ $errors->first('password') }}</span>
                                                    @endif
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Confirm Password</label>
                                                    <input class="form-control" name="password_confirmation" type="password">
                                                </div>
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-fill-out submit font-weight-bold" value="Submit">Save Change</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
