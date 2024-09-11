<?php

use App\Models\Product;
use App\Models\Type;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// begin:: pages
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push(__('menu.home'), route('home'));
});

Breadcrumbs::for('products', function (BreadcrumbTrail $trail) {
    $trail->parent('home');

    $trail->push(__('menu.product'), route('products'));
});

Breadcrumbs::for('products.type', function (BreadcrumbTrail $trail, Type $type) {
    $trail->parent('products');

    $trail->push(ucfirst($type->singkatan), route('products.type', $type->singkatan));
});

Breadcrumbs::for('products.detail', function (BreadcrumbTrail $trail, Type $type, Product $product) {
    $trail->parent('products.type', $type);

    $trail->push('Detail', route('products.detail', ['slug' => $type->singkatan, 'id' => $product->id_product]));
});

Breadcrumbs::for('about', function (BreadcrumbTrail $trail) {
    $trail->parent('home');

    $trail->push(__('menu.about'), route('about'));
});

Breadcrumbs::for('contact', function (BreadcrumbTrail $trail) {
    $trail->parent('home');

    $trail->push(__('menu.contact'), route('contact'));
});

Breadcrumbs::for('sop', function (BreadcrumbTrail $trail) {
    $trail->parent('home');

    $trail->push(__('menu.sop'), route('sop'));
});

Breadcrumbs::for('testimonies', function (BreadcrumbTrail $trail) {
    $trail->parent('home');

    $trail->push(__('menu.testimony'), route('testimonies'));
});
// end:: pages

// begin:: admin
Breadcrumbs::for('dashboard.index', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('dashboard.index'));
});

Breadcrumbs::for('akun.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard.index');

    $trail->push('Akun', route('akun.index'));
});

Breadcrumbs::for('pengaturan.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard.index');

    $trail->push('Pengaturan', route('pengaturan.index'));
});

Breadcrumbs::for('agama.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard.index');

    $trail->push('Agama', route('agama.index'));
});

Breadcrumbs::for('matpel.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard.index');

    $trail->push('Mata Pelajaran', route('matpel.index'));
});

Breadcrumbs::for('jabatan.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard.index');

    $trail->push('Jabatan', route('jabatan.index'));
});

Breadcrumbs::for('pendidikan.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard.index');

    $trail->push('Pendidikan', route('pendidikan.index'));
});

Breadcrumbs::for('kategori.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard.index');

    $trail->push('Kategori', route('kategori.index'));
});

Breadcrumbs::for('medsos.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard.index');

    $trail->push('Media Sosial', route('medsos.index'));
});

Breadcrumbs::for('fasilitas.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard.index');

    $trail->push('Fasilitas', route('fasilitas.index'));
});

Breadcrumbs::for('organisasi.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard.index');

    $trail->push('Organisasi', route('organisasi.index'));
});

Breadcrumbs::for('prestasi.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard.index');

    $trail->push('Prestasi', route('prestasi.index'));
});

Breadcrumbs::for('galeri.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard.index');

    $trail->push('Galeri', route('galeri.index'));
});

Breadcrumbs::for('informasi.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard.index');

    $trail->push('Informasi', route('informasi.index'));
});

Breadcrumbs::for('profil.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard.index');

    $trail->push('Profil', route('profil.index'));
});

Breadcrumbs::for('guru.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard.index');

    $trail->push('Guru', route('guru.index'));
});

Breadcrumbs::for('staff.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard.index');

    $trail->push('Staff', route('staff.index'));
});

Breadcrumbs::for('visitor.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard.index');

    $trail->push('Visitor', route('visitor.index'));
});
// end:: admin
