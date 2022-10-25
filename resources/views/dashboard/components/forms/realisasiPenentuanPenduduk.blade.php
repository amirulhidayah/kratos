@push('styles')
    <style>
        #peta {
            height: 450px;
            margin-top: 0px;
        }

        .dataTables_wrapper {
            padding-left: 0px !important;
            padding-right: 0px !important;
        }

        .select2-container {
            margin-bottom: 5px !important;
        }

        .select2-container {
            width: 100% !important;
        }
    </style>
@endpush


<div class="row">
    <div class="col-md-12">
        <form action="#" id="formPenduduk" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="row">
                <div class="col">
                    <div class="alert alert-info shadow-md" role="alert">
                        <b>Sub Indikator: </b> <span id="info-sub-indikator"></span>
                    </div>
                    <span class="text-danger" style="font-size: 10pt; font-style: italic">* Wajib Diisi</span>
                    <div class="form-group p-0">
                        <div class="col-12 col-document px-0" id="col-dokumen-1">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group p-0 pb-2">
                                        @component('dashboard.components.formElements.select',
                                            [
                                                'label' => 'Kecamatan',
                                                'id' => 'kecamatan',
                                                'name' => 'kecamatan',
                                                'class' => 'select2 req',
                                                'wajib' => '<sup class="text-danger">*</sup>',
                                            ])
                                            @slot('options')
                                                @foreach ($kecamatan as $item)
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->nama }}</option>
                                                @endforeach
                                            @endslot
                                        @endcomponent
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group p-0 pb-2">
                                        @component('dashboard.components.formElements.select',
                                            [
                                                'label' => 'Desa',
                                                'id' => 'desa',
                                                'name' => 'desa',
                                                'class' => 'select2 req',
                                                'wajib' => '<sup class="text-danger">*</sup>',
                                            ])
                                            @slot('options')
                                            @endslot
                                        @endcomponent
                                    </div>

                                </div>
                            </div>
                            <div class="row pb-2">
                                <div class="col-12">
                                    <label class="my-2">Sasaran Intervensi <sup class="text-danger">*</sup></label>
                                </div>
                                <div class="col-md-4 d-flex">
                                    @component('dashboard.components.formElements.radioButton',
                                        [
                                            'label' => 'Orang Tua',
                                            'name' => 'sasaran_intervensi',
                                            'class' => 'jenis-intervensi',
                                            'value' => 'Orang Tua',
                                        ])
                                    @endcomponent
                                </div>
                                <div class="col-md-4 d-flex">
                                    @component('dashboard.components.formElements.radioButton',
                                        [
                                            'label' => 'Anak',
                                            'name' => 'sasaran_intervensi',
                                            'class' => 'jenis-intervensi',
                                            'value' => 'Anak',
                                        ])
                                    @endcomponent
                                </div>
                                <div class="col-md-4 d-flex">
                                    @component('dashboard.components.formElements.radioButton',
                                        [
                                            'label' => 'Orang Tua dan Anak',
                                            'name' => 'sasaran_intervensi',
                                            'class' => 'jenis-intervensi',
                                            'value' => 'Orang Tua dan Anak',
                                        ])
                                    @endcomponent
                                </div>
                                <div class="col-12 mt-1">
                                    <span
                                        class="text-danger error-text error-text-penduduk sasaran_intervensi-error"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 d-none py-2" id="col-orang-tua">
                                    @component('dashboard.components.formElements.select',
                                        [
                                            'label' => 'Pilih Orang Tua',
                                            'id' => 'orang-tua',
                                            'name' => 'orang_tua_id',
                                            'class' => 'select2 tambah-penduduk',
                                            'wajib' => '<sup class="text-danger">*</sup>',
                                            'errorClass' => 'error-text-penduduk',
                                        ])
                                        @slot('options')
                                            <option value="" selected>- Pilih Salah Satu -</option>
                                        @endslot
                                    @endcomponent
                                </div>
                                <div class="col-lg-12 d-none pt-2" id="col-anak">
                                    @component('dashboard.components.formElements.select',
                                        [
                                            'label' => 'Pilih Anak',
                                            'id' => 'anak',
                                            'name' => 'anak_id',
                                            'class' => 'select2 tambah-penduduk',
                                            'wajib' => '<sup class="text-danger">*</sup>',
                                            'errorClass' => 'error-text-penduduk',
                                        ])
                                        @slot('options')
                                            <option value="" selected>- Pilih Salah Satu -</option>
                                        @endslot
                                    @endcomponent
                                </div>
                            </div>
                            <div class="card mt-4 border shadow-none">
                                <div class="card-header">
                                    <div class="card-head-row">
                                        <div class="card-title">Data Penduduk Yang Diintervensi</div>
                                    </div>
                                </div>
                                <div class="card-body pt-3">
                                    <div class="row">
                                        <div class="col">
                                            <div class="table-responsive mt-2">
                                                <table class="table table-hover table-striped table-bordered"
                                                    id="{{ $id ?? 'dataTables' }}" cellspacing="0" width="100%">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


@push('scripts')
    {{-- Tambah Penduduk --}}
    <script>
        let infoSubIndikator =
            '{{ isset($realisasiIntervensi) ? $realisasiIntervensi->perencanaan->indikator->nama : null }}'
        let realisasiId = '{{ isset($realisasiIntervensi) ? $realisasiIntervensi->id : null }}'
        let val_sasaran_intervensi = null
        let val_orang_tua = null
        let val_anak = null
        let disableTabPenduduk = '{{ $method == 'POST' ? 1 : 0 }}'
        let count_table = '{{ isset($realisasiIntervensi) ? $realisasiIntervensi->pendudukRealisasi->count() : 0 }}';


        $('#v-pills-penduduk-tab-icons').click(function() {
            if (disableTabPenduduk == 1) {
                swal("Tentukan terlebih dahulu sub indikator, lalu simpan dan kemudian dapat lanjut untuk memilih penduduk realisasi", {
                    icon: "error",
                    button: "Ok",
                });
            } else {
                $('#info-sub-indikator').text(infoSubIndikator)
            }
        })

        if ('{{ $urlKedua }}' == 'tambah-penduduk-realisasi') {
            $('#v-pills-penduduk-tab-icons').trigger('click')
        }

        const clearOptionPenduduk = () => {
            $('#orang-tua').val('')
            $("#orang-tua").trigger('change')
            $('#anak').attr('disabled', true)
            $('#anak').val('')
            $("#anak").trigger('change')
            $('#anak').empty()
        }

        const formValidation = $('#formPenduduk .req').serializeArray()

        const checkValWilayah = () => {
            if (($('#kecamatan').val() == '') || ($('#desa').val() == '')) {
                swal("Kecamatan dan Desa harus dipilih terlebih dahulu", {
                    icon: "error",
                    button: "Ok",
                });
                $('input[type=radio][name=sasaran_intervensi]').prop("checked", false);
                validation(formValidation)
                clearOptionPenduduk()
            }
        }

        clearOptionPenduduk()

        $('input[type=radio][name=sasaran_intervensi]').change(function() {
            checkValWilayah()
            clearOptionPenduduk()
            val_sasaran_intervensi = $("input[name='sasaran_intervensi']:checked").val()
            $('#col-orang-tua').addClass('d-none')
            $('#col-anak').addClass('d-none')
            $('.error-text-penduduk').html('')

            if (val_sasaran_intervensi == 'Orang Tua') {
                $('#col-orang-tua').removeClass('d-none')
            } else {
                $('#col-orang-tua').removeClass('d-none')
                $('#col-anak').removeClass('d-none')
            }
        })

        $('#kecamatan').change(function() {
            $('#col-orang-tua').addClass('d-none')
            $('#col-anak').addClass('d-none')
            $('input[type=radio][name=sasaran_intervensi]').prop("checked", false);

            $.get("{{ url('list/desa') }}", {
                kecamatan: $('#kecamatan').val(),
            }).done(function(response) {
                $('.kecamatan-error').html('');
                $('#desa').empty()
                $('#desa').append('<option value="" selected hidden>- Pilih Salah Satu -</option>')
                for (let i = 0; i < response.data.length; i++) {
                    const id = response.data[i].id
                    const nama = response.data[i].nama
                    $('#desa').val('')
                    $('#desa').append($('<option>').val(id).text(nama))
                }
            });
        })

        $('#desa').change(function() {
            clearOptionPenduduk()

            $.get("{{ url('list/orang-tua-desa') }}", {
                desa: $('#desa').val(),
            }).done(function(response) {
                $('.desa-error').html('');
                $('#orang-tua').empty()
                $('#orang-tua').append('<option value="" selected hidden>- Pilih Salah Satu -</option>')
                for (let i = 0; i < response.data.length; i++) {
                    const id = response.data[i].id
                    const nama_ibu = response.data[i].nama_ibu
                    const nik_ibu = response.data[i].nik_ibu
                    const nama_ayah = response.data[i].nama_ayah
                    const nik_ayah = response.data[i].nik_ayah
                    let text = ''
                    if (nama_ibu) {
                        text += 'Ibu: ' + nama_ibu + ' (' + nik_ibu + ')'
                    }
                    if (nama_ibu && nama_ayah) {
                        text += ', '
                    }
                    if (nama_ayah) {
                        text += 'Ayah: ' + nama_ayah + ' (' + nik_ayah + ')'
                    }

                    $('#orang-tua').append($('<option>').val(id).text(text))
                }
            })
        })

        $('#orang-tua').change(function() {
            $('.orang_tua-error').html('');
            val_orang_tua = $('#orang-tua').val()
            if ((val_sasaran_intervensi == 'Anak' || val_sasaran_intervensi == 'Orang Tua dan Anak') && ($(
                    '#orang-tua').val() != '')) {
                $.get("{{ url('list/anak') }}", {
                    orang_tua: val_orang_tua,
                }).done(function(response) {
                    $('#anak').attr('disabled', false)
                    $('#anak').empty()
                    $('#anak').append('<option value="" selected hidden>- Pilih Salah Satu -</option>')
                    for (let i = 0; i < response.data.length; i++) {
                        const id = response.data[i].id
                        const nama = response.data[i].nama
                        $('#anak').append($('<option>').val(id).text(nama))
                    }

                });
            } else {
                if (val_sasaran_intervensi == 'Orang Tua') {
                    if (val_orang_tua != '') {
                        addPenduduk()
                    }
                }
            }
        })

        $('#anak').change(function() {
            $('.anak-error').html('');
            val_anak = $('#anak').val()
            if (val_orang_tua != '' && val_anak != '') {
                addPenduduk()
            }
        })

        let no = '{{ isset($maxNomorPenduduk) ? $maxNomorPenduduk + 1 : 1 }}';

        function addPenduduk() {
            let nama_ayah = $('#orang-tua option:selected').attr('data-ayah')
            let nama_ibu = $('#orang-tua option:selected').attr('data-ibu')
            let nama_anak = $('#anak option:selected').text()

            $.ajax({
                type: "POST",
                url: "{{ url('realisasi-intervensi/insert-penduduk') }}",
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: {
                    'realisasi_id': realisasiId,
                    'sasaran_intervensi': val_sasaran_intervensi,
                    'orang_tua_id': val_orang_tua,
                    'anak_id': val_anak,
                    'nomor': no
                },
                success: function(response) {
                    console.log(response)
                    if ($.isEmptyObject(response.error)) {
                        if (response == 'Penduduk Sudah Ada') {
                            swal("Penduduk Sudah Ditambahkan Sebelumnya.", {
                                icon: "error",
                                button: "Ok",
                            });
                        }

                        if (response == 'Berhasil') {
                            swal("Berhasil ditambahkan.", {
                                icon: "success",
                                buttons: false,
                                timer: 750,
                            });
                            table.draw();
                            no++
                            count_table++
                        }
                    } else {
                        printErrorMsg(response.error);
                        swal({
                            title: "Gagal!",
                            text: "Terjadi kesalahan, mohon periksa kembali data yang diinputkan.",
                            icon: "error",
                            button: "Ok",
                        })
                    }
                }
            })
        }

        $('#selesai-direalisasi').click(function() {
            if (count_table > 0) {
                swal({
                    title: 'Apakah Anda yakin?',
                    text: "Anda tidak akan dapat mengubah data ini lagi apabila telah disetujui oleh Admin, jadi mohon pastikan bahwa sub indikator beserta daftar penduduk realisasi sudah benar dan sesuai. Lanjutkan ?",
                    icon: "warning",
                    dangerMode: true,
                    buttons: ["Batal", "Ya"],
                }).then((result) => {
                    if (result) {
                        $.post("{{ url('realisasi-intervensi/selesai-direalisasi') }}", {
                            _token: "{{ csrf_token() }}",
                            realisasiId: realisasiId
                        }).done(function(response) {
                            swal("Berhasil, selanjutnya menunggu konfirmasi oleh Admin.", {
                                icon: "success",
                                button: "Ok",
                            }).then((value) => {
                                location.href = "{{ url()->previous() }}";
                            });
                        })
                    } else {
                        swal("Proses dibatalkan.", {
                            icon: "error",
                        });
                    }
                })

            } else {
                swal("Tambahkan setidaknya 1 penduduk yang direalisasi.", {
                    icon: "error",
                    button: "Ok",
                });
            }
        })

        var table = $('#dataTables').DataTable({
            processing: true,
            serverSide: true,
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            ajax: {
                url: "{{ url('realisasi-intervensi-penduduk') }}",
                data: function(d) {
                    d.realisasi_id = realisasiId;
                    // d.tahun_filter = $('#tahun-filter').val();
                    // d.opd_filter = $('#opd-filter').val();
                    // d.status_filter = $('#status-filter').val();
                    // d.search_filter = $('input[type="search"]').val();
                },
            },
            "columns": [{
                    "data": "id",
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    "data": "nomor",
                    "className": "text-center",
                    "visible": false
                },
                {
                    "data": "sasaran_intervensi",
                    "className": "text-center"
                },
                {
                    "data": "nama_ayah",
                    "render": function(data, type, row, meta) {
                        if (row.nama_ayah) {
                            return data;
                        } else {
                            return '-';
                        }
                    },
                    "visible": false
                },
                {
                    "data": "nama_ibu",
                    "render": function(data, type, row, meta) {
                        if (row.sasaran_intervensi != 'Anak') {
                            if (row.nama_ibu) {
                                return '<i class="fas fa-check-square text-success"></i> ' + data;
                            } else {
                                return '<i class="fas fa-check-square text-success"></i> -';
                            }
                        } else {
                            return data
                        }
                    },
                },
                {
                    "data": "nama_anak",
                    "render": function(data, type, row, meta) {
                        if (row.sasaran_intervensi != 'Orang Tua') {
                            return '<i class="fas fa-check-square text-success"></i> ' + data;
                        } else {
                            return '-'
                        }
                    },
                },
                {
                    "data": "kecamatan",
                    "className": "text-center"
                },
                {
                    "data": "desa",
                    "className": "text-center"
                },
                {
                    "data": "nomor",
                    "render": function(data, type, row, meta) {
                        return '<button type="button" class="btn btn-rounded btn-danger btn-sm btn-delete-penduduk" id="btn-delete-penduduk" value="' +
                            row.nomor + '"><i class="fas fa-trash-alt"></i></button>';
                    },
                    "className": "text-center"
                }
            ],
            order: [
                [1, 'desc'],
            ],
        })

        $('#dataTables').on('click', '.btn-delete-penduduk', function() {
            let nomor = $(this).val();
            $.ajax({
                type: "POST",
                url: "{{ url('realisasi-intervensi/delete-penduduk') }}",
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: {
                    'realisasi_id': realisasiId,
                    'nomor': nomor
                },
                success: function(response) {
                    console.log(response)
                    if (response == 'Berhasil') {
                        swal("Berhasil Dihapus.", {
                            buttons: false,
                            icon: 'success',
                            timer: 800,
                        });
                        table.draw();
                        count_table--
                    } else {
                        swal({
                            title: "Gagal!",
                            text: "Terjadi kesalahan, mohon periksa kembali data yang diinputkan.",
                            icon: "error",
                            button: "Ok",
                        }).then((value) => {
                            printErrorMsg(response.error);
                        })
                    }
                }
            })
        });
    </script>
@endpush
