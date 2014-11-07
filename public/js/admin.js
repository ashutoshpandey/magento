var path;

$(function(){

    $(".loader").hide();

    path = $(".path").attr('rel') + "/";

    $(".admin-section").click(function(){
        $(".nav li").removeClass("active");
        $(this).addClass("active");
        dashboard();
    });
    $(".manage-experts").click(function(){
        $(".nav li").removeClass("active");
        $(this).addClass("active");
        manageExperts();
    });
    $(".manage-users").click(function(){
        $(".nav li").removeClass("active");
        $(this).addClass("active");
        manageUsers();
    });
    $(".payments").click(function(){
        $(".nav li").removeClass("active");
        $(this).addClass("active");
        payments();
    });
    $(".bookings").click(function(){
        $(".nav li").removeClass("active");
        $(this).addClass("active");
        appointments();
    });
    $(".categories").click(function(){
        $(".nav li").removeClass("active");
        $(this).addClass("active");
        manageCategories();
    });
    $(".subcategories").click(function(){
        $(".nav li").removeClass("active");
        $(this).addClass("active");
        manageSubcategories();
    });

    dashboard();
});

function dashboard(){

    $.ajax({
        url: path + 'admin/dashboard',
        type: 'GET',
        success: function(data){

            $(".loader").hide();

            $(".main-content").html(data);
        }
    });
}

function manageExperts(){

    $(".loader").show();

    $.ajax({
        url: path + 'admin/manage-experts',
        type: 'GET',
        success: function(data){

            $(".loader").hide();

            $(".main-content").html(data);

            $(".createexpert").click(createExpert);

            $(".dataTable").dataTable({'fnDrawCallback' : function(){

                $(".fa-times").click(function(){
                    var id = $(this).attr('rel');

                    removeExpert(id);
                });

                $(".fa-edit").click(function(){
                    var id = $(this).attr('rel');

                    editExpert(id);
                });
            }});
        }
    });
}

function createExpert(){

    $(".loader").show();

    $("input[type='text']").keyup(function(){
        $(".msgusername").html("&nbsp;");
    });

    $.ajax({
        url: path + 'admin/create-expert',
        type: 'GET',
        success: function(data){

            $(".loader").hide();

            $(".main-content").html(data);

            $(".manage-experts").click(manageExperts);

//            $("input[name='btnsaveexpert']").click(saveExpert);

            $("select[name='category_id']").change(function(){
                loadExpertSubcategories();
            });

            loadExpertSubcategories();

            $('.jqte-test').jqte();
        }
    });
}

function loadExpertSubcategories(){

    var category_id = $("select[name='category_id']").val();

    $.getJSON(
        path + 'admin/subcategories/' + category_id,
        function(r){
            if(r.length>0){
                $("select[name='subcategory_id']").empty();
                for(var i=0; i< r.length;i++){
                    var obj = r[i];
                    $("select[name='subcategory_id']").append("<option value='" + obj.id + "'>" + obj.name + "</option>");
                }
            }
        }
    );
}

function saveExpert(){

    $("#ifr").load(function(){
        $("input[type='text']").val("");
        $("input[type='password']").val("");

        $(".msg").html("Expert created successfully...");
    });

    return true;
}

function editExpert(id){

    $(".loader").show();

    $.ajax({
        url: path + 'admin/edit-expert/' + id,
        type: 'GET',
        success: function(r){

            $(".loader").hide();

            $(".main-content").html(r);

//            $("input[name='btnupdateexpert']").click(function(){
//                updateExpert(id);
//            });

            $("select[name='category_id']").change(function(){
                loadExpertSubcategories();
            });

            loadExpertSubcategories();

            $('.jqte-test').jqte();
        }
    });
}

function removeExpert(id){

    if(!confirm("Are you sure to remove this expert?"))
        return;

    $(".loader").show();

    $.ajax({
        url: path + 'admin/remove-expert/' + id,
        type: 'GET',
        success: function(r){

            $(".loader").hide();

            manageExperts();
        }
    });
}

function updateExpert(){

    $("#ifr").load(function(){
        $(".msg").html("Expert updated successfully...");
    });

    return true;
}

function manageUsers(){

    $(".loader").show();

    $.ajax({
        url: path + 'admin/manage-users',
        success: function(data){

            $(".loader").hide();

            $(".main-content").html(data);

            $(".dataTable").dataTable({'fnDrawCallback' : function(){

                $(".fa-times").click(function(){
                    var id = $(this).attr('rel');

                    removeUser(id);
                });

                $(".fa-edit").click(function(){
                    var id = $(this).attr('rel');

                    editUser(id);
                });
            }});
        }
    });
}

function editUser(id){

    $(".loader").show();

    $.ajax({
        url: path + 'admin/edit-user/' + id,
        type: 'GET',
        success: function(r){

            $(".loader").hide();

            $(".main-content").html(r);

            $("input[name='btnupdateuser']").click(function(){
                updateUser(id);
            });
        }
    });
}

function removeUser(id){

    if(!confirm("Are you sure to remove this user?"))
        return;

    $(".loader").show();

    $.ajax({
        url: path + 'admin/remove-user/' + id,
        type: 'GET',
        success: function(r){

            $(".loader").hide();

            manageUsers();
        }
    });
}

function updateUser(){

    var frm = $('.frmuser').serialize();

    $(".loader").show();

    $.ajax({
        url: path + 'admin/update-user',
        data: frm,
        type: 'POST',
        success: function(r){

            $(".loader").hide();
        }
    });
}

function editCategory(id){

    $(".loader").show();

    $.ajax({
        url: path + 'admin/edit-category/' + id,
        type: 'GET',
        success: function(r){

            $(".loader").hide();

            $(".main-content").html(r);

            $("input[name='btnupdatecategory']").click(function(){
                updateCategory(id);
            });
        }
    });
}

function removeCategory(id){

    if(!confirm("Are you sure to remove this category? All subcategory will also be deleted!"))
        return;

    $(".loader").show();

    $.ajax({
        url: path + 'admin/remove-category/' + id,
        type: 'GET',
        success: function(r){

            $(".loader").hide();

            manageCategories();
        }
    });
}

function editSubCategory(id){

    $(".loader").show();

    $.ajax({
        url: path + 'admin/edit-subcategory/' + id,
        type: 'GET',
        success: function(r){

            $(".loader").hide();

            $(".main-content").html(r);

            $("input[name='btnupdatesubcategory']").click(function(){
                updateSubCategory(id);
            });
        }
    });
}

function removeSubCategory(id){

    if(!confirm("Are you sure to remove this sub category?"))
        return;

    $(".loader").show();

    $.ajax({
        url: path + 'admin/remove-subcategory/' + id,
        type: 'GET',
        success: function(r){

            $(".loader").hide();

            manageSubcategories();
        }
    });
}

function manageCategories(){

    $(".loader").show();

    $.ajax({
        url: path + 'admin/manage-categories',
        type: 'GET',
        success: function(data){

            $(".loader").hide();

            $(".main-content").html(data);

//            $(".createcategory").click(createCategory);

            $("input[name='btnsavecategory']").click(saveCategory);

            loadCategories();
        }
    });
}

function loadCategories(){

    $(".loader").show();

    $.ajax({
        url: path + 'admin/load-categories',
        type: 'GET',
        success: function(data){

            $(".loader").hide();

            $(".categories-content").html(data);

            $(".dataTable").dataTable({'fnDrawCallback' : function(){

                $(".fa-times").click(function(){
                    var id = $(this).attr('rel');

                    removeCategory(id);
                });

                $(".fa-edit").click(function(){
                    var id = $(this).attr('rel');

                    editCategory(id);
                });
            }});
        }
    });
}

//function createCategory(){
//
//    $(".loader").show();
//
//    $.ajax({
//        url: path + '/admin/load-categories',
//        type: 'GET',
//        success: function(data){
//
//            $(".loader").hide();
//
//            $(".main-content").html(data);
//
//            $(".manage-categories").click(manageCategories);
//
//            $("input[name='btnsavecategory']").click(saveCategory);
//        }
//    });
//}

function saveCategory(){

    var frm = $(".frm").serialize();

    $.ajax({
        url: path + 'admin/save-category',
        data: frm,
        type: 'POST',
        success: function(r){
            $(".msg").html("Category created successfully...");

            $("input[type='text']").val("");

            loadCategories();
        }
    });
}

function updateCategory(id){

    var frm = $('.frmcategory').serialize();

    $(".loader").show();

    $.ajax({
        url: path + 'admin/update-category',
        data: frm + '&category_id=' + id,
        type: 'POST',
        success: function(r){

            $(".loader").hide();

            manageCategories();
        }
    });
}

function updateSubCategory(id){

    var frm = $('.frmsubcategory').serialize();

    $(".loader").show();

    $.ajax({
        url: path + 'admin/update-subcategory',
        data: frm + '&subcategory_id=' + id,
        type: 'POST',
        success: function(r){

            $(".loader").hide();

            $('.msg').html("Sub category updated...");
        }
    });
}

function manageSubcategories(){

    $(".loader").show();

    $.ajax({
        url: path + 'admin/manage-subcategories',
        type: 'GET',
        success: function(data){

            $(".loader").hide();

            $(".main-content").html(data);

            $("select[name='category_id']").change(function(){
                subcategoryTable();
            });

            subcategoryTable();

            $("input[name='btnsavesubcategory']").click(saveSubcategory);
        }
    });
}

function subcategoryTable(){

    var category_id = $("select[name='category_id']").val();

    $(".loader").show();

    $.ajax({
        url: path + 'admin/subcategory-table/' + category_id,
        type: 'GET',
        success: function(data){

            $(".loader").hide();

            $(".subcategorytable").html(data);

            $(".dataTable").dataTable({'fnDrawCallback' : function(){

                $(".fa-times").click(function(){
                    var id = $(this).attr('rel');

                    removeSubCategory(id);
                });

                $(".fa-edit").click(function(){
                    var id = $(this).attr('rel');

                    editSubCategory(id);
                });
            }});
        }
    });
}

//function createSubcategory(){
//
//    $(".loader").show();
//
//    $.ajax({
//        url: path + '/admin/create-subcategory',
//        type: 'GET',
//        success: function(data){
//
//            $(".loader").hide();
//
//            $(".main-content").html(data);
//
//            $(".manage-subcategories").click(subCategories);
//
//            $("input[name='btnsavesubcategory']").click(saveSubcategory);
//        }
//    });
//}

function saveSubcategory(){

    var frm = $(".frm").serialize();

    $.ajax({
        url: path + 'admin/save-subcategory',
        data: frm,
        type: 'POST',
        success: function(r){
            $(".msg").html("Sub category created successfully...");

            $("input[type='text']").val("");

            subcategoryTable();
        }
    });
}

function subCategories(){

    $(".loader").show();

    $.ajax({
        url: path + 'admin/subcategories',
        type: 'GET',
        success: function(data){

            $(".loader").hide();

            $(".main-content").html(data);
        }
    });
}

function appointments(){

    $(".loader").show();

    $.ajax({
        url: path + 'admin/appointments',
        type: 'GET',
        success: function(data){

            $(".loader").hide();

            $(".main-content").html(data);

            $(".dataTable").dataTable({'fnDrawCallback' : function(){

                $(".fa-stethoscope").click(function(){

                    var id = $(this).attr("rel");

                    getExpert(id);
                });

                $(".fa-user").click(function(){

                    var id = $(this).attr("rel");

                    getUser(id);
                });
            }});
        }
    });
}

function getExpert(id){

    $.pgwModal({
        target: '#expert_box',
        maxWidth: 500,
        titleBar: false
    });

    $(".loader").show();

    $.ajax({
        url: path + 'admin/expert/' + id,
        type: 'GET',
        success: function(r){

            $(".loader").hide();

            $(".pm-content").html(r);
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
        url: path + 'admin/user/' + id,
        type: 'GET',
        success: function(r){

            $(".loader").hide();

            $(".pm-content").html(r);
        }
    });
}

function cancelAppointment(id){

    $(".loader").show();

    $.ajax({
        url: path + 'admin/cancel-appointment',
        type: 'GET',
        data: 'id=' + id,
        success: function(r){

            $(".loader").hide();
        }
    });
}
