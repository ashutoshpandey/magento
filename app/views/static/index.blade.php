<?php $page = "home"; ?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
	<link href='http://fonts.googleapis.com/css?family=Roboto:500' rel='stylesheet' type='text/css'>
    {{HTML::style(asset("/public/css/zantama.css"))}}
    {{HTML::style(asset("/public/font-awesome-4.1.0/css/font-awesome.min.css"))}}
    {{HTML::style(asset("/public/css/bootstrap.css"))}}
    {{HTML::style(asset("/public/combo/css/jquery.scombobox.css"))}}
    {{HTML::style(asset("/public/css/select-country.css"))}}
    
    {{HTML::style(asset("/public/css/index.css"))}}
    {{HTML::script(asset("public/js/jquery-1.10.2.js"))}}
    {{HTML::script(asset("/public/js/bootstrap.js"))}}
    <!--{{HTML::script(asset("public/js/jquery-ui.min.js"))}}
    {{HTML::script(asset("public/js/jquery.ui.autocomplete.html.js"))}}
    {{HTML::script(asset("public/js/jquery.ui.autocomplete.js"))}}
    -->
    {{HTML::script(asset("public/combo/js/jquery.scombobox.js"))}}
    {{HTML::script(asset("public/combo/js/jquery.easing.min.js"))}}
    {{HTML::script(asset("public/js/index.js"))}}
<!--     <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>-->
</head>
<body class="background">
<script>

	var wh=$(window).height();
	$(document).ready(function(){
		$(".height").css("min-height",wh);
	});
	$(window).scroll(function(){
		if($(window).scrollTop>=wh){

		}
	});
	$(window).resize(function(){
		wh=$(window).height();
		$(".height").css("min-height",wh);
	});

</script>
<style>
.background{
		background: url('{{HTML::path("/public/img/background.jpg")}}');
        background-size: cover;
	}
	.overlay{
		background:  url('{{HTML::path("/public/img/pattern.png")}}') rgba(0,0,0,0.6);
        background-size: cover;
		padding-top:50px;
		text-align: center;
		COLOR: #E9EAE8;
		/* font-family: 'Roboto', sans-serif; */
        font-family: 'gothamr-l' ;
	}
    .see-expert{
		padding:0px;
	}
	.book-apointment {
		padding:0px;
	}
	.find-expert {
		padding:0px;
	}
    .sub-div-h{
		background:  url('{{HTML::path("/public/img/pattern.png")}}') rgba(0,0,0,0.3);
	}
	.sub-div-h:hover{
		background:  url('{{HTML::path("/public/img/pattern.png")}}') rgba(0,0,0,0.8);
	}
</style>
<div class=" height">
<div class="overlay height">
	<div >{{HTML::image("/public/img/logo-5.png", "", array())}}</div>
	<div class="middle">
    <button id="menu-btn"><span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span></button>
    <div class="navigation">
        <button>X</button>
        {{HTML::link("/about", "About")}}
        <?php
        if(isset($logged) && $logged){
            ?>

            {{HTML::link($myaccount_url, "My Dashboard")}}
            {{HTML::link("/signout","Logout")}}

        <?php } else { ?>

        <a rel="register">Sign Up</a>
            <div id="register">
            {{HTML::link("/expert-register","- Expert")}}
            {{HTML::link("/register","- User")}}
            </div>
            <a rel="login">Login</a>
            <div id="login">
            {{HTML::link("/expert-login","- Expert")}}
            {{HTML::link("/user-login","- User")}}
            </div>
            <?php
            }
            ?>
            <a href='{{HTML::path("/terms","Term of Use")}}'>Terms & Conditions</a>
              
    </div>
       
		<h1>ZANTAMA BRINGS TO YOU GLOBAL EXPERTS<br/>
		IN HOLISTIC WELLNESS</h1>
	</div>
	<div class="middle2">
		<p>
			The word Zantama is the transliteration of the word Shantam, which in
			Sanskrit means beneficent or salutary. Zantama facilitates a
			rendezvous between you and experts in alternative medicine and other
			well-being practices. We curate and bring  the best from all over the
			world to the privacy of your home via your computer or mobile screen.
		</p>
	</div>
	<div class="search ui-widget">
	<form id="search-doctor">
			<select id="combobox" class="select combobox" name="category"  autofocus="true">
                <?php
                    foreach($categories as $category){
                ?>
                        <option>{{$category->name}}</option>
                <?php
                    }
                ?>
			</select>
		</form>
	</div>

	<div style="padding:30px;"></div>
</div>
<div class="clearfix"></div>


</div>
<div class="clearfix"></div>

<div class="col-md-4 find-expert ">
	<div class="sub-div-h ">
		<h1>Find Expert</h1>
		<p class="white">Browse our list of top specialists.<p>
	</div>
</div>
<div class="col-md-4 book-apointment ">
	<div class="sub-div-h">
		<h1>Book Appointment</h1>
		<p class="white">See profile details, availability and location of practice. Choose a convenient time to book an appointment</p>
	</div>
</div>
<div class="col-md-4 see-expert ">
	<div class="sub-div-h ">
		<h1>See Expert</h1>
		<p class="white">

Have online interaction<p>
	</div>
</div>
<div class="clearfix"></div>
@include('sub.footer')
<!-- ****************************** Select Country *****************************-->

<div class="modal fade" id="country-modal">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header"><h4>Please select your country & timezone to continue</h4></div>
            <div class="modal-body">
                <select name="country" id="country" class="country">
                    <option hidden="hidden">Select Country</option>
                    <option value="India">India</option>
                    <option value="Canada">Canada</option>
                    <option value="America">America</option>
                    <option value="UK">UK</option>
                    <option value="Holland">Netherlands</option>
                </select>
            </div>
            <div class="modal-body">
                <select name="timezone" id="timezone" class="country">
                    <option hidden="hidden">Select Timezone</option>
                </select>
            </div>
        </div>
    </div>
</div>
<span class="country" rel="{{$country}}"></span>
<span class="logged" rel="{{$logged}}"></span>
<span class="path" rel="{{$path}}"></span>
</body>
</html>

<!--{{HTML::script(asset("public/js/crs.min.js"))}}-->