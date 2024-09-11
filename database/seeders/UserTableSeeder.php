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
        ]);

        $user->assignRole('admin');
    }
}
