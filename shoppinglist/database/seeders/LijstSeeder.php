<?php

namespace Database\Seeders;

use App\Models\Lijst;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LijstSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lijsts = [
            [
                'user_id' => '1',
                'name' => 'lijstje 1',
                'winkel_id' => '1',
                'day' => '1',
                'accepted' => true
            ],
            [
                'user_id' => '1',
                'name' => 'lijstje 2',
                'winkel_id' => '2',
                'day' => '2',
                'accepted' => true
            ],
            [
                'user_id' => '1',
                'name' => 'lijstje 3',
                'winkel_id' => '3',
                'day' => '3',
                'accepted' => true
            ],
            [
                'user_id' => '1',
                'name' => 'lijstje 4',
                'winkel_id' => '4',
                'day' => '4',
                'accepted' => true
            ],
            [
                'user_id' => '1',
                'name' => 'lijstje 5',
                'winkel_id' => '5',
                'day' => '5',
                'accepted' => true
            ],
            [
                'user_id' => '2',
                'name' => 'zestys lijst',
                'winkel_id' => '5',
                'day' => '3',
            ],];

        foreach ($lijsts as $list) {
            Lijst::create($list);
        }
    }
}
