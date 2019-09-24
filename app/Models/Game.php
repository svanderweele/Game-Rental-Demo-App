<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [
        'name', 'age_requirement'
    ];

    protected $casts = [
    ];

    public function rentals(){
        return $this->hasMany("App\Models\GameRental", 'game_id', 'id');
    }



    public function defaultResponse(){
        return [
            'name' => $this['name'],
            'age_requirement' => $this['age_requirement'],
        ];
    }


    public function backendResponse(){
        $back = $this->defaultResponse();
        $back['rentals'] = $this->rentals()
        ->get()
        ->map(function($rental){
            return $rental->defaultResponse();
        });
        
        return $back;
    }
}
