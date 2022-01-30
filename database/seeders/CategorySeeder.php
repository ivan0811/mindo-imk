<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::insert([
            [
                'id' => 1,
                'name' => 'K3 Series',
                'slug' => 'k3-series'
            ],
            [
                'id' => 2,
                'name' => 'QAQC Series',
                'slug' => 'qaqc-series'
            ],
            [
                'id' => 3,
                'name' => 'Food Safety Series',
                'slug' => 'food-safety-series'
            ],
            [
                'id' => 4,
                'name' => 'Environmental Series',
                'slug' => 'environmental-series'
            ],
            [
                'id' => 5,
                'name' => 'FSMS Integration',
                'slug' => 'fsms-integration'
            ]
        ]);
    }
}
