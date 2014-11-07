<h3>Appointment History
    <br>
</h3>

<!-- START DATATABLE 1 -->
<div class="row">

    <div class="panel panel-default">
        <div class="panel-body">

            <?php if(!$appointments->isEmpty()){ ?>

            <table id="datatable1" class="table table-striped table-hover dataTable no-footer" role="grid" aria-describedby="datatable1_info">

                <thead>
                <tr>
                    <th>User</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Status</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                <?php

                foreach($appointments as $appointment){
                    $found = true;

                    if(is_null($appointment->user_id))
                        $user = "N/A";
                    else
                        $user = $appointment->user->first_name . " " . $appointment->user->last_name;

                    if($appointment->status==="pending")
                        $status = "Empty";
                    else if($appointment->status==="booked")
                        $status = "Booked";
                    else if($appointment->status==="patientcancelled")
                        $status = "User Cancelled";
                    else if($appointment->status==="expertcancelled")
                        $status = "You Cancelled";

                    if(is_null($appointment->description))
                        $description = "";
                ?>

                    <tr>
                        <td>{{$user}}</td>
                        <td>{{date("d F Y", strtotime($appointment->appointment_date))}}</td>
                        <td>{{date("h:i a", strtotime($appointment->appointment_date))}}</td>
                        <td>{{$status}}</td>
                        <td><i class="fa fa-search fa-1x pointer" rel="{{$appointment->id}}" title="Appointment Information"></i></td>
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


</tbody>
</table>
</div>
</div>
</div>
</div>
