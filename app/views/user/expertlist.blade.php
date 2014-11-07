<h3>Appointment Booking
    <br>
</h3>

<!-- START DATATABLE 1 -->
<div class="row">

    <div class="panel panel-default">
        <div class="panel-body">

            <div class="txt-box col-md-4">
                <h4>Category</h4>
                <select name="category_id">
                    <?php
                    foreach($categories as $category){
                        echo "<option value='$category->id'>$category->name</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="txt-box col-md-4">
                <h4>Sub Category</h4>
                <select name="subcategory_id"></select>
            </div>

            <div class="clear"></div>

            <div class="expert-content" style="margin-top:20px; margin-left: 10px;">&nbsp;</div>

        </div>
    </div>
</div>