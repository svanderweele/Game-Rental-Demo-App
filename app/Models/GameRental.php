<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GameRental extends Model
{

    protected $fillable = [
        'game_id', 'user_id', 'checkout_date', 'checkin_date'
    ];
    
    public function renter()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
    
    public function game()
    {
        return $this->hasOne('App\Models\Game', 'id', 'game_id');
    }

    public function defaultResponse(){
        return [
            'game' => $this->game()->get()->map(function($game) { return $game->defaultResponse();}),
            'user' => $this->renter()->get()->map(function($renter) { return $renter->defaultResponse();}),
            'checkin_date' => $this['checkin_date'],
            'checkout_date' => $this['checkout_date'],
        ];
    }
}
