<?php

use Illuminate\Database\Seeder;

class DosenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Dosen::insert([
            [
              'nidn'  => '011021901',
              'nama'       => 'Sirojul Munir',
              'created_at'      => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'nidn'  => '09128991',
                'nama'       => 'Edo Riansyah',
                'created_at'      => \Carbon\Carbon::now('Asia/Jakarta')
              ],
            [
                'nidn'  => '0192819',
                'nama'       => 'Ahmad Rio Adriansyah',
                'created_at'      => \Carbon\Carbon::now('Asia/Jakarta')
              ],
            [
                'nidn'  => '0192819',
                'nama'       => 'Hilmy Abidzar Tawakkal',
                'created_at'      => \Carbon\Carbon::now('Asia/Jakarta')
            ],
        ]);
    }
}
