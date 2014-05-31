<?php

namespace ColorCode;

class ResponseOption extends \Eloquent
{
    public $timestamps = false;
    protected $fillable = array('response_id', 'option_id');

    public function option()
    {
        return $this->belongsTo('ColorCode\Option');
    }

    public function response()
    {
        return $this->belongsTo('ColorCode\Response');
    }
} 