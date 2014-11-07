<?php

class Expert extends Eloquent{

	protected $table = 'experts';

	protected $hidden = array('password');

    public function category()
    {
        return $this->belongsTo('Category');
    }

    public function subcategory()
    {
        return $this->belongsTo('SubCategory');
    }

}