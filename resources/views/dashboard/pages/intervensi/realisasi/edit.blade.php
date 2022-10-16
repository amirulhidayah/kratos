@extends('dashboard.layouts.main')

@section('title')
    Ubah Laporan Realisasi Intervensi
@endsection

@section('titlePanelHeader')
    Ubah Laporan Realisasi Intervensi | <span style="text-decoration: underline">Laporan Tanggal:
        {{ Carbon\Carbon::parse($realisasiIntervensi->created_at)->translatedFormat('j F Y') }}</span>
@endsection

@section('subTitlePanelHeader')
    {{ $realisasiIntervensi->perencanaan->indikator->nama }}
@endsection

@section('buttonPanelHeader')
    <a href="{{ url()->previous() }}" class="btn btn-secondary btn-round"><i class="fas fa-arrow-left mr-1"></i>
        Kembali</a>
@endsection

@push('styles')
    <style>
        #tabelLokasiTerealisasi_wrapper .dataTables_filter {
            width: 100% !important;
            margin-bottom: 10px !important;
            text-align: center !important;
        }
    </style>
@endpush

@section('contents')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Form Laporan Realisasi Intervensi</div>
                        <div class="card-tools">
                            @if (Auth::user()->role == 'OPD' && ($realisasiIntervensi->status == 3 || $realisasiIntervensi->status == 2))
                                <button class="btn btn-success shadow-sm mr-2 fw-bold text-white" id="selesai-direalisasi"
                                    value="{{ $realisasiIntervensi->id }}" name="selesai_realisasi">
                                    @if ($realisasiIntervensi->status == 3)
                                        <i class="fas fa-check-circle"></i>
                                        Tandai Selesai Direalisasi
                                    @else
                                        <i class="fas fa-check-circle"></i>
                                        Tandai Selesai Direvisi/Diperbaiki
                                    @endif
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-body pt-3">
                    @if ($realisasiIntervensi->status == 2)
                        <div class="alert alert-danger mt-2 font-weight-bold" role="alert">Alasan Ditolak: <span
                                class="text-danger">{{ $realisasiIntervensi->alasan_ditolak }}</span></div>
                    @endif
                    @if ($realisasiIntervensi && Auth::user()->opd_id == $realisasiIntervensi->perencanaan->opd_id)
                        <div class="alert alert-info shadow-md" role="alert">
                            <b>Anda masih dapat mengubah sub indikator / menambah penduduk yang direalisasi apabila
                                laporan realisasi ini belum disetujui oleh Admin.</span>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col">
                            @component('dashboard.components.forms.realisasi',
                                [
                                    'action' => route('realisasi-intervensi.update', $realisasiIntervensi->id),
                                    'realisasiIntervensi' => $realisasiIntervensi,
                                    'pendudukRealisasi' => $pendudukRealisasi,
                                    'kecamatan' => $kecamatan,
                                    'listPerencanaan' => $listPerencanaan,
                                    'orangTua' => $orangTua,
                                    'opd' => $opd,
                                    'maxDokumen' => $realisasiIntervensi->dokumenRealisasi()->count(),
                                    'maxNomorPenduduk' => $pendudukRealisasi->max('nomor'),
                                    'method' => 'PUT',
                                    'urlKedua' => isset($urlKedua) ? $urlKedua : null,
                                ])
                            @endcomponent
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $('#nav-realisasi').addClass('active');
        $('#nav-realisasi .collapse').addClass('show');
    </script>
@endpush
