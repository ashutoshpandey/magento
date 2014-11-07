<?php $page = "userlogin"; ?>

<!DOCTYPE html>
<html>
<head>
    <title>User Login</title>

    {{HTML::style(asset("/public/css/flexslider.css"))}}
    {{HTML::style(asset("/public/css/login.css"))}}
    {{HTML::style(asset("/public/font-awesome-4.1.0/css/font-awesome.min.css"))}}
    {{HTML::style(asset("/public/css/bootstrap.css"))}}
    {{HTML::style(asset("/public/validator/css/bootstrapValidator.css"))}}

    {{HTML::script(asset("/public/js/jquery-1.7.1.min.js"))}}
    {{HTML::script(asset("/public/js/bootstrap.js"))}}
    {{HTML::script(asset("/public/js/userlogin.js"))}}
    {{HTML::script(asset("/public/validator/js/bootstrapValidator.js"))}}
</head>
<body>
<script>

	var wh=$(window).height();
	$(document).ready(function(){
		$(".height").css("min-height",wh-151);
	});
	$(window).resize(function(){
		wh=$(window).height();
		$(".height").css("min-height",wh-151);
	});

</script>
<style>
/*///////////Edited////////////*/
.control-label{
	text-align:left !important;
}

</style>
<div class="container">
    @include("sub.header")
</div>
<div class="height">


<div class="container user-login-box">
    <div class="login-form" style="padding-bottom: 20px;">
        <div class="row">
            <div class="heading col-lg-12">
                <div class="icon-right"><h3>Welcome back! Please login</h3></div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-lg-12 main-form" style="padding-top: 20px;">
            <div class="col-lg-6 col-xs-12" style="border-right: 1px solid #b0b0b0; padding-top: 20px;">
                <form id="userLoginForm" method="post" class="form-horizontal" action="#">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Email</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="email" />
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Password</label>
                        <div class="col-md-9">
                            <input type="password" class="form-control" name="password" />
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-9">
                        <input type="checkbox" name="remember" value="remember" /> Remember me<br /><br />
                        </div>
                    <div class="form-group">
                        <div class="col-md-5 col-md-offset-3">
                            <button type="submit" class="btn btn-default btn-primary">Login</button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                        <div class="col-md-5 col-md-offset-3">
                            <a href="#">Forgot password?</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>

                    <span class="msg"></span>
                </form>
            </div>
            <div class="col-lg-6 col-xs-12" style="padding-top: 20px;">
                <div class="col-lg-10"  style="padding-left: 50px;;"><b>New to Zantama? </b> Register now</div>
                <div class="clearfix"></div>
                <div class="col-md-8" style="padding-bottom: 10px; padding-top: 10px;">
                    <div id="buttons" style="color: #ffffff">
                        <a href="register" class="btn btn-primary" style="color: #000000;width:186px; font-weight: bold">
                            <i class="fa fa-user" style="color: #ffffff"></i><span style="color: #ffffff"> User Sign Up</span>
                        </a>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-8">
                    <div id="buttons">
                        <a href="expert-register" class="btn btn-primary" style="color: #000000;width:186px; font-weight: bold">
                            <i class="fa fa-suitcase" style="color: #ffffff"></i><span style="color: #ffffff"> Expert Sign Up</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
	<span class="path" rel="{{$path}}"></span>
</div>
</div>
@include("sub.footer")
</body>
</html>