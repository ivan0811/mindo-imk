<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Training;

class TrainingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Training::insert([
            [
                'id' => 1,
                'trainer_id' => 1,
                'category_id' => 1,
                'name' => 'Pelatihan Makanan',
                'slug' => 'pelatihan-makanan',
                'type' => 'regular',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet itaque totam distinctio, officiis repellendus recusandae vero explicabo ex impedit facilis labore minima eligendi, aspernatur deserunt odit exercitationem a, delectus fuga.',
                'cover' => 'xctfYgXcAB08j6E9ldJuHyOuM2N8mgwfl1oeBzi5.png',
                'price' => '250000.00',                
            ],
            [
                'id' => 2,
                'trainer_id' => 3,
                'category_id' => 3,
                'name' => 'Pelatihan Kualitas Makanan',
                'slug' => 'pelatihan-kualitas-makanan',
                'type' => 'integrated',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet itaque totam distinctio, officiis repellendus recusandae vero explicabo ex impedit facilis labore minima eligendi, aspernatur deserunt odit exercitationem a, delectus fuga.',
                'cover' => 'M1CdLYAmlF9gHskzkNATAORw4ISuxVmVVhw2dokU.png',
                'price' => '200000.00',                
            ],
            [
                'id' => 3,
                'trainer_id' => 1,
                'category_id' => 4,
                'name' => 'Pelatihan UI/UX',
                'slug' => 'pelatihan-uiux',
                'type' => 'regular',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet itaque totam distinctio, officiis repellendus recusandae vero explicabo ex impedit facilis labore minima eligendi, aspernatur deserunt odit exercitationem a, delectus fuga.',
                'cover' => 'dBbnYKlMHl7baxE7qg8sfOPCoBHHksrwcBv3jUH7.png',
                'price' => '250000.00',                
            ]
        ]);
    }
}
