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
        <div data-ref="mixitup-target" class="container">
            @if (count($videos) > 0)
            <div class="row">
                <div class="col-12">
                    <ul class="list-inline text-center filter-controls mb-5">
                        <li class="list-inline-item m-3 text-uppercase" data-filter=".video">video</li>
                        <li class="list-inline-item m-3 text-uppercase" data-filter=".youtube">youtube</li>
                    </ul>
                </div>
            </div>
            <div class="row" data-ref="mixitup-container">
                @foreach($videos as $row)
                @if ($row->jenis === 'video')
                <div data-ref="mixitup-target" class="col-lg-4 col-sm-6 mb-4 video law">
                    <div class="card rounded-0 hover-shadow border-top-0 border-left-0 border-right-0">
                        <video width="100%" controls controlsList="nodownload">
                            <source src="{{ asset_upload('video/galeri/' . $row->file)  }}" type="video/mp4">
                        </video>
                    </div>
                </div>
                @else
                <div data-ref="mixitup-target" class="col-lg-4 col-sm-6 mb-4 youtube">
                    <div class="card rounded-0 hover-shadow border-top-0 border-left-0 border-right-0">
                        <iframe width="100%" height="200" src="https://www.youtube.com/embed/{{ $row->url }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                </div>
                @endif
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