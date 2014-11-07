<h3>Create a new category
    <br>
</h3>

<div class="panel">

<form class="frmsubcategory">

    <div class="row">
        <div class="col-lg-12">
            <div class="col-lg-6 col-xs-12">

                    <div class="txt-box col-lg-12">
                        <h4>Name</h4>
                        <input class="txt-info" type="text" name="name" value="{{$subCategory->name}}"/>
                    </div>
                    <div class="txt-box col-lg-12">
                        <h4>Category</h4>
                        <select name="category_id">
                            <?php foreach($categories as $category){ ?>
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="txt-box col-lg-12">
                        <input type="button" id="btn" name="btnupdatesubcategory" class="btn btn-success" value="Update Sub Category"/>
                        <br/><br/>
                        <span class="msg"></span>
                    </div>

            </div>
        </div>
    </div>

</form>

</div>
<script type="text/javascript">$("select[name='category_id']").val("{{$subCategory->category_id}}");</script>