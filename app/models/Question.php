<?php


class Question extends Eloquent
{
    public $timestamps = false;
    protected $guarded = array('id');

    public function options()
    {
        return $this->hasMany('Option');
    }
} 