<?php

namespace Database\Seeders;

use App\Models\UserAddress;
use Illuminate\Database\Seeder;

class UserAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $addresses = [
            [
                'user_id' => 1,
                'city' => 'Cairo',
                'country' => 'Egypt',
            ],
            [
                'user_id' => 1,
                'city' => 'Giza',
                'country' => 'Egypt',
            ],
            [
                'user_id' => 1,
                'city' => 'Alexandria',
                'country' => 'Egypt',
            ],
            [
                'user_id' => 1,
                'city' => 'Luxor',
                'country' => 'Egypt',
            ],
        ];

        foreach ($addresses as $address) {
            UserAddress::create($address);
        }
    }
}
