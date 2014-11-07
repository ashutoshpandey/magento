<?php $page = "register"; ?>

<!DOCTYPE html>
<html>
<head>
    <title>User sign up</title>

    {{HTML::style(asset("/public/css/registration.css"))}}
    {{HTML::style(asset("/public/font-awesome-4.1.0/css/font-awesome.min.css"))}}
    {{HTML::style(asset("/public/css/bootstrap.css"))}}

    {{HTML::script(asset("/public/js/jquery-1.7.1.min.js"))}}
    {{HTML::script(asset("/public/js/bootstrap.js"))}}
    {{HTML::script(asset("/public/js/register.js"))}}
</head>
<body>
<div class="container">
    @include("sub.header")
</div>

<div class="container">
    <div class="signup-form">
        <div class="row">
            <div class="heading col-lg-12">
                <div class="icon"> <i class="fa fa-users"></i></div>
                <div class="icon-right"> <h2>Sign Up</h2>
                    <p>It's free and anyone can join..</p></div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-6 col-xs-12">
                    <form class="frm">
                        <div class="txt-box col-lg-12">
                            <h4>Email</h4>
                            <input class="txt-info" type="text" name="email"/>
                        </div>
                        <div class="txt-box col-lg-12">
                            <h4>Password</h4>
                            <input class="txt-info" type="password" name="password"/>
                        </div>
                        <div class="txt-box col-lg-12">
                            <h4>Repeat password</h4>
                            <input class="txt-info" type="password" name="repeat_password"/>
                        </div>
                        <div class="txt-box col-lg-12">

                            <h4>Name</h4>
                            <input class="txt-info" type="text" name="first_name" style="width: 35%;">
                            <input class="txt-info" type="text" name="last_name" style="width: 35%;margin-left: 10px;">

                        </div>
                        <div class="txt-box col-lg-12">
                            <h4>Date of birth</h4>
                            <input class="txt-dob" type="text" name="month" placeholder="MM"/>
                            <input class="txt-dob" type="text" name="day" placeholder="DD"/>
                            <input class="txt-dob" type="text" name="year" placeholder="YYYY"/>
                        </div>
                        <div class="txt-box col-lg-12">
                            <h4>Country</h4>
                            <select name="country">
                                <option>India</option>
                            </select>
                        </div>
                        <div class="txt-box col-lg-12">
                            <h4>Gender</h4>
                            <label><input type="radio" name="gender" value="male" checked="checked"> Male</label>
                            <label><input type="radio" name="gender" value="female"> Female</label>
                        </div>
                        <div class="txt-box col-lg-12">
                            <h4>abc</h4>
                            <input type="checkbox"> I have read and accept <a href="#"> Term of Use</a>
                        </div>
                        <div class="txt-box col-lg-12">
                            <button type="button" id="btn" class="btn btn-success">Register</button>
                            <br/><br/>
                            <span class="msg"></span>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 col-xs-12">
                    <div class="signup-pic">
                        {{HTML::image(asset("/public/img/pc.png"))}}<br>
                        <div class="pic-txt">
                            A great place for all your medical needs.
                            <p>Book online instantly, no credit card required.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>