<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'name' => 'aaa',
            'email' => 'aaa@example.com',
            'password' => bcrypt('hogehoge3'),
        ]);

        \App\Models\User::factory()->create([
            'name' => 'iii',
            'email' => 'iii@example.com',
            'password' => bcrypt('hogehoge3'),
        ]);
    }
}
