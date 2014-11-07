<?php

class Appointment extends Eloquent{

	protected $table = 'appointments';

	protected $hidden = array('password');


    public function expert()
    {
        return $this->belongsTo('Expert');
    }

    public function user()
    {
        return $this->belongsTo('User');
    }

}