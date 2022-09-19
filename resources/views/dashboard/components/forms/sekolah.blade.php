<form id="{{ $form_id }}" action="#" method="POST" enctype="multipart/form-data">
    @csrf
    @if (isset($method) && $method == 'PUT')
        @method('PUT')
    @endif
    <div class="row">
        <div class="col-sm-12 col-lg-12">
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
                    'label' => 'Jenis Sekolah',
                    'id' => 'jenis',
                    'name' => 'jenis',
                    'class' => 'select2',
                    'wajib' => '<sup class="text-danger">*</sup>',
                ])
                @slot('options')
                    <option value="Negeri">Negeri</option>
                    <option value="Swasta">Swasta</option>
                @endslot
            @endcomponent
        </div>
        <div class="col-sm-12 col-lg-12">
            @component('dashboard.components.formElements.select',
                [
                    'label' => 'Desa',
                    'id' => 'desa_id',
                    'name' => 'desa_id',
                    'class' => 'select2',
                    'wajib' => '<sup class="text-danger">*</sup>',
                ])
                @slot('options')
                    @foreach ($daftarDesa as $desa)
                        <option value="{{ $desa->id }}">{{ $desa->nama }}</option>
                    @endforeach
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
        var jenjang = "{{ $jenjang }}";
        if (jenjang == 'sd') {
            jenjang = 'SD';
        } else if (jenjang == 'smp') {
            jenjang = 'SMP';
        } else {
            jenjang = 'SMA / SMK';
        }
    </script>
    @if (isset($method) && $method == 'PUT')
    @endif
    <script>
        $('#{{ $form_id }}').submit(function(e) {
            e.preventDefault();
            resetError();
            var formData = new FormData(this);
            formData.append('jenjang', jenjang);
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
            if (role == "Admin") {
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
