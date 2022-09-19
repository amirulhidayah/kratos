<form id="{{ $form_id }}" action="#" method="POST" enctype="multipart/form-data">
    @csrf
    @if (isset($method) && $method == 'PUT')
        @method('PUT')
    @endif
    <div class="row">
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
                    'class' => 'select2',
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
                    'label' => 'Tempat Lahir',
                    'type' => 'text',
                    'id' => 'tempat_lahir',
                    'name' => 'tempat_lahir',
                    'wajib' => '<sup class="text-danger">*</sup>',
                    'placeholder' => 'Masukkan Tempat Lahir',
                ])
            @endcomponent
        </div>
        <div class="col-sm-12 col-lg-6">
            @component('dashboard.components.formElements.input',
                [
                    'label' => 'Tanggal Lahir (Tanggal-Bulan-Tanggal, Contoh : 01-11-1988)',
                    'type' => 'text',
                    'id' => 'tanggal_lahir',
                    'name' => 'tanggal_lahir',
                    'class' => 'tanggal',
                    'wajib' => '<sup class="text-danger">*</sup>',
                    'placeholder' => 'Masukkan Tanggal Lahir',
                ])
            @endcomponent
        </div>
        <div class="col-sm-12 col-lg-6">
            @component('dashboard.components.formElements.select',
                [
                    'label' => 'Agama',
                    'id' => 'agama',
                    'name' => 'agama',
                    'class' => 'select2',
                    'wajib' => '<sup class="text-danger">*</sup>',
                ])
                @slot('options')
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Budha">Budha</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Konghucu">Konghucu</option>
                @endslot
            @endcomponent
        </div>
        <div class="col-sm-12 col-lg-6">
            @component('dashboard.components.formElements.select',
                [
                    'label' => 'Pendidikan Terakhir',
                    'id' => 'status_pendidikan',
                    'name' => 'status_pendidikan',
                    'class' => 'select2',
                    'wajib' => '<sup class="text-danger">*</sup>',
                ])
                @slot('options')
                    <option value="Tidak Sekolah">Tidak Sekolah</option>
                    <option value="SD">SD</option>
                    <option value="SMP">SMP</option>
                    <option value="SMA">SMA</option>
                    <option value="Diploma 1">Diploma 1</option>
                    <option value="Diploma 2">Diploma 2</option>
                    <option value="Diploma 3">Diploma 3</option>
                    <option value="S1 / Diploma 4">S1 / Diploma 4</option>
                    <option value="S2">S2</option>
                    <option value="S3">S3</option>
                @endslot
            @endcomponent
        </div>
        <div class="col-sm-12 col-lg-6">
            @component('dashboard.components.formElements.select',
                [
                    'label' => 'Golongan Darah',
                    'id' => 'golongan_darah',
                    'name' => 'golongan_darah',
                    'class' => 'select2',
                    'wajib' => '<sup class="text-danger">*</sup>',
                ])
                @slot('options')
                    <option value="Tidak Tahu">Tidak Tahu</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="AB">AB</option>
                    <option value="O">O</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                @endslot
            @endcomponent
        </div>
        <div class="col-sm-12 col-lg-6">
            @component('dashboard.components.formElements.select',
                [
                    'label' => 'Status Perkawinan',
                    'id' => 'status_perkawinan',
                    'name' => 'status_perkawinan',
                    'class' => 'select2',
                    'wajib' => '<sup class="text-danger">*</sup>',
                ])
                @slot('options')
                    <option value="Belum Kawin">Belum Kawin</option>
                    <option value="Kawin Belum Tercatat">Kawin Belum Tercatat</option>
                    <option value="Kawin Tercatat">Kawin Tercatat</option>
                    <option value="Cerai Hidup">Cerai Hidup</option>
                    <option value="Cerai Mati">Cerai Mati</option>
                @endslot
            @endcomponent
        </div>
        <div class="col-sm-12 col-lg-6">
            @component('dashboard.components.formElements.input',
                [
                    'label' => 'Tanggal Perkawinan (Tanggal-Bulan-Tanggal, Contoh : 01-11-2022)',
                    'type' => 'text',
                    'id' => 'tanggal_perkawinan',
                    'name' => 'tanggal_perkawinan',
                    'class' => 'tanggal',
                    'wajib' => '<sup class="text-danger">*</sup>',
                    'placeholder' => 'Masukkan Tanggal Perkawinan',
                ])
            @endcomponent
        </div>
        <div class="col-sm-12 col-lg-6">
            @component('dashboard.components.formElements.select',
                [
                    'label' => 'Pekerjaan',
                    'id' => 'pekerjaan',
                    'name' => 'pekerjaan',
                    'class' => 'select2',
                    'wajib' => '<sup class="text-danger">*</sup>',
                ])
                @slot('options')
                    <option value="Tidak Bekerja">Tidak Bekerja</option>
                    <option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
                    <option value="Karyawan Swasta">Karyawan Swasta</option>
                    <option value="PNS / TNI-POLRI">PNS / TNI-POLRI</option>
                    <option value="Wiraswasta / Wirausaha">Wiraswasta / Wirausaha</option>
                    <option value="Petani / Pekebun">Petani / Pekebun</option>
                    <option value="Pekerjaan Tidak Tetap">Pekerjaan Tidak Tetap</option>
                    <option value="Pelajar / Mahasiswa">Pelajar / Mahasiswa</option>
                @endslot
            @endcomponent
        </div>
        <div class="col-sm-12 col-lg-6">
            <div class="form-group">
                <label class="form-label">Kewarganegaraan</label>
                <br>
                <div class="selectgroup selectgroup-pills">
                    <label class="selectgroup-item">
                        <input type="radio" name="kewarganegaraan" value="WNI" class="selectgroup-input">
                        <span class="selectgroup-button">WNI</span>
                    </label>
                    <label class="selectgroup-item">
                        <input type="radio" name="kewarganegaraan" value="WNA" class="selectgroup-input">
                        <span class="selectgroup-button">WNA</span>
                    </label>
                </div>
                <br>
                <span class="text-danger error-text kewarganegaraan-error"></span>
            </div>
        </div>
        <div class="col-sm-12 col-lg-6">
            @component('dashboard.components.formElements.input',
                [
                    'label' => 'Nomor Paspor',
                    'type' => 'text',
                    'id' => 'no_paspor',
                    'name' => 'no_paspor',
                    'wajib' => '<sup class="text-danger">*</sup>',
                    'placeholder' => 'Masukkan Nomor Paspor',
                    'value' => '-',
                ])
            @endcomponent
        </div>
        <div class="col-sm-12 col-lg-6">
            @component('dashboard.components.formElements.input',
                [
                    'label' => 'Nomor Kitap',
                    'type' => 'text',
                    'id' => 'no_kitap',
                    'name' => 'no_kitap',
                    'wajib' => '<sup class="text-danger">*</sup>',
                    'placeholder' => 'Masukkan Nomor Kitap',
                    'value' => '-',
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
        $(document).ready(function() {
            $('#tanggal_perkawinan').prop('disabled', true);
            $("#nik").prop("maxLength", 16);
        });

        $('#status_perkawinan').change(function() {
            var status_perkawinan = $(this).val();
            if (status_perkawinan == 'Belum Kawin') {
                $('#tanggal_perkawinan').val('');
                $('#tanggal_perkawinan').prop('disabled', true);
            } else {
                $('#tanggal_perkawinan').prop('disabled', false);
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
