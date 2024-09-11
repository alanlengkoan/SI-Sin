<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengaturanSeeder extends Seeder
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
                'key'   => 'fax',
                'type'  => 'text',
                'for'   => 'kontak',
                'value' => '0000',
            ],
            [
                'key'   => 'address',
                'type'  => 'text',
                'for'   => 'kontak',
                'value' => 'Jl. Raya Cimahi No. 1, Cimahi',
            ],
            [
                'key'   => 'phone',
                'type'  => 'text',
                'for'   => 'kontak',
                'value' => '081234567890',
            ],
            [
                'key'   => 'email',
                'type'  => 'text',
                'for'   => 'kontak',
                'value' => 'test@example.com',
            ],
            [
                'key'   => 'website',
                'type'  => 'text',
                'for'   => 'kontak',
                'value' => 'example.com',
            ],
            [
                'key'   => 'maps',
                'type'  => 'text',
                'for'   => 'kontak',
                'value' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1186.0658206306973!2d122.88602412453459!3d0.7952770001752512!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3279472633f7a223%3A0x9f022a85c6cb0bd8!2sSMA%20Negeri%205%20Gorontalo%20Utara!5e0!3m2!1sid!2sid!4v1722910262737!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            ],
            [
                'key'   => 'province',
                'type'  => 'text',
                'for'   => 'kontak',
                'value' => 'Gorontalo',
            ],
            [
                'key'   => 'regency',
                'type'  => 'text',
                'for'   => 'kontak',
                'value' => 'Gorontalo Utara',
            ],
            [
                'key'   => 'subdistrict',
                'type'  => 'text',
                'for'   => 'kontak',
                'value' => 'Kwandang',
            ],
            [
                'key'   => 'ward',
                'type'  => 'text',
                'for'   => 'kontak',
                'value' => 'Mootinelo',
            ],
            [
                'key'   => 'postal',
                'type'  => 'text',
                'for'   => 'kontak',
                'value' => '96252',
            ],
            [
                'key'   => 'npsn',
                'type'  => 'text',
                'for'   => 'sekolah',
                'value' => '1234567890',
            ],
            [
                'key'   => 'nss',
                'type'  => 'text',
                'for'   => 'sekolah',
                'value' => '1234567890',
            ],
            [
                'key'   => 'name',
                'type'  => 'text',
                'for'   => 'sekolah',
                'value' => 'SMA Negeri 5 Gorontalo Utara',
            ],
            [
                'key'   => 'accreditation',
                'type'  => 'text',
                'for'   => 'sekolah',
                'value' => 'Akreditasi A',
            ],
            [
                'key'   => 'type',
                'type'  => 'text',
                'for'   => 'sekolah',
                'value' => 'Negeri',
            ],
            [
                'key'   => 'curriculum',
                'type'  => 'text',
                'for'   => 'sekolah',
                'value' => 'Kurikulum 2013',
            ],
            [
                'key'   => 'leader',
                'type'  => 'text',
                'for'   => 'sekolah',
                'value' => 'John Doe',
            ],
            [
                'key'   => 'picture',
                'type'  => 'file',
                'for'   => 'sekolah',
            ],
            [
                'key'   => 'words',
                'type'  => 'textarea',
                'for'   => 'sekolah',
                'value' => '<p style="line-height: 1.4; text-align: justify;"><span style="font-size: 12pt;"><strong>Lorem ipsum</strong> dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem.</span></p>',
            ],
        ];

        foreach ($data as $row) {
            DB::table('pengaturan')->insert($row);
        }
    }
}
