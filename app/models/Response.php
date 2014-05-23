<?php


class Response extends Eloquent
{
    protected $guarded = array('id', 'created_at', 'updated_at');

    public function responseOptions()
    {
        return $this->hasMany('ResponseOption');
    }
} 