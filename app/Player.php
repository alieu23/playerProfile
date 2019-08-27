<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable=[
        'firstname',
        'lastname',
        'image',
        'address',
        'phone',
        'dob',
        'position',
        'height'
    ];
}
