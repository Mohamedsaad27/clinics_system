<?php

namespace Database\Seeders;

use App\Models\UserType;
use Illuminate\Container\Attributes\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('user_types')->insert([
            ['type_name' => 'Doctor', 'created_at' => now(), 'updated_at' => now()],
            ['type_name' => 'Employee', 'created_at' => now(), 'updated_at' => now()],
            ['type_name' => 'Patient', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
