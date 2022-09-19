@extends('dashboard.layouts.main')

@section('title')
    Dokumen Road Map
@endsection

@section('titlePanelHeader')
    Dokumen Road Map
@endsection

@section('subTitlePanelHeader')
    {{-- Lorem ipsum dolor sit amet consectetur adipisicing elit. --}}
@endsection

@section('buttonPanelHeader')
    {{-- <a href="#" class="btn btn-secondary btn-round"><i class="fas fa-plus"></i>
        Tambah</a> --}}
@endsection

@push('styles')
    <style>
        #map {
            height: 400px;
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
                        <div class="card-title">Ubah Dokumen Road Map</div>
                    </div>
                </div>
                <div class="card-body">
                    @component('dashboard.components.forms.dokumen')
                        @slot('daftarTahun', $daftarTahun)
                        @slot('form_id', 'form-tambah')
                        @slot('action', url('/dokumen/road-map/' . $roadMap->id))
                        @slot('method', 'PUT')
                        @slot('back_url', url('/dokumen/road-map/'))
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#nama').val("{{ $roadMap->nama }}");
            $('#tahun_id').val("{{ $roadMap->tahun_id }}").trigger('change');
        })
    </script>

    <script>
        $('#nav-dokumen-road-map').addClass('active');
    </script>
@endpush
