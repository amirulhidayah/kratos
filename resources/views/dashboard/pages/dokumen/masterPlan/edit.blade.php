@extends('dashboard.layouts.main')

@section('title')
    Dokumen Master Plan
@endsection

@section('titlePanelHeader')
    Dokumen Master Plan
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
                        <div class="card-title">Ubah Dokumen Master Plan</div>
                    </div>
                </div>
                <div class="card-body">
                    @component('dashboard.components.forms.dokumen')
                        @slot('daftarTahun', $daftarTahun)
                        @slot('form_id', 'form-tambah')
                        @slot('action', url('/dokumen/master-plan/' . $masterPlan->id))
                        @slot('method', 'PUT')
                        @slot('back_url', url('/dokumen/master-plan/'))
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#nama').val("{{ $masterPlan->nama }}");
            $('#tahun_id').val("{{ $masterPlan->tahun_id }}").trigger('change');
        })
    </script>

    <script>
        $('#nav-dokumen-master-plan').addClass('active');
    </script>
@endpush
