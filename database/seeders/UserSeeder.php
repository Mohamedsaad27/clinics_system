<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Mohamed Saad',
            'email' => 'dev.mohamedsaad@gmail.com',
            'password' => 'admin@123',
            'type' => 'admin',
        ]);
        $admin->assignRole('admin');

    }
}
