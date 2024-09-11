<x-admin-layout title="{{ $title }}">
    <!-- begin:: css local -->
    @push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset_admin('vendors/css/tables/datatable/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset_admin('vendors/css/tables/datatable/buttons.bootstrap5.min.css') }}">
    @endpush
    <!-- end:: css local -->

    <!-- begin:: content -->
    <section>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <div class="head-label">
                            <h4 class="card-title">{{ $title }}</h4>
                        </div>
                        <div class="dt-action-buttons text-end">
                            <div class="dt-buttons d-inline-flex">
                                <button type="button" id="add" class="btn btn-sm btn-relief-success" data-bs-toggle="modal" data-bs-target="#modal-add-upd">
                                    <i data-feather='plus'></i>&nbsp;<span>Tambah</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-datatable">
                        <table class="table table-striped table-bordered" id="tabel-staff-dt" style="width: 100%;">
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- begin:: modal tambah & ubah -->
    <div id="modal-add-upd" class="modal fade text-start" tabindex="-1" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><span id="judul-add-upd"></span> <?= $title ?></h4>
                </div>
                <!-- begin:: untuk form -->
                <form id="form-add-upd" class="form form-horizontal" action="{{ route('staff.save') }}" method="POST">
                    <div class="modal-body">
                        <!-- begin:: untuk loading -->
                        <div id="form-loading"></div>
                        <!-- end:: untuk loading -->
                        <div id="form-show">
                            <div class="row">
                                <!-- begin:: id -->
                                <input type="hidden" name="id_staff" id="id_staff" />
                                <!-- end:: id -->
                                <div class="col-12">
                                    <div class="field-input mb-1 row">
                                        <div class="col-sm-3">
                                            <label class="col-form-label" for="id_agama">Agama&nbsp;*</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <select class="form-control form-control-sm" name="id_agama" id="id_agama">
                                                <option value="">Pilih</option>
                                                @foreach ($agamas as $row)
                                                <option value="{{ $row->id_agama }}">{{ $row->nama }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                    <div class="field-input mb-1 row">
                                        <div class="col-sm-3">
                                            <label class="col-form-label" for="id_jabatan">Jabatan&nbsp;*</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <select class="form-control form-control-sm" name="id_jabatan" id="id_jabatan">
                                                <option value="">Pilih</option>
                                                @foreach ($jabatans as $row)
                                                <option value="{{ $row->id_jabatan }}">{{ $row->nama }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                    <div class="field-input mb-1 row">
                                        <div class="col-sm-3">
                                            <label class="col-form-label" for="id_pendidikan">Pendidikan&nbsp;*</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <select class="form-control form-control-sm" name="id_pendidikan" id="id_pendidikan">
                                                <option value="">Pilih</option>
                                                @foreach ($pendidikans as $row)
                                                <option value="{{ $row->id_pendidikan }}">{{ $row->nama }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                    <div class="field-input mb-1 row">
                                        <div class="col-sm-3">
                                            <label class="col-form-label" for="nama">Nama&nbsp;*</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control form-control-sm" id="nama" name="nama" placeholder="Masukkan nama" />
                                            <div class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                    <div class="field-input mb-1 row">
                                        <div class="col-sm-3">
                                            <label class="col-form-label" for="kelamin">Jenis Kelamain&nbsp;*</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <select class="form-control form-control-sm" name="kelamin" id="kelamin">
                                                <option value="">Pilih</option>
                                                <option value="l">Laki-laki</option>
                                                <option value="p">Perempuan</option>
                                            </select>
                                            <div class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                    <div class="field-input mb-1 row">
                                        <div class="col-sm-3">
                                            <label class="col-form-label" for="tgl_lahir">Tanggal Lahir&nbsp;*</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control form-control-sm" id="tgl_lahir" name="tgl_lahir" />
                                            <div class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                    <div class="field-input mb-1 row">
                                        <div class="col-sm-3">
                                            <label class="col-form-label" for="tmp_lahir">Tempat Lahir&nbsp;*</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control form-control-sm" id="tmp_lahir" name="tmp_lahir" placeholder="Masukkan tempat lahir" />
                                            <div class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                    <div class="field-input mb-1 row">
                                        <div class="col-sm-3">
                                            <label class="col-form-label" for="alamat">Alamat&nbsp;*</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <textarea type="text" class="form-control form-control-sm" id="alamat" name="alamat" placeholder="Masukkan alamat" /></textarea>
                                            <div class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                    <div class="field-input mb-1 row">
                                        <div class="col-sm-3">
                                            <label class="col-form-label" for="foto">Foto&nbsp;*</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-control form-control-sm" id="foto" name="foto" />
                                            <div id="centang_picture"></div>
                                            <p><small class="text-muted">File dengan tipe (*.jpg, *.jpeg, *.png).</small></p>
                                            <div class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                    <div class="field-input mb-1 row">
                                        <div class="col-sm-3">
                                            <label class="col-form-label" for="facebook">Facebook&nbsp;*</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control form-control-sm" id="facebook" name="facebook" placeholder="Masukkan link facebook" />
                                            <div class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                    <div class="field-input mb-1 row">
                                        <div class="col-sm-3">
                                            <label class="col-form-label" for="instagram">Instagram&nbsp;*</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control form-control-sm" id="instagram" name="instagram" placeholder="Masukkan link instagram" />
                                            <div class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="cancel" class="btn btn-sm btn-relief-danger" data-bs-dismiss="modal">
                            <i data-feather="x"></i>&nbsp;<span>Batal</span>
                        </button>
                        <button type="submit" id="save" class="btn btn-sm btn-relief-primary">
                            <i data-feather="save"></i>&nbsp;<span>Simpan</span>
                        </button>
                    </div>
                </form>
                <!-- end:: untuk form -->
            </div>
        </div>
    </div>
    <!-- end:: modal tambah & ubah -->
    <!-- end:: content -->

    <!-- begin:: js local -->
    @push('js')
    <script src="{{ asset_admin('vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset_admin('vendors/js/tables/datatable/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset_admin('vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset_admin('vendors/js/tables/datatable/datatables.checkboxes.min.js') }}"></script>
    <script src="{{ asset_admin('vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
    <script src="{{ asset_admin('vendors/js/tables/datatable/jszip.min.js') }}"></script>
    <script src="{{ asset_admin('vendors/js/tables/datatable/pdfmake.min.js') }}"></script>
    <script src="{{ asset_admin('vendors/js/tables/datatable/vfs_fonts.js') }}"></script>
    <script src="{{ asset_admin('vendors/js/tables/datatable/buttons.html5.min.js') }}"></script>
    <script src="{{ asset_admin('vendors/js/tables/datatable/buttons.print.min.js') }}"></script>
    <script src="{{ asset_admin('vendors/js/tables/datatable/dataTables.rowGroup.min.js') }}"></script>

    <script>
        var table;

        let untukTabel = function() {
            table = $('#tabel-staff-dt').DataTable({
                serverSide: true,
                responsive: true,
                processing: true,
                lengthMenu: [5, 10, 25, 50],
                pageLength: 10,
                language: {
                    emptyTable: "Tak ada data yang tersedia pada tabel ini.",
                    processing: "Data sedang diproses...",
                },
                ajax: "{{ route('staff.get_data_dt') }}",
                dom: '<"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                drawCallback: function() {
                    feather.replace();
                },
                columns: [{
                        title: 'No.',
                        data: 'DT_RowIndex',
                        class: 'text-center'
                    },
                    {
                        title: 'Nama',
                        data: 'nama',
                        class: 'text-center'
                    },
                    {
                        title: 'Tanggal Lahir',
                        data: 'tgl_lahir',
                        class: 'text-center'
                    },
                    {
                        title: 'Tempat Lahir',
                        data: 'tmp_lahir',
                        class: 'text-center'
                    },
                    {
                        title: 'Jenis Kelamin',
                        data: 'kelamin',
                        class: 'text-center'
                    },
                    {
                        title: 'Agama',
                        data: 'to_agama.nama',
                        class: 'text-center'
                    },
                    {
                        title: 'Jabatan',
                        data: 'to_jabatan.nama',
                        class: 'text-center'
                    },
                    {
                        title: 'Pendidikan',
                        data: 'to_pendidikan.nama',
                        class: 'text-center'
                    },
                    {
                        title: 'Alamat',
                        data: 'alamat',
                        class: 'text-center'
                    },
                    {
                        title: 'Foto',
                        data: 'foto',
                        class: 'text-center'
                    },
                    {
                        title: 'Aksi',
                        data: 'action',
                        className: 'text-center',
                        responsivePriority: -1,
                        orderable: false,
                        searchable: false,
                    },
                ],
            });
        }();

        let untukSimpanData = function() {
            $(document).on('submit', '#form-add-upd', function(e) {
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
                        $('#form-add-upd').find('input, textarea, select').removeClass('is-valid');
                        $('#form-add-upd').find('input, textarea, select').removeClass('is-invalid');

                        $('#save').attr('disabled', 'disabled');
                        $('#save').html('<i data-feather="refresh-ccw"></i>&nbsp;<span>Menunggu...</span>');
                        feather.replace();
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
                                $('#modal-add-upd').modal('hide');
                                table.ajax.reload();
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

                        $('#save').removeAttr('disabled');
                        $('#save').html('<i data-feather="save"></i>&nbsp;<span>Simpan</span>');
                        feather.replace();
                    }
                });
            });

            $(document).on('keyup', '#form-add-upd input', function(e) {
                e.preventDefault();

                if ($(this).val() == '') {
                    $(this).removeClass('is-valid').addClass('is-invalid');
                } else {
                    $(this).removeClass('is-invalid').addClass('is-valid');
                }
            });

            $(document).on('keyup', '#form-add-upd textarea', function(e) {
                e.preventDefault();

                if ($(this).val() == '') {
                    $(this).removeClass('is-valid').addClass('is-invalid');
                } else {
                    $(this).removeClass('is-invalid').addClass('is-valid');
                }
            });

            $(document).on('change', '#form-add-upd select', function(e) {
                e.preventDefault();

                if ($(this).val() == '') {
                    $(this).removeClass('is-valid').addClass('is-invalid');
                } else {
                    $(this).removeClass('is-invalid').addClass('is-valid');
                }
            });

            $(document).on('change', '#form-add-upd input[type="date"]', function(e) {
                e.preventDefault();

                if ($(this).val() == '') {
                    $(this).removeClass('is-valid').addClass('is-invalid');
                } else {
                    $(this).removeClass('is-invalid').addClass('is-valid');
                }
            });

            $(document).on('change', '#form-add-upd input[type="file"]', function(e) {
                e.preventDefault();

                if ($(this).val() == '') {
                    $(this).removeClass('is-valid').addClass('is-invalid');
                } else {
                    $(this).removeClass('is-invalid').addClass('is-valid');
                }
            });
        }();

        let untukTambahData = function() {
            $(document).on('click', '#add', function(e) {
                e.preventDefault();
                $('#judul-add-upd').text('Tambah');

                $('#id_staff').removeAttr('value');

                $("input[name*='foto']").removeAttr('disabled');
                $("input[name*='foto']").attr('id', 'foto');
                $('#centang_picture').empty();
                $('#centang_picture').removeAttr('style');

                $('#form-add-upd').find('input, textarea, select').removeClass('is-valid');
                $('#form-add-upd').find('input, textarea, select').removeClass('is-invalid');

                $('#form-add-upd').parsley().destroy();
                $('#form-add-upd').parsley().reset();
                $('#form-add-upd')[0].reset();
            });
        }();

        let untukUbahData = function() {
            $(document).on('click', '#upd', function(e) {
                var ini = $(this);

                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: "{{ route('staff.show') }}",
                    data: {
                        id: ini.data('id')
                    },
                    beforeSend: function() {
                        $('#judul-add-upd').html('Ubah');
                        $('#form-loading').html(`<div class="center"><div class="loader"></div></div>`);
                        $('#form-show').attr('style', 'display: none');

                        $('#form-add-upd').find('input, textarea, select').removeClass('is-valid');
                        $('#form-add-upd').find('input, textarea, select').removeClass('is-invalid');

                        ini.attr('disabled', 'disabled');
                        ini.html('<i data-feather="refresh-ccw"></i>&nbsp;<span>Menunggu...</span>');
                        feather.replace();
                    },
                    success: function(response) {
                        $('#form-loading').empty();
                        $('#form-show').removeAttr('style');

                        $('#id_staff').val(response.id_staff);
                        $('#id_agama').val(response.id_agama);
                        $('#id_jabatan').val(response.id_jabatan);
                        $('#id_pendidikan').val(response.id_pendidikan);
                        $('#nama').val(response.nama);
                        $('#kelamin').val(response.kelamin);
                        $('#tgl_lahir').val(response.tgl_lahir);
                        $('#tmp_lahir').val(response.tmp_lahir);
                        $('#alamat').val(response.alamat);
                        $('#facebook').val(response.facebook);
                        $('#instagram').val(response.instagram);

                        $('#foto').attr('disabled', 'disabled');
                        $('#foto').removeAttr('id');
                        $('#centang_picture').html(`<div class="form-check form-check-inline"><input type="checkbox" class="form-check-input" name="change_picture" id="change_picture" onclick="change('change_picture', 'foto')"><label class="form-check-label">Ubah File!</label></div>`);
                        $('#centang_picture').attr('style', 'padding-top: 10px');

                        ini.removeAttr('disabled');
                        ini.html('<i data-feather="edit"></i>&nbsp;<span>Ubah</span>');
                        feather.replace();
                    }
                });
            });
        }();

        let untukHapusData = function() {
            $(document).on('click', '#del', function() {
                var ini = $(this);

                Swal.fire({
                    title: "Apakah Anda yakin ingin menghapusnya?",
                    text: "Data yang telah dihapus tidak dapat dikembalikan!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: 'Iya, Hapus!',
                    customClass: {
                        confirmButton: 'btn btn-sm btn-success',
                        cancelButton: 'btn btn-sm btn-danger ms-1'
                    },
                    buttonsStyling: false
                }).then(function(result) {
                    if (result.value) {
                        Swal.fire({
                            title: 'Masukkan password Anda!',
                            input: 'password',
                            inputLabel: 'Password Anda',
                            inputPlaceholder: 'Masukkan password Anda',
                        }).then((result) => {
                            $.ajax({
                                type: "post",
                                url: "{{ route('staff.del') }}",
                                dataType: 'json',
                                data: {
                                    id: ini.data('id'),
                                    password: result.value,
                                },
                                beforeSend: function() {
                                    ini.attr('disabled', 'disabled');
                                    ini.html('<i data-feather="refresh-ccw"></i>&nbsp;<span>Menunggu...</span>');
                                    feather.replace();
                                },
                                success: function(response) {
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
                                        table.ajax.reload();
                                    });
                                }
                            });
                        })
                    }
                });
            });
        }();
    </script>
    @endpush
    <!-- end:: js local -->
</x-admin-layout>