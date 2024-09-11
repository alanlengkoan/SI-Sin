<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PermissionSeeder::class,
            UserTableSeeder::class,
            AgamaTableSeeder::class,
            MatpelTableSeeder::class,
            JabatanTableSeeder::class,
            PendidikanTableSeeder::class,
            PengaturanSeeder::class,
            VisitorSeeder::class
        ]);
    }
}
