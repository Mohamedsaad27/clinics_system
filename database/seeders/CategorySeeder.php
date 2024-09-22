<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Health', 'slug' => Str::slug('Health')],
            ['name' => 'Technology', 'slug' => Str::slug('Technology')],
            ['name' => 'Education', 'slug' => Str::slug('Education')],
            ['name' => 'Business', 'slug' => Str::slug('Business')],
            ['name' => 'Entertainment', 'slug' => Str::slug('Entertainment')],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
