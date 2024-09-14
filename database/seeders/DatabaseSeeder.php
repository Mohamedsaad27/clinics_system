<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\UserType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
//        $this->call([
//            UserTypeSeeder::class
//        ]);
        User::create([
            'name' => 'super-admin',
            'email' => 'super-admin@gmail.com',
            'password' => bcrypt('super-admin'),
            'user_type_id' => 4,
        ]);

    }
}
