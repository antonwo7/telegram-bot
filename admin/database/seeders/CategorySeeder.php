<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name' => 'У меня проблема']);
        Category::create(['name' => 'Предложить улучшение']);
        Category::create(['name' => 'Научите меня пользоваться']);
    }
}
