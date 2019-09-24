<?php

use Illuminate\Database\Seeder;
use App\Models\Game;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Game::create([ 
            'name' => 'Manhunt',
            'age_requirement' => 18,
        ]);
    }
}
