@extends('dashboard.layouts.main')

@section('title')
    @if ($jenjang == 'sd')
        {{ 'SD' }}
    @elseif ($jenjang == 'smp')
        {{ 'SMP' }}
    @else
        {{ 'SMA / SMK' }}
    @endif
@endsection

@section('titlePanelHeader')
    @if ($jenjang == 'sd')
        {{ 'SD' }}
    @elseif ($jenjang == 'smp')
        {{ 'SMP' }}
    @else
        {{ 'SMA / SMK' }}
    @endif
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
                        <div class="card-title">Ubah @if ($jenjang == 'sd')
                                {{ 'SD' }}
                            @elseif ($jenjang == 'smp')
                                {{ 'SMP' }}
                            @else
                                {{ 'SMA / SMK' }}
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @component('dashboard.components.forms.sekolah')
                        @slot('daftarDesa', $daftarDesa)
                        @slot('jenjang', $jenjang)
                        @slot('form_id', 'form-tambah')
                        @slot('action', url('/master-data/sekolah/' . $jenjang . '/' . $sekolah->id))
                        @slot('method', 'PUT')
                        @slot('back_url', url('/master-data/sekolah/' . $jenjang))
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#nama').val("{{ $sekolah->nama }}");
            $('#jenis').val("{{ $sekolah->jenis }}").trigger('change');
            $('#desa_id').val("{{ $sekolah->desa_id }}").trigger('change');
        })
    </script>

    <script>
        $('#nav-master-sekolah').addClass('active');
    </script>
@endpush
