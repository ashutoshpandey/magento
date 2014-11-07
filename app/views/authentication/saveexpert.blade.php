<h3>Create a new expert
    <br>
</h3>

<div class="panel">

<form method="post" action="save-expert" enctype="multipart/form-data" target="ifr" onsubmit="return saveExpert()">

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

</form>
<iframe id="ifr" name="ifr" style="visibility: hidden; width:1px;height:1px;"></iframe>
</div>