<?php $page = "home"; ?>

<!DOCTYPE html>
<html>
<head>
    <title></title>

    {{HTML::style(asset("/public/css/zantama.css"))}}
    {{HTML::style(asset("/public/font-awesome-4.1.0/css/font-awesome.min.css"))}}
    {{HTML::style(asset("/public/css/bootstrap.css"))}}

    {{HTML::script(asset("public/js/jquery-1.10.2.js"))}}
    {{HTML::script(asset("/public/js/bootstrap.js"))}}
    {{HTML::script(asset("public/js/jquery-ui.min.js"))}}
    {{HTML::script(asset("public/js/booking.js"))}}

</head>
<body>

<div class="container">
    @include("sub.header")

    <div class="clear"></div>
    <div class="category-box col-lg-3">
        <div class="col-lg-12 category-header">
            <h3>Categories</h3>
        </div>
        <div class="clearfix"></div>
        <div class="category-content">
        </div>
    </div>
    <div class="col-lg-9 specialist-box">
        <div class="specialists" style="width: 100%;">
            &nbsp;
        </div>
    </div>
    <div class="clear"></div>

    @include('sub.footer')
</div>

<!-- ****************************** booking form *****************************-->

<div class="modal fade" id="bookingform" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header"><h4>Book a new appointment</h4></div>
            <div class="modal-body">
                &nbsp;
            </div>
        </div>
    </div>
</div>

<!-- ****************************** Expert profile *****************************-->

<div class="modal fade" id="expertprofile" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-body">
                &nbsp;
            </div>
        </div>
    </div>
</div>

<span id="category_id" rel="{{$category_id}}"></span>
<span class="country" rel="{{$country}}"></span>
<span class="path" rel="{{$path}}"></span>
</body>
</html>