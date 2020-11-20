<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;


class JenisPengajuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('jenis_pengajuan')->insertOrIgnore([
          [
            'nama' => 'Pemetaan Batas Desa',
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          ],
          [
            'nama' => 'Pemetaan Batas Wilayah Administras Kecamatan',
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          ],
          [
            'nama' => 'Pemetaan Batas Wilayah Administras Kabupaten',
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          ],
          [
            'nama' => 'Pemetaan Batas Wilayah Administras Kelurahan',
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          ],
          [
            'nama' => 'Pembentukan Daerah Otonom Baru',
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          ],
          [
            'nama' => 'Lainnya',
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          ],
      ]);
    }
}
