@extends('dashboard.layouts.main')

@section('title')
    Ubah Anak
@endsection

@section('titlePanelHeader')
    Ubah Anak
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
                        <div class="card-title">Ubah Anak</div>
                    </div>
                </div>
                <div class="card-body">
                    @component('dashboard.components.forms.anak')
                        @slot('form_id', 'form-tambah')
                        @slot('action', url('/master-data/anak/' . $anak->id))
                        @slot('data', $anak)
                        @slot('method', 'PUT')
                        @slot('back_url', url('/master-data/anak'))
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#nama').val("{{ $anak->nama }}");
            $('#nik').val("{{ $anak->nik }}");
            $('#bb_lahir').val("{{ $anak->bb_lahir }}");
            $('#tb_lahir').val("{{ $anak->tb_lahir }}");
            $('#tanggal_lahir').val("{{ \Carbon\Carbon::parse($anak->tanggal_lahir)->format('d-m-Y') }}");
            $('#jenis_kelamin').val("{{ $anak->jenis_kelamin }}").trigger('change');
        })
    </script>

    <script>
        $('#nav-master-anak').addClass('active');
    </script>
@endpush
