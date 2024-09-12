<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// begin:: admin
Breadcrumbs::for('admin.dashboard.index', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('admin.dashboard.index'));
});

Breadcrumbs::for('admin.akun.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard.index');

    $trail->push('Akun', route('admin.akun.index'));
});

Breadcrumbs::for('admin.marketing.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard.index');

    $trail->push('Marketing', route('admin.marketing.index'));
});

Breadcrumbs::for('admin.pelaporan.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard.index');

    $trail->push('Pelaporan', route('admin.pelaporan.index'));
});

Breadcrumbs::for('admin.agen.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard.index');

    $trail->push('Agen', route('admin.agen.index'));
});

Breadcrumbs::for('admin.petambak.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard.index');

    $trail->push('Petambak', route('admin.petambak.index'));
});
// end:: admin
