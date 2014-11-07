<form class="frmbooking">
    <input type="hidden" name="appointment_id" value="{{$appointment->id}}"/>
<div>
    <h5 style="display: inline-block">Reason for your visit</h5> :
    <select name="reason">
        <option>Illness</option>
        <option>General Follow Up</option>
    </select>
</div>

<br/>

<div style="border-top: solid 1px #d3d3d3; padding-top: 10px" class="full_date_time">
    <h5>{{date("d-M-Y h:i a", strtotime($appointment->appointment_date))}}</h5>
</div>
<div style="border-top: solid 1px #d3d3d3; padding-top: 10px">
    <input type="button" class="btn btn-primary btnbooknow" value=" Book your appointment now "/>
</div>
</form>
