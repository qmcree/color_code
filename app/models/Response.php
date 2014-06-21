<?php

namespace ColorCode;

class Response extends \Eloquent
{
    public static $rules = [
        'name' => ['required', 'alpha', 'size:50'],
        'email' => ['required', 'email', 'size:50'],
    ];
    protected $guarded = array('id', 'created_at', 'updated_at');

    public function responseOptions()
    {
        return $this->hasMany('ColorCode\ResponseOption');
    }
} 