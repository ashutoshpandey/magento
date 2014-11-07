<!DOCTYPE html>
<html>
<head>
    {{HTML::style(asset("/public/css/bootstrap.css"))}}
    {{HTML::style(asset("/public/css/payment.css"))}}
    {{HTML::style(asset("/public/font-awesome-4.1.0/css/font-awesome.css"))}}
    {{HTML::style(asset("/public/validator/css/bootstrapvalidator.min.css"))}}

    {{HTML::script(asset("/public/js/jquery-1.10.2.js"))}}
    {{HTML::script(asset("/public/validator/js/bootstrapvalidator.min.js"))}}
    {{HTML::script(asset("/public/js/payment.js"))}}
    <title></title>
</head>
<body>
@include("sub.help-header")
<div class="container gap">
<div class="col-lg-7 brder" style="padding: 0;">
    <div class="col-md-12" style="padding:0; padding-bottom: 20px;">
        <ul id="breadcrumb">
            <li style="width: 55px;"><a>F</a></li>
            <li class="active li1"><a>Patient Info</a></li>
            <li class="li2"><a>Payment</a></li>
            <li class="li3"><a>Confirmation</a></li>
            <li style="width: 56px;"><a>F</a></li>
        </ul>
    </div>
    <div class="clearfix"></div>
    <hr/>
    <?php
        if($logged){
    ?>
    <div class="col-lg-12" id="user-logged" style="text-align: center; min-height: 270px;">
        <br><br><br>
        <span>Welcome {{$appointment->user->first_name}} {{$appointment->user->last_name}}</span>
        <br><br>
        <input type="button" class="btn btn-primary btn-logged" value="Continue To Payment">
    </div>
    <?php
        }
        else{
    ?>
    <div class="col-lg-12 user-payoptions">
        <div class="col-md-12" id="user-status">
            <div class="col-md-6 user-status">
                <label><input id="user_new" name="user[role]" type="radio">
                    I'm new to Zantama
                </label>
            </div>
            <div class="col-md-6 user-status">
                <label><input id="user_old" name="user[role]" type="radio" checked>
                    I've used Zantama before
                </label>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="col-lg-12 user-login">
            <div class="col-lg-12" style="padding-top: 10px">
                <h4><b>Welcome Back!</b></h4>

                <p><h5>Please sign in to your account</h5></p>
            </div>
            <div class="clearfix"></div>
            <br><br>

            <form id="userLoginForm" class="form-horizontal">
                <div class="form-group">
                    <label class="col-md-3 control-label">Email</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="email"/>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group">
                    <label class="col-md-3 control-label">password</label>

                    <div class="col-md-6">
                        <input type="password" class="form-control" name="password"/>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="clearfix"></div>
                <div class="form-group">
                    <div class="col-md-5 col-md-offset-3">
                        <button type="button" class="btn btn_login btn-primary">Login</button>
                        &nbsp;&nbsp;
                        <button type="button" class="btn btn-link one" style="background-color: transparent !important;">
                            Forgot Password?
                        </button>
                        <br><br>
                        <span class="msg"></span>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </form>
        </div>
        <div class="clearfix"></div>
        <!-- Registration -->
        <div class="col-lg-12 user-registration">
            <div class="col-lg-12" style="padding-top: 10px">
                <h4><b>Sign Up</b></h4>

                <p><h5>Its free! Anyone can join</h5></p>
            </div>
            <div class="clearfix"></div>
            <br><br>

            <form id="registrationForm" method="get" class="form-horizontal" action="#">
                <div class="form-group">
                    <label class="col-md-4 control-label">Email</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="email"/>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Password</label>

                    <div class="col-md-6">
                        <input type="password" id="inputPassword" class="form-control" name="password"/>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Repeat Password</label>

                    <div class="col-md-6">
                        <input type="password" class="form-control" name="repeat_password"/>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Name</label>

                    <div class="col-md-3 col-xs-6" style="padding-right: 0">
                        <input type="text" class="form-control" name="first_name" placeholder="First Name"/>
                    </div>
                    <div class="col-md-3 col-xs-6" style="padding-left: 0; padding-right: 22px;">
                        <input type="text" class="form-control" name="last_name" placeholder="Last Name"/>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Country</label>

                    <div class="col-md-6">
                        <select class="form-control" name="country">
                            <option>India</option>
                        </select>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>

                <div class="form-group">
                    <div class="col-md-8 col-md-offset-3">
                            <span>
                                <input type="checkbox" name="terms">
                                I have read and accept</span> <a href="/terms" style="color: orange;"> Term of Use</a>
                        </span>
                    </div>
                </div>
                <div class="clearfix"></div>

                <br>

                <div class="form-group">
                    <div class="col-md-5 col-md-offset-3">
                        <button type="button" class="btn btnregister btn-primary">Register</button>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
    </div>
    <?php
    }
    ?>
    <!-- End Registration -->
    <!-- Payment -->
    <div class="col-lg-12 payment-box">
        <div class="form-group">
            <div class="col-md-5 col-md-offset-3">
                <input type="text" placeholder="Please enter above text" style="display: none">
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="col-md-12" style="min-height: 270px; text-align: center">
            <h3>Click continue to book appointment</h3>
            <br><br>
            <button type="button" class="btn btn-default btn-primary btncontinue">Continue</button>
        </div>
        <div class="clearfix"></div>

    </div>
    <!-- Payment End-->
    <div class="col-lg-12 appointment-box" style="text-align: center; min-height: 270px;">
        <h1 style="color: #00c500">Congratulations!</h1>
        <br><br>

        <h4>Your Appointment is successfully booked.</h4>
        <br>

        <h5>Check your email or {{HTML::link('user/user-section', 'View Your Zantama Account', array('class'=>'btn btn-primary'))}}</h5>
    </div>
</div>

<div class="col-lg-4 brder marg" style="margin-left: 15px">
    <div class="col-lg-12 col-xs-12 bord">
        <h4>Appointment Details</h4>
        <hr/>
    </div>

    <div class="col-lg-6 col-xs-12">
        {{HTML::image("public/img/experts/" . $appointment->expert->pic, "", array("class"=>"img-responsive"))}}
    </div>
    <div class="col-lg-6 col-xs-12">
        <h4>{{$appointment->expert->first_name . " " . $appointment->expert->last_name}}</h4>

        <p>{{$appointment->expert->qualification}}</p>

        <p>{{$appointment->expert->category->name}}</p>

        <p>
            Recomendation: 6
        </p>
    </div>

    <div class="col-lg-12 bord">
        <hr/>
        <h4>Appointment Time</h4>

        <p><b>{{$appointment->appointment_date}}</b>&nbsp; <i class="fa fa-calendar fa-3x"></i></p>
        <hr/>
        <h5>Amount Payable:&nbsp;&nbsp;&nbsp;
            <span class="feespan"><i class="fa fa-rupee"></i>{{$appointment->expert->fees_rupee}}</span>
            <span class="feespan"><i class="fa fa-dollar"></i>{{$appointment->expert->fees_dollar}}</span>
        </h5>
    </div>
</div>
<span id="spid" rel="{{$appointment->id}}"></span>
</div>
@include("sub.footer")
<!-- User Registration -->
<span class="path" rel="{{$path}}"></span>
</body>
</html>