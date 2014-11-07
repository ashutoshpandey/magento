<?php

class Category extends Eloquent{

	protected $table = 'categories';
    public function expert()
    {
        return $this->belongsTo('Expert');
    }
}