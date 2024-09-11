<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JabatanTableSeeder extends Seeder
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
                'nama' => 'Kepala Sekolah',
            ],
            [
                'nama' => 'Komite Sekolah',
            ],
            [
                'nama' => 'Waka Kurikulum',
            ],
            [
                'nama' => 'Waka Kesiswaan',
            ],
            [
                'nama' => 'Waka Humas',
            ],
            [
                'nama' => 'Waka Sarpras',
            ],
            [
                'nama' => 'Kepala Kompetensi Keahlian',
            ],
            [
                'nama' => 'Kepala Tata Usaha',
            ],
            [
                'nama' => 'Tata Usaha Kepegawaian',
            ],
            [
                'nama' => 'Tata Usaha Logistik',
            ],
            [
                'nama' => 'Tata Usaha Keuangan',
            ],
            [
                'nama' => 'Tata Usaha Kesiswaan',
            ],
            [
                'nama' => 'Tata Usaha Kesekretariatan',
            ],
            [
                'nama' => 'Guru',
            ],
            [
                'nama' => 'Wali Kelas',
            ],
            [
                'nama' => 'Caraka',
            ],
            [
                'nama' => 'Satpam',
            ],
        ];

        foreach ($data as $row) {
            DB::table('jabatan')->insert($row);
        }
    }
}
