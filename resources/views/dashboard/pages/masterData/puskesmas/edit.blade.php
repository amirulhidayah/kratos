@extends('dashboard.layouts.main')

@section('title')
    Ubah PUSKESMAS
@endsection

@section('titlePanelHeader')
    Ubah PUSKESMAS
@endsection

@section('subTitlePanelHeader')
    {{-- Lorem ipsum dolor sit amet consectetur adipisicing elit. --}}
@endsection

@section('buttonPanelHeader')
    {{-- <a href="#" class="btn btn-secondary btn-round"><i class="fas fa-plus"></i>
        Tambah</a> --}}
@endsection

@push('styles')
@endpush

@section('contents')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Ubah PUSKESMAS</div>
                    </div>
                </div>
                <div class="card-body">
                    @component('dashboard.components.forms.puskesmas')
                        @slot('form_id', 'form-tambah')
                        @slot('action', url('/master-data/puskesmas/' . $puskesmas->id))
                        @slot('method', 'PUT')
                        @slot('data', $puskesmas)
                        @slot('back_url', url('/master-data/puskesmas'))
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#nama').val("{{ $puskesmas->nama }}");
        })
    </script>

    <script>
        $('#nav-master-penduduk').addClass('active');
    </script>
@endpush
