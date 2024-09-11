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

Breadcrumbs::for('agama.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard.index');

    $trail->push('Agama', route('agama.index'));
});

Breadcrumbs::for('marketing.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard.index');

    $trail->push('Marketing', route('marketing.index'));
});
// end:: admin
