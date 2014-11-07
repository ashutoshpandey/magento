<h3>Manage Categories</h3>

<form class="frm">

    <div class="row">
        <div class="col-lg-12">
            <div class="col-lg-6 col-xs-12">
                <form class="frm">
                    <div class="txt-box col-lg-12">
                        <h4>Name</h4>
                        <input class="txt-info" type="text" name="name"/>
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
                        <input type="button" id="btn" name="btnsavesubcategory" class="btn btn-success" value="Create Sub Category"/>
                        <br/><br/>
                        <span class="msg"></span>
                    </div>
                </form>
            </div>
        </div>
    </div>

</form>

<div class="panel">
    <div class="subcategorytable" style="padding: 0 20px;"></div>
</div>

