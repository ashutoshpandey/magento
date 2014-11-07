var path;

$(function(){

    path = $(".path").attr('rel') + "/";

    $(".loader").hide();

    $(".expert-section").click(function(){
        $(".nav li").removeClass("active");
        $(this).addClass("active");
        dashboard();
    });
    $(".bookappointment").click(function(){
        $(".nav li").removeClass("active");
        $(this).addClass("active");
        //expertList();
        booknow();
    });
    $(".payments").click(function(){
        $(".nav li").removeClass("active");
        $(this).addClass("active");
        payments();
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
        window.location.replace(path+'index');
    });

    dashboard();
});

function booknow(){
    window.location.replace(path + 'booking');
}

function dashboard(){

    $(".loader").show();

    $.ajax({
        url: path + 'user/dashboard',
        success: function(data){

            $(".loader").hide();

            $(".main-content").html(data);

            $(".dataTable").dataTable({'fnDrawCallback' : function(){

                $(".fa-search").click(function(){
                    var id = $(this).attr('rel');

                    appointment(id);
                });

                $(".fa-times").click(function(){
                    var id = $(this).attr('rel');

                    cancelAppointment(id);
                });

                $(".fa-stethoscope").click(function(){
                    var id = $(this).attr('rel');

                    getExpert(id);
                });

                $(".fa-desktop").click(function(){
                    var id = $(this).attr('rel');

                    startVideoChat(id);
                });
            }});
        }
    });
}

function startVideoChat(id){

    window.open(path + 'user/video-chat/' + id);
}

function getExpert(id){

    $.pgwModal({
        target: '#expert_box',
        maxWidth: 500,
        titleBar: false
    });

    $(".loader").show();

    $.ajax({
        url: path + 'user/expert/' + id,
        type: 'GET',
        success: function(r){

            $(".loader").hide();

            $(".pm-content").html(r);
        }
    });
}

function profile(){

    $(".loader").show();

    $.ajax({
        url: path + 'user/profile',
        success: function(data){

            $(".loader").hide();

            $(".main-content").html(data);

            $("input[name='btnupdateprofile']").click(updateProfile);
        }
    });
}

function updateProfile(){

    var frm = $(".frmprofile").serialize();

    $(".loader").show();

    $.ajax({
        url: path + 'user/update-profile',
        type: 'POST',
        data: frm,
        success: function(data){

            $(".loader").hide();

            $(".msg").html("Profile updated...");
        }
    });
}

function cancelledAppointments(){

    $(".loader").show();

    $.getJSON(
        path + 'user/cancelled-appointments',
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
        url: path + 'user/history',
        type: 'GET',
        success: function(data){

            $(".loader").hide();

            $(".main-content").html(data);

            $(".dataTable").dataTable({'fnDrawCallback' : function(){

                $(".fa-search").click(function(){
                    var id = $(this).attr('rel');

                    appointment(id);
                });

                $(".fa-stethoscope").click(function(){
                    var id = $(this).attr('rel');

                    getExpert(id);
                });
            }});
        }
    });
}

function expertList(){

    $(".loader").show();

    $.ajax({
        url: path + 'user/expert-list',
        type: 'GET',
        success: function(r){

            $(".loader").hide();

            $(".main-content").html(r);

            $("select[name='category_id']").change(function(){
                loadExpertSubcategories();
            });

            loadExpertSubcategories();
        }
    });
}

function loadExpertSubcategories(){

    var category_id = $("select[name='category_id']").val();

    $.getJSON(
        path + 'user/subcategories/' + category_id,
        function(r){
            if(r.length>0){

                $("select[name='subcategory_id']").empty();

                for(var i=0; i< r.length;i++){
                    var obj = r[i];

                    $("select[name='subcategory_id']").append("<option value='" + obj.id + "'>" + obj.name + "</option>");
                }

                $("select[name='subcategory_id']").change(loadExperts);

                loadExperts();
            }
        }
    );
}

function loadExperts(){

    var category_id = $("select[name='category_id']").val();
    var subcategory_id = $("select[name='subcategory_id']").val();

    $(".loader").show();

    $.ajax({
        url: path + 'user/load-experts',
        type: 'GET',
        data: 'category_id=' + category_id + '&subcategory_id=' + subcategory_id,
        success: function(r){

            $(".loader").hide();

            $(".expert-content").html(r);

            $(".dataTable").dataTable({'fnDrawCallback' : function(){

                $(".bookingtime").click(function(){
                    var id = $(this).attr('rel');

                    bookAppointment(id);
                });
            }});
        }
    });
}

function bookAppointment(id){

    if(!confirm("Are you sure to book this appointment?"))
        return;

    $(".loader").show();

    $.ajax({
        url: path + 'user/book-appointment/' + id,
        type: 'GET',
        success: function(r){

            $(".loader").hide();

            appointmentBooked(id);
        }
    });
}

function appointmentBooked(id){

    $(".loader").show();

    $.ajax({
        url: path + 'user/appointment-booked/' + id,
        type: 'GET',
        success: function(r){

            $(".loader").hide();

            $(".panel-body").html(r);
        }
    });
}

function appointment(id){

    $.pgwModal({
        target: '#appointment_box',
        maxWidth: 500,
        titleBar: false
    });

    $(".loader").show();

    $.ajax({
        url: path + 'user/appointment/' + id,
        type: 'GET',
        success: function(r){

            $(".loader").hide();

            $(".pm-content").html(r);
        }
    });
}

function cancelAppointment(id){

    if(!confirm("Are you sure to cancel this appointment?"))
        return;

    $(".loader").show();

    $.ajax({
        url: path + 'user/cancel-appointment/' + id,
        type: 'GET',
        success: function(r){

            $(".loader").hide();

            dashboard();
        }
    });
}

function categories(){

    $(".loader").show();

    $.getJSON(
        path + 'user/categories',
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

function subCategories(){

    $(".loader").show();

    $.getJSON(
        path + 'user/subcategories',
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
