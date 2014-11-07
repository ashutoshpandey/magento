<h3>Manage Appointments
    <br>
</h3>

<!-- START DATATABLE 1 -->
<div class="row">

    <div class="panel panel-default">
        <div class="panel-body">

            <?php if(!is_null($appointments) && !$appointments->isEmpty()){ ?>


            <table id="datatable1" class="table table-striped table-hover dataTable no-footer" role="grid" aria-describedby="datatable1_info">

                <thead>
                <tr>
                    <th>User</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                <?php

                foreach($appointments as $appointment){
                    $found = true;

                    $user = $appointment->user->first_name . " " . $appointment->user->last_name;
                    ?>

                    <tr>
                        <td>{{$user}}</td>
                        <td>{{date("d F Y", strtotime($appointment->appointment_date))}}</td>
                        <td>{{date("h:i a", strtotime($appointment->appointment_date))}}</td>
                        <td style="padding-top:15px;"><i class="fa fa-stethoscope fa-1x pointer" rel="{{$appointment->id}}" data-toggle="modal" title="Doctor Information"></i> &nbsp;&nbsp; <i class="fa fa-user fa-1x pointer" rel="{{$appointment->id}}" data-toggle="modal" title="User Information"></i> &nbsp;&nbsp; <i class="fa fa-search fa-1x pointer" rel="{{$appointment->id}}" title="Edit"></i><!-- &nbsp;&nbsp; <i class="fa fa-times fa-1x pointer" rel="{{$appointment->id}}" title="Cancel"></i>--></td>
                    </tr>

                <?php
                }  } else{ echo "No appointments..."; }
                ?>

                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- END DATATABLE 1 -->
<!-- START DATATABLE 2 -->

