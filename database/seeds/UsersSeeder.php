<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insertOrIgnore([
        [
          'id' => 1,
          'name' => 'Admin',
          'email' => 'admin@mail.com',
          'password' => Hash::make('password123'),
          'kode_kab' => null,
        ],
        [
          'id' => 2,
          'name' => 'User BIG',
          'email' => 'user_big@mail.com',
          'password' => Hash::make('password123'),
          'kode_kab' => null,
        ],
        [
          'id' => 3,
          'name' => 'User Daerah',
          'email' => 'user_daerah@mail.com',
          'password' => Hash::make('password123'),
          'kode_kab' => '11.01',
        ],
        [
          'id' => 4,
          'name' => 'User KEMENKEU',
          'email' => 'user_kemenkeu@mail.com',
          'password' => Hash::make('password123'),
          'kode_kab' => null,
        ],
      ]);
    }
}
