<h3>Set your availabilities
    <br>
</h3>

<div class="panel">

    <form class="frmavailability">

        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-4 col-xs-12">

                        <div class="txt-box col-lg-12">
                            <h4>Start Date</h4>
                            <input class="txt-info" type="text" name="appointment_start_date" style="width:100px"/>
                        </div>
                        <div class="txt-box col-lg-12">
                            <h4>End Date</h4>
                            <input class="txt-info" type="text" name="appointment_end_date" style="width:100px"/>
                        </div>
                        <div class="txt-box col-lg-12">
                            <h4>Start Time</h4>
                            <input class="txt-info" type="text" name="start_time" style="width:100px"/>
                        </div>
                        <div class="txt-box col-lg-12">
                            <h4>End Time</h4>
                            <input class="txt-info" type="text" name="end_time" style="width:100px"/>
                        </div>
                        <div class="txt-box col-lg-12">
                            <h4>Gap</h4>
                            <input class="txt-info" type="text" name="gap" style="width:50px" maxlength="3"/> &nbsp;
                            <label><input type="radio" name="gapoption" value="hour"/> Hour</label>&nbsp;&nbsp;
                            <label><input type="radio" name="gapoption" value="minute" checked="checked"/> Minute</label>
                        </div>
                        <div class="txt-box col-lg-12">
                            <input type="button" id="btnshow" name="btnshowavailability" class="btn btn-success" value="Generate"/> &nbsp;&nbsp;
                            <input type="button" id="btn" name="btnsaveavailability" class="btn btn-success" value="Save Availabilities"/>
                            <br/><br/>
                            <span class="msg"></span>
                        </div>

                </div>
                <div class="col-lg-4 col-xs-4 showtimes" style="padding-top: 40px;">&nbsp;</div>
            </div>
        </div>
    </form>

</div>