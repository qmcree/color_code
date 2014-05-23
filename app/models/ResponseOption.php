<?php


class ResponseOption extends Eloquent
{
    protected $timestamps = false;
    protected $fillable = array('option_id');

    public function option()
    {
        return $this->belongsTo('Option');
    }

    public function response()
    {
        return $this->belongsTo('Response');
    }
} 