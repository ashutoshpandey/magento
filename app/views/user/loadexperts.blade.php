
<?php if($list){ ?>


    <table id="datatable1" class="table table-striped table-hover dataTable no-footer" role="grid" aria-describedby="datatable1_info">

        <thead>
        <tr>
            <th>Expert</th>
            <th>Availabilities</th>
            <th></th>
        </tr>
        </thead>
        <tbody>

        <?php

        foreach($list as $data){

            $expert = $data["expert"];

            $found = true;

            $name = $expert->first_name . " " . $expert->last_name;

            $availabilities = $data["availabilities"];
        ?>

            <tr>
                <td>
                    <div class="expert">
                        <div class="expertpic">
                            <?php if(strlen($expert->pic)==0){  ?>

                                <li class="fa fa-user fa-4x"></li>

                            <?php } else{ ?>

                            {{HTML::image(asset("/public/img/experts/" . $expert->pic ))}}

                            <?php } ?>
                        </div>
                        <div class="expertdetails">
                            <div class="expertname">{{$name}}</div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </td>
                <td>
                    <div class="availability-slider">
                    <?php
                        $dt = "";

                        echo "<div class='timediv'>";
                        $first = true;
                        foreach($availabilities as $availability){

                            $dt_temp = date("Y-m-d", strtotime($availability->appointment_date));

                            if($dt!=$dt_temp){

                                if(!$first){
                                    echo "</ul></div>";

                                    echo "<div class='timediv'>";
                                }

                                $first = false;

                                echo "<div class='dayheader dayright'>" . date("d M Y", strtotime($availability->appointment_date)) . "</div>";
                                echo "<ul class='timeul'>";

                                $dt = date("Y-m-d", strtotime($availability->appointment_date));
                            }

                            echo "<li><span class='bookingtime' rel='" . $availability->id . "'>" . date("h:i a", strtotime($availability->appointment_date)) . "</span></li>";
                        }
                        echo "</ul></div>";
                    ?>

                    <div class="clear"></div>
                    </div>
                </td>
                <td></td>
            </tr>

        <?php
        }
        ?>

        </tbody>
    </table>

<?php
} else{ echo "No doctors are available for now..."; }
?>
