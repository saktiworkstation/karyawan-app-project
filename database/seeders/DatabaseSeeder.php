<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Attendence;
use App\Models\Announcement;
use App\Models\WorkerAbsence;
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
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => 'Sakti',
            'username' => 'sakti',
            'email' => 'sakti@gmail.com',
            'password' => bcrypt('password')
        ]);

        User::factory(5)->create();

        Announcement::factory(10)->create();

        Attendence::factory(5)->create();

        WorkerAbsence::factory(60)->create();
    }
}
