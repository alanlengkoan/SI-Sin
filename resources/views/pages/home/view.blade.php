<x-pages-layout title="{{ $title }}">
    <!-- begin:: css local -->
    @push('css')
    @endpush
    <!-- end:: css local -->

    <!-- begin:: content -->
    <section class="container">
        <div class="d-flex align-items-center justify-content-center" style="height: 100vh;">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 p-2">
                    <h2 class="text-center">Laporan Marketing</h2>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 p-2">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Agen</h5>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            <a href="{{ route('agen') }}" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 p-2">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Petambak</h5>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            <a href="{{ route('petambak') }}" class="btn btn-primary">Go somewhere</a>
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