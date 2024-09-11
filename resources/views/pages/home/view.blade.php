<x-pages-layout title="{{ $title }}">
    <!-- begin:: css local -->
    @push('css')
    @endpush
    <!-- end:: css local -->

    <!-- begin:: content -->
    <!-- begin:: hero slider -->
    <section class="hero-section overlay bg-cover" data-background="{{ asset_pages('images/banner/banner-1.jpg') }}">
        <div class="container">
            <div class="hero-slider">
                <!-- slider item -->
                <div class="hero-slider-item">
                    <div class="row">
                        <div class="col-md-8">
                            <h1 class="text-white" data-animation-out="fadeOutRight" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInLeft" data-delay-in=".1">Your bright future is our mission</h1>
                            <p class="text-muted mb-4" data-animation-out="fadeOutRight" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInLeft" data-delay-in=".4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor
                                incididunt ut labore et
                                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exer</p>
                            <a href="contact.html" class="btn btn-primary" data-animation-out="fadeOutRight" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInLeft" data-delay-in=".7">Apply now</a>
                        </div>
                    </div>
                </div>
                <!-- slider item -->
                <div class="hero-slider-item">
                    <div class="row">
                        <div class="col-md-8">
                            <h1 class="text-white" data-animation-out="fadeOutUp" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInDown" data-delay-in=".1">Your bright future is our mission</h1>
                            <p class="text-muted mb-4" data-animation-out="fadeOutUp" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInDown" data-delay-in=".4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor
                                incididunt ut labore et
                                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exer</p>
                            <a href="contact.html" class="btn btn-primary" data-animation-out="fadeOutUp" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInDown" data-delay-in=".7">Apply now</a>
                        </div>
                    </div>
                </div>
                <!-- slider item -->
                <div class="hero-slider-item">
                    <div class="row">
                        <div class="col-md-8">
                            <h1 class="text-white" data-animation-out="fadeOutDown" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1">Your bright future is our mission</h1>
                            <p class="text-muted mb-4" data-animation-out="fadeOutDown" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor
                                incididunt ut labore et
                                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exer</p>
                            <a href="contact.html" class="btn btn-primary" data-animation-out="fadeOutDown" data-delay-out="5" data-duration-in=".3" data-animation-in="zoomIn" data-delay-in=".7">Apply now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end:: hero slider -->

    <!-- begin:: sambutan -->
    <section class="section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 order-2 order-md-1">
                    <h2 class="section-title">Sambutan Kepala Sekolah {{ $pengaturan['name']['value'] }}</h2>
                    {!! $pengaturan['words']['value'] !!}
                    <h4>
                        {{ $pengaturan['leader']['value'] }}
                    </h4>
                </div>
                <div class="col-md-6 order-1 order-md-2 mb-4 mb-md-0">
                    <img class="img-fluid w-100" src="{{ ($pengaturan['picture']['value'] === null) ? '//placehold.co/150' : asset_upload('picture/sekolah/' . $pengaturan['picture']['value']) }}" alt="about image">
                </div>
            </div>
        </div>
    </section>
    <!-- end:: sambutan -->

    <!-- begin:: gurus -->
    @if (count($gurus) > 0)
    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2 class="section-title">Guru</h2>
                </div>
                <!-- teacher -->
                @foreach($gurus as $row)
                <div class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
                    <div class="card border-0 rounded-0 hover-shadow">
                        <img class="card-img-top rounded-0" src="{{ asset_upload('picture/guru/' . $row->foto) }}" alt="teacher">
                        <div class="card-body">
                            <a href="{{ route('guru.detail', my_encrypt($row->id_guru)) }}">
                                <h4 class="card-title">{{ $row->nama }}</h4>
                            </a>
                            <p>{{ $row->toJabatan->nama }} - {{ $row->toMatpel->nama }}</p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a class="text-color" href="{{ $row->facebook ?? '#' }}">
                                        <i class="ti-facebook"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="text-color" href="{{ $row->instagram ?? '#' }}">
                                        <i class="ti-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
    <!-- end:: gurus -->

    <!-- begin:: informasi -->
    @if (count($informasi) > 0)
    @foreach ($informasi as $row)
    @if (count($row->toInformasi) > 0)
    <section class="section pt-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="section-title">
                        {{ $row->nama }}
                    </h2>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach($row->toInformasi->take(3) as $row)
                <article class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
                    <div class="card rounded-0 border-bottom border-primary border-top-0 border-left-0 border-right-0 hover-shadow">
                        <img class="card-img-top rounded-0" src="{{ asset_upload('picture/informasi/' . $row->gambar) }}" alt="Post thumb">
                        <div class="card-body">
                            <!-- post meta -->
                            <ul class="list-inline mb-3">
                                <!-- post date -->
                                <li class="list-inline-item mr-3 ml-0">{{ tgl_indo($row->created_at) }}</li>
                                <!-- author -->
                                <li class="list-inline-item mr-3 ml-0">By Admin</li>
                            </ul>
                            <h4 class="card-title">{{ $row->judul }}</h4>
                            <a href="{{ route('informasi.detail', ['slug' => $row->toKategori->slug, 'id' => my_encrypt($row->id_informasi)]) }}" class="btn btn-primary btn-sm">read more</a>
                        </div>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </section>
    @endif
    @endforeach
    @endif
    <!-- end:: informasi -->
    <!-- end:: content -->

    <!-- begin:: js local -->
    @push('js')
    @endpush
    <!-- end:: js local -->
</x-pages-layout>