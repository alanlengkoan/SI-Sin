<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <!-- begin:: brand -->
            <li class="nav-item me-auto">
                <a class="navbar-brand" href="#">
                    <h2 class="brand-text">CRM</h2>
                </a>
            </li>
            <li class="nav-item nav-toggle" style="color: #000;">
                <a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse">
                    <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i>
                    <i class="d-none d-xl-block collapse-toggle-icon font-medium-4 text-primary" data-feather="disc" data-ticon="disc"></i>
                </a>
            </li>
            <!-- end:: brand -->
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="navigation-header">
                <span>Dashboard</span><i data-feather="more-horizontal"></i>
            </li>
            <li class="nav-item {{ request()->is('admin/dashboard') ? 'active' : ''  }}">
                <a class="d-flex align-items-center" href="{{ route('admin.dashboard.index') }}">
                    <i data-feather="home"></i><span class="menu-title text-truncate">Dashboard</span>
                </a>
            </li>
            <li class="navigation-header">
                <span>Master</span><i data-feather="more-horizontal"></i>
            </li>
            <li class="nav-item {{ request()->is('admin/marketing') ? 'active' : ''  }}">
                <a class="d-flex align-items-center" href="{{ route('admin.marketing.index') }}">
                    <i data-feather="list"></i><span class="menu-title text-truncate">Marketing</span>
                </a>
            </li>
            <li class="navigation-header">
                <span>Pustaka</span><i data-feather="more-horizontal"></i>
            </li>
            <li class="nav-item {{ request()->is('admin/pelaporan') ? 'active' : ''  }}">
                <a class="d-flex align-items-center" href="{{ route('admin.pelaporan.index') }}">
                    <i data-feather="list"></i><span class="menu-title text-truncate">Pelaporan</span>
                </a>
            </li>
            <li class="navigation-header">
                <span>Data</span><i data-feather="more-horizontal"></i>
            </li>
            <li class="nav-item {{ request()->is('admin/agen') ? 'active' : ''  }}">
                <a class="d-flex align-items-center" href="{{ route('admin.agen.index') }}">
                    <i data-feather="list"></i><span class="menu-title text-truncate">Agen</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('admin/petambak') ? 'active' : ''  }}">
                <a class="d-flex align-items-center" href="{{ route('admin.petambak.index') }}">
                    <i data-feather="list"></i><span class="menu-title text-truncate">Petambak</span>
                </a>
            </li>
        </ul>
    </div>
</div>