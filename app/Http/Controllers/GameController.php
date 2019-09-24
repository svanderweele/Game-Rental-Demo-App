<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Game;

class GameController extends Controller
{
    
    public function index(Request $request)
    {
        $games = Game::all()
        ->map(
            function($game) {
                return $game->backendResponse();
            });
            
        return response()->json(['games' => $games, 'message' => 'Receieved games succesfully', 'sucess' => 1]);
    }
}
