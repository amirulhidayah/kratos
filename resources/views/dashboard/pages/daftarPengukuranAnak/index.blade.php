@extends('dashboard.layouts.main')

@section('title')
    Pengukuran Anak
@endsection

@section('titlePanelHeader')
    Pengukuran Anak
@endsection

@section('subTitlePanelHeader')
    {{-- Lorem ipsum dolor sit amet consectetur adipisicing elit. --}}
@endsection

@section('buttonPanelHeader')
    {{-- @if (Auth::user()->role == 'Admin')
        @component('dashboard.components.buttons.add', [
    'url' => url('daftar-pengukuran-anak/create'),
])
        @endcomponent
    @endif --}}
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
                        <div class="card-title">Data Pengukuran Anak</div>
                        <div class="card-tools">
                            <div class="row">
                                <button type="submit" class="btn btn-info btn-border btn-round btn-sm mr-2 btn-export"
                                    id="btn-export-pengukuran">
                                    <i class="fas fa-lg fa-download"></i>
                                    Export Pengukuran Anak
                                </button>

                                <button type="submit" class="btn btn-info btn-border btn-round btn-sm mr-2 btn-export"
                                    id="btn-export-jumlah">
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
                            <form action="{{ url('daftar-pengukuran-anak/export-pengukuran-anak') }}" method="POST"
                                id="form-export">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12" id="col-nama-nik">
                                        @component('dashboard.components.formElements.input',
                                            [
                                                'label' => 'Nama / NIK',
                                                'type' => 'text',
                                                'id' => 'nama_nik',
                                                'name' => 'nama_nik',
                                                'class' => '',
                                                'wajib' => '<sup class="text-danger">*</sup>',
                                                'placeholder' => 'Cari berdasarkan Nama / NIK',
                                            ])
                                        @endcomponent
                                    </div>
                                    <div class="col-sm-12 col-lg-12" id="col-jenis-kelamin">
                                        @component('dashboard.components.formElements.select',
                                            [
                                                'label' => 'Jenis Kelamin',
                                                'id' => 'jenis_kelamin',
                                                'name' => 'jenis_kelamin',
                                                'class' => 'select2 filter',
                                                'wajib' => '<sup class="text-danger">*</sup>',
                                            ])
                                            @slot('options')
                                                <option value="semua">Semua</option>
                                                <option value="Laki-Laki">Laki-Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            @endslot
                                        @endcomponent
                                    </div>
                                    <div class="col-sm-12 col-lg-4" id="col-bb-u">
                                        @component('dashboard.components.formElements.select',
                                            [
                                                'label' => 'BB / U',
                                                'id' => 'bb_u',
                                                'name' => 'bb_u',
                                                'class' => 'select2 filter',
                                                'wajib' => '<sup class="text-danger">*</sup>',
                                            ])
                                            @slot('options')
                                                <option value="semua">Semua</option>
                                                <option value="Sangat Kurang">Sangat Kurang</option>
                                                <option value="Kurang">Kurang</option>
                                                <option value="Berat Badan Normal">Berat Badan Normal</option>
                                                <option value="Berat Badan Lebih">Berat Badan Lebih</option>
                                            @endslot
                                        @endcomponent
                                    </div>
                                    <div class="col-sm-12 col-lg-4" id="col-tb-u">
                                        @component('dashboard.components.formElements.select',
                                            [
                                                'label' => 'TB / U',
                                                'id' => 'tb_u',
                                                'name' => 'tb_u',
                                                'class' => 'select2 filter',
                                                'wajib' => '<sup class="text-danger">*</sup>',
                                            ])
                                            @slot('options')
                                                <option value="semua">Semua</option>
                                                <option value="Sangat Pendek">Sangat Pendek</option>
                                                <option value="Pendek">Pendek</option>
                                                <option value="Normal">Normal</option>
                                                <option value="Tinggi">Tinggi</option>
                                            @endslot
                                        @endcomponent
                                    </div>
                                    <div class="col-sm-12 col-lg-4" id="col-bb-tb">
                                        @component('dashboard.components.formElements.select',
                                            [
                                                'label' => 'BB / TB',
                                                'id' => 'bb_tb',
                                                'name' => 'bb_tb',
                                                'class' => 'select2 filter',
                                                'wajib' => '<sup class="text-danger">*</sup>',
                                            ])
                                            @slot('options')
                                                <option value="semua">Semua</option>
                                                <option value="Gizi Buruk">Gizi Buruk</option>
                                                <option value="Gizi Kurang">Gizi Kurang</option>
                                                <option value="Gizi Baik">Gizi Baik</option>
                                                <option value="Beresiko Gizi Lebih">Beresiko Gizi Lebih</option>
                                                <option value="Gizi Lebih">Gizi Lebih</option>
                                                <option value="Obesitas">Obesitas</option>
                                            @endslot
                                        @endcomponent
                                    </div>
                                    <div class="col-sm-12 col-lg-12" id="col-jenis-filter">
                                        @component('dashboard.components.formElements.select',
                                            [
                                                'label' => 'Filter Berdasarkan',
                                                'id' => 'jenis_filter',
                                                'name' => 'jenis_filter',
                                                'class' => 'select2 filter',
                                                'wajib' => '<sup class="text-danger">*</sup>',
                                            ])
                                            @slot('options')
                                                <option value="semua">Semua</option>
                                                <option value="wilayah">Wilayah</option>
                                                <option value="pelayanan_kesehatan">Pelayanan Kesehatan</option>
                                            @endslot
                                        @endcomponent
                                    </div>
                                    <div class="col-sm-12 col-lg-6" id="col-kecamatan">
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
                                    <div class="col-sm-12 col-lg-6" id="col-desa">
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
                                    <div class="col-sm-12 col-lg-6" id="col-puskesmas">
                                        @component('dashboard.components.formElements.select',
                                            [
                                                'label' => 'PUSKESMAS',
                                                'id' => 'puskesmas_id',
                                                'name' => 'puskesmas_id',
                                                'class' => 'select2 filter',
                                                'wajib' => '<sup class="text-danger">*</sup>',
                                            ])
                                            @slot('options')
                                            @endslot
                                        @endcomponent
                                    </div>
                                    <div class="col-sm-12 col-lg-6" id="col-posyandu">
                                        @component('dashboard.components.formElements.select',
                                            [
                                                'label' => 'POSYANDU',
                                                'id' => 'posyandu_id',
                                                'name' => 'posyandu_id',
                                                'class' => 'select2 filter',
                                                // 'wajib' => '<sup class="text-danger">*</sup>',
                                            ])
                                            @slot('options')
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
                                                            'Nama',
                                                            'NIK',
                                                            'Jenis Kelamin',
                                                            'Tanggal Lahir',
                                                            'Tanggal Pengukuran',
                                                            'Usia Saat Ukur',
                                                            'Berat',
                                                            'Tinggi',
                                                            'Lila',
                                                            'BB/U',
                                                            'TB/U',
                                                            'BB/TB',
                                                            'PUSKESMAS',
                                                            'POSYANDU',
                                                            'Kecamatan',
                                                            'Desa',
                                                            'Aksi',
                                                        ],
                                                        'class' => 'text-nowrap',
                                                    ])
                                                @endcomponent
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-jumlah" role="tabpanel"
                                    aria-labelledby="pills-profile-tab-nobd">
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
                                                                <p class="fw-bold mb-0">Total Anak :
                                                                    <span id="total-anak">0</span>
                                                                </p>
                                                            </div>
                                                            <div class="d-flex justify-content-center mt-2">
                                                                <p class="fw-bold mb-0">Total Belum Melakukan Pengukuran :
                                                                    <span id="total-belum-ukur">0</span>
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
                                                                    id="anak-laki-laki">-</p>
                                                            </div>
                                                            <div class="d-flex justify-content-between mt-2">
                                                                <p class=" mb-0">Perempuan : </p>
                                                                <p class="badge bg-primary text-light border-0 mb-0"
                                                                    id="anak-perempuan">-</p>
                                                            </div>
                                                            <hr>
                                                            <div class="d-flex justify-content-center mt-2">
                                                                <p class="fw-bold mb-0">Kategori BB / U</p>
                                                            </div>
                                                            <div class="row mt-3">
                                                                <div class="col-12 col-sm-6 col-md-6">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <div class="d-flex justify-content-between">
                                                                                <div>
                                                                                    <h5><b>Sangat Kurang</b></h5>
                                                                                </div>
                                                                                <h3 class="text-danger fw-bold"
                                                                                    id="bbu-sangat-kurang">-</h3>
                                                                            </div>
                                                                            <hr class="my-0">
                                                                            <div
                                                                                class="d-flex justify-content-between mt-2">
                                                                                <p class="text-muted mb-0">Laki-Laki</p>
                                                                                <p class="text-muted mb-0"
                                                                                    id="bbu-sangat-kurang-laki">-</p>
                                                                            </div>
                                                                            <div
                                                                                class="d-flex justify-content-between mt-2">
                                                                                <p class="text-muted mb-0">Perempuan</p>
                                                                                <p class="text-muted mb-0"
                                                                                    id="bbu-sangat-kurang-perempuan">-
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-6 col-md-6">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <div class="d-flex justify-content-between">
                                                                                <div>
                                                                                    <h5><b>Kurang</b></h5>
                                                                                </div>
                                                                                <h3 class="text-warning fw-bold"
                                                                                    id="bbu-kurang">-</h3>
                                                                            </div>
                                                                            <hr class="my-0">
                                                                            <div
                                                                                class="d-flex justify-content-between mt-2">
                                                                                <p class="text-muted mb-0">Laki-Laki</p>
                                                                                <p class="text-muted mb-0"
                                                                                    id="bbu-kurang-laki">-</p>
                                                                            </div>
                                                                            <div
                                                                                class="d-flex justify-content-between mt-2">
                                                                                <p class="text-muted mb-0">Perempuan</p>
                                                                                <p class="text-muted mb-0"
                                                                                    id="bbu-kurang-perempuan">-</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-6 col-md-6">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <div class="d-flex justify-content-between">
                                                                                <div>
                                                                                    <h5><b>Berat Badan Normal</b></h5>
                                                                                </div>
                                                                                <h3 class="text-success fw-bold"
                                                                                    id="bbu-normal">-</h3>
                                                                            </div>
                                                                            <hr class="my-0">
                                                                            <div
                                                                                class="d-flex justify-content-between mt-2">
                                                                                <p class="text-muted mb-0">Laki-Laki</p>
                                                                                <p class="text-muted mb-0"
                                                                                    id="bbu-normal-laki">-</p>
                                                                            </div>
                                                                            <div
                                                                                class="d-flex justify-content-between mt-2">
                                                                                <p class="text-muted mb-0">Perempuan</p>
                                                                                <p class="text-muted mb-0"
                                                                                    id="bbu-normal-perempuan">-</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-6 col-md-6">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <div class="d-flex justify-content-between">
                                                                                <div>
                                                                                    <h5><b>Berat Badan Lebih</b></h5>
                                                                                </div>
                                                                                <h3 class="text-danger fw-bold"
                                                                                    id="bbu-lebih">-</h3>
                                                                            </div>
                                                                            <hr class="my-0">
                                                                            <div
                                                                                class="d-flex justify-content-between mt-2">
                                                                                <p class="text-muted mb-0">Laki-Laki</p>
                                                                                <p class="text-muted mb-0"
                                                                                    id="bbu-lebih-laki">-</p>
                                                                            </div>
                                                                            <div
                                                                                class="d-flex justify-content-between mt-2">
                                                                                <p class="text-muted mb-0">Perempuan</p>
                                                                                <p class="text-muted mb-0"
                                                                                    id="bbu-lebih-perempuan">-</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="d-flex justify-content-center mt-2">
                                                                <p class="fw-bold mb-0">TB / U</p>
                                                            </div>
                                                            <div class="row mt-3">
                                                                <div class="col-12 col-sm-6 col-md-6">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <div class="d-flex justify-content-between">
                                                                                <div>
                                                                                    <h5><b>Sangat Pendek</b></h5>
                                                                                </div>
                                                                                <h3 class="text-danger fw-bold"
                                                                                    id="tbu-sangat-pendek">-</h3>
                                                                            </div>
                                                                            <hr class="my-0">
                                                                            <div
                                                                                class="d-flex justify-content-between mt-2">
                                                                                <p class="text-muted mb-0">Laki-Laki</p>
                                                                                <p class="text-muted mb-0"
                                                                                    id="tbu-sangat-pendek-laki">-</p>
                                                                            </div>
                                                                            <div
                                                                                class="d-flex justify-content-between mt-2">
                                                                                <p class="text-muted mb-0">Perempuan</p>
                                                                                <p class="text-muted mb-0"
                                                                                    id="tbu-sangat-pendek-perempuan">-</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-6 col-md-6">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <div class="d-flex justify-content-between">
                                                                                <div>
                                                                                    <h5><b>Pendek</b></h5>
                                                                                </div>
                                                                                <h3 class="text-warning fw-bold"
                                                                                    id="tbu-pendek">-</h3>
                                                                            </div>
                                                                            <hr class="my-0">
                                                                            <div
                                                                                class="d-flex justify-content-between mt-2">
                                                                                <p class="text-muted mb-0">Laki-Laki</p>
                                                                                <p class="text-muted mb-0"
                                                                                    id="tbu-pendek-laki">-</p>
                                                                            </div>
                                                                            <div
                                                                                class="d-flex justify-content-between mt-2">
                                                                                <p class="text-muted mb-0">Perempuan</p>
                                                                                <p class="text-muted mb-0"
                                                                                    id="tbu-pendek-perempuan">-</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-6 col-md-6">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <div class="d-flex justify-content-between">
                                                                                <div>
                                                                                    <h5><b>Normal</b></h5>
                                                                                </div>
                                                                                <h3 class="text-success fw-bold"
                                                                                    id="tbu-normal">-</h3>
                                                                            </div>
                                                                            <hr class="my-0">
                                                                            <div
                                                                                class="d-flex justify-content-between mt-2">
                                                                                <p class="text-muted mb-0">Laki-Laki</p>
                                                                                <p class="text-muted mb-0"
                                                                                    id="tbu-normal-laki">-</p>
                                                                            </div>
                                                                            <div
                                                                                class="d-flex justify-content-between mt-2">
                                                                                <p class="text-muted mb-0">Perempuan</p>
                                                                                <p class="text-muted mb-0"
                                                                                    id="tbu-normal-perempuan">-</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-6 col-md-6">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <div class="d-flex justify-content-between">
                                                                                <div>
                                                                                    <h5><b>Tinggi</b></h5>
                                                                                </div>
                                                                                <h3 class="text-primary fw-bold"
                                                                                    id="tbu-tinggi">-</h3>
                                                                            </div>
                                                                            <hr class="my-0">
                                                                            <div
                                                                                class="d-flex justify-content-between mt-2">
                                                                                <p class="text-muted mb-0">Laki-Laki</p>
                                                                                <p class="text-muted mb-0"
                                                                                    id="tbu-tinggi-laki">
                                                                                    -</p>
                                                                            </div>
                                                                            <div
                                                                                class="d-flex justify-content-between mt-2">
                                                                                <p class="text-muted mb-0">Perempuan</p>
                                                                                <p class="text-muted mb-0"
                                                                                    id="tbu-tinggi-perempuan">-</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <hr>
                                                            <div class="d-flex justify-content-center mt-2">
                                                                <p class="fw-bold mb-0">BB / TB</p>
                                                            </div>
                                                            <div class="row mt-3">
                                                                <div class="col-12 col-sm-6 col-md-6">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <div class="d-flex justify-content-between">
                                                                                <div>
                                                                                    <h5><b>Gizi Buruk</b></h5>
                                                                                </div>
                                                                                <h3 class="text-danger fw-bold"
                                                                                    id="bbtb-buruk">-</h3>
                                                                            </div>
                                                                            <hr class="my-0">
                                                                            <div
                                                                                class="d-flex justify-content-between mt-2">
                                                                                <p class="text-muted mb-0">Laki-Laki</p>
                                                                                <p class="text-muted mb-0"
                                                                                    id="bbtb-buruk-laki">-</p>
                                                                            </div>
                                                                            <div
                                                                                class="d-flex justify-content-between mt-2">
                                                                                <p class="text-muted mb-0">Perempuan</p>
                                                                                <p class="text-muted mb-0"
                                                                                    id="bbtb-buruk-perempuan">-</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-6 col-md-6">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <div class="d-flex justify-content-between">
                                                                                <div>
                                                                                    <h5><b>Gizi Kurang</b></h5>
                                                                                </div>
                                                                                <h3 class="text-warning fw-bold"
                                                                                    id="bbtb-kurang">-</h3>
                                                                            </div>
                                                                            <hr class="my-0">
                                                                            <div
                                                                                class="d-flex justify-content-between mt-2">
                                                                                <p class="text-muted mb-0">Laki-Laki</p>
                                                                                <p class="text-muted mb-0"
                                                                                    id="bbtb-kurang-laki">-</p>
                                                                            </div>
                                                                            <div
                                                                                class="d-flex justify-content-between mt-2">
                                                                                <p class="text-muted mb-0">Perempuan</p>
                                                                                <p class="text-muted mb-0"
                                                                                    id="bbtb-kurang-perempuan">-</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-6 col-md-6">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <div class="d-flex justify-content-between">
                                                                                <div>
                                                                                    <h5><b>Gizi Baik</b></h5>
                                                                                </div>
                                                                                <h3 class="text-success fw-bold"
                                                                                    id="bbtb-baik">-</h3>
                                                                            </div>
                                                                            <hr class="my-0">
                                                                            <div
                                                                                class="d-flex justify-content-between mt-2">
                                                                                <p class="text-muted mb-0">Laki-Laki</p>
                                                                                <p class="text-muted mb-0"
                                                                                    id="bbtb-baik-laki">-</p>
                                                                            </div>
                                                                            <div
                                                                                class="d-flex justify-content-between mt-2">
                                                                                <p class="text-muted mb-0">Perempuan</p>
                                                                                <p class="text-muted mb-0"
                                                                                    id="bbtb-baik-perempuan">-</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-6 col-md-6">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <div class="d-flex justify-content-between">
                                                                                <div>
                                                                                    <h5><b>Beresiko Gizi Lebih</b></h5>
                                                                                </div>
                                                                                <h3 class="text-primary fw-bold"
                                                                                    id="bbtb-resiko-lebih">-</h3>
                                                                            </div>
                                                                            <hr class="my-0">
                                                                            <div
                                                                                class="d-flex justify-content-between mt-2">
                                                                                <p class="text-muted mb-0">Laki-Laki</p>
                                                                                <p class="text-muted mb-0"
                                                                                    id="bbtb-resiko-lebih-laki">-</p>
                                                                            </div>
                                                                            <div
                                                                                class="d-flex justify-content-between mt-2">
                                                                                <p class="text-muted mb-0">Perempuan</p>
                                                                                <p class="text-muted mb-0"
                                                                                    id="bbtb-resiko-lebih-perempuan">-</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-6 col-md-6">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <div class="d-flex justify-content-between">
                                                                                <div>
                                                                                    <h5><b>Gizi Lebih</b></h5>
                                                                                </div>
                                                                                <h3 class="text-warning fw-bold"
                                                                                    id="bbtb-lebih">-</h3>
                                                                            </div>
                                                                            <hr class="my-0">
                                                                            <div
                                                                                class="d-flex justify-content-between mt-2">
                                                                                <p class="text-muted mb-0">Laki-Laki</p>
                                                                                <p class="text-muted mb-0"
                                                                                    id="bbtb-lebih-laki">-</p>
                                                                            </div>
                                                                            <div
                                                                                class="d-flex justify-content-between mt-2">
                                                                                <p class="text-muted mb-0">Perempuan</p>
                                                                                <p class="text-muted mb-0"
                                                                                    id="bbtb-lebih-perempuan">-</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-6 col-md-6">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <div class="d-flex justify-content-between">
                                                                                <div>
                                                                                    <h5><b>Obesitas</b></h5>
                                                                                </div>
                                                                                <h3 class="text-danger fw-bold"
                                                                                    id="bbtb-obesitas">-</h3>
                                                                            </div>
                                                                            <hr class="my-0">
                                                                            <div
                                                                                class="d-flex justify-content-between mt-2">
                                                                                <p class="text-muted mb-0">Laki-Laki</p>
                                                                                <p class="text-muted mb-0"
                                                                                    id="bbtb-obesitas-laki">-</p>
                                                                            </div>
                                                                            <div
                                                                                class="d-flex justify-content-between mt-2">
                                                                                <p class="text-muted mb-0">Perempuan</p>
                                                                                <p class="text-muted mb-0"
                                                                                    id="bbtb-obesitas-perempuan">-</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @component('dashboard.components.modals.detailAnak')
        @endcomponent
    @endsection

    @push('scripts')
        <script>
            $('.select2').select2({
                placeholder: "Semua",
                theme: "bootstrap",
            })
        </script>

        <script>
            var tab = 'tabel';

            $('#btn-export-jumlah').hide();

            $('.btn-export').click(function() {
                $('#form-export').submit();
            })

            $('#pills-profile-tab-nobd').click(function() {
                tab = 'tabel';
                table.columns.adjust().draw();
                $('#form-export').attr('action', "{{ url('daftar-pengukuran-anak/export') }}");
                $('#btn-export-pengukuran').show();
                $('#col-nama-nik').show();
                $('#col-jenis-kelamin').show();
                $('#col-bb-u').show();
                $('#col-tb-u').show();
                $('#col-bb-tb').show();
                $('#col-jenis-filter').show();
                $('#col-kecamatan').show();
                $('#col-desa').show();
                $('#col-puskesmas').show();
                $('#col-posyandu').show();
                $('#jenis_filter').val('').trigger('change');
                $('#btn-export-jumlah').hide();
            })

            $('#pills-jumlah-tab-nobd').click(function() {
                tab = 'demografi';
                $('#form-export').attr('action', "{{ url('daftar-pengukuran-anak/export-jumlah') }}");
                $('#btn-export-pengukuran').hide();
                $('#col-nama-nik').hide();
                $('#col-jenis-kelamin').hide();
                $('#col-bb-u').hide();
                $('#col-tb-u').hide();
                $('#col-bb-tb').hide();
                $('#col-jenis-filter').hide();
                $('#col-kecamatan').show();
                $('#col-desa').show();
                $('#col-puskesmas').hide();
                $('#col-posyandu').hide();
                $('#kecamatan_id').val('').trigger('change');
                $('#btn-export-jumlah').show();
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
                            url: "{{ url('daftar-pengukuran-anak') }}" + '/' + id,
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
                searching: false,
                pageLength: 25,
                fixedColumns: {
                    left: 3,
                    right: 1
                },
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.12.1/i18n/id.json'
                },
                scrollX: true,
                scrollCollapse: true,
                ajax: {
                    url: "{{ url('daftar-pengukuran-anak') }}",
                    data: function(d) {
                        d.desa_id = $('#desa_id').val();
                        d.kecamatan_id = $('#kecamatan_id').val();
                        // d.search = $('input[type="search"]').val();
                        d.jenis_kelamin = $('#jenis_kelamin').val();
                        d.jenis_filter = $("#jenis_filter").val();
                        d.puskesmas_id = $('#puskesmas_id').val();
                        d.posyandu_id = $('#posyandu_id').val();
                        d.nama_nik = $('#nama_nik').val();
                        d.bb_u = $('#bb_u').val();
                        d.tb_u = $('#tb_u').val();
                        d.bb_tb = $('#bb_tb').val();
                    },
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                    },
                    {
                        data: 'nama',
                        name: 'nama',
                    },
                    {
                        data: 'nik',
                        name: 'nik',
                        class: 'text-center'
                    },
                    {
                        data: 'jenis_kelamin',
                        name: 'jenis_kelamin',
                        class: 'text-center'
                    },
                    {
                        data: 'tanggal_lahir',
                        name: 'tanggal_lahir',
                        class: 'text-center'
                    },
                    {
                        data: 'tanggal_pengukuran',
                        name: 'tanggal_pengukuran',
                        class: 'text-center'
                    },
                    {
                        data: 'usia_saat_ukur',
                        name: 'usia_saat_ukur',
                        class: 'text-center'
                    },
                    {
                        data: 'berat',
                        name: 'berat',
                        class: 'text-center'
                    },
                    {
                        data: 'tinggi',
                        name: 'tinggi',
                        class: 'text-center'
                    },
                    {
                        data: 'lila',
                        name: 'lila',
                        class: 'text-center'
                    },
                    {
                        data: 'bb_u',
                        name: 'bb_u',
                        class: 'text-center'
                    },
                    {
                        data: 'tb_u',
                        name: 'tb_u',
                        class: 'text-center'
                    },
                    {
                        data: 'bb_tb',
                        name: 'bb_tb',
                        class: 'text-center'
                    },
                    {
                        data: 'puskesmas',
                        name: 'puskesmas',
                        class: 'text-center'
                    },
                    {
                        data: 'posyandu',
                        name: 'posyandu',
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
                if (tab != 'tabel') {
                    getJumlahData();
                }
            })
        </script>

        <script>
            $('#desa_id').change(function() {
                $('#export').val($(this).val());
            })

            $('#nama_nik').keyup(function() {
                table.draw();
            });

            $(".filter").change(function() {
                table.draw();
                // getJumlahPenduduk();
            })

            let getJumlahData = () => {
                $.ajax({
                    url: "{{ url('daftar-pengukuran-anak/jumlah-data') }}",
                    type: 'POST',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        desa_id: $('#desa_id').val(),
                        kecamatan_id: $('#kecamatan_id').val(),
                    },
                    success: function(response) {
                        console.log(response);
                        $('#wilayah').html(response.wilayah);
                        $('#nama-wilayah').html(response.nama_wilayah);
                        $('#total-anak').html(response.total.total);
                        $('#total-belum-ukur').html(response.total.belumUkur);
                        $('#anak-laki-laki').html(response.total.laki);
                        $('#anak-perempuan').html(response.total.perempuan);
                        $('#bbu-sangat-kurang').html(response.bbU[0].total);
                        $('#bbu-sangat-kurang-laki').html(response.bbU[0].laki);
                        $('#bbu-sangat-kurang-perempuan').html(response.bbU[0].perempuan);
                        $('#bbu-kurang').html(response.bbU[1].total);
                        $('#bbu-kurang-laki').html(response.bbU[1].laki);
                        $('#bbu-kurang-perempuan').html(response.bbU[1].perempuan);
                        $('#bbu-normal').html(response.bbU[2].total);
                        $('#bbu-normal-laki').html(response.bbU[2].laki);
                        $('#bbu-normal-perempuan').html(response.bbU[2].perempuan);
                        $('#bbu-lebih').html(response.bbU[3].total);
                        $('#bbu-lebih-laki').html(response.bbU[3].laki);
                        $('#bbu-lebih-perempuan').html(response.bbU[3].perempuan);
                        $('#tbu-sangat-pendek').html(response.tbU[0].total);
                        $('#tbu-sangat-pendek-laki').html(response.tbU[0].laki);
                        $('#tbu-sangat-pendek-perempuan').html(response.tbU[0].perempuan);
                        $('#tbu-pendek').html(response.tbU[1].total);
                        $('#tbu-pendek-laki').html(response.tbU[1].laki);
                        $('#tbu-pendek-perempuan').html(response.tbU[1].perempuan);
                        $('#tbu-normal').html(response.tbU[2].total);
                        $('#tbu-normal-laki').html(response.tbU[2].laki);
                        $('#tbu-normal-perempuan').html(response.tbU[2].perempuan);
                        $('#tbu-tinggi').html(response.tbU[3].total);
                        $('#tbu-tinggi-laki').html(response.tbU[3].laki);
                        $('#tbu-tinggi-perempuan').html(response.tbU[3].perempuan);
                        $('#bbtb-buruk').html(response.bbTb[0].total);
                        $('#bbtb-buruk-laki').html(response.bbTb[0].laki);
                        $('#bbtb-buruk-perempuan').html(response.bbTb[0].perempuan);
                        $('#bbtb-kurang').html(response.bbTb[1].total);
                        $('#bbtb-kurang-laki').html(response.bbTb[1].laki);
                        $('#bbtb-kurang-perempuan').html(response.bbTb[1].perempuan);
                        $('#bbtb-baik').html(response.bbTb[2].total);
                        $('#bbtb-baik-laki').html(response.bbTb[2].laki);
                        $('#bbtb-baik-perempuan').html(response.bbTb[2].perempuan);
                        $('#bbtb-resiko-lebih').html(response.bbTb[3].total);
                        $('#bbtb-resiko-lebih-laki').html(response.bbTb[3].laki);
                        $('#bbtb-resiko-lebih-perempuan').html(response.bbTb[3].perempuan);
                        $('#bbtb-lebih').html(response.bbTb[4].total);
                        $('#bbtb-lebih-laki').html(response.bbTb[4].laki);
                        $('#bbtb-lebih-perempuan').html(response.bbTb[4].perempuan);
                        $('#bbtb-obesitas').html(response.bbTb[5].total);
                        $('#bbtb-obesitas-laki').html(response.bbTb[5].laki);
                        $('#bbtb-obesitas-perempuan').html(response.bbTb[5].perempuan);
                    }
                })
            }
        </script>

        <script>
            $('#nav-pengukuran-anak').addClass('active');

            $(document).ready(function() {
                getJumlahData();
                getPuskesmas();
                $('#col-kecamatan').hide();
                $('#col-desa').hide();
                $('#col-puskesmas').hide();
                $('#col-posyandu').hide();
            })

            $('#jenis_filter').change(function() {
                var jenis = $(this).val();
                if (jenis == 'wilayah') {
                    $('#col-kecamatan').show();
                    $('#col-desa').show();
                    $('#puskesmas_id').val('semua').trigger('change');
                    $('#col-puskesmas').hide();
                    $('#col-posyandu').hide();
                } else if (jenis == 'pelayanan_kesehatan') {
                    $('#col-kecamatan').hide();
                    $('#col-desa').hide();
                    $('#kecamatan_id').val('semua').trigger('change');
                    $('#col-puskesmas').show();
                    $('#col-posyandu').show();
                } else {
                    $('#col-kecamatan').hide();
                    $('#col-desa').hide();
                    $('#puskesmas_id').val('semua').trigger('change');
                    $('#kecamatan_id').val('semua').trigger('change');
                    $('#col-puskesmas').hide();
                    $('#col-posyandu').hide();
                }
            })

            let getPuskesmas = () => {
                $('#puskesmas_id').html('');
                $('#posyandu_id').html('');
                $('#posyandu_id').attr('disabled', true)
                $('#puskesmas_id').append('<option value="">--Pilih Salah Satu--</option>');
                $('#puskesmas_id').append('<option value="semua">Semua</option>');
                $.ajax({
                    url: "{{ url('list/puskesmas') }}",
                    type: 'GET',
                    success: function(response) {
                        response.data.map((data) => {
                            $('#puskesmas_id').append('<option value="' + data.id + '">' +
                                data
                                .nama + '</option>');
                        });
                    }
                })
            }

            let getPosyandu = () => {
                $('#posyandu_id').attr('disabled', false)
                $('#posyandu_id').html('');
                $('#posyandu_id').append('<option value="">--Pilih Salah Satu--</option>');
                $('#posyandu_id').append('<option value="semua">Semua</option>');
                $.ajax({
                    url: "{{ url('list/posyandu') }}",
                    type: 'GET',
                    data: {
                        'puskesmas': $('#puskesmas_id').val(),
                    },
                    success: function(response) {
                        response.data.map((data) => {
                            $('#posyandu_id').append('<option value="' + data.id + '">' +
                                data
                                .nama + '</option>');
                        });
                    }
                })
            }

            $('#puskesmas_id').change(function() {
                getPosyandu();
            })

            $('#desa_id').change(function() {
                if (tab != 'tabel') {
                    getJumlahData();
                }
            })
        </script>
    @endpush
