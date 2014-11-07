var path;

$(function(){

    path = $(".path").attr('rel');
//    path = "http://zantama.com/";
//    path = "";

    $(".loader").hide();

    $(".expert-section").click(function(){
        $(".nav li").removeClass("active");
        $(this).addClass("active");
        dashboard();
    });
    $(".appointments").click(function(){
        $(".nav li").removeClass("active");
        $(this).addClass("active");
        appointments();
    });
    $(".availabilities").click(function(){
        $(".nav li").removeClass("active");
        $(this).addClass("active");
        availabilities();
    });
    $(".history").click(function(){
        $(".nav li").removeClass("active");
        $(this).addClass("active");
        history();
    });
    $(".profile").click(function(){
        $(".nav li").removeClass("active");
        $(this).addClass("active");
        profile();
    });
    $('#back-to-home').click(function(){
        window.location.replace(path+'/index');
    });

    dashboard();
});

function dashboard(){

    $(".loader").show();

    $.ajax({
        url: path + '/expert/dashboard',
        success: function(data){

            $(".loader").hide();

            $(".main-content").html(data);
        }
    });
}

function profile(){

    $(".loader").show();

    $.ajax({
        url: path + '/expert/profile',
        type: 'GET',
        success: function(data){

            $(".loader").hide();

            $(".main-content").html(data);

            $("select[name='category_id']").change(function(){
                profileSubcategories();
            });

            profileSubcategories();
        }
    });
}

function profileSubcategories(){

	var category_id = $("select[name='category_id']").val();

	$.getJSON(
			path + '/expert/subcategories/' + category_id,
			function(r){

				$("select[name='subcategory_id']").empty();

				if(r.length>0){
					for(var i=0; i< r.length;i++){
						var obj = r[i];
						$("select[name='subcategory_id']").append("<option value='" + obj.id + "'>" + obj.name + "</option>");
					}
					
					var subcategory_id = $(".subcategory_id").attr('rel');
					
					$("select[name='subcategory_id']").val(subcategory_id);
				}				
			}
	);			
}

function updateProfile(){

//    $("#ifr").load(function(){
//        $(".msg").html("Profile updated...");
//    });

    return true;
}

function availabilities(){

    $(".loader").show();

    $.ajax({
        url: path + '/expert/availabilities',
        type: 'GET',
        success: function(data){

            $(".loader").hide();

            $(".main-content").html(data);

            $(".setavailability").click(setAvailabilities);

            loadAvailabilities();
        }
    });
}

function loadAvailabilities(){

    $(".loader").show();

    $.ajax({
        url: path + '/expert/load-availabilities',
        type: 'GET',
        success: function(data){

            $(".loader").hide();

            $(".availability-content").html(data);

            $(".dataTable").dataTable({'fnDrawCallback' : function(){

                $(".fa-times").click(function(){
                    var id = $(this).attr('rel');

                    cancelAvailability(id);
                });
            }});

        }
    });
}

function appointments(){

    $(".loader").show();

    $.ajax({
        url: path + '/expert/appointments',
        type: 'GET',
        success: function(data){

            $(".loader").hide();

            $(".main-content").html(data);

            $(".dataTable").dataTable({'fnDrawCallback' : function(){

                $(".fa-times").click(function(){
                    var id = $(this).attr('rel');

                    cancelAppointment(id);
                });

                $(".fa-search").click(function(){
                    var id = $(this).attr('rel');

                    appointment(id);
                });

                $(".fa-user").click(function(){
                    var id = $(this).attr('rel');

                    getUser(id);
                });

                $(".fa-desktop").click(function(){
                    var id = $(this).attr('rel');

                    startVideoChat(id);
                });
            }});

            $(".setavailability").click(setAvailabilities);
        }
    });
}

function startVideoChat(id){

    window.open(path + '/expert/video-chat/' + id);
}

function appointment(id){

    $.pgwModal({
        target: '#appointment_box',
        maxWidth: 500,
        titleBar: false
    });

    $(".loader").show();

    $.ajax({
        url: path + '/expert/appointment/' + id,
        type: 'GET',
        success: function(r){

            $(".loader").hide();

            $(".pm-content").html(r);
        }
    });
}

function cancelledAppointments(){

    $(".loader").show();

    $.getJSON(
        path + '/expert/cancelled-appointments',
        function(data){

            $(".loader").hide();

            if(data.length>0){

                var str = "";

                for(var i=0;i<data.length;i++){

                    var obj = data[i];
                }

                $(".").append(str);
            }
        }
    );
}

function history(){

    $(".loader").show();

    $.ajax({
        url: path + '/expert/history',
        type: 'GET',
        success: function(data){

            $(".loader").hide();

            $(".main-content").html(data);

            $(".dataTable").dataTable({'fnDrawCallback' : function(){

                $(".fa-search").click(function(){
                    var id = $(this).attr('rel');

                    appointment(id);
                });
            }});
        }
    });
}

function cancelAvailability(id){

    if(!confirm("Are you sure to cancel this time?"))
        return;

    $(".loader").show();

    $.ajax({
        url: path + '/expert/cancel-availability/' + id,
        type: 'GET',
        success: function(r){

            $(".loader").hide();

            if(r.indexOf("done")>-1)
                loadAvailabilities();
            else if(r.indexOf("booked")>-1)
                alert("This time is booked...");
            else
                alert("Invalid request...");
        }
    });
}

function cancelAppointment(id){

    if(!confirm("Are you sure to cancel this appointment?"))
        return;

    $(".loader").show();

    $.ajax({
        url: path + '/expert/cancel-appointment/' + id,
        type: 'GET',
        success: function(r){

            $(".loader").hide();

            appointments();
        }
    });
}

function setAvailabilities(){

    $(".loader").show();

    $.ajax({
        url: path + '/expert/set-availabilities',
        type: 'GET',
        success: function(data){

            $(".loader").hide();

            $(".main-content").html(data);

            $("input[name='appointment_start_date']").datepicker().on('changeDate', function(e){
                $('.datepicker').hide();
                getDayAvailabilities();
            });
            $("input[name='appointment_end_date']").datepicker().on('changeDate', function(e){
                $('.datepicker').hide();
                getDayAvailabilities();
            });

            $("input[name='start_time']").timepicker();
            $("input[name='end_time']").timepicker();

            $("input[name='btnshowavailability']").click(showAvailabilities);
            $("input[name='btnsaveavailability']").click(saveAvailabilities);
        }
    });
}

function showAvailabilities(){

    var appointmentStartDate = $("input[name='appointment_start_date']").val();
    var appointmentEndDate = $("input[name='appointment_end_date']").val();
    var startTime = $("input[name='start_time']").val();
    var endTime = $("input[name='end_time']").val();
    var gap = $("input[name='gap']").val();
    var gapOption = $("input[name='gapoption']:checked").val();

    var startDate = new Date(appointmentStartDate);
    var endDate = new Date(appointmentEndDate);

    var minutesToAdd = 0;

    $(".showtimes").html("&nbsp;");

    if(appointmentStartDate.length==0){
        $(".showtimes").html("Appointment start date ?");
        return;
    }

    if(appointmentEndDate.length==0){
        $(".showtimes").html("Appointment end date ?");
        return;
    }

    if(startTime.length==0){
        $(".showtimes").html("Start time ?");
        return;
    }

    if(endTime.length==0){
        $(".showtimes").html("End time ?");
        return;
    }

    if(startDate>endDate){
        $(".showtimes").html("Start time should be less than end time...");
        return;
    }

    if(gap.length==0 || isNaN(gap))
        $(".showtimes").html("Invalid gap value...");
    else{
        if(gapOption=="hour"){
            if(gap<1 || gap>6){
                $(".showtimes").html("Invalid hour gap value...");
                return;
            }

            minutesToAdd = gap * 60;      // in minutes
        }
        else if(gapOption=="minute"){
            if(gap<1 || gap>59){
                $(".showtimes").html("Invalid minute gap value...");
                return;
            }

            minutesToAdd = gap;
        }
        else
            return;
    }

    for (var dt = startDate; dt <= endDate; dt.setDate(dt.getDate() + 1)) {

        var str = dt.getFullYear() + "-" + (dt.getMonth()+1) + "-" + dt.getDate();

        var startDateTime = new Date(str + " " + startTime);
        var endDateTime = new Date(str + " " + endTime);

        var current = startDateTime;

        endDateTime=addMinutes(endDateTime,-minutesToAdd);

        while(current<=endDateTime){

            var str = "<div class='timerow'><div class='timevalue'>" + toDateTimeStr(current) + "<input type='hidden' name='availability[]' value='" + toDateTimeStr(current) + "'/></div>";
            str = str + "<div class='timeclose'><i class='fa fa-times'></i></div>";
            str = str + "<div class='clear'></div></div>"

            $(".showtimes").append(str);

            current = addMinutes(current, minutesToAdd);
        }
    }

    $(".timeclose").click(function(){
        $(this).parent().remove();
    });

}

function toDateTimeStr(dt){
    return pad(dt.getHours()) + ":" + pad(dt.getMinutes()) + " , " + pad(dt.getMonth()+1) + "/" + pad(dt.getDate()) + "/" + pad(dt.getFullYear());
}

function pad(x){
    return x<10 ? "0" + x : x;
}

function addMinutes(date, minutes) {
    return new Date(date.getTime() + minutes*60000);
}

function getDayAvailabilities(){

    var appointment_start_date_str = $("input[name='appointment_start_date']").val()
    var d_start = new Date(appointment_start_date_str);

    var appointment_end_date_str = $("input[name='appointment_end_date']").val()
    var d_end = new Date(appointment_end_date_str);

    if(d_start && d_start.getFullYear()>0 && d_end && d_end.getFullYear()>0){
        $.getJSON(
            path + '/expert/get-availabilities',
            { start_date: appointment_start_date_str, end_date: appointment_end_date_str },
            function(data){

                if(data.length>0){

                    $(".showtimes").html("");

                    for(var i=0; i<data.length; i++){

                        var obj = data[i];

                        var d = new Date(obj.appointment_date);

                        var str = "<div class='timerow'><div class='timevalue'>" + toDateTimeStr(d) + "<input type='hidden' name='availability[]' value='" + toDateTimeStr(d) + "'/></div>";
                        str = str + "<div class='timeclose'><i class='fa fa-times'></i></div>";
                        str = str + "<div class='clear'></div></div>"

                        $(".showtimes").append(str);
                    }

                    $(".timeclose").click(function(){
                       $(this).parent().remove();
                    });
                }
                else
                    $(".showtimes").html("No availabilities set...");
            }
        );
    }
}

function saveAvailabilities(){

    var data = $(".frmavailability").serialize();

    $(".loader").show();

    $.ajax({
        url: path + '/expert/save-availabilities',
        type: 'POST',
        data: data,
        success: function(data){

            $(".loader").hide();

            $(".msg").html("Availabilities set...");

            $(".txt-info").val("");
            $(".showtimes").html("");
        }
    });
}

function getUser(id){

    $.pgwModal({
        target: '#user_box',
        maxWidth: 500,
        titleBar: false
    });

    $(".loader").show();

    $.ajax({
        url: path + '/expert/user/' + id,
        type: 'GET',
        success: function(r){

            $(".loader").hide();

            $(".pm-content").html(r);
        }
    });
}