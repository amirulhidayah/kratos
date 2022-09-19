<form id="{{ $form_id }}" action="#" method="POST" enctype="multipart/form-data">
    @csrf
    @if (isset($method) && $method == 'PUT')
        @method('PUT')
    @endif
    <div class="row">
        @if (isset($method) && $method == 'PUT')
            <div class="col-12">
                <small class="form-text text-muted mb-2">Kosongkan password jika tidak ingin mengubah password</small>
            </div>
        @endif
        <div class="col-sm-12 col-lg-12">
            @component('dashboard.components.formElements.select',
                [
                    'label' => 'Role',
                    'id' => 'role',
                    'name' => 'role',
                    'class' => 'select2',
                    'wajib' => '<sup class="text-danger">*</sup>',
                ])
                @slot('options')
                    <option value="Admin">Admin</option>
                    <option value="Pimpinan">Pimpinan</option>
                    <option value="OPD">OPD</option>
                @endslot
            @endcomponent
        </div>
        <div class="col-sm-12 col-lg-6" id="form-username">
            @component('dashboard.components.formElements.input',
                [
                    'label' => 'Username',
                    'type' => 'text',
                    'id' => 'username',
                    'name' => 'username',
                    'wajib' => '<sup class="text-danger">*</sup>',
                    'placeholder' => 'Masukkan Username',
                ])
            @endcomponent
        </div>
        <div class="col-sm-12 col-lg-6" id="form-password">
            @component('dashboard.components.formElements.input',
                [
                    'label' => 'Password',
                    'type' => 'text',
                    'id' => 'password',
                    'name' => 'password',
                    'wajib' => '<sup class="text-danger">*</sup>',
                    'placeholder' => 'Masukkan Password',
                ])
            @endcomponent
        </div>
        <div class="col-sm-12 col-lg-12" id="form-nama">
            @component('dashboard.components.formElements.input',
                [
                    'label' => 'Nama',
                    'type' => 'text',
                    'id' => 'nama',
                    'name' => 'nama',
                    'wajib' => '<sup class="text-danger">*</sup>',
                    'placeholder' => 'Masukkan Nama',
                ])
            @endcomponent
        </div>
        <div class="col-sm-12 col-lg-12" id="form-opd">
            @component('dashboard.components.formElements.select',
                [
                    'label' => 'OPD',
                    'id' => 'opd_id',
                    'name' => 'opd_id',
                    'class' => 'select2',
                    'wajib' => '<sup class="text-danger">*</sup>',
                ])
                @slot('options')
                    @foreach ($daftarOpd as $opd)
                        <option value="{{ $opd->id }}">{{ $opd->nama }}</option>
                    @endforeach
                @endslot
            @endcomponent
        </div>
        <div class="col-sm-12 col-lg-12" id="form-status">
            @component('dashboard.components.formElements.select',
                [
                    'label' => 'Status',
                    'id' => 'status',
                    'name' => 'status',
                    'class' => 'select2',
                    'wajib' => '<sup class="text-danger">*</sup>',
                ])
                @slot('options')
                    <option value="1">Aktif</option>
                    <option value="2">Tidak Aktif</option>
                @endslot
            @endcomponent
        </div>
        <div class="col-12 d-flex justify-content-end mt-3">

            @component('dashboard.components.buttons.submit',
                [
                    'label' => 'Simpan',
                ])
            @endcomponent
        </div>
    </div>
</form>

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#form-username').hide();
            $('#form-password').hide();
            $('#form-nama').hide();
            $('#form-opd').hide();
            $('#form-status').hide();
        });
    </script>
    @if (isset($method) && $method == 'PUT')
    @endif
    <script>
        $('#{{ $form_id }}').submit(function(e) {
            e.preventDefault();
            resetError();
            var formData = new FormData(this);
            swal({
                title: 'Apakah Anda Yakin ?',
                icon: 'info',
                text: "Apakah Anda Yakin ?",
                type: 'info',
                buttons: {
                    cancel: {
                        visible: true,
                        text: 'Batal',
                        className: 'btn btn-light'
                    },
                    confirm: {
                        text: 'Ya',
                        className: 'btn btn-info'
                    },
                }
            }).then((Update) => {
                if (Update) {
                    $.ajax({
                        type: "POST",
                        url: "{{ $action }}",
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        data: formData,
                        cache: false,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            if (response.status == 'success') {
                                swal("Berhasil", "Data Berhasil Disimpan", {
                                    icon: "success",
                                    buttons: false,
                                    timer: 1000,
                                }).then(function() {
                                    window.location.href =
                                        "{{ $back_url }}";
                                })
                            } else {
                                swal("Periksa Kembali Data Anda", {
                                    buttons: false,
                                    timer: 1500,
                                    icon: "warning",
                                });
                                printErrorMsg(response.error);
                            }
                        },
                        error: function(response) {
                            swal("Gagal", "Terjadi Kesalahan", {
                                icon: "error",
                                buttons: false,
                                timer: 1000,
                            });
                        },
                    });
                }
            });
        });

        $('#role').change(function() {
            var role = $(this).val();
            resetError();
            $('#form-username').show();
            $('#form-password').show();
            $('#form-status').show();
            if (role == "Admin" || role == "Pimpinan") {
                $('#form-nama').show();
                $('#form-opd').hide();
            } else {
                $('#form-opd').show();
                $('#form-nama').hide();
            }
        })

        $(function() {
            $('.modal').modal({
                backdrop: 'static',
                keyboard: false
            })
        })

        function resetError() {
            $(".error-text").each(function() {
                $(this).html('');
            })
        }

        const printErrorMsg = (msg) => {
            $.each(msg, function(key, value) {
                $('.' + key + '-error').text(value);
            });
        }
    </script>
@endpush
