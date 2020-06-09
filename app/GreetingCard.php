<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GreetingCard extends Model
{
    protected $fillable = [
        'from',
        'to'
    ];
}
