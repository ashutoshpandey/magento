var path;
$(function(){
    path="http://zantama.com/";
    $(".bookingtime").click(function(){
        var id = $(this).attr('rel');
        bookingForm(id);
    });
});

function bookingForm(id){

    $("#bookingform").modal('show');

    $.ajax({
        url: path + 'booking-form/' + id,
        type: 'GET',
        success: function(r){

            $(".loader").hide();

            $("#bookingform").find(".modal-body").html(r);

            $("#bookingform").find(".bookingtime").click(function(){
                var id = $(this).attr('rel');

                $("input[name='appointment_id']").val(id);

                $("#bookingform").find(".bookingtime").removeClass("active_booking");
                $(this).addClass("active_booking");

                var date_time_full = $(this).attr('data');

                $(".full_date_time h5").html(date_time_full);
            });

            $(".btnbooknow").click(function(){
                bookAppointment();
            });

        }
    });
}

function bookAppointment(){

    var id = $("input[name='appointment_id']").val();

    $(".loader").show();

    $.ajax({
        url: path + 'book-appointment/' + id,
        type: 'GET',
        success: function(r){

            $(".loader").hide();

            /*if(r.indexOf("dologin")>-1)
             doAppointmentLogin(id);
             else if(r.indexOf("done")>-1)*/
            window.location.replace(path + '/payment/' + id);
        }
    });
}
