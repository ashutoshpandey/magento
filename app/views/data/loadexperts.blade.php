<style>
    .set-border{
        border-right: 1px solid #d3d3d3;
        border-left: 1px solid #d3d3d3;
        width: 5%;
        text-align: center;
        float: left;
    }
    .f-nav{
        position: fixed;
        top: 0;
        z-index: 999;
        max-width: 72.75%;
    }
    .availability-slider{
        overflow: hidden;
        border-left: 1px solid #d3d3d3;
        padding-left: 0 !important;
        margin-left: 1%;
        width: 60%!important;
    }
</style>

<?php if ($list) { ?>
    <nav id="myNavbar" class="time-bar navbar navbar-default navbar-inverse" role="navigation" style="border-color: #d3d3d3 !important; border-radius: 0!important; margin: 0 !important; background-color: #ffffff; padding-top: 10px;">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="nav navbar-nav navbar-right" style="width: 71.9%">
                    <div id="previous" style="color: #ffffff; cursor: pointer;float: left; width: 25px;font-size: 20px;text-align: center"><i class="fa fa-chevron-left"></i></div>
                    <div class="col-lg-11 move" style="overflow: hidden">
                        <div style="padding: 0!important; width: 500%; overflow: hidden">
                            <?php
                            for ($i = 1; $i <= 12; $i++) {
                                $current = date("l", strtotime(date("Y-m-d") . "+" . ($i - 1) . " days"));
                                $current_dt = date("d-M-Y", strtotime(date("Y-m-d") . "+" . ($i - 1) . " days"));

                                echo "<div class='set-border'>$current<br/>$current_dt</div>";
                            }
                            ?>
                        </div>
                    </div>
                    <div id="next" style="color: #ffffff; cursor: pointer;float: left; width: 25px;font-size: 20px;text-align: center"><i class="fa fa-chevron-right"></i></div>
                    <div class='clear'></div>
                </div>
            </div>
        </div>
    </nav>

        <?php

        foreach ($list as $data) {

            $expert = $data["expert"];

            $found = true;

            $name = $expert->first_name . " " . $expert->last_name;

            $availabilities = $data["availabilities"];
        ?>
        <div class="row expert-full-detail">
            <div class="expert col-lg-4" style="padding-top: 10px">
                <div class="expertpicbig col-lg-4">
                    <?php if (strlen($expert->pic) == 0) { ?>

                        <li class="fa fa-user fa-4x"></li>

                    <?php } else { ?>

                        {{HTML::image("/public/img/experts/" . $expert->pic )}}

                    <?php } ?>
                </div>
                <div class="expertdetails col-lg-8">
                    <div class="expertname col-lg-12" rel="{{$name}}">
                        {{$name}}
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-11">
                        {{$expert->qualification}}
                    </div>
                    <div class="clearfix"></div>
                    <div class="expertfees col-lg-12">
                        <h5><b>Fee: </b>
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
                        </h5>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-12" style="font-size: 15px; color: darkslateblue">
                        <i class="fa fa-map-marker"></i> {{$expert->country}}
                    </div>
                </div>

                <div class="clear"></div>
                <div class="col-lg-12" style="padding-left: 0 !important; padding-top:10px">
                    <div class="col-lg-8">
                        {{HTML::link("expert-info/" . $expert->id, "View Profile", array("class"=>"btn btn-primary expertprofile", "target"=>"_blank"))}}
                        <!--<a style="color: black" href="#" class="btn btn-default expertblog" rel="{{$expert->id}}">Blog</a>-->
                    </div>
                </div>
            </div>

            <div class="availability-slider col-lg-7">
                <div style="width: 500%; overflow: hidden;">
                    <?php
                    $flag=true;
                    $count=0;
                    for ($i = 1; $i <= 12; $i++) {

                        $dt_current = date("Y-m-d", strtotime(date("Y-m-d") . "+" . ($i - 1) . " days"));

                        $current = date("l", strtotime(date("Y-m-d") . "+" . ($i - 1) . " days"));

                        $dt = "";

                        echo "<div class='timediv' style='min-height: 214px;'>";

                        $first = true;
                        foreach ($availabilities as $availability) {

                            $dt_temp = date("Y-m-d", strtotime($availability->appointment_date));

                            if ($dt_current === $dt_temp) {
                                $flag=false;
                                echo "<div class='timeul'>";
                                echo "<div class='timedata'>";
                                $dt = date("Y-m-d", strtotime($availability->appointment_date));

                                echo "<span class='bookingtime' rel='" . $availability->id . "'>" . date("h:i a", strtotime($availability->appointment_date)) . "</span>";
                                echo "</div>";
                                echo "</div>";
                            }
                            else{
                                if($flag && $i==1){
                                    /*echo "<div style='color: red; padding-left: 10px'>No appointment today.<br>Next availability<br>$dt_temp</div>";*/
                                    $flag=false;
                                }
                                $count++;
                            }
                        }
                        /*for(;$count>0;$count--){
                            echo "<div class='timeul'>";
                                echo "<div class='timenodata'>&nbsp;</div>";
                            echo "</div>";

                        }
                        */

                        echo "</div>";
                    }
                    ?>

                    <div class="clear"></div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <?php
        }
        ?>
<?php
} else {
    echo "No doctors are available for now...";
}
?>
<script>
    $(function(){
        var nav = $('.time-bar');
        $(window).scroll(function () {
            if ($(this).scrollTop() > 100) {
                nav.addClass("f-nav");
            }
            else {
                nav.removeClass("f-nav");
            }
        });

        $('#next').click(function(event) {
            event.preventDefault();
            $('.move').animate({scrollLeft:'+=149'}, 'slow');
            $('.availability-slider').animate({scrollLeft:'+=149'}, 'slow');
        });
        $('#previous').click(function(event) {
            event.preventDefault();
            $('.move').animate({scrollLeft:'-=149'}, 'slow');
            $('.availability-slider').animate({scrollLeft:'-=149'}, 'slow');
        });
    });
</script>