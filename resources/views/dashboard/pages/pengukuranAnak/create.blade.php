@extends('dashboard.layouts.main')

@section('title')
    Pengukuran Anak
@endsection

@section('titlePanelHeader')
    Pengukuran Anak
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
                        <div class="card-title">Tambah Pengukuran Anak</div>
                    </div>
                </div>
                <div class="card-body">
                    @component('dashboard.components.forms.pengukuranAnak')
                        @slot('form_id', 'form-tambah')
                        @slot('action', url('pengukuran-anak/' . $anak->id))
                        @slot('method', 'POST')
                        @slot('back_url', url('pengukuran-anak/' . $anak->id))
                        @slot('anak', $anak)
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $('#nav-pengukuran-anak').addClass('active');
    </script>
@endpush
