<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
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
                'name'       => 'agama-read',
                'guard_name' => 'web',
            ],
            [
                'name'       => 'matpel-read',
                'guard_name' => 'web',
            ],
            [
                'name'       => 'jabatan-read',
                'guard_name' => 'web',
            ],
            [
                'name'       => 'pendidikan-read',
                'guard_name' => 'web',
            ],
            [
                'name'       => 'kategori-read',
                'guard_name' => 'web',
            ],
            [
                'name'       => 'medsos-read',
                'guard_name' => 'web',
            ],
            [
                'name'       => 'fasilitas-read',
                'guard_name' => 'web',
            ],
            [
                'name'       => 'organisasi-read',
                'guard_name' => 'web',
            ],
            [
                'name'       => 'prestasi-read',
                'guard_name' => 'web',
            ],
            [
                'name'       => 'galeri-read',
                'guard_name' => 'web',
            ],
            [
                'name'       => 'informasi-read',
                'guard_name' => 'web',
            ],
            [
                'name'       => 'guru-read',
                'guard_name' => 'web',
            ],
            [
                'name'       => 'staff-read',
                'guard_name' => 'web',
            ],
            [
                'name'       => 'profil-read',
                'guard_name' => 'web',
            ],
            [
                'name'       => 'visitor-read',
                'guard_name' => 'web',
            ],
        ];

        foreach ($data as $row) {
            DB::table('permissions')->insert($row);
        }
    }
}
