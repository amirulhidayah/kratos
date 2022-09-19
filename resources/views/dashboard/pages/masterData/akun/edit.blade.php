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
    </style>
@endpush

@section('contents')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Ubah Akun</div>
                    </div>
                </div>
                <div class="card-body">
                    @component('dashboard.components.forms.akun')
                        @slot('daftarOpd', $daftarOpd)
                        @slot('form_id', 'form-tambah')
                        @slot('action', url('/master-data/akun/' . $user->id))
                        @slot('method', 'PUT')
                        @slot('back_url', url('/master-data/akun/'))
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#username').val("{{ $user->username }}");
            $('#nama').val("{{ $user->nama }}");
            $('#opd_id').val("{{ $user->opd_id }}").trigger('change');
            $('#role').val("{{ $user->role }}").trigger('change');
            $('#status').val("{{ $user->status }}").trigger('change');
        })
    </script>

    <script>
        $('#nav-master-akun').addClass('active');
    </script>
@endpush
