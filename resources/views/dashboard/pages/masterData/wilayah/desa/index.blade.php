@extends('dashboard.layouts.main')

@section('title')
    Desa
@endsection

@section('titlePanelHeader')
    Desa
@endsection

@section('subTitlePanelHeader')
    {{-- Lorem ipsum dolor sit amet consectetur adipisicing elit. --}}
@endsection

@section('buttonPanelHeader')
    <a href="{{ url('master-data/wilayah/kecamatan') }}" class="btn btn-secondary btn-round" id=""><i
            class="far fa-arrow-alt-circle-left"></i>
        Kembali</a>
    @if (Auth::user()->role == 'Admin')
        @component('dashboard.components.buttons.add',
            [
                'url' => url('master-data/wilayah/desa' . '/' . $kecamatanId . '/create'),
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
                        <div class="card-title">Data Desa</div>
                        <div class="card-tools">
                            <form action="{{ url('master-data/wilayah/desa/' . $kecamatanId . '/export') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-info btn-border btn-round btn-sm mr-2"
                                    id="export-lokasi-hewan">
                                    <i class="fas fa-lg fa-download"></i>
                                    Export Data
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
                                    <a class="nav-link active" id="pills-home-tab-nobd" data-toggle="pill"
                                        href="#pills-peta" role="tab" aria-controls="pills-peta"
                                        aria-selected="true">Peta</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-profile-tab-nobd" data-toggle="pill" href="#pills-tabel"
                                        role="tab" aria-controls="pills-tabel" aria-selected="false">Tabel</a>
                                </li>
                            </ul>
                            <div class="tab-content mb-3" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-peta" role="tabpanel"
                                    aria-labelledby="pills-home-tab-nobd">
                                    <div class="my-2">
                                        <div id="peta"></div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-tabel" role="tabpanel"
                                    aria-labelledby="pills-profile-tab-nobd">
                                    <div class="row mt-5">
                                        <div class="col">
                                            <div class="card fieldset">
                                                @component('dashboard.components.dataTables.index',
                                                    [
                                                        'id' => 'table-data',
                                                        'th' => ['No', 'Nama', 'Kode', 'Luas', 'Polygon', 'Warna Polygon', 'Aksi'],
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
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        var map = null;

        $('#pills-home-tab-nobd').click(function() {
            setTimeout(
                function() {
                    initializeMap();
                }, 500);
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
                url: "{{ url('/map/desa') }}",
                data: {
                    kecamatanId: "{{ $kecamatanId }}"
                },
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
                                // .bindTooltip(
                                //     response.data[i].nama + " (" + response.data[i].luas +
                                //     " Km<sup>2</sup>) ", {
                                //         permanent: true,
                                //         direction: "center"
                                //     }
                                // )
                                .bindPopup(
                                    "<p class='fw-bold my-0 text-center'>" + response.data[i].nama +
                                    "</p><hr>" +
                                    "<p class='my-0'>Kode : " + (response.data[i].kode ?? '-') + "</p>" +
                                    "<p class='my-0'>Luas : " + (response.data[i].luas ? response.data[i].luas +
                                        " Km<sup>2</sup></p>" : '-')

                                );
                        }
                    }
                },
            })
        }

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
                        url: "{{ url('master-data/wilayah/kecamatan') }}" + '/' +
                            id,
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
            ajax: "{{ url('master-data/wilayah/desa' . '/' . $kecamatanId) }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'nama',
                    name: 'nama'
                },
                {
                    data: 'kode',
                    name: 'kode',
                    class: 'text-center'
                },
                {
                    data: 'luas',
                    name: 'luas',
                    class: 'text-center'
                },
                {
                    data: 'statusPolygon',
                    name: 'statusPolygon',
                    class: 'text-center'
                },
                {
                    data: 'warnaPolygon',
                    name: 'warnaPolygon',
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

        var role = "{{ Auth::user()->role }}";

        $(document).ready(function() {
            initializeMap();

            if (role != "Admin") {
                table.column(6).visible(false);
            }
        })
    </script>

    <script>
        $('#nav-master-wilayah').addClass('active');
    </script>
@endpush
