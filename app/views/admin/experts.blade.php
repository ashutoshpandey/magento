<h3>Manage Experts
    <br>
</h3>

<div><span class='createexpert link'>Create Expert</span><br/><br/></div>

<!-- START DATATABLE 1 -->
<div class="row">

        <div class="panel panel-default">
            <div class="panel-body">

                <?php if(is_null($experts) || $experts->isEmpty())
                        echo "No expertes added...";
                else{ ?>

                    <table id="datatable1" class="table table-striped table-hover dataTable no-footer" role="grid" aria-describedby="datatable1_info">

                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Country</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php foreach($experts as $expert){ ?>

                        <tr>
                            <td>{{$expert->first_name}} {{$expert->last_name}}</td>
                            <td>{{$expert->email}}</td>
                            <td>{{$expert->country}}</td>
                            <td style="padding-top:15px;"><i class="fa fa-edit fa-1x pointer" rel="{{$expert->id}}" title="Edit"></i> &nbsp;&nbsp; <i class="fa fa-times fa-1x pointer" rel="{{$expert->id}}" title="Delete"></i></td>
                        </tr>

                    <?php } ?>

                    </tbody>
                </table>

                <?php } ?>
            </div>
        </div>

</div>
<!-- END DATATABLE 1 -->
<!-- START DATATABLE 2 -->
