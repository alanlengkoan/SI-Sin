<x-admin-layout title="{{ $title }}">
    <!-- begin:: css local -->
    @push('css')
    @endpush
    <!-- end:: css local -->

    <!-- begin:: content -->
    <section>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <div class="head-label">
                            <h4 class="card-title">{{ $title }} {{ ucfirst($pelaporan->jenis) }}</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 p-2">
                                <form class="form form-horizontal mt-2">
                                    <div class="mb-1 row">
                                        <div class="col-sm-6">
                                            <label class="col-form-label">Marketing</label>
                                        </div>
                                        <div class="col-sm-6">
                                            {{ $pelaporan->toMarketing->nama }}
                                        </div>
                                    </div>
                                    <div class="mb-1 row">
                                        <div class="col-sm-6">
                                            <label class="col-form-label">Tanggal</label>
                                        </div>
                                        <div class="col-sm-6">
                                            {{ $pelaporan->tgl }}
                                        </div>
                                    </div>

                                    @if ($pelaporan->toAgen)
                                    <div class="mb-1 row">
                                        <div class="col-sm-6">
                                            <label class="col-form-label">Nama toko / agen</label>
                                        </div>
                                        <div class="col-sm-6">
                                            {{ $pelaporan->toAgen->nama }}
                                        </div>
                                    </div>
                                    <div class="mb-1 row">
                                        <div class="col-sm-6">
                                            <label class="col-form-label">Alamat toko / agen</label>
                                        </div>
                                        <div class="col-sm-6">
                                            {{ $pelaporan->toAgen->alamat }}
                                        </div>
                                    </div>
                                    <div class="mb-1 row">
                                        <div class="col-sm-6">
                                            <label class="col-form-label">No. HP / WA</label>
                                        </div>
                                        <div class="col-sm-6">
                                            {{ $pelaporan->toAgen->no_hp }}
                                        </div>
                                    </div>
                                    <div class="mb-1 row">
                                        <div class="col-sm-6">
                                            <label class="col-form-label">Metode Pembayaran toko / agen</label>
                                        </div>
                                        <div class="col-sm-6">
                                            {{ $pelaporan->toAgen->metode_pembayaran }}
                                        </div>
                                    </div>
                                    <div class="mb-1 row">
                                        <div class="col-sm-6">
                                            <label class="col-form-label">Keluhan yang dialami oleh toko / agen</label>
                                        </div>
                                        <div class="col-sm-6">
                                            {{ $pelaporan->toAgen->keluhan }}
                                        </div>
                                    </div>
                                    <div class="mb-1 row">
                                        <div class="col-sm-6">
                                            <label class="col-form-label">Keterangan tambahan yang diperlukan</label>
                                        </div>
                                        <div class="col-sm-6">
                                            {{ $pelaporan->toAgen->keterangan }}
                                        </div>
                                    </div>
                                    <div class="mb-1 row">
                                        <div class="col-sm-6">
                                            <label class="col-form-label">Target pesanan pakan oleh toko / agen</label>
                                        </div>
                                        <div class="col-sm-6">
                                            {{ $pelaporan->toAgen->target }}
                                        </div>
                                    </div>
                                    <div class="mb-1 row">
                                        <div class="col-sm-6">
                                            <label class="col-form-label">Market dari toko / agen tersebut</label>
                                        </div>
                                        <div class="col-sm-6">
                                            {{ $pelaporan->toAgen->market }}
                                        </div>
                                    </div>
                                    <div class="mb-1 row">
                                        <div class="col-sm-6">
                                            <label class="col-form-label">Berapa ton yang biasa dihabiskan oleh toko / agen terhadap pakan lain</label>
                                        </div>
                                        <div class="col-sm-6">
                                            {{ $pelaporan->toAgen->jumlah_ton }}
                                        </div>
                                    </div>
                                    <div class="mb-1 row">
                                        <div class="col-sm-6">
                                            <label class="col-form-label">Brand kompetitor yang ada ditoko / agen</label>
                                        </div>
                                        <div class="col-sm-6">
                                            {{ $pelaporan->toAgen->brand_kompetitor }}
                                        </div>
                                    </div>
                                    <div class="mb-1 row">
                                        <div class="col-sm-6">
                                            <label class="col-form-label">Harga brand kompetitor yang ada ditoko</label>
                                        </div>
                                        <div class="col-sm-6">
                                            {{ $pelaporan->toAgen->harga_kompetitor }}
                                        </div>
                                    </div>
                                    @endif

                                    @if ($pelaporan->toPetambak)
                                    <div class="mb-1 row">
                                        <div class="col-sm-6">
                                            <label class="col-form-label">Nama petambak / farmer</label>
                                        </div>
                                        <div class="col-sm-6">
                                            {{ $pelaporan->toPetambak->nama }}
                                        </div>
                                    </div>
                                    <div class="mb-1 row">
                                        <div class="col-sm-6">
                                            <label class="col-form-label">Alamat petambak / farmer</label>
                                        </div>
                                        <div class="col-sm-6">
                                            {{ $pelaporan->toPetambak->alamat }}
                                        </div>
                                    </div>
                                    <div class="mb-1 row">
                                        <div class="col-sm-6">
                                            <label class="col-form-label">No. HP / WA</label>
                                        </div>
                                        <div class="col-sm-6">
                                            {{ $pelaporan->toPetambak->no_hp }}
                                        </div>
                                    </div>
                                    <div class="mb-1 row">
                                        <div class="col-sm-6">
                                            <label class="col-form-label">Metode Pembayaran petambak / farmer</label>
                                        </div>
                                        <div class="col-sm-6">
                                            {{ $pelaporan->toPetambak->metode_pembayaran }}
                                        </div>
                                    </div>
                                    <div class="mb-1 row">
                                        <div class="col-sm-6">
                                            <label class="col-form-label">Keluhan yang dialami oleh petambak / farmer</label>
                                        </div>
                                        <div class="col-sm-6">
                                            {{ $pelaporan->toPetambak->keluhan }}
                                        </div>
                                    </div>
                                    <div class="mb-1 row">
                                        <div class="col-sm-6">
                                            <label class="col-form-label">Keterangan tambahan yang diperlukan</label>
                                        </div>
                                        <div class="col-sm-6">
                                            {{ $pelaporan->toPetambak->keterangan }}
                                        </div>
                                    </div>
                                    <div class="mb-1 row">
                                        <div class="col-sm-6">
                                            <label class="col-form-label">Komoditi yang dibudidaya ditambak</label>
                                        </div>
                                        <div class="col-sm-6">
                                            {{ $pelaporan->toPetambak->komoditi }}
                                        </div>
                                    </div>
                                    <div class="mb-1 row">
                                        <div class="col-sm-6">
                                            <label class="col-form-label">Ada berapa kolam tambak</label>
                                        </div>
                                        <div class="col-sm-6">
                                            {{ $pelaporan->toPetambak->jumlah_kolam }}
                                        </div>
                                    </div>
                                    <div class="mb-1 row">
                                        <div class="col-sm-6">
                                            <label class="col-form-label">Luas keseluruhan</label>
                                        </div>
                                        <div class="col-sm-6">
                                            {{ $pelaporan->toPetambak->luas }}
                                        </div>
                                    </div>
                                    <div class="mb-1 row">
                                        <div class="col-sm-6">
                                            <label class="col-form-label">Berapa ton keseluruhan hasil budidaya tambak</label>
                                        </div>
                                        <div class="col-sm-6">
                                            {{ $pelaporan->toPetambak->jumlah_ton }}
                                        </div>
                                    </div>
                                    <div class="mb-1 row">
                                        <div class="col-sm-6">
                                            <label class="col-form-label">Pakan yang biasa atau sebelum pakan CGA digunakan</label>
                                        </div>
                                        <div class="col-sm-6">
                                            {{ $pelaporan->toPetambak->pakan }}
                                        </div>
                                    </div>
                                    <div class="mb-1 row">
                                        <div class="col-sm-6">
                                            <label class="col-form-label">Harga pakan yang biasa digunakan</label>
                                        </div>
                                        <div class="col-sm-6">
                                            {{ $pelaporan->toPetambak->harga_pakan }}
                                        </div>
                                    </div>
                                    <div class="mb-1 row">
                                        <div class="col-sm-6">
                                            <label class="col-form-label">Berapa karung yang biasa digunakan untuk ditambak tersebut</label>
                                        </div>
                                        <div class="col-sm-6">
                                            {{ $pelaporan->toPetambak->jumlah_terpakai }}
                                        </div>
                                    </div>
                                    @endif
                                </form>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 p-2">
                                @if ($pelaporan->toAgen)
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 p-2">
                                        <h2>Foto depan toko</h2>
                                        <hr style=" border-top: 2px solid black;" />
                                        <img src="{{ ($pelaporan->toAgen->foto_satu === null) ? '//placehold.co/450' : asset_upload('picture/pelaporan/'.$pelaporan->toAgen->foto_satu) }}" class="img-fluid mx-auto d-block" />
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 p-2">
                                        <h2>Foto dalam toko</h2>
                                        <hr style=" border-top: 2px solid black;" />
                                        <img src="{{ ($pelaporan->toAgen->foto_dua === null) ? '//placehold.co/450' : asset_upload('picture/pelaporan/'.$pelaporan->toAgen->foto_dua) }}" class="img-fluid mx-auto d-block" />
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 p-2">
                                        <h2>Foto bersama owner tokov</h2>
                                        <hr style=" border-top: 2px solid black;" />
                                        <img src="{{ ($pelaporan->toAgen->foto_tiga === null) ? '//placehold.co/450' : asset_upload('picture/pelaporan/'.$pelaporan->toAgen->foto_tiga) }}" class="img-fluid mx-auto d-block" />
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 p-2">
                                        <h2>Foto gudang toko</h2>
                                        <hr style=" border-top: 2px solid black;" />
                                        <img src="{{ ($pelaporan->toAgen->foto_empat === null) ? '//placehold.co/450' : asset_upload('picture/pelaporan/'.$pelaporan->toAgen->foto_empat) }}" class="img-fluid mx-auto d-block" />
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 p-2">
                                        <h2>Foto KTP</h2>
                                        <hr style=" border-top: 2px solid black;" />
                                        <img src="{{ ($pelaporan->toAgen->foto_lima === null) ? '//placehold.co/450' : asset_upload('picture/pelaporan/'.$pelaporan->toAgen->foto_lima) }}" class="img-fluid mx-auto d-block" />
                                    </div>
                                </div>
                                @endif

                                @if ($pelaporan->toPetambak)
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 p-2">
                                        <h2>Foto tambak satu</h2>
                                        <hr style=" border-top: 2px solid black;" />
                                        <img src="{{ ($pelaporan->toPetambak->foto_satu === null) ? '//placehold.co/450' : asset_upload('picture/pelaporan/'.$pelaporan->toPetambak->foto_satu) }}" class="img-fluid mx-auto d-block" />
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 p-2">
                                        <h2>Foto tambak dua</h2>
                                        <hr style=" border-top: 2px solid black;" />
                                        <img src="{{ ($pelaporan->toPetambak->foto_dua === null) ? '//placehold.co/450' : asset_upload('picture/pelaporan/'.$pelaporan->toPetambak->foto_dua) }}" class="img-fluid mx-auto d-block" />
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 p-2">
                                        <h2>Foto tambak tiga</h2>
                                        <hr style=" border-top: 2px solid black;" />
                                        <img src="{{ ($pelaporan->toPetambak->foto_tiga === null) ? '//placehold.co/450' : asset_upload('picture/pelaporan/'.$pelaporan->toPetambak->foto_tiga) }}" class="img-fluid mx-auto d-block" />
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 p-2">
                                        <h2>Foto bersama petambak</h2>
                                        <hr style=" border-top: 2px solid black;" />
                                        <img src="{{ ($pelaporan->toPetambak->foto_empat === null) ? '//placehold.co/450' : asset_upload('picture/pelaporan/'.$pelaporan->toPetambak->foto_empat) }}" class="img-fluid mx-auto d-block" />
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 p-2">
                                        <h2>Foto KTP</h2>
                                        <hr style=" border-top: 2px solid black;" />
                                        <img src="{{ ($pelaporan->toPetambak->foto_lima === null) ? '//placehold.co/450' : asset_upload('picture/pelaporan/'.$pelaporan->toPetambak->foto_lima) }}" class="img-fluid mx-auto d-block" />
                                    </div>
                                </div>
                                @endif
                            </div>
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
</x-admin-layout>