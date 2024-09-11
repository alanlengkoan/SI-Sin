<footer>
    <div class="footer bg-footer section border-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-8 mb-5 mb-lg-0">
                    <a class="logo-footer" href="#"><img class="img-fluid mb-4" src="{{ asset_admin('images/logo/logo.png') }}" width="90" alt="logo"></a>
                    <ul class="list-unstyled">
                        <li class="mb-2">{{ $pengaturan['address']['value'] }}, {{ $pengaturan['ward']['value'] }}, {{ $pengaturan['subdistrict']['value'] }}, {{ $pengaturan['regency']['value'] }}, {{ $pengaturan['province']['value'] }} {{ $pengaturan['postal']['value'] }}.</li>
                        <li class="mb-2">{{ $pengaturan['phone']['value'] }}</li>
                        <li class="mb-2">{{ $pengaturan['email']['value'] }}</li>
                        <li class="mb-2">{{ $pengaturan['website']['value'] }}</li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 col-6 mb-5 mb-md-0">
                    <h4 class="text-white mb-5">TENTANG</h4>
                    <ul class="list-unstyled">
                        <li class="mb-3"><a class="text-color" href="{{ route('guru') }}">Guru</a></li>
                        <li class="mb-3"><a class="text-color" href="{{ route('staff') }}">Staff</a></li>
                        <li class=" mb-3"><a class="text-color" href="{{ route('kontak') }}">Kontak</a></li>
                        <li class=" mb-3"><a class="text-color" href="{{ route('tentang') }}">Tentang</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 col-6 mb-5 mb-md-0">
                    <h4 class="text-white mb-5">KESISWAAN</h4>
                    <ul class="list-unstyled">
                        <li class="mb-3"><a class="text-color" href="{{ route('organisasi') }}">Organisasi</a></li>
                        <li class="mb-3"><a class="text-color" href="{{ route('prestasi') }}">Prestasi</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 col-6 mb-5 mb-md-0">
                    <h4 class="text-white mb-5">SARPRAS</h4>
                    <ul class="list-unstyled">
                        <li class="mb-3"><a class="text-color" href="{{ route('fasilitas') }}">Fasilitas</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright py-4 bg-footer">
        <div class="container">
            @if (count($medsos) > 0)
            <div class="row">
                <div class="col-sm-7 text-sm-left text-center">
                    <p class="mb-0" id="copyright"></p>
                </div>
                <div class="col-sm-5 text-sm-right text-center">
                    <ul class="list-inline">
                        @foreach ($medsos as $row)
                        <li class="list-inline-item">
                            <a class="d-inline-block p-2" href="{{ $row->url }}" target="_blank">
                                <i class="ti-{{ $row->icon }} text-primary"></i>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @else
            <div class="d-flex justify-content-center">
                <p id="copyright" class="fs-6 my-auto"></p>
            </div>
            @endif
        </div>
    </div>
</footer>