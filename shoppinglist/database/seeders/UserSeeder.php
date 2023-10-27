<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'role' => '2',
                'name' => 'admin',
                'email' => 'admin@admin.nl',
                'password' => Hash::make('admin123'),
            ],
            [
                'role' => '1',
                'name' => 'zesty',
                'email' => 'zesty@gmail.com',
                'password' => Hash::make('mfmfmfmf'),
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }

    }
}
