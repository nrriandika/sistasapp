<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DetailDokumenAsistensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('detail_dokumen_asistensi')->insertOrIgnore([
        [
          'name' => 'Dokumen Batas',
          'format' => 'pdf',
          'status' => true,
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ],
        [
          'name' => 'Berita Acara Pemilihan Peta Dasar',
          'format' => 'pdf',
          'status' => true,
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ],
        [
          'name' => 'Lisensi Citra / Surat Rekomendasi Hasil Ortorektifikasi Citra',
          'format' => 'pdf',
          'status' => true,
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ],
        [
          'name' => 'Peta Kerja',
          'format' => 'jpg',
          'status' => true,
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ],
        [
          'name' => 'Peta Kerja',
          'format' => 'zip (shapefile)',
          'status' => true,
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ],
        [
          'name' => 'Berita Acara Kesepakatan',
          'format' => 'pdf',
          'status' => true,
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ],
        [
          'name' => 'Peta Batas Desa / Kelurahan',
          'format' => 'jpg',
          'status' => true,
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ],
        [
          'name' => 'Peta Batas Desa / Kelurahan',
          'format' => 'zip (shapefile)',
          'status' => true,
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ],
        [
          'name' => 'Draf Peraturan Bupati / Peraturan Walikota Terkait Penetapan',
          'format' => 'pdf',
          'status' => true,
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ],
      ]);
    }
}
