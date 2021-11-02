<?php

namespace Database\Seeders;
use DB;
use Illuminate\Database\Seeder;

class LoaiBiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type = [
            [
                'lb_ten' => 'Hardback With Ribbon Marker',
            ],
            [
                'lb_ten' => 'Bìa Gập',
            ],
            [
                'lb_ten' => 'Hardback',
            ],
            [
                'lb_ten' => 'Box Of Cards With Pen',
            ],
            [
                'lb_ten' => 'Bìa Rời',
            ],
            [
                'lb_ten' => 'Box',
            ],
            [
                'lb_ten' => 'Spiral Bound',
            ],
            [
                'lb_ten' => 'Bìa Da',
            ],
            [
                'lb_ten' => 'Hardback With Sound Panel',
            ],
            [
                'lb_ten' => 'Library Edition Hardback',
            ],
            [
                'lb_ten' => 'Novelty',
            ],
            [
                'lb_ten' => 'Spiral-Bound Hardback',
            ],
            [
                'lb_ten' => 'Board',
            ],
            [
                'lb_ten' => 'Board + Sound Panel',
            ],
            [
                'lb_ten' => 'CD - Audio',
            ],
            [
                'lb_ten' => 'Clothbound Hardback With Slipcase',
            ],
            [
                'lb_ten' => 'Flexi',
            ],
            [
                'lb_ten' => 'Jigsaw Box',
            ],
            [
                'lb_ten' => 'Mass Market Paperback',
            ],
            [
                'lb_ten' => 'Mixed Media Product',
            ],
            [
                'lb_ten' => 'Offer 4 Books',
            ],
            [
                'lb_ten' => 'Offer 5 Books',
            ],
            [
                'lb_ten' => 'Offer Box Set Of 3 Books',
            ],
            [
                'lb_ten' => 'Spiral HB',
            ],
            [
                'lb_ten' => 'Spiral - Bound Book',
            ],
            [
                'lb_ten' => 'Paperback',
            ],
            [
                'lb_ten' => 'Hardcover',
            ],
            [
                'lb_ten' => 'Board Book',
            ],
            [
                'lb_ten' => 'Bìa Cứng',
            ],
            [
                'lb_ten' => 'Bìa Mềm',
            ],
        ];
        $insert = DB::table('loai_bia')->insert($type);
    }
}
