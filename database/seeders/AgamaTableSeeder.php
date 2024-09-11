<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgamaTableSeeder extends Seeder
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
                'nama' => 'Islam',
            ],
            [
                'nama' => 'Kristen',
            ],
            [
                'nama' => 'Katolik',
            ],
            [
                'nama' => 'Hindu',
            ],
            [
                'nama' => 'Budha',
            ],
            [
                'nama' => 'Konghucu',
            ]
        ];

        foreach ($data as $row) {
            DB::table('agama')->insert($row);
        }
    }
}
