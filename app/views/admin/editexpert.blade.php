<h3>Edit this expert
    <br>
</h3>

<div class="panel">

    <form method="post" action="update-expert" enctype="multipart/form-data" target="ifr" onsubmit="return updateExpert()">
    <input type="hidden" name="id" value="{{$expert->id}}">
    <div class="row">
        <div class="col-lg-12">
            <div class="col-lg-6 col-xs-12">

                    <div class="txt-box col-lg-12">
                        <h4>Category</h4>
                        <select name="category_id">
                            <?php
                                foreach($categories as $category){
                                    echo "<option value='$category->id'>$category->name</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="txt-box col-lg-12">
                        <h4>Sub Category</h4>
                        <select name="subcategory_id"></select>
                    </div>
                    <div class="txt-box col-lg-12">
                        <h4>Name</h4>
                        <input class="txt-info" type="text" name="first_name" style="width: 35%;" value="{{$expert->first_name}}">
                        <input class="txt-info" type="text" name="last_name" style="width: 35%;margin-left: 10px;" value="{{$expert->last_name}}">
                    </div>

                    <div class="txt-box col-lg-12">
                        <h4>Email</h4>
                        <input class="txt-info" type="text" name="email" value="{{$expert->email}}">
                    </div>
                    <div class="txt-box col-lg-12">
                        <h4>Password</h4>
                        <input class="txt-info" type="password" name="password" value="{{$expert->password}}"/>
                    </div>
                    <div class="txt-box col-lg-12">
                        <h4>Repeat password</h4>
                        <input class="txt-info" type="password" name="repeat_password" value="{{$expert->password}}"/>
                    </div>
                    <div class="txt-box col-lg-12">
                        <h4>Country</h4>
                        <select name="country">
                            <option hidden="hidden">Select Country</option>
                            <option value="India">India</option>
                            <option value="Canada">Canada</option>
                            <option value="America">America</option>
                            <option value="UK">UK</option>
                            <option value="Holland">Holland</option>
                        </select>
                    </div>
                    <div class="clearfix"></div>
                    <div class="txt-box col-lg-12">
                        <h4>Time Zone</h4>
                        <select name="timezone">
                        </select>
                    </div>
                    <div class="clearfix"></div>
                    <div class="txt-box col-lg-12">
                        <h4>Image</h4>
                        <input class="txt-info" type="file" name="file"/>
                    </div>
                    <div class="txt-box col-lg-12">
                        <input type="submit" class="btn btn-success" value="Update Expert"/>
                        <br/><br/>
                        <span class="msg"></span>
                    </div>

            </div>
            <div class="col-lg-5 col-lg-offset-1" style="padding-top: 20px;">
                <div class="form-group">
                    <label class="col-md-2 control-label" style="text-align: left">Fees</label>
                    <div class="col-lg-5 fee" style="padding: 0; padding-top: 5px">
                        <i class="fa fa-rupee fa-lg form-control"><input type="text" name="fees_rupee" value="{{$expert->fees_rupee}}"></i>
                    </div>
                    <div class="col-lg-5 fee" style="padding: 0; padding-top: 5px">
                        <i class="fa fa-dollar fa-lg form-control"><input type="text" name="fees_dollar" value="{{$expert->fees_dollar}}"></i>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" style="text-align: left;">About</label>
                    <div class="col-lg-12" style="padding-top: 5px;">
                        <textarea name="about" class="jqte-test form-control" style="height: 300px;">{{$expert->about}}</textarea>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>

        </div>
    </div>

</form>
<iframe id="ifr" name="ifr" style="visibility: hidden; width:1px;height:1px;"></iframe>
</div>
<script type="text/javascript">
    $("select[name='country']").val("{{$expert->country}}");
</script>