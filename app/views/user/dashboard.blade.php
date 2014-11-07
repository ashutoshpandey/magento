<div class="col-md-4 col-sm-8 col-xs-6">
    <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="fa fa-clock-o"></i>
                </span>
        <div class="text-box">
            <p class="main-text" style="color: #ff4c1e">{{$next_appointment}}</p>
            <p class="text-muted"><h4>Next Appointment</h4></p>
        </div>
    </div>
</div>

<div class="col-md-3 col-sm-6 col-xs-6" style="min-width: 300px;">
    <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="fa fa-calendar-o"></i>
                </span>
        <div class="text-box">
            <p class="main-text" style="color: #ff4c1e">{{$appointment_count}}</p>
            <p class="text-muted"><h4>Appointments</h4></p>
        </div>
    </div>
</div>

<div class="clear"></div>
<br/>

<?php if(!$appointments->isEmpty()){ ?>

<!-- START DATATABLE 1 -->
<div class="row">

    <div class="panel panel-default">
        <div class="panel-body" style="border: solid 1px #ababab">

            <table id="datatable1" class="table table-striped table-hover dataTable no-footer" role="grid" aria-describedby="datatable1_info">

                <thead>
                <tr>
                    <th>Expert</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                <?php

                date_default_timezone_set('Asia/Calcutta');

                foreach($appointments as $appointment){
                    $found = true;

                    $name = $appointment->expert->first_name . " " . $appointment->expert->last_name;

                    $currentTime = date("Y-m-d H:i:s");
                    $appointmentDate = date("Y-m-d H:i:s", strtotime($appointment->appointment_date));

                    if(strtotime($currentTime) > strtotime($appointmentDate)){               // meeting started
                        $diff = strtotime($currentTime) - strtotime($appointmentDate);

                        $allowstart = $diff<15*60;
                    }
                    else{
                        $diff = strtotime($appointmentDate) - strtotime($currentTime);

                        $allowstart = $diff<10*60;             // allow user to go to meeting page when only 10 minutes or less are remaining
                    }
                ?>

                    <tr>
                        <td>{{$name}}</td>
                        <td>{{date("d F Y", strtotime($appointment->appointment_date))}}</td>
                        <td>{{date("h:i a", strtotime($appointment->appointment_date))}}</td>
                        <td style="padding-top:15px;">
                            <?php //if($allowstart){
                            if(true){?>

                                <i class="fa fa-desktop fa-1x pointer" rel="{{$appointment->id}}" title="Start Video Chat"></i> &nbsp;&nbsp;

                            <?php } ?>
                            <i class="fa fa-stethoscope fa-1x pointer" rel="{{$appointment->id}}" data-toggle="modal" title="Doctor Information"></i> &nbsp;&nbsp;
                            <i class="fa fa-search fa-1x pointer" rel="{{$appointment->id}}" title="Appointment Information"></i> &nbsp;&nbsp;
                            <i class="fa fa-times fa-1x pointer" rel="{{$appointment->id}}" title="Cancel Appointment"></i>
                        </td>
                    </tr>

                <?php
                }
                ?>

                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- END DATATABLE 1 -->
<!-- START DATATABLE 2 -->


<?php
}
?>
