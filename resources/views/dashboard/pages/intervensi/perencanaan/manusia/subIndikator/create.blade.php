@extends('dashboard.layouts.main')

@section('title')
    Tambah Perencanaan Intervensi Manusia
@endsection

@section('titlePanelHeader')
    Tambah Perencanaan Intervensi Manusia
@endsection

@section('subTitlePanelHeader')
    {{-- * bersifat wajib --}}
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
                        <div class="card-title">Form Perencanaan Intervensi Manusia</div>
                    </div>
                </div>
                <div class="card-body pt-1">
                    <div class="row">
                        <div class="col">
                            @component('dashboard.components.forms.perencanaanManusia',
                                [
                                    'action' => route('rencana-intervensi-manusia.store'),
                                    'desa' => $desa,
                                    'opd' => $opd,
                                    'method' => 'POST',
                                    'submitLabel' => 'Kirim Data',
                                    'submitIcon' => '<i class="fas fa-paper-plane"></i> ',
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
        $('#nav-perencanaan .collapse #li-manusia').addClass('active');
    </script>
@endpush
