<?php

use Illuminate\Database\Seeder;

class KelasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Kelas::insert([
            [
              'kode_kelas'  => 'SI01',
              'prodi'       => 'Sistem Informasi',
              'angkatan'          => '2017',
              'jumlah_mahasiswa'          => 30,
              'created_at'      => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'kode_kelas'  => 'TI01',
                'prodi'       => 'Teknik Informatika',
                'angkatan'          => '2017',
                'jumlah_mahasiswa'          => 30,
                'created_at'      => \Carbon\Carbon::now('Asia/Jakarta')
              ],
            [
                'kode_kelas'  => 'TI02',
                'prodi'       => 'Teknik Informatika',
                'angkatan'          => '2017',
                'jumlah_mahasiswa'          => 30,
                'created_at'      => \Carbon\Carbon::now('Asia/Jakarta')
                          ],
        ]);
    }
}
