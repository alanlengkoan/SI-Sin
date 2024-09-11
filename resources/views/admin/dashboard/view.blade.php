<x-admin-layout title="{{ $title }}">
    <!-- begin:: css local -->
    @push('css')
    <style>
        .chartdiv {
            width: 100%;
            height: 500px;
        }
    </style>
    @endpush
    <!-- end:: css local -->

    <section id="dashboard-ecommerce">
        <div class="row match-height">
        </div>
    </section>
    <!-- begin:: js local -->
    @push('js')
    @endpush
    <!-- end:: js local -->
</x-admin-layout>