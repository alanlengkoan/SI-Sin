<x-admin-layout title="{{ $title }}">
    <!-- begin:: css local -->
    @push('css')
    @endpush
    <!-- end:: css local -->

    <!-- begin:: content -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <a class="nav-link mb-2 active" id="v-pills-sekolah-tab" data-bs-toggle="pill" href="#v-pills-sekolah" role="tab" aria-controls="v-pills-sekolah" aria-selected="true">
                                    <i class="fa fa-image"></i>&nbsp;
                                    Sekolah
                                </a>
                                <a class="nav-link mb-2" id="v-pills-kontak-tab" data-bs-toggle="pill" href="#v-pills-kontak" role="tab" aria-controls="v-pills-kontak" aria-selected="false">
                                    <i class="fa fa-address-card"></i>&nbsp;
                                    Kontak
                                </a>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="tab-content text-muted mt-4 mt-md-0" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-sekolah" role="tabpanel" aria-labelledby="v-pills-sekolah-tab">
                                    <form id="form-sekolah" action="{{ route('pengaturan.save') }}" method="POST">
                                        @foreach ($sekolah as $key => $value)
                                        <div class="mb-3 row field-input">
                                            <label for="{{ $value->key }}" class="col-sm-3 col-form-label">{{ ucfirst($value->key) }}&nbsp;*</label>
                                            <div class="col-md-9 my-auto">
                                                @if ($value->type == 'file')
                                                <input type="file" class="form-control form-control-sm" id="{{ $value->key }}" name="{{ $value->key }}" disabled />
                                                <div class="form-check form-check-inline pt-1 pb-1">
                                                    <input type="checkbox" class="form-check-input" name="change_gambar" id="change_gambar" onclick="change('change_gambar', '{{ $value->key }}')">
                                                    <label class="form-check-label">Ubah File!</label>
                                                </div>
                                                <p><small class="text-muted">File dengan tipe (*.jpg, *.jpeg, *.png).</small></p>
                                                @elseif ($value->type == 'textarea')
                                                <textarea name="{{ $value->key }}" id="{{ $value->key }}" placeholder="Masukkan {{ ucfirst($value->key) }}">{{ $value->value }}</textarea>
                                                @else
                                                <input type="text" name="{{ $value->key }}" id="{{ $value->key }}" class="form-control form-control-sm" value="{{ $value->value }}" placeholder="Masukkan {{ ucfirst($value->key) }}" />
                                                @endif
                                                <span class="invalid-feedback"></span>
                                            </div>
                                        </div>
                                        @endforeach
                                        <div class="hstack gap-2 justify-content-end">
                                            <button type="submit" id="save-sekolah" class="btn btn-primary btn-sm"><i data-feather="save"></i>&nbsp;Save</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="v-pills-kontak" role="tabpanel" aria-labelledby="v-pills-kontak-tab">
                                    <form id="form-kontak" action="{{ route('pengaturan.save') }}" method="POST">
                                        @foreach ($kontak as $key => $value)
                                        <div class="mb-3 row field-input">
                                            <label for="{{ $value->key }}" class="col-sm-3 col-form-label">{{ ucfirst($value->key) }}&nbsp;*</label>
                                            <div class="col-md-9 my-auto">
                                                <input type="text" name="{{ $value->key }}" id="{{ $value->key }}" class="form-control form-control-sm" value="{{ $value->value }}" placeholder="Masukkan {{ ucfirst($value->key) }}" />
                                                <span class="invalid-feedback"></span>
                                            </div>
                                        </div>
                                        @endforeach
                                        <div class="hstack gap-2 justify-content-end">
                                            <button type="submit" id="save-kontak" class="btn btn-primary btn-sm"><i data-feather="save"></i>&nbsp;Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end:: content -->
    <!-- begin:: js local -->
    @push('js')
    <script src="https://cdn.tiny.cloud/1/1e7071suorrjx5e8l8vbnasbwuu0yhtrqqdsnmtnvit9u0xo/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount linkchecker',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
            setup: (editor) => {
                editor.on('change', () => {
                    if (editor.getContent() == '') {
                        $('textarea').removeClass('is-valid').addClass('is-invalid');
                    } else {
                        $('textarea').removeClass('is-invalid').addClass('is-valid');
                    }
                });
            },
        });

        let untukSimpanSekolah = function() {
            $(document).on('submit', '#form-sekolah', function(e) {
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
                        $('#form-sekolah').find('input, textarea, select').removeClass('is-valid');
                        $('#form-sekolah').find('input, textarea, select').removeClass('is-invalid');

                        $('#save-sekolah').attr('disabled', 'disabled');
                        $('#save-sekolah').html('<i data-feather="refresh-ccw"></i>&nbsp;<span>Menunggu...</span>');
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
                                location.reload();
                            });
                        } else {
                            $.each(response.errors, function(key, value) {
                                if (key) {
                                    if (($('#' + key).prop('tagName') === 'INPUT' || $('#' + key).prop('tagName') === 'TEXTAREA')) {
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

                        $('#save-sekolah').removeAttr('disabled');
                        $('#save-sekolah').html('<i data-feather="save"></i>&nbsp;<span>Simpan</span>');
                        feather.replace();
                    }
                });
            });

            $(document).on('keyup', '#form-sekolah input', function(e) {
                e.preventDefault();

                if ($(this).val() == '') {
                    $(this).removeClass('is-valid').addClass('is-invalid');
                } else {
                    $(this).removeClass('is-invalid').addClass('is-valid');
                }
            });

            $(document).on('change', '#form-sekolah input[type="file"]', function(e) {
                e.preventDefault();

                if ($(this).val() == '') {
                    $(this).removeClass('is-valid').addClass('is-invalid');
                } else {
                    $(this).removeClass('is-invalid').addClass('is-valid');
                }
            });
        }();

        let untukSimpanKontak = function() {
            $(document).on('submit', '#form-kontak', function(e) {
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
                        $('#form-kontak').find('input, textarea, select').removeClass('is-valid');
                        $('#form-kontak').find('input, textarea, select').removeClass('is-invalid');

                        $('#save-kontak').attr('disabled', 'disabled');
                        $('#save-kontak').html('<i data-feather="refresh-ccw"></i>&nbsp;<span>Menunggu...</span>');
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
                                location.reload();
                            });
                        } else {
                            $.each(response.errors, function(key, value) {
                                if (key) {
                                    if (($('#' + key).prop('tagName') === 'INPUT' || $('#' + key).prop('tagName') === 'TEXTAREA')) {
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

                        $('#save-kontak').removeAttr('disabled');
                        $('#save-kontak').html('<i data-feather="save"></i>&nbsp;<span>Simpan</span>');
                        feather.replace();
                    }
                });
            });

            $(document).on('keyup', '#form-kontak input', function(e) {
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
</x-admin-layout>