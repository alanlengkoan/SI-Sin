<!-- begin:: header -->
<header class="fixed-top header">
    <!-- begin:: top header -->
    <div class="top-header py-2 bg-white">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-4 text-center text-lg-left">
                    <a class="text-color mr-3" href="#"><strong>CALL</strong> {{ $pengaturan['phone']['value'] }}</a>
                </div>
                <div class="col-lg-8 text-center text-lg-right">
                    @if (count($medsos) > 0)
                    <ul class="list-inline d-inline">
                        @foreach ($medsos as $row)
                        <li class="list-inline-item mx-0">
                            <a class="d-inline-block p-1 text-color" href="{{ $row->url }}" target="_blank">
                                <i class="ti-{{ $row->icon }}"></i>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- end:: top header -->
    <!-- begin:: navigation -->
    <div class="navigation w-100">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light p-0">
                <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset_admin('images/logo/logo.png') }}" width="60" alt="logo"></a>
                <button class="navbar-toggler rounded-0" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navigation">
                    <ul class="navbar-nav ml-auto text-center">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item dropdown view">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Profil
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach ($profil as $row)
                                <a class="dropdown-item" href="{{ route('profil', $row->slug) }}">{{ $row->nama }}</a>
                                @endforeach
                            </div>
                        </li>
                        <li class="nav-item dropdown view">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Pegawai
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('guru') }}">Guru</a>
                                <a class="dropdown-item" href="{{ route('staff') }}">Staff</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown view">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Informasi
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach ($kategori as $row)
                                <a class="dropdown-item" href="{{ route('informasi', $row->slug) }}">{{ $row->nama }}</a>
                                @endforeach
                            </div>
                        </li>
                        <li class="nav-item dropdown view">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Kesiswaan
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('organisasi') }}">Organisasi</a>
                                <a class="dropdown-item" href="{{ route('prestasi') }}">Prestasi</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('fasilitas') }}">Fasilitas</a>
                        </li>
                        <li class="nav-item dropdown view">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Galeri
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('foto') }}">Foto</a>
                                <a class="dropdown-item" href="{{ route('video') }}">Video</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <!-- end:: navigation -->
</header>
<!-- end:: header -->