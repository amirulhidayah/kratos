<div class="row" id="input-pengukuran-anak">
    <div class="col-sm-12 col-lg-12">
        @component('dashboard.components.formElements.input',
            [
                'label' => 'Tanggal Pengukuran (Tanggal-Bulan-Tanggal, Contoh : 01-11-2022)',
                'type' => 'text',
                'id' => 'tanggal_pengukuran',
                'name' => 'tanggal_pengukuran',
                'class' => 'tanggal pengukuran',
                'wajib' => '<sup class="text-danger">*</sup>',
                'placeholder' => 'Masukkan Tanggal Pengukuran',
            ])
        @endcomponent
    </div>
    <div class="col-sm-6 col-lg-12 hasil-pengukuran">
        <div class="card p-3 mt-3 mb-2">
            <div class="d-flex align-items-center">
                <span class="stamp stamp-md bg-secondary mr-3">
                    <i class="fas fa-child"></i>
                </span>
                <div>
                    <small class="text-muted">Usia Saat Ukur</small>
                    <h5 class="mb-1" id="usia-saat-ukur">-</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-lg-12">
        @component('dashboard.components.formElements.input',
            [
                'label' => 'Lingkar Lengan Atas (LiLA)',
                'type' => 'text',
                'id' => 'lila',
                'name' => 'lila',
                'class' => 'numerik pengukuran',
                'wajib' => '<sup class="text-danger">*</sup>',
                'placeholder' => 'Masukkan Lingkar Lengan Atas (LiLA)',
            ])
        @endcomponent
    </div>
    <div class="col-sm-12 col-lg-12">
        @component('dashboard.components.formElements.input',
            [
                'label' => 'Berat Badan (Kg)',
                'type' => 'text',
                'id' => 'bb',
                'name' => 'bb',
                'class' => 'numerik pengukuran',
                'wajib' => '<sup class="text-danger">*</sup>',
                'placeholder' => 'Masukkan Berat Badan',
            ])
        @endcomponent
    </div>
    <div class="col-sm-12 col-lg-12">
        @component('dashboard.components.formElements.input',
            [
                'label' => 'Tinggi Badan (Cm)',
                'type' => 'text',
                'id' => 'tb',
                'name' => 'tb',
                'class' => 'numerik pengukuran',
                'wajib' => '<sup class="text-danger">*</sup>',
                'placeholder' => 'Masukkan Tinggi Badan',
            ])
        @endcomponent
    </div>
    <div class="col-sm-12 col-lg-6">
        @component('dashboard.components.formElements.select',
            [
                'label' => 'PUSKESMAS',
                'id' => 'puskesmas_id',
                'name' => 'puskesmas_id',
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
                'label' => 'POSYANDU',
                'id' => 'posyandu_id',
                'name' => 'posyandu_id',
                'class' => 'select2',
                'wajib' => '<sup class="text-danger">*</sup>',
            ])
            @slot('options')
            @endslot
        @endcomponent
    </div>
</div>

<hr class="mt-4 hasil-pengukuran">
<div class="row hasil-pengukuran">
    <div class="col-12 my-3">
        <div class="card-title fw-mediumbold">Hasil Pengukuran</div>
    </div>
    <div class="col-sm-6 col-lg-4">
        <div class="card p-3 mt-3 mb-2">
            <div class="d-flex align-items-center">
                <span class="stamp stamp-md bg-secondary mr-3 kategori-bg" id="bg-bbu">
                    <i class="fas fa-weight"></i>
                </span>
                <div>
                    <small class="text-muted">Kategori BB/U</small>
                    <h5 class="mb-1"><b id="kategori_bbu">-</b></h5>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-4">
        <div class="card p-3 mt-3 mb-2">
            <div class="d-flex align-items-center">
                <span class="stamp stamp-md bg-secondary kategori-bg mr-3" id="bg-tbu">
                    <i class="fas fa-ruler-vertical"></i>
                </span>
                <div>
                    <small class="text-muted">Kategori TB/U</small>
                    <h5 class="mb-1"><b id="kategori_tbu">-</b></h5>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-4">
        <div class="card p-3 mt-3 mb-2">
            <div class="d-flex align-items-center">
                <span class="stamp stamp-md bg-secondary kategori-bg mr-3" id="bg-bbtb">
                    <i class="fas fa-balance-scale"></i>
                </span>
                <div>
                    <small class="text-muted">Kategori BB/TB</small>
                    <h5 class="mb-1"><b id="kategori_bbtb">-</b></h5>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            getPuskesmas();
        })
    </script>
    <script>
        $('.hasil-pengukuran').hide();

        var bg = ['bg-primary', 'bg-danger', 'bg-success', 'bg-secondary', 'bg-warning'];

        $('.pengukuran').keyup(function() {
            if ($('#jenis_kelamin').length == 0) {
                var jenisKelamin = "{{ $anak->jenis_kelamin ?? '' }}";
                var tanggalLahir = "{{ $anak->tanggal_lahir ?? '' }}";
            } else {
                var jenisKelamin = $('#jenis_kelamin').val();
                var tanggalLahir = $('#tanggal_lahir').val();
            }

            var tanggalPengukuran = $('#tanggal_pengukuran').val();
            var lila = $('#lila').val();
            var bb = $('#bb').val();
            var tb = $('#tb').val();
            if (jenisKelamin && tanggalLahir && tanggalPengukuran && lila && bb && tb) {
                console.log('ada');
                $.ajax({
                    url: "{{ url('hitung/pengukuran-anak') }}",
                    type: 'GET',
                    data: {
                        'tanggal_lahir': tanggalLahir,
                        'tanggal_pengukuran': tanggalPengukuran,
                        'jenis_kelamin': jenisKelamin,
                        'berat_badan': bb,
                        'tinggi_badan': tb
                    },
                    success: function(response) {
                        resetError();
                        if (response.status == 'success') {
                            $('#usia-saat-ukur').html(response.usiaSebut);
                            $('#kategori_bbu').html(response.bbu);
                            $('#kategori_tbu').html(response.tbu);
                            $('#kategori_bbtb').html(response.bbtb);

                            $.each(bg, function(i, v) {
                                $('.kategori-bg').removeClass(v);
                            });

                            if (response.bbu == 'Sangat Kurang') {
                                $('#bg-bbu').addClass('bg-danger');
                            } else if (response.bbu == "Kurang") {
                                $('#bg-bbu').addClass('bg-warning');
                            } else if (response.bbu == "Berat Badan Normal") {
                                $('#bg-bbu').addClass('bg-success');
                            } else if (response.bbu == "Berat Badan Lebih") {
                                $('#bg-bbu').addClass('bg-danger');
                            }

                            if (response.tbu == "Sangat Pendek") {
                                $('#bg-tbu').addClass('bg-danger');
                            } else if (response.tbu == "Pendek") {
                                $('#bg-tbu').addClass('bg-warning');
                            } else if (response.tbu == "Normal") {
                                $('#bg-tbu').addClass('bg-success');
                            } else if (response.tbu == "Tinggi") {
                                $('#bg-tbu').addClass('bg-primary');
                            }

                            if (response.bbtb == "Gizi Buruk") {
                                $('#bg-bbtb').addClass('bg-danger');
                            } else if (response.bbtb == "Gizi Kurang") {
                                $('#bg-bbtb').addClass('bg-warning');
                            } else if (response.bbtb == "Gizi Baik") {
                                $('#bg-bbtb').addClass('bg-success');
                            } else if (response.bbtb == "Beresiko Gizi Lebih") {
                                $('#bg-bbtb').addClass('bg-primary');
                            } else if (response.bbtb == "Gizi Lebih") {
                                $('#bg-bbtb').addClass('bg-warning');
                            } else if (response.bbtb == "Obesitas") {
                                $('#bg-bbtb').addClass('bg-danger');
                            }


                            $('.hasil-pengukuran').show();
                        } else {
                            if (response.message) {
                                $('.tanggal_pengukuran-error').text(response.message);
                            }
                            $('.hasil-pengukuran').hide();
                        }
                    }
                })
            } else {
                $('.hasil-pengukuran').hide();
            }
        })
    </script>
    <script>
        var idPuskesmas = "{{ $data->puskesmas_id ?? '' }}";
        var idPosyandu = "{{ $data->posyandu_id ?? '' }}";

        let getPuskesmas = () => {
            $('#puskesmas_id').html('');
            $('#posyandu_id').html('');
            $('#puskesmas_id').append('<option value="">--Pilih Salah Satu--</option>');
            $.ajax({
                url: "{{ url('list/puskesmas') }}",
                type: 'GET',
                data: {
                    'id': idPuskesmas
                },
                success: function(response) {
                    response.data.map((data) => {
                        $('#puskesmas_id').append('<option value="' + data.id + '">' +
                            data
                            .nama + '</option>');
                    });
                    if (idPuskesmas) {
                        $('#puskesmas_id').val(idPuskesmas).trigger('change');
                    }
                }
            })
        }

        let getPosyandu = () => {
            $('#posyandu_id').html('');
            $('#posyandu_id').append('<option value="">--Pilih Salah Satu--</option>');
            $.ajax({
                url: "{{ url('list/posyandu') }}",
                type: 'GET',
                data: {
                    'puskesmas': $('#puskesmas_id').val(),
                    'id': idPosyandu
                },
                success: function(response) {
                    response.data.map((data) => {
                        $('#posyandu_id').append('<option value="' + data.id + '">' +
                            data
                            .nama + '</option>');
                    });
                    if (idPosyandu) {
                        $('#posyandu_id').val(idPosyandu).trigger('change');
                    }
                }
            })
        }

        $('#puskesmas_id').change(function() {
            getPosyandu();
        })
    </script>
@endpush
