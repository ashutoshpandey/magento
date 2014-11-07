var path;
$(function(){
    path = $(".path").attr('rel');

//    $("select[name='category_id']").change(subcategories);
 //   subcategories();
    validate();
//    $(".btn").click(registerUser);
});
function subcategories(){
    var id = $("select[name='category_id']").val();

    $.getJSON(
        path + 'subcategories/' + id,
        function(subcategories){

            if(subcategories.length>0){

                for(var i=0;i<subcategories.length;i++){
                    var subcategory = subcategories[i];

                    $("select[name='subcategory_id']").append("<option value='" + subcategory.id + "'>" + subcategory.name + "</option");
                }
            }
        }
    );
}

function validate(){
    $('#registrationForm').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        onSuccess: function(e) {
            registerUser();
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
                    },
                    different: {
                        field: 'username',
                        message: 'The password cannot be the same as username'
                    },
                    stringLength: {
                        min: 8,
                        message: 'The password must have at least 8 characters'
                    }
                }
            },
            repeat_password: {
                validators: {
                    notEmpty: {
                        message: 'The password is required and cannot be empty'
                    },
                    identical: {
                        field: 'password',
                        message: 'Password mismatch'
                    }
                }
            },
            first_name: {
                message: 'First name is not valid',
                validators: {
                    notEmpty: {
                        message: 'First name is required and cannot be empty'
                    },

                    regexp: {
                        regexp: /^[a-zA-Z0-9]+$/,
                        message: 'First name can only consist of alphabetical and number'
                    },
                }
            },
            last_name: {
                message: 'Last name is not valid',
                validators: {
                    notEmpty: {
                        message: 'Last name is required and cannot be empty'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9]+$/,
                        message: 'Last name can only consist of alphabetical and number'
                    },
                }
            },
            dob: {
                validators: {
                    notEmpty: {
                        message: 'The date of birth is required'
                    },
                    date: {
                        format: 'YYYY/MM/DD',
                        message: 'The date of birth is not valid'
                    }
                }
            },
            terms:{
                validators:{
                    choice:{
                        min: 1,
                        message: 'Please accept terms of use'
                    }
                }
            }
        }
    });
}

function registerUser(){

    var frm = $("#registrationForm").serialize();

    $.ajax({
        url: 'saveexpert',
        type: 'GET',
        data: frm,
        success: function(r){

            if(r.indexOf("done")>-1){
                window.location.replace('expert-registered');
            }
            else if(r.indexOf("duplicate")>-1)
                $(".msg").html("Email already taken...");
            else
                $(".msg").html("Please try after some time");
        }
    });
}