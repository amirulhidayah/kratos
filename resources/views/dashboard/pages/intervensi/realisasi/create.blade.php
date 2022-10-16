@extends('dashboard.layouts.main')

@section('title')
    Tambah Laporan Realisasi Intervensi
@endsection

@section('titlePanelHeader')
    Tambah Laporan Realisasi Intervensi
@endsection

@section('subTitlePanelHeader')
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
                            <a href="#" class="btn btn-success shadow-sm mr-2 fw-bold text-white"
                                id="selesai-direalisasi" value="" name="selesai_realisasi">
                                <i class="fas fa-check-circle"></i>
                                Tandai Selesai Direalisasi
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-1">
                    <div class="row">
                        <div class="col">
                            @component('dashboard.components.forms.realisasi',
                                [
                                    'action' => route('realisasi-intervensi.store'),
                                    'pendudukRealisasi' => $pendudukRealisasi ?? null,
                                    'kecamatan' => $kecamatan ?? null,
                                    'listPerencanaan' => $listPerencanaan,
                                    'orangTua' => $orangTua,
                                    'opd' => $opd,
                                    'maxNomorPenduduk' => isset($pendudukRealisasi) ? $pendudukRealisasi->max('nomor') : null,
                                    'method' => 'POST',
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
