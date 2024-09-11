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
            <li class="nav-item {{ request()->is('matpel') ? 'active' : ''  }}">
                <a class="d-flex align-items-center" href="{{ route('matpel.index') }}">
                    <i data-feather="list"></i><span class="menu-title text-truncate">Matpel</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('jabatan') ? 'active' : ''  }}">
                <a class="d-flex align-items-center" href="{{ route('jabatan.index') }}">
                    <i data-feather="list"></i><span class="menu-title text-truncate">Jabatan</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('pendidikan') ? 'active' : ''  }}">
                <a class="d-flex align-items-center" href="{{ route('pendidikan.index') }}">
                    <i data-feather="list"></i><span class="menu-title text-truncate">Pendidikan</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('kategori') ? 'active' : ''  }}">
                <a class="d-flex align-items-center" href="{{ route('kategori.index') }}">
                    <i data-feather="list"></i><span class="menu-title text-truncate">Kategori</span>
                </a>
            </li>
            <li class="navigation-header">
                <span>Fitur</span><i data-feather="more-horizontal"></i>
            </li>
            <li class="nav-item {{ request()->is('medsos') ? 'active' : ''  }}">
                <a class="d-flex align-items-center" href="{{ route('medsos.index') }}">
                    <i data-feather="list"></i><span class="menu-title text-truncate">Medsos</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('fasilitas') ? 'active' : ''  }}">
                <a class="d-flex align-items-center" href="{{ route('fasilitas.index') }}">
                    <i data-feather="list"></i><span class="menu-title text-truncate">Fasilitas</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('organisasi') ? 'active' : ''  }}">
                <a class="d-flex align-items-center" href="{{ route('organisasi.index') }}">
                    <i data-feather="list"></i><span class="menu-title text-truncate">Organisasi</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('prestasi') ? 'active' : ''  }}">
                <a class="d-flex align-items-center" href="{{ route('prestasi.index') }}">
                    <i data-feather="list"></i><span class="menu-title text-truncate">Prestasi</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('galeri') ? 'active' : ''  }}">
                <a class="d-flex align-items-center" href="{{ route('galeri.index') }}">
                    <i data-feather="list"></i><span class="menu-title text-truncate">Galeri</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('informasi') ? 'active' : ''  }}">
                <a class="d-flex align-items-center" href="{{ route('informasi.index') }}">
                    <i data-feather="list"></i><span class="menu-title text-truncate">Informasi</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('profil') ? 'active' : ''  }}">
                <a class="d-flex align-items-center" href="{{ route('profil.index') }}">
                    <i data-feather="list"></i><span class="menu-title text-truncate">Profil</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('guru') ? 'active' : ''  }}">
                <a class="d-flex align-items-center" href="{{ route('guru.index') }}">
                    <i data-feather="list"></i><span class="menu-title text-truncate">Guru</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('staff') ? 'active' : ''  }}">
                <a class="d-flex align-items-center" href="{{ route('staff.index') }}">
                    <i data-feather="list"></i><span class="menu-title text-truncate">Staff</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('visitor') ? 'active' : ''  }}">
                <a class="d-flex align-items-center" href="{{ route('visitor.index') }}">
                    <i data-feather="list"></i><span class="menu-title text-truncate">Visitor</span>
                </a>
            </li>
        </ul>
    </div>
</div>