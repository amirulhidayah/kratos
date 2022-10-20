@extends('dashboard.layouts.main')

@section('title')
    Hasil Realisasi
@endsection

@section('titlePanelHeader')
    Hasil Realisasi
@endsection

@section('subTitlePanelHeader')
    <p style="font-size: 15px">Tahun : <span id="tahunLabel">
            @php
                if ($tahun != '' && $tahun != 'Semua') {
                    echo $tahun;
                } else {
                    echo 'Semua';
                }
            @endphp
        </span>
    </p>
@endsection

@section('buttonPanelHeader')
    <button class="btn btn-secondary btn-round" data-toggle="modal" data-target="#modal-filter"><i class="fas fa-filter"></i>
        Filter Tahun</button>
@endsection

@push('styles')
    <style>
        #peta {
            height: 600px;
            margin-top: 0px;
        }

        .dataTables_wrapper {
            padding-left: 0px !important;
            padding-right: 0px !important;
        }


        .select2-container {
            width: 100% !important;
        }
    </style>
@endpush

@section('contents')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Data Hasil Realisasi</div>
                        <div class="card-tools">
                            {{-- <form action="{{ url('export-hasil-realisasi-keong') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-secondary btn-border btn-round btn-sm mr-2"
                                    id="export-penduduk" value="" name="desa_id">
                                    <i class="fas fa-lg fa-download"></i>
                                    Export Data Hasil Realisasi
                                </button>
                            </form> --}}
                        </div>
                    </div>
                </div>
                <div class="card-body pt-3">
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <ul class="nav nav-pills nav-secondary nav-pills-no-bd mb-3" id="pills-tab"
                                        role="tablist">
                                        <li class="nav-item submenu">
                                            <a class="nav-link active show" id="pills-tab-semua" data-toggle="pill"
                                                href="#pills-semua" role="tab" aria-controls="pills-peta"
                                                aria-selected="false">Semua</a>
                                        </li>
                                        <li class="nav-item submenu">
                                            <a class="nav-link" id="pills-tab-kecamatan" data-toggle="pill"
                                                href="#pills-peta" role="tab" aria-controls="pills-peta"
                                                aria-selected="false">Kecamatan</a>
                                        </li>
                                        <li class="nav-item submenu">
                                            <a class="nav-link" id="pills-tab-desa" data-toggle="pill" href="#pills-tabel"
                                                role="tab" aria-controls="pills-tabel" aria-selected="true">Desa</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg">
                                    <div class="tab-content mb-3" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="pills-semua" role="tabpanel"
                                            aria-labelledby="pills-home-tab-nobd">
                                            @component('dashboard.pages.hasilRealisasi.semua',
                                                [
                                                    'opd' => $opd,
                                                    'kecamatan' => $kecamatan,
                                                    'sub_indikator' => $sub_indikator,
                                                ])
                                            @endcomponent
                                        </div>
                                        <div class="tab-pane fade" id="pills-peta" role="tabpanel"
                                            aria-labelledby="pills-home-tab-nobd">
                                            <div class="row">
                                                <div class="col-lg-9 pl-0">
                                                    <div id="peta"></div>
                                                </div>
                                                <div class="col-lg-3 pl-0">
                                                    <div class="card border shadow-md">
                                                        <div class="card-header">
                                                            <div class="card-title">Info Penduduk</div>
                                                        </div>
                                                        <div class="card-body">
                                                            {{-- <small class="text-info fw-bold" style="font-style: italic">Pilih Kecamatan di --}}
                                                            {{-- Map terlebih dahulu</small> --}}
                                                            <div id="info-penduduk" class="">
                                                                <ul class="list-group list-group-bordered">
                                                                    <li
                                                                        class="list-group-item d-flex justify-content-between align-items-center px-3">
                                                                        Kecamatan:
                                                                        <span class="font-weight-bold">...........</span>
                                                                    </li>
                                                                    <li
                                                                        class="list-group-item d-flex justify-content-between align-items-center px-3">
                                                                        Total Penduduk:
                                                                        <span class="font-weight-bold">...........</span>
                                                                    </li>
                                                                    <li
                                                                        class="list-group-item d-flex justify-content-between align-items-center px-3">
                                                                        Yang Diintervensi:
                                                                        <span class="font-weight-bold">....../.....</span>
                                                                    </li>
                                                                    <li
                                                                        class="list-group-item d-flex justify-content-between align-items-center pl-4">
                                                                        -Orang Tua:
                                                                        <span class="font-weight-bold">...........</span>
                                                                    </li>
                                                                    {{-- <li
                                                                        class="list-group-item d-flex justify-content-between align-items-center pl-4">
                                                                        -Orang Tua dan Anak:
                                                                        <span class="font-weight-bold">...........</span>
                                                                    </li> --}}
                                                                    <li
                                                                        class="list-group-item d-flex justify-content-between align-items-center pl-4">
                                                                        -Anak:
                                                                        <span class="font-weight-bold">...........</span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row my-2">
                                                <div class="col">
                                                    <div class="card mb-0 border shadow-md">
                                                        <div class="card-header">
                                                            <div class="card-title">Data Penduduk Yang Telah
                                                                Diintervensi......</div>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    @component('dashboard.components.formElements.select',
                                                                        [
                                                                            'label' => 'OPD',
                                                                            'id' => 'opd-filter',
                                                                            'name' => 'opd_filter',
                                                                            'class' => 'select2 filter',
                                                                        ])
                                                                        @slot('options')
                                                                            {{-- <option value="semua">Semua</option>
                                                                                @foreach ($filterOpd as $item)
                                                                                    <option value="{{ $item['id'] }}">{{ $item['opd'] }}</option>
                                                                                @endforeach --}}
                                                                        @endslot
                                                                    @endcomponent
                                                                </div>
                                                                <div class="col-md-6">
                                                                    @component('dashboard.components.formElements.select',
                                                                        [
                                                                            'label' => 'Kecamatan',
                                                                            'id' => 'kecamatan-filter',
                                                                            'name' => 'kecamatan_filter',
                                                                            'class' => 'select2 filter',
                                                                        ])
                                                                        @slot('options')
                                                                            {{-- <option value="semua">Semua</option>
                                                                                @foreach ($filterSubIndikator as $item)
                                                                                    <option value="{{ $item['id'] }}">{{ $item['sub_indikator'] }}</option>
                                                                                @endforeach --}}
                                                                        @endslot
                                                                    @endcomponent
                                                                </div>
                                                                <div class="col mt-2">
                                                                    <div class="table-responsive mt-2">
                                                                        <table
                                                                            class="table table-hover table-striped table-bordered"
                                                                            id="{{ $id ?? 'dataTables' }}" cellspacing="0"
                                                                            width="100%">
                                                                            <thead>
                                                                                <tr class="text-center fw-bold">
                                                                                    <th>No</th>
                                                                                    <th>Nomor</th>
                                                                                    <th>Sasaran Intervensi</th>
                                                                                    <th>Nama Ayah</th>
                                                                                    <th>Nama Ibu</th>
                                                                                    <th>Nama Anak</th>
                                                                                    <th>Kecamatan</th>
                                                                                    <th>Desa</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                {{-- @foreach ($realisasi_intervensi->pendudukRealisasi as $item)
                                                                                    <tr>
                                                                                        <td>{{ $loop->iteration }}</td>
                                                                                    </tr>
                                                                                @endforeach --}}
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="pills-tabel" role="tabpanel"
                                            aria-labelledby="pills-profile-tab-nobd">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group form-show-validation row">
                                                        <label for="birth"
                                                            class="col-lg-2 col-md-3 col-sm-4 mt-sm-2 text-left">
                                                            Kecamatan:
                                                            <span class="required-label">*</span></label>
                                                        <div class="col-lg-10 col-md-9 col-sm-8">
                                                            <select class="select2" name="state">
                                                                <option value="AL">Alabama</option>
                                                                ...
                                                                <option value="WY">Wyoming</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div id="peta"></div>
                                                    <div class="row my-2">
                                                        <div class="col">
                                                            <div class="card mb-0 border shadow-md">
                                                                <div class="card-header">
                                                                    <div class="card-title">Data Penduduk Yang Telah
                                                                        Diintervensi......</div>
                                                                </div>
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            @component('dashboard.components.formElements.select',
                                                                                [
                                                                                    'label' => 'OPD',
                                                                                    'id' => 'opd-filter',
                                                                                    'name' => 'opd_filter',
                                                                                    'class' => 'select2 filter',
                                                                                ])
                                                                                @slot('options')
                                                                                    {{-- <option value="semua">Semua</option>
                                                                                        @foreach ($filterOpd as $item)
                                                                                            <option value="{{ $item['id'] }}">{{ $item['opd'] }}</option>
                                                                                        @endforeach --}}
                                                                                @endslot
                                                                            @endcomponent
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            @component('dashboard.components.formElements.select',
                                                                                [
                                                                                    'label' => 'Kecamatan',
                                                                                    'id' => 'kecamatan-filter',
                                                                                    'name' => 'kecamatan_filter',
                                                                                    'class' => 'select2 filter',
                                                                                ])
                                                                                @slot('options')
                                                                                    {{-- <option value="semua">Semua</option>
                                                                                        @foreach ($filterSubIndikator as $item)
                                                                                            <option value="{{ $item['id'] }}">{{ $item['sub_indikator'] }}</option>
                                                                                        @endforeach --}}
                                                                                @endslot
                                                                            @endcomponent
                                                                        </div>
                                                                        <div class="col mt-2">
                                                                            <div class="table-responsive mt-2">
                                                                                <table
                                                                                    class="table table-hover table-striped table-bordered"
                                                                                    id="{{ $id ?? 'dataTables' }}"
                                                                                    cellspacing="0" width="100%">
                                                                                    <thead>
                                                                                        <tr class="text-center fw-bold">
                                                                                            <th>No</th>
                                                                                            <th>Nomor</th>
                                                                                            <th>Sasaran Intervensi</th>
                                                                                            <th>Nama Ayah</th>
                                                                                            <th>Nama Ibu</th>
                                                                                            <th>Nama Anak</th>
                                                                                            <th>Kecamatan</th>
                                                                                            <th>Desa</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        {{-- @foreach ($realisasi_intervensi->pendudukRealisasi as $item)
                                                                                            <tr>
                                                                                                <td>{{ $loop->iteration }}</td>
                                                                                            </tr>
                                                                                        @endforeach --}}
                                                                                    </tbody>
                                                                                </table>
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
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Filter Tahun --}}
    <form action="" method="GET">
        <div class="modal fade" id="modal-filter" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Filter Dashboard</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @component('dashboard.components.formElements.select',
                            [
                                'label' => 'Tahun',
                                'id' => 'tahun',
                                'name' => 'tahun',
                                'class' => 'select2',
                                'wajib' => '<sup class="text-danger">*</sup>',
                            ])
                            @slot('options')
                                <option value="Semua">Semua</option>
                                @foreach ($daftarTahun as $tahun)
                                    <option value="{{ $tahun }}" {{ ($_GET['tahun'] ?? '') == $tahun ? 'selected' : '' }}>
                                        {{ $tahun }}</option>
                                @endforeach
                            @endslot
                        @endcomponent
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-border" data-dismiss="modal">Keluar</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-filter"></i> Filter</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('scripts')
    <script>
        $('#nav-hasil-realisasi').addClass('active');

        $('.select2').select2({
            placeholder: "Semua",
            theme: "bootstrap",
        })

        var map = null;

        $('#pills-tab-kecamatan').click(function() {
            setTimeout(
                function() {
                    initializeMap();
                }, 500);
        })

        $('#pills-tab-desa').click(function() {
            setTimeout(
                function() {
                    initializeMap();
                }, 500);
        })

        $('.nav-link').click(function() {
            let elementId = $(this).attr('id')
            if (elementId == 'pills-tab-semua') {

            } else {

            }
        })

        function initializeMap() {
            if (map != undefined || map != null) {
                map.remove();
            }

            var center = {{ env('MAP_CENTER') }};

            map = L.map("peta", {
                maxBounds: [
                    {{ env('MAP_BOUNDS_1') }},
                    {{ env('MAP_BOUNDS_2') }}
                ]
            }).setView(center, {{ env('MAP_ZOOM') }});
            map.addControl(new L.Control.Fullscreen());

            L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
                attribution: 'Data © <a href="http://osm.org/copyright">OpenStreetMap</a>',
                maxZoom: {{ env('MAP_MAX_ZOOM') }},
                minZoom: {{ env('MAP_MIN_ZOOM') }}
            }).addTo(map);

            map.invalidateSize();

            $.ajax({
                url: "{{ url('/map/kecamatan') }}",
                type: "GET",
                success: function(response) {
                    if (response.status == 'success') {
                        for (var i = 0; i < response.data.length; i++) {
                            L.polygon(response.data[i].koordinatPolygon, {
                                    color: "{{ env('MAP_POLYGON_COLOR') }}",
                                    fillColor: response.data[i].warna_polygon,
                                    weight: {{ env('MAP_POLYGON_WEIGHT') }},
                                    opacity: {{ env('MAP_POLYGON_OPACITY') }},
                                    fillOpacity: {{ env('MAP_POLYGON_FILLOPACITY') }}
                                })
                                .addTo(map)
                                .bindTooltip(response.data[i].nama, {
                                    permanent: true,
                                    direction: "center",
                                    className: 'labelPolygon'
                                })
                                // .bindTooltip(response.data[i].nama + " (" + response.data[i].luas +
                                //     " Km<sup>2</sup>) ", {
                                //         permanent: true,
                                //         direction: "center"
                                //     })
                                .bindPopup(
                                    "<p class='fw-bold my-0 text-center'>" + response.data[i].nama +
                                    "</p><hr>" +
                                    "<p class='my-0'>Kode : " + response.data[i].kode + "</p>" +
                                    "<p class='my-0'>Luas : " + response.data[i].luas + " Km<sup>2</sup></p>"
                                )
                                .on('click', L.bind(infoPenduduk, null, response.data[i].id))
                        }
                    }
                },
            })
        }

        function infoPenduduk(id) {
            alert(id)
        }


        $(document).ready(function() {
            initializeMap();

            // if (role != "Admin") {
            //     table.column(6).visible(false);
            // }
        })



        $('.filter').change(function() {
            table.draw();
        })

        $(document).on('click', '.btn-delete', function() {
            let id = $(this).val();
            var _token = "{{ csrf_token() }}";
            swal({
                title: 'Apakah Anda yakin?',
                text: "Data yang dipilih akan dihapus!",
                icon: "warning",
                dangerMode: true,
                buttons: ["Batal", "Ya"],
            }).then((result) => {
                if (result) {
                    $.ajax({
                        type: 'DELETE',
                        url: "{{ url('rencana-intervensi-keong') }}" + '/' + id,
                        data: {
                            _token: _token
                        },
                        success: function(data) {
                            swal({
                                title: "Berhasil!",
                                text: "Data yang dipilih berhasil dihapus.",
                                icon: "success",
                            }).then(function() {
                                table.ajax.reload();
                                $('#checkAllData').prop('checked', false);
                            });
                        }
                    })
                } else {
                    swal("Data batal dihapus.", {
                        icon: "error",
                    });
                }
            })
        })
    </script>
@endpush
