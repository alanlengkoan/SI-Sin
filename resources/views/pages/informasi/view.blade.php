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
            @if (count($informasi) > 0)
            <div class="row">
                @foreach($informasi as $row)
                <article class="col-lg-4 col-sm-6 mb-5">
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
            {{ $informasi->onEachSide(0)->links('partials.custom') }}
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
    <!-- begin:: body -->
    <!-- end:: content -->

    <!-- begin:: js local -->
    @push('js')
    @endpush
    <!-- end:: js local -->
</x-pages-layout>