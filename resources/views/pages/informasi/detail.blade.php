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
                    <ul class="list-inline custom-breadcrumb mb-2">
                        <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="{{ route('home') }}">Home</a></li>
                        <li class="list-inline-item text-white h3 font-secondary nasted"><a href="{{ route('informasi', Request::segment(2)) }}">{{ ucfirst(Request::segment(2)) }}</a></li>
                        <li class="list-inline-item text-white h3 font-secondary nasted">{{ $title }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- end:: page title -->

    <section class="section-sm bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-4">
                    <img src="{{ asset_upload('picture/informasi/' . $informasi->gambar) }}" alt="blog-thumb" class="img-fluid w-100">
                </div>
                <div class="col-12">
                    <ul class="list-inline">
                        <li class="list-inline-item mr-4 mb-3 mb-md-0 text-light"><span class="font-weight-bold mr-2">Post </span>Admin</li>
                        <li class="list-inline-item mr-4 mb-3 mb-md-0 text-light"><i class="ti-calendar mr-2"></i>{{ tgl_indo($informasi->created_at) }}</li>
                        <li class="list-inline-item mr-4 mb-3 mb-md-0 text-light"><i class="ti-book mr-2"></i>Dilihat {{ $informasi->dilihat }}</li>
                    </ul>
                </div>
                <!-- border -->
                <div class="col-12 mt-4">
                    <div class="border-bottom border-primary"></div>
                </div>
                <!-- blog contect -->
                <div class="col-12 mb-5">
                    <h2>{{ $informasi->nama }}</h2>
                    {!! html_entity_decode($informasi->isi) !!}
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