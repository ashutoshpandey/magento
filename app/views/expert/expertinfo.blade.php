<?php $page = "home"; ?>

<!DOCTYPE html>
<html>
<head>
    <title></title>

    {{HTML::style(asset("/public/css/zantama.css"))}}
    {{HTML::style(asset("/public/font-awesome-4.1.0/css/font-awesome.css"))}}
    {{HTML::style(asset("/public/css/bootstrap.css"))}}
    {{HTML::style(asset("/public/css/expertinfo.css"))}}

    {{HTML::script(asset("public/js/jquery-1.10.2.js"))}}
    {{HTML::script(asset("/public/js/bootstrap.js"))}}
    {{HTML::script(asset("public/js/jquery-ui.min.js"))}}
    {{HTML::script(asset("public/js/booking-single.js"))}}
</head>
<body>
<div class="container">
    @include("sub.header")
    <div class="row expert-details-back">
        <div class="col-lg-10 col-centered">
            <div class="col-lg-5 expert-detail-data">
                <div class="row">
                    <div class="col-lg-4">
                        <?php if (strlen($expert->pic) == 0) { ?>

                            <li class="fa fa-user fa-5x"></li>

                        <?php } else { ?>

                            {{HTML::image("/public/img/experts/" . $expert->pic, "", array("class"=>"expertpic"))}}

                        <?php } ?>
                    </div>
                    <div class="col-lg-8" style="font-size: 20px;">
                        Dr. {{$expert->first_name . " " . $expert->last_name}}
                    </div>
                    <div class="col-lg-8" style="font-size: 18px; color: grey;">
                        {{$expert->category->name}}
                    </div>
                    <div class="col-lg-8" style="font-size: 16px;">
                        Fees:
                        <?php
                        if(strtoupper($country)=="INDIA"){
                            ?>
                            <i class="fa fa-rupee"></i> {{$expert->fees_rupee}}
                        <?php
                        }
                        else{
                            ?>
                            <i class="fa fa-dollar"></i> {{$expert->fees_dollar}}
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="clear"></div>
                <div class="col-lg-12" style="padding-top: 10px; padding-left: 0!important;">
                    <div class="col-md-4" style="font-size: 18px;padding-left: 0!important;">
                        <i class="fa fa-map-marker" style="color: cornflowerblue"></i>
                        {{$expert->country}}
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-12">
                    <div class="col-lg-12" style="padding-top: 20px; border-bottom: 1px dotted grey; font-size: 18px; font-weight: bold;">
                        Background
                    </div>
                    <div class="col-lg-12" style="padding-top: 20px">
                        {{$expert->about}}
                    </div>
                </div>
            </div>
            <div class="col-lg-1"></div>
            <div class="col-lg-6 expert-availabilities">
                <div class="col-lg-12" style="height: 50px; font-family: verdana, geneva, arial, helvetica, sans-serif; font-weight: bold; text-align: center">Choose a time to book with {{$expert->first_name . " " . $expert->last_name}}</div>
                <div class="col-md-12 date-header">
                    <div class="col-md-1 arrow-nav" id="previous-column"><i class="fa fa-chevron-left"></i></div>
                    <div class="table-container col-md-10">
                        <div class="sliding-window">
                            <?php
                                $flag=0;
                                $dt = "";

                                echo "<div class='timediv'>";
                                $booking_full_time = "";
                                $first = true;
                                foreach ($availabilities as $availability) {
                                    $flag=1;

                                    $dt_temp = date("Y-m-d", strtotime($availability->appointment_date));

                                    $booking_time = date("h:i a", strtotime($availability->appointment_date));

                                    if ($dt != $dt_temp) {

                                        if (!$first) {
                                            echo "</ul></div>";

                                            echo "<div class='timediv'>";
                                        }

                                        $first = false;

                                        echo "<div class='dayheader dayright'>" . date("d M Y", strtotime($availability->appointment_date)) . "</div>";

                                        $dt = date("Y-m-d", strtotime($availability->appointment_date));
                                    }

                                    echo "<div class='booktime'><span class='bookingtime' rel='" . $availability->id . "''>$booking_time</span></div>";
                                }
                                if($flag==0)
                                    echo "No time available";
                                echo "</div>";
                            ?>

                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="col-md-1 arrow-nav" id="next-column"><i class="fa fa-chevron-right"></i></div>
                </div>
                <div class="col-lg-12 no-left-padding" style="font-size: 12px; padding-top: 30px;">Share {{$expert->first_name . " " . $expert->last_name}} with your network</div>
                <div class="col-lg-12 no-left-padding" style="font-size: 20px;">
                    <i class="fa fa-facebook-square" style="color: blue"></i>
                    <i class="fa fa-twitter-square" style="color: rgba(39, 43, 239, 0.62)"></i>
                    <i class="fa fa-linkedin-square" style="color: rgba(0, 0, 255, 0.79)"></i>
                    <i class="fa fa-google-plus-square" style="color: red"></i>
                </div>
                <div class="col-lg-12 no-left-padding" style="padding-top: 20px;">
                    <div class="col-md-2 no-left-padding"><i class="fa fa-thumbs-up fa-3x" style="color: rgba(0, 0, 255, 0.80)"></i></div>
                    <div class="col-md-6 no-left-padding" style="font-size: 18px; font-weight: bold; color: #5f5f5f">Recomendation: </div>
                </div>
            </div>
            <!--<div class="col-lg-6 expert-availabilities">
                <div class="availability-slider">
                    <?php
/*                    $dt = "";

                    echo "<div class='timediv'>";
                    $booking_full_time = "";
                    $first = true;
                    foreach ($availabilities as $availability) {

                        $dt_temp = date("Y-m-d", strtotime($availability->appointment_date));

                        $booking_time = date("h:i a", strtotime($availability->appointment_date));

                        if ($dt != $dt_temp) {

                            if (!$first) {
                                echo "</ul></div>";

                                echo "<div class='timediv'>";
                            }

                            $first = false;

                            echo "<div class='dayheader dayright'>" . date("d M Y", strtotime($availability->appointment_date)) . "</div>";
                            echo "<ul class='timeul'>";

                            $dt = date("Y-m-d", strtotime($availability->appointment_date));
                        }

                        echo "<li><span class='bookingtime' rel='" . $availability->id . "''>$booking_time</span></li>";
                    }
                    echo "</ul></div>";
                    */?>

                    <div class="clear"></div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
-->    </div>

    </div>
</div>
@include('sub.footer')
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

</body>
</html>

<script>
    $('#next-column').click(function(event) {
        event.preventDefault();
        $('.table-container').animate({scrollLeft:'+=108'}, 'slow');
    });
    $('#previous-column').click(function(event) {
        event.preventDefault();
        $('.table-container').animate({scrollLeft:'-=108'}, 'slow');
    });
</script>