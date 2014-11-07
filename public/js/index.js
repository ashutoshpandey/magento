var path;

$(function(){
    path = $(".path").attr('rel') + "/";
    var logged = $(".logged").attr('rel');
    if(!logged)
        selectCountry();

    $('.combobox').scombobox();

    $('.register-expert').click(function(){
        window.location.replace("/register-expert");
    });
    $('.register-user').click(function(){
        window.location.replace("/register");
    });

    $("#btn-search-doctor").click(function(){

        var x = $("select[name='category']").val();

        if(x!="Select Category"){

            var url = "experts/" + x;

            window.location.replace(url);
        }
    });

    var images=new Array('public/img/slider/banner1.jpg','public/img/slider/banner2.jpg','public/img/slider/banner3.jpg','public/img/slider/banner4.jpg','public/img/slider/banner5.jpg');
    var nextimage=0;

    doSlideshow();

    function doSlideshow()
    {
        if($('.slideshowimage').length!=0)
        {
            $('.slideshowimage').fadeOut(500,function(){slideshowFadeIn();$(this).remove()});
        }
        else
        {
            slideshowFadeIn();
        }
    }
    function slideshowFadeIn()
    {
        $('.section-right').prepend($('<img class="slideshowimage" src="'+images[nextimage++]+'" style="display:none">').fadeIn(200,function(){setTimeout(doSlideshow,1000);}));
        if(nextimage>=images.length)
            nextimage=0;
    }
    $('.scombobox-display').attr('placeholder','Select Category / Search Specialist');
    $(".scombobox-list p span").append("<span style='color: red'></span>");
    $('.scombobox-display').keypress(loadSpecialist);
//    categories();

    $("select[name='category']").change(function(){

        var x = $("select[name='category']").val();

        if(x!="Select Category"){

            var url = "experts/" + x;

            window.location.replace(url);
        }
    });
});

function selectCountry(){

    var country=$('.country').attr('rel');

    $('#country-modal').modal({
        backdrop: 'static',
        keyboard: false
    });
    $('#country-modal').modal('show');

    $('#country').change(function(){
        var country=$('#country').val();
        $.ajax({
            url: path + 'set-country/' + country
        });
        $('#country-modal').modal('hide');
    });
}

function loadSpecialist(){
    var val=$('.scombobox-display').val();

    $.getJSON(
        path + 'load-specialist',
        function(specialists){
            $(".scombobox-list").empty();
            loadCategories();
            if(specialists.length>0){

                for(var i=0;i<specialists.length;i++){
                    var specialist = specialists[i];
                    if(specialist.first_name.toLowerCase().indexOf(val.toLowerCase())>-1)
                        $(".scombobox-list").append("<p>" + specialist.first_name + " <span style='color: red'></span> </p>");
                }
            }
        }
    )
}

function loadCategories(){
    var val=$('.scombobox-display').val();
    $.getJSON(
        path + 'categories',
        function(categories){

            if(categories.length>0){

                for(var i=0;i<categories.length;i++){
                    var category = categories[i];
                    if(category.name.toLowerCase().indexOf(val.toLowerCase())>-1)
                        $(".scombobox-list").append("<p>" + category.name + " <span style='color: red'>in speciality</span> </p>");
                    //$("select[name='category']").append("<option value='" + category.name + "'>" + category.name + "</option>");
                }

                $("select[name='category']").change(subcategories);

                subcategories();
            }
        }
    );
}
function categories(){
    $.getJSON(
        path + 'categories',
        function(categories){

            if(categories.length>0){

                for(var i=0;i<categories.length;i++){
                    var category = categories[i];

                    $("select[name='category']").append("<option value='" + category.name + "'>" + category.name + "</option>");
                }

                $("select[name='category']").change(subcategories);

                subcategories();
            }
        }
    );
}

function subcategories(){

    var id = $("select[name='category']").val();

    $.getJSON(
        path + 'subcategories/' + id,
        function(subcategories){

            if(subcategories.length>0){

                for(var i=0;i<subcategories.length;i++){
                    var subcategory = subcategories[i];

                    $("select[name='subcategory']").append("<option value='" + subcategory.id + "'>" + subcategory.name + "</option");
                }
            }
        }
    );
}
$(document).ready(function(){
    $("#menu-btn").click(function(){
        $(".navigation").animate({
            'margin-right':0
        },500)
         $("#menu-btn").animate({'opacity':0},300)
    })
    $(".navigation button").click(function(){
        $(".navigation").animate({
            'margin-right':'-210px'
        },500)
       $("#menu-btn").animate({'opacity':1},300)
    })
    $('a[rel="login"]').click(function(){
        $("#login").slideDown("slow")
        $("#register").slideUp("slow")
    })
    $('a[rel="register"]').click(function(){
        $("#register").slideDown("slow")
        $("#login").slideUp("slow")
    })
})