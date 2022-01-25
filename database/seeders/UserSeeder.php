<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'id' => 1,
                'name' => 'admin',
                'username' => 'admin',
                'email' => 'admin@mindoeducation.co.id',
                'password' => Hash::make('admin'),
                'role' => 'admin',
                'no_wa' => '0'
            ],
            [
                'id' => 2,
                'name' => 'Hayin Ananta',
                'username' => 'hayin',
                'email' => 'hayinananta@mindoeducation.co.id',
                'password' => Hash::make('12345678'),
                'role' => 'admin',
                'no_wa' => '0'
            ],
            [
                'id' => 3,
                'name' => 'Ivan Faathirza',
                'username' => 'ivan',
                'email' => 'ivanfaathirza@mindoeducation.co.id',
                'password' => Hash::make('12345678'),
                'role' => 'peserta',
                'no_wa' => '0'
            ],
            [
                'id' => 4,
                'name' => 'Muhammad Khatami',
                'username' => 'tommy',
                'email' => 'muhammadkhatami@mindoeducation.co.id',
                'password' => Hash::make('12345678'),
                'role' => 'peserta',
                'no_wa' => '0'
            ],
        ]);
    }
}
