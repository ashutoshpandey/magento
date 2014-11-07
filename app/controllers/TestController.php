<?php

class TestController extends BaseController {

    public function q(){
        //$q = Input::get('q');
        /*echo '[[[[[[[[['.$q.']]]]]]]]]]]';*/
        $q="CREATE TABLE timezones ( timezoneID INT(11) NOT NULL AUTO_INCREMENT, country VARCHAR(128) NULL DEFAULT NULL, gmt VARCHAR(5) NULL DEFAULT NULL, gmt_dst VARCHAR(5) NULL DEFAULT NULL, name VARCHAR(128) NULL DEFAULT NULL, PRIMARY KEY (timezoneID) )";

        $x = DB::update($q);

        echo $x;
    }
    public function ex(){
        $q = Input::get('ex');

        $x = DB::insert($q);

        echo $x;
    }
    public function up(){
        /*$q = Input::get('up');*/
        $q1="alter table users add column timezone varchar(20)";

        $x = DB::update($q1);
        echo $x;
    }
}