<x-pages-layout title="{{ $title }}">
    <!-- begin:: css local -->
    @push('css')
    @endpush
    <!-- end:: css local -->

    <!-- begin:: content -->
    <!-- begin:: page title -->
    <section class="page-title-section overlay" data-background="{{ asset_pages('images/backgrounds/page-title.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <ul class="list-inline custom-breadcrumb">
                        <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="{{ route('home') }}">Home</a></li>
                        <li class="list-inline-item text-white h3 font-secondary nasted">{{ $title }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- begin:: page title -->

    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-5 mb-5">
                    <img class="img-fluid w-100" src="{{ asset_admin('images/logo/logo.png') }}" alt="teacher">
                </div>
                <div class="col-md-6 mb-5 my-auto">
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">NPSN</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $pengaturan['npsn']['value'] }} </p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">NSS</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $pengaturan['nss']['value'] }} </p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Nama</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $pengaturan['name']['value'] }} </p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Akreditasi</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $pengaturan['accreditation']['value'] }} </p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Tipe</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $pengaturan['type']['value'] }} </p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Kurikulum</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $pengaturan['curriculum']['value'] }} </p>
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