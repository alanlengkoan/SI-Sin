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

    <section class="section bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 mb-4 mb-lg-0">
                    {!! $pengaturan['maps']['value'] !!}
                </div>
                <div class="col-lg-5">
                    <p class="text-secondary mb-2">Informasi lebih lanjut silahkan kunjungi sekolah kami.</p>

                    <div class="d-flex mb-2">
                        <div class="text-primary p-2 display-4">
                            <i class="ti-map text-primary"></i>
                        </div>
                        <div>
                            <h4 class="mb-3">Alamat</h4>
                            <address class="mb-0 text-secondary">{{ $pengaturan['address']['value'] }}, {{ $pengaturan['ward']['value'] }}, {{ $pengaturan['subdistrict']['value'] }}, {{ $pengaturan['regency']['value'] }}, {{ $pengaturan['province']['value'] }} {{ $pengaturan['postal']['value'] }}.</address>
                        </div>
                    </div>
                    <div class="d-flex mb-2">
                        <div class="text-primary p-2 display-4">
                            <i class="ti-email text-primary"></i>
                        </div>
                        <div>
                            <h4 class="mb-3">Email</h4>
                            <address class="mb-0 text-secondary">{{ $pengaturan['email']['value'] }}</address>
                        </div>
                    </div>
                    <div class="d-flex mb-2">
                        <div class="text-primary p-2 display-4">
                            <i class="ti-microphone text-primary"></i>
                        </div>
                        <div>
                            <h4 class="mb-3">Telepon</h4>
                            <address class="mb-0 text-secondary">{{ $pengaturan['phone']['value'] }}</address>
                        </div>
                    </div>
                    <div class="d-flex mb-2">
                        <div class="text-primary p-2 display-4">
                            <i class="ti-world text-primary"></i>
                        </div>
                        <div>
                            <h4 class="mb-3">Website</h4>
                            <address class="mb-0 text-secondary">{{ $pengaturan['website']['value'] }}</address>
                        </div>
                    </div>

                    @if (count($medsos) > 0)
                    <ul class="list-inline">
                        @foreach ($medsos as $row)
                        <li class="list-inline-item">
                            <a class="d-inline-block p-2" href="{{ $row->link }}" target="_blank">
                                <i class="ti-{{ $row->icon }} text-primary"></i>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                    @endif
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