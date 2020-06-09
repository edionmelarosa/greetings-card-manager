<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeOtherUsers($query)
    {
        return $query->where('id', '<>', Auth::user()->id);
    }

    public function scopeWithNumberOfCardsSent($query)
    {
        return $query->addSelect(['number_of_cards_sent' => GreetingCard::selectRaw('count(*)')
            ->whereColumn('greeting_cards.from', '=', 'users.id')]);
    }

    public function scopeWithNumberOfCardsReceived($query)
    {
        return $query->addSelect(['number_of_cards_received' => GreetingCard::selectRaw('count(*)')
            ->whereColumn('greeting_cards.to', '=', 'users.id')]);
    }
}
