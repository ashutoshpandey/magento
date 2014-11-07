<div class="row">
    <div class="col-md-8">
        <div class="expertinfo">
            <h4>{{$user->first_name . " " . $user->last_name}}</h4>
        </div>
        <br/>
        <div class="expertinfo">
            {{$user->country}} , {{$user->gender}}
        </div>
    </div>
</div>