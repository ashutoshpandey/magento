var path;

$(function(){

    //path='http://zantama.com/';
	path = $(".path").attr('rel') + "/";

    $('.user-registration').css('display','none');
    $('.payment-box').css('display','none');
    $('.appointment-box').css('display','none');

    $('.btn_login').click(function(){
        checkLogin();
    });
    $('#user_new').click(function(){
        $('.user-registration').css('display','block');
        $('.user-login').css('display','none');
    });
    $('#user_old').click(function(){
        $('.user-registration').css('display','none');
        $('.user-login').css('display','block');
    });

    $(".btncontinue").click(moveToConfirm);
    $(".btnregister").click(registerUser);
    $('.btn-logged').click(function(){
        moveToPayment();
    });
});

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
        url: path + 'saveuser',
        type: 'GET',
        data: frm,
        success: function(r){

            if(r.message.indexOf("done")>-1){
                moveToPayment();
                showFees(r.id);
            }
            else if(r.indexOf("duplicate")>-1)
                $(".msg").html("Email already taken...");
            else
                $(".msg").html("Please try after some time");
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

            if(r.message.indexOf("correct")>-1){
                moveToPayment();
                showFees(r.id);
            }
            else if(r.indexOf("invalid")>-1)
                $(".msg").html("Invalid email or password");
            else
                $(".msg").html("Please try after some time");
        }
    });
}

function moveToConfirm(){

    changeTab2();

    bookAppointment();
}

function bookAppointment(){
    var id = $("#spid").attr("rel");

    $(".loader").show();

    $.ajax({
        url: path + 'book-appointment/' + id,
        type: 'GET',
        success: function(r){

            $(".loader").hide();

            //window.location.replace(path + 'appointment-booked/' + id);
        }
    });
}

function moveToPayment(){
    $('ul .li1').removeClass('active');
    $('ul .li2').addClass('active');
    $('#user-logged').hide();
    $('.user-registration').css('display','none');
    $('.user-login').css('display','none');
    $('#user-status').css('display','none');
    $('.payment-box').css('display','block');
}

function changeTab2(){
    $('ul li').removeClass('active');
    $('ul .li3').addClass('active');

    $('.user-registration').css('display','none');
    $('.user-login').css('display','none');
    $('#user-status').css('display','none');
    $('.payment-box').css('display','none');
    $('.appointment-box').css('display','block');
}

function showFees(id){
    $.ajax({
        url: path + 'get-country/' + id,

        type: 'GET',
        success: function(r){
            if(r.indexOf("india")>-1){
                $('.bord h5>span:first-child').removeClass('feespan');
            }
            else{
                $('.bord h5>span:nth-child(2)').removeClass('feespan');
            }
        }
    });
}