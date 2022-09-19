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
    <a href="{{ url('master-data/jenjang-sekolah') }}" class="btn btn-secondary btn-round" id=""><i
            class="far fa-arrow-alt-circle-left"></i>
        Kembali</a>
    @if (Auth::user()->role == 'Admin')
        @component('dashboard.components.buttons.add',
            [
                'url' => url('master-data/sekolah/' . $jenjang . '/create'),
            ])
        @endcomponent
    @endif
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
                        <div class="card-title">Data
                            @if ($jenjang == 'sd')
                                {{ 'SD' }}
                            @elseif ($jenjang == 'smp')
                                {{ 'SMP' }}
                            @else
                                {{ 'SMA / SMK' }}
                            @endif
                        </div>
                        <div class="card-tools">
                            <form action="{{ url('master-data/sekolah/' . $jenjang . '/export') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-info btn-border btn-round btn-sm mr-2">
                                    <i class="fas fa-lg fa-download"></i>
                                    Export Jumlah Data
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <ul class="nav nav-pills nav-secondary nav-pills-no-bd mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-profile-tab-nobd" data-toggle="pill"
                                        href="#pills-tabel" role="tab" aria-controls="pills-tabel"
                                        aria-selected="false">Tabel</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-jumlah-tab-nobd" data-toggle="pill" href="#pills-jumlah"
                                        role="tab" aria-controls="pills-jumlah" aria-selected="false">Jumlah
                                        Data</a>
                                </li>
                            </ul>
                            <div class="tab-content mb-3" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-tabel" role="tabpanel"
                                    aria-labelledby="pills-profile-tab-nobd">
                                    <div class="row mt-5">
                                        <div class="col">
                                            <div class="card fieldset">
                                                @component('dashboard.components.dataTables.index',
                                                    [
                                                        'id' => 'table-data',
                                                        'th' => ['No', 'Nama', 'Jenis', 'Desa', 'Aksi'],
                                                    ])
                                                @endcomponent
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-jumlah" role="tabpanel"
                                    aria-labelledby="pills-jumlah-tab-nobd">
                                    <div class="my-2">
                                        <div class="row">
                                            @foreach ($jumlahData as $jumlah)
                                                <div class="col-sm-6 col-md-4">
                                                    <div class="card card-stats card-round border">
                                                        <div class="card-body ">
                                                            <div class="row">
                                                                <div class="col-4">
                                                                    <div class="icon-big text-center">
                                                                        <i class="flaticon-agenda text-primary"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="col-8 col-stats">
                                                                    <div class="numbers">
                                                                        <p class="card-category">Sekolah</p>
                                                                        <h4 class="card-title">{{ $jumlah['sekolah'] }}
                                                                        </h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex justify-content-between mt-2">
                                                                <p class=" mb-0">Jenis Sekolah : </p>
                                                                <p class="badge bg-primary text-light border-0 mb-0">
                                                                    {{ $jumlah['jenis'] }}
                                                                </p>
                                                            </div>
                                                            <div class="d-flex justify-content-between mt-2">
                                                                <p class=" mb-0">Desa : </p>
                                                                <p class="badge bg-primary text-light border-0 mb-0">
                                                                    {{ $jumlah['desa'] }}
                                                                </p>
                                                            </div>
                                                            <hr>
                                                            <div class="d-flex justify-content-center mt-2">
                                                                <p class="fw-bold mb-0">Jumlah Data</p>
                                                            </div>
                                                            <div class="d-flex justify-content-between mt-2">
                                                                <p class=" mb-0">Jumlah Siswa : </p>
                                                                <p class="badge bg-primary text-light border-0 mb-0">
                                                                    {{ $jumlah['total_siswa'] }}
                                                                </p>
                                                            </div>
                                                            <hr>
                                                            <div class="d-flex justify-content-center mt-2">
                                                                <p class="fw-bold mb-0">Jumlah Siswa Berdasarkan Jenis
                                                                    Kelamin</p>
                                                            </div>
                                                            <div class="d-flex justify-content-between mt-2">
                                                                <p class=" mb-0">Laki - Laki : </p>
                                                                <p class="badge bg-primary text-light border-0 mb-0">
                                                                    {{ $jumlah['siswa_laki'] }}
                                                                </p>
                                                            </div>
                                                            <div class="d-flex justify-content-between mt-2">
                                                                <p class=" mb-0">Perempuan : </p>
                                                                <p class="badge bg-primary text-light border-0 mb-0">
                                                                    {{ $jumlah['siswa_perempuan'] }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).on('click', '#btn-delete', function() {
            let id = $(this).val();
            swal({
                title: 'Apakah Anda Yakin ?',
                icon: 'error',
                text: "Data yang sudah dihapus tidak dapat dikembalikan lagi !",
                type: 'warning',
                buttons: {
                    cancel: {
                        visible: true,
                        text: 'Batal',
                        className: 'btn btn-light'
                    },
                    confirm: {
                        text: 'Hapus',
                        className: 'btn btn-danger'
                    },
                }
            }).then((Delete) => {
                if (Delete) {
                    $.ajax({
                        url: "{{ url('master-data/sekolah' . '/' . $jenjang) }}" + '/' + id,
                        type: 'DELETE',
                        data: {
                            '_token': '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            if (response.status == 'success') {
                                swal("Berhasil", "Data Berhasil Dihapus", {
                                    icon: "success",
                                    buttons: false,
                                    timer: 1000,
                                }).then(function() {
                                    table.draw();
                                })
                            } else {
                                swal("Gagal", "Data Gagal Dihapus", {
                                    icon: "error",
                                    buttons: false,
                                    timer: 1000,
                                });
                            }
                        },
                        error: function(response) {
                            swal("Gagal", "Data Gagal Diproses, Silahkan Coba Kembali", {
                                icon: "error",
                                buttons: false,
                                timer: 1000,
                            });
                        }
                    })
                }
            });
        })
    </script>

    <script>
        var table = $('#table-data').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('master-data/sekolah' . '/' . $jenjang) }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    class: 'text-center'
                },
                {
                    data: 'nama',
                    name: 'nama'
                },
                {
                    data: 'jenis',
                    name: 'jenis',
                    class: 'text-center'
                },
                {
                    data: 'desa',
                    name: 'desa',
                    class: 'text-center'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true,
                    class: 'text-center'
                },
            ]
        });
    </script>

    <script>
        $('#nav-master-sekolah').addClass('active');
    </script>
@endpush
