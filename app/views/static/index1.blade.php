<?php $page = "home"; ?>

<!DOCTYPE html>
<html>
<head>
    <title></title>

    {{HTML::style(asset("/public/css/flexslider.css"))}}
    {{HTML::style(asset("/public/css/style.css"))}}
    {{HTML::style(asset("/public/font-awesome-4.1.0/css/font-awesome.min.css"))}}
    {{HTML::style(asset("/public/css/bootstrap.css"))}}

    {{HTML::script(asset("/public/js/jquery-1.7.1.min.js"))}}
    {{HTML::script(asset("/public/js/jquery.flexslider-min.js"))}}
    {{HTML::script(asset("/public/js/bootstrap.js"))}}
    {{HTML::script(asset("/public/js/index.js"))}}
</head>
<body>
<div class="container">
    @include("sub.header")
</div>

<div class="clear"></div>
<div class="container">
    <div class="slider">

        <div class="flexslider">
            <ul class="slides">

                <li>
                    {{HTML::image(asset("/public/img/pc.png"))}}
                </li>

                <li>
                    {{HTML::image(asset("/public/img/responsive.png"))}}
                </li>

                <li>
                    {{HTML::image(asset("/public/img/responsiveshwcasealt.png"))}}
                </li>

                <li>
                    {{HTML::image(asset("/public/img/showcaseslider.png"))}}
                </li>
                <li>
                    {{HTML::image(asset("/public/img/c-phone.png"))}}
                </li>
                <li>
                    {{HTML::image(asset("/public/img/mob1.png"))}}
                </li>


            </ul>
        </div>
    </div>
</div>
<div class="container">

    <div class="row" style="margin-bottom: 30px;">
        <div class="section-heading col-lg-12">
            <h1>Top Experts</h1><div class="divider"></div>
            <p>Beautiful in every way!..</p>
        </div>
    </div>
    <div class="row">

        <div class="expert-box col-lg-12">
            <div class="col-lg-5 col-xs-12" style="border-right: solid 1px #adadad">
                <div class="expert-view col-lg-12">
                    <div class="expert-pic col-lg-6">{{HTML::image(asset("/public/img/pic-1.jpg"))}}</div>
                    <div class="expert-info col-lg-6"><p>Rohit Saini<br>Web developer<br>
                            Rank <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></p></div>
                    <div class="clear"></div>
                    <div class="col-lg-12"><div class="btn-apoint">Book appointment</div></div>
                </div>
                <div class="expert-view col-lg-12">
                    <div class="expert-pic col-lg-6">{{HTML::image(asset("/public/img/pic-1.jpg"))}}</div>
                    <div class="expert-info col-lg-6"><p>Rohit Saini<br>Web developer<br>
                            Rank <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></p></div>
                    <div class="clear"></div>
                    <div class="col-lg-12"><div class="btn-apoint">Book appointment</div></div>
                </div>
                <div class="clear"></div>
                <div class="col-lg-12"><h2>Are you Some expert ?</h2>
                    <p>{{HTML::link(asset("/register-expert"),"Expert Registration")}}</p>
                    <p>{{HTML::link(asset("/expert-login"), "Log in")}}</a></p>
                </div>
            </div>
            <div class="expert-work col-lg-7 col-xs-12" style="padding-left: 80px!important;">
                <div class="col-lg-12">
                    <h2>How it works...</h2></div>
                <div class="expert-video col-lg-12"></div><div class="clear"></div>
                <div class="col-lg-12">
                    <h2 style="margin-top: 20px;">About Us...</h2>
                    <p>We take support one step further by tailoring our replie to suit your knowledge
                        expectation and personality. We allways loking to improve every aspect of our business.
                        We only use high quality images in our design. Review,evaluate and help,Evolve your programme.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container" style=" padding-bottom: 50px; background-color: #262626;">
        <div class="footer">
            <div class="footer-view col-lg-12">
                <div class="footer-box col-lg-4 col-xs-12">
                    <p><a href="#">Term of use</a><br>
                        <a href="#">Term of policy</a><br>
                        <a href="#">Why us ?</a></p>
                </div>
                <div class="footer-box col-lg-4 col-xs-12">
                    <p><a href="#">Money return policy</a><br>
                        <a href="#">News letter</a><br>
                        <a href="#">Offer</a></p>
                </div>
                <div class="footer-box col-lg-4 col-xs-12">
                    <p>Like us on..</p>
                    <div class="col-lg-12">
                        <div class="social-1 col-lg-2 col-xs-12"> <i class="fa fa-facebook"></i></div>
                        <div class="social-2 col-lg-2 col-xs-12"><i class="fa fa-linkedin"></i></div>
                        <div class="social-3 col-lg-2 col-xs-12"><i class="fa fa-twitter" ></i></div>
                        <div class="social-4 col-lg-2 col-xs-12"><i class="fa fa-google-plus"></i></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</body>
</html>