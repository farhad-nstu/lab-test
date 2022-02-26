<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Admin Login </title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
.login-form {
    width: 340px;
    margin: 50px auto;
  	font-size: 15px;
}
.login-form form {
    margin-bottom: 15px;
    background: #f7f7f7;
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    padding: 30px;
}
.login-form h2 {
    margin: 0 0 15px;
}
.form-control, .btn {
    min-height: 38px;
    border-radius: 2px;
}
.btn {
    font-size: 15px;
    font-weight: bold;
}
</style>
</head>
<body>
<div class="login-form">
    <form action="{{route('system.login.store')}}" method="post">
        @if(Session::has('message'))
          <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('message') }}</p>
        @endif
        @csrf
        <h2 class="text-center">Log in</h2>
        <label>Email</label>
        <div class="form-group">
            <input type="email" id="email" class="form-control" onchange="admin_login_email_validate()" placeholder="Enter Email" required="required" name="email" value="{{old('email')}}">
            <span id="adminLogInMessage" style="color: red;"></span>
        </div>
        <label>Password</label>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Password" required="required" name="password" value="{{old('password')}}">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block" id="adminLogInBtn">Log in</button>
        </div>
    </form>
</div>

<script>
    $("#adminLogInBtn").prop("disabled","disabled");

    function admin_login_email_validate() {
        var email = $("#email").val();

        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

        if (filter.test(email)) {
            $("#adminLogInBtn").prop("disabled", false);
            $("#adminLogInMessage").text("");
        } else {
            $("#adminLogInBtn").prop("disabled","disabled");
            $("#adminLogInMessage").text("Email is not valid. Please insert a valid email and try again.");
        }
    }
</script>
</body>
</html>
