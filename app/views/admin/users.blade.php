        <h3>Manage Users
            <br>
        </h3>

        <!-- START DATATABLE 1 -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
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

                            <?php foreach($users as $user){ ?>

                            <tr>
                                <td>{{$user->first_name}} {{$user->last_name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->country}}</td>
                                <td style="padding-top:15px;"><i class="fa fa-edit fa-1x pointer" rel="{{$user->id}}" title="Edit"></i> &nbsp;&nbsp; <i class="fa fa-times fa-1x pointer" rel="{{$user->id}}" title="Delete"></i></td>
                            </tr>

                            <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- END DATATABLE 1 -->
        <!-- START DATATABLE 2 -->


        </tbody>
        </table>
        </div>
        </div>
        </div>
        </div>
