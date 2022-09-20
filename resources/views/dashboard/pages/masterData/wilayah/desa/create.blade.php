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
                        url: "{{ url('master-data/lokasi/desa') }}",
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
        var latlngLindu = [
            [{
                "lat": -1.2682405335266715,
                "lng": 120.04886119007386
            }, {
                "lat": -1.257251750166829,
                "lng": 120.05847191620245
            }, {
                "lat": -1.2483233296103176,
                "lng": 120.06396375970445
            }, {
                "lat": -1.2435157059698527,
                "lng": 120.07357448583302
            }, {
                "lat": -1.2421420976055957,
                "lng": 120.09416889896562
            }, {
                "lat": -1.2373344627128373,
                "lng": 120.10446610553191
            }, {
                "lat": -1.2393948787357665,
                "lng": 120.11133090990941
            }, {
                "lat": -1.232526819106975,
                "lng": 120.12094163603801
            }, {
                "lat": -1.226345550293821,
                "lng": 120.12986588172879
            }, {
                "lat": -1.2304663977598609,
                "lng": 120.1401630882951
            }, {
                "lat": -1.2373344627128373,
                "lng": 120.14908733398588
            }, {
                "lat": -1.2483233296103176,
                "lng": 120.16213046230317
            }, {
                "lat": -1.2634329465240084,
                "lng": 120.17929247324702
            }, {
                "lat": -1.2751084994588158,
                "lng": 120.18615727762459
            }, {
                "lat": -1.287470791893021,
                "lng": 120.20743817119492
            }, {
                "lat": -1.3039537551229952,
                "lng": 120.23283794739179
            }, {
                "lat": -1.3190630432997703,
                "lng": 120.25205939964889
            }, {
                "lat": -1.3293647781551041,
                "lng": 120.2548053213999
            }, {
                "lat": -1.3362325775331643,
                "lng": 120.26235660621518
            }, {
                "lat": -1.34996811858429,
                "lng": 120.27883213672126
            }, {
                "lat": -1.3726315912974043,
                "lng": 120.28638342153654
            }, {
                "lat": -1.3822463332138302,
                "lng": 120.27814565628348
            }, {
                "lat": -1.3891139821915888,
                "lng": 120.274026773657
            }, {
                "lat": -1.4062830170888898,
                "lng": 120.27539973453251
            }, {
                "lat": -1.41452410907271,
                "lng": 120.26510252796619
            }, {
                "lat": -1.4131505957701052,
                "lng": 120.25205939964889
            }, {
                "lat": -1.4268856921141162,
                "lng": 120.23970275176933
            }, {
                "lat": -1.4399339576864914,
                "lng": 120.23352442782952
            }, {
                "lat": -1.4392472087231876,
                "lng": 120.2252866625765
            }, {
                "lat": -1.455729126535486,
                "lng": 120.2225407408255
            }, {
                "lat": -1.4550423823560799,
                "lng": 120.21361649513469
            }, {
                "lat": -1.4516086583248293,
                "lng": 120.2046922494439
            }, {
                "lat": -1.452295403548653,
                "lng": 120.19508152331538
            }, {
                "lat": -1.448174929078932,
                "lng": 120.18272487543578
            }, {
                "lat": -1.4571026142666472,
                "lng": 120.17723303193378
            }, {
                "lat": -1.4605363299287517,
                "lng": 120.16899526668072
            }, {
                "lat": -1.4680904858995114,
                "lng": 120.1573250992389
            }, {
                "lat": -1.484572191964715,
                "lng": 120.14084956873282
            }, {
                "lat": -1.4934997315334695,
                "lng": 120.13055236216654
            }, {
                "lat": -1.5024272348345242,
                "lng": 120.12574699910226
            }, {
                "lat": -1.4989935840245787,
                "lng": 120.11613627297369
            }, {
                "lat": -1.48045177691446,
                "lng": 120.10446610553191
            }, {
                "lat": -1.4612230724319544,
                "lng": 120.09622834027886
            }, {
                "lat": -1.4516086583248293,
                "lng": 120.07426096627074
            }, {
                "lat": -1.4399339576864914,
                "lng": 120.04748822919836
            }, {
                "lat": -1.4213916633741723,
                "lng": 120.02277493343928
            }, {
                "lat": -1.4076565344449334,
                "lng": 120.01591012906171
            }, {
                "lat": -1.385680160191748,
                "lng": 120.01110476599746
            }, {
                "lat": -1.3774389671051044,
                "lng": 120.00149403986889
            }, {
                "lat": -1.3664506653475235,
                "lng": 120.0049264420577
            }, {
                "lat": -1.3568358600600976,
                "lng": 120.00973180512194
            }, {
                "lat": -1.3396664700275698,
                "lng": 120.0049264420577
            }, {
                "lat": -1.3279912159839,
                "lng": 120.0117912464352
            }, {
                "lat": -1.3115084106138748,
                "lng": 120.00973180512194
            }, {
                "lat": -1.294338706268412,
                "lng": 120.01591012906171
            }, {
                "lat": -1.2806028590157326,
                "lng": 120.02140197256377
            }, {
                "lat": -1.270300925224502,
                "lng": 120.03032621825456
            }]
        ];

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

        $(document).ready(function() {
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
                                .bindTooltip(response.data[i].nama + " (" + response.data[i].luas +
                                    " Km<sup>2</sup>) ", {
                                        permanent: true,
                                        direction: "center"
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
