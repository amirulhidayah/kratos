<form id="{{ $form_id }}" action="#" method="POST" enctype="multipart/form-data">
    @csrf
    @if (isset($method) && $method == 'PUT')
        @method('PUT')
    @endif
    <div class="row">
        @if (!isset($orangTua))
            <div class="col-sm-12 col-lg-12">
                @component('dashboard.components.formElements.select',
                    [
                        'label' => 'Orang Tua',
                        'id' => 'orang_tua_id',
                        'name' => 'orang_tua_id',
                        'class' => 'select2',
                        'wajib' => '<sup class="text-danger">*</sup>',
                    ])
                    @slot('options')
                    @endslot
                @endcomponent
            </div>
        @endif
        <div class="col-sm-12 col-lg-6">
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
        <div class="col-sm-12 col-lg-6">
            @component('dashboard.components.formElements.input',
                [
                    'label' => 'NIK',
                    'type' => 'text',
                    'id' => 'nik',
                    'name' => 'nik',
                    'class' => 'angka',
                    'wajib' => '<sup class="text-danger">*</sup>',
                    'placeholder' => 'Masukkan NIK',
                ])
            @endcomponent
        </div>
        <div class="col-sm-12 col-lg-6" id="form-opd">
            @component('dashboard.components.formElements.select',
                [
                    'label' => 'Jenis Kelamin',
                    'id' => 'jenis_kelamin',
                    'name' => 'jenis_kelamin',
                    'class' => 'select2 pengukuran',
                    'wajib' => '<sup class="text-danger">*</sup>',
                ])
                @slot('options')
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                @endslot
            @endcomponent
        </div>
        <div class="col-sm-12 col-lg-6">
            @component('dashboard.components.formElements.input',
                [
                    'label' => 'Tanggal Lahir (Tanggal-Bulan-Tanggal, Contoh : 01-11-1988)',
                    'type' => 'text',
                    'id' => 'tanggal_lahir',
                    'name' => 'tanggal_lahir',
                    'class' => 'tanggal pengukuran',
                    'wajib' => '<sup class="text-danger">*</sup>',
                    'placeholder' => 'Masukkan Tanggal Lahir',
                ])
            @endcomponent
        </div>
        <div class="col-sm-12 col-lg-6">
            @component('dashboard.components.formElements.input',
                [
                    'label' => 'Berat Badan (BB) Lahir',
                    'type' => 'text',
                    'id' => 'bb_lahir',
                    'name' => 'bb_lahir',
                    'class' => 'numerik',
                    // 'wajib' => '<sup class="text-danger">*</sup>',
                    'placeholder' => 'Masukkan Berat Badan Lahir',
                ])
            @endcomponent
        </div>
        <div class="col-sm-12 col-lg-6">
            @component('dashboard.components.formElements.input',
                [
                    'label' => 'Tinggi Badan (TB) Lahir',
                    'type' => 'text',
                    'id' => 'tb_lahir',
                    'name' => 'tb_lahir',
                    'class' => 'numerik',
                    // 'wajib' => '<sup class="text-danger">*</sup>',
                    'placeholder' => 'Masukkan Tinggi Badan Lahir',
                ])
            @endcomponent
        </div>
        @if (isset($method) && $method == 'POST')
            <div class="col-sm-12 col-lg-12" id="form-opd">
                @component('dashboard.components.formElements.select',
                    [
                        'label' => 'Apakah anda ingin menambahkan data pengukuran anak ?',
                        'id' => 'data_pengukuran',
                        'name' => 'data_pengukuran',
                        'class' => 'select2',
                        'wajib' => '<sup class="text-danger">*</sup>',
                    ])
                    @slot('options')
                        <option value="Ya">Ya</option>
                        <option value="Tidak">Tidak</option>
                    @endslot
                @endcomponent
            </div>
        @endif

    </div>
    @if (isset($method) && $method == 'POST')
        @component('dashboard.components.forms.inputPengukuranAnak',
            [
                'anak' => '',
                'data' => '',
            ])
        @endcomponent
    @endif
    <div class="row">
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
            $("#nik").prop("maxLength", 16);
            $('#input-pengukuran-anak').hide();
            getOrangTua();
        });

        $('#data_pengukuran').change(function() {
            if ($(this).val() == 'Ya') {
                $('#input-pengukuran-anak').show();
            } else {
                $('#input-pengukuran-anak').hide();
            }
        })
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
                            } else if (response.status ==
                                'success_pengukuran_lewat_tanggal_lahir') {
                                swal("Berhasil",
                                    "Terdapat Data Pengukuran yang Tanggal Pengukurannya Kurang Dari Tanggal Lahir", {
                                        icon: "warning",
                                        buttons: false,
                                        timer: 3000,
                                    }).then(function() {
                                    window.location.href =
                                        "{{ url('pengukuran-anak') }}" + '/' + response
                                        .id;
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

        var idOrangTua = "{{ $data->orang_tua_id ?? '' }}";

        let getOrangTua = () => {
            $('#orang_tua_id').html('');
            $('#orang_tua_id').append('<option value="">--Pilih Salah Satu--</option>');
            $.ajax({
                url: "{{ url('list/orang-tua') }}",
                type: 'GET',
                data: {
                    'id': idOrangTua
                },
                success: function(response) {
                    console.log(response);
                    response.data.map((data) => {
                        if (data.nama_ibu && data.nama_ayah) {
                            $('#orang_tua_id').append('<option value="' + data.id + '">Ibu : ' +
                                data
                                .nama_ibu + " (" + data.nik_ibu + ") | Ayah : " + data
                                .nama_ayah + " (" + data.nik_ayah + ") | Kecamatan : " + data
                                .desa
                                .kecamatan.nama + ', Desa : ' + data.desa.nama + '</option>');
                        } else if (data.nama_ibu && !data.nama_ayah) {
                            $('#orang_tua_id').append('<option value="' + data.id + '">Ibu : ' +
                                data
                                .nama_ibu + " (" + data.nik_ibu + ") | Kecamatan : " + data
                                .desa
                                .kecamatan.nama + ', Desa : ' + data.desa.nama + '</option>');
                        } else if (!data.nama_ibu && data.nama_ayah) {
                            $('#orang_tua_id').append('<option value="' + data.id + ">Ayah : " +
                                data
                                .nama_ayah + " (" + data.nik_ayah + ")  | Kecamatan : " + data
                                .desa
                                .kecamatan.nama + ', Desa : ' + data.desa.nama + '</option>');
                        }

                    });
                    if (idOrangTua) {
                        $('#orang_tua_id').val(idOrangTua).trigger('change');
                    }
                }
            })
        }
    </script>
@endpush
