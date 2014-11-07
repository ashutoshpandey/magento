{{HTML::style(asset("/public/css/header.css"))}}

<nav class="navbar navbar-default" role="navigation" >
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="container" style="width: 86% !important;">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="brand" href="{{asset('/')}}">{{HTML::image("/public/img/logo-5.png", "", array("class"=>"img-responsive"))}}</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul id="navbar" class="nav navbar-nav" style="font-weight: bold; float: right;">
                <li>{{HTML::link("/index","Home")}}</li>

                <?php
                    if(isset($logged) && $logged){
                ?>

                    <li>{{HTML::link($myaccount_url, "My Dashboard")}}</li>
                    <li>{{HTML::link("/signout","Logout")}}</li>

                <?php } else { ?>

                <!-- <li><a href="#">Blog</a></li> -->
                <li><a href="#">Sign up</a>
                    <ul id="sub-register">
                        <li>{{HTML::link("/expert-register","Expert")}}</li>
                        <li>{{HTML::link("/register","User ")}}</li>
                    </ul>
                </li>
                <li><a href="#">Login</a>
                    <ul id="sub-login">
                        <li>{{HTML::link("/expert-login","Expert")}}</li>
                        <li>{{HTML::link("/user-login","User")}}</li>
                    </ul>
                </li>

                <?php } ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div>
</nav>