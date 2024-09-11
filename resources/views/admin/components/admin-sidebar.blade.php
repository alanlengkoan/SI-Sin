<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <!-- begin:: brand -->
            <li class="nav-item me-auto">
                <a class="navbar-brand" href="#">
                    <span class="brand-logo">
                        <img src="{{ asset_admin('images/logo/logo.png') }}" alt="logo">
                    </span>
                    <h2 class="brand-text">SEKOLAH</h2>
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
            <li class="nav-item {{ request()->is('dashboard') ? 'active' : ''  }}">
                <a class="d-flex align-items-center" href="{{ route('dashboard.index') }}">
                    <i data-feather="home"></i><span class="menu-title text-truncate">Dashboard</span>
                </a>
            </li>
            <li class="navigation-header">
                <span>Master</span><i data-feather="more-horizontal"></i>
            </li>
            <li class="nav-item {{ request()->is('agama') ? 'active' : ''  }}">
                <a class="d-flex align-items-center" href="{{ route('agama.index') }}">
                    <i data-feather="list"></i><span class="menu-title text-truncate">Agama</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('marketing') ? 'active' : ''  }}">
                <a class="d-flex align-items-center" href="{{ route('marketing.index') }}">
                    <i data-feather="list"></i><span class="menu-title text-truncate">Marketing</span>
                </a>
            </li>
            <li class="navigation-header">
                <span>Pustaka</span><i data-feather="more-horizontal"></i>
            </li>
            <li class="nav-item {{ request()->is('marketing') ? 'active' : ''  }}">
                <a class="d-flex align-items-center" href="{{ route('marketing.index') }}">
                    <i data-feather="list"></i><span class="menu-title text-truncate">Pelaporan</span>
                </a>
            </li>
            <li class="navigation-header">
                <span>Data</span><i data-feather="more-horizontal"></i>
            </li>
            <li class="nav-item {{ request()->is('marketing') ? 'active' : ''  }}">
                <a class="d-flex align-items-center" href="{{ route('marketing.index') }}">
                    <i data-feather="list"></i><span class="menu-title text-truncate">Agen</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('marketing') ? 'active' : ''  }}">
                <a class="d-flex align-items-center" href="{{ route('marketing.index') }}">
                    <i data-feather="list"></i><span class="menu-title text-truncate">Petambak</span>
                </a>
            </li>
        </ul>
    </div>
</div>