@extends('dashboard.layouts.main')

@section('title')
    Ubah Orang Tua
@endsection

@section('titlePanelHeader')
    Ubah Orang Tua
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
                        <div class="card-title">Ubah Orang Tua</div>
                    </div>
                </div>
                <div class="card-body">
                    @component('dashboard.components.forms.orangTua')
                        @slot('form_id', 'form-tambah')
                        @slot('action', url('/master-data/orang-tua/' . $orangTua->id))
                        @slot('data', $orangTua)
                        @slot('method', 'PUT')
                        @slot('back_url', url('/master-data/orang-tua'))
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#nama_ibu').val("{{ $orangTua->nama_ibu }}");
            $('#nik_ibu').val("{{ $orangTua->nik_ibu }}");
            $('#nama_ayah').val("{{ $orangTua->nama_ayah }}");
            $('#nik_ayah').val("{{ $orangTua->nik_ayah }}");
            $('#rt').val("{{ $orangTua->rt }}");
            $('#rw').val("{{ $orangTua->rw }}");
            $('#alamat').val("{{ $orangTua->alamat }}");
        })
    </script>

    <script>
        $('#nav-master-orang-tua').addClass('active');
    </script>
@endpush
