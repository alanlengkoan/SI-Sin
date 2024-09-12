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
                        <form id="form-agen" action="{{ route('store') }}" method="post">
                            <input type="text" name="jenis" value="agen" hidden />
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
                                <label for="nama" class="form-label">Nama toko / agen</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama">
                                <span class="invalid-feedback"></span>
                            </div>
                            <div class="mb-3 field-input">
                                <label for="alamat" class="form-label">Alamat toko / agen</label>
                                <textarea class="form-control" id="alamat" name="alamat" placeholder="Masukkan alamat"></textarea>
                                <span class="invalid-feedback"></span>
                            </div>
                            <div class="mb-3 field-input">
                                <label for="no_hp" class="form-label">No. HP / WA</label>
                                <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan no. hp / wa">
                                <span class="invalid-feedback"></span>
                            </div>
                            <div class="mb-3 field-input">
                                <label for="metode_pembayaran" class="form-label">Metode Pembayaran toko / agen</label>
                                <select class="form-select" id="metode_pembayaran" name="metode_pembayaran">
                                    <option value="">Pilih</option>
                                    <option value="cash">Tunai</option>
                                    <option value="transfer">Transfer</option>
                                </select>
                                <span class="invalid-feedback"></span>
                            </div>
                            <div class="mb-3 field-input">
                                <label for="keluhan" class="form-label">Keluhan yang dialami oleh toko / agen</label>
                                <textarea class="form-control" id="keluhan" name="keluhan" placeholder="Jelaskan secara rinci"></textarea>
                                <span class="invalid-feedback"></span>
                            </div>
                            <div class="mb-3 field-input">
                                <label for="keterangan" class="form-label">Keterangan tambahan yang diperlukan</label>
                                <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Masukkan keterangan"></textarea>
                                <span class="invalid-feedback"></span>
                            </div>

                            <!-- start -->
                            <div class="mb-3 field-input">
                                <label for="target" class="form-label">Target pesanan pakan oleh toko / agen</label>
                                <textarea class="form-control" id="target" name="target" placeholder="Misal : karung atau sak"></textarea>
                                <span class="invalid-feedback"></span>
                            </div>
                            <div class="mb-3 field-input">
                                <label for="market" class="form-label">Market dari toko / agen tersebut</label>
                                <textarea class="form-control" id="market" name="market" placeholder="Masukkan market"></textarea>
                                <span class="invalid-feedback"></span>
                            </div>
                            <div class="mb-3 field-input">
                                <label for="jumlah_ton" class="form-label">Berapa ton yang biasa dihabiskan oleh toko / agen terhadap pakan lain</label>
                                <textarea class="form-control" id="jumlah_ton" name="jumlah_ton" placeholder="Masukkan berapa ton"></textarea>
                                <span class="invalid-feedback"></span>
                            </div>
                            <div class="mb-3 field-input">
                                <label for="brand_kompetitor" class="form-label">Brand kompetitor yang ada ditoko / agen</label>
                                <textarea class="form-control" id="brand_kompetitor" name="brand_kompetitor" placeholder="Masukkan brand kompetitor"></textarea>
                                <span class="invalid-feedback"></span>
                            </div>
                            <div class="mb-3 field-input">
                                <label for="harga_kompetitor" class="form-label">Harga brand kompetitor yang ada ditoko</label>
                                <textarea class="form-control" id="harga_kompetitor" name="harga_kompetitor" placeholder="Masukkan harga kompetitor"></textarea>
                                <span class="invalid-feedback"></span>
                            </div>
                            <!-- end -->

                            <div class="mb-3 field-input">
                                <label for="foto_satu" class="form-label">Foto depan toko</label>
                                <input type="file" class="form-control" id="foto_satu" name="foto_satu" />
                                <span class="invalid-feedback"></span>
                            </div>
                            <div class="mb-3 field-input">
                                <label for="foto_dua" class="form-label">Foto dalam toko</label>
                                <input type="file" class="form-control" id="foto_dua" name="foto_dua" />
                                <span class="invalid-feedback"></span>
                            </div>
                            <div class="mb-3 field-input">
                                <label for="foto_tiga" class="form-label">Foto bersama owner toko</label>
                                <input type="file" class="form-control" id="foto_tiga" name="foto_tiga" />
                                <span class="invalid-feedback"></span>
                            </div>
                            <div class="mb-3 field-input">
                                <label for="foto_empat" class="form-label">Foto gudang toko</label>
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
            $(document).on('submit', '#form-agen', function(e) {
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

            $(document).on('keyup', '#form-agen input', function(e) {
                e.preventDefault();

                if ($(this).val() == '') {
                    $(this).removeClass('is-valid').addClass('is-invalid');
                } else {
                    $(this).removeClass('is-invalid').addClass('is-valid');
                }
            });

            $(document).on('keyup', '#form-agen textarea', function(e) {
                e.preventDefault();

                if ($(this).val() == '') {
                    $(this).removeClass('is-valid').addClass('is-invalid');
                } else {
                    $(this).removeClass('is-invalid').addClass('is-valid');
                }
            });

            $(document).on('change', '#form-agen select', function(e) {
                e.preventDefault();

                if ($(this).val() == '') {
                    $(this).removeClass('is-valid').addClass('is-invalid');
                } else {
                    $(this).removeClass('is-invalid').addClass('is-valid');
                }
            });

            $(document).on('change', '#form-agen input[type="file"]', function(e) {
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