@extends('dashboard.layouts.main')

@section('title')
    Akun
@endsection

@section('titlePanelHeader')
    Akun
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
                        <div class="card-title">Tambah Akun</div>
                    </div>
                </div>
                <div class="card-body">
                    @component('dashboard.components.forms.akun')
                        @slot('daftarOpd', $daftarOpd)
                        @slot('form_id', 'form-tambah')
                        @slot('action', url('/master-data/akun'))
                        @slot('method', 'POST')
                        @slot('back_url', url('/master-data/akun'))
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $('#nav-master-akun').addClass('active');
    </script>
@endpush
