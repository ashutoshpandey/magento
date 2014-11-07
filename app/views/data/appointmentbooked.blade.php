<?php $page = "home"; ?>

<!DOCTYPE html>
<html>
<head>
    <title></title>

    {{HTML::style(asset("/public/css/zantama.css"))}}
    {{HTML::style(asset("/public/font-awesome-4.1.0/css/font-awesome.min.css"))}}
    {{HTML::style(asset("/public/css/bootstrap.css"))}}
</head>
<body>

<div class="container">
    <div class="section row">
        <div class="section-view row">
            <div class="row">
                <a href="{{asset('/')}}">{{HTML::image("/public/img/logo-5.png", "", array("class"=>"img-responsive"))}}</a>
            </div>

            <h4>Your appointment is booked successfully...</h4>

            <br/>

            <h4 style="color:#4fa5ff">Appointment id = {{$appointment->id}}</h4>

            <div class="row">

                <div class="col-lg-2">
                    <?php if (strlen($appointment->expert->pic) == 0) { ?>

                        <br/>
                        <li class="fa fa-user fa-4x"></li>

                    <?php } else { ?>

                        {{HTML::image(asset('public/img/experts/' . $appointment->expert->pic), '', array('class'=>'expert-full'))}}

                    <?php } ?>

                </div>

                <div class="col-lg-4">
                    <div class="expertname">Dr. {{$appointment->expert->first_name . " " .
                        $appointment->expert->last_name}}
                    </div>
                    <div class="appointment-date">
                        <br/>

                        <div class="appointment-date">{{date("d M Y", strtotime($appointment->appointment_date))}}</div>
                        <div class="appointment-time">{{date("h:i a", strtotime($appointment->appointment_date))}}</div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>

        </div>
    </div>
</div>

</body>
</html>