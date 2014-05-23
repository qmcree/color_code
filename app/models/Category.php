<?php


class Category extends Eloquent
{
    public $timestamps = false;
    protected $table = 'categories';
    protected $guarded = array('id');

    public function options()
    {
        return $this->hasMany('Option');
    }
} 