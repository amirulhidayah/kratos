@extends('dashboard.layouts.main')

@section('title')
    Siswa {{ $sekolah->nama }}
@endsection

@section('titlePanelHeader')
    Siswa {{ $sekolah->nama }}
@endsection

@section('subTitlePanelHeader')
    {{-- Lorem ipsum dolor sit amet consectetur adipisicing elit. --}}
@endsection

@section('buttonPanelHeader')
    <a href="{{ url('master-data/sekolah' . '/' . $jenjang) }}" class="btn btn-secondary btn-round mr-2" id=""><i
            class="far fa-arrow-alt-circle-left"></i>
        Kembali</a>
    @if (Auth::user()->role == 'Admin')
        @component('dashboard.components.buttons.add',
            [
                'url' => url('master-data/siswa/' . $sekolah->id . '/create'),
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
                        <div class="card-title">Data Siswa {{ $sekolah->nama }}
                        </div>
                        <div class="card-tools">
                            <div class="row">
                                @if (Auth::user()->role == 'Admin')
                                    @component('dashboard.components.buttons.selected',
                                        [
                                            'id' => 'deleteSelected',
                                            'icon' => '<i class="fas fa-trash"></i>',
                                            'color' => 'danger',
                                            'title' => 'Hapus yang dipilih',
                                        ])
                                    @endcomponent
                                @endif
                                <form action="{{ url('master-data/siswa/' . $sekolah->id . '/export') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-info btn-border btn-round btn-sm ml-2 mr-2">
                                        <i class="fas fa-lg fa-download"></i>
                                        Export Data Siswa
                                    </button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <div class="card fieldset">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-striped" id="table-data" width="100%">
                                                <thead>
                                                    <tr class="text-center fw-bold">
                                                        <th><input type="checkbox" id="checkAllData" autocomplete="off" />
                                                        </th>
                                                        <td>No</td>
                                                        <td>Nama</td>
                                                        <td>NIK</td>
                                                        <td>Jenis Kelamin</td>
                                                        <td>Desa</td>
                                                        <td>Aksi</td>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-jumlah" role="tabpanel"
                            aria-labelledby="pills-jumlah-tab-nobd">
                            <div class="my-2">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" tabindex="-1" id="modal-lihat">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Penduduk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="d-flex justify-content-between mt-2">
                        <p class=" mb-0">Nama : </p>
                        <p id="nama">
                            -
                        </p>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <p class=" mb-0">NIK : </p>
                        <p id="nik">
                            -
                        </p>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <p class=" mb-0">Jenis Kelamin : </p>
                        <p id="jenis-kelamin">
                            -
                        </p>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <p class=" mb-0">Tempat, Tanggal Lahir : </p>
                        <p id="ttl">
                            -
                        </p>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <p class=" mb-0">Agama : </p>
                        <p id="agama">
                            -
                        </p>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <p class=" mb-0">Pendidikan Terakhir : </p>
                        <p id="pendidikan">
                            -
                        </p>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <p class=" mb-0">Pekerjaan : </p>
                        <p id="pekerjaan">
                            -
                        </p>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <p class=" mb-0">Golongan Darah : </p>
                        <p id="golongan-darah">
                            -
                        </p>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <p class=" mb-0">Status Perkawinan : </p>
                        <p id="status-perkawinan">
                            -
                        </p>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <p class=" mb-0">Tanggal Perkawinan : </p>
                        <p id="tanggal-perkawinan">
                            -
                        </p>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <p class=" mb-0">Kewarganegaraan : </p>
                        <p id="kewarganegaraan">
                            -
                        </p>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <p class=" mb-0">Nomor Paspor : </p>
                        <p id="nomor-paspor">
                            -
                        </p>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <p class=" mb-0">Nomor Kitap : </p>
                        <p id="nomor-kitap">
                            -
                        </p>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <p class=" mb-0">Alamat : </p>
                        <p id="alamat">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, repellat!
                        </p>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <p class=" mb-0">Desa : </p>
                        <p id="desa">
                            -
                        </p>
                    </div>
                </div>
                <div class="modal-footer">
                    @component('dashboard.components.buttons.close')
                    @endcomponent
                    @if (Auth::user()->role == 'Admin')
                        <a href="#" class="btn btn-warning" id="link-edit"><i class="fas fa-edit"></i> Ubah</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).on('click', '#btn-lihat', function() {
            let id = $(this).val();
            $.ajax({
                url: "{{ url('master-data/siswa/detail-siswa') }}",
                type: 'POST',
                data: {
                    'id': id,
                    '_token': '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.status == 'success') {
                        $('#nama').html(response.data.nama);
                        $('#nik').html(response.data.nik);
                        $('#jenis-kelamin').html(response.data.jenis_kelamin);
                        $('#ttl').html(response.data.ttl);
                        $('#agama').html(response.data.agama);
                        $('#pendidikan').html(response.data.pendidikan);
                        $('#pekerjaan').html(response.data.pekerjaan);
                        $('#golongan-darah').html(response.data.golongan_darah);
                        $('#status-perkawinan').html(response.data.status_perkawinan);
                        $('#tanggal-perkawinan').html(response.data.tanggal_perkawinan);
                        $('#kewarganegaraan').html(response.data.kewarganegaraan);
                        $('#nomor-paspor').html(response.data.no_paspor);
                        $('#nomor-kitap').html(response.data.no_kitap);
                        $('#alamat').html(response.data.alamat);
                        $('#desa').html(response.data.desa);
                        $('#modal-lihat').modal('show');
                        $("#link-edit").attr("href", "{{ url('master-data/penduduk') }}" + '/' + id +
                            '/edit');
                    }
                },
                error: function(response) {
                    swal("Gagal", "Data Gagal Diambil, Silahkan Coba Kembali", {
                        icon: "error",
                        buttons: false,
                        timer: 1000,
                    });
                }
            })
        })
    </script>

    <script>
        $('#deleteSelected').click(function() {
            var id = [];
            $('.checkData:checked').each(function() {
                id.push($(this).val());
            });
            if (id == '') {
                swal({
                    icon: 'error',
                    title: 'Gagal!',
                    text: 'Belum ada data yang dipilih!',
                })
            } else {
                swal({
                    title: 'Apakah Anda Yakin ?',
                    icon: 'error',
                    text: "Data yang sudah dihapus tidak dapat dikembalikan lagi !",
                    type: 'warning',
                    buttons: {
                        confirm: {
                            text: 'Hapus',
                            className: 'btn btn-success'
                        },
                        cancel: {
                            visible: true,
                            text: 'Batal',
                            className: 'btn btn-danger'
                        }
                    }
                }).then((Delete) => {
                    if (Delete) {
                        $.ajax({
                            url: "{{ url('master-data/siswa' . '/' . $sekolah->id . '/delete-selected') }}",
                            type: 'POST',
                            data: {
                                'id': id,
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
            }
        });

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
                        url: "{{ url('master-data/siswa' . '/' . $sekolah->id) }}" + '/' + id,
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
            ordering: false,
            ajax: "{{ url('master-data/siswa' . '/' . $sekolah->id) }}",
            columns: [{
                    data: 'checkData',
                    render: function(data, row, type) {
                        return '<input type="checkbox" class="checkData" value="' + data +
                            '">';
                    },
                    className: 'text-center',
                }, {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    class: 'text-center'
                },
                {
                    data: 'nama',
                    name: 'nama'
                },
                {
                    data: 'nik',
                    name: 'nik',
                    class: 'text-center'
                },
                {
                    data: 'jenis_kelamin',
                    name: 'jenis_kelamin',
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

        $('#checkAllData').click(function() {
            if ($(this).is(':checked')) {
                $('.checkData').prop('checked', true);
            } else {
                $('.checkData').prop('checked', false);
            }
        });

        var role = "{{ Auth::user()->role }}";

        $(document).ready(function() {
            if (role != "Admin") {
                table.column(0).visible(false);
            }
        })
    </script>

    <script>
        $('#nav-master-sekolah').addClass('active');
    </script>
@endpush
