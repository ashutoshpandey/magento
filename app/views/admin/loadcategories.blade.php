<div class="panel panel-default">
    <div class="panel-body">

        <?php if(!$categories->isEmpty()){ ?>


        <table id="datatable1" class="table table-striped table-hover dataTable no-footer" role="grid" aria-describedby="datatable1_info">

            <thead>
            <tr>
                <th>Name</th>
                <th></th>
            </tr>
            </thead>
            <tbody>

            <?php

            foreach($categories as $category){
                $found = true;
                ?>

                <tr>
                    <td>{{$category->name}}</td>
                    <td style="padding-top:15px;"><i class="fa fa-edit fa-1x pointer" rel="{{$category->id}}" title="Edit"></i> &nbsp;&nbsp; <i class="fa fa-times fa-1x pointer" rel="{{$category->id}}" title="Delete"></i></td>
                </tr>

            <?php
            }  } else{ echo "No categories added..."; }
            ?>

            </tbody>
        </table>
    </div>
</div>

