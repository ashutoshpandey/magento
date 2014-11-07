var path;

$(function(){

    path = $(".path").attr('rel') + "/";

    //$("#search").click(getExperts);

 //   $("select[name='speciality']").change(subCategories);

//    var category_id = $("#category_id").html();
//    $("select[name='category']").val(category_id);

//    $("input[name='btnsearch']").click(getExperts);
    var category=$("#category_id").attr('rel');
    getCategories();
    getExperts(category);
});

function getCategories(){

    $.getJSON(
        path + 'categories/',
        function(categories){

            if(categories.length>0){

                for(var i=0;i<categories.length;i++){
                    var category = categories[i];

                    $(".category-content").append("<span class='" + category.id + "'>" + category.name + "</span><hr>");
                }

				$(".category-content>span").click(function(){
                    var cat=$(this).attr('class');
                    getExperts(cat);
                });
            }
        }
    );
}

function getExperts(category){

    //var subcategory_id = $("select[name='subcategory']").val();

    var country = $('.country').attr('rel');

    $.ajax({
        url: path + 'get-experts/'+category,
        type: 'GET',
        data: 'country=' + country,
        success: function(data){

            $(".specialists").html(data);

            $(".bookingtime").click(function(){
                var id = $(this).attr('rel');

                bookingForm(id);
            });

//            $(".expertprofile").click(function(){
//                var id = $(this).attr('rel');
//
//                expertProfile(id);
//            });

            $("select[name='doctor']").append("<option value='0'>-- All Doctors --</option>");
            $(".expertname").each(function(){
                var name = $(this).html();

                $("select[name='doctor']").append('<option>' + name + '</option>');
            })

            $("select[name='doctor']").change(function(){

                var docname = $(this).val();

                if(docname==0){
                    $(".expertname").parent().parent().parent().show();
                }
                else{
                    $(".expertname").each(function(){

                        if( $(this).attr('rel').trim()==docname.trim() ){
                            $(this).parent().parent().parent().show();
                        }
                        else
                            $(this).parent().parent().parent().hide();
                    });
                }
            })
        }
    });
}

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
                window.location.replace(path + 'payment/' + id);
        }
    });
}

function checkAppointmentLogin(id){

    var frm = $(".frmlogin").serialize();

    $(".loader").show();

    $(".msg").html("Checking...");

    $.ajax({
        url: path + 'check-appointment-login',
        type: 'POST',
        data: frm,
        success: function(r){

            $(".loader").hide();

            if(r.indexOf("invalid")>-1)
                $(".msg").html("Invalid email or password");
            else if(r.indexOf("correct")>-1){

                $(".loader").show();

                window.location.replace(path + "payment");
            }
        }
    });
}

function bookingDone(){

    $.ajax({
        url: path + 'check-appointment-login',
        type: 'POST',
        data: frm,
        success: function(r){

            $(".loader").show();

            $(".msg").html("");

            if(r.indexOf("dologin")>-1)
                checkAppointmentLogin(id);
            else if(r.indexOf("invalid")>-1)
                $(".msg").html("Invalid appointment, please refresh the page");
            else if(r.indexOf("done")>-1)
                window.location.replace(path + '/appointment-booked/' + id);
        }
    });

}

function expertProfile(id){

    $("#expertprofile").modal('show');

    $.ajax({
        url: path + 'expert-profile/' + id,
        type: 'GET',
        success: function(r){

            $(".loader").hide();

            $("#expertprofile").find(".modal-body").html(r);

            $(".expertmore").click(function(){

                $("#expertprofile").modal('hide');
            });
        }
    });
}
