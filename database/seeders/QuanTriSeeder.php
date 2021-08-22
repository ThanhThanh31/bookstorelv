<?php

namespace Database\Seeders;
use DB;
use Illuminate\Database\Seeder;

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
                'password' => '123',
                'email' => 'admin@gmail.com',
            ],
        ];
        $insert = DB::table('quan_tri')->insert($quantri);
    }
}
