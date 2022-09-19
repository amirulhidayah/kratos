@extends('dashboard.layouts.main')

@section('title')
    Dashboard
@endsection

@section('titlePanelHeader')
    Dashboard
@endsection

@section('subTitlePanelHeader')
    <p style="font-size: 15px">Tahun :
        @php
            if ($tahun != '' && $tahun != 'Semua') {
                echo $tahun;
            } else {
                echo 'Semua';
            }
        @endphp
    </p>
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
                @if (!(
                    $totalMenungguKonfirmasiPerencanaanKeong == 0 &&
                    $totalMenungguKonfirmasiPerencanaanManusia == 0 &&
                    $totalMenungguKonfirmasiPerencanaanHewan == 0 &&
                    $totalMenungguKonfirmasiRealisasiKeong == 0 &&
                    $totalMenungguKonfirmasiRealisasiManusia == 0 &&
                    $totalMenungguKonfirmasiRealisasiManusia == 0 &&
                    $totalPerencanaanKeongTidakTerselesaikan == 0 &&
                    $totalPerencanaanManusiaTidakTerselesaikan == 0 &&
                    $totalPerencanaanHewanTidakTerselesaikan == 0
                ))
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

                                {{-- Batas --}}
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
                @endif

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
                                <div class="col-12 col-sm-6 col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5><b>Perencanaan</b></h5>
                                            <hr>
                                            <div class="d-flex justify-content-between mt-2">
                                                <p class="text-muted mb-0">Habitat Keong</p>
                                                <p class="text-muted mb-0">{{ $intervensi['perencanaanKeong'] }}</p>
                                            </div>
                                            <div class="d-flex justify-content-between mt-2">
                                                <p class="text-muted mb-0">Manusia</p>
                                                <p class="text-muted mb-0">{{ $intervensi['perencanaanManusia'] }}</p>
                                            </div>
                                            <div class="d-flex justify-content-between mt-2">
                                                <p class="text-muted mb-0">Lokasi Hewan Ternak</p>
                                                <p class="text-muted mb-0">{{ $intervensi['perencanaanHewan'] }}</p>
                                            </div>
                                            <hr>
                                            <div class="d-flex justify-content-between mt-2">
                                                <p class="text-muted mb-0">Total Perencanaan</p>
                                                <p class="text-muted mb-0">
                                                    {{ $intervensi['perencanaanKeong'] + $intervensi['perencanaanHewan'] + $intervensi['perencanaanManusia'] }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5><b>Realisasi</b></h5>
                                            <hr>
                                            <div class="d-flex justify-content-between mt-2">
                                                <p class="text-muted mb-0">Habitat Keong</p>
                                                <p class="text-muted mb-0">{{ $intervensi['realisasiKeong'] }}</p>
                                            </div>
                                            <div class="d-flex justify-content-between mt-2">
                                                <p class="text-muted mb-0">Manusia</p>
                                                <p class="text-muted mb-0">{{ $intervensi['realisasiManusia'] }}</p>
                                            </div>
                                            <div class="d-flex justify-content-between mt-2">
                                                <p class="text-muted mb-0">Lokasi Hewan Ternak</p>
                                                <p class="text-muted mb-0">{{ $intervensi['realisasiHewan'] }}</p>
                                            </div>
                                            <hr>
                                            <div class="d-flex justify-content-between mt-2">
                                                <p class="text-muted mb-0">Total Realisasi</p>
                                                <p class="text-muted mb-0">
                                                    {{ $intervensi['realisasiKeong'] + $intervensi['realisasiManusia'] + $intervensi['realisasiHewan'] }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5><b>Persentase Realisasi</b></h5>
                                            <hr>
                                            <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                                                <div class="d-flex justify-content-between mt-2">
                                                    <div class="px-2 pb-2 pb-md-0 text-center">
                                                        <div id="realisasi-keong"></div>
                                                        <h6 class="fw-bold mt-3 mb-0">Habitat Keong</h6>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-between mt-2">
                                                    <div class="px-2 pb-2 pb-md-0 text-center">
                                                        <div id="realisasi-manusia"></div>
                                                        <h6 class="fw-bold mt-3 mb-0">Manusia</h6>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-between mt-2">
                                                    <div class="px-2 pb-2 pb-md-0 text-center">
                                                        <div id="realisasi-hewan"></div>
                                                        <h6 class="fw-bold mt-3 mb-0">Lokasi Hewan Ternak</h6>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-between mt-2">
                                                    <div class="px-2 pb-2 pb-md-0 text-center">
                                                        <div id="realisasi-total"></div>
                                                        <h6 class="fw-bold mt-3 mb-0">Total Persentase Realisasi</h6>
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
                                <div class="col-12 col-sm-6 col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5><b>Nilai Anggaran</b></h5>
                                            <hr>
                                            <div class="d-flex justify-content-between mt-2">
                                                <p class="text-muted mb-0">Habitat Keong</p>
                                                <p class="text-muted mb-0">Rp.
                                                    {{ number_format($anggaranPerencanaan['anggaranKeong'], 0, ',', '.') }}
                                                </p>
                                            </div>
                                            <div class="d-flex justify-content-between mt-2">
                                                <p class="text-muted mb-0">Manusia</p>
                                                <p class="text-muted mb-0">Rp.
                                                    {{ number_format($anggaranPerencanaan['anggaranManusia'], 0, ',', '.') }}
                                                </p>
                                            </div>
                                            <div class="d-flex justify-content-between mt-2">
                                                <p class="text-muted mb-0">Lokasi Hewan Ternak</p>
                                                <p class="text-muted mb-0">Rp.
                                                    {{ number_format($anggaranPerencanaan['anggaranHewan'], 0, ',', '.') }}
                                                </p>
                                            </div>
                                            <hr>
                                            <div class="d-flex justify-content-between mt-2">
                                                <p class="text-muted mb-0">Total Anggaran</p>
                                                <p class="text-muted mb-0">Rp.
                                                    {{ number_format($anggaranPerencanaan['anggaranHewan'] + $anggaranPerencanaan['anggaranKeong'] + $anggaranPerencanaan['anggaranManusia'], 0, ',', '.') }}
                                                </p>
                                            </div>
                                            <div class="d-flex justify-content-between mt-2">
                                                <p class="text-muted mb-0">&nbsp;</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-6">
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
                                <div class="card-title fw-bold">Lokasi</div>
                                {{-- <div class="card-tools">
                            @component('dashboard.components.buttons.export')
                            @endcomponent
                        </div> --}}
                            </div>
                        </div>
                        <div class="card-body px-4">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12">
                                    <div class="card card-stats card-success card-round">
                                        <div class="card-body ">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="icon-big text-center">
                                                        <i class="far fa-map"></i>
                                                    </div>
                                                </div>
                                                <div class="col-8 col-stats">
                                                    <div class="numbers">
                                                        <p class="card-category">Desa</p>
                                                        <h4 class="card-title">{{ $lokasi['desa'] }}</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12">
                                    <div class="card card-stats card-secondary card-round">
                                        <div class="card-body ">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="icon-big text-center">
                                                        <i class="fas fa-map-pin"></i>
                                                    </div>
                                                </div>
                                                <div class="col-8 col-stats">
                                                    <div class="numbers">
                                                        <p class="card-category">Habitat Keong</p>
                                                        <h4 class="card-title">{{ $lokasi['lokasiKeong'] }}</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12">
                                    <div class="card card-stats card-info card-round">
                                        <div class="card-body ">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="icon-big text-center">
                                                        <i class="fas fa-paw"></i>
                                                    </div>
                                                </div>
                                                <div class="col-8 col-stats">
                                                    <div class="numbers">
                                                        <p class="card-category">Lokasi Hewan Ternak</p>
                                                        <h4 class="card-title">{{ $lokasi['lokasiHewan'] }}</h4>
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
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-head-row">
                                <div class="card-title fw-bold">Total Hewan Ternak</div>
                                {{-- <div class="card-tools">
                            @component('dashboard.components.buttons.export')
                            @endcomponent
                        </div> --}}
                            </div>
                        </div>
                        <div class="card-body px-4">
                            <div class="row">
                                @php
                                    $arrayWarna = ['success', 'danger', 'primary', 'warning', 'info'];
                                @endphp
                                @foreach ($totalHewan as $hewan)
                                    <div class="col-12 col-sm-12 col-md-12">
                                        <div
                                            class="card card-stats card-{{ $arrayWarna[$loop->index % count($arrayWarna)] }} card-round">
                                            <div class="card-body ">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="icon-big text-center">
                                                            <i class="fas fa-paw"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-8 col-stats">
                                                        <div class="numbers">
                                                            <p class="card-category">{{ $hewan['nama_hewan'] }}</p>
                                                            <h4 class="card-title">{{ $hewan['jumlah'] }}</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-head-row">
                                <div class="card-title fw-bold">Total Data</div>
                                {{-- <div class="card-tools">
                            @component('dashboard.components.buttons.export')
                            @endcomponent
                        </div> --}}
                            </div>
                        </div>
                        <div class="card-body px-4">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12">
                                    <div class="card card-stats card-danger card-round">
                                        <div class="card-body ">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="icon-big text-center">
                                                        <i class="fas fa-users"></i>
                                                    </div>
                                                </div>
                                                <div class="col-8 col-stats">
                                                    <div class="numbers">
                                                        <p class="card-category">Penduduk</p>
                                                        <h4 class="card-title">{{ $totalData['penduduk'] }}</h4>
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
                                                        <i class="fas fa-school"></i>
                                                    </div>
                                                </div>
                                                <div class="col-8 col-stats">
                                                    <div class="numbers">
                                                        <p class="card-category">Sekolah</p>
                                                        <h4 class="card-title">{{ $totalData['sekolah'] }}</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12">
                                    <div class="card card-stats card-info card-round">
                                        <div class="card-body ">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="icon-big text-center">
                                                        <i class="fas fa-graduation-cap"></i>
                                                    </div>
                                                </div>
                                                <div class="col-8 col-stats">
                                                    <div class="numbers">
                                                        <p class="card-category">Siswa Sekolah</p>
                                                        <h4 class="card-title">{{ $totalData['siswaSekolah'] }}</h4>
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
                    <ul class="nav nav-pills nav-secondary nav-pills-no-bd" id="pills-tab-without-border" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="tab-semua" data-toggle="pill" href="#content-semua"
                                role="tab" aria-controls="content-semua" aria-selected="false">Semua</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " id="tab-keong" data-toggle="pill" href="#content-keong" role="tab"
                                aria-controls="content-keong" aria-selected="true">Habitat Keong</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab-manusia" data-toggle="pill" href="#content-manusia"
                                role="tab" aria-controls="content-manusia" aria-selected="false">Manusia</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab-hewan" data-toggle="pill" href="#content-hewan" role="tab"
                                aria-controls="content-hewan" aria-selected="false">Lokasi Hewan Ternak</a>
                        </li>

                    </ul>
                    <div class="tab-content mt-2 mb-3" id="pills-without-border-tabContent">
                        <div class="tab-pane fade" id="content-keong" role="tabpanel"
                            aria-labelledby="pills-home-tab-nobd">
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
                                    @php
                                        $perencanaan = 0;
                                        $realisasi = 0;
                                        $persentase = 0;
                                    @endphp
                                    @foreach ($tabelKeong as $keong)
                                        <tr>
                                            <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                                            <td>{{ $keong['opd'] }}</td>
                                            <td class="text-center">{{ $keong['perencanaan'] }}</td>
                                            <td class="text-center">{{ $keong['realisasi'] }}</td>
                                            <td class="text-center">
                                                {{ $keong['persentase'] == '-' ? '-' : $keong['persentase'] . '%' }}</td>
                                        </tr>
                                        @php
                                            $perencanaan += $keong['perencanaan'];
                                            $realisasi += $keong['realisasi'];
                                        @endphp
                                    @endforeach
                                    @if (Auth::user()->role != 'OPD')
                                        <tr>
                                            <th scope="row" colspan="2" class="text-center">Total</th>
                                            <td class="text-center">{{ $perencanaan }}</td>
                                            <td class="text-center">{{ $realisasi }}</td>
                                            <td class="text-center">
                                                {{ $perencanaan == 0 ? 0 : round(($realisasi / $perencanaan) * 100, 2) }} %
                                            </td>
                                        </tr>
                                    @endif

                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="content-manusia" role="tabpanel"
                            aria-labelledby="pills-profile-tab-nobd">
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
                                    @php
                                        $perencanaan = 0;
                                        $realisasi = 0;
                                        $persentase = 0;
                                    @endphp
                                    @foreach ($tabelManusia as $manusia)
                                        <tr>
                                            <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                                            <td>{{ $manusia['opd'] }}</td>
                                            <td class="text-center">{{ $manusia['perencanaan'] }}</td>
                                            <td class="text-center">{{ $manusia['realisasi'] }}</td>
                                            <td class="text-center">
                                                {{ $manusia['persentase'] == '-' ? '-' : $manusia['persentase'] . '%' }}
                                            </td>
                                        </tr>
                                        @php
                                            $perencanaan += $manusia['perencanaan'];
                                            $realisasi += $manusia['realisasi'];
                                        @endphp
                                    @endforeach
                                    @if (Auth::user()->role != 'OPD')
                                        <tr>
                                            <th scope="row" colspan="2" class="text-center">Total</th>
                                            <td class="text-center">{{ $perencanaan }}</td>
                                            <td class="text-center">{{ $realisasi }}</td>
                                            <td class="text-center">
                                                {{ $perencanaan == 0 ? 0 : round(($realisasi / $perencanaan) * 100, 2) }}
                                                %
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="content-hewan" role="tabpanel"
                            aria-labelledby="pills-contact-tab-nobd">
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
                                    @php
                                        $perencanaan = 0;
                                        $realisasi = 0;
                                        $persentase = 0;
                                    @endphp
                                    @foreach ($tabelHewan as $hewan)
                                        <tr>
                                            <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                                            <td>{{ $hewan['opd'] }}</td>
                                            <td class="text-center">{{ $hewan['perencanaan'] }}</td>
                                            <td class="text-center">{{ $hewan['realisasi'] }}</td>
                                            <td class="text-center">
                                                {{ $hewan['persentase'] == '-' ? '-' : $hewan['persentase'] . '%' }}</td>
                                        </tr>
                                        @php
                                            $perencanaan += $hewan['perencanaan'];
                                            $realisasi += $hewan['realisasi'];
                                        @endphp
                                    @endforeach
                                    @if (Auth::user()->role != 'OPD')
                                        <tr>
                                            <th scope="row" colspan="2" class="text-center">Total</th>
                                            <td class="text-center">{{ $perencanaan }}</td>
                                            <td class="text-center">{{ $realisasi }}</td>
                                            <td class="text-center">
                                                {{ $perencanaan == 0 ? 0 : round(($realisasi / $perencanaan) * 100, 2) }}
                                                %
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade show active" id="content-semua" role="tabpanel"
                            aria-labelledby="pills-home-tab-nobd">
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
                                    @php
                                        $perencanaan = 0;
                                        $realisasi = 0;
                                    @endphp
                                    @foreach ($tabelKeong as $keong)
                                        @php
                                            $keongPersentase = 0;
                                            $manusiaPersentase = 0;
                                            $hewanPersentase = 0;
                                        @endphp
                                        <tr>
                                            <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                                            <td>{{ $keong['opd'] }}</td>
                                            <td class="text-center">
                                                {{ $keong['perencanaan'] + $tabelManusia[$loop->index]['perencanaan'] + $tabelHewan[$loop->index]['perencanaan'] }}
                                            </td>
                                            <td class="text-center">
                                                {{ $keong['realisasi'] + $tabelManusia[$loop->index]['realisasi'] + $tabelHewan[$loop->index]['realisasi'] }}
                                            </td>
                                            @php
                                                if ($keong['persentase'] != '-') {
                                                    $keongPersentase = $keong['persentase'];
                                                }
                                                
                                                if ($tabelManusia[$loop->index]['persentase'] != '-') {
                                                    $manusiaPersentase = $tabelManusia[$loop->index]['persentase'];
                                                }
                                                
                                                if ($tabelHewan[$loop->index]['persentase'] != '-') {
                                                    $hewanPersentase = $tabelHewan[$loop->index]['persentase'];
                                                }
                                            @endphp
                                            <td class="text-center">
                                                @if ($keong['perencanaan'] == 0)
                                                    -
                                                @else
                                                    {{ round((($keong['realisasi'] + $tabelManusia[$loop->index]['realisasi'] + $tabelHewan[$loop->index]['realisasi']) / ($keong['perencanaan'] + $tabelManusia[$loop->index]['perencanaan'] + $tabelHewan[$loop->index]['perencanaan'])) * 100, 2) }}
                                                    %
                                                @endif

                                            </td>
                                        </tr>
                                        @php
                                            $perencanaan += $keong['perencanaan'] + $tabelManusia[$loop->index]['perencanaan'] + $tabelHewan[$loop->index]['perencanaan'];
                                            $realisasi += $keong['realisasi'] + $tabelManusia[$loop->index]['realisasi'] + $tabelHewan[$loop->index]['realisasi'];
                                        @endphp
                                    @endforeach
                                    @if (Auth::user()->role != 'OPD')
                                        <tr>
                                            <th scope="row" colspan="2" class="text-center">Total</th>
                                            <td class="text-center">{{ $perencanaan }}</td>
                                            <td class="text-center">{{ $realisasi }}</td>
                                            <td class="text-center">
                                                {{ $perencanaan == 0 ? 0 : round(($realisasi / $perencanaan) * 100, 2) }}
                                                %
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    @component('dashboard.components.buttons.close')
                    @endcomponent
                    <form action="{{ url('/dashboard/export/intervensi/semua') }}" method="POST"
                        id="form-export-intervensi">
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
                    <ul class="nav nav-pills nav-secondary nav-pills-no-bd" id="pills-tab-without-border" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="tab-anggaran-semua" data-toggle="pill" href="#anggaran-semua"
                                role="tab" aria-controls="anggaran-semua" aria-selected="false">Semua</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab-anggaran-keong" data-toggle="pill" href="#anggaran-keong"
                                role="tab" aria-controls="anggaran-keong" aria-selected="true">Habitat Keong</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab-anggaran-manusia" data-toggle="pill" href="#anggaran-manusia"
                                role="tab" aria-controls="anggaran-manusia" aria-selected="false">Manusia</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab-anggaran-hewan" data-toggle="pill" href="#anggaran-hewan"
                                role="tab" aria-controls="anggaran-hewan" aria-selected="false">Lokasi Hewan
                                Ternak</a>
                        </li>

                    </ul>
                    <div class="tab-content mt-2 mb-3" id="pills-without-border-tabContent">
                        <div class="tab-pane fade" id="anggaran-keong" role="tabpanel"
                            aria-labelledby="pills-home-tab-nobd">
                            <div style="overflow: auto">
                                <table class="table table-bordered mt-3">
                                    <thead>
                                        <tr class="text-center">
                                            <th scope="col" rowspan="2">No.</th>
                                            <th scope="col" rowspan="2">OPD</th>
                                            <th scope="col" colspan="3">Nilai Anggaran</th>
                                            <th scope="col" colspan="3">Penggunaan Anggaran</th>
                                            <th scope="col" colspan="3">Persentase Penggunaan Anggaran</th>
                                            <th scope="col" colspan="3">Sisa Anggaran</th>
                                        </tr>
                                        <tr class="text-center">
                                            <th scope="col">DAU</th>
                                            <th scope="col">DAK</th>
                                            <th scope="col">Total</th>
                                            <th scope="col">DAU</th>
                                            <th scope="col">DAK</th>
                                            <th scope="col">Total</th>
                                            <th scope="col">DAU</th>
                                            <th scope="col">DAK</th>
                                            <th scope="col">Total</th>
                                            <th scope="col">DAU</th>
                                            <th scope="col">DAK</th>
                                            <th scope="col">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $perencanaanDau = 0;
                                            $perencanaanDak = 0;
                                            $perencanaan = 0;
                                            $realisasiDau = 0;
                                            $realisasiDak = 0;
                                            $realisasi = 0;
                                            $sisaDau = 0;
                                            $sisaDak = 0;
                                            $sisa = 0;
                                        @endphp
                                        @foreach ($tabelAnggaranKeong as $anggaranKeong)
                                            <tr>
                                                <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                                                <td class="text-nowrap">{{ $anggaranKeong['opd'] }}</td>
                                                <td class="text-center text-nowrap">
                                                    Rp. {{ number_format($anggaranKeong['perencanaanDau'], 0, ',', '.') }}
                                                </td>
                                                <td class="text-center text-nowrap">
                                                    Rp. {{ number_format($anggaranKeong['perencanaanDak'], 0, ',', '.') }}
                                                </td>
                                                <td class="text-center text-nowrap">
                                                    Rp. {{ number_format($anggaranKeong['perencanaan'], 0, ',', '.') }}
                                                </td>
                                                <td class="text-center text-nowrap">
                                                    Rp. {{ number_format($anggaranKeong['realisasiDau'], 0, ',', '.') }}
                                                </td>
                                                <td class="text-center text-nowrap">
                                                    Rp. {{ number_format($anggaranKeong['realisasiDak'], 0, ',', '.') }}
                                                </td>
                                                <td class="text-center text-nowrap">
                                                    Rp. {{ number_format($anggaranKeong['realisasi'], 0, ',', '.') }}</td>
                                                <td class="text-center text-nowrap">
                                                    {{ $anggaranKeong['persentaseDau'] == '-' ? '-' : $anggaranKeong['persentaseDau'] . ' %' }}
                                                </td>
                                                <td class="text-center text-nowrap">
                                                    {{ $anggaranKeong['persentaseDak'] == '-' ? '-' : $anggaranKeong['persentaseDak'] . ' %' }}
                                                </td>
                                                <td class="text-center text-nowrap">
                                                    {{ $anggaranKeong['persentase'] == '-' ? '-' : $anggaranKeong['persentase'] . ' %' }}
                                                </td>
                                                <td class="text-center text-nowrap">
                                                    Rp.
                                                    {{ number_format($anggaranKeong['perencanaanDau'] - $anggaranKeong['realisasiDau'], 0, ',', '.') }}
                                                </td>
                                                <td class="text-center text-nowrap">
                                                    Rp.
                                                    {{ number_format($anggaranKeong['perencanaanDak'] - $anggaranKeong['realisasiDak'], 0, ',', '.') }}
                                                </td>
                                                <td class="text-center text-nowrap">
                                                    Rp.
                                                    {{ number_format($anggaranKeong['perencanaan'] - $anggaranKeong['realisasi'], 0, ',', '.') }}
                                                </td>
                                            </tr>
                                            @php
                                                $perencanaanDau += $anggaranKeong['perencanaanDau'];
                                                $perencanaanDak += $anggaranKeong['perencanaanDak'];
                                                $perencanaan += $anggaranKeong['perencanaan'];
                                                $realisasiDau += $anggaranKeong['realisasiDau'];
                                                $realisasiDak += $anggaranKeong['realisasiDak'];
                                                $realisasi += $anggaranKeong['realisasi'];
                                                $sisaDau += $anggaranKeong['perencanaanDau'] - $anggaranKeong['realisasiDau'];
                                                $sisaDak += $anggaranKeong['perencanaanDak'] - $anggaranKeong['realisasiDak'];
                                                $sisa += $anggaranKeong['perencanaan'] - $anggaranKeong['realisasi'];
                                            @endphp
                                        @endforeach
                                        @if (Auth::user()->role != 'OPD')
                                            <tr class="fw-bold text-nowrap">
                                                <th scope="row" colspan="2" class="text-center">Total</th>
                                                <td class="text-center">Rp.
                                                    {{ number_format($perencanaanDau, 0, ',', '.') }}
                                                </td>
                                                <td class="text-center">Rp.
                                                    {{ number_format($perencanaanDak, 0, ',', '.') }}
                                                </td>
                                                <td class="text-center">Rp.
                                                    {{ number_format($perencanaan, 0, ',', '.') }}
                                                </td>
                                                <td class="text-center">Rp.
                                                    {{ number_format($realisasiDau, 0, ',', '.') }}
                                                </td>
                                                <td class="text-center">Rp.
                                                    {{ number_format($realisasiDak, 0, ',', '.') }}
                                                </td>
                                                <td class="text-center">Rp. {{ number_format($realisasi, 0, ',', '.') }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $perencanaanDau == 0 ? 0 : round(($realisasiDau / $perencanaanDau) * 100, 2) }}
                                                    %
                                                <td class="text-center">
                                                    {{ $perencanaanDak == 0 ? 0 : round(($realisasiDak / $perencanaanDak) * 100, 2) }}
                                                    %
                                                <td class="text-center">
                                                    {{ $perencanaan == 0 ? 0 : round(($realisasi / $perencanaan) * 100, 2) }}
                                                    %
                                                </td>
                                                <td class="text-center text-nowrap">Rp.
                                                    {{ number_format($sisaDau, 0, ',', '.') }}</td>
                                                <td class="text-center text-nowrap">Rp.
                                                    {{ number_format($sisaDak, 0, ',', '.') }}</td>
                                                <td class="text-center text-nowrap">Rp.
                                                    {{ number_format($sisa, 0, ',', '.') }}</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="anggaran-manusia" role="tabpanel"
                            aria-labelledby="pills-profile-tab-nobd">
                            <div style="overflow: auto">
                                <table class="table table-bordered mt-3">
                                    <thead>
                                        <tr class="text-center">
                                            <th scope="col" rowspan="2">No.</th>
                                            <th scope="col" rowspan="2">OPD</th>
                                            <th scope="col" colspan="3">Nilai Anggaran</th>
                                            <th scope="col" colspan="3">Penggunaan Anggaran</th>
                                            <th scope="col" colspan="3">Persentase Penggunaan Anggaran</th>
                                            <th scope="col" colspan="3">Sisa Anggaran</th>
                                        </tr>
                                        <tr class="text-center">
                                            <th scope="col">DAU</th>
                                            <th scope="col">DAK</th>
                                            <th scope="col">Total</th>
                                            <th scope="col">DAU</th>
                                            <th scope="col">DAK</th>
                                            <th scope="col">Total</th>
                                            <th scope="col">DAU</th>
                                            <th scope="col">DAK</th>
                                            <th scope="col">Total</th>
                                            <th scope="col">DAU</th>
                                            <th scope="col">DAK</th>
                                            <th scope="col">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $perencanaanDau = 0;
                                            $perencanaanDak = 0;
                                            $perencanaan = 0;
                                            $realisasiDau = 0;
                                            $realisasiDak = 0;
                                            $realisasi = 0;
                                            $sisaDau = 0;
                                            $sisaDak = 0;
                                            $sisa = 0;
                                        @endphp
                                        @foreach ($tabelAnggaranManusia as $anggaranManusia)
                                            <tr>
                                                <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                                                <td class="text-nowrap">{{ $anggaranManusia['opd'] }}</td>
                                                <td class="text-center text-nowrap">
                                                    Rp.
                                                    {{ number_format($anggaranManusia['perencanaanDau'], 0, ',', '.') }}
                                                </td>
                                                <td class="text-center text-nowrap">
                                                    Rp.
                                                    {{ number_format($anggaranManusia['perencanaanDak'], 0, ',', '.') }}
                                                </td>
                                                <td class="text-center text-nowrap">
                                                    Rp. {{ number_format($anggaranManusia['perencanaan'], 0, ',', '.') }}
                                                </td>
                                                <td class="text-center text-nowrap">
                                                    Rp. {{ number_format($anggaranManusia['realisasiDau'], 0, ',', '.') }}
                                                </td>
                                                <td class="text-center text-nowrap">
                                                    Rp. {{ number_format($anggaranManusia['realisasiDak'], 0, ',', '.') }}
                                                </td>
                                                <td class="text-center text-nowrap">
                                                    Rp. {{ number_format($anggaranManusia['realisasi'], 0, ',', '.') }}
                                                </td>
                                                <td class="text-center text-nowrap">
                                                    {{ $anggaranManusia['persentaseDau'] == '-' ? '-' : $anggaranManusia['persentaseDau'] . ' %' }}
                                                </td>
                                                <td class="text-center text-nowrap">
                                                    {{ $anggaranManusia['persentaseDak'] == '-' ? '-' : $anggaranManusia['persentaseDak'] . ' %' }}
                                                </td>
                                                <td class="text-center text-nowrap">
                                                    {{ $anggaranManusia['persentase'] == '-' ? '-' : $anggaranManusia['persentase'] . ' %' }}
                                                </td>
                                                <td class="text-center text-nowrap">
                                                    Rp.
                                                    {{ number_format($anggaranManusia['perencanaanDau'] - $anggaranManusia['realisasiDau'], 0, ',', '.') }}
                                                </td>
                                                <td class="text-center text-nowrap">
                                                    Rp.
                                                    {{ number_format($anggaranManusia['perencanaanDak'] - $anggaranManusia['realisasiDak'], 0, ',', '.') }}
                                                </td>
                                                <td class="text-center text-nowrap">
                                                    Rp.
                                                    {{ number_format($anggaranManusia['perencanaan'] - $anggaranManusia['realisasi'], 0, ',', '.') }}
                                                </td>
                                            </tr>
                                            @php
                                                $perencanaanDau += $anggaranManusia['perencanaanDau'];
                                                $perencanaanDak += $anggaranManusia['perencanaanDak'];
                                                $perencanaan += $anggaranManusia['perencanaan'];
                                                $realisasiDau += $anggaranManusia['realisasiDau'];
                                                $realisasiDak += $anggaranManusia['realisasiDak'];
                                                $realisasi += $anggaranManusia['realisasi'];
                                                $sisaDau += $anggaranManusia['perencanaanDau'] - $anggaranManusia['realisasiDau'];
                                                $sisaDak += $anggaranManusia['perencanaanDak'] - $anggaranManusia['realisasiDak'];
                                                $sisa += $anggaranManusia['perencanaan'] - $anggaranManusia['realisasi'];
                                            @endphp
                                        @endforeach
                                        @if (Auth::user()->role != 'OPD')
                                            <tr class="fw-bold text-nowrap">
                                                <th scope="row" colspan="2" class="text-center">Total</th>
                                                <td class="text-center">Rp.
                                                    {{ number_format($perencanaanDau, 0, ',', '.') }}
                                                </td>
                                                <td class="text-center">Rp.
                                                    {{ number_format($perencanaanDak, 0, ',', '.') }}
                                                </td>
                                                <td class="text-center">Rp.
                                                    {{ number_format($perencanaan, 0, ',', '.') }}
                                                </td>
                                                <td class="text-center">Rp.
                                                    {{ number_format($realisasiDau, 0, ',', '.') }}
                                                </td>
                                                <td class="text-center">Rp.
                                                    {{ number_format($realisasiDak, 0, ',', '.') }}
                                                </td>
                                                <td class="text-center">Rp. {{ number_format($realisasi, 0, ',', '.') }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $perencanaanDau == 0 ? 0 : round(($realisasiDau / $perencanaanDau) * 100, 2) }}
                                                    %
                                                <td class="text-center">
                                                    {{ $perencanaanDak == 0 ? 0 : round(($realisasiDak / $perencanaanDak) * 100, 2) }}
                                                    %
                                                <td class="text-center">
                                                    {{ $perencanaan == 0 ? 0 : round(($realisasi / $perencanaan) * 100, 2) }}
                                                    %
                                                </td>
                                                <td class="text-center text-nowrap">Rp.
                                                    {{ number_format($sisaDau, 0, ',', '.') }}</td>
                                                <td class="text-center text-nowrap">Rp.
                                                    {{ number_format($sisaDak, 0, ',', '.') }}</td>
                                                <td class="text-center text-nowrap">Rp.
                                                    {{ number_format($sisa, 0, ',', '.') }}</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="anggaran-hewan" role="tabpanel"
                            aria-labelledby="pills-contact-tab-nobd">
                            <div style="overflow: auto">
                                <table class="table table-bordered mt-3">
                                    <thead>
                                        <tr class="text-center">
                                            <th scope="col" rowspan="2">No.</th>
                                            <th scope="col" rowspan="2">OPD</th>
                                            <th scope="col" colspan="3">Nilai Anggaran</th>
                                            <th scope="col" colspan="3">Penggunaan Anggaran</th>
                                            <th scope="col" colspan="3">Persentase Penggunaan Anggaran</th>
                                            <th scope="col" colspan="3">Sisa Anggaran</th>
                                        </tr>
                                        <tr class="text-center">
                                            <th scope="col">DAU</th>
                                            <th scope="col">DAK</th>
                                            <th scope="col">Total</th>
                                            <th scope="col">DAU</th>
                                            <th scope="col">DAK</th>
                                            <th scope="col">Total</th>
                                            <th scope="col">DAU</th>
                                            <th scope="col">DAK</th>
                                            <th scope="col">Total</th>
                                            <th scope="col">DAU</th>
                                            <th scope="col">DAK</th>
                                            <th scope="col">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $perencanaanDau = 0;
                                            $perencanaanDak = 0;
                                            $perencanaan = 0;
                                            $realisasiDau = 0;
                                            $realisasiDak = 0;
                                            $realisasi = 0;
                                            $sisaDau = 0;
                                            $sisaDak = 0;
                                            $sisa = 0;
                                        @endphp
                                        @foreach ($tabelAnggaranHewan as $anggaranHewan)
                                            <tr>
                                                <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                                                <td class="text-nowrap">{{ $anggaranHewan['opd'] }}</td>
                                                <td class="text-center text-nowrap">
                                                    Rp. {{ number_format($anggaranHewan['perencanaanDau'], 0, ',', '.') }}
                                                </td>
                                                <td class="text-center text-nowrap">
                                                    Rp. {{ number_format($anggaranHewan['perencanaanDak'], 0, ',', '.') }}
                                                </td>
                                                <td class="text-center text-nowrap">
                                                    Rp. {{ number_format($anggaranHewan['perencanaan'], 0, ',', '.') }}
                                                </td>
                                                <td class="text-center text-nowrap">
                                                    Rp. {{ number_format($anggaranHewan['realisasiDau'], 0, ',', '.') }}
                                                </td>
                                                <td class="text-center text-nowrap">
                                                    Rp. {{ number_format($anggaranHewan['realisasiDak'], 0, ',', '.') }}
                                                </td>
                                                <td class="text-center text-nowrap">
                                                    Rp. {{ number_format($anggaranHewan['realisasi'], 0, ',', '.') }}</td>
                                                <td class="text-center text-nowrap">
                                                    {{ $anggaranHewan['persentaseDau'] == '-' ? '-' : $anggaranHewan['persentaseDau'] . ' %' }}
                                                </td>
                                                <td class="text-center text-nowrap">
                                                    {{ $anggaranHewan['persentaseDak'] == '-' ? '-' : $anggaranHewan['persentaseDak'] . ' %' }}
                                                </td>
                                                <td class="text-center text-nowrap">
                                                    {{ $anggaranHewan['persentase'] == '-' ? '-' : $anggaranHewan['persentase'] . ' %' }}
                                                </td>
                                                <td class="text-center text-nowrap">
                                                    Rp.
                                                    {{ number_format($anggaranHewan['perencanaanDau'] - $anggaranHewan['realisasiDau'], 0, ',', '.') }}
                                                </td>
                                                <td class="text-center text-nowrap">
                                                    Rp.
                                                    {{ number_format($anggaranHewan['perencanaanDak'] - $anggaranHewan['realisasiDak'], 0, ',', '.') }}
                                                </td>
                                                <td class="text-center text-nowrap">
                                                    Rp.
                                                    {{ number_format($anggaranHewan['perencanaan'] - $anggaranHewan['realisasi'], 0, ',', '.') }}
                                                </td>
                                            </tr>
                                            @php
                                                $perencanaanDau += $anggaranHewan['perencanaanDau'];
                                                $perencanaanDak += $anggaranHewan['perencanaanDak'];
                                                $perencanaan += $anggaranHewan['perencanaan'];
                                                $realisasiDau += $anggaranHewan['realisasiDau'];
                                                $realisasiDak += $anggaranHewan['realisasiDak'];
                                                $realisasi += $anggaranHewan['realisasi'];
                                                $sisaDau += $anggaranHewan['perencanaanDau'] - $anggaranHewan['realisasiDau'];
                                                $sisaDak += $anggaranHewan['perencanaanDak'] - $anggaranHewan['realisasiDak'];
                                                $sisa += $anggaranHewan['perencanaan'] - $anggaranHewan['realisasi'];
                                            @endphp
                                        @endforeach
                                        @if (Auth::user()->role != 'OPD')
                                            <tr class="fw-bold text-nowrap">
                                                <th scope="row" colspan="2" class="text-center">Total</th>
                                                <td class="text-center">Rp.
                                                    {{ number_format($perencanaanDau, 0, ',', '.') }}
                                                </td>
                                                <td class="text-center">Rp.
                                                    {{ number_format($perencanaanDak, 0, ',', '.') }}
                                                </td>
                                                <td class="text-center">Rp.
                                                    {{ number_format($perencanaan, 0, ',', '.') }}
                                                </td>
                                                <td class="text-center">Rp.
                                                    {{ number_format($realisasiDau, 0, ',', '.') }}
                                                </td>
                                                <td class="text-center">Rp.
                                                    {{ number_format($realisasiDak, 0, ',', '.') }}
                                                </td>
                                                <td class="text-center">Rp. {{ number_format($realisasi, 0, ',', '.') }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $perencanaanDau == 0 ? 0 : round(($realisasiDau / $perencanaanDau) * 100, 2) }}
                                                    %
                                                <td class="text-center">
                                                    {{ $perencanaanDak == 0 ? 0 : round(($realisasiDak / $perencanaanDak) * 100, 2) }}
                                                    %
                                                <td class="text-center">
                                                    {{ $perencanaan == 0 ? 0 : round(($realisasi / $perencanaan) * 100, 2) }}
                                                    %
                                                </td>
                                                <td class="text-center text-nowrap">Rp.
                                                    {{ number_format($sisaDau, 0, ',', '.') }}</td>
                                                <td class="text-center text-nowrap">Rp.
                                                    {{ number_format($sisaDak, 0, ',', '.') }}</td>
                                                <td class="text-center text-nowrap">Rp.
                                                    {{ number_format($sisa, 0, ',', '.') }}</td>
                                            </tr>
                                        @endif

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade show active" id="anggaran-semua" role="tabpanel"
                            aria-labelledby="pills-home-tab-nobd">
                            <div style="overflow: auto">
                                <table class="table table-bordered mt-3">
                                    <thead>
                                        <tr class="text-center">
                                            <th scope="col" rowspan="2">No.</th>
                                            <th scope="col" rowspan="2">OPD</th>
                                            <th scope="col" colspan="3">Nilai Anggaran</th>
                                            <th scope="col" colspan="3">Penggunaan Anggaran</th>
                                            <th scope="col" colspan="3">Persentase Penggunaan Anggaran</th>
                                            <th scope="col" colspan="3">Sisa Anggaran</th>
                                        </tr>
                                        <tr class="text-center">
                                            <th scope="col">DAU</th>
                                            <th scope="col">DAK</th>
                                            <th scope="col">Total</th>
                                            <th scope="col">DAU</th>
                                            <th scope="col">DAK</th>
                                            <th scope="col">Total</th>
                                            <th scope="col">DAU</th>
                                            <th scope="col">DAK</th>
                                            <th scope="col">Total</th>
                                            <th scope="col">DAU</th>
                                            <th scope="col">DAK</th>
                                            <th scope="col">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $perencanaanDau = 0;
                                            $perencanaanDak = 0;
                                            $perencanaan = 0;
                                            $realisasiDau = 0;
                                            $realisasiDak = 0;
                                            $realisasi = 0;
                                            $sisaDau = 0;
                                            $sisaDak = 0;
                                            $sisa = 0;
                                        @endphp
                                        @foreach ($tabelAnggaranSemua as $anggaranSemua)
                                            <tr>
                                                <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                                                <td class="text-nowrap">{{ $anggaranSemua['opd'] }}</td>
                                                <td class="text-center text-nowrap">
                                                    Rp. {{ number_format($anggaranSemua['perencanaanDau'], 0, ',', '.') }}
                                                </td>
                                                <td class="text-center text-nowrap">
                                                    Rp. {{ number_format($anggaranSemua['perencanaanDak'], 0, ',', '.') }}
                                                </td>
                                                <td class="text-center text-nowrap">
                                                    Rp. {{ number_format($anggaranSemua['perencanaan'], 0, ',', '.') }}
                                                </td>
                                                <td class="text-center text-nowrap">
                                                    Rp. {{ number_format($anggaranSemua['realisasiDau'], 0, ',', '.') }}
                                                </td>
                                                <td class="text-center text-nowrap">
                                                    Rp. {{ number_format($anggaranSemua['realisasiDak'], 0, ',', '.') }}
                                                </td>
                                                <td class="text-center text-nowrap">
                                                    Rp. {{ number_format($anggaranSemua['realisasi'], 0, ',', '.') }}</td>
                                                <td class="text-center text-nowrap">
                                                    {{ $anggaranSemua['persentaseDau'] == '-' ? '-' : $anggaranSemua['persentaseDau'] . ' %' }}
                                                </td>
                                                <td class="text-center text-nowrap">
                                                    {{ $anggaranSemua['persentaseDak'] == '-' ? '-' : $anggaranSemua['persentaseDak'] . ' %' }}
                                                </td>
                                                <td class="text-center text-nowrap">
                                                    {{ $anggaranSemua['persentase'] == '-' ? '-' : $anggaranSemua['persentase'] . ' %' }}
                                                </td>
                                                <td class="text-center text-nowrap">
                                                    Rp.
                                                    {{ number_format($anggaranSemua['perencanaanDau'] - $anggaranSemua['realisasiDau'], 0, ',', '.') }}
                                                </td>
                                                <td class="text-center text-nowrap">
                                                    Rp.
                                                    {{ number_format($anggaranSemua['perencanaanDak'] - $anggaranSemua['realisasiDak'], 0, ',', '.') }}
                                                </td>
                                                <td class="text-center text-nowrap">
                                                    Rp.
                                                    {{ number_format($anggaranSemua['perencanaan'] - $anggaranSemua['realisasi'], 0, ',', '.') }}
                                                </td>
                                            </tr>
                                            @php
                                                $perencanaanDau += $anggaranSemua['perencanaanDau'];
                                                $perencanaanDak += $anggaranSemua['perencanaanDak'];
                                                $perencanaan += $anggaranSemua['perencanaan'];
                                                $realisasiDau += $anggaranSemua['realisasiDau'];
                                                $realisasiDak += $anggaranSemua['realisasiDak'];
                                                $realisasi += $anggaranSemua['realisasi'];
                                                $sisaDau += $anggaranSemua['perencanaanDau'] - $anggaranSemua['realisasiDau'];
                                                $sisaDak += $anggaranSemua['perencanaanDak'] - $anggaranSemua['realisasiDak'];
                                                $sisa += $anggaranSemua['perencanaan'] - $anggaranSemua['realisasi'];
                                            @endphp
                                        @endforeach
                                        @if (Auth::user()->role != 'OPD')
                                            <tr class="text-nowrap fw-bold">
                                                <th scope="row" colspan="2" class="text-center">Total</th>
                                                <td class="text-center">Rp.
                                                    {{ number_format($perencanaanDau, 0, ',', '.') }}
                                                </td>
                                                <td class="text-center">Rp.
                                                    {{ number_format($perencanaanDak, 0, ',', '.') }}
                                                </td>
                                                <td class="text-center">Rp.
                                                    {{ number_format($perencanaan, 0, ',', '.') }}
                                                </td>
                                                <td class="text-center">Rp.
                                                    {{ number_format($realisasiDau, 0, ',', '.') }}
                                                </td>
                                                <td class="text-center">Rp.
                                                    {{ number_format($realisasiDak, 0, ',', '.') }}
                                                </td>
                                                <td class="text-center">Rp. {{ number_format($realisasi, 0, ',', '.') }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $perencanaanDau == 0 ? 0 : round(($realisasiDau / $perencanaanDau) * 100, 2) }}
                                                    %
                                                <td class="text-center">
                                                    {{ $perencanaanDak == 0 ? 0 : round(($realisasiDak / $perencanaanDak) * 100, 2) }}
                                                    %
                                                <td class="text-center">
                                                    {{ $perencanaan == 0 ? 0 : round(($realisasi / $perencanaan) * 100, 2) }}
                                                    %
                                                </td>
                                                <td class="text-center text-nowrap">Rp.
                                                    {{ number_format($sisaDau, 0, ',', '.') }}</td>
                                                <td class="text-center text-nowrap">Rp.
                                                    {{ number_format($sisaDak, 0, ',', '.') }}</td>
                                                <td class="text-center text-nowrap">Rp.
                                                    {{ number_format($sisa, 0, ',', '.') }}</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    @component('dashboard.components.buttons.close')
                    @endcomponent
                    <form action="{{ url('/dashboard/export/anggaran/semua') }}" method="POST"
                        id="form-export-anggaran">
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
                                    <option value="{{ $tahun }}"
                                        {{ ($_GET['tahun'] ?? '') == $tahun ? 'selected' : '' }}>
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
        $('#tab-semua').click(function() {
            $('#form-export-intervensi').attr('action', "{{ url('/dashboard/export/intervensi/semua') }}");
        })

        $('#tab-keong').click(function() {
            $('#form-export-intervensi').attr('action', "{{ url('/dashboard/export/intervensi/keong') }}");
        })

        $('#tab-manusia').click(function() {
            $('#form-export-intervensi').attr('action', "{{ url('/dashboard/export/intervensi/manusia') }}");
        })

        $('#tab-hewan').click(function() {
            $('#form-export-intervensi').attr('action', "{{ url('/dashboard/export/intervensi/hewan') }}");
        })

        $('#tab-anggaran-semua').click(function() {
            $('#form-export-anggaran').attr('action', "{{ url('/dashboard/export/anggaran/semua') }}");
        })

        $('#tab-anggaran-keong').click(function() {
            $('#form-export-anggaran').attr('action', "{{ url('/dashboard/export/anggaran/keong') }}");
        })

        $('#tab-anggaran-manusia').click(function() {
            $('#form-export-anggaran').attr('action', "{{ url('/dashboard/export/anggaran/manusia') }}");
        })

        $('#tab-anggaran-hewan').click(function() {
            $('#form-export-anggaran').attr('action', "{{ url('/dashboard/export/anggaran/hewan') }}");
        })
    </script>

    <script>
        Circles.create({
            id: 'realisasi-keong',
            radius: 45,
            value: "{{ $intervensi['persentaseKeong'] }}",
            maxValue: 100,
            width: 7,
            text: "{{ $intervensi['persentaseKeong'] . ' %' }}",
            colors: ['#f1f1f1', '#2BB930'],
            duration: 400,
            wrpClass: 'circles-wrp',
            textClass: 'circles-text',
            styleWrapper: true,
            styleText: true
        })

        Circles.create({
            id: 'realisasi-manusia',
            radius: 45,
            value: "{{ $intervensi['persentaseManusia'] }}",
            maxValue: 100,
            width: 7,
            text: "{{ $intervensi['persentaseManusia'] . ' %' }}",
            colors: ['#f1f1f1', '#2BB930'],
            duration: 400,
            wrpClass: 'circles-wrp',
            textClass: 'circles-text',
            styleWrapper: true,
            styleText: true
        })

        Circles.create({
            id: 'realisasi-hewan',
            radius: 45,
            value: "{{ $intervensi['persentaseHewan'] }}",
            maxValue: 100,
            width: 7,
            text: "{{ $intervensi['persentaseHewan'] . ' %' }}",
            colors: ['#f1f1f1', '#2BB930'],
            duration: 400,
            wrpClass: 'circles-wrp',
            textClass: 'circles-text',
            styleWrapper: true,
            styleText: true
        })

        Circles.create({
            id: 'realisasi-total',
            radius: 45,
            value: "{{ $intervensi['persentaseTotal'] }}",
            maxValue: 100,
            width: 7,
            text: "{{ $intervensi['persentaseTotal'] . '%' }}",
            colors: ['#f1f1f1', '#2BB930'],
            duration: 400,
            wrpClass: 'circles-wrp',
            textClass: 'circles-text',
            styleWrapper: true,
            styleText: true
        })

        Circles.create({
            id: 'penggunaan-keong',
            radius: 45,
            value: "{{ $penggunaanAnggaran['penggunaanKeong'] }}",
            maxValue: "{{ $anggaranPerencanaan['anggaranKeong'] }}",
            width: 7,
            text: "{{ $penggunaanAnggaran['persenKeong'] . '%' }}",
            colors: ['#f1f1f1', '#2BB930'],
            duration: 400,
            wrpClass: 'circles-wrp',
            textClass: 'circles-text',
            styleWrapper: true,
            styleText: true
        })

        Circles.create({
            id: 'penggunaan-manusia',
            radius: 45,
            value: "{{ $penggunaanAnggaran['penggunaanManusia'] }}",
            maxValue: "{{ $anggaranPerencanaan['anggaranManusia'] }}",
            width: 7,
            text: "{{ $penggunaanAnggaran['persenManusia'] . '%' }}",
            colors: ['#f1f1f1', '#2BB930'],
            duration: 400,
            wrpClass: 'circles-wrp',
            textClass: 'circles-text',
            styleWrapper: true,
            styleText: true
        })

        Circles.create({
            id: 'penggunaan-hewan',
            radius: 45,
            value: "{{ $penggunaanAnggaran['penggunaanHewan'] }}",
            maxValue: "{{ $anggaranPerencanaan['anggaranHewan'] }}",
            width: 7,
            text: "{{ $penggunaanAnggaran['persenHewan'] . '%' }}",
            colors: ['#f1f1f1', '#2BB930'],
            duration: 400,
            wrpClass: 'circles-wrp',
            textClass: 'circles-text',
            styleWrapper: true,
            styleText: true
        })

        Circles.create({
            id: 'penggunaan-total',
            radius: 45,
            value: "{{ $penggunaanAnggaran['penggunaanHewan'] + $penggunaanAnggaran['penggunaanKeong'] + $penggunaanAnggaran['penggunaanManusia'] }}",
            maxValue: "{{ $anggaranPerencanaan['anggaranHewan'] + $anggaranPerencanaan['anggaranKeong'] + $anggaranPerencanaan['anggaranManusia'] }}",
            width: 7,
            text: "{{ $penggunaanAnggaran['persenTotal'] . ' %' }}",
            colors: ['#f1f1f1', '#2BB930'],
            duration: 400,
            wrpClass: 'circles-wrp',
            textClass: 'circles-text',
            styleWrapper: true,
            styleText: true
        })

        Circles.create({
            id: 'penggunaan-sisa',
            radius: 45,
            value: "{{ $anggaranPerencanaan['anggaranHewan'] + $anggaranPerencanaan['anggaranKeong'] + $anggaranPerencanaan['anggaranManusia'] - ($penggunaanAnggaran['penggunaanHewan'] + $penggunaanAnggaran['penggunaanKeong'] + $penggunaanAnggaran['penggunaanManusia']) }}",
            maxValue: "{{ $anggaranPerencanaan['anggaranHewan'] + $anggaranPerencanaan['anggaranKeong'] + $anggaranPerencanaan['anggaranManusia'] }}",
            width: 7,
            text: "{{ $penggunaanAnggaran['persenSisa'] . '%' }}",
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
