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
                        <li class="list-inline-item text-white h3 font-secondary nasted">{{ $title }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- end:: page title -->

    <section class="section">
        <div class="container">
            @if (count($gurus) > 0)
            <div class="row">
                @foreach($gurus as $row)
                <div class="col-lg-4 col-sm-6 mb-5 filtr-item">
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
            @else
            <div class="alert alert-info" role="alert">
                <h4 class="alert-heading">Mohon maaf!</h4>
                <p>
                    Untuk saat ini belum ada {{ $title }}.
                </p>
            </div>
            @endif
        </div>
    </section>
    <!-- end:: content -->

    <!-- begin:: js local -->
    @push('js')
    @endpush
    <!-- end:: js local -->
</x-pages-layout>