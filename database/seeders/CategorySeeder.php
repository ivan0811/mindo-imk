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
                'name' => 'K3 Series'                
            ],
            [
                'id' => 2,
                'name' => 'QAQC Series'                
            ],
            [
                'id' => 3,
                'name' => 'Food Safety Series'                
            ],
            [
                'id' => 4,
                'name' => 'Environmental Series'
            ],
            [
                'id' => 5,
                'name' => 'FSMS Integration'
            ]
        ]);
    }
}
