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

    <!-- begin:: body -->
    <section class="section">
        <div class="container">
            @if (count($organisasis) > 0)
            <div class="row">
                @foreach($organisasis as $row)
                <div class="col-lg-4 col-sm-6 mb-4">
                    <div class="card rounded-0 hover-shadow border-top-0 border-left-0 border-right-0">
                        <img class="card-img-top rounded-0" src="{{ asset_upload('picture/organisasi/' . $row->gambar) }}" alt="research thumb">
                        <div class="card-body">
                            <h4 class="card-title">{{ $row->nama }}</h4>
                            <p class="card-text">{!! html_entity_decode($row->deskripsi) !!}</p>
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
    <!-- end:: body -->
    <!-- end:: content -->

    <!-- begin:: js local -->
    @push('js')
    @endpush
    <!-- end:: js local -->
</x-pages-layout>