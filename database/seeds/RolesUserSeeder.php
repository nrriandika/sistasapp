<?php

use Illuminate\Database\Seeder;

class RolesUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles_user')->insertOrIgnore([
          [
            'user_id' => 1,
            'roles_id' => 1,
          ],
          [
            'user_id' => 2,
            'roles_id' => 2,
          ],
          [
            'user_id' => 3,
            'roles_id' => 3,
          ],
          [
            'user_id' => 4,
            'roles_id' => 4,
          ],
        ]);
    }
}
