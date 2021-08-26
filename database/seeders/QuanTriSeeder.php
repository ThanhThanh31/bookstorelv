<?php

namespace Database\Seeders;
use DB;
use Illuminate\Database\Seeder;
use Hash;
class QuanTriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quantri = [
            [
                'username' => 'Admin',
                'password' => Hash::make('123'),
                'email' => 'admin@gmail.com',
            ],
        ];
        $insert = DB::table('quan_tri')->insert($quantri);
    }
}
