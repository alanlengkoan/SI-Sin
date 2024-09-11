<x-pages-layout title="{{ $title }}">
    <!-- begin:: css local -->
    @push('css')
    @endpush
    <!-- end:: css local -->

    <!-- begin:: content -->
    <section class="container">
        <div class="row pt-3 pb-3">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Form {{ $title }}</h5>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <div class="mb-3">
                                <label for="id_marketing" class="form-label">Marketing</label>
                                <select class="form-select" aria-label="Default select example" id="id_marketing">
                                    <option selected>Pilih</option>
                                    @foreach ($marketing as $row)
                                        <option value="{{ $row->id_marketing }}">{{ $row->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama toko / agen</label>
                                <input type="text" class="form-control" id="nama" placeholder="Masukkan nama">
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat toko / agen</label>
                                <textarea class="form-control" id="alamat"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="no_hp" class="form-label">No. HP / WA</label>
                                <input type="text" class="form-control" id="no_hp" placeholder="Masukkan no. hp / wa">
                            </div>
                            <div class="mb-3">
                                <label for="metode_pembayaran" class="form-label">Metode Pembayaran toko / agen</label>
                                <select class="form-select" aria-label="Default select example" name="metode_pembayaran">
                                    <option selected>Open this select menu</option>
                                    <option value="cash">Tunai</option>
                                    <option value="transfer">Transfer</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="keluhan" class="form-label">Keluhan yang dialami oleh toko / agen</label>
                                <textarea class="form-control" id="keluhan" placeholder="Jelaskan secara rinci"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan tambahan yang diperlukan</label>
                                <textarea class="form-control" id="keterangan"></textarea>
                            </div>

                            <!-- start -->
                            <div class="mb-3">
                                <label for="target" class="form-label">Target pesanan pakan oleh toko / agen</label>
                                <textarea class="form-control" id="target" placeholder="Misal : karung atau sak"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="market" class="form-label">Market dari toko / agen tersebut</label>
                                <textarea class="form-control" id="market"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="jumlah_ton" class="form-label">Berapa ton yang biasa dihabiskan oleh toko / agen terhadap pakan lain</label>
                                <textarea class="form-control" id="jumlah_ton"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="brand_kompetitor" class="form-label">Brand kompetitor yang ada ditoko / agen</label>
                                <textarea class="form-control" id="brand_kompetitor"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="harga_kompetitor" class="form-label">Harga brand kompetitor yang ada ditoko</label>
                                <textarea class="form-control" id="harga_kompetitor"></textarea>
                            </div>
                            <!-- end -->
                            
                            <div class="mb-3">
                                <label for="foto_satu" class="form-label">Foto depan toko</label>
                                <input type="file" class="form-control" id="foto_satu" />
                            </div>
                            <div class="mb-3">
                                <label for="foto_dua" class="form-label">Foto dalam toko</label>
                                <input type="file" class="form-control" id="foto_dua" />
                            </div>
                            <div class="mb-3">
                                <label for="foto_tiga" class="form-label">Foto bersama owner toko</label>
                                <input type="file" class="form-control" id="foto_tiga" />
                            </div>
                            <div class="mb-3">
                                <label for="foto_empat" class="form-label">Foto gudang toko</label>
                                <input type="file" class="form-control" id="foto_empat" />
                            </div>
                            <div class="mb-3">
                                <label for="foto_lima" class="form-label">Foto KTP</label>
                                <input type="file" class="form-control" id="foto_lima" />
                            </div>
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary" type="button">Button</button>
                                <button class="btn btn-danger" type="button">Back</button>
                            </div>
                        </form>
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