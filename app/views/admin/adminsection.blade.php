<!DOCTYPE html>
<!--[if lt IE 7]> <html class="ie ie6 lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="ie ie7 lt-ie9 lt-ie8"        lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="ie ie8 lt-ie9"               lang="en"> <![endif]-->
<!--[if IE 9]>    <html class="ie ie9"                      lang="en"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-ie">
<!--<![endif]-->

<head>
    <title>Admin Dashboard</title>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]><script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script><script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script><![endif]-->
    <!-- Bootstrap CSS-->

    {{HTML::style(asset("/public/font-awesome-4.1.0/css/font-awesome.min.css"))}}
    {{HTML::style(asset("/public/css/bootstrap.css"))}}
    {{HTML::style(asset("/public/animo/animate+animo.css"))}}
    {{HTML::style(asset("/public/datatable/css/dataTables.bootstrap.css"))}}
    {{HTML::style(asset("/public/datatable/ColVis/css/dataTables.colVis.css"))}}
    {{HTML::style(asset("/public/css/app.css"))}}
    {{HTML::style(asset("/public/css/pgwmodal.min.css"))}}
    {{HTML::style(asset("/public/css/adminsection.css"))}}
    {{HTML::style(asset("/public/css/jquery-te-1.4.0.css"))}}

<!--
    <link rel="stylesheet" href="vendor/animo/animate+animo.css">
    <link rel="stylesheet" href="vendor/csspinner/csspinner.min.css">

    <link rel="stylesheet" href="app/css/app.css">

    <script src="vendor/modernizr/modernizr.js" type="application/javascript"></script>
-->

</head>

<body>
<section class="wrapper">
    <!-- START Top Navbar-->
    <nav role="navigation" class="navbar navbar-default navbar-top navbar-fixed-top">
        <!-- START navbar header-->
        <div class="navbar-header">
            <a href="#" class="navbar-brand">
                <div class="brand-logo">Admin</div>
                <div class="brand-logo-collapsed">Admin</div>
            </a>
        </div>
        <!-- END navbar header-->
        <!-- START Nav wrapper-->
        <div class="nav-wrapper">
            <!-- START Left navbar-->
            <ul class="nav navbar-nav">
                <li>
                    <a href="#" data-toggle="aside">
                        <em class="fa fa-align-left"></em>
                    </a>
                </li>

            </ul>

            <div style="float:right;padding: 10px;">{{HTML::image(asset("/public/img/loader.gif"), "", array("class"=>"loader"))}}</div>
            <div class="clear"></div>

        </div>

        <!-- END Search form-->
    </nav>

    @include("sub.adminmenu")

    <section>
        <section class="main-content"></sction>
    </section>


    <div class="modal fade" id="expert_box" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        &nbsp;
    </div>

    <div class="modal fade" id="user_box" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        &nbsp;
    </div>

    <span class="path" rel="{{$path}}"></span>
</body>

{{HTML::script(asset("/public/js/jquery-1.7.1.min.js"))}}
{{HTML::script(asset("/public/js/bootstrap.js"))}}
{{HTML::script(asset("/public/js/pgwmodal.min.js"))}}
{{HTML::script(asset("/public/fastclick/fastclick.js"))}}
{{HTML::script(asset("/public/datatable/js/jquery.dataTables.min.js"))}}
{{HTML::script(asset("/public/datatable/js/dataTables.bootstrap.js"))}}
{{HTML::script(asset("/public/datatable/js/dataTables.bootstrapPagination.js"))}}
{{HTML::script(asset("/public/datatable/ColVis/js/dataTables.colVis.min.js"))}}

{{HTML::script(asset("/public/js/admin.js"))}}
{{HTML::script(asset("/public/js/jquery-te-1.4.0.min.js"))}}

</html>