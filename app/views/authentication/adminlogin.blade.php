<?php $page = "login"; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Administrator Login</title>

    {{HTML::style(asset("/public/css/flexslider.css"))}}
    {{HTML::style(asset("/public/css/adminlogin.css"))}}
    {{HTML::style(asset("/public/font-awesome-4.1.0/css/font-awesome.min.css"))}}
    {{HTML::style(asset("/public/css/bootstrap.css"))}}
    {{HTML::style(asset("/public/validator/css/bootstrapValidator.css"))}}

    {{HTML::script(asset("/public/js/jquery-1.7.1.min.js"))}}
    {{HTML::script(asset("/public/js/bootstrap.js"))}}
    {{HTML::script(asset("/public/js/adminlogin.js"))}}
    {{HTML::script(asset("/public/validator/js/bootstrapValidator.js"))}}
</head>
<body>

<div class="container">
    <div class="login-form col-centered">
        <div class="col-lg-8 col-centered"><img src="public/img/logo-5.png"></div>
        <div class="clearfix"></div>
        <div class="col-lg-12 col-centered"><h1>Administrater Login</h1></div>
        <br>
        <div class="clearfix"></div>
        <div class="col-lg-10 col-centered">
            <form id="adminLoginForm" method="post" class="form-horizontal" action="#">
                <div class="form-group">
                    <div class="col-md-12 admin-input">
                        <input type="text" class="form-control" name="username" placeholder="User Name"/>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>

                <div class="form-group">
                    <div class="col-md-12 admin-input">
                        <input type="password" class="form-control" name="password" placeholder="Password"/>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </form>
        </div>
        <div class="col-lg-12 authenticate">
            <input type="button" class="btnlogin" name="btnlogin" value="Authenticate">
        </div>
        <div class="clearfix"></div>
        <span class="msg"></span>
    </div>
</div>
<span class="path" rel="{{$path}}"></span>
</body>
</html>