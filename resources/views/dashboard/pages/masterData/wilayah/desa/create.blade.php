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
    {{-- <a href="#" class="btn btn-secondary btn-round"><i class="fas fa-plus"></i>
        Tambah</a> --}}
@endsection

@push('styles')
    <style>
        #map {
            height: 400px;
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
                        <div class="card-title">Tambah Desa</div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12">
                            <div id="map"></div>
                            <span class="badge bg-danger text-light mt-2 d-none polygon-error"></span>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <form class="row g-3" id="form-tambah">
                                        @method('POST')
                                        @csrf
                                        <div class="col-12">
                                            @component('dashboard.components.formElements.input',
                                                [
                                                    'label' => 'Nama Desa',
                                                    'type' => 'text',
                                                    'id' => 'nama',
                                                    'name' => 'nama',
                                                    'wajib' => '<sup class="text-danger">*</sup>',
                                                    'placeholder' => 'Masukkan Nama Desa',
                                                ])
                                            @endcomponent
                                        </div>
                                        <div class="col-12">
                                            @component('dashboard.components.formElements.input',
                                                [
                                                    'label' => 'Kode',
                                                    'type' => 'text',
                                                    'id' => 'kode',
                                                    'name' => 'kode',
                                                    'wajib' => '<sup class="text-danger">*</sup>',
                                                    'placeholder' => 'Masukkan Kode',
                                                ])
                                            @endcomponent
                                        </div>
                                        <div class="col-12 my-2">
                                            @component('dashboard.components.formElements.input',
                                                [
                                                    'label' => 'Luas Desa (Km<sup>2</sup>)',
                                                    'type' => 'text',
                                                    'id' => 'luas',
                                                    'name' => 'luas',
                                                    'class' => 'numerik',
                                                    'wajib' => '<sup class="text-danger">*</sup>',
                                                    'placeholder' => 'Masukkan Luas Desa',
                                                ])
                                            @endcomponent
                                        </div>
                                        <div class="col-12 mt-2">
                                            <label for="textareaInput" class="form-label">Warna</label>
                                            <br>
                                            <input type="color" id="warna" class="form-control-color" value="#8285fd"
                                                title="Choose your color" name="warna_polygon">
                                            <span class="badge bg-danger mt-2 d-none warna_polygon-error"></span>
                                        </div>
                                        <div class="col-12 d-none">
                                            <label for="textareaInput" class="form-label">Polygon</label>
                                            <textarea name="polygon" cols="30" rows="5" class="form-control" id="polygon"></textarea>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end mt-3">
                                            @component('dashboard.components.buttons.submit',
                                                [
                                                    'label' => 'Simpan',
                                                ])
                                            @endcomponent
                                        </div>
                                    </form>
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
        $('#form-tambah').submit(function(e) {
            e.preventDefault();
            resetError();
            swal({
                title: 'Apakah Anda Yakin ?',
                icon: 'info',
                text: "Apakah Anda Yakin ?",
                type: 'info',
                buttons: {
                    cancel: {
                        visible: true,
                        text: 'Batal',
                        className: 'btn btn-light'
                    },
                    confirm: {
                        text: 'Ya',
                        className: 'btn btn-info'
                    },
                }
            }).then((Update) => {
                if (Update) {
                    $.ajax({
                        url: "{{ url('master-data/wilayah/desa' . '/' . $kecamatanId) }}",
                        type: 'POST',
                        data: $(this).serialize(),
                        success: function(response) {
                            if (response.status == 'success') {
                                swal("Berhasil", "Data Berhasil Disimpan", {
                                    icon: "success",
                                    buttons: false,
                                    timer: 1000,
                                }).then(function() {
                                    window.location.href =
                                        "{{ url('master-data/wilayah/desa' . '/' . $kecamatanId) }}";
                                })
                            } else {
                                swal("Periksa Kembali Data Anda", {
                                    buttons: false,
                                    timer: 1500,
                                    icon: "warning",
                                });
                                printErrorMsg(response.error);
                            }
                        },
                        error: function(response) {
                            swal("Gagal", "Terjadi Kesalahan", {
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
        function printErrorMsg(msg) {
            $.each(msg, function(key, value) {
                $('.' + key + '-error').removeClass('d-none');
                $('.' + key + '-error').text(value);
            });
        }

        function resetError() {
            resetErrorElement('nama');
            resetErrorElement('warna_polygon');
            resetErrorElement('luas');
            resetErrorElement('polygon');
        }

        function resetErrorElement(key) {
            $('.' + key + '-error').addClass('d-none');
        }
    </script>

    <script>
        var warna = $('#warna').val();
        var center = {{ env('MAP_CENTER') }};

        var map = L.map("map", {
            maxBounds: [
                {{ env('MAP_BOUNDS_1') }},
                {{ env('MAP_BOUNDS_2') }}
            ]
        }).setView(center, {{ env('MAP_ZOOM') }});

        L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
            attribution: 'Data © <a href="http://osm.org/copyright">OpenStreetMap</a>',
            maxZoom: {{ env('MAP_MAX_ZOOM') }},
            minZoom: {{ env('MAP_MIN_ZOOM') }}
        }).addTo(map);

        var drawnItems = new L.FeatureGroup();

        map.addLayer(drawnItems);
        map.addControl(new L.Control.Fullscreen());

        var drawControl = new L.Control.Draw({
            position: "topright",
            draw: {
                polygon: {
                    shapeOptions: {
                        color: warna,
                    },
                    allowIntersection: false,
                    drawError: {
                        color: "orange",
                        timeout: 1000,
                    },
                    showArea: true,
                    metric: false,
                },
                polyline: false,
                circlemarker: false,
                rectangle: false,
                circle: false,
                marker: false,
            },
            edit: {
                featureGroup: drawnItems,
                edit: false,
            },
        });

        var drawControlEdit = new L.Control.Draw({
            position: "topright",
            draw: {
                polygon: false,
                polyline: false,
                circlemarker: false,
                rectangle: false,
                circle: false,
                marker: false,
            },
            edit: {
                featureGroup: drawnItems,
                edit: false,
            },
        });

        $(document).ready(function() {
            $.ajax({
                url: "{{ url('map/desa') }}",
                type: "GET",
                data: {
                    kecamatanId: "{{ $kecamatanId }}"
                },
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
                                .bindTooltip(response.data[i].nama, {
                                    permanent: true,
                                    direction: "center",
                                    className: 'labelPolygon'
                                })
                                .addTo(map)
                                .bindPopup(response.data[i].nama);
                        }
                    }
                },
            })
        })
    </script>

    <script>
        map.addControl(drawControl);
    </script>

    <script>
        map.on("draw:created", function(e) {
            var type = e.layerType,
                layer = e.layer;
            drawnItems.addLayer(layer);
            drawControl.remove(map);
            drawControlEdit.addTo(map);
            $("#polygon").val(JSON.stringify(layer._latlngs));
        });

        map.on("draw:deleted", function(e) {
            drawControlEdit.remove(map);
            drawControl.addTo(map);
            $("#polygon").val("");
        });
    </script>

    <script>
        $('#warna').change(function() {
            warna = $(this).val();
            drawnItems.setStyle({
                color: warna,
            });
        })
    </script>

    <script>
        $('#nav-master-wilayah').addClass('active');
    </script>
@endpush
