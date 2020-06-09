<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GreetingCard extends Model
{
    protected $fillable = [
        'from',
        'to',
        'card_file'
    ];

    public function getCardFileAttribute($value)
    {
        return url($value);
    }

    public function from()
    {
        return $this->belongsTo(User::class, 'from', 'id');
    }

    public function to()
    {
        return $this->belongsTo(User::class, 'to', 'id');
    }
}
