<?php $page = "register"; ?>

<!DOCTYPE html>
<html>
<head>
    <title>You are registered</title>

    {{HTML::style(asset("/public/font-awesome-4.1.0/css/font-awesome.min.css"))}}
    {{HTML::style(asset("/public/css/bootstrap.css"))}}

    {{HTML::script(asset("/public/js/jquery-1.7.1.min.js"))}}
</head>
<body>
@include("sub.header")
<div class="container">
</div>

<div class="container" style="height: 400px">
    <div class="signup-form col-lg-12" style="text-align: center">
        <h2>Congratulations !</h2>
        <h3>You are registered successfully</h3>
    </div>
</div>
@include('sub.footer')
</body>
</html>