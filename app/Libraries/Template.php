<?php

/**
 * Laravel Template Library
 *
 * Create template format in Laravel
 *
 * @packge     Laravel
 * @subpackage Libraries
 * @category   Libraries
 * @author     Alan Saputra Lengkoan
 * @license    MIT License
 */

namespace App\Libraries;

use App\Models\Medsos;
use App\Models\Pengaturan;

class Template
{
    // untuk load view
    public static function load($role, $title, $module, $view, array $data = [])
    {
        // untuk judul halaman
        $data['title'] = $title;

        return view("{$role}/{$module}/{$view}", $data);
    }

    // untuk load pages
    public static function pages($title, $module, $view, array $data = [])
    {
        // untuk judul halaman
        $data['title'] = $title;
        // untuk medsos
        $data['medsos'] = Medsos::all();
        // untuk pengaturan
        $data['pengaturan'] = Pengaturan::all()->keyBy('key')->toArray();
        
        return view("pages/{$module}/{$view}", $data);
    }
}
