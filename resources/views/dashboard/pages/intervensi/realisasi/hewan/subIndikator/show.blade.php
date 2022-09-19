@extends('dashboard.layouts.main')

@section('title')
    Realisasi Intervensi Lokasi Hewan Ternak
@endsection

@section('titlePanelHeader')
    Laporan Realisasi Intervensi Lokasi Hewan Ternak
@endsection

@section('subTitlePanelHeader')
    {{ $rencana_intervensi_hewan->sub_indikator }}
@endsection

@section('buttonPanelHeader')
    <a href="{{ url('/realisasi-intervensi-hewan') }}" class="btn btn-secondary btn-round mr-2"><i
            class="fas fa-arrow-left mr-1"></i>
        Kembali</a>
    @if (Auth::user()->role == 'OPD' && Auth::user()->opd_id == $rencana_intervensi_hewan->opd_id)
        <a href="{{ url('realisasi-intervensi-hewan/create-pelaporan/' . $rencana_intervensi_hewan->id) }}"
            class="btn btn-secondary btn-round"><i class="fas fa-plus"></i>
            Tambah</a>
    @endif
@endsection

@push('styles')
    <style>
        #peta {
            height: 600px;
            margin-top: 0px;
        }

        #tabelLokasi_wrapper .dataTables_filter {
            width: 100% !important;
            margin-bottom: 10px !important;
            text-align: center !important;
        }

        .select2-container {
            width: 100% !important;
            padding: 0;
        }
    </style>
@endpush

@section('contents')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Data Laporan Realisasi | <span
                                class="font-weight-bold">{{ $rencana_intervensi_hewan->opd->nama }}</span></div>
                        <div class="card-tools">
                            @if ($rencana_intervensi_hewan->realisasiHewan->count() > 0 && Auth::user()->role == 'Admin')
                                <button id="btn-delete-all"
                                    class="btn btn-danger btn-border font-weight-bold btn-round btn-sm mr-2 {{ $class ?? '' }}"
                                    value="{{ $rencana_intervensi_hewan->id }}">
                                    <i class="fas
                                    fa-trash"></i>
                                    Hapus Semua Laporan
                                </button>
                            @endif
                            <a href="{{ route('rencana-intervensi-hewan.show', $rencana_intervensi_hewan->id) }}"
                                class="btn btn-info btn-border font-weight-bold btn-round btn-sm mr-2 {{ $class ?? '' }} id={{ $id ?? '' }}"
                                target="_blank">
                                <i class="fas fa-eye"></i>
                                Lihat Data Perencanaan
                            </a>

                        </div>
                    </div>
                </div>
                <div class="card-body px-2">
                    @if (Auth::user()->role == 'OPD' && Auth::user()->opd_id != $rencana_intervensi_hewan->opd_id)
                        <div class="row">
                            <div class="col">
                                <div class="alert alert-info mx-2 font-weight-bold" role="alert">Info : <span
                                        class="text-info">Anda hanya dapat melihat data laporan. Karena yang dapat
                                        mengajukan pelaporan pada sub indikator ini hanyalah
                                        {{ $rencana_intervensi_hewan->opd->nama }}.</span></div>
                            </div>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-hover table-striped" id="tableLaporan" cellspacing="0" width="100%">
                            <thead>
                                <tr class="text-center fw-bold">
                                    <th>No</th>
                                    <th>Tanggal Laporan</th>
                                    <th>Jumlah Lokasi</th>
                                    <th>Penggunaan Anggaran</th>
                                    <th>Progress</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-head-row">
                                <div class="card-title">Progress Berdasarkan TW</div>
                            </div>
                        </div>
                        <div class="card-body">
                            @if ($rencana_intervensi_hewan->realisasiHewan->where('status', 1)->count() > 0)
                                @if ($tw4 != null)
                                    <div class="progress-card mb-2">
                                        <div class="progress-status mb-1">
                                            <span class="font-weight-normal">TW 4</span>
                                            <span class="text-muted fw-bold"> {{ $tw4 }}%</span>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped @if ($tw4 > 0 && $tw4 <= 25) bg-danger
                                            @elseif($tw4 > 25 && $tw4 <= 50)
                                                bg-warning
                                            @elseif($tw4 > 50 && $tw4 <= 75)
                                                bg-info
                                            @elseif($tw4 > 75 && $tw4 <= 100)
                                                bg-success @endif"
                                                role="progressbar" style="width: {{ $tw4 }}%"
                                                aria-valuenow="{{ $tw4 }}" aria-valuemin="0" aria-valuemax="100"
                                                data-toggle="tooltip" data-placement="top" title=""
                                                data-original-title="{{ $tw4 }}%">
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if ($tw3 != null)
                                    <div class="progress-card mb-2">
                                        <div class="progress-status mb-1">
                                            <span class="font-weight-normal">TW 3</span>
                                            <span class="text-muted fw-bold"> {{ $tw3 }}%</span>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped @if ($tw3 > 0 && $tw3 <= 25) bg-danger
                                            @elseif($tw3 > 25 && $tw3 <= 50)
                                                bg-warning
                                            @elseif($tw3 > 50 && $tw3 <= 75)
                                                bg-info
                                            @elseif($tw3 > 75 && $tw3 <= 100)
                                                bg-success @endif"
                                                role="progressbar" style="width: {{ $tw3 }}%"
                                                aria-valuenow="{{ $tw3 }}" aria-valuemin="0" aria-valuemax="100"
                                                data-toggle="tooltip" data-placement="top" title=""
                                                data-original-title="{{ $tw3 }}%">
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if ($tw2 != null)
                                    <div class="progress-card mb-2">
                                        <div class="progress-status mb-1">
                                            <span class="font-weight-normal">TW 2</span>
                                            <span class="text-muted fw-bold"> {{ $tw2 }}%</span>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped @if ($tw2 > 0 && $tw2 <= 25) bg-danger
                                            @elseif($tw2 > 25 && $tw2 <= 50)
                                                bg-warning
                                            @elseif($tw2 > 50 && $tw2 <= 75)
                                                bg-info
                                            @elseif($tw2 > 75 && $tw2 <= 100)
                                                bg-success @endif"
                                                role="progressbar" style="width: {{ $tw2 }}%"
                                                aria-valuenow="{{ $tw2 }}" aria-valuemin="0" aria-valuemax="100"
                                                data-toggle="tooltip" data-placement="top" title=""
                                                data-original-title="{{ $tw2 }}%">
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if ($tw1 != null)
                                    <div class="progress-card mb-2">
                                        <div class="progress-status mb-1">
                                            <span class="font-weight-normal">TW 1</span>
                                            <span class="text-muted fw-bold"> {{ $tw1 }}%</span>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped @if ($tw1 > 0 && $tw1 <= 25) bg-danger
                                            @elseif($tw1 > 25 && $tw1 <= 50)
                                                bg-warning
                                            @elseif($tw1 > 50 && $tw1 <= 75)
                                                bg-info
                                            @elseif($tw1 > 75 && $tw1 <= 100)
                                                bg-success @endif
                                                role="progressbar"
                                                style="width: {{ $tw1 }}%" aria-valuenow="{{ $tw1 }}"
                                                aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip"
                                                data-placement="top" title=""
                                                data-original-title="{{ $tw1 }}%">
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @else
                                <div class="text-center text-muted">
                                    <i>Tidak ada data</i>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-head-row">
                                <div class="card-title">Penggunaan Anggaran</div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <ul class="list-group list-group-bordered">
                                <li class="list-group-item d-flex justify-content-between align-items-center p-2">Nilai
                                    Anggaran:<span class="font-weight-bold">Rp. <span id="pagu-awal"
                                            class="rupiah">{{ $rencana_intervensi_hewan->nilai_pembiayaan }}</span></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-2">
                                    Penggunaan Anggaran:<span class="font-weight-bold">Rp. <span id="penggunaan-anggaran"
                                            class="rupiah">{{ $countPenggunaanAnggaran }}</span></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-2">
                                    Sisa Anggaran:<span class="font-weight-bold">Rp. <span id="sisa-anggaran"
                                            class="rupiah">{{ $countSisaAnggaran }}</span></span>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-head-row">
                                <div class="card-title">OPD Terkait Realisasi</div>
                                <div class="card-tools">
                                    @if (Auth::user()->role == 'Admin' || Auth::user()->opd_id == $rencana_intervensi_hewan->opd_id)
                                        <button type="button"
                                            class="btn btn-info btn-border font-weight-bold btn-sm btn-round"
                                            data-toggle="modal" data-target="#btnTambahOPD">
                                            <i class="fas fa-plus"></i> Tambah OPD
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            @forelse ($rencana_intervensi_hewan->opdTerkaitHewan as $item)
                                <ul class="list-group list-group-bordered">
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-center font-weight-bold">
                                        {{ $loop->iteration }}. {{ $item->opd->nama }}
                                        @if (Auth::user()->role == 'Admin' || Auth::user()->opd_id == $rencana_intervensi_hewan->opd_id)
                                            <button data-id={{ $item->id }} class="badge badge-danger delete-opd"
                                                data-toggle="tooltip" data-placement="top" title="Hapus"
                                                style="cursor: pointer">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        @endif
                                    </li>
                                </ul>
                            @empty
                                <div class="text-center text-muted">
                                    <i>Tidak ada data</i>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-md-4 order-md-2">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Status Lokasi Realisasi</div>
                    </div>
                </div>
                <div class="card-body px-2">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped" id="tabelLokasi" cellspacing="0" width="100%">
                            <thead>
                                <tr class="text-center fw-bold">
                                    <th>No</th>
                                    <th>Nama Lokasi</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rencana_intervensi_hewan->lokasiPerencanaanHewan as $item)
                                    <tr>
                                        <td class="text-center">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>{{ $item->lokasiHewan->nama }}</td>
                                        <td class="text-center">
                                            @if ($item->realisasi_hewan_id == null && $item->status == 0)
                                                <span class="badge badge-dark">Belum Terealisasi</span>
                                            @elseif($item->realisasi_hewan_id != null && $item->status == 0)
                                                <span class="badge badge-warning">Menunggu Konfirmasi</span>
                                            @elseif($item->realisasi_hewan_id != null && $item->status == 1)
                                                <span class="badge badge-success">Sudah Terealisasi</span>
                                            @elseif($item->realisasi_hewan_id != null && $item->status == 2)
                                                <span class="badge badge-danger">Ditolak</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Titik Koordinat Realisasi Intervensi Lokasi Hewan Ternak</div>

                    </div>
                </div>
                <div class="card-body">
                    <div id="peta"></div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal OPD --}}
    <div class="modal fade" id="btnTambahOPD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah OPD Terkait</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="#" id="{{ $form ?? 'form' }}" method="POST" enctype="multipart/form-data"
                    autocomplete="off">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group p-0">
                            <label class="my-2">Pilih OPD Terkait <span class="text-info">(Bisa lebih dari
                                    satu)</span></label>
                            <div class="select2-input select2-primary">
                                <input type="hidden" name="opd_terkait_hidden" id="opd-terkait-hidden"
                                    data-label="OPD Terkait" value="">
                                <select id="opd-terkait" name="opd_terkait[]" class="form-control multiple"
                                    multiple="multiple" data-label="OPD Terkait">
                                    @foreach ($opd as $item3)
                                        <option value="{{ $item3->id }}">{{ $item3->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <span class="text-danger error-text opd_terkait_hidden-error"></span>
                            <span class="text-danger error-text opd_terkait-error"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary"><i class="fas fa-save"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $('#nav-realisasi').addClass('active');
        $('#nav-realisasi .collapse').addClass('show');
        $('#nav-realisasi .collapse #li-hewan-2').addClass('active');

        $('.multiple').select2({
            placeholder: "- Pilih OPD -",
            theme: "bootstrap",
        })

        $(document).on('click', '#btn-delete-all', function() {
            let id = $(this).val()
            var _token = "{{ csrf_token() }}";
            swal({
                title: 'Apakah anda yakin ingin menghapus semua laporan ?',
                text: "Semua data akan dihapus!",
                icon: "warning",
                dangerMode: true,
                buttons: ["Batal", "Ya"],
            }).then((result) => {
                if (result) {
                    $.ajax({
                        type: 'DELETE',
                        url: "{{ url('realisasi-intervensi-hewan/delete-semua-laporan') }}" + '/' +
                            id,
                        data: {
                            _token: _token
                        },
                        success: function(data) {
                            swal({
                                title: "Berhasil!",
                                text: "Data berhasil dihapus.",
                                icon: "success",
                            }).then(function() {
                                location.reload();
                            });
                        }
                    })
                } else {
                    swal("Data batal dihapus.", {
                        icon: "error",
                    });
                }
            })
        });


        $(document).on('click', '.btn-delete', function() {
            let id = $(this).val()
            var _token = "{{ csrf_token() }}";
            swal({
                title: 'Apakah anda yakin ingin menghapus laporan yang dipilih?',
                text: "Data yang dipilih akan dihapus!",
                icon: "warning",
                dangerMode: true,
                buttons: ["Batal", "Ya"],
            }).then((result) => {
                if (result) {
                    $.ajax({
                        type: 'DELETE',
                        url: "{{ url('realisasi-intervensi-hewan/delete-laporan') }}" + '/' + id,
                        data: {
                            _token: _token
                        },
                        success: function(data) {
                            swal({
                                title: "Berhasil!",
                                text: "Data yang dipilih berhasil dihapus.",
                                icon: "success",
                            }).then(function() {
                                tableLaporan.ajax.reload();
                            });
                        }
                    })
                } else {
                    swal("Data batal dihapus.", {
                        icon: "error",
                    });
                }
            })
        });


        $('.delete-opd').click(function() {
            let id = $(this).data('id')
            var _token = "{{ csrf_token() }}";
            swal({
                title: 'Apakah anda yakin ingin menghapus OPT terkait?',
                text: "Data yang dipilih akan dihapus!",
                icon: "warning",
                dangerMode: true,
                buttons: ["Batal", "Ya"],
            }).then((result) => {
                if (result) {
                    $.ajax({
                        type: 'DELETE',
                        url: "{{ url('realisasi-intervensi-hewan/delete-opd') }}" + '/' + id,
                        data: {
                            _token: _token
                        },
                        success: function(data) {
                            swal({
                                title: "Berhasil!",
                                text: "Data yang dipilih berhasil dihapus.",
                                icon: "success",
                            }).then(function() {
                                location.reload();
                            });
                        }
                    })
                } else {
                    swal("Data batal dihapus.", {
                        icon: "error",
                    });
                }
            })
            // alert($(this).data('id'))
        })

        $('#form').submit(function(e) {
            e.preventDefault();
            clearTextError()

            $('#opd-terkait').val() == '' ? $('#opd-terkait-hidden').addClass('req') : $('#opd-terkait-hidden')
                .removeClass('req');

            const formValidation = $('#form .req').serializeArray()
            validation(formValidation)

            let formData = new FormData(this)

            swal({
                title: 'Simpan Data ?',
                icon: "info",
                buttons: ["Batal", "Ya"],
            }).then((result) => {
                if (result) {
                    $.ajax({
                        type: "POST",
                        url: "{{ url('realisasi-intervensi-hewan/update-opd/' . $rencana_intervensi_hewan->id) }}",
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        data: formData,
                        cache: false,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            if ($.isEmptyObject(response.error)) {
                                swal({
                                    title: "Berhasil!",
                                    text: "Data berhasil disimpan.",
                                    icon: "success",
                                }).then((value) => {
                                    window.location.reload()
                                });

                            } else {
                                swal({
                                    title: "Gagal!",
                                    text: "Terjadi kesalahan, mohon periksa kembali data yang diinputkan.",
                                    icon: "error",
                                    button: "Ok",
                                });
                                printErrorMsg(response.error);
                            }
                        },
                        error: function(response) {
                            overlay.hide();
                            swal({
                                title: "Coba kembali",
                                text: "Maaf, terjadi kesalahan pengiriman data, silahkan coba kembali.",
                                icon: "error",
                                button: "Ok",
                            });
                            $('.rupiah').mask('000.000.000.000.000', {
                                reverse: true
                            })
                        },
                    });
                } else {
                    swal("Data batal disimpan.", {
                        icon: "error",
                    });
                    $('.rupiah').mask('000.000.000.000.000', {
                        reverse: true
                    })
                }
            });
        });

        if ('{{ isset($opdTerkait) }}') {
            const opdTerkait = {!! $opdTerkait ?? '[]' !!};
            for (let i = 0; i < opdTerkait.length; i++) {
                $('#opd-terkait option[value="' + opdTerkait[i] + '"]').prop('selected', true);
                $('#opd-terkait').trigger('change');
            }
        }

        $(document).ready(function() {
            initializeMap();
        })

        var tableLaporan = $('#tableLaporan').DataTable({
            processing: true,
            serverSide: true,
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            ajax: {
                url: "{{ url('tabel-laporan-realisasi-hewan') }}",
                data: function(d) {
                    d.id_perencanaan = '{{ $rencana_intervensi_hewan->id }}'
                    // d.lokasiTugas = $('#lokasi-tugas').val();
                    // d.search = $('input[type="search"]').val();
                }
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    className: 'text-center',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'created_at',
                    name: 'created_at',
                    className: 'text-center'

                },
                {
                    data: 'jumlah_lokasi',
                    name: 'jumlah_lokasi',
                    className: 'text-center'
                },
                {
                    data: 'penggunaan_anggaran',
                    name: 'penggunaan_anggaran',
                    className: 'text-right',
                    render: $.fn.dataTable.render.number('.', ',', 0, 'Rp.')
                },
                {
                    data: 'progress',
                    name: 'progress',
                    className: 'text-center'

                },
                {
                    data: 'status',
                    name: 'status',
                    className: 'text-center'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    className: 'text-center'
                },



            ],
            columnDefs: [{
                    targets: [2, 3],
                    className: 'text-center',
                },
                {
                    targets: [1],
                    render: function(data) {
                        return moment(data).format('LL');
                    }
                },
            ],
        });

        var tableLokasi = $('#tabelLokasi').DataTable({
            "dom": "ftip",
            "bPaginate": false,
        });

        var map = null;

        function initializeMap() {
            if (map != undefined || map != null) {
                map.remove();
            }

            var center = [-1.3618072, 120.1619337];

            map = L.map("peta", {
                maxBounds: [
                    [-1.511127, 119.9637063],
                    [-1.21458, 120.2912363]
                ]
            }).setView(center, 11);
            map.addControl(new L.Control.Fullscreen());

            L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
                attribution: 'Data © <a href="http://osm.org/copyright">OpenStreetMap</a>',
                maxZoom: 18,
                minZoom: 11
            }).addTo(map);

            var pin = L.Icon.extend({
                options: {
                    iconSize: [50, 50],
                    iconAnchor: [22, 94],
                    shadowAnchor: [4, 62],
                    popupAnchor: [-3, -76],
                },
            });

            var pinIcon = new pin({
                iconUrl: "{{ asset('assets/dashboard/img/pin/pin_red_x.png') }}",
                iconSize: [40, 40],
                iconAnchor: [25, 20],
                popupAnchor: [-4, -20]
            });

            map.invalidateSize();

            $.ajax({
                url: "{{ url('/map/desa') }}",
                type: "GET",
                success: function(response) {
                    if (response.status == 'success') {
                        for (var i = 0; i < response.data.length; i++) {
                            L.polygon(response.data[i].koordinatPolygon, {
                                    color: response.data[i].warna_polygon,
                                    weight: 1,
                                    opacity: 1,
                                    fillOpacity: 1
                                })
                                .bindTooltip(response.data[i].nama, {
                                    permanent: true,
                                    direction: "center",
                                    className: 'labelPolygon'
                                })
                                .addTo(map);
                        }
                    }
                },
            })

            $.ajax({
                url: "{{ url('rencana-intervensi-hewan/map/' . $rencana_intervensi_hewan->id) }}",
                type: "GET",
                success: function(response) {
                    if (response.status == 'success') {
                        for (var i = 0; i < response.data.length; i++) {
                            var jumlahHewan = '';
                            var pemilikHewan = '';

                            if (response.data[i].jumlah_hewan.length > 0) {
                                jumlahHewan += '<hr class="my-1">';
                                jumlahHewan += "<p class='my-0 fw-bold'>Jumlah Hewan Ternak: </p>";
                                for (var j = 0; j < response.data[i].jumlah_hewan.length; j++) {
                                    jumlahHewan += "<p class='my-0'>- " + response.data[i].jumlah_hewan[j].hewan
                                        .nama + " : " + response.data[i].jumlah_hewan[j].jumlah + "</p>";
                                }
                            }

                            if (response.data[i].pemilik_lokasi_hewan.length > 0) {
                                pemilikHewan += '<hr class="my-1">';
                                pemilikHewan += "<p class='my-0 fw-bold'>Pemilik Ternak : </p>";
                                for (var j = 0; j < response.data[i].pemilik_lokasi_hewan.length; j++) {
                                    pemilikHewan += "<p class='my-0'>- " + response.data[i]
                                        .pemilik_lokasi_hewan[
                                            j].penduduk.nama + "</p>";
                                }
                            }

                            icon = pinIcon;
                            L.marker([response.data[i].latitude, response.data[i].longitude], {
                                    icon: icon
                                })
                                .bindPopup(
                                    "<p class='fw-bold my-0 text-center'>" + response.data[i].nama +
                                    "</p><hr class='my-1'>" +
                                    "<p class='my-0 fw-bold'>Desa : </p>" +
                                    "<p class='my-0'>" + response.data[i].desa
                                    .nama + "</p>" +
                                    "<p class='my-0 fw-bold'>Latitude : </p>" +
                                    "<p class='my-0'>" + response.data[i].latitude + "</p>" +
                                    "<p class='my-0 fw-bold'>Longitude : </p>" +
                                    "<p class='my-0'>" + response.data[i].longitude + "</p>" +
                                    jumlahHewan + pemilikHewan
                                )
                                // .on('click', L.bind(petaKlik, null, data[0][i].id))
                                .addTo(map);
                        }
                    }
                },
            })
        }
    </script>
@endpush
