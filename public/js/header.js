$(function(){
    alert("holla");
    var path='http://zantama.com/';
    $('.register-expert').click(function(){
        $.ajax({
            url: path + '/register-expert',
            type: 'GET',
            success: function(data){
                alert("expert registered");
            }
        });
    });
});
