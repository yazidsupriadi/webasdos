<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\User::insert([
            [
              'name'  => 'admin',
              'email'       => 'admin@gmail.com',
              'password'          => bcrypt('12345678'),
              'email_verified_at' => now(),
              'rules'          => 'admin',
              'remember_token' => Str::random(10),
              'created_at'      => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'name'  => 'admin1',
                'email'       => 'admin1@gmail.com',
                'password'          => bcrypt('12345678'),
                'email_verified_at' => now(),
                'rules'          => 'admin',
                'remember_token' => Str::random(10),
                'created_at'      => \Carbon\Carbon::now('Asia/Jakarta')
              ],
              [
                'name'  => 'user1',
                'email'       => 'user1@gmail.com',
                'password'          => bcrypt('12345678'),
                'email_verified_at' => now(),
                'rules'          => 'asdos',
                'remember_token' => Str::random(10),
                'created_at'      => \Carbon\Carbon::now('Asia/Jakarta')
              ],
                
            ]);
    }
}
