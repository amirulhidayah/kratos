@extends('dashboard.layouts.main')

@section('title')
    Anak
@endsection

@section('titlePanelHeader')
    Anak
@endsection

@section('subTitlePanelHeader')
    {{-- Lorem ipsum dolor sit amet consectetur adipisicing elit. --}}
@endsection

@section('buttonPanelHeader')
    <a href="{{ url('master-data/orang-tua') }}" class="btn btn-secondary btn-round" id=""><i
            class="far fa-arrow-alt-circle-left"></i>
        Kembali</a>
    @if (Auth::user()->role == 'Admin')
        @component('dashboard.components.buttons.add',
            [
                'url' => url('master-data/orang-tua/anak/' . $orangTua->id . '/create'),
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
                        <div class="card-title">Data Anak</div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="row mt-3">
                                <div class="col">
                                    <div class="card fieldset">
                                        @component('dashboard.components.dataTables.index',
                                            [
                                                'id' => 'table-data',
                                                'th' => [
                                                    'No',
                                                    'Nama',
                                                    'NIK',
                                                    'Jenis Kelamin',
                                                    'Tanggal Lahir',
                                                    'BB Lahir',
                                                    'TB Lahir',
                                                    'Orang Tua',
                                                    'Kecamatan',
                                                    'Desa',
                                                    'Alamat',
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

    @component('dashboard.components.modals.detailAnak')
    @endcomponent
@endsection

@push('scripts')
    <script>
        $('.select2').select2({
            placeholder: "Semua",
            theme: "bootstrap",
        })
    </script>

    <script>
        $('#export-jumlah-penduduk').hide();

        $('.btn-export').click(function() {
            $('#form-export').submit();
        })

        $('#pills-profile-tab-nobd').click(function() {
            $('#form-export').attr('action', "{{ url('master-data/anak/export') }}");
            $('#export-penduduk').show();
            $('#export-jumlah-penduduk').hide();
        })

        $('#pills-jumlah-tab-nobd').click(function() {
            $('#form-export').attr('action', "{{ url('master-data/anak/export-jumlah') }}");
            $('#export-penduduk').hide();
            $('#export-jumlah-penduduk').show();
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
                        url: "{{ url('master-data/orang-tua/anak/' . $orangTua->id) }}" + '/' + id,
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
            ajax: {
                url: "{{ url('master-data/orang-tua/anak/' . $orangTua->id) }}",
                data: function(d) {
                    d.desa_id = $('#desa_id').val();
                    d.kecamatan_id = $('#kecamatan_id').val();
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
                    data: 'tanggal_lahir',
                    name: 'tanggal_lahir',
                    class: 'text-center'
                },
                {
                    data: 'bb_lahir',
                    name: 'bb_lahir',
                    class: 'text-center'
                },
                {
                    data: 'tb_lahir',
                    name: 'tb_lahir',
                    class: 'text-center'
                },
                {
                    data: 'orang_tua',
                    name: 'orang_tua',
                },
                {
                    data: 'kecamatan',
                    name: 'kecamatan',
                    class: 'text-center'
                },
                {
                    data: 'desa',
                    name: 'desa',
                    class: 'text-center'
                },

                {
                    data: 'alamat',
                    name: 'alamat',
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

        $(".filter").change(function() {
            table.draw();
            getJumlahPenduduk();
        })

        let getJumlahPenduduk = () => {
            $.ajax({
                url: "{{ url('master-data/anak/jumlah-penduduk') }}",
                type: 'GET',
                data: {
                    desa_id: $('#desa_id').val(),
                    kecamatan_id: $('#kecamatan_id').val(),
                },
                success: function(response) {
                    $('#wilayah').html(response.wilayah);
                    $('#nama-wilayah').html(response.nama_wilayah);
                    $('#total-penduduk').html(response.total_penduduk);
                    $('#tidak-sekolah').html(response.tidak_sekolah);
                    $('#sd').html(response.sd);
                    $('#smp').html(response.smp);
                    $('#sma').html(response.sma);
                    $('#diploma-1').html(response.diploma_1);
                    $('#diploma-2').html(response.diploma_2);
                    $('#diploma-3').html(response.diploma_3);
                    $('#s1').html(response.s1);
                    $('#s2').html(response.s2);
                    $('#s3').html(response.s3);
                    $('#tidak-bekerja').html(response.tidak_bekerja);
                    $('#irt').html(response.irt);
                    $('#karyawan-swasta').html(response.karyawan_swasta);
                    $('#pns').html(response.pns);
                    $('#wiraswasta').html(response.wiraswasta);
                    $('#petani').html(response.petani);
                    $('#pelajar').html(response.pelajar);
                    $('#baduta').html(response.baduta);
                    $('#balita').html(response.balita);
                    $('#anak').html(response.anak);
                    $('#remaja').html(response.remaja);
                    $('#dewasa').html(response.dewasa);
                    $('#lansia').html(response.lansia);
                    $('#penduduk-laki-laki').html(response.penduduk_laki_laki);
                    $('#penduduk-perempuan').html(response.penduduk_perempuan);
                    $('#pekerjaan-tidak-tetap').html(response.pekerjaan_tidak_tetap);
                }
            })
        }
    </script>

    <script>
        $('#nav-master-orang-tua').addClass('active');

        $(document).ready(function() {
            getJumlahPenduduk();
        })
    </script>
@endpush
