<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'alamat' => 'pondok',
            'tlp' => '082125999028',
            'nosim' => '3277010501900033',
            'password' => bcrypt('12345'),
            'role' => 1,
            ]
        ];
        foreach ($items as $item) {
            User::create($item);
        }
    }
}
