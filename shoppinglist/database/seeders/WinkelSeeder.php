<?php

namespace Database\Seeders;

use App\Models\Winkel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WinkelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $winkels = [
        [
            'name' => 'Jumbo'
        ],
        [
            'name' => 'Albert Heijn'
        ],
        [
            'name' => 'Plus'
        ],
        [
            'name' => 'Action'
        ],
        [
            'name' => 'Lidl'
        ]];

        foreach ($winkels as $winkel) {
            Winkel::create($winkel);
        }
    }
}
