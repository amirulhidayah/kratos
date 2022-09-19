@extends('dashboard.layouts.main')

@section('title')
    Lokasi Hewan Ternak
@endsection

@section('titlePanelHeader')
    Lokasi Hewan Ternak
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
                        <div class="card-title">Tambah Lokasi Hewan Ternak</div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <form class="row g-3" id="form-tambah">
                                        @method('POST')
                                        @csrf
                                        <div class="col-12">
                                            @component('dashboard.components.formElements.input',
                                                [
                                                    'label' => 'Nama Lokasi Hewan Ternak',
                                                    'type' => 'text',
                                                    'id' => 'nama',
                                                    'name' => 'nama',
                                                    'wajib' => '<sup class="text-danger">*</sup>',
                                                    'placeholder' => 'Masukkan Nama Lokasi Hewan Ternak',
                                                ])
                                            @endcomponent
                                        </div>
                                        <div class="col-12">
                                            @component('dashboard.components.formElements.textArea',
                                                [
                                                    'id' => 'deskripsi',
                                                    'type' => 'text',
                                                    'label' => 'Deskripsi Lokasi',
                                                    'placeholder' => 'Deskripsi Lokasi',
                                                    'name' => 'deskripsi',
                                                    'required' => true,
                                                ])
                                            @endcomponent
                                        </div>
                                        <div class="col-12">
                                            @component('dashboard.components.formElements.select',
                                                [
                                                    'label' => 'Desa',
                                                    'id' => 'desa_id',
                                                    'name' => 'desa_id',
                                                    'class' => 'select2',
                                                    'wajib' => '<sup class="text-danger">*</sup>',
                                                ])
                                                @slot('options')
                                                    @foreach ($daftarDesa as $desa)
                                                        <option value="{{ $desa->id }}">{{ $desa->nama }}</option>
                                                    @endforeach
                                                @endslot
                                            @endcomponent
                                        </div>
                                        <div class="col-12 mt-3">
                                            <label for="TextInput" class="form-label my-2">Pilih Lokasi Hewan Ternak</label>
                                            <div id="map"></div>
                                        </div>
                                        <div class="col-6">
                                            @component('dashboard.components.formElements.input',
                                                [
                                                    'label' => 'Latitude',
                                                    'type' => 'text',
                                                    'id' => 'latitude',
                                                    'name' => 'latitude',
                                                    'class' => 'marker numerik',
                                                    'wajib' => '<sup class="text-danger">*</sup>',
                                                    'placeholder' => 'Masukkan Latitude',
                                                ])
                                            @endcomponent
                                        </div>
                                        <div class="col-6">
                                            @component('dashboard.components.formElements.input',
                                                [
                                                    'label' => 'Longitude',
                                                    'type' => 'text',
                                                    'id' => 'longitude',
                                                    'name' => 'longitude',
                                                    'class' => 'marker numerik',
                                                    'wajib' => '<sup class="text-danger">*</sup>',
                                                    'placeholder' => 'Masukkan Longitude',
                                                ])
                                            @endcomponent
                                        </div>
                                        <div class="col-12">
                                            @component('dashboard.components.formElements.select',
                                                [
                                                    'label' => 'Status',
                                                    'id' => 'status',
                                                    'name' => 'status',
                                                    'class' => 'select2',
                                                    'wajib' => '<sup class="text-danger">*</sup>',
                                                ])
                                                @slot('options')
                                                    <option value="1">Aktif</option>
                                                    <option value="2">Tidak Aktif</option>
                                                @endslot
                                            @endcomponent
                                        </div>
                                        <hr size="10px" width="100%" color="black" class="mt-3">
                                        <div class="col-12">
                                            <label class="form-label my-2 fw-bold"> Tambahkan Hewan Ternak</label>
                                            <br>
                                            <span class="text-danger error-text hewan-kosong-error"></span>
                                            <div id="list-hewan">
                                                <div id="form-hewan-1" class="row">
                                                    <div class="col-5">
                                                        <div class="d-inline">
                                                            <label class="form-label my-2">Hewan Ternak
                                                            </label>
                                                        </div>

                                                        <div class="d-flex">
                                                            <select class="form-select col-12 select2" id="select-hewan-1"
                                                                aria-hidden="true" name="hewan_id[]" autocomplete="off">
                                                            </select>
                                                        </div>

                                                        <span class="text-danger error-text hewan_id-error"></span>
                                                    </div>
                                                    <div class="col-5">
                                                        <label for="TextInput" class="form-label my-2">Jumlah Hewan
                                                            Ternak</label>
                                                        <input type="text" name="jumlah_hewan[]"
                                                            class="form-control numerik"
                                                            placeholder="Masukkan Jumlah Hewan Ternak" autocomplete="off">
                                                        <span class="text-danger error-text jumlah_hewan-error"></span>
                                                    </div>
                                                    <div class="col-2">
                                                        <label for="TextInput" class="form-label my-2">&nbsp;</label>
                                                        <button class="btn btn-danger col-12 fw-bold"
                                                            onclick="hapusFormHewan(1)" type="button"><i
                                                                class="fas fa-trash-alt"></i> Hapus</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 my-3">
                                            <button class="btn btn-primary btn-rounded col-12 fw-bold" id="btn-tambah-hewan"
                                                type="button"><i class="fas fa-plus-circle"></i> Tambah Hewan
                                                Ternak</button>
                                        </div>
                                        <hr size="10px" width="100%" color="black" class="mt-3">
                                        <div class="col-12">
                                            <label class="form-label my-2 fw-bold"> Tambahkan Pemilik Hewan Ternak</label>
                                            <div class="select2-input select2-primary">
                                                <select id="pemilik-lokasi" name="penduduk_id[]"
                                                    class="form-control multiple" multiple="multiple"
                                                    data-label="Titik Lokasi">
                                                    @foreach ($daftarDesa as $desa)
                                                        <optgroup label="Desa {{ $desa->nama }}">
                                                            @foreach ($desa->penduduk as $penduduk)
                                                                <option value="{{ $penduduk->id }}">
                                                                    {{ $penduduk->nama . ' (' . $penduduk->nik . ') - ' . $penduduk->desa->nama }}
                                                                </option>
                                                            @endforeach
                                                        </optgroup>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <span class="text-danger error-text penduduk_id-error"></span>
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
        $('.multiple').select2({
            placeholder: "- Bisa Pilih Lebih Dari Satu -",
            theme: "bootstrap",
        })
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
                        url: "{{ url('master-data/lokasi/hewan') }}",
                        type: 'POST',
                        data: $(this).serialize(),
                        success: function(response) {
                            console.log(response);
                            if (response.status == 'success') {
                                swal("Berhasil", "Data Berhasil Disimpan", {
                                    icon: "success",
                                    buttons: false,
                                    timer: 1000,
                                }).then(function() {
                                    window.location.href =
                                        "{{ url('master-data/lokasi/hewan') }}";
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
            $.each(msg, function(keyError, valueError) {
                var totalError = valueError.length;
                var indexError = 0;
                $.each(valueError, function(key, value) {
                    if (keyError.split(".").length > 1) {
                        $('.' + keyError.split(".")[0] + '-error')[keyError.split(".")[1]].innerHTML = $(
                            '.' +
                            keyError.split(".")[0] + '-error')[keyError.split(".")[1]].innerHTML + value;
                        if ((indexError + 1) != totalError) {
                            $('.' + keyError.split(".")[0] + '-error')[keyError.split(".")[1]].innerHTML =
                                $(
                                    '.' +
                                    keyError.split(".")[0] + '-error')[keyError.split(".")[1]].innerHTML +
                                ", ";
                        }
                    } else {
                        $('.' + keyError + '-error').text(value);
                    }
                    indexError++;
                });
            });
        }

        function resetError() {
            $(".error-text").each(function() {
                $(this).html('');
            })
        }
    </script>

    <script>
        var warna = $('#warna').val();
        var center = [-1.3618072, 120.1619337];

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

        var map = L.map("map", {
            maxBounds: [
                [-1.511127, 119.9637063],
                [-1.21458, 120.2912363]
            ]
        }).setView(center, 10);

        L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
            attribution: 'Data © <a href="http://osm.org/copyright">OpenStreetMap</a>',
            maxZoom: 18,
            minZoom: 11
        }).addTo(map);

        var drawnItems = new L.FeatureGroup();

        map.addLayer(drawnItems);
        map.addControl(new L.Control.Fullscreen());

        var marker = L.marker([$("#latitude").val(), $("#longitude").val()], {
            icon: pinIcon
        }).addTo(map);

        function updateMarker(lat, lng) {
            marker
                .setLatLng([lat, lng])
                .bindPopup("Lokasi Pilihan : " + marker.getLatLng().toString())
                .openPopup();
            map.flyTo([lat, lng], 12);
            return false;
        }

        map.on("click", function(e) {
            let latitude = e.latlng.lat.toString().substring(0, 15);
            let longitude = e.latlng.lng.toString().substring(0, 15);
            $("#latitude").val(latitude);
            $("#longitude").val(longitude);
            updateMarker(latitude, longitude);
        });

        $('.marker').keyup(function() {
            updateMarker($("#latitude").val(), $("#longitude").val());
        })

        var optionHewan = '<option></option>';

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

            // GET HEWAN
            $.ajax({
                url: "{{ url('/list/hewan') }}",
                type: "GET",
                success: function(response) {
                    if (response.status == 'success') {
                        for (var i = 0; i < response.data.length; i++) {
                            optionHewan += '<option value="' + response.data[i].id + '">' + response
                                .data[i].nama + '</option>';
                        }
                        setOptionHewan(totalHewan);
                    }
                },
            })
        })
    </script>

    {{-- Script Hewan Dinamis --}}
    <script>
        var totalHewan = 1;

        function setOptionHewan(id) {
            $('#select-hewan-' + id).append(optionHewan);
            $('#select-hewan-' + id).select2({
                placeholder: "- Pilih Salah Satu -",
                theme: "bootstrap",
            })
        }

        $('#btn-tambah-hewan').click(function() {
            totalHewan++;
            $('#list-hewan').append(tambahListHewan(totalHewan));
            $('#form-hewan-' + totalHewan).fadeIn("slow");
            setOptionHewan(totalHewan);
        })

        function tambahListHewan(totalHewan) {
            var formListHewan =
                '<div id="form-hewan-' + totalHewan +
                '" class="row" style="display: none;"><div class="col-5"><div class="d-inline"><label class="form-label my-2">Hewan Ternak</label></div><div class="d-flex"><select class="form-select col-12 select2" id="select-hewan-' +
                totalHewan +
                '" aria-hidden="true" name="hewan_id[]" autocomplete="off"></select></div><span class="text-danger error-text hewan_id-error"></span></div><div class="col-5"><label for="TextInput" class="form-label my-2">Jumlah Hewan Ternak</label><input type="text" name="jumlah_hewan[]" class="form-control numerik" placeholder="Masukkan Jumlah Hewan Ternak" autocomplete="off"><span class="text-danger error-text jumlah_hewan-error"></span></div><div class="col-2"><label for="TextInput" class="form-label my-2">&nbsp;</label><button class="btn btn-danger col-12 fw-bold" onclick="hapusFormHewan(' +
                totalHewan + ')" type="button"><i class="fas fa-trash-alt"></i> Hapus</button></div></div>';

            return formListHewan;
        }

        function hapusFormHewan(id) {
            $('#form-hewan-' + id).fadeOut("slow", function() {
                $("#form-hewan-" + id).remove();
            });
        }
    </script>

    <script>
        $('#nav-master-lokasi').addClass('active');
        $('#nav-master-lokasi .collapse').addClass('show');
        $('#nav-master-lokasi .collapse #li-lokasi-hewan').addClass('active');
    </script>
@endpush
