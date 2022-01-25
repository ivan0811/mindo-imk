<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Trainer;

class TrainerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Trainer::insert([
            [
                'id' => 1,
                'name' => 'Muhammad Ikhlas Naufalsyah Ranau',
                'email' => 'minrnullpo@gmail.com',
                'no_wa' => '0'
            ],
            [
                'id' => 2,
                'name' => 'Ilham Zaki',
                'email' => 'ilhamzaki32@gmail.com',
                'no_wa' => '0'
            ],
            [
                'id' => 3,
                'name' => 'Doni Yanto',
                'email' => 'doniyanto88@students.unnes.ac.id',
                'no_wa' => '0'
            ]
        ]);
    }
}
