<?php

use Illuminate\Database\Seeder;

class PeriodeDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('periode_data')->insertOrIgnore([
        [
          'nama' => 'Initial Period',
          'idJenisDataBatasWilayah' => 1,
          'tanggal_periode' => '2020-05-10',
          'active' => true,
          'catatan' => 'Periode untuk data pertama',
        ],
        [
          'nama' => 'Initial Period',
          'idJenisDataBatasWilayah' => 2,
          'tanggal_periode' => '2020-05-10',
          'active' => true,
          'catatan' => 'Periode untuk data pertama',
        ],
        [
          'nama' => 'Initial Period',
          'idJenisDataBatasWilayah' => 3,
          'tanggal_periode' => '2020-05-10',
          'active' => true,
          'catatan' => 'Periode untuk data pertama',
        ],
        [
          'nama' => 'Initial Period',
          'idJenisDataBatasWilayah' => 4,
          'tanggal_periode' => '2020-05-10',
          'active' => true,
          'catatan' => 'Periode untuk data pertama',
        ],
        [
          'nama' => 'Initial Period',
          'idJenisDataBatasWilayah' => 5,
          'tanggal_periode' => '2020-05-10',
          'active' => true,
          'catatan' => 'Periode untuk data pertama',
        ],
        [
          'nama' => 'Initial Period',
          'idJenisDataBatasWilayah' => 6,
          'tanggal_periode' => '2020-05-10',
          'active' => true,
          'catatan' => 'Periode untuk data pertama',
        ],
        [
          'nama' => 'Initial Period',
          'idJenisDataBatasWilayah' => 7,
          'tanggal_periode' => '2020-05-10',
          'active' => true,
          'catatan' => 'Periode untuk data pertama',
        ],
        [
          'nama' => 'Initial Period',
          'idJenisDataBatasWilayah' => 8,
          'tanggal_periode' => '2020-05-10',
          'active' => true,
          'catatan' => 'Periode untuk data pertama',
        ],
        [
          'nama' => 'Initial Period',
          'idJenisDataBatasWilayah' => 9,
          'tanggal_periode' => '2020-05-10',
          'active' => true,
          'catatan' => 'Periode untuk data pertama',
        ],
        [
          'nama' => 'Initial Period',
          'idJenisDataBatasWilayah' => 10,
          'tanggal_periode' => '2020-05-10',
          'active' => true,
          'catatan' => 'Periode untuk data pertama',
        ],
        [
          'nama' => 'Initial Period',
          'idJenisDataBatasWilayah' => 11,
          'tanggal_periode' => '2020-05-10',
          'active' => true,
          'catatan' => 'Periode untuk data pertama',
        ],
        [
          'nama' => 'Initial Period',
          'idJenisDataBatasWilayah' => 12,
          'tanggal_periode' => '2020-05-10',
          'active' => true,
          'catatan' => 'Periode untuk data pertama',
        ]
      ]);
    }
}
