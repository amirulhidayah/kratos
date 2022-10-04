<form id="{{ $form_id }}" action="#" method="POST" enctype="multipart/form-data">
    @csrf
    @if (isset($method) && $method == 'PUT')
        @method('PUT')
    @endif
    <div class="row">
        <div class="col-sm-12 col-lg-6">
            @component('dashboard.components.formElements.input',
                [
                    'label' => 'Nama Ibu',
                    'type' => 'text',
                    'id' => 'nama_ibu',
                    'name' => 'nama_ibu',
                    'wajib' => '<sup class="text-danger">*</sup>',
                    'placeholder' => 'Masukkan Nama Ibu',
                ])
            @endcomponent
        </div>
        <div class="col-sm-12 col-lg-6">
            @component('dashboard.components.formElements.input',
                [
                    'label' => 'NIK Ibu',
                    'type' => 'text',
                    'id' => 'nik_ibu',
                    'name' => 'nik_ibu',
                    'class' => 'angka',
                    'wajib' => '<sup class="text-danger">*</sup>',
                    'placeholder' => 'Masukkan NIK Ibu',
                ])
            @endcomponent
        </div>
        <div class="col-sm-12 col-lg-6">
            @component('dashboard.components.formElements.input',
                [
                    'label' => 'Nama Ayah',
                    'type' => 'text',
                    'id' => 'nama_ayah',
                    'name' => 'nama_ayah',
                    'wajib' => '<sup class="text-danger">*</sup>',
                    'placeholder' => 'Masukkan Nama Ayah',
                ])
            @endcomponent
        </div>
        <div class="col-sm-12 col-lg-6">
            @component('dashboard.components.formElements.input',
                [
                    'label' => 'NIK Ayah',
                    'type' => 'text',
                    'id' => 'nik_ayah',
                    'name' => 'nik_ayah',
                    'class' => 'angka',
                    'wajib' => '<sup class="text-danger">*</sup>',
                    'placeholder' => 'Masukkan NIK Ayah',
                ])
            @endcomponent
        </div>
        <div class="col-sm-12 col-lg-6">
            @component('dashboard.components.formElements.input',
                [
                    'label' => 'RT',
                    'type' => 'text',
                    'id' => 'rt',
                    'name' => 'rt',
                    'class' => 'angka',
                    'wajib' => '<sup class="text-danger">*</sup>',
                    'placeholder' => 'Masukkan RT',
                ])
            @endcomponent
        </div>
        <div class="col-sm-12 col-lg-6">
            @component('dashboard.components.formElements.input',
                [
                    'label' => 'RW',
                    'type' => 'text',
                    'id' => 'rw',
                    'name' => 'rw',
                    'class' => 'angka',
                    'wajib' => '<sup class="text-danger">*</sup>',
                    'placeholder' => 'Masukkan RW',
                ])
            @endcomponent
        </div>
        <div class="col-sm-12 col-lg-12">
            @component('dashboard.components.formElements.input',
                [
                    'label' => 'Alamat',
                    'type' => 'text',
                    'id' => 'alamat',
                    'name' => 'alamat',
                    'wajib' => '<sup class="text-danger">*</sup>',
                    'placeholder' => 'Masukkan Alamat',
                ])
            @endcomponent
        </div>
        <div class="col-sm-12 col-lg-6">
            @component('dashboard.components.formElements.select',
                [
                    'label' => 'Kecamatan',
                    'id' => 'kecamatan_id',
                    'name' => 'kecamatan_id',
                    'class' => 'select2',
                    'wajib' => '<sup class="text-danger">*</sup>',
                ])
                @slot('options')
                @endslot
            @endcomponent
        </div>
        <div class="col-sm-12 col-lg-6">
            @component('dashboard.components.formElements.select',
                [
                    'label' => 'Desa',
                    'id' => 'desa_id',
                    'name' => 'desa_id',
                    'class' => 'select2',
                    'wajib' => '<sup class="text-danger">*</sup>',
                ])
                @slot('options')
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
            $("#nik_ibu").prop("maxLength", 16);
            $("#nik_ayah").prop("maxLength", 16);
            $("#rt").prop("maxLength", 2);
            $("#rw").prop("maxLength", 2);
            getKecamatan();
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

        var idKecamatan = "{{ $data->desa->kecamatan_id ?? '' }}";
        var idDesa = "{{ $data->desa_id ?? '' }}";

        let getKecamatan = () => {
            $('#kecamatan_id').html('');
            $('#desa_id').html('');
            $('#kecamatan_id').append('<option value="">--Pilih Salah Satu--</option>');
            $.ajax({
                url: "{{ url('list/kecamatan') }}",
                type: 'GET',
                data: {
                    'id': idKecamatan
                },
                success: function(response) {
                    response.data.map((data) => {
                        $('#kecamatan_id').append('<option value="' + data.id + '">' +
                            data
                            .nama + '</option>');
                    });
                    if (idKecamatan) {
                        $('#kecamatan_id').val(idKecamatan).trigger('change');
                    }
                }
            })
        }

        let getDesa = () => {
            $('#desa_id').html('');
            $('#desa_id').append('<option value="">--Pilih Salah Satu--</option>');
            $.ajax({
                url: "{{ url('list/desa') }}",
                type: 'GET',
                data: {
                    'kecamatan': $('#kecamatan_id').val(),
                    'id': idDesa
                },
                success: function(response) {
                    response.data.map((data) => {
                        $('#desa_id').append('<option value="' + data.id + '">' +
                            data
                            .nama + '</option>');
                    });
                    if (idDesa) {
                        $('#desa_id').val(idDesa).trigger('change');
                    }
                }
            })
        }

        $('#kecamatan_id').change(function() {
            getDesa();
        })
    </script>
@endpush
