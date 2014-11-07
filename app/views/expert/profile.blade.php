<style type="text/css">
    .pic-box img{
        height: 100px;
        width: 100px;
    }
    .pic-box label{
        color: red;
    }

</style>

<h3>Update your profile
    <br>
</h3>

<div class="panel" style="background-color: #ffffff !important; padding-top: 10px;">
    <form id="registrationForm" class="frmprofile form-horizontal" method="post" action="update-profile" enctype="multipart/form-data" target="ifr" onsubmit="return updateProfile()">
        <div class="col-lg-5">
            <div class="form-group">
                <label class="col-md-4 control-label">Category</label>
                <div class="col-md-8">

                    <select name="category_id" class="form-control">
                        <?php
                            foreach($categories as $category){
                        ?>
						
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    
						<?php } ?>
                    </select>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>

            <div class="form-group">
                <label class="col-md-4 control-label">Subcategory</label>
                <div class="col-md-8">
                    <select name="subcategory_id" class="form-control">
                    </select>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>

            <div class="form-group">
                <label class="col-md-4 control-label">Email</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" value="{{$expert->email}}" name="email" />
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
            <div class="form-group">
                <label class="col-md-4 control-label">Password</label>
                <div class="col-md-8">
                    <input type="password" id="inputPassword" value="{{$expert->password}}" class="form-control" name="password" />
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
            <div class="form-group">
                <label class="col-md-4 control-label">Repeat Password</label>
                <div class="col-md-8">
                    <input type="password" id="repeatPassword" value="{{$expert->password}}" class="form-control" name="confirm_password" />
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
            <div class="form-group">
                <label class="col-md-4 control-label">Name</label>
                <div class="col-md-4" style="padding-right: 0">
                    <input type="text" class="form-control" value="{{$expert->first_name}}" name="first_name" placeholder="First Name" />
                </div>
                <div class="col-md-4"style="padding-left: 0">
                    <input type="text" class="form-control" name="last_name" value="{{$expert->last_name}}" placeholder="Last Name" />
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>

            <div class="form-group">
                <label class="col-md-4 control-label">Country</label>
                <div class="col-md-8">
                    <select class="form-control" name="country">
                        <option value="{{$expert->country}}" selected>{{$expert->country}}</option>
                        <option value="India">India</option>
                        <option value="Canada">Canada</option>
                        <option value="America">America</option>
                        <option value="UK">UK</option>
                        <option value="Holland">Holland</option>
                    </select>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Time Zone</label>
                <div class="col-md-8">
                    <select class="form-control" name="timezone">
                        <option value="{{$expert->timezone_name}}" selected>{{$expert->timezone}}</option>
                    </select>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
            <div class="form-group">
                <label class="col-md-4 control-label">Image</label>
                <div class="col-md-8 pic-box">
                    <?php
                        if($expert->pic){
                    ?>
                            {{HTML::image("/public/img/experts/" . $expert->pic )}}
                            <input type="checkbox" id="remove-pic" name="remove_pic"/> <label>remove</label>
                        <?php
                        }
                    ?>
                    <input style="width: 80%" class="form-control txt-info" type="file" name="file"/>

                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="col-lg-6 col-lg-offset-1">
            <div class="form-group">
                <label class="col-md-2 control-label" style="text-align: left">Fees</label>
                <div class="col-lg-4 fee" style="padding: 0; padding-top: 5px">
                    <i class="fa fa-rupee fa-lg form-control"><input type="text" name="fees-rupee" value="{{$expert->fees_rupee}}"></i>
                </div>
                <div class="col-lg-4 fee" style="padding: 0; padding-top: 5px">
                    <i class="fa fa-dollar fa-lg form-control"><input type="text" name="fees-dollar" value="{{$expert->fees_dollar}}"></i>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" style="text-align: left;">About</label>
                <div class="col-lg-11" style="padding-top: 5px;">
                    <textarea name="about" class="jqte-test form-control" style="height: 300px;">{{$expert->about}}</textarea>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="form-group">
            <div class="col-md-12 col-lg-offset-5">
                <button type="submit" class="btn btn-default btn-danger">Update</button>
            </div>
            <br/><br/>
            <span class="msg col-lg-offset-2" style="color: green;"></span>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </form>
</div>

<iframe id="ifr" name="ifr" style="visibility: hidden; width:1px;height:1px;"></iframe>
<span class="subcategory_id" rel="{{$expert->subcategory_id}}" style="visibility:hidden"></span>
</div>

<script type="text/javascript">
    //$("select[name='country']").val("{{$expert->country}}");

    $('.jqte-test').jqte();

    // settings of status
    var jqteStatus = true;
    $(".status").click(function()
    {
        jqteStatus = jqteStatus ? false : true;
        $('.jqte-test').jqte({"status" : jqteStatus})
    });
</script>

<?php
if(isset($expert->category_id)){
?>
    <script type="text/javascript">
        $("select[name='category_id']").val("<?php echo $expert->category_id;?>");
    </script>
<?php
}
?>