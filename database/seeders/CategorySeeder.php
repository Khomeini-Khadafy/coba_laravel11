<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // contoh membuat data category manual
        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design',
        ]);
        Category::create([
            'name' => 'Manchine Learning',
            'slug' => 'manchine-learning',
        ]);
        Category::create([
            'name' => 'UI UX',
            'slug' => 'ui-ux',
        ]);
        Category::create([
            'name' => 'Data Structure',
            'slug' => 'web-design',
        ]);

    }
}
