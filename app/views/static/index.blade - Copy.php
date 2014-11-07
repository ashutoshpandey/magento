<?php $page = "home"; ?>

<!DOCTYPE html>
<html>
<head>
    <title></title>

    {{HTML::style(asset("/public/css/zantama.css"))}}
    {{HTML::style(asset("/public/font-awesome-4.1.0/css/font-awesome.min.css"))}}
    {{HTML::style(asset("/public/css/bootstrap.css"))}}
    {{HTML::style(asset("/public/css/jquery.autocomplete.css"))}}

    {{HTML::script(asset("public/js/jquery-1.10.2.js"))}}
    {{HTML::script(asset("/public/js/bootstrap.js"))}}
    {{HTML::script(asset("public/js/jquery-ui.min.js"))}}
    {{HTML::script(asset("public/js/jquery.ui.autocomplete.html.js"))}}
    {{HTML::script(asset("public/js/jquery.ui.autocomplete.js"))}}
    {{HTML::script(asset("public/js/index.js"))}}
</head>
<body>

<div class="container">
    @include("sub.header")

    <div class="col-lg-12" style="text-align: center">
        <p class="lead">Your portal to connect with holistic medicine expert from the convenience of your home.</p>
    </div>
    <div class="clearfix"></div>
    <div class="col-lg-6 col-xs-12">
        <div class="section-left col-lg-10 col-xs-12">
            <div class="row lead" style="padding-top: 50px; font-size: 14px; text-align: justify">
                <p style="color: rgb(47,47,47)">Zantama is a well being market place. The word Zantama is the transliteration of the word Shantam, which in Sanskrit means beneficent or salutary. Zantama facilitates a rendezvous between you and an expert in the field of Ayurveda, Homeopathy, Nutrition, Psychology, Healing practices, among others.  We curate and bring the best from all over the world to the privacy of your home via your computer/mobile screen.</p>
            </div>
            <div class="clearfix"></div>
            <div class="col-lg-12">
                <br/>
            </div>
            <div class="clear"></div>
        </div>
    </div>

    <div class="col-lg-6 col-xs-12">
        <div class="section-right col-lg-10 col-xs-12">
            <div class="clearfix"></div>
            <div class="col-lg-12 col-xs-12">
                <br/>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="col-lg-12" style="padding-top: 10px;">
        <br/><br/>
        <div class="col-lg-6" style="margin: auto !important; float: none !important; text-align: center">
            <form id="search-doctor">
                <div class="col-lg-10" style="border: 1px solid #d3d3d3; margin: auto; padding: 0">
                    <select class="dropdown" name="category">
                        <option hidden="hidden">Select Category</option>
                    </select>
                </div>
                <div class="col-lg-2 col-xs-12 search-btn" id="btn-search-doctor">  Search  </div>
                <div class="clearfix"></div>
            </form>
        </div>
        <div class="clear"></div>
        <br/>
    </div>
    <div class="clear"></div>
    <div class="col-lg-10" style="float: none; margin: auto; padding-top: 20px;">
        <div class="col-lg-4 col-xs-12 service">
            <div class="col-lg-12 col-xs-12">
                <div class="col-lg-4 services"><img src="public/img/search.png"></div>
                <div class="col-lg-8 services-text">
                    <h4>Find Doctor</h4>
                    <p>Browse our list of top doctors by speciality and locality. We list the best</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-xs-12 service">
            <div class="col-lg-12">
                <div class="col-lg-4 services"><img src="public/img/calendar.png"></div>
                <div class="col-lg-8 services-text">
                    <h4>Book Appointment</h4>
                    <p>See profile details, availability and location of practice. Choose your convenient time and book appointment</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-xs-12 service">
            <div class="col-lg-12">
                <div class="col-lg-4 services"><img src="public/img/doctor.png"></div>
                <div class="col-lg-8 services-text">
                    <h4>See Doctor</h4>
                    <p>Have online conversation without any hassle of commute</p>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
    @include('sub.footer')
</div>
<span class="path" rel="{{$path}}"></span>
</body>
</html>