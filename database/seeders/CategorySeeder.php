<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'IT',

        ]);
        Category::create([
            'name' => 'Programming',
            'category_id' => 1
        ]);
        Category::create([
            'name' => 'Network',
            'category_id' => 1
        ]);
        Category::create([
            'name' => 'Back-End',
            'category_id' => 2
        ]);
        Category::create([
            'name' => 'Front-End',
            'category_id' => 2
        ]);
        Category::create([
            'name' => 'Security',
            'category_id' => 3
        ]);
    }
}
