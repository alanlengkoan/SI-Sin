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
                                <label for="nama" class="form-label">Nama petambak / farmer</label>
                                <input type="text" class="form-control" id="nama" placeholder="Masukkan nama">
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat petambak / farmer</label>
                                <textarea class="form-control" id="alamat"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="no_hp" class="form-label">No. HP / WA</label>
                                <input type="text" class="form-control" id="no_hp" placeholder="Masukkan no. hp / wa">
                            </div>
                            <div class="mb-3">
                                <label for="metode_pembayaran" class="form-label">Metode Pembayaran petambak / farmer</label>
                                <select class="form-select" aria-label="Default select example" name="metode_pembayaran">
                                    <option selected>Open this select menu</option>
                                    <option value="cash">Tunai</option>
                                    <option value="transfer">Transfer</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="keluhan" class="form-label">Keluhan yang dialami oleh petambak / farmer</label>
                                <textarea class="form-control" id="keluhan" placeholder="Jelaskan secara rinci"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan tambahan yang dibutuhkan</label>
                                <textarea class="form-control" id="keterangan"></textarea>
                            </div>

                            <!-- start -->
                            <div class="mb-3">
                                <label for="komoditi" class="form-label">Komoditi yang dibudidaya ditambak</label>
                                <textarea class="form-control" id="komoditi" placeholder="Misal : bandeng, nila dan udang"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="jumlah_kolam" class="form-label">Ada berapa kolam tambak</label>
                                <textarea class="form-control" id="jumlah_kolam"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="luas" class="form-label">Luas keseluruhan</label>
                                <textarea class="form-control" id="luas"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="jumlah_ton" class="form-label">Berapa ton keseluruhan hasil budidaya tambak</label>
                                <textarea class="form-control" id="jumlah_ton"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="pakan" class="form-label">Pakan yang biasa atau sebelum pakan CGA digunakan</label>
                                <textarea class="form-control" id="pakan"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="harga_pakan" class="form-label">Harga pakan yang biasa digunakan</label>
                                <textarea class="form-control" id="harga_pakan"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="jumlah_terpakai" class="form-label">Berapa karung yang biasa digunakan untuk ditambak tersebut</label>
                                <textarea class="form-control" id="jumlah_terpakai"></textarea>
                            </div>
                            <!-- end -->

                            <div class="mb-3">
                                <label for="foto_satu" class="form-label">Foto tambak satu</label>
                                <input type="file" class="form-control" id="foto_satu" />
                            </div>
                            <div class="mb-3">
                                <label for="foto_dua" class="form-label">Foto tambak dua</label>
                                <input type="file" class="form-control" id="foto_dua" />
                            </div>
                            <div class="mb-3">
                                <label for="foto_tiga" class="form-label">Foto tambak tiga</label>
                                <input type="file" class="form-control" id="foto_tiga" />
                            </div>
                            <div class="mb-3">
                                <label for="foto_empat" class="form-label">Foto bersama petambak</label>
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