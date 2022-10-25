@push('styles')
    <style>
        #peta-kecamatan {
            height: 600px;
            margin-top: 0px;
        }
    </style>
@endpush

<div class="row">
    <div class="col-lg-9">
        <div id="peta-kecamatan"></div>
    </div>
    <div class="col-lg-3 pl-0">
        <div class="card border shadow-md">
            <div class="card-header">
                <div class="card-title">Info Penduduk Intervensi <div class="title-card-tahun fw-bold"></div>
                </div>
            </div>
            <div class="card-body">
                <small class="text-info fw-bold pilih-wilayah-dahulu" style="font-style: italic">Pilih Kecamatan
                    di
                    Map terlebih dahulu</small>
                <div id="info-wilayah" class="info-wilayah d-none">
                    <ul class="list-group list-group-bordered">
                        <li class="list-group-item d-flex justify-content-between align-items-center px-3">
                            Kecamatan:
                            <span class="font-weight-bold modal-text-kecamatan">...........</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-3">
                            Yang Diintervensi:
                            <span class="font-weight-bold modal-text-total-intervensi">...........</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center pl-4 pr-3">
                            -Orang Tua:
                            <span class="font-weight-bold modal-text-orang-tua">...........</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center pl-4 pr-3">
                            -Anak:
                            <span class="font-weight-bold modal-text-anak">...........</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="col mt-4">
        <div class="card mb-0 border shadow-md">
            <div class="card-header">
                <div class="card-title">Data Penduduk Yang Telah
                    Diintervensi Berdasarkan Kecamatan <span class="wilayah-title"></span>
                    <span class="title-card-tahun d-inline fw-bold"></span>
                    <div class="card-tools float-right d-inline">
                        <form action="{{ url('realisasi-intervensi/export-hasil-realisasi-kecamatan') }}" method="POST"
                            id="formExportHasilRealisasiKecamatan" autocomplete="off">
                            @csrf
                            <input type="hidden" name="tahun_filter" value="" class="tahun-filter-export">
                            <input type="hidden" name="kecamatan_filter" value=""
                                class="kecamatan-filter-export">
                            <button type="submit"
                                class="btn btn-secondary btn-border btn-round btn-sm mr-2 btn-export-kecamatan-desa d-none"
                                value="" name="" id="btnExportKecamatan">
                                <i class="fas fa-lg fa-download"></i>
                                Export Data Hasil Realisasi
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <small class="text-info fw-bold pilih-wilayah-dahulu" style="font-style: italic">Pilih
                            Kecamatan di Map terlebih dahulu</small>
                    </div>
                    <div class="col-lg-12 col-md-12 mb-2">
                        @component('dashboard.components.formElements.select',
                            [
                                'label' => 'Sub Indikator',
                                'id' => 'sub-indikator-kecamatan-filter',
                                'name' => 'sub_indikator_filter',
                                'class' => 'select2 filter filter-kecamatan',
                            ])
                            @slot('options')
                                <option value="semua">Semua</option>
                                @foreach ($sub_indikator as $key => $val)
                                    <option value="{{ $key }}">{{ $val }}</option>
                                @endforeach
                            @endslot
                        @endcomponent
                    </div>
                    <div class="col-lg-4 col-md-4">
                        @component('dashboard.components.formElements.select',
                            [
                                'label' => 'Status',
                                'id' => 'sasaran-intervensi-kecamatan-filter',
                                'name' => 'sasaran_intervensi_filter',
                                'class' => 'select2 filter filter-kecamatan',
                            ])
                            @slot('options')
                                <option value="semua">Semua</option>
                                <option value="Orang Tua">Orang Tua</option>
                                <option value="Anak">Anak</option>
                            @endslot
                        @endcomponent
                    </div>
                    <div class="col-lg-4 col-md-4">
                        @component('dashboard.components.formElements.select',
                            [
                                'label' => 'OPD',
                                'id' => 'opd-kecamatan-filter',
                                'name' => 'opd_filter',
                                'class' => 'select2 filter filter-kecamatan',
                            ])
                            @slot('options')
                                <option value="semua">Semua</option>
                                @foreach ($opd as $key => $val)
                                    <option value="{{ $key }}">{{ $val }}</option>
                                @endforeach
                            @endslot
                        @endcomponent
                    </div>
                    <div class="col-lg-4 col-md-4">
                        @component('dashboard.components.formElements.select',
                            [
                                'label' => 'Desa',
                                'id' => 'desa-kecamatan-filter',
                                'name' => 'desa_filter',
                                'class' => 'select2 filter filter-kecamatan',
                                'attribute' => 'disabled',
                            ])
                            @slot('options')
                                <option value="semua">Semua</option>
                            @endslot
                        @endcomponent
                    </div>
                    <div class="col mt-2">
                        <div class="table-responsive mt-2">
                            <table class="table table-hover table-striped table-bordered"
                                id="{{ $id ?? 'dataTablesKecamatan' }}" cellspacing="0" width="100%">
                                <thead>
                                    <tr class="text-center fw-bold">
                                        <th>No</th>
                                        <th>Status</th>
                                        <th>Nama</th>
                                        <th>List Sub Indikator</th>
                                        <th>List OPD</th>
                                        <th>Tanggal Intervensi</th>
                                        <th>Desa</th>
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
    </div>
</div>

@push('scripts')
    <script>
        function clearTabKecamatan() {
            $('#dataTablesKecamatan').DataTable().clear().destroy();
            $('.pilih-wilayah-dahulu').removeClass('d-none')
            $('.info-wilayah').addClass('d-none')
            $('.wilayah-title').addClass('d-none')
            $('.btn-export-kecamatan-desa').addClass('d-none')
        }

        $('#pills-tab-kecamatan').click(function() {
            clearTabKecamatan()
            initializeMapKecamatan()

            setTimeout(
                function() {
                    initializeMapKecamatan();
                }, 500
            );

            function initializeMapKecamatan() {
                if (map != undefined || map != null) {
                    map.remove();
                }

                var center = {{ env('MAP_CENTER') }};

                map = L.map("peta-kecamatan", {
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
                                        "<p class='my-0'>Luas : " + response.data[i].luas +
                                        " Km<sup>2</sup></p>"
                                    )
                                    .on('click', L.bind(infoPendudukKecamatan, null, response.data[i]
                                        .id))
                            }
                        }
                    },
                })
            }

            function infoPendudukKecamatan(id) {
                $('.wilayah-title').removeClass('d-none')
                $('.btn-export-kecamatan-desa').removeClass('d-none')

                $('.kecamatan-filter-export').val(id)
                let kecamatan = id
                let tahun = $('#tahunLabel').text();

                $('#desa-kecamatan-filter').removeAttr('disabled')
                $('.pilih-wilayah-dahulu').addClass('d-none')
                $('.info-wilayah').removeClass('d-none')

                $.get("{{ url('info-realisasi-kecamatan') }}", {
                    kecamatan_filter: kecamatan,
                    tahun_filter: tahun
                }).done(function(response) {
                    $('.wilayah-title').text(response.nama_kecamatan)
                    $('.modal-text-kecamatan').text(response.nama_kecamatan)
                    $('.modal-text-total-intervensi').text(response.count_total_intervensi)
                    $('.modal-text-orang-tua').text(response.count_orang_tua)
                    $('.modal-text-anak').text(response.count_anak)
                });

                $.get("{{ url('list/desa') }}", {
                    kecamatan: kecamatan,
                }).done(function(response) {
                    $('#desa-kecamatan-filter').empty()
                    $('#desa-kecamatan-filter').append(
                        '<option value="semua" selected hidden>Semua</option>')
                    for (let i = 0; i < response.data.length; i++) {
                        const id = response.data[i].id
                        const nama = response.data[i].nama
                        $('#desa-kecamatan-filter').val('')
                        $('#desa-kecamatan-filter').append($('<option>').val(id).text(nama))
                    }
                });

                $('#dataTablesKecamatan').DataTable().clear().destroy();

                var tableKecamatan = $('#dataTablesKecamatan').DataTable({
                    processing: true,
                    serverSide: true,
                    lengthMenu: [
                        [10, 25, 50, -1],
                        [10, 25, 50, "All"]
                    ],
                    ajax: {
                        url: "{{ url('tabel-hasil-realisasi') }}",
                        data: function(d) {
                            d.kecamatan_filter = kecamatan;
                            d.tahun_filter = $('#tahunLabel').text();
                            d.status_filter = $('#sasaran-intervensi-kecamatan-filter').val();
                            d.opd_filter = $('#opd-kecamatan-filter').val();
                            d.desa_filter = $('#desa-kecamatan-filter').val();
                            d.sub_indikator_filter = $('#sub-indikator-kecamatan-filter').val()
                            d.search_filter = $('input[type="search"]').val();
                        },
                    },
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            className: 'text-center',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'status',
                            name: 'status',
                        },
                        {
                            data: 'nama',
                            name: 'nama',
                        },
                        {
                            data: 'list_indikator',
                            name: 'list_indikator',
                        },
                        {
                            data: 'list_opd',
                            name: 'list_opd',
                        },
                        {
                            data: 'tanggal_intervensi',
                            name: 'tanggal_intervensi',
                        },
                        // {
                        //     data: 'nama_kecamatan',
                        //     name: 'nama_kecamatan',
                        // },
                        {
                            data: 'nama_desa',
                            name: 'nama_desa',
                        },
                    ],
                })

                $('.filter-kecamatan').change(function() {
                    tableKecamatan.draw();
                })
            }

        })
    </script>
@endpush
