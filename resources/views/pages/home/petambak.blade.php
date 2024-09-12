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
                        <form id="form-petambak" action="{{ route('store') }}" method="post">
                            <div class="mb-3 field-input">
                                <label for="id_marketing" class="form-label">Marketing</label>
                                <select class="form-select" id="id_marketing" name="id_marketing">
                                    <option value="">Pilih</option>
                                    @foreach ($marketing as $row)
                                    <option value="{{ $row->id_marketing }}">{{ $row->nama }}</option>
                                    @endforeach
                                </select>
                                <span class="invalid-feedback"></span>
                            </div>
                            <div class="mb-3 field-input">
                                <label for="nama" class="form-label">Nama petambak / farmer</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama">
                                <span class="invalid-feedback"></span>
                            </div>
                            <div class="mb-3 field-input">
                                <label for="alamat" class="form-label">Alamat petambak / farmer</label>
                                <textarea class="form-control" id="alamat" name="alamat" placeholder="Masukkan alamat"></textarea>
                                <span class="invalid-feedback"></span>
                            </div>
                            <div class="mb-3 field-input">
                                <label for="no_hp" class="form-label">No. HP / WA</label>
                                <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan no. hp / wa">
                                <span class="invalid-feedback"></span>
                            </div>
                            <div class="mb-3 field-input">
                                <label for="metode_pembayaran" class="form-label">Metode Pembayaran petambak / farmer</label>
                                <select class="form-select" id="metode_pembayaran" name="metode_pembayaran">
                                    <option value="">Pilih</option>
                                    <option value="cash">Tunai</option>
                                    <option value="transfer">Transfer</option>
                                </select>
                                <span class="invalid-feedback"></span>
                            </div>
                            <div class="mb-3 field-input">
                                <label for="keluhan" class="form-label">Keluhan yang dialami oleh petambak / farmer</label>
                                <textarea class="form-control" id="keluhan" name="keluhan" placeholder="Jelaskan secara rinci"></textarea>
                                <span class="invalid-feedback"></span>
                            </div>
                            <div class="mb-3 field-input">
                                <label for="keterangan" class="form-label">Keterangan tambahan yang dibutuhkan</label>
                                <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Masukkan keterangan"></textarea>
                                <span class="invalid-feedback"></span>
                            </div>

                            <!-- start -->
                            <div class="mb-3 field-input">
                                <label for="komoditi" class="form-label">Komoditi yang dibudidaya ditambak</label>
                                <textarea class="form-control" id="komoditi" name="komoditi" placeholder="Misal : bandeng, nila dan udang"></textarea>
                                <span class="invalid-feedback"></span>
                            </div>
                            <div class="mb-3 field-input">
                                <label for="jumlah_kolam" class="form-label">Ada berapa kolam tambak</label>
                                <textarea class="form-control" id="jumlah_kolam" name="jumlah_kolam" placeholder="Jumlah kolam"></textarea>
                                <span class="invalid-feedback"></span>
                            </div>
                            <div class="mb-3 field-input">
                                <label for="luas" class="form-label">Luas keseluruhan</label>
                                <textarea class="form-control" id="luas" name="luas" placeholder="Masukkan luas"></textarea>
                                <span class="invalid-feedback"></span>
                            </div>
                            <div class="mb-3 field-input">
                                <label for="jumlah_ton" class="form-label">Berapa ton keseluruhan hasil budidaya tambak</label>
                                <textarea class="form-control" id="jumlah_ton" name="jumlah_ton" placeholder="Masukkan ton"></textarea>
                                <span class="invalid-feedback"></span>
                            </div>
                            <div class="mb-3 field-input">
                                <label for="pakan" class="form-label">Pakan yang biasa atau sebelum pakan CGA digunakan</label>
                                <textarea class="form-control" id="pakan" name="pakan" placeholder="Masukkan pakan"></textarea>
                                <span class="invalid-feedback"></span>
                            </div>
                            <div class="mb-3 field-input">
                                <label for="harga_pakan" class="form-label">Harga pakan yang biasa digunakan</label>
                                <textarea class="form-control" id="harga_pakan" name="harga_pakan" placeholder="Masukkan harga"></textarea>
                                <span class="invalid-feedback"></span>
                            </div>
                            <div class="mb-3 field-input">
                                <label for="jumlah_terpakai" class="form-label">Berapa karung yang biasa digunakan untuk ditambak tersebut</label>
                                <textarea class="form-control" id="jumlah_terpakai" name="jumlah_terpakai" placeholder="Masukkan karung"></textarea>
                                <span class="invalid-feedback"></span>
                            </div>
                            <!-- end -->

                            <div class="mb-3 field-input">
                                <label for="foto_satu" class="form-label">Foto tambak satu</label>
                                <input type="file" class="form-control" id="foto_satu" name="foto_satu"/>
                                <span class="invalid-feedback"></span>
                            </div>
                            <div class="mb-3 field-input">
                                <label for="foto_dua" class="form-label">Foto tambak dua</label>
                                <input type="file" class="form-control" id="foto_dua" name="foto_dua" />
                                <span class="invalid-feedback"></span>
                            </div>
                            <div class="mb-3 field-input">
                                <label for="foto_tiga" class="form-label">Foto tambak tiga</label>
                                <input type="file" class="form-control" id="foto_tiga" name="foto_tiga" />
                                <span class="invalid-feedback"></span>
                            </div>
                            <div class="mb-3 field-input">
                                <label for="foto_empat" class="form-label">Foto bersama petambak</label>
                                <input type="file" class="form-control" id="foto_empat" name="foto_empat" />
                                <span class="invalid-feedback"></span>
                            </div>
                            <div class="mb-3 field-input">
                                <label for="foto_lima" class="form-label">Foto KTP</label>
                                <input type="file" class="form-control" id="foto_lima" name="foto_lima" />
                                <span class="invalid-feedback"></span>
                            </div>
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary" type="submit" id="submit">Submit</button>
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
    <script>
        let untukSubmit = function() {
            $(document).on('submit', '#form-petambak', function(e) {
                e.preventDefault();

                $.ajax({
                    method: $(this).attr('method'),
                    url: $(this).attr('action'),
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    cache: false,
                    dataType: 'json',
                    beforeSend: function() {
                        $('#submit').attr('disabled', 'disabled');
                        $('#submit').html("Menunggu...");
                    },
                    success: function(response) {
                        if (response.type === 'success') {
                            Swal.fire({
                                title: response.title,
                                text: response.text,
                                icon: response.type,
                                confirmButtonText: response.button,
                                customClass: {
                                    confirmButton: `btn btn-sm btn-${response.class}`,
                                },
                                buttonsStyling: false,
                            }).then((value) => {
                                location.reload();
                            });
                        } else {
                            $.each(response.errors, function(key, value) {
                                if (key) {
                                    if (($('#' + key).prop('tagName') === 'INPUT' || $('#' + key).prop('tagName') === 'TEXTAREA')) {
                                        $('#' + key).addClass('is-invalid');
                                        $('#' + key).parents('.field-input').find('.invalid-feedback').html(value);
                                    } else if ($('#' + key).prop('tagName') === 'SELECT') {
                                        $('#' + key).addClass('is-invalid');
                                        $('#' + key).parents('.field-input').find('.invalid-feedback').html(value);
                                    }
                                }
                            });

                            Swal.fire({
                                title: response.title,
                                text: response.text,
                                icon: response.type,
                                confirmButtonText: response.button,
                                customClass: {
                                    confirmButton: `btn btn-sm btn-${response.class}`,
                                },
                                buttonsStyling: false,
                            });
                        }

                        $('#submit').removeAttr('disabled');
                        $('#submit').html("Submit");
                    }
                });
            });

            $(document).on('keyup', '#form-petambak input', function(e) {
                e.preventDefault();

                if ($(this).val() == '') {
                    $(this).removeClass('is-valid').addClass('is-invalid');
                } else {
                    $(this).removeClass('is-invalid').addClass('is-valid');
                }
            });

            $(document).on('keyup', '#form-petambak textarea', function(e) {
                e.preventDefault();

                if ($(this).val() == '') {
                    $(this).removeClass('is-valid').addClass('is-invalid');
                } else {
                    $(this).removeClass('is-invalid').addClass('is-valid');
                }
            });

            $(document).on('change', '#form-petambak select', function(e) {
                e.preventDefault();

                if ($(this).val() == '') {
                    $(this).removeClass('is-valid').addClass('is-invalid');
                } else {
                    $(this).removeClass('is-invalid').addClass('is-valid');
                }
            });

            $(document).on('change', '#form-petambak input[type="file"]', function(e) {
                e.preventDefault();

                if ($(this).val() == '') {
                    $(this).removeClass('is-valid').addClass('is-invalid');
                } else {
                    $(this).removeClass('is-invalid').addClass('is-valid');
                }
            });
        }();
    </script>
    @endpush
    <!-- end:: js local -->
</x-pages-layout>