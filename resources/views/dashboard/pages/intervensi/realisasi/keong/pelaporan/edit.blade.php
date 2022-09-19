@extends('dashboard.layouts.main')

@section('title')
    Ubah Laporan Realisasi Intervensi Habitat Keong
@endsection

@section('titlePanelHeader')
    Ubah Laporan Realisasi Intervensi Habitat Keong | <span style="text-decoration: underline">Laporan Tanggal:
        {{ Carbon\Carbon::parse($realisasiIntervensiKeong->created_at)->translatedFormat('j F Y') }}</span>
@endsection

@section('subTitlePanelHeader')
    {{ $rencanaIntervensiKeong->sub_indikator }}
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
                        <div class="card-title">Form Laporan Realisasi Intervensi Habitat Keong</div>
                    </div>
                </div>
                <div class="card-body pt-1">
                    @if ($realisasiIntervensiKeong->status == 2)
                        <div class="row">
                            <div class="col">
                                <div class="alert alert-danger mt-3 font-weight-bold" role="alert">Alasan Ditolak: <span
                                        class="text-danger">{{ $realisasiIntervensiKeong->alasan_ditolak }}</span></div>
                            </div>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col">
                            @component('dashboard.components.forms.realisasiKeong',
                                [
                                    'action' => route('realisasi-intervensi-keong.update', $realisasiIntervensiKeong->id),
                                    'realisasiIntervensiKeong' => $realisasiIntervensiKeong,
                                    'rencanaIntervensiKeong' => $rencanaIntervensiKeong,
                                    'countSisaAnggaran' => $countSisaAnggaran,
                                    'desa' => $desa,
                                    'lokasi' => $lokasiPerencanaanKeong,
                                    'lokasiArr' => $lokasiPerencanaanKeongArr,
                                    'dataMap' => $dataMap,
                                    'maxDokumen' => $realisasiIntervensiKeong->dokumenRealisasiKeong()->count(),
                                    'method' => 'PUT',
                                    'submitLabel' => 'Perbarui Data',
                                    'submitIcon' => '<i class="fas fa-save"></i> ',
                                ])
                            @endcomponent
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 order-md-2">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Lokasi Yang Belum Terealisasi</div>
                    </div>
                </div>
                <div class="card-body px-2">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped" id="tabelLokasiTerealisasi" cellspacing="0"
                            width="100%">
                            <thead>
                                <tr class="text-center fw-bold">
                                    <th>No</th>
                                    <th>Nama Lokasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rencanaIntervensiKeong->lokasiPerencanaanKeong->whereNull('realisasi_keong_id') as $item)
                                    <tr>
                                        <td class="text-center">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>{{ $item->lokasiKeong->nama }}</td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Titik Koordinat Yang Belum Terealisasi</div>
                    </div>
                </div>
                <div class="card-body px-2">
                    <div id="peta"></div>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('scripts')
    <script>
        $('#nav-realisasi').addClass('active');
        $('#nav-realisasi .collapse').addClass('show');
        $('#nav-realisasi .collapse #li-keong-2').addClass('active');

        var tableLokasiRealisasi = $('#tabelLokasiTerealisasi').DataTable({
            "dom": "ftip",
            "bPaginate": false,
        });
    </script>
@endpush
