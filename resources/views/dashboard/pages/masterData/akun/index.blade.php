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
    @component('dashboard.components.buttons.add',
        [
            'url' => url('master-data/akun/create'),
        ])
    @endcomponent
@endsection

@push('styles')
@endpush

@section('contents')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Data Akun</div>
                        <div class="card-tools">

                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-4">
                            @component('dashboard.components.formElements.select',
                                [
                                    'label' => 'OPD',
                                    'id' => 'opd_id',
                                    'name' => 'opd_id',
                                    'class' => 'select2 filter',
                                    'wajib' => '<sup class="text-danger">*</sup>',
                                ])
                                @slot('options')
                                    <option value="semua">Semua</option>
                                    @foreach ($daftarOpd as $opd)
                                        <option value="{{ $opd->id }}">{{ $opd->nama }}</option>
                                    @endforeach
                                @endslot
                            @endcomponent
                        </div>
                        <div class="col-4">
                            @component('dashboard.components.formElements.select',
                                [
                                    'label' => 'Role',
                                    'id' => 'role',
                                    'name' => 'role',
                                    'class' => 'select2 filter',
                                    'wajib' => '<sup class="text-danger">*</sup>',
                                ])
                                @slot('options')
                                    <option value="semua">Semua</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Pimpinan">Pimpinan</option>
                                    <option value="OPD">OPD</option>
                                @endslot
                            @endcomponent
                        </div>
                        <div class="col-4">
                            @component('dashboard.components.formElements.select',
                                [
                                    'label' => 'Status',
                                    'id' => 'status',
                                    'name' => 'status',
                                    'class' => 'select2 filter',
                                    'wajib' => '<sup class="text-danger">*</sup>',
                                ])
                                @slot('options')
                                    <option value="semua">Semua</option>
                                    <option value="1">Aktif</option>
                                    <option value="2">Tidak Aktif</option>
                                @endslot
                            @endcomponent
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="card fieldset">
                                @component('dashboard.components.dataTables.index',
                                    [
                                        'id' => 'table-data',
                                        'th' => ['No', 'Nama', 'Username', 'OPD', 'Role', 'Status', 'Aksi'],
                                    ])
                                @endcomponent
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
        $('.select2').select2({
            placeholder: "Semua",
            theme: "bootstrap",
        })
    </script>

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
                        url: "{{ url('master-data/akun') }}" + '/' + id,
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
            ajax: {
                url: "{{ url('master-data/akun') }}",
                data: function(d) {
                    d.opd_id = $('#opd_id').val();
                    d.role = $('#role').val();
                    d.status = $('#status').val();
                    d.search = $('input[type="search"]').val();
                },
            },
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
                    data: 'username',
                    name: 'username',
                },
                {
                    data: 'opd',
                    name: 'opd',
                },
                {
                    data: 'role',
                    name: 'role',
                },
                {
                    data: 'status',
                    name: 'status',
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
        $('.filter').change(function() {
            table.draw();
        })
        $('#nav-master-akun').addClass('active');
    </script>
@endpush
