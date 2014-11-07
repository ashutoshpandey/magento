{{HTML::script(asset("/public/validator/css/bootstrapValidator.css"))}}
<h3>Create a new expert
    <br>
</h3>

<div class="panel" style="padding-top: 20px;">
    <form id="registrationForm" method="post" enctype="multipart/form-data" target="ifr" action="save-expert" onsubmit="return saveExpert()">
        <div class="col-lg-6">
            <div class="form-group">
                <label class="col-md-4 control-label">Category</label>
                <div class="col-md-8">
                    <select name="category_id">
                        <?php
                            foreach($categories as $category){
                                echo "<option value='$category->id'>$category->name</option>";
                            }
                            ?>
                    </select>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>

            <div class="form-group">
                <label class="col-md-4 control-label">Subcategory</label>
                <div class="col-md-8">
                    <select name="subcategory_id" class="form-control"></select>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>

            <div class="form-group">
                <label class="col-md-4 control-label">Email</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="email" />
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
            <div class="form-group">
                <label class="col-md-4 control-label">Password</label>
                <div class="col-md-8">
                    <input type="password" id="inputPassword" class="form-control" name="password" />
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
            <div class="form-group">
                <label class="col-md-4 control-label">Confirm Password</label>
                <div class="col-md-8">
                    <input type="password" id="inputPassword" class="form-control" name="repeat_password" />
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>

            <div class="form-group">
                <label class="col-md-4 control-label">Name</label>
                <div class="col-md-4 name-first" style="padding-right: 0">
                    <input type="text" class="form-control" name="first_name" placeholder="First Name" />
                </div>
                <div class="col-md-4 name-last"style="padding-left: 0">
                    <input type="text" class="form-control" name="last_name" placeholder="Last Name" />
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>

            <div class="form-group">
                <label class="col-md-4 control-label">Country</label>
                <div class="col-md-8">
                    <select class="form-control" name="country">
                        <option>India</option>
                        <option>Canada</option>
                        <option>America</option>
                        <option>UK</option>
                        <option>Holland</option>
                    </select>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Time Zone</label>
                <div class="col-md-8">
                    <select class="form-control" name="timezone">
                    </select>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
            <div class="form-group">
                <label class="col-md-4 control-label">Image</label>
                <div class="col-md-8">
                    <input style="width: 80%" class="form-control txt-info" type="file" name="file"/>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="col-lg-5 col-lg-offset-1">
            <div class="form-group">
                <label class="col-md-2 control-label" style="text-align: left">Fees</label>
                <div class="col-lg-5 fee" style="padding: 0; padding-top: 5px">
                    <i class="fa fa-rupee fa-lg form-control"><input type="text" name="fees-rupee"></i>
                </div>
                <div class="col-lg-5 fee" style="padding: 0; padding-top: 5px">
                    <i class="fa fa-dollar fa-lg form-control"><input type="text" name="fees-dollar"></i>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" style="text-align: left;">About</label>
                <div class="col-lg-12" style="padding-top: 5px;">
                    <textarea name="textarea" class="jqte-test form-control" style="height: 300px;"></textarea>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="form-group">
            <div class="col-md-12 col-lg-offset-5">
                <button type="submit" class="btn btn-default btn-danger">Create Expert</button>
            </div>
            <br/><br/>
            <span class="msg col-lg-offset-2" style="color: green;"></span>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </form>


<!--<form method="post" action="save-expert" enctype="multipart/form-data" target="ifr" onsubmit="return saveExpert()">

    <div class="row">
        <div class="col-lg-12">
            <div class="col-lg-6 col-xs-12">

                    <div class="txt-box col-lg-12">
                        <h4>Category</h4>
                        <select name="category_id">
                            <?php
/*                            foreach($categories as $category){
                                echo "<option value='$category->id'>$category->name</option>";
                            }
                            */?>
                        </select>
                    </div>
                    <div class="txt-box col-lg-12">
                        <h4>Sub Category</h4>
                        <select name="subcategory_id"></select>
                    </div>
                    <div class="txt-box col-lg-12">
                        <h4>Email</h4>
                        <input class="txt-info" type="text" name="email"/>
                    </div>
                    <div class="txt-box col-lg-12">
                        <h4>Password</h4>
                        <input class="txt-info" type="password" name="password"/>
                    </div>
                    <div class="txt-box col-lg-12">
                        <h4>Repeat password</h4>
                        <input class="txt-info" type="password" name="repeat_password"/>
                    </div>
                    <div class="txt-box col-lg-12">

                        <h4>Name</h4>
                        <input class="txt-info" type="text" name="first_name" style="width: 35%;">
                        <input class="txt-info" type="text" name="last_name" style="width: 35%;margin-left: 10px;">

                    </div>
                    <div class="txt-box col-lg-12">
                        <h4>Date of birth</h4>
                        <input class="txt-dob" type="text" name="month" placeholder="MM"/>
                        <input class="txt-dob" type="text" name="day" placeholder="DD"/>
                        <input class="txt-dob" type="text" name="year" placeholder="YYYY"/>
                    </div>
                    <div class="txt-box col-lg-12">
                        <h4>Country</h4>
                        <select name="country">
                            <option>India</option>
                        </select>
                    </div>
                    <div class="txt-box col-lg-12">
                        <h4>Image</h4>

                        <input class="txt-info" type="file" name="file"/>
                    </div>
                    <div class="txt-box col-lg-12">
                        <input type="submit" name="btnsaveexpert" class="btn btn-success" value="Create Expert"/>
                        <br/><br/>
                        <span class="msg"></span>
                    </div>

            </div>
        </div>
    </div>

</form>-->
<iframe id="ifr" name="ifr" style="visibility: hidden; width:1px;height:1px;"></iframe>
</div>

<!--{{HTML::script(asset("/public/validator/js/bootstrapValidator.js"))}}-->
<!--{{HTML::script(asset("/public/js/create-expert.js"))}}-->

<!--<script type="text/javascript">-->
<!--    //$("select[name='country']").val("India");-->
<!--    $('.jqte-test').jqte();-->
<!---->
<!--    // settings of status-->
<!--    var jqteStatus = true;-->
<!--    $(".status").click(function()-->
<!--    {-->
<!--        jqteStatus = jqteStatus ? false : true;-->
<!--        $('.jqte-test').jqte({"status" : jqteStatus})-->
<!--    });-->
<!--</script>-->