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
            "name" => "first main category",
            "parent_id" => null,
        ]);
        Category::create([
            "name" => "second main category",
            "parent_id" => null,
        ]);
        Category::create([
            "name" => "third main category",
            "parent_id" => null,
        ]);
        Category::factory(20)->create();
        Category::factory(50)->create();
        Category::factory(100)->create();
    }
}
