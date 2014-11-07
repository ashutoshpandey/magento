{{HTML::style(asset("/public/css/header.css"))}}

<nav id="myNavbar" class="navbar navbar-default" role="navigation" style="background-color: white; padding-bottom: 10px; border-bottom: 1px solid #a2a2a2; border-radius: 0;">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="container" style="width: 86% !important;">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a style="padding: 0 !important;" class="navbar-brand" href="{{asset('/')}}">{{HTML::image("/public/img/logo-5.png", "", array("class"=>"img-responsive"))}}</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul id="navbar" class="nav navbar-nav" style="font-weight: bold; float: right;">
                <li>{{HTML::link("/index","Home")}}</li>

                <?php
                    if(isset($logged) && $logged){
                ?>

                    <li>{{HTML::link($myaccount_url, "My Account")}}</li>
                    <li>{{HTML::link("/signout","Logout")}}</li>

                <?php } else { ?>

                <li><a href="#">Blog</a></li>
                <li><a href="#">Registration</a>
                    <ul id="navbar">
                        <li>{{HTML::link("/expert-register","Specialist Registration")}}</li>
                        <li>{{HTML::link("/register","User Registration")}}</li>
                    </ul>
                </li>
                <li><a href="#">Login</a>
                    <ul id="navbar">
                        <li>{{HTML::link("/expert-login","Specialist Login")}}</li>
                        <li>{{HTML::link("/user-login","User Login")}}</li>
                    </ul>
                </li>

                <?php } ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div>
</nav>
<!--<div class="header col-lg-12">

        <div class="top-menu col-lg-8" >
            <div class="menu-heading">
                &nbsp;
            </div>
        </div>
        <div class="btn-group col-lg-4">
            <div class="menu-btn">
                <div class="button">
                    {{HTML::link(asset("/"),"Home")}}
                </div>

            </div>
            <div class="menu-btn">
                <div class="button">
                    {{HTML::link(asset("/"),"Blog")}}
                </div>
            </div>
            <div style="float: left">
                <div id="buttons">
                    <a href="#" class="btn blue">Login</a>
                    <!--{{HTML::link(asset("/user-login"),"User")}}-->
      <!--      </div>
        </div>
        <div>
            <div id="buttons">
                <a href="#" class="btn green">Register</a>
                <!--{{HTML::link(asset("/register"),"Sign Up")}}-->
            <!--</div>
        </div>
    </div>-->
<!--</div>-->
<script>
    $('.green').mouseover(function(){
        $('.register-menu').css('display','block');
    });
    $('.blue').mouseover(function(){
        $('.login-menu').css('display','block');
    });
</script>