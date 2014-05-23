<?php


class Category extends Eloquent
{
    protected $table = 'categories';
    protected $timestamps = false;
    protected $guarded = array('id');

    public function options()
    {
        return $this->hasMany('Option');
    }
} 