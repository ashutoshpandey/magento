<div class="row">
    <div class="col-md-8">
        <div class="expertinfo">
            <h4>{{$expert->first_name . " " . $expert->last_name}}</h4>
        </div>
        <div class="expertinfo">
            {{$expert->country}}
        </div>
        <div class="expertinfo">
            {{$expert->category->name}}
        </div>
    </div>
    <div class="col-md-4">
        <?php if(strlen($expert->pic)==0){  ?>

            <li class="fa fa-user fa-5x"></li>

        <?php } else{ ?>

        {{HTML::image(asset("/public/img/experts/" . $expert->pic ), "", array("class"=>"expertpic"))}}<div class="clear"></div>

        <?php } ?>

        <br/><br/>{{HTML::link("/expert-info/" . $expert->id, "View More", array("target"=>"_blank", "class"=>"expertmore"))}}
    </div>
</div>