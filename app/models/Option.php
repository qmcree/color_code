<?php

namespace ColorCode;

class Option extends \Eloquent
{
    public $timestamps = false;
    public static $rules = [
        'options' => ['required', 'array', 'size:45'], // @todo define size dynamically.
    ];
    protected $guarded = array('id');

    public function question()
    {
        return $this->belongsTo('ColorCode\Question');
    }

    public function category()
    {
        return $this->belongsTo('ColorCode\Category');
    }

    public function responseOptions()
    {
        return $this->hasMany('ColorCode\ResponseOption');
    }
} 