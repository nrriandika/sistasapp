<?php

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('roles')->insertOrIgnore([
        [
          'id' => 1,
          'name' => 'admin',
          'description' => 'Admin',
        ],
        [
          'id' => 2,
          'name' => 'user_big',
          'description' => 'User BIG',
        ],
        [
          'id' => 3,
          'name' => 'user_daerah',
          'description' => 'User Pemerintah Daerah',
        ],
        [
          'id' => 4,
          'name' => 'user_kemenkeu',
          'description' => 'User KEMENKEU',
        ],
      ]);
    }
}
