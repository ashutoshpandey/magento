<!DOCTYPE html>
<!--[if lt IE 7]> <html class="ie ie6 lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="ie ie7 lt-ie9 lt-ie8"        lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="ie ie8 lt-ie9"               lang="en"> <![endif]-->
<!--[if IE 9]>    <html class="ie ie9"                      lang="en"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-ie">
<!--<![endif]-->

<head>
    <title>User Dashboard</title>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]><script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script><script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script><![endif]-->
    <!-- Bootstrap CSS-->

    {{HTML::style(asset("/public/font-awesome-4.1.0/css/font-awesome.min.css"))}}
    {{HTML::style(asset("/public/css/bootstrap.css"))}}
    {{HTML::style(asset("/public/animo/animate+animo.css"))}}
    {{HTML::style(asset("/public/datatable/css/dataTables.bootstrap.css"))}}
    {{HTML::style(asset("/public/datatable/ColVis/css/dataTables.colVis.css"))}}
    {{HTML::style(asset("/public/datepicker/css/datepicker.css"))}}
    {{HTML::style(asset("/public/timepicker/css/bootstrap-timepicker.min.css"))}}
    {{HTML::style(asset("/public/css/app.css"))}}
    {{HTML::style(asset("/public/css/expertsection.css"))}}
    {{HTML::style(asset("/public/css/pgwmodal.min.css"))}}
    {{HTML::style(asset("/public/css/usersection.css"))}}

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
                <div class="brand-logo">User Area</div>
                <div class="brand-logo-collapsed">User Area</div>
            </a>
        </div>
        <!-- END navbar header-->
        <!-- START Nav wrapper-->
        <div class="nav-wrapper">
            <!-- START Left navbar-->
            <div style="float: left; padding: 15px 0 0 30px;"><b>Welcome</b> [ <span style="color:#ff8517">{{$user_name}}</span> ]</div>
            <div style="float: left; padding: 15px 0 0 30px; color: blue">
                <span id="back-to-home"><i class="fa fa-arrow-left"></i> home</span>
            </div>
            <div style="float:right;padding: 10px;">{{HTML::image(asset("/public/img/loader.gif"), "", array("class"=>"loader"))}}</div>
            <div class="clear"></div>

        </div>

        <!-- END Search form-->
    </nav>

    @include("sub.usermenu")

    <section>
        <section class="main-content"></sction>
    </section>

    {{HTML::script(asset("/public/js/jquery-1.7.1.min.js"))}}
    {{HTML::script(asset("/public/js/bootstrap.js"))}}
    {{HTML::script(asset("/public/js/pgwmodal.min.js"))}}
    {{HTML::script(asset("/public/fastclick/fastclick.js"))}}
    {{HTML::script(asset("/public/datatable/js/jquery.dataTables.min.js"))}}
    {{HTML::script(asset("/public/datatable/js/dataTables.bootstrap.js"))}}
    {{HTML::script(asset("/public/datatable/js/dataTables.bootstrapPagination.js"))}}
    {{HTML::script(asset("/public/datatable/ColVis/js/dataTables.colVis.min.js"))}}
    {{HTML::script(asset("/public/datepicker/js/bootstrap-datepicker.js"))}}
    {{HTML::script(asset("/public/timepicker/js/bootstrap-timepicker.min.js"))}}

    {{HTML::script(asset("/public/js/user.js"))}}

    <div class="modal fade" id="user_box" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        &nbsp;
    </div>

    <div class="modal fade" id="appointment_box" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        &nbsp;
    </div>

    <span class="path" rel="{{$path}}"></span>
</body>

</html>