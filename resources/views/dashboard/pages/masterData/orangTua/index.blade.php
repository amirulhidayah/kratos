@extends('dashboard.layouts.main')

@section('title')
    Orang Tua
@endsection

@section('titlePanelHeader')
    Orang Tua
@endsection

@section('subTitlePanelHeader')
    {{-- Lorem ipsum dolor sit amet consectetur adipisicing elit. --}}
@endsection

@section('buttonPanelHeader')
    @if (Auth::user()->role == 'Admin')
        @component('dashboard.components.buttons.add',
            [
                'url' => url('master-data/orang-tua/create'),
            ])
        @endcomponent
    @endif
@endsection

@push('styles')
    <style>
        #peta {
            height: 600px;
            margin-top: 0px;
        }
    </style>
@endpush

@section('contents')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Data Orang Tua</div>
                        <div class="card-tools">
                            <div class="row">
                                <button type="submit" class="btn btn-info btn-border btn-round btn-sm mr-2 btn-export"
                                    id="export-penduduk" value="" name="desa_id">
                                    <i class="fas fa-lg fa-download"></i>
                                    Export Orang Tua
                                </button>

                                <button type="submit" class="btn btn-info btn-border btn-round btn-sm mr-2 btn-export"
                                    id="export-jumlah-penduduk">
                                    <i class="fas fa-lg fa-download"></i>
                                    Export Demografi
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <ul class="nav nav-pills nav-secondary nav-pills-no-bd mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-profile-tab-nobd" data-toggle="pill"
                                        href="#pills-tabel" role="tab" aria-controls="pills-tabel"
                                        aria-selected="false">Tabel</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-jumlah-tab-nobd" data-toggle="pill" href="#pills-jumlah"
                                        role="tab" aria-controls="pills-jumlah" aria-selected="false">Demografi
                                        Daerah</a>
                                </li>
                            </ul>
                            <form action="{{ url('master-data/orang-tua/export') }}" method="POST" id="form-export">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12 col-lg-6">
                                        @component('dashboard.components.formElements.select',
                                            [
                                                'label' => 'Kecamatan',
                                                'id' => 'kecamatan_id',
                                                'name' => 'kecamatan_id',
                                                'class' => 'select2 filter',
                                                'wajib' => '<sup class="text-danger">*</sup>',
                                            ])
                                            @slot('options')
                                                <option value="semua">Semua</option>
                                                @foreach ($daftarKecamatan as $kecamatan)
                                                    <option value="{{ $kecamatan->id }}">{{ $kecamatan->nama }}</option>
                                                @endforeach
                                            @endslot
                                        @endcomponent
                                    </div>
                                    <div class="col-sm-12 col-lg-6">
                                        @component('dashboard.components.formElements.select',
                                            [
                                                'label' => 'Desa',
                                                'id' => 'desa_id',
                                                'name' => 'desa_id',
                                                'class' => 'select2 filter',
                                                'wajib' => '<sup class="text-danger">*</sup>',
                                                'attribute' => 'disabled',
                                            ])
                                            @slot('options')
                                                <option value="semua">Semua</option>
                                                {{-- @foreach ($daftarDesa as $desa)
                                                        <option value="{{ $desa->id }}">{{ $desa->nama }}</option>
                                                    @endforeach --}}
                                            @endslot
                                        @endcomponent
                                    </div>
                                </div>
                            </form>
                            <div class="tab-content mb-3" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-tabel" role="tabpanel"
                                    aria-labelledby="pills-profile-tab-nobd">
                                    <div class="row mt-3">
                                        <div class="col">
                                            <div class="card fieldset">
                                                @component('dashboard.components.dataTables.index',
                                                    [
                                                        'id' => 'table-data',
                                                        'th' => [
                                                            'No',
                                                            'Nama Ibu',
                                                            'NIK Ibu',
                                                            'Nama Ayah',
                                                            'NIK Ayah',
                                                            'Kecamatan',
                                                            'Desa',
                                                            'RT',
                                                            'RW',
                                                            'Alamat',
                                                            'Aksi',
                                                        ],
                                                    ])
                                                @endcomponent
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="tab-pane fade" id="pills-jumlah" role="tabpanel"
                                    aria-labelledby="pills-jumlah-tab-nobd">
                                    <div class="my-4">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="card card-stats card-round border">
                                                <div class="card-body ">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="row">
                                                                <div class="col-2">
                                                                    <div class="icon-big text-center">
                                                                        <i class="flaticon-placeholder-1 text-primary"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="col-10 col-stats">
                                                                    <div class="numbers">
                                                                        <p class="card-category" id="wilayah">-</p>
                                                                        <h4 class="card-title" id="nama-wilayah">
                                                                            -
                                                                        </h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="d-flex justify-content-center mt-2">
                                                                <p class="fw-bold mb-0">Total Orang Tua :
                                                                    <span id="total-penduduk"></span>
                                                                </p>
                                                            </div>
                                                            <hr>
                                                            <div class="d-flex justify-content-center mt-2">
                                                                <p class="fw-bold mb-0">Berdasarkan Jenis Kelamin
                                                                </p>
                                                            </div>
                                                            <div class="d-flex justify-content-between mt-2">
                                                                <p class=" mb-0">Laki - Laki : </p>
                                                                <p class="badge bg-primary text-light border-0 mb-0"
                                                                    id="penduduk-laki-laki">

                                                                </p>
                                                            </div>
                                                            <div class="d-flex justify-content-between mt-2">
                                                                <p class=" mb-0">Perempuan : </p>
                                                                <p class="badge bg-primary text-light border-0 mb-0"
                                                                    id="penduduk-perempuan">

                                                                </p>
                                                            </div>
                                                            <hr>
                                                            <div class="d-flex justify-content-center mt-2">
                                                                <p class="fw-bold mb-0">Berdasarkan Pendidikan
                                                                    Terakhir</p>
                                                            </div>
                                                            <div class="d-flex justify-content-between mt-2">
                                                                <p class=" mb-0">Tidak Sekolah : </p>
                                                                <p class="badge bg-primary text-light border-0 mb-0"
                                                                    id="tidak-sekolah">

                                                                </p>
                                                            </div>
                                                            <div class="d-flex justify-content-between mt-2">
                                                                <p class=" mb-0">SD : </p>
                                                                <p class="badge bg-primary text-light border-0 mb-0"
                                                                    id="sd">

                                                                </p>
                                                            </div>
                                                            <div class="d-flex justify-content-between mt-2">
                                                                <p class=" mb-0">SMP : </p>
                                                                <p class="badge bg-primary text-light border-0 mb-0"
                                                                    id="smp">

                                                                </p>
                                                            </div>
                                                            <div class="d-flex justify-content-between mt-2">
                                                                <p class=" mb-0">SMA : </p>
                                                                <p class="badge bg-primary text-light border-0 mb-0"
                                                                    id="sma">

                                                                </p>
                                                            </div>
                                                            <div class="d-flex justify-content-between mt-2">
                                                                <p class=" mb-0">Diploma 1 : </p>
                                                                <p class="badge bg-primary text-light border-0 mb-0"
                                                                    id="diploma-1">

                                                                </p>
                                                            </div>
                                                            <div class="d-flex justify-content-between mt-2">
                                                                <p class=" mb-0">Diploma 2 : </p>
                                                                <p class="badge bg-primary text-light border-0 mb-0"
                                                                    id="diploma-2">

                                                                </p>
                                                            </div>
                                                            <div class="d-flex justify-content-between mt-2">
                                                                <p class=" mb-0">Diploma 3 : </p>
                                                                <p class="badge bg-primary text-light border-0 mb-0"
                                                                    id="diploma-3">

                                                                </p>
                                                            </div>
                                                            <div class="d-flex justify-content-between mt-2">
                                                                <p class=" mb-0">Diploma 4 / S1 : </p>
                                                                <p class="badge bg-primary text-light border-0 mb-0"
                                                                    id="s1">

                                                                </p>
                                                            </div>
                                                            <div class="d-flex justify-content-between mt-2">
                                                                <p class=" mb-0">S2 : </p>
                                                                <p class="badge bg-primary text-light border-0 mb-0"
                                                                    id="s2">

                                                                </p>
                                                            </div>
                                                            <div class="d-flex justify-content-between mt-2">
                                                                <p class=" mb-0">S3 : </p>
                                                                <p class="badge bg-primary text-light border-0 mb-0"
                                                                    id="s3">

                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="d-flex justify-content-center mt-2">
                                                                <p class="fw-bold mb-0">Berdasarkan Umur</p>
                                                            </div>
                                                            <div class="d-flex justify-content-between mt-2">
                                                                <p class=" mb-0">Bayi Dua Tahun (0 - 24 Bulan) :
                                                                </p>
                                                                <p class="badge bg-primary text-light border-0 mb-0"
                                                                    id="baduta">

                                                                </p>
                                                            </div>
                                                            <div class="d-flex justify-content-between mt-2">
                                                                <p class=" mb-0">Bayi Lima Tahun (24 - 60 Bulan) :
                                                                </p>
                                                                <p class="badge bg-primary text-light border-0 mb-0"
                                                                    id="balita">

                                                                </p>
                                                            </div>
                                                            <div class="d-flex justify-content-between mt-2">
                                                                <p class=" mb-0">Anak (5 - 12 Tahun) :
                                                                </p>
                                                                <p class="badge bg-primary text-light border-0 mb-0"
                                                                    id="anak">

                                                                </p>
                                                            </div>
                                                            <div class="d-flex justify-content-between mt-2">
                                                                <p class=" mb-0">Remaja (12 - 18 Tahun) :
                                                                </p>
                                                                <p class="badge bg-primary text-light border-0 mb-0"
                                                                    id="remaja">

                                                                </p>
                                                            </div>
                                                            <div class="d-flex justify-content-between mt-2">
                                                                <p class=" mb-0">Dewasa (> 18 Tahun) :
                                                                </p>
                                                                <p class="badge bg-primary text-light border-0 mb-0"
                                                                    id="dewasa">

                                                                </p>
                                                            </div>
                                                            <div class="d-flex justify-content-between mt-2">
                                                                <p class=" mb-0">Lansia (> 60 Tahun) :
                                                                </p>
                                                                <p class="badge bg-primary text-light border-0 mb-0"
                                                                    id="lansia">

                                                                </p>
                                                            </div>
                                                            <hr>
                                                            <div class="d-flex justify-content-center mt-2">
                                                                <p class="fw-bold mb-0">Berdasarkan Pekerjaan</p>
                                                            </div>
                                                            <div class="d-flex justify-content-between mt-2">
                                                                <p class=" mb-0">Tidak Bekerja : </p>
                                                                <p class="badge bg-primary text-light border-0 mb-0"
                                                                    id="tidak-bekerja">

                                                                </p>
                                                            </div>
                                                            <div class="d-flex justify-content-between mt-2">
                                                                <p class=" mb-0">Ibu Rumah Tangga : </p>
                                                                <p class="badge bg-primary text-light border-0 mb-0"
                                                                    id="irt">

                                                                </p>
                                                            </div>
                                                            <div class="d-flex justify-content-between mt-2">
                                                                <p class=" mb-0">Karyawan Swasta : </p>
                                                                <p class="badge bg-primary text-light border-0 mb-0"
                                                                    id="karyawan-swasta">

                                                                </p>
                                                            </div>
                                                            <div class="d-flex justify-content-between mt-2">
                                                                <p class=" mb-0">PNS / TNI-POLRI : </p>
                                                                <p class="badge bg-primary text-light border-0 mb-0"
                                                                    id="pns">

                                                                </p>
                                                            </div>
                                                            <div class="d-flex justify-content-between mt-2">
                                                                <p class=" mb-0">Wiraswasta / Wirausaha : </p>
                                                                <p class="badge bg-primary text-light border-0 mb-0"
                                                                    id="wiraswasta">

                                                                </p>
                                                            </div>
                                                            <div class="d-flex justify-content-between mt-2">
                                                                <p class=" mb-0">Petani / Pekebun : </p>
                                                                <p class="badge bg-primary text-light border-0 mb-0"
                                                                    id="petani">

                                                                </p>
                                                            </div>
                                                            <div class="d-flex justify-content-between mt-2">
                                                                <p class=" mb-0">Pekerjaan Tidak Tetap : </p>
                                                                <p class="badge bg-primary text-light border-0 mb-0"
                                                                    id="pekerjaan-tidak-tetap">

                                                                </p>
                                                            </div>
                                                            <div class="d-flex justify-content-between mt-2">
                                                                <p class=" mb-0">Pelajar / Mahasiswa : </p>
                                                                <p class="badge bg-primary text-light border-0 mb-0"
                                                                    id="pelajar">

                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="modal" tabindex="-1" id="modal-lihat">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Orang Tua</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="d-flex justify-content-between mt-2">
                        <p class=" mb-0">Nama : </p>
                        <p id="nama">
                            -
                        </p>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <p class=" mb-0">NIK : </p>
                        <p id="nik">
                            -
                        </p>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <p class=" mb-0">Jenis Kelamin : </p>
                        <p id="jenis-kelamin">
                            -
                        </p>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <p class=" mb-0">Tempat, Tanggal Lahir : </p>
                        <p id="ttl">
                            -
                        </p>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <p class=" mb-0">Agama : </p>
                        <p id="agama">
                            -
                        </p>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <p class=" mb-0">Pendidikan Terakhir : </p>
                        <p id="pendidikan">
                            -
                        </p>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <p class=" mb-0">Pekerjaan : </p>
                        <p id="pekerjaan">
                            -
                        </p>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <p class=" mb-0">Golongan Darah : </p>
                        <p id="golongan-darah">
                            -
                        </p>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <p class=" mb-0">Status Perkawinan : </p>
                        <p id="status-perkawinan">
                            -
                        </p>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <p class=" mb-0">Tanggal Perkawinan : </p>
                        <p id="tanggal-perkawinan">
                            -
                        </p>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <p class=" mb-0">Kewarganegaraan : </p>
                        <p id="kewarganegaraan">
                            -
                        </p>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <p class=" mb-0">Nomor Paspor : </p>
                        <p id="nomor-paspor">
                            -
                        </p>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <p class=" mb-0">Nomor Kitap : </p>
                        <p id="nomor-kitap">
                            -
                        </p>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <p class=" mb-0">Alamat : </p>
                        <p id="alamat">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, repellat!
                        </p>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <p class=" mb-0">Desa : </p>
                        <p id="desa">
                            -
                        </p>
                    </div>
                </div>
                <div class="modal-footer">
                    @component('dashboard.components.buttons.close')
                    @endcomponent
                    @if (Auth::user()->role == 'Admin')
                        <a href="#" class="btn btn-warning" id="link-edit"><i class="fas fa-edit"></i> Ubah</a>
                    @endif
                </div>
            </div>
        </div>
    </div> --}}
@endsection

@push('scripts')
    <script>
        $('.select2').select2({
            placeholder: "Semua",
            theme: "bootstrap",
        })
    </script>

    <script>
        $('#export-jumlah-penduduk').hide();

        $('.btn-export').click(function() {
            $('#form-export').submit();
        })

        $('#pills-profile-tab-nobd').click(function() {
            $('#form-export').attr('action', "{{ url('master-data/orang-tua/export') }}");
            $('#export-penduduk').show();
            $('#export-jumlah-penduduk').hide();
        })

        $('#pills-jumlah-tab-nobd').click(function() {
            $('#form-export').attr('action', "{{ url('master-data/orang-tua/export-jumlah') }}");
            $('#export-penduduk').hide();
            $('#export-jumlah-penduduk').show();
        })
    </script>

    <script>
        $(document).on('click', '#btn-lihat', function() {
            let id = $(this).val();
            $.ajax({
                url: "{{ url('master-data/orang-tua') }}" + '/' + id,
                type: 'GET',
                success: function(response) {
                    if (response.status == 'success') {
                        $('#nama').html(response.data.nama);
                        $('#nik').html(response.data.nik);
                        $('#jenis-kelamin').html(response.data.jenis_kelamin);
                        $('#ttl').html(response.data.ttl);
                        $('#agama').html(response.data.agama);
                        $('#pendidikan').html(response.data.pendidikan);
                        $('#pekerjaan').html(response.data.pekerjaan);
                        $('#golongan-darah').html(response.data.golongan_darah);
                        $('#status-perkawinan').html(response.data.status_perkawinan);
                        $('#tanggal-perkawinan').html(response.data.tanggal_perkawinan);
                        $('#kewarganegaraan').html(response.data.kewarganegaraan);
                        $('#nomor-paspor').html(response.data.no_paspor);
                        $('#nomor-kitap').html(response.data.no_kitap);
                        $('#alamat').html(response.data.alamat);
                        $('#desa').html(response.data.desa);
                        $('#modal-lihat').modal('show');
                        $("#link-edit").attr("href", "{{ url('master-data/orang-tua') }}" + '/' + id +
                            '/edit');
                    }
                },
                error: function(response) {
                    swal("Gagal", "Data Gagal Diambil, Silahkan Coba Kembali", {
                        icon: "error",
                        buttons: false,
                        timer: 1000,
                    });
                }
            })
        })
    </script>

    <script>
        $(document).on('click', '#btn-delete', function() {
            let id = $(this).val();
            swal({
                title: 'Apakah Anda Yakin ?',
                icon: 'error',
                text: "Data yang sudah dihapus tidak dapat dikembalikan lagi !",
                type: 'warning',
                buttons: {
                    cancel: {
                        visible: true,
                        text: 'Batal',
                        className: 'btn btn-light'
                    },
                    confirm: {
                        text: 'Hapus',
                        className: 'btn btn-danger'
                    },
                }
            }).then((Delete) => {
                if (Delete) {
                    $.ajax({
                        url: "{{ url('master-data/orang-tua') }}" + '/' + id,
                        type: 'DELETE',
                        data: {
                            '_token': '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            if (response.status == 'success') {
                                swal("Berhasil", "Data Berhasil Dihapus", {
                                    icon: "success",
                                    buttons: false,
                                    timer: 1000,
                                }).then(function() {
                                    table.draw();
                                    initializeMap();
                                })
                            } else {
                                swal("Gagal", "Data Gagal Dihapus", {
                                    icon: "error",
                                    buttons: false,
                                    timer: 1000,
                                });
                            }
                        },
                        error: function(response) {
                            swal("Gagal", "Data Gagal Diproses, Silahkan Coba Kembali", {
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
        var table = $('#table-data').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ url('master-data/orang-tua') }}",
                data: function(d) {
                    d.desa_id = $('#desa_id').val();
                    d.kecamatan_id = $('#kecamatan_id').val();
                    d.search = $('input[type="search"]').val();
                },
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    class: 'text-center'
                },
                {
                    data: 'nama_ibu',
                    name: 'nama_ibu'
                },
                {
                    data: 'nik_ibu',
                    name: 'nik_ibu',
                    class: 'text-center'
                },
                {
                    data: 'nama_ayah',
                    name: 'nama_ayah'
                },
                {
                    data: 'nik_ayah',
                    name: 'nik_ayah',
                    class: 'text-center'
                },
                {
                    data: 'kecamatan',
                    name: 'kecamatan',
                    class: 'text-center'
                },
                {
                    data: 'desa',
                    name: 'desa',
                    class: 'text-center'
                },
                {
                    data: 'rt',
                    name: 'rt',
                    class: 'text-center'
                },
                {
                    data: 'rw',
                    name: 'rw',
                    class: 'text-center'
                },
                {
                    data: 'alamat',
                    name: 'alamat',
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true,
                    class: 'text-center'
                },
            ]
        });
    </script>

    <script>
        $(document).on('change', '#kecamatan_id', function() {
            $('#desa_id').html('')
            $('#desa_id').attr('disabled', false)
            $('#desa_id').append('<option value="semua">Semua</option>')
            $('#desa_id').val('').trigger('change');
            $.ajax({
                url: "{{ url('list/desa') }}",
                type: 'GET',
                data: {
                    'kecamatan': $(this).val()
                },
                success: function(response) {
                    response.data.map((data) => {
                        $('#desa_id').append('<option value="' + data.id + '">' +
                            data
                            .nama + '</option>');
                    });
                }
            })
        })
    </script>

    <script>
        $('#desa_id').change(function() {
            $('#export').val($(this).val());
        })

        $(".filter").change(function() {
            table.draw();
            getJumlahPenduduk();
        })

        let getJumlahPenduduk = () => {
            $.ajax({
                url: "{{ url('master-data/orang-tua/jumlah-penduduk') }}",
                type: 'GET',
                data: {
                    desa_id: $('#desa_id').val(),
                    kecamatan_id: $('#kecamatan_id').val(),
                },
                success: function(response) {
                    console.log(response);
                    $('#wilayah').html(response.wilayah);
                    $('#nama-wilayah').html(response.nama_wilayah);
                    $('#total-penduduk').html(response.total_penduduk);
                    $('#tidak-sekolah').html(response.tidak_sekolah);
                    $('#sd').html(response.sd);
                    $('#smp').html(response.smp);
                    $('#sma').html(response.sma);
                    $('#diploma-1').html(response.diploma_1);
                    $('#diploma-2').html(response.diploma_2);
                    $('#diploma-3').html(response.diploma_3);
                    $('#s1').html(response.s1);
                    $('#s2').html(response.s2);
                    $('#s3').html(response.s3);
                    $('#tidak-bekerja').html(response.tidak_bekerja);
                    $('#irt').html(response.irt);
                    $('#karyawan-swasta').html(response.karyawan_swasta);
                    $('#pns').html(response.pns);
                    $('#wiraswasta').html(response.wiraswasta);
                    $('#petani').html(response.petani);
                    $('#pelajar').html(response.pelajar);
                    $('#baduta').html(response.baduta);
                    $('#balita').html(response.balita);
                    $('#anak').html(response.anak);
                    $('#remaja').html(response.remaja);
                    $('#dewasa').html(response.dewasa);
                    $('#lansia').html(response.lansia);
                    $('#penduduk-laki-laki').html(response.penduduk_laki_laki);
                    $('#penduduk-perempuan').html(response.penduduk_perempuan);
                    $('#pekerjaan-tidak-tetap').html(response.pekerjaan_tidak_tetap);
                }
            })
        }
    </script>

    <script>
        $('#nav-master-orang-tua').addClass('active');

        $(document).ready(function() {
            getJumlahPenduduk();
        })
    </script>
@endpush
