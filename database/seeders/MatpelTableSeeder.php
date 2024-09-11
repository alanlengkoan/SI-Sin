<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MatpelTableSeeder extends Seeder
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
                'nama' => 'Pendidikan Agama',
            ],
            [
                'nama' => 'Pendidikan Pancasila dan Kewarganegaraan',
            ],
            [
                'nama' => 'Pendidikan Jasmani, Olahraga dan Kesehatan',
            ],
            [
                'nama' => 'Bahasa Indonesia',
            ],
            [
                'nama' => 'Bahasa Inggris',
            ],
            [
                'nama' => 'Matematika',
            ],
            [
                'nama' => 'Sejarah',
            ],
            [
                'nama' => 'Seni Budaya',
            ],
            [
                'nama' => 'Seni dan Prakarya',
            ],
            [
                'nama' => 'Biologi',
            ],
            [
                'nama' => 'Fisika',
            ],
            [
                'nama' => 'Kimia',
            ],
            [
                'nama' => 'Geografi',
            ],
            [
                'nama' => 'Sejarah',
            ],
            [
                'nama' => 'Sosiologi',
            ],
            [
                'nama' => 'Ekonomi',
            ],
            [
                'nama' => 'Muatan Lokal',
            ],
            [
                'nama' => 'Pengembangan Diri',
            ]
        ];

        foreach ($data as $row) {
            DB::table('matpel')->insert($row);
        }
    }
}
