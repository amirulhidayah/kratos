@extends('dashboard.layouts.main')

@section('title')
    Habitat Keong
@endsection

@section('titlePanelHeader')
    Habitat Keong
@endsection

@section('subTitlePanelHeader')
    {{-- Lorem ipsum dolor sit amet consectetur adipisicing elit. --}}
@endsection

@section('buttonPanelHeader')
    @if (Auth::user()->role == 'Admin')
        @component('dashboard.components.buttons.add',
            [
                'url' => url('master-data/lokasi/keong/create'),
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
                        <div class="card-title">Data Habitat Keong</div>
                        <div class="card-tools">
                            <div class="row">
                                <button class="btn btn-info btn-border btn-round btn-sm mr-2" id="export-data">
                                    <i class="fas fa-lg fa-download"></i>
                                    Export Lokasi Keong
                                </button>
                                <form action="{{ url('master-data/lokasi/keong/export-demografi') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-info btn-border btn-round btn-sm mr-2"
                                        id="export-demografi">
                                        <i class="fas fa-lg fa-download"></i>
                                        Export Demografi
                                    </button>
                                </form>
                            </div>

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
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-demografi-tab-nobd" data-toggle="pill"
                                        href="#pills-demografi" role="tab" aria-controls="pills-tabel"
                                        aria-selected="false">Demografi
                                        Daerah</a>
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
                                    <form action="{{ url('master-data/lokasi/keong/export') }}" method="POST"
                                        id="form-export-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12">
                                                @component('dashboard.components.formElements.select',
                                                    [
                                                        'label' => 'Desa',
                                                        'id' => 'desa_id',
                                                        'name' => 'desa_id',
                                                        'class' => 'select2 filter',
                                                        'wajib' => '<sup class="text-danger">*</sup>',
                                                    ])
                                                    @slot('options')
                                                        <option value="semua">Semua</option>
                                                        @foreach ($daftarDesa as $desa)
                                                            <option value="{{ $desa->id }}">{{ $desa->nama }}</option>
                                                        @endforeach
                                                    @endslot
                                                @endcomponent
                                            </div>
                                        </div>
                                    </form>
                                    <div class="row mt-3">
                                        <div class="col-12">
                                            <div class="card fieldset">
                                                @component('dashboard.components.dataTables.index',
                                                    [
                                                        'id' => 'table-data',
                                                        'th' => ['No', 'Nama', 'Desa', 'Deskripsi', 'Latitude / Longitude', 'Pemilik Lahan', 'Status', 'Aksi'],
                                                    ])
                                                @endcomponent
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-demografi" role="tabpanel"
                                    aria-labelledby="pills-demografi-tab-nobd">
                                    <div class="my-2">
                                        <div class="row">
                                            @foreach ($daftarDesa as $desa)
                                                <div class="col-sm-6 col-md-3">
                                                    <div class="card card-stats card-round border">
                                                        <div class="card-body ">
                                                            <div class="row">
                                                                <div class="col-4">
                                                                    <div class="icon-big text-center">
                                                                        <i class="flaticon-placeholder-1 text-primary"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="col-8 col-stats">
                                                                    <div class="numbers">
                                                                        <p class="card-category">Desa</p>
                                                                        <h4 class="card-title">{{ $desa->nama }}
                                                                        </h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="d-flex justify-content-between mt-2">
                                                                <p class="fw-bold mb-0">Total Lokasi Keong</p>
                                                                <p class="badge bg-primary text-light border-0 mb-0">
                                                                    {{ $desa->lokasiKeong->count() }}
                                                                </p>
                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
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
        $('.select2').select2({
            placeholder: "Semua",
            theme: "bootstrap",
            width: '100%'
        })

        $(document).ready(function() {
            $('#export-demografi').hide();
        })

        $('#pills-home-tab-nobd').click(function() {
            $('#export-demografi').hide();
            $('#export-data').show();
        })

        $('#pills-profile-tab-nobd').click(function() {
            $('#export-demografi').hide();
            $('#export-data').show();
        })

        $('#pills-demografi-tab-nobd').click(function() {
            $('#export-demografi').show();
            $('#export-data').hide();
        })
    </script>

    <script>
        var map = null;

        $('#export-data').click(function() {
            $('#form-export-data').submit();
        })

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
                url: "{{ url('/map/keong') }}",
                type: "GET",
                success: function(response) {
                    if (response.status == 'success') {

                        for (var i = 0; i < response.data.length; i++) {
                            var pemilikKeong = '';
                            if (response.data[i].pemilik_lokasi_keong.length > 0) {
                                pemilikKeong += '<hr class="my-1">';
                                pemilikKeong += "<p class='my-0 fw-bold'>Pemilik Lahan : </p>";
                                for (var j = 0; j < response.data[i].pemilik_lokasi_keong.length; j++) {
                                    pemilikKeong += "<p class='my-0'> -" + response.data[i]
                                        .pemilik_lokasi_keong[
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
                                    pemilikKeong
                                )
                                // .on('click', L.bind(petaKlik, null, data[0][i].id))
                                .addTo(map);
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
                        url: "{{ url('master-data/lokasi/keong') }}" + '/' + id,
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
                url: "{{ url('master-data/lokasi/keong') }}",
                data: function(d) {
                    d.desa_id = $('#desa_id').val();
                    d.search = $('input[type="search"]').val();
                },
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'nama',
                    name: 'nama'
                },
                {
                    data: 'desa',
                    name: 'desa',
                    class: 'text-center'
                },
                {
                    data: 'deskripsi',
                    name: 'deskripsi',
                },
                {
                    data: 'koordinat',
                    name: 'koordinat',
                    className: 'text-center'
                },
                {
                    data: 'pemilik',
                    name: 'pemilik',
                },
                {
                    data: 'status',
                    name: 'status',
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
                table.column(7).visible(false);
            }
        })
    </script>

    <script>
        $(".filter").change(function() {
            table.draw();
        })

        $('#nav-master-lokasi').addClass('active');
        $('#nav-master-lokasi .collapse').addClass('show');
        $('#nav-master-lokasi .collapse #li-lokasi-keong').addClass('active');
    </script>
@endpush
