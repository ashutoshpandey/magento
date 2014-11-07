<!DOCTYPE html>
<html>
<head>
    <title>Create Table</title>

    {{HTML::style(asset("/public/css/bootstrap.css"))}}

    {{HTML::script(asset("/public/js/jquery-1.7.1.min.js"))}}
    {{HTML::script(asset("/public/js/bootstrap.js"))}}

</head>
<body>
<style>
    /*///////////Edited////////////*/
    .control-label{
        text-align:left !important;
    }
</style>

<div class="container" style="padding-top: 40px; padding-bottom: 40px;">
    <div class="table-form" style="padding-bottom: 20px;">
        <div class="clearfix"></div>
        <div class="col-lg-12 main-form" style="padding-top: 20px;">
            <div class="col-lg-12 col-xs-12" style="padding-top: 20px;">
                <form id="frmCreate" method="get" class="form-horizontal" action="q">
                    <div class="form-group">
                        <label class="col-md-2 control-label">Create Query</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="q" />
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="form-group">
                        <div class="col-md-2 col-md-offset-2">
                            <button type="submit" class="btn btn-primary">Execute</button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </form>
            </div>
         </div>
        <div class="clearfix"></div>
        <div class="col-lg-12 main-form" style="padding-top: 20px;">
            <div class="col-lg-12 col-xs-12" style="padding-top: 20px;">
                <form id="frmInsert" method="get" class="form-horizontal" action="ex">
                    <div class="form-group">
                        <label class="col-md-2 control-label">Insert Query</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="ex" />
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                        <div class="col-md-2 col-md-offset-2">
                            <button type="submit" class="btn btn-primary">Execute</button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-lg-12 main-form" style="padding-top: 20px;">
            <div class="col-lg-12 col-xs-12" style="padding-top: 20px;">
                <form id="frmInsert" method="get" class="form-horizontal" action="up">
                    <div class="form-group">
                        <label class="col-md-2 control-label">Update Query</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="up" />
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                        <div class="col-md-2 col-md-offset-2">
                            <button type="submit" class="btn btn-primary">Execute</button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>