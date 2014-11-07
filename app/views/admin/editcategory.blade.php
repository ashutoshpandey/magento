<h3>Create a new category
    <br>
</h3>

<div class="panel">

<form class="frmcategory">

    <div class="row">
        <div class="col-lg-12">
            <div class="col-lg-6 col-xs-12">

                    <div class="txt-box col-lg-12">
                        <h4>Name</h4>
                        <input class="txt-info" type="text" name="name" value="{{$category->name}}"/>
                    </div>
                    <div class="txt-box col-lg-12">
                        <input type="button" id="btn" name="btnupdatecategory" class="btn btn-success" value="Update Category"/>
                        <br/><br/>
                        <span class="msg"></span>
                    </div>

            </div>
        </div>
    </div>

</form>

</div>