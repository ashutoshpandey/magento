
            <?php if(!$subCategories->isEmpty()){ ?>

                <table id="datatable1" class="table table-striped table-hover dataTable no-footer" role="grid" aria-describedby="datatable1_info">

                <thead>
                <tr>
                    <th>Name</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                <?php foreach($subCategories as $subcategory){ ?>

                    <tr>
                        <td>{{$subcategory->name}}</td>
                        <td style="padding-top:15px;"><i class="fa fa-edit fa-1x pointer" rel="{{$subcategory->id}}" title="Edit"></i> &nbsp;&nbsp; <i class="fa fa-times fa-1x pointer" rel="{{$subcategory->id}}" title="Delete"></i></td>
                    </tr>

                <?php } ?>

                </tbody>
            </table>

            <?php
                } else{ echo "No sub categories added..."; }
            ?>
