<?php


class Question extends Eloquent
{
    protected $timestamps = false;
    protected $guarded = array('id');

    public function options()
    {
        return $this->hasMany('Option');
    }
} 