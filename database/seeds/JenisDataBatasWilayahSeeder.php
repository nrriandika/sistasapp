<?php

use Illuminate\Database\Seeder;

class JenisDataBatasWilayahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jenis_data_batas_wilayah')->insertOrIgnore([
          [
            'id' => 1,
            'nama' => 'Batas Darat',
            'nama_layer_geoserver' => 'batas_negara_darat_ln',
            'nama_tabel_spasial' => 'batas_negara_darat_ln',
            'kategori' => 'Batas Negara'
          ],
          [
            'id' => 2,
            'nama' => 'Batas Laut Teritorial',
            'nama_layer_geoserver' => 'batas_teritorial_ln',
            'nama_tabel_spasial' => 'batas_teritorial_ln',
            'kategori' => 'Batas Negara'
          ],
          [
            'id' => 3,
            'nama' => 'Garis Pangkal',
            'nama_layer_geoserver' => 'garis_pangkal_ln',
            'nama_tabel_spasial' => 'garis_pangkal_ln',
            'kategori' => 'Batas Negara'
          ],
          [
            'id' => 4,
            'nama' => 'Titik Dasar',
            'nama_layer_geoserver' => 'titik_dasar_pt',
            'nama_tabel_spasial' => 'titik_dasar_pt',
            'kategori' => 'Batas Negara'
          ],
          [
            'id' => 5,
            'nama' => 'Batas Landasan Kontinen',
            'nama_layer_geoserver' => 'batas_lk_ln',
            'nama_tabel_spasial' => 'batas_lk_ln',
            'kategori' => 'Batas Negara'
          ],
          [
            'id' => 6,
            'nama' => 'Zona Tambahan',
            'nama_layer_geoserver' => 'zona_tambahan_ln',
            'nama_tabel_spasial' => 'zona_tambahan_ln',
            'kategori' => 'Batas Negara'
          ],
          [
            'id' => 7,
            'nama' => 'Zona Ekonomi Esklusif',
            'nama_layer_geoserver' => 'batas_zee_ln',
            'nama_tabel_spasial' => 'batas_zee_ln',
            'kategori' => 'Batas Negara'
          ],
          [
            'id' => 8,
            'nama' => 'Zona MoU Fisheries',
            'nama_layer_geoserver' => 'batas_mou_fisheries_ln',
            'nama_tabel_spasial' => 'batas_mou_fisheries_ln',
            'kategori' => 'Batas Negara'
          ],
          [
            'id' => 9,
            'nama' => 'Batas Kabupaten/Kota',
            'nama_layer_geoserver' => 'administrasi_ln_kabkota',
            'nama_tabel_spasial' => 'administrasi_ln_kabkota',
            'kategori' => 'Batas Wilayah Administrasi'
          ],
          [
            'id' => 10,
            'nama' => 'Batas Desa/Kelurahan',
            'nama_layer_geoserver' => 'batas_desa',
            'nama_tabel_spasial' => 'batas_desa',
            'kategori' => 'Batas Wilayah Administrasi'
          ],
          [
            'id' => 11,
            'nama' => 'Wilayah Pengelolaan Laut Provinsi',
            'nama_layer_geoserver' => 'lpl_prov_12nm',
            'nama_tabel_spasial' => 'lpl_prov_12nm',
            'kategori' => 'Wilayah Pengelolaan Laut'
          ],
          [
            'id' => 12,
            'nama' => 'Wilayah Pengelolaan Laut Kabupaten/Kota',
            'nama_layer_geoserver' => 'lpl_kabkota_4nm',
            'nama_tabel_spasial' => 'lpl_kabkota_4nm',
            'kategori' => 'Wilayah Pengelolaan Laut'
          ]
        ]);
    }
}
