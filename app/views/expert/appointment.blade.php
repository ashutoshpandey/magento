<h4 style="color:#4fa5ff; margin:0">Appointment id = {{$appointment->id}}</h4>
<br/>
<div class="row">

    <div class="col-lg-8">
        <div class="appointment-date">
            <div class="appointment-date">{{date("d M Y", strtotime($appointment->appointment_date))}} &nbsp;&nbsp;&nbsp;
            {{date("h:i a", strtotime($appointment->appointment_date))}}</div>
        </div>
        <br/>
        <div class="expertname">{{$appointment->user->first_name . " " . $appointment->user->last_name}}</div>
        <br/>
        <div>Booked on : &nbsp;&nbsp;{{$appointment->created_at}}</div>
    </div>
    <div class="clear"></div>
</div>
<br/>
<div class="row">
    <div class="col-lg-8">{{$appointment->description}}</div>
    <div class="clear"></div>
</div>
