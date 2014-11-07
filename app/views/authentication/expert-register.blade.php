<?php $page = "register"; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Expert sign up</title>

    {{HTML::style(asset("/public/css/registration.css"))}}
    {{HTML::style(asset("/public/font-awesome-4.1.0/css/font-awesome.min.css"))}}
    {{HTML::style(asset("/public/css/bootstrap.css"))}}
    {{HTML::style(asset("/public/validator/css/bootstrapValidator.css"))}}

    {{HTML::script(asset("/public/js/jquery-1.7.1.min.js"))}}
    {{HTML::script(asset("/public/js/bootstrap.js"))}}
    {{HTML::script(asset("/public/js/expertregister.js"))}}
    {{HTML::script(asset("/public/validator/js/bootstrapValidator.js"))}}
    <style>
        /*///////////Edited////////////*/
        .control-label{
            text-align:left !important;
        }
    </style>

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
<div class="container">
    @include("sub.header")
</div>
<div class="height">
<div class="container">
    <div class="signup-form">
        <div class="row">
            <div class="heading col-lg-12" style="color: #041F02;">
                <h2>Expert Registration</h2>
                    <!--<p>It's free and anyone can join..</p>-->
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row" style="padding-top: 20px;">
            <div class="col-lg-6 col-xs-12 form-register">
                <form id="registrationForm" method="post" class="form-horizontal" action="#">
                    <div class="form-group">
                        <label class="col-md-4 control-label">Name</label>
                        <div class="col-md-4 col-xs-6" style="padding-right: 0">
                            <input type="text" class="form-control" name="first_name" placeholder="First Name" />
                        </div>
                        <div class="col-md-4 col-xs-6" style="padding-left: 0; padding-right: 22px;">
                            <input type="text" class="form-control" name="last_name" placeholder="Last Name" />
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Email</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="email" />
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Password</label>
                        <div class="col-md-8">
                            <input type="password" id="inputPassword" class="form-control" name="password" />
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Repeat Password</label>
                        <div class="col-md-8">
                            <input type="password" class="form-control" name="repeat_password"/>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Country</label>
                        <div class="col-md-8">
                            <select class="form-control" name="country">
                                <option value="India">India</option>
                                <option value="Canada">Canada</option>
                                <option value="America">America</option>
                                <option value="UK">UK</option>
                                <option value="Holland">Holland</option>
                            </select>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Time Zone</label>
                        <div class="col-md-8">
                            <select class="form-control" name="timezone">
                            </select>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">&nbsp;</label>
                        <div class="col-md-8">
                            <span>
                                <input type="checkbox" name="terms"> I accept the {{HTML::link("/terms","Terms and conditions")}}
                            </span>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">&nbsp;</label>
                        <div class="col-md-5">
                            <button type="submit" class="btn-primary" style="padding: 7px 20px; border-radius:5px; border:1px solid #215078">Create Account</button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <span class="msg"></span>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<span class="country" rel="{{$country}}"></span>
<span class="timezone" rel="{{$timezone}}"></span>

<span class="path" rel="{{$path}}"></span>

@include('sub.footer')
</body>
</html>