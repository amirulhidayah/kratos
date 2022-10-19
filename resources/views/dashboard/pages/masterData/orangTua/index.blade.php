@extends('dashboard.layouts.main')

@section('title')
    Orang Tua
@endsection

@section('titlePanelHeader')
    Orang Tua
@endsection

@section('subTitlePanelHeader')
    {{-- Lorem ipsum dolor sit amet consectetur adipisicing elit. --}}
@endsection

@section('buttonPanelHeader')
    @if (Auth::user()->role == 'Admin')
        @component('dashboard.components.buttons.add',
            [
                'url' => url('master-data/orang-tua/create'),
            ])
        @endcomponent
    @endif
@endsection

@push('styles')
    <style>
        #peta {
            height: 600px;
            margin-top: 0px;
        }
    </style>
@endpush

@section('contents')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Data Orang Tua</div>
                        <div class="card-tools">
                            <div class="row">
                                <button type="submit" class="btn btn-info btn-border btn-round btn-sm mr-2 btn-export"
                                    id="btn-export">
                                    <i class="fas fa-lg fa-download"></i>
                                    Export Orang Tua
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <form action="{{ url('master-data/orang-tua/export') }}" method="POST" id="form-export">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        @component('dashboard.components.formElements.input',
                                            [
                                                'label' => 'Cari Data',
                                                'type' => 'text',
                                                'id' => 'nama_nik',
                                                'name' => 'nama_nik',
                                                'class' => '',
                                                // 'wajib' => '<sup class="text-danger">*</sup>',
                                                'placeholder' => 'Cari berdasarkan Nama Ibu / NIK Ibu / Nama Ayah / NIK Ayah',
                                            ])
                                        @endcomponent
                                    </div>
                                    <div class="col-sm-12 col-lg-6">
                                        @component('dashboard.components.formElements.select',
                                            [
                                                'label' => 'Kecamatan',
                                                'id' => 'kecamatan_id',
                                                'name' => 'kecamatan_id',
                                                'class' => 'select2 filter',
                                                // 'wajib' => '<sup class="text-danger">*</sup>',
                                            ])
                                            @slot('options')
                                                <option value="semua">Semua</option>
                                                @foreach ($daftarKecamatan as $kecamatan)
                                                    <option value="{{ $kecamatan->id }}">{{ $kecamatan->nama }}</option>
                                                @endforeach
                                            @endslot
                                        @endcomponent
                                    </div>
                                    <div class="col-sm-12 col-lg-6">
                                        @component('dashboard.components.formElements.select',
                                            [
                                                'label' => 'Desa',
                                                'id' => 'desa_id',
                                                'name' => 'desa_id',
                                                'class' => 'select2 filter',
                                                // 'wajib' => '<sup class="text-danger">*</sup>',
                                                'attribute' => 'disabled',
                                            ])
                                            @slot('options')
                                                <option value="semua">Semua</option>
                                                {{-- @foreach ($daftarDesa as $desa)
                                                        <option value="{{ $desa->id }}">{{ $desa->nama }}</option>
                                                    @endforeach --}}
                                            @endslot
                                        @endcomponent
                                    </div>
                                </div>
                            </form>
                            <div class="row mt-3">
                                <div class="col">
                                    <div class="card fieldset">
                                        @component('dashboard.components.dataTables.index',
                                            [
                                                'id' => 'table-data',
                                                'th' => [
                                                    'No',
                                                    'Nama Ibu',
                                                    'NIK Ibu',
                                                    'Nama Ayah',
                                                    'NIK Ayah',
                                                    'Kecamatan',
                                                    'Desa',
                                                    'RT',
                                                    'RW',
                                                    'Alamat',
                                                    'Jumlah Anak',
                                                    'Anak',
                                                    'Aksi',
                                                ],
                                                'class' => 'text-nowrap',
                                            ])
                                        @endcomponent
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
        $('.select2').select2({
            placeholder: "Semua",
            theme: "bootstrap",
        })
    </script>

    <script>
        $('.btn-export').click(function() {
            $('#form-export').submit();
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
                        url: "{{ url('master-data/orang-tua') }}" + '/' + id,
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
                                    initializeMap();
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
            searching: false,
            pageLength: 25,
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.12.1/i18n/id.json'
            },
            ajax: {
                url: "{{ url('master-data/orang-tua') }}",
                data: function(d) {
                    d.desa_id = $('#desa_id').val();
                    d.kecamatan_id = $('#kecamatan_id').val();
                    // d.search = $('input[type="search"]').val();
                    d.nama_nik = $('#nama_nik').val();
                },
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    class: 'text-center '
                },
                {
                    data: 'nama_ibu',
                    name: 'nama_ibu',
                    class: ''
                },
                {
                    data: 'nik_ibu',
                    name: 'nik_ibu',
                    class: 'text-center '
                },
                {
                    data: 'nama_ayah',
                    name: 'nama_ayah',
                    class: ''
                },
                {
                    data: 'nik_ayah',
                    name: 'nik_ayah',
                    class: 'text-center '
                },
                {
                    data: 'kecamatan',
                    name: 'kecamatan',
                    class: 'text-center '
                },
                {
                    data: 'desa',
                    name: 'desa',
                    class: 'text-center '
                },
                {
                    data: 'rt',
                    name: 'rt',
                    class: 'text-center '
                },
                {
                    data: 'rw',
                    name: 'rw',
                    class: 'text-center '
                },
                {
                    data: 'alamat',
                    name: 'alamat ',
                    class: ''
                },
                {
                    data: 'jumlah_anak',
                    name: 'jumlah_anak',
                    class: 'text-center '
                },
                {
                    data: 'anak',
                    name: 'anak',
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true,
                    class: 'text-center '
                },
            ]
        });
    </script>

    <script>
        $(document).on('change', '#kecamatan_id', function() {
            $('#desa_id').html('')
            $('#desa_id').attr('disabled', false)
            $('#desa_id').append('<option value="semua">Semua</option>')
            $('#desa_id').val('').trigger('change');
            $.ajax({
                url: "{{ url('list/desa') }}",
                type: 'GET',
                data: {
                    'kecamatan': $(this).val()
                },
                success: function(response) {
                    response.data.map((data) => {
                        $('#desa_id').append('<option value="' + data.id + '">' +
                            data
                            .nama + '</option>');
                    });
                }
            })
        })
    </script>

    <script>
        $('#desa_id').change(function() {
            $('#export').val($(this).val());
        })

        $('#nama_nik').keyup(function() {
            table.draw();
        });

        $(".filter").change(function() {
            table.draw();
        })
    </script>

    <script>
        $('#nav-master-orang-tua').addClass('active');
    </script>
@endpush
