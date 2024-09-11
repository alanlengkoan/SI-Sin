<x-pages-layout title="{{ $title }}">
    <!-- begin:: css local -->
    @push('css')
    @endpush
    <!-- end:: css local -->

    <!-- begin:: content -->
    <!-- begin:: page title -->
    <section class="page-title-section overlay" data-background="images/backgrounds/page-title.jpg">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <ul class="list-inline custom-breadcrumb mb-2">
                        <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="{{ route('home') }}">Home</a></li>
                        <li class="list-inline-item text-white h3 font-secondary nasted"><a href="{{ route('guru') }}">Guru</a></li>
                        <li class="list-inline-item text-white h3 font-secondary nasted">{{ $title }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- end:: page title -->

    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-5 mb-5">
                    <img class="img-fluid w-100" src="{{ asset_upload('picture/guru/' . $guru->foto) }}" alt="teacher">
                </div>
                <div class="col-md-6 mb-5">
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">NIP</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $guru->nip }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Nama</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $guru->nama }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Jabatan</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $guru->toJabatan->nama }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Pendidikan</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $guru->toPendidikan->nama }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Mata Pelajaran</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $guru->toMatpel->nama }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Tempat, Tanggal Lahir</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $guru->tmp_lahir }}, {{ tgl_indo($guru->tgl_lahir) }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Jenis Kelamin</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ ($guru->kelamin == 'l') ? 'Laki-laki' : 'Perempuan' }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Agama</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $guru->toAgama->nama }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Umur</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ count_age($guru->tgl_lahir) }} Tahun</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Alamat</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $guru->alamat }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end:: content -->

    <!-- begin:: js local -->
    @push('js')
    @endpush
    <!-- end:: js local -->
</x-pages-layout>