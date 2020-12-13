<?php

use Illuminate\Database\Seeder;

class InsentifTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Insentif::insert([
            [
              'tipe_insentif'  => 'praktikum',
              'kategori'       => '1',
              'nilai'          => 30000,
              'created_at'      => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'tipe_insentif'  => 'pendamping dosen',
                'kategori' => '1',
                'nilai'          => 30000,
                'created_at'      => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'tipe_insentif'  => 'link and match',
                'kategori' => '2',
                'nilai'          => 120000,
                'created_at'      => \Carbon\Carbon::now('Asia/Jakarta')
            ],
        ]);
    }
}
