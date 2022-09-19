@extends('dashboard.layouts.main')

@section('title')
    Ubah Penduduk
@endsection

@section('titlePanelHeader')
    Ubah Penduduk
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
                        <div class="card-title">Ubah Penduduk</div>
                    </div>
                </div>
                <div class="card-body">
                    @component('dashboard.components.forms.penduduk')
                        @slot('daftarDesa', $daftarDesa)
                        @slot('form_id', 'form-tambah')
                        @slot('action', url('/master-data/penduduk/' . $data['id']))
                        @slot('method', 'PUT')
                        @slot('back_url', url('/master-data/penduduk'))
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#nama').val("{{ $data['nama'] }}");
            $('#nik').val("{{ $data['nik'] }}");
            $('#jenis_kelamin').val("{{ $data['jenis_kelamin'] }}").trigger('change');
            $('#tempat_lahir').val("{{ $data['tempat_lahir'] }}");
            $('#tanggal_lahir').val("{{ $data['tanggal_lahir'] }}");
            $('#agama').val("{{ $data['agama'] }}").trigger('change');
            $('#status_pendidikan').val("{{ $data['status_pendidikan'] }}").trigger('change');
            $('#golongan_darah').val("{{ $data['golongan_darah'] }}").trigger('change');
            $('#status_perkawinan').val("{{ $data['status_perkawinan'] }}").trigger('change');
            $('#tanggal_perkawinan').val("{{ $data['tanggal_perkawinan'] }}");
            $('#pekerjaan').val("{{ $data['pekerjaan'] }}").trigger('change');
            $("input[name=kewarganegaraan][value=" + "{{ $data['kewarganegaraan'] }}" + "]").prop('checked', true);
            // $('#kewarganegaraan').val("{{ $data['kewarganegaraan'] }}");
            $('#no_paspor').val("{{ $data['no_paspor'] }}");
            $('#no_kitap').val("{{ $data['no_kitap'] }}");
            $('#alamat').val("{{ $data['alamat'] }}");
            $('#desa_id').val("{{ $data['desa_id'] }}").trigger('change');
        })
    </script>

    <script>
        $('#nav-master-penduduk').addClass('active');
    </script>
@endpush
