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
        ];

        foreach ($data as $row) {
            DB::table('permissions')->insert($row);
        }
    }
}
