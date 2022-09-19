@extends('dashboard.layouts.main')

@section('title')
    Ubah Perencanaan Intervensi Lokasi Hewan Ternak
@endsection

@section('titlePanelHeader')
    Ubah Perencanaan Intervensi Lokasi Hewan Ternak
@endsection

@section('subTitlePanelHeader')
    {{ $rencanaIntervensiHewan->sub_indikator }}
@endsection

@section('buttonPanelHeader')
    <a href="{{ url()->previous() }}" class="btn btn-secondary btn-round"><i class="fas fa-arrow-left mr-1"></i>
        Kembali</a>
@endsection

@section('contents')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Form Perencanaan Intervensi Lokasi Hewan Ternak</div>
                    </div>
                </div>
                <div class="card-body pt-1">
                    @if ($rencanaIntervensiHewan->status == 2)
                        <div class="row">
                            <div class="col">
                                <div class="alert alert-danger mt-3 font-weight-bold" role="alert">Alasan Ditolak: <span
                                        class="text-danger">{{ $rencanaIntervensiHewan->alasan_ditolak }}</span></div>
                            </div>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col">
                            @component('dashboard.components.forms.perencanaanHewan',
                                [
                                    'action' => route('rencana-intervensi-hewan.update', $rencanaIntervensiHewan->id),
                                    'rencanaIntervensiHewan' => $rencanaIntervensiHewan,
                                    'lokasi' => $lokasiPerencanaanHewan,
                                    'opdTerkait' => $opdTerkaitHewan,
                                    'desa' => $desa,
                                    'opd' => $opd,
                                    'maxDokumen' => $rencanaIntervensiHewan->dokumenPerencanaanHewan()->count(),
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
@endsection

@push('scripts')
    <script>
        $('#nav-perencanaan').addClass('active');
        $('#nav-perencanaan .collapse').addClass('show');
        $('#nav-perencanaan .collapse #li-hewan').addClass('active');
    </script>
@endpush
