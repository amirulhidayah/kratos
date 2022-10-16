@extends('dashboard.layouts.main')

@section('title')
    Perencanaan Intervensi
@endsection

@section('titlePanelHeader')
    Detail Perencanaan Intervensi
@endsection

@section('subTitlePanelHeader')
    {{ $rencana_intervensi->indikator->nama }}
@endsection

@section('buttonPanelHeader')
    <a href="{{ url()->previous() }}" class="btn btn-secondary btn-round"><i class="fas fa-arrow-left mr-1"></i>
        Kembali</a>
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
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Info Detail</div>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-bordered">
                        <li class="list-group-item d-flex justify-content-between align-items-center">Tanggal Pengajuan:
                            <span
                                class="font-weight-bold">{{ Carbon\Carbon::parse($rencana_intervensi->created_at)->translatedFormat('j F Y') }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Sub Indikator:<span
                                class="font-weight-bold">{{ $rencana_intervensi->indikator->nama }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">OPD Pembuat:<span
                                class="font-weight-bold">{{ $rencana_intervensi->opd->nama }}</span>
                        </li>
                        @if ($rencana_intervensi->opdTerkait->count() > 0)
                            <li class="list-group-item d-flex justify-content-between align-items-center">OPD Terkait
                                ({{ $rencana_intervensi->opdTerkait->count() }}):<span class="font-weight-bold">
                                    <ul>
                                        @foreach ($rencana_intervensi->opdTerkait as $item)
                                            <li class="d-flex justify-content-end align-items-end">
                                                {{ $item->opd->nama . ' ' }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </span>
                            </li>
                        @endif
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $rencana_intervensi->status == 1 ? 'Nilai Anggaran:' : 'Rencana Anggaran:' }}<span
                                class="font-weight-bold"><span>Rp. </span>
                                <span class="rupiah">{{ $rencana_intervensi->nilai_pembiayaan }}</span></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Sumber Dana:<span
                                class="font-weight-bold">{{ $rencana_intervensi->sumberDana->nama }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Status:
                            @if ($rencana_intervensi->status == 1)
                                <span class="font-weight-bold badge badge-success">Disetujui</span>
                            @elseif($rencana_intervensi->status == 2)
                                <span class="font-weight-bold badge badge-danger">Ditolak</span>
                            @else
                                <span class="font-weight-bold badge badge-warning">Menunggu Konfirmasi</span>
                            @endif
                        </li>
                        @if ($rencana_intervensi->status == 2)
                            <li class="list-group-item d-flex justify-content-between align-items-center">Alasan Ditolak:
                                <span class="font-weight-bold text-danger">{{ $rencana_intervensi->alasan_ditolak }}</span>
                            </li>
                        @endif
                        @if ($rencana_intervensi->status != 0)
                            <li class="list-group-item d-flex justify-content-between align-items-center">Tanggal
                                Konfirmasi:<span
                                    class="font-weight-bold">{{ Carbon\Carbon::parse($rencana_intervensi->tanggal_konfirmasi)->translatedFormat('j F Y') }}</span>
                            </li>
                        @endif

                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">List Dokumen Perencanaan</div>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-bordered">
                        @forelse ($rencana_intervensi->dokumenPerencanaan as $item)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $item->nama }}
                                <a href="{{ Storage::url('uploads/dokumen/perencanaan/' . $item->file) }}" target="_blank"
                                    class="badge badge-primary" data-toggle="tooltip" data-placement="top" title="Download">
                                    <i class="fas fa-download"></i>

                                </a>
                            </li>
                        @empty
                            <h5 class="text-center">Tidak Ada Dokumen</h5>
                        @endforelse

                    </ul>
                </div>
            </div>
            @if ($rencana_intervensi->status == 0 && Auth::user()->role == 'Admin')
                <div class="card">
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-title">Konfirmasi Perencanaan</div>
                        </div>
                    </div>
                    <div class="card-body px-2 pt-2">
                        @component('dashboard.components.forms.confirm',
                            [
                                'action' => url('rencana-intervensi/konfirmasi/' . $rencana_intervensi->id),
                            ])
                        @endcomponent
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $('#nav-perencanaan').addClass('active');
        $('#nav-perencanaan .collapse').addClass('show');

        var table = $('#dataTables').DataTable({
            processing: true,
        })
    </script>
@endpush
