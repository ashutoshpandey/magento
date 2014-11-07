var path;
$(function(){
    path = $(".path").attr('rel');
    validate();
});

function validate(){
    $('#expertLoginForm').bootstrapValidator({
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
            email: {
                validators: {
                    notEmpty: {
                        message: 'The email address is required and cannot be empty'
                    },
                    emailAddress: {
                        message: 'The email address is not a valid'
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

    var frm = $("#expertLoginForm").serialize();

    $.ajax({
        url: 'isvalidexpert',
        type: 'GET',
        data: frm,
        success: function(r){

            if(r.indexOf("correct")>-1)
                window.location.replace(path+'/expert/expert-section');
            else if(r.indexOf("invalid")>-1)
                $(".msg").html("Invalid username or password");
            else
                $(".msg").html("Please try after some time");
        }
    });
}