
            <?php if(!$appointments->isEmpty()){ ?>


            <table id="datatable1" class="table table-striped table-hover dataTable no-footer" role="grid" aria-describedby="datatable1_info">

                <thead>
                <tr>
                    <th>Date</th>
                    <th>Time</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                <?php

                foreach($appointments as $appointment){
                    $found = true;
                    ?>

                    <tr>
                        <td>{{date("d F Y", strtotime($appointment->appointment_date))}}</td>
                        <td>{{date("h:i a", strtotime($appointment->appointment_date))}}</td>
                        <td style="padding-top:15px;"><i class="fa fa-times fa-1x pointer" rel="{{$appointment->id}}" title="Cancel"></i></td>
                    </tr>

                <?php
                }
                ?>

                </tbody>
            </table>

                <?php
                } else{ echo "No availabilities..."; }
                ?>
