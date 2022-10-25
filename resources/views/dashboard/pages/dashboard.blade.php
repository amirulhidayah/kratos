@extends('dashboard.layouts.main')

@section('title')
    Dashboard
@endsection

@section('titlePanelHeader')
    Dashboard
@endsection

@section('subTitlePanelHeader')
    {{-- <p style="font-size: 15px">Tahun :
        @php
            if ($tahun != '' && $tahun != 'Semua') {
                echo $tahun;
            } else {
                echo 'Semua';
            }
        @endphp
    </p> --}}
@endsection

@section('buttonPanelHeader')
    <button class="btn btn-secondary btn-round" data-toggle="modal" data-target="#modal-filter"><i class="fas fa-filter"></i>
        Filter</button>
@endsection

@push('styles')
    <style>
        .circles-text {
            font-size: 15px;
        }
    </style>
@endpush

@section('contents')
    <div class="row">
        <div class="col-md-9">
            <div class="row">
                {{-- @if (!($totalMenungguKonfirmasiPerencanaanKeong == 0 && $totalMenungguKonfirmasiPerencanaanManusia == 0 && $totalMenungguKonfirmasiPerencanaanHewan == 0 && $totalMenungguKonfirmasiRealisasiKeong == 0 && $totalMenungguKonfirmasiRealisasiManusia == 0 && $totalMenungguKonfirmasiRealisasiManusia == 0 && $totalPerencanaanKeongTidakTerselesaikan == 0 && $totalPerencanaanManusiaTidakTerselesaikan == 0 && $totalPerencanaanHewanTidakTerselesaikan == 0))
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-head-row">
                                <div class="card-title fw-bold text-primary"><i class="icon-bell"></i> Pemberitahuan
                                </div>

                            </div>
                        </div>
                        <div class="card-body">
                            <div class="alert alert-secondary {{ $totalPerencanaanKeongTidakTerselesaikan == 0 ? 'd-none' : '' }}"
                                role="alert">
                                <div class="row">
                                    <div class="col-10 pr-0">
                                        <span>
                                            <b>Perencanaan Habitat Keong:</b> Terdapat
                                            <b>{{ $totalPerencanaanKeongTidakTerselesaikan }}</b>
                                            perencanaan yang
                                            {{ Auth::user()->role == 'OPD'
                                                ? ' belum diselesaikan pada tahun sebelumnya dan belum ditambahkan alasan mengapa tidak di selesaikan. Silahkan tambahkan alasan mengapa tidak menyelesaikannya'
                                                : ' memberikan informasi mengenai alasan mengapa tidak menyelesaikan perencanaan tersebut pada tahun sebelumnya' }}.
                                        </span>
                                    </div>
                                    <div class="col-2 d-flex align-items-center pl-0">
                                        <a href="{{ url('rencana-intervensi-keong') }}"
                                            class="badge badge-secondary float-right"><i class="fas fa-info-circle"></i>
                                            Lihat
                                        </a>

                                    </div>
                                </div>
                            </div>
                            <div class="alert alert-secondary {{ $totalPerencanaanManusiaTidakTerselesaikan == 0 ? 'd-none' : '' }}"
                                role="alert">
                                <div class="row">
                                    <div class="col-10 pr-0">
                                        <span>
                                            <b>Perencanaan Manusia:</b> Terdapat
                                            <b>{{ $totalPerencanaanManusiaTidakTerselesaikan }}</b>
                                            perencanaan yang
                                            {{ Auth::user()->role == 'OPD'
                                                ? ' belum diselesaikan pada tahun sebelumnya dan belum ditambahkan alasan mengapa tidak di selesaikan. Silahkan tambahkan alasan mengapa tidak menyelesaikannya'
                                                : ' memberikan informasi mengenai alasan mengapa tidak menyelesaikan perencanaan tersebut pada tahun sebelumnya' }}.
                                        </span>
                                    </div>
                                    <div class="col-2 d-flex align-items-center pl-0">
                                        <a href="{{ url('rencana-intervensi-manusia') }}"
                                            class="badge badge-secondary float-right"><i class="fas fa-info-circle"></i>
                                            Lihat
                                        </a>

                                    </div>
                                </div>
                            </div>
                            <div class="alert alert-secondary {{ $totalPerencanaanHewanTidakTerselesaikan == 0 ? 'd-none' : '' }}"
                                role="alert">
                                <div class="row">
                                    <div class="col-10 pr-0">
                                        <span>
                                            <b>Perencanaan Lokasi Hewan Ternak:</b> Terdapat
                                            <b>{{ $totalPerencanaanHewanTidakTerselesaikan }}</b>
                                            perencanaan yang
                                            {{ Auth::user()->role == 'OPD'
                                                ? ' belum diselesaikan pada tahun sebelumnya dan belum ditambahkan alasan mengapa tidak di selesaikan. Silahkan tambahkan alasan mengapa tidak menyelesaikannya'
                                                : ' memberikan informasi mengenai alasan mengapa tidak menyelesaikan perencanaan tersebut pada tahun sebelumnya' }}.
                                        </span>
                                    </div>
                                    <div class="col-2 d-flex align-items-center pl-0">
                                        <a href="{{ url('rencana-intervensi-hewan') }}"
                                            class="badge badge-secondary float-right"><i class="fas fa-info-circle"></i>
                                            Lihat
                                        </a>

                                    </div>
                                </div>
                            </div>

                            <div class="alert alert-{{ Auth::user()->role == 'OPD' ? 'danger' : 'warning' }} {{ $totalMenungguKonfirmasiPerencanaanKeong == 0 ? 'd-none' : '' }}"
                                role="alert">
                                <div class="row">
                                    <div class="col-10 pr-0">
                                        <span>
                                            <b>Perencanaan Habitat Keong:</b> Terdapat
                                            <b>{{ $totalMenungguKonfirmasiPerencanaanKeong }}</b>
                                            perencanaan yang
                                            {{ Auth::user()->role == 'OPD' ? 'ditolak' : 'menunggu konfirmasi' }}.
                                            {{ Auth::user()->role == 'OPD' ? 'Silahkan ubah data tersebut dan kemudian perbarui datanya.' : '' }}
                                        </span>
                                    </div>
                                    <div class="col-2 d-flex align-items-center pl-0">
                                        <a href="{{ url('rencana-intervensi-keong') }}"
                                            class="badge badge-{{ Auth::user()->role == 'OPD' ? 'danger' : 'warning' }} float-right"><i
                                                class="fas fa-info-circle"></i>
                                            Lihat
                                        </a>

                                    </div>
                                </div>
                            </div>
                            <div class="alert alert-{{ Auth::user()->role == 'OPD' ? 'danger' : 'warning' }} {{ $totalMenungguKonfirmasiPerencanaanManusia == 0 ? 'd-none' : '' }}"
                                role="alert">
                                <div class="row">
                                    <div class="col-md-10 pr-0">
                                        <span>
                                            <b>Perencanaan Manusia:</b> Terdapat
                                            <b>{{ $totalMenungguKonfirmasiPerencanaanManusia }}</b>
                                            perencanaan yang
                                            {{ Auth::user()->role == 'OPD' ? 'ditolak' : 'menunggu konfirmasi' }}.
                                            {{ Auth::user()->role == 'OPD' ? 'Silahkan ubah data tersebut dan kemudian perbarui datanya.' : '' }}
                                        </span>
                                    </div>
                                    <div class="col-md-2 d-flex align-items-center pl-0">
                                        <a href="{{ url('rencana-intervensi-manusia') }}"
                                            class="badge badge-{{ Auth::user()->role == 'OPD' ? 'danger' : 'warning' }} float-right"><i
                                                class="fas fa-info-circle"></i>
                                            Lihat
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="alert alert-{{ Auth::user()->role == 'OPD' ? 'danger' : 'warning' }} {{ $totalMenungguKonfirmasiPerencanaanHewan == 0 ? 'd-none' : '' }}"
                                role="alert">
                                <div class="row">
                                    <div class="col-md-10 pr-0">
                                        <span>
                                            <b>Perencanaan Lokasi Hewan Ternak:</b> Terdapat
                                            <b>{{ $totalMenungguKonfirmasiPerencanaanHewan }}</b>
                                            perencanaan yang
                                            {{ Auth::user()->role == 'OPD' ? 'ditolak' : 'menunggu konfirmasi' }}.
                                            {{ Auth::user()->role == 'OPD' ? 'Silahkan ubah data tersebut dan kemudian perbarui datanya.' : '' }}
                                        </span>
                                    </div>
                                    <div class="col-md-2 d-flex align-items-center pl-0">
                                        <a href="{{ url('rencana-intervensi-hewan') }}"
                                            class="badge badge-{{ Auth::user()->role == 'OPD' ? 'danger' : 'warning' }} float-right"><i
                                                class="fas fa-info-circle"></i>
                                            Lihat
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="alert alert-{{ Auth::user()->role == 'OPD' ? 'danger' : 'warning' }} {{ $totalMenungguKonfirmasiRealisasiKeong == 0 ? 'd-none' : '' }}"
                                role="alert">
                                <div class="row">
                                    <div class="col-md-10 pr-0">
                                        <span>
                                            <b>Realisasi Habitat Keong:</b> Terdapat
                                            <b>{{ $totalMenungguKonfirmasiRealisasiKeong }}</b>
                                            laporan realisasi yang
                                            {{ Auth::user()->role == 'OPD' ? 'ditolak' : 'menunggu konfirmasi' }}.
                                            {{ Auth::user()->role == 'OPD' ? 'Silahkan ubah data tersebut dan kemudian perbarui datanya.' : '' }}
                                        </span>
                                    </div>
                                    <div class="col-md-2 d-flex align-items-center pl-0">
                                        <a href="{{ url('realisasi-intervensi-keong') }}"
                                            class="badge badge-{{ Auth::user()->role == 'OPD' ? 'danger' : 'warning' }} float-right"><i
                                                class="fas fa-info-circle"></i>
                                            Lihat
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="alert alert-{{ Auth::user()->role == 'OPD' ? 'danger' : 'warning' }} {{ $totalMenungguKonfirmasiRealisasiManusia == 0 ? 'd-none' : '' }}"
                                role="alert">
                                <div class="row">
                                    <div class="col-md-10 pr-0">
                                        <span>
                                            <b>Realisasi Manusia:</b> Terdapat
                                            <b>{{ $totalMenungguKonfirmasiRealisasiManusia }}</b>
                                            laporan realisasi yang
                                            {{ Auth::user()->role == 'OPD' ? 'ditolak' : 'menunggu konfirmasi' }}.
                                            {{ Auth::user()->role == 'OPD' ? 'Silahkan ubah data tersebut dan kemudian perbarui datanya.' : '' }}
                                        </span>
                                    </div>
                                    <div class="col-md-2 d-flex align-items-center pl-0">
                                        <a href="{{ url('realisasi-intervensi-manusia') }}"
                                            class="badge badge-{{ Auth::user()->role == 'OPD' ? 'danger' : 'warning' }} float-right"><i
                                                class="fas fa-info-circle"></i>
                                            Lihat
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="alert alert-{{ Auth::user()->role == 'OPD' ? 'danger' : 'warning' }} {{ $totalMenungguKonfirmasiRealisasiHewan == 0 ? 'd-none' : '' }}"
                                role="alert">
                                <div class="row">
                                    <div class="col-md-10 pr-0">
                                        <span>
                                            <b>Realisasi Lokasi Hewan Ternak:</b> Terdapat
                                            <b>{{ $totalMenungguKonfirmasiRealisasiHewan }}</b>
                                            laporan realisasi yang
                                            {{ Auth::user()->role == 'OPD' ? 'ditolak' : 'menunggu konfirmasi' }}.
                                            {{ Auth::user()->role == 'OPD' ? 'Silahkan ubah data tersebut dan kemudian perbarui datanya.' : '' }}
                                        </span>
                                    </div>
                                    <div class="col-md-2 d-flex align-items-center pl-0">
                                        <a href="{{ url('realisasi-intervensi-hewan') }}"
                                            class="badge badge-{{ Auth::user()->role == 'OPD' ? 'danger' : 'warning' }} float-right"><i
                                                class="fas fa-info-circle"></i>
                                            Lihat
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif --}}

                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-head-row">
                                <div class="card-title fw-bold">Intervensi</div>
                                <div class="card-tools">
                                    <button class="btn btn-info btn-border btn-round btn-sm mr-2" data-toggle="modal"
                                        data-target="#modal-intervensi">
                                        <i class="fas fa-info-circle"></i>
                                        @if (Auth::user()->role != 'OPD')
                                            Lihat Detail Per-OPD
                                        @else
                                            Lihat Detail
                                        @endif
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="card card-stats card-round">
                                            <div class="card-body">
                                                <div class="row align-items-center">
                                                    <div class="col-icon">
                                                        <div class="icon-big text-center icon-info bubble-shadow-small">
                                                            <i class="fas fa-list"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col col-stats ml-3 ml-sm-0">
                                                        <div class="numbers">
                                                            <p class="card-category">Perencanaan</p>
                                                            <h4 class="card-title">{{ $intervensi['perencanaan'] }}</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="card card-stats card-round">
                                            <div class="card-body">
                                                <div class="row align-items-center">
                                                    <div class="col-icon">
                                                        <div class="icon-big text-center icon-success bubble-shadow-small">
                                                            <i class="fas fa-tasks"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col col-stats ml-3 ml-sm-0">
                                                        <div class="numbers">
                                                            <p class="card-category">Realisasi</p>
                                                            <h4 class="card-title">{{ $intervensi['realisasi'] }}</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4 d-flex justify-content-center align-middle my-auto">
                                    <div class="px-2 pb-2 pb-md-0 text-center">
                                        <div id="persentase-realisasi"></div>
                                        <h6 class="fw-bold mt-3 mb-0">Persentase Realisasi</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-head-row">
                                <div class="card-title fw-bold">Anggaran Intervensi</div>
                                <div class="card-tools">
                                    <button class="btn btn-info btn-border btn-round btn-sm mr-2" data-toggle="modal"
                                        data-target="#modal-anggaran">
                                        <i class="fas fa-info-circle"></i>
                                        @if (Auth::user()->role != 'OPD')
                                            Lihat Detail Per-OPD
                                        @else
                                            Lihat Detail
                                        @endif
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4 col-md-4">
                                    <div class="card card-stats card-round">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-icon">
                                                    <div class="icon-big text-center icon-info bubble-shadow-small">
                                                        <i class="fas fa-list"></i>
                                                    </div>
                                                </div>
                                                <div class="col col-stats ml-3 ml-sm-0">
                                                    <div class="numbers">
                                                        <p class="card-category">Perencanaan</p>
                                                        <h4 class="card-title">
                                                            Rp.
                                                            {{ number_format($anggaranPerencanaan['anggaran'], 0, ',', '.') }}
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-4">
                                    <div class="card card-stats card-round">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-icon">
                                                    <div class="icon-big text-center icon-success bubble-shadow-small">
                                                        <i class="fas fa-tasks"></i>
                                                    </div>
                                                </div>
                                                <div class="col col-stats ml-3 ml-sm-0">
                                                    <div class="numbers">
                                                        <p class="card-category">Realisasi</p>
                                                        <h4 class="card-title">
                                                            Rp.
                                                            {{ number_format($penggunaanAnggaran['penggunaan'], 0, ',', '.') }}
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-4">
                                    <div class="card card-stats card-round">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-icon">
                                                    <div class="icon-big text-center icon-warning bubble-shadow-small">
                                                        <i class="fas fa-wallet"></i>
                                                    </div>
                                                </div>
                                                <div class="col col-stats ml-3 ml-sm-0">
                                                    <div class="numbers">
                                                        <p class="card-category">Sisa Anggaran</p>
                                                        <h4 class="card-title">
                                                            Rp.
                                                            {{ number_format($penggunaanAnggaran['sisa'], 0, ',', '.') }}
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="col-12 col-sm-6 col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5><b>Penggunaan Anggaran</b></h5>
                                            <hr>
                                            <div class="d-flex justify-content-between mt-2">
                                                <p class="text-muted mb-0">Habitat Keong</p>
                                                <p class="text-muted mb-0">Rp.
                                                    {{ number_format($penggunaanAnggaran['penggunaanKeong'], 0, ',', '.') }}
                                                </p>
                                            </div>
                                            <div class="d-flex justify-content-between mt-2">
                                                <p class="text-muted mb-0">Manusia</p>
                                                <p class="text-muted mb-0">Rp.
                                                    {{ number_format($penggunaanAnggaran['penggunaanManusia'], 0, ',', '.') }}
                                                </p>
                                            </div>
                                            <div class="d-flex justify-content-between mt-2">
                                                <p class="text-muted mb-0">Lokasi Hewan Ternak</p>
                                                <p class="text-muted mb-0">Rp.
                                                    {{ number_format($penggunaanAnggaran['penggunaanHewan'], 0, ',', '.') }}
                                                </p>
                                            </div>
                                            <hr>
                                            <div class="d-flex justify-content-between mt-2">
                                                <p class="text-muted mb-0">Total Penggunaan Anggaran</p>
                                                <p class="text-muted mb-0">Rp.
                                                    {{ number_format($penggunaanAnggaran['penggunaanHewan'] + $penggunaanAnggaran['penggunaanKeong'] + $penggunaanAnggaran['penggunaanManusia'], 0, ',', '.') }}
                                                </p>
                                            </div>
                                            <div class="d-flex justify-content-between mt-2">
                                                <p class="text-muted mb-0">Sisa Anggaran</p>
                                                <p class="text-muted mb-0">Rp.
                                                    {{ number_format($anggaranPerencanaan['anggaranHewan'] + $anggaranPerencanaan['anggaranKeong'] + $anggaranPerencanaan['anggaranManusia'] - ($penggunaanAnggaran['penggunaanHewan'] + $penggunaanAnggaran['penggunaanKeong'] + $penggunaanAnggaran['penggunaanManusia']), 0, ',', '.') }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5><b>Persentase Penggunaan Anggaran</b></h5>
                                            <hr>
                                            <div class="d-flex justify-content-center pb-2 pt-4 row">
                                                <div class="mt-2 col-4">
                                                    <div class="px-2 pb-2 pb-md-0 text-center">
                                                        <div id="penggunaan-keong"></div>
                                                        <h6 class="fw-bold mt-3 mb-0">Habitat Keong <br>
                                                            (Rp.
                                                            {{ number_format($penggunaanAnggaran['penggunaanKeong'], 0, ',', '.') }}
                                                            /
                                                            Rp.
                                                            {{ number_format($anggaranPerencanaan['anggaranKeong'], 0, ',', '.') }})
                                                        </h6>
                                                    </div>
                                                </div>
                                                <div class="mt-2 col-4">
                                                    <div class="px-2 pb-2 pb-md-0 text-center">
                                                        <div id="penggunaan-manusia"></div>
                                                        <h6 class="fw-bold mt-3 mb-0">Manusia <br>
                                                            (Rp.
                                                            {{ number_format($penggunaanAnggaran['penggunaanManusia'], 0, ',', '.') }}
                                                            /
                                                            Rp.
                                                            {{ number_format($anggaranPerencanaan['anggaranManusia'], 0, ',', '.') }})
                                                        </h6>
                                                    </div>
                                                </div>
                                                <div class="mt-2 col-4">
                                                    <div class="px-2 pb-2 pb-md-0 text-center">
                                                        <div id="penggunaan-hewan"></div>
                                                        <h6 class="fw-bold mt-3 mb-0">Lokasi Hewan Ternak <br>
                                                            (Rp.
                                                            {{ number_format($penggunaanAnggaran['penggunaanHewan'], 0, ',', '.') }}
                                                            /
                                                            Rp.
                                                            {{ number_format($anggaranPerencanaan['anggaranHewan'], 0, ',', '.') }})
                                                        </h6>
                                                    </div>
                                                </div>
                                                <div class="mt-5 col-6">
                                                    <div class="px-2 pb-2 pb-md-0 text-center">
                                                        <div id="penggunaan-total"></div>
                                                        <h6 class="fw-bold mt-3 mb-0">Total Persentase Penggunaan Anggaran
                                                            <br>
                                                            (Rp.
                                                            {{ number_format($penggunaanAnggaran['penggunaanHewan'] + $penggunaanAnggaran['penggunaanKeong'] + $penggunaanAnggaran['penggunaanManusia'], 0, ',', '.') }}
                                                            / Rp.
                                                            {{ number_format($anggaranPerencanaan['anggaranHewan'] + $anggaranPerencanaan['anggaranKeong'] + $anggaranPerencanaan['anggaranManusia'], 0, ',', '.') }}
                                                            )
                                                        </h6>
                                                    </div>
                                                </div>
                                                <div class="mt-5 col-6">
                                                    <div class="px-2 pb-2 pb-md-0 text-center">
                                                        <div id="penggunaan-sisa"></div>
                                                        <h6 class="fw-bold mt-3 mb-0">Sisa Anggaran
                                                            <br>
                                                            (Rp.
                                                            {{ number_format($anggaranPerencanaan['anggaranHewan'] + $anggaranPerencanaan['anggaranKeong'] + $anggaranPerencanaan['anggaranManusia'] - ($penggunaanAnggaran['penggunaanHewan'] + $penggunaanAnggaran['penggunaanKeong'] + $penggunaanAnggaran['penggunaanManusia']), 0, ',', '.') }}
                                                            / Rp.
                                                            {{ number_format($anggaranPerencanaan['anggaranHewan'] + $anggaranPerencanaan['anggaranKeong'] + $anggaranPerencanaan['anggaranManusia'], 0, ',', '.') }})
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                            <div class="row justify-content-between">
                                <div class="mt-5 col-6">
                                    <div class="px-2 pb-2 pb-md-0 text-center">
                                        <div id="penggunaan-anggaran"></div>
                                        <h6 class="fw-bold mt-3 mb-0">Total Persentase Penggunaan Anggaran
                                            <br>
                                            (Rp.
                                            {{ number_format($penggunaanAnggaran['penggunaan'], 0, ',', '.') }}
                                            / Rp.
                                            {{ number_format($anggaranPerencanaan['anggaran'], 0, ',', '.') }}
                                            )
                                        </h6>
                                    </div>
                                </div>
                                <div class="mt-5 col-6">
                                    <div class="px-2 pb-2 pb-md-0 text-center">
                                        <div id="sisa-anggaran"></div>
                                        <h6 class="fw-bold mt-3 mb-0">Total Persentase Sisa Anggaran
                                            <br>
                                            (Rp.
                                            {{ number_format($penggunaanAnggaran['sisa'], 0, ',', '.') }}
                                            / Rp.
                                            {{ number_format($anggaranPerencanaan['anggaran'], 0, ',', '.') }}
                                            )
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-3">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-head-row">
                                <div class="card-title fw-bold">Total Data</div>
                            </div>
                        </div>
                        <div class="card-body px-4">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12">
                                    <div class="card card-stats card-primary card-round">
                                        <div class="card-body ">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="icon-big text-center">
                                                        <i class="fas fa-user-friends"></i>
                                                    </div>
                                                </div>
                                                <div class="col-8 col-stats">
                                                    <div class="numbers">
                                                        <p class="card-category">Orang Tua</p>
                                                        <h4 class="card-title">{{ $totalData['orangTua'] }}</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12">
                                    <div class="card card-stats card-success card-round">
                                        <div class="card-body ">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="icon-big text-center">
                                                        <i class="fas fa-child"></i>
                                                    </div>
                                                </div>
                                                <div class="col-8 col-stats">
                                                    <div class="numbers">
                                                        <p class="card-category">Anak</p>
                                                        <h4 class="card-title">{{ $totalData['anak'] }}</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12">
                                    <div class="card card-stats card-warning card-round">
                                        <div class="card-body ">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="icon-big text-center">
                                                        <i class="fas fa-hospital"></i>
                                                    </div>
                                                </div>
                                                <div class="col-8 col-stats">
                                                    <div class="numbers">
                                                        <p class="card-category">PUSKESMAS</p>
                                                        <h4 class="card-title">{{ $totalData['puskesmas'] }}</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12">
                                    <div class="card card-stats card-danger card-round">
                                        <div class="card-body ">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="icon-big text-center">
                                                        <i class="fas fa-hospital"></i>
                                                    </div>
                                                </div>
                                                <div class="col-8 col-stats">
                                                    <div class="numbers">
                                                        <p class="card-category">POSYANDU</p>
                                                        <h4 class="card-title">{{ $totalData['posyandu'] }}</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12">
                                    <div class="card card-stats card-primary card-round">
                                        <div class="card-body ">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="icon-big text-center">
                                                        <i class="fas fa-tasks"></i>
                                                    </div>
                                                </div>
                                                <div class="col-8 col-stats">
                                                    <div class="numbers">
                                                        <p class="card-category">Indikator</p>
                                                        <h4 class="card-title">{{ $totalData['indikator'] }}</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12">
                                    <div class="card card-stats card-success card-round">
                                        <div class="card-body ">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="icon-big text-center">
                                                        <i class="fas fa-building"></i>
                                                    </div>
                                                </div>
                                                <div class="col-8 col-stats">
                                                    <div class="numbers">
                                                        <p class="card-category">OPD</p>
                                                        <h4 class="card-title">{{ $totalData['opd'] }}</h4>
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

    <!-- Modal -->
    <div class="modal fade" id="modal-intervensi" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        @if (Auth::user()->role != 'OPD')
                            Detail Intervensi Per-OPD
                        @else
                            Detail Intervensi
                        @endif
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div style="overflow: auto">
                        <table class="table table-bordered mt-3">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">No.</th>
                                    <th scope="col">OPD</th>
                                    <th scope="col">Perencanaan</th>
                                    <th scope="col">Realisasi</th>
                                    <th scope="col">Persentase Realisasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tabel['tabel'] as $tbl)
                                    <tr>
                                        <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                                        <td>{{ $tbl['opd'] }}</td>
                                        <td class="text-center">{{ $tbl['perencanaan'] }}</td>
                                        <td class="text-center">{{ $tbl['realisasi'] }}</td>
                                        <td class="text-center">
                                            {{ $tbl['persentase'] . '%' }}</td>
                                    </tr>
                                @endforeach
                                @if (Auth::user()->role != 'OPD')
                                    <tr>
                                        <th scope="row" colspan="2" class="text-center">Total</th>
                                        <td class="text-center">{{ $tabel['total']['totalPerencanaan'] }}</td>
                                        <td class="text-center">{{ $tabel['total']['totalRealisasi'] }}</td>
                                        <td class="text-center">
                                            {{ $tabel['total']['totalPersen'] }}
                                            %
                                        </td>
                                    </tr>
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    @component('dashboard.components.buttons.close')
                    @endcomponent
                    <form action="{{ url('/dashboard/export/intervensi') }}" method="POST" id="form-export-intervensi">
                        @csrf
                        <button class="btn btn-primary" type="submit" name="tahun"
                            value="{{ $_GET['tahun'] ?? '' }}"><i class="fas fa-file-download"></i> Export</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-anggaran" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        @if (Auth::user()->role != 'OPD')
                            Detail Anggaran Per-OPD
                        @else
                            Detail Anggaran
                        @endif
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div style="overflow: auto">
                        <table class="table table-bordered mt-3">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col" rowspan="2">No.</th>
                                    <th scope="col" rowspan="2">OPD</th>
                                    <th scope="col" colspan="{{ count($daftarSumberDana) + 1 }}">Nilai
                                        Anggaran</th>
                                    <th scope="col" colspan="{{ count($daftarSumberDana) + 1 }}">Penggunaan
                                        Anggaran</th>
                                    <th scope="col" colspan="{{ count($daftarSumberDana) + 1 }}">Persentase
                                        Penggunaan Anggaran</th>
                                    <th scope="col" colspan="{{ count($daftarSumberDana) + 1 }}">Sisa Anggaran
                                    </th>
                                </tr>
                                <tr class="text-center">
                                    @foreach ($daftarSumberDana as $sumberDana)
                                        <th scope="col">{{ $sumberDana->nama }}</th>
                                    @endforeach
                                    <th scope="col">Total</th>
                                    @foreach ($daftarSumberDana as $sumberDana)
                                        <th scope="col">{{ $sumberDana->nama }}</th>
                                    @endforeach
                                    <th scope="col">Total</th>
                                    @foreach ($daftarSumberDana as $sumberDana)
                                        <th scope="col">{{ $sumberDana->nama }}</th>
                                    @endforeach
                                    <th scope="col">Total</th>
                                    @foreach ($daftarSumberDana as $sumberDana)
                                        <th scope="col">{{ $sumberDana->nama }}</th>
                                    @endforeach
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tabelAnggaran['tabel'] as $anggaran)
                                    <tr>
                                        <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                                        <td class="text-nowrap">{{ $anggaran['opd'] }}</td>
                                        @foreach ($anggaran['perencanaan'] as $perencanaan)
                                            <td class="text-center text-nowrap">
                                                Rp.
                                                {{ number_format($perencanaan['perencanaan'], 0, ',', '.') }}
                                            </td>
                                        @endforeach
                                        <td class="text-center text-nowrap">
                                            Rp.
                                            {{ number_format($anggaran['totalPerencanaan'], 0, ',', '.') }}
                                        </td>
                                        @foreach ($anggaran['realisasi'] as $realisasi)
                                            <td class="text-center text-nowrap">
                                                Rp.
                                                {{ number_format($realisasi['realisasi'], 0, ',', '.') }}
                                            </td>
                                        @endforeach
                                        <td class="text-center text-nowrap">
                                            Rp.
                                            {{ number_format($anggaran['totalRealisasi'], 0, ',', '.') }}
                                        </td>
                                        @foreach ($anggaran['persentase'] as $persentase)
                                            <td class="text-center text-nowrap">
                                                {{ $persentase['persentase'] }}%
                                            </td>
                                        @endforeach
                                        <td class="text-center text-nowrap">
                                            {{ $anggaran['totalPersentase'] }}%
                                        </td>
                                        @foreach ($anggaran['sisaAnggaran'] as $sisaAnggaran)
                                            <td class="text-center text-nowrap">
                                                Rp.{{ number_format($sisaAnggaran['sisa_anggaran'], 0, ',', '.') }}
                                            </td>
                                        @endforeach
                                        <td class="text-center text-nowrap">
                                            Rp.{{ number_format($anggaran['totalSisaAnggaran'], 0, ',', '.') }}
                                        </td>
                                    </tr>
                                @endforeach
                                @if (Auth::user()->role != 'OPD')
                                    <tr class="fw-bold text-nowrap">
                                        <th scope="row" colspan="2" class="text-center">Total</th>
                                        @foreach ($tabelAnggaran['total']['totalArrayPerencanaan'] as $perencanaan)
                                            <td class="text-center">Rp.
                                                {{ number_format($perencanaan['perencanaan'], 0, ',', '.') }}
                                            </td>
                                        @endforeach
                                        <td class="text-center">Rp.
                                            {{ number_format($tabelAnggaran['total']['totalSeluruhPerencanaan'], 0, ',', '.') }}
                                        </td>
                                        @foreach ($tabelAnggaran['total']['totalArrayRealisasi'] as $realisasi)
                                            <td class="text-center">Rp.
                                                {{ number_format($realisasi['realisasi'], 0, ',', '.') }}
                                            </td>
                                        @endforeach
                                        <td class="text-center">Rp.
                                            {{ number_format($tabelAnggaran['total']['totalSeluruhRealisasi'], 0, ',', '.') }}
                                        </td>
                                        @foreach ($tabelAnggaran['total']['totalArrayPersentase'] as $persentase)
                                            <td class="text-center">
                                                {{ $persentase['persentase'] }}%
                                            </td>
                                        @endforeach
                                        <td class="text-center">
                                            {{ $tabelAnggaran['total']['totalSeluruhPersentase'] }}%
                                        </td>
                                        @foreach ($tabelAnggaran['total']['totalArraySisaAnggaran'] as $sisaAnggaran)
                                            <td class="text-center">Rp.
                                                {{ number_format($sisaAnggaran['sisa_anggaran'], 0, ',', '.') }}
                                            </td>
                                        @endforeach
                                        <td class="text-center">Rp.
                                            {{ number_format($tabelAnggaran['total']['totalSeluruhSisaAnggaran'], 0, ',', '.') }}
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    @component('dashboard.components.buttons.close')
                    @endcomponent
                    <form action="{{ url('/dashboard/export/anggaran') }}" method="POST" id="form-export-anggaran">
                        @csrf
                        <button class="btn btn-primary" type="submit" name="tahun"
                            value="{{ $_GET['tahun'] ?? '' }}"><i class="fas fa-file-download"></i> Export</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <form action="" method="GET">
        <div class="modal fade" id="modal-filter" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Filter Dashboard</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @component('dashboard.components.formElements.select',
                            [
                                'label' => 'Tahun',
                                'id' => 'tahun',
                                'name' => 'tahun',
                                'class' => 'select2',
                                'wajib' => '<sup class="text-danger">*</sup>',
                            ])
                            @slot('options')
                                <option value="Semua">Semua</option>
                                @foreach ($daftarTahun as $tahun)
                                    <option value="{{ $tahun }}" {{ ($_GET['tahun'] ?? '') == $tahun ? 'selected' : '' }}>
                                        {{ $tahun }}</option>
                                @endforeach
                            @endslot
                        @endcomponent
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-border" data-dismiss="modal">Keluar</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-filter"></i> Filter</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('scripts')
    <script>
        Circles.create({
            id: 'sisa-anggaran',
            radius: 90,
            value: "{{ $penggunaanAnggaran['persenSisa'] }}",
            maxValue: 100,
            width: 30,
            text: "{{ $penggunaanAnggaran['persenSisa'] . ' %' }}",
            colors: ['#f1f1f1', '#2BB930'],
            duration: 400,
            wrpClass: 'circles-wrp',
            textClass: 'circles-text',
            styleWrapper: true,
            styleText: true
        })

        Circles.create({
            id: 'persentase-realisasi',
            radius: 90,
            value: "{{ $intervensi['persentase'] }}",
            maxValue: 100,
            width: 30,
            text: "{{ $intervensi['persentase'] . ' %' }}",
            colors: ['#f1f1f1', '#2BB930'],
            duration: 400,
            wrpClass: 'circles-wrp',
            textClass: 'circles-text',
            styleWrapper: true,
            styleText: true
        })

        Circles.create({
            id: 'penggunaan-anggaran',
            radius: 90,
            value: "{{ $penggunaanAnggaran['persenTotal'] }}",
            maxValue: 100,
            width: 30,
            text: "{{ $penggunaanAnggaran['persenTotal'] . ' %' }}",
            colors: ['#f1f1f1', '#2BB930'],
            duration: 400,
            wrpClass: 'circles-wrp',
            textClass: 'circles-text',
            styleWrapper: true,
            styleText: true
        })
    </script>

    <script>
        $('.select2').select2({
            placeholder: "Semua",
            theme: "bootstrap",
            width: '100%'
        })
    </script>

    <script>
        $('.circles-text').css('font-size', '15px');
        $('.circles-text').css('font-weight', 'bold');
        $('#nav-dashboard').addClass('active');
    </script>
@endpush
