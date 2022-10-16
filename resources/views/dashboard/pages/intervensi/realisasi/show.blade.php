@extends('dashboard.layouts.main')

@section('title')
    Realisasi Intervensi
@endsection

@section('titlePanelHeader')
    Detail Realisasi Intervensi
@endsection

@section('subTitlePanelHeader')
    {{ $realisasi_intervensi->perencanaan->indikator->nama }}
@endsection

@section('buttonPanelHeader')
    <a href="{{ url()->previous() }}" class="btn btn-secondary btn-round"><i class="fas fa-arrow-left mr-1"></i>
        Kembali</a>
@endsection

@push('styles')
    <style>

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
                        <li class="list-group-item d-flex justify-content-between align-items-center">Tanggal Pembuatan
                            Laporan:
                            <span
                                class="font-weight-bold">{{ Carbon\Carbon::parse($realisasi_intervensi->created_at)->translatedFormat('j F Y') }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Sub Indikator:<span
                                class="font-weight-bold">{{ $realisasi_intervensi->perencanaan->indikator->nama }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">OPD Pembuat:<span
                                class="font-weight-bold">{{ $realisasi_intervensi->perencanaan->opd->nama }}</span>
                        </li>
                        @if ($realisasi_intervensi->perencanaan->opdTerkait->count() > 0)
                            <li class="list-group-item d-flex justify-content-between align-items-center">OPD Terkait
                                ({{ $realisasi_intervensi->perencanaan->opdTerkait->count() }}):<span
                                    class="font-weight-bold">
                                    <ul>
                                        @foreach ($realisasi_intervensi->perencanaan->opdTerkait as $item)
                                            <li class="d-flex justify-content-end align-items-end">
                                                {{ $item->opd->nama . ' ' }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </span>
                            </li>
                        @endif
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $realisasi_intervensi->status == 1 ? 'Nilai Anggaran:' : 'Rencana Anggaran:' }}<span
                                class="font-weight-bold"><span>Rp. </span>
                                <span
                                    class="rupiah">{{ $realisasi_intervensi->perencanaan->nilai_pembiayaan }}</span></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Sumber Dana:<span
                                class="font-weight-bold">{{ $realisasi_intervensi->perencanaan->sumberDana->nama }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Status:
                            @if ($realisasi_intervensi->status == 1)
                                <span class="font-weight-bold badge badge-success">Disetujui</span>
                            @elseif($realisasi_intervensi->status == 2)
                                <span class="font-weight-bold badge badge-danger">Ditolak</span>
                            @else
                                <span class="font-weight-bold badge badge-warning">Menunggu Konfirmasi</span>
                            @endif
                        </li>
                        @if ($realisasi_intervensi->status == 2)
                            <li class="list-group-item d-flex justify-content-between align-items-center">Alasan Ditolak:
                                <span
                                    class="font-weight-bold text-danger">{{ $realisasi_intervensi->alasan_ditolak }}</span>
                            </li>
                        @endif
                        @if ($realisasi_intervensi->status != 0)
                            <li class="list-group-item d-flex justify-content-between align-items-center">Tanggal
                                Konfirmasi:<span
                                    class="font-weight-bold">{{ Carbon\Carbon::parse($realisasi_intervensi->tanggal_konfirmasi)->translatedFormat('j F Y') }}</span>
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
                        <div class="card-title">List Dokumen Realisasi</div>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-bordered">
                        @forelse ($realisasi_intervensi->dokumenRealisasi as $item)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $item->nama }}
                                <a href="{{ Storage::url('uploads/dokumen/realisasi/' . $item->file) }}" target="_blank"
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
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Data Penduduk Yang Direalisasi</div>
                    </div>
                </div>
                <div class="card-body px-1 pt-2">
                    <div class="table-responsive mt-2">
                        <table class="table table-hover table-striped table-bordered" id="{{ $id ?? 'dataTables' }}"
                            cellspacing="0" width="100%">
                            <thead>
                                <tr class="text-center fw-bold">
                                    <th>No</th>
                                    <th>Nomor</th>
                                    <th>Sasaran Intervensi</th>
                                    <th>Nama Ayah</th>
                                    <th>Nama Ibu</th>
                                    <th>Nama Anak</th>
                                    <th>Kecamatan</th>
                                    <th>Desa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($realisasi_intervensi->pendudukRealisasi as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @if ($realisasi_intervensi->status == 0 && Auth::user()->role == 'Admin')
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-title">Konfirmasi Realisasi</div>
                        </div>
                    </div>
                    <div class="card-body px-2 pt-2">
                        @component('dashboard.components.forms.confirm',
                            [
                                'action' => url('realisasi-intervensi/konfirmasi/' . $realisasi_intervensi->id),
                            ])
                        @endcomponent
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection

@push('scripts')
    <script>
        $('#nav-realisasi').addClass('active');
        $('#nav-realisasi .collapse').addClass('show');

        var table = $('#dataTables').DataTable({
            processing: true,
            serverSide: true,
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            ajax: {
                url: "{{ url('realisasi-intervensi-penduduk') }}",
                data: function(d) {
                    d.realisasi_id = '{{ $realisasi_intervensi->id }}';
                    // d.tahun_filter = $('#tahun-filter').val();
                    // d.opd_filter = $('#opd-filter').val();
                    // d.status_filter = $('#status-filter').val();
                    // d.search_filter = $('input[type="search"]').val();
                },
            },
            "columns": [{
                    "data": "id",
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    "data": "nomor",
                    "className": "text-center",
                    "visible": false
                },
                {
                    "data": "sasaran_intervensi",
                    "className": "text-center"
                },
                {
                    "data": "nama_ayah",
                    "render": function(data, type, row, meta) {
                        if (row.nama_ayah) {
                            return data;
                        } else {
                            return '-';
                        }
                    },
                    "visible": false
                },
                {
                    "data": "nama_ibu",
                    "render": function(data, type, row, meta) {
                        if (row.sasaran_intervensi != 'Anak') {
                            if (row.nama_ibu) {
                                return '<i class="fas fa-check-square text-success"></i> ' + data;
                            } else {
                                return '<i class="fas fa-check-square text-success"></i> -';
                            }
                        } else {
                            return data
                        }
                    },
                },
                {
                    "data": "nama_anak",
                    "render": function(data, type, row, meta) {
                        if (row.sasaran_intervensi != 'Orang Tua') {
                            return '<i class="fas fa-check-square text-success"></i> ' + data;
                        } else {
                            return '-'
                        }
                    },
                },
                {
                    "data": "kecamatan",
                    "className": "text-center"
                },
                {
                    "data": "desa",
                    "className": "text-center"
                },
            ],
            order: [
                [1, 'desc'],
            ],
        })
    </script>
@endpush
