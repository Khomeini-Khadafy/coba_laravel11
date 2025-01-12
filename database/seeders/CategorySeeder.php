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
            'name'      => 'Web Design',
            'slug'      => 'web-design',
            'color'     => 'red'
        ]);
        Category::create([
            'name'      => 'Manchine Learning',
            'slug'      => 'manchine-learning',
            'color'     => 'green'
        ]);
        Category::create([
            'name'      => 'UI UX',
            'slug'      => 'ui-ux',
             'color'    => 'blue'
        ]);
        Category::create([
            'name'      => 'Data Structure',
            'slug'      => 'data-structure',
             'color'    => 'yellow'
        ]);

    }
}
