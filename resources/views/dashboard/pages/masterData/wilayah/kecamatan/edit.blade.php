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
                        <div class="card-title">Ubah Desa</div>
                        <div class="card-tools">
                        </div>
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
                                        @method('PUT')
                                        @csrf
                                        <div class="col-12">
                                            @component('dashboard.components.formElements.input',
                                                [
                                                    'label' => 'Nama Desa',
                                                    'type' => 'text',
                                                    'id' => 'nama',
                                                    'name' => 'nama',
                                                    'wajib' => '<sup class="text-danger">*</sup>',
                                                    'value' => $desa->nama,
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
                                                    'value' => $desa->kode,
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
                                                    'value' => $desa->luas,
                                                    'class' => 'numerik',
                                                    'wajib' => '<sup class="text-danger">*</sup>',
                                                    'placeholder' => 'Masukkan Luas Desa',
                                                ])
                                            @endcomponent
                                        </div>
                                        <div class="col-12 mt-2">
                                            <label for="textareaInput" class="form-label">Warna</label>
                                            <br>
                                            <input type="color" id="warna" class="form-control-color"
                                                title="Choose your color" name="warna_polygon"
                                                value="{{ $desa->warna_polygon }}">
                                            <span class="badge bg-danger mt-2 d-none warna_polygon-error"></span>
                                        </div>
                                        <div class="col-12 d-none">
                                            <label for="textareaInput" class="form-label">Polygon</label>
                                            <textarea name="polygon" cols="30" rows="5" class="form-control" id="polygon">{{ $desa->polygon }}</textarea>
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
                        url: "{{ url('master-data/lokasi/desa' . '/' . $desa->id) }}",
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
                                        "{{ url('master-data/lokasi/desa') }}";
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

        $(document).ready(function() {
            $('#warna').val("{{ $desa->warna_polygon }}");
            $.ajax({
                url: "{{ url('/map/desa') }}",
                type: "GET",
                success: function(response) {
                    if (response.status == 'success') {
                        for (var i = 0; i < response.data.length; i++) {
                            if (response.data[i].id != '{{ $desa->id }}') {
                                L.polygon(response.data[i].koordinatPolygon, {
                                        color: response.data[i].warna_polygon,
                                        weight: 1,
                                        opacity: 1,
                                        fillOpacity: 1
                                    })
                                    .bindTooltip(response.data[i].nama + " (" + response.data[i].luas +
                                        " Km<sup>2</sup>) ", {
                                            permanent: true,
                                            direction: "center"
                                        })
                                    .addTo(map)
                                    .bindPopup(response.data[i].nama);
                            }
                        }
                    }
                },
            })
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
        var center = [-1.3618072, 120.1619337];

        var map = L.map("map", {
            maxBounds: [
                [-1.511127, 119.9637063],
                [-1.21458, 120.2912363]
            ]
        }).setView(center, 11);

        L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
            attribution: 'Data © <a href="http://osm.org/copyright">OpenStreetMap</a>',
            maxZoom: 18,
            minZoom: 11
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

        $.ajax({
            url: "{{ url('/map/desa') }}",
            type: "GET",
            data: {
                id: '{{ $desa->id }}'
            },
            success: function(response) {
                if (response.status == 'success') {
                    if (response.data.koordinatPolygon != null) {
                        L.polygon(response.data.koordinatPolygon, {
                                color: response.data.warna_polygon,
                                weight: 1,
                                opacity: 1,
                                fillOpacity: 1
                            })
                            .bindTooltip(response.data.nama + " (" + response.data.luas +
                                " Km<sup>2</sup>) ", {
                                    permanent: true,
                                    direction: "center"
                                })
                            .addTo(drawnItems);
                        map.addControl(drawControlEdit);
                    } else {
                        map.addControl(drawControl);
                    }
                }
            },
        })
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
        var table = $('#table-data').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('master-data/lokasi/desa') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'nama',
                    name: 'nama'
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
    </script>

    <script>
        $('#nav-master-lokasi').addClass('active');
        $('#nav-master-lokasi .collapse').addClass('show');
        $('#nav-master-lokasi .collapse #li-lokasi-desa').addClass('active');
    </script>
@endpush
