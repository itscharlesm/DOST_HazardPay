<!DOCTYPE html>
<html lang="en">

<head>
    <title>DOST XI</title>
    @include('components.loginhead')
</head>
<body>
<div class="container">
        <div class="card card-container">
            <img id="profile-img" class="profile-img-card" src="../../images/logo/DOST.png" style="height: 150px; width: 150px;"/>
            <p id="profile-name" class="profile-name-card"></p>
            @if($errors->any())
                <div class="alert alert-danger">
                    <i class="glyphicon glyphicon-exclamation-sign"></i> {{ $errors->first('message') }}
                </div>
            @endif
            <form action="/login" method="post" class="form-signin">
                @csrf
                <span id="reauth-email" class="reauth-email"></span>
                <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
                <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
            </form>
            <a href="#" class="forgot-password">
                Forgot the password?
            </a>
        </div>
    </div>
</body>
</html>