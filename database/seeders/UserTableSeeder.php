<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // insert users
        $user = User::create([
            'name'     => 'Alan Saputra Lengkoan',
            'email'    => 'alanlengkoan@gmail.com',
            'username' => 'admin',
            'password' => Hash::make('admin'),
            'active'   => 'y',
        ]);

        $role = Role::create(['name' => 'admin']);

        $role->givePermissionTo([
            'agama-read',
            'matpel-read',
            'jabatan-read',
            'pendidikan-read',
            'kategori-read',
            'medsos-read',
            'fasilitas-read',
            'organisasi-read',
            'prestasi-read',
            'galeri-read',
            'informasi-read',
            'guru-read',
            'staff-read',
            'profil-read',
            'visitor-read',
        ]);

        $user->assignRole('admin');
    }
}
