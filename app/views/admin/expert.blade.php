<div class="row">
    <div class="col-md-8">
        <div class="expertinfo">
            {{$expert->first_name . " " . $expert->last_name}}
        </div>
        <div class="expertinfo">
            {{$expert->email}}
        </div>
        <div class="expertinfo">
            {{$expert->country}}
        </div>
        <div class="expertinfo">
            {{$expert->category->name}}
        </div>
        <div class="expertinfo">
            {{$expert->subcategory->name}}
        </div>
    </div>
    <div class="col-md-4">
        <?php if(strlen($expert->pic)==0){  ?>

            <li class="fa fa-user fa-5x"></li>

        <?php } else{ ?>

        {{HTML::image(asset("/public/img/experts/" . $expert->pic ), "", array("class"=>"expertpic"))}}

        <?php } ?>
    </div>
</div>