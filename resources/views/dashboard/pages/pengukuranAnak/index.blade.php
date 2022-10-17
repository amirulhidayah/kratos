@extends('dashboard.layouts.main')

@section('title')
    Daftar Pengukuran Anak
@endsection

@section('titlePanelHeader')
    Daftar Pengukuran Anak | {{ $anak->nama . '(' . $anak->nik . ')' }}
@endsection

@section('subTitlePanelHeader')
    {{-- Lorem ipsum dolor sit amet consectetur adipisicing elit. --}}
@endsection

@section('buttonPanelHeader')
    <a href="{{ url('daftar-pengukuran-anak') }}" class="btn btn-secondary btn-round" id=""><i
            class="far fa-arrow-alt-circle-left"></i>
        Kembali</a>
    @if (Auth::user()->role == 'Admin')
        @component('dashboard.components.buttons.add',
            [
                'url' => url('pengukuran-anak/' . $anak->id . '/create'),
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
                        <div class="card-title">Daftar Pengukuran Anak</div>
                        <div class="card-tools">
                            <div class="row">
                                <button type="submit" class="btn btn-info btn-border btn-round btn-sm mr-2 btn-export"
                                    id="export-penduduk" value="" name="desa_id">
                                    <i class="fas fa-lg fa-download"></i>
                                    Export Pengukuran Anak
                                </button>

                                <button type="submit" class="btn btn-info btn-border btn-round btn-sm mr-2 btn-export"
                                    id="export-jumlah-penduduk">
                                    <i class="fas fa-lg fa-download"></i>
                                    Export Demografi
                                </button>
                            </div>

                        </div>
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
                                                    'Tanggal Pengukuran',
                                                    'PUSKESMAS',
                                                    'POSYANDU',
                                                    'Usia Saat Ukur',
                                                    'Berat',
                                                    'Tinggi',
                                                    'Lila',
                                                    'BB/U',
                                                    'TB/U',
                                                    'BB/TB',
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
        $('#export-jumlah-penduduk').hide();

        $('.btn-export').click(function() {
            $('#form-export').submit();
        })

        $('#pills-profile-tab-nobd').click(function() {
            $('#form-export').attr('action', "{{ url('pengukuran-anak/export') }}");
            $('#export-penduduk').show();
            $('#export-jumlah-penduduk').hide();
        })

        $('#pills-jumlah-tab-nobd').click(function() {
            $('#form-export').attr('action', "{{ url('pengukuran-anak/export-jumlah') }}");
            $('#export-penduduk').hide();
            $('#export-jumlah-penduduk').show();
        })
    </script>

    <script>
        $(document).on('click', '#btn-lihat', function() {
            let id = $(this).val();
            $.ajax({
                url: "{{ url('pengukuran-anak') }}" + '/' + id,
                type: 'GET',
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
                        $("#link-edit").attr("href", "{{ url('pengukuran-anak') }}" + '/' + id +
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
                        url: "{{ url('pengukuran-anak/' . $anak->id) }}" + '/' + id,
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
            ajax: {
                url: "{{ url('pengukuran-anak/' . $anak->id) }}",
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
                    class: 'text-center'
                },
                {
                    data: 'tanggal_pengukuran',
                    name: 'tanggal_pengukuran',
                    class: 'text-center'
                },
                {
                    data: 'puskesmas',
                    name: 'puskesmas',
                    class: 'text-center'
                },
                {
                    data: 'posyandu',
                    name: 'posyandu',
                    class: 'text-center'
                },
                {
                    data: 'usia_saat_ukur',
                    name: 'usia_saat_ukur',
                    class: 'text-center'
                },
                {
                    data: 'berat',
                    name: 'berat',
                    class: 'text-center'
                },
                {
                    data: 'tinggi',
                    name: 'tinggi',
                    class: 'text-center'
                },
                {
                    data: 'lila',
                    name: 'lila',
                    class: 'text-center'
                },
                {
                    data: 'bb_u',
                    name: 'bb_u',
                    class: 'text-center'
                },
                {
                    data: 'tb_u',
                    name: 'tb_u',
                    class: 'text-center'
                },
                {
                    data: 'bb_tb',
                    name: 'bb_tb',
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
            // getJumlahPenduduk();
        })

        let getJumlahPenduduk = () => {
            $.ajax({
                url: "{{ url('pengukuran-anak/jumlah-penduduk') }}",
                type: 'GET',
                data: {
                    desa_id: $('#desa_id').val(),
                    kecamatan_id: $('#kecamatan_id').val(),
                    nama_nik: $('#nama_nik').val()
                },
                success: function(response) {
                    console.log(response);
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
        $('#nav-pengukuran-anak').addClass('active');

        $(document).ready(function() {
            getJumlahPenduduk();
        })
    </script>
@endpush
