var path;

$(function(){

    path = $(".path").attr('rel') + "/";

    validate();
});

function validate(){
    $('#userLoginForm').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        onSuccess: function(e) {
            checkLogin();
        },
        feedbackIcons: {
            valid: 'fa fa-check',
            invalid: 'fa fa-times',
            validating: 'fa fa-refresh'
        },
        fields: {
            username: {
                validators: {
                    notEmpty: {
                        message: 'The username is required and cannot be empty'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'The password is required and cannot be empty'
                    }
                }
            }
        }
    });
}

function checkLogin(){

    var frm = $("#userLoginForm").serialize();

    $.ajax({
        url: path + 'isvaliduser',
        type: 'GET',
        data: frm,
        success: function(r){

            if(r.message.indexOf("correct")>-1)
                window.location.replace(path + 'user/user-section');
            else if(r.message.indexOf("invalid")>-1)
                $(".msg").html("Invalid email or password");
            else
                $(".msg").html("Please try after some time");
        }
    });
}