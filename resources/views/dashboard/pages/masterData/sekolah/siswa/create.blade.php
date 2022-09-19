@extends('dashboard.layouts.main')

@section('title')
    Tambah Siswa {{ $sekolah->nama }}
@endsection

@section('titlePanelHeader')
    Tambah Siswa {{ $sekolah->nama }}
@endsection

@section('subTitlePanelHeader')
    {{-- Lorem ipsum dolor sit amet consectetur adipisicing elit. --}}
@endsection

@section('buttonPanelHeader')
    {{-- <a href="#" class="btn btn-secondary btn-round"><i class="fas fa-plus"></i>
        Tambah</a> --}}
@endsection

@push('styles')
@endpush

@section('contents')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Tambah Siswa {{ $sekolah->nama }}
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form class="row g-3" id="form-tambah">
                        @method('POST')
                        @csrf
                        <div class="col-12">
                            <label class="form-label my-2 fw-bold"> Tambahkan Siswa {{ $sekolah->nama }}</label>
                            <div class="select2-input select2-primary">
                                <select id="pemilik-lokasi" name="penduduk_id[]" class="form-control multiple"
                                    multiple="multiple" data-label="Titik Lokasi">
                                    @foreach ($daftarDesa as $desa)
                                        <optgroup label="Desa {{ $desa->nama }}">
                                            @foreach ($desa->penduduk->whereNotIn('id', $idSiswa) as $penduduk)
                                                <option value="{{ $penduduk->id }}">
                                                    {{ $penduduk->nama . ' (' . $penduduk->nik . ') - ' . $penduduk->desa->nama }}
                                                </option>
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>
                            </div>
                            <span class="text-danger error-text penduduk_id-error"></span>
                        </div>
                        <div class="col-12 d-flex justify-content-end mt-3">
                            @component('dashboard.components.buttons.submit',
                                [
                                    'label' => 'Simpan',
                                ])
                            @endcomponent
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $('#form-tambah').submit(function(e) {
            e.preventDefault();
            resetError();
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
                        url: "{{ url('master-data/siswa' . '/' . $sekolah->id) }}",
                        type: 'POST',
                        data: $(this).serialize(),
                        success: function(response) {
                            if (response.status == 'success') {
                                swal("Berhasil", "Data Berhasil Disimpan", {
                                    icon: "success",
                                    buttons: false,
                                    timer: 1000,
                                }).then(function() {
                                    window.location.href =
                                        "{{ url('master-data/siswa' . '/' . $sekolah->id) }}";
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
                        }
                    })
                }
            });

        })
    </script>

    <script>
        $('.multiple').select2({
            placeholder: "- Bisa Pilih Lebih Dari Satu -",
            theme: "bootstrap",
        })

        function resetError() {
            $(".error-text").each(function() {
                $(this).html('');
            })
        }

        function printErrorMsg(msg) {
            $.each(msg, function(keyError, valueError) {
                var totalError = valueError.length;
                var indexError = 0;
                $.each(valueError, function(key, value) {
                    if (keyError.split(".").length > 1) {
                        $('.' + keyError.split(".")[0] + '-error')[keyError.split(".")[1]].innerHTML = $(
                            '.' +
                            keyError.split(".")[0] + '-error')[keyError.split(".")[1]].innerHTML + value;
                        if ((indexError + 1) != totalError) {
                            $('.' + keyError.split(".")[0] + '-error')[keyError.split(".")[1]].innerHTML =
                                $(
                                    '.' +
                                    keyError.split(".")[0] + '-error')[keyError.split(".")[1]].innerHTML +
                                ", ";
                        }
                    } else {
                        $('.' + keyError + '-error').text(value);
                    }
                    indexError++;
                });
            });
        }
    </script>

    <script>
        $('#nav-master-sekolah').addClass('active');
    </script>
@endpush
