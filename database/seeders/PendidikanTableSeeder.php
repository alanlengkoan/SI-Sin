<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PendidikanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'nama'     => 'SD',
                'by_users' => '1',
            ],
            [
                'nama'     => 'SMP',
                'by_users' => '1',
            ],
            [
                'nama'     => 'SMA',
                'by_users' => '1',
            ],
            [
                'nama'     => 'SMK',
                'by_users' => '1',
            ],
            [
                'nama'     => 'D1',
                'by_users' => '1',
            ],
            [
                'nama'     => 'D2',
                'by_users' => '1',
            ],
            [
                'nama'     => 'D3',
                'by_users' => '1',
            ],
            [
                'nama'     => 'D4',
                'by_users' => '1',
            ],
            [
                'nama'     => 'S1',
                'by_users' => '1',
            ],
            [
                'nama'     => 'S2',
                'by_users' => '1',
            ],
            [
                'nama'     => 'S3',
                'by_users' => '1',
            ],
        ];

        foreach ($data as $row) {
            DB::table('pendidikan')->insert($row);
        }
    }
}
