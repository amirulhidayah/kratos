@push('styles')
    <style>
        #peta {
            height: 450px;
            margin-top: 0px;
        }

        .select2-container {
            margin-bottom: 5px !important;
        }
    </style>
@endpush

<form action="#" id="{{ $form ?? 'form' }}" method="POST" enctype="multipart/form-data" autocomplete="off"
    class="pt-2">
    <span class="text-danger" style="font-size: 10pt; font-style: italic">* Wajib Diisi</span>
    @csrf
    @if (isset($method) && $method == 'PUT')
        @method('PUT')
    @endif
    <div class="row">
        <div class="col-lg-8">
            <div class="form-group pb-0">
                @component('dashboard.components.formElements.select',
                    [
                        'label' => 'Sub Indikator',
                        'id' => 'sub-indikator',
                        'name' => 'sub_indikator',
                        'class' => 'select2 req',
                        'wajib' => '<sup class="text-danger">*</sup>',
                    ])
                    @slot('options')
                        @foreach ($sub_indikator as $item)
                            <option value="{{ $item->id }}"
                                {{ isset($rencanaIntervensi) && $rencanaIntervensi->indikator_id == $item->id ? 'selected' : '' }}>
                                {{ $item->nama }}</option>
                        @endforeach
                    @endslot
                @endcomponent
            </div>
            <div class="form-group pb-0">
                @component('dashboard.components.formElements.input',
                    [
                        'label' => 'Rencana Anggaran (Rp)',
                        'id' => 'nilai-pembiayaan',
                        'name' => 'nilai_pembiayaan',
                        'class' => 'rupiah req',
                        'placeholder' => 'Masukkan Rencana Anggaran',
                        'wajib' => '<sup class="text-danger">*</sup>',
                        'value' => $rencanaIntervensi->nilai_pembiayaan ?? '',
                        'info' => 'Apabila tidak ada anggaran, silahkan masukkan angka 0',
                    ])
                @endcomponent
            </div>
            <div class="form-group pb-0">
                @component('dashboard.components.formElements.select',
                    [
                        'label' => 'Sumber Dana',
                        'id' => 'sumber-dana',
                        'name' => 'sumber_dana',
                        'class' => 'select2 req',
                        'wajib' => '<sup class="text-danger">*</sup>',
                    ])
                    @slot('options')
                        @foreach ($sumberDana as $item)
                            <option value="{{ $item->id }}"
                                {{ isset($rencanaIntervensi) && $rencanaIntervensi->sumber_dana_id == $item->id ? 'selected' : '' }}>
                                {{ $item->nama }}</option>
                        @endforeach
                    @endslot
                @endcomponent
            </div>
            <div class="form-group pb-0">
                <label class="my-2">Pilih OPD Terkait <span class="text-danger">(Boleh Dikosongkan)</span></label>
                <div class="select2-input select2-danger">
                    <select id="opd-terkait" name="opd_terkait[]" class="form-control multiple" multiple="multiple"
                        data-label="OPD Terkait">
                        @foreach ($opd as $item3)
                            <option value="{{ $item3->id }}">{{ $item3->nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="form-group pb-0">
                <label for="" class="my-2">Dokumen Pendukung <sup class="text-danger">*</sup></label>
                <div class="row" id="dokumen">
                    @if (isset($rencanaIntervensi) && $rencanaIntervensi->dokumenPerencanaan && $method == 'PUT')
                        @foreach ($rencanaIntervensi->dokumenPerencanaan as $item)
                            <div class="col-12 col-document" id="col-document-old-{{ $loop->iteration }}">
                                <div class="card box-upload mb-3 pegawai" id="box-upload-{{ $loop->iteration }}"
                                    class="box-upload">
                                    <div class="card-body py-3">
                                        <div class="row">
                                            <div class="col-3 d-flex align-items-center justify-content-center">
                                                <img src="{{ asset('assets/dashboard/img/pdf.png') }}" alt=""
                                                    width="70px">
                                            </div>
                                            <div class="col-9">
                                                <div class="mb-3 mt-2">
                                                    {{-- start validation --}}
                                                    <input type="hidden" name="nama_dokumen_{{ $loop->iteration }}"
                                                        value="{{ $item->nama }}"
                                                        class="nama_dokumen {{ $loop->iteration > 2 ? 'req' : '' }}"
                                                        data-label="Nama Dokumen" data-iter="{{ $loop->iteration }}"
                                                        id="nama_dokumen-hidden-{{ $loop->iteration }}">
                                                    {{-- end validation --}}
                                                    <input type="text" class="form-control nama-dokumen-old"
                                                        id="nama-dokumen-{{ $loop->iteration }}"
                                                        name="nama_dokumen_old[]" placeholder="Masukkan Nama Dokumen"
                                                        value="{{ $item->nama }}"
                                                        data-iter="{{ $loop->iteration }}">
                                                    {{-- start validation --}}
                                                    <p class="text-danger error-text nama_dokumen_{{ $loop->iteration }}-error my-0"
                                                        id="nama_dokumen-error-{{ $loop->iteration }}"></p>
                                                    {{-- end validation --}}
                                                    <p class="text-danger error-text nama_dokumen-error my-0"
                                                        id="nama_dokumen-error-{{ $loop->iteration }}"></p>
                                                </div>
                                                <div class="mb-3">
                                                    <a type="button"
                                                        href="{{ Storage::exists('uploads/dokumen/perencanaan/' . $item->file) ? Storage::url('uploads/dokumen/perencanaan/' . $item->file) : 'tidak-ditemukan' }}"
                                                        target="_blank" class="btn btn-primary shadow-sm w-100"><i
                                                            class="fas fa-eye"></i> Lihat
                                                        Dokumen</a>
                                                </div>
                                                <input name="file_dokumen_old[]" class="form-control file-dokumen-old"
                                                    id="file-dokumen-{{ $loop->iteration }}" type="file"
                                                    multiple="true" data-iter="{{ $loop->iteration }}"
                                                    data-id="{{ $item->id }}" accept="application/pdf">
                                                <small class="text-muted" style="font-style: italic">Kosongkan
                                                    jika tidak ingin
                                                    mengubah
                                                    dokumen</small>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($loop->iteration > 1)
                                        <button type="button"
                                            class="btn btn-danger fw-bold card-footer bg-danger text-center delete-document p-0"
                                            onclick="deleteDocumentOld({{ $loop->iteration }})"
                                            id="delete-document-old-{{ $loop->iteration }}"
                                            value="{{ $item->id }}"><i class="fas fa-trash-alt"></i>
                                            Hapus</button>
                                    @endif
                                </div>
                                <p class="text-danger error-text dokumen-error my-0" id="dokumen-error-1"></p>
                            </div>
                        @endforeach
                    @else
                        <div class="col-12 col-document" id="col-dokumen-1">
                            <div class="card box-upload mb-3 pegawai" id="box-upload-1" class="box-upload">
                                <div class="card-body py-3">
                                    <div class="row">
                                        <div class="col-3 d-flex align-items-center justify-content-center">
                                            <img src="{{ asset('assets/dashboard/img/pdf.png') }}" alt=""
                                                width="70px">
                                        </div>
                                        <div class="col-9">
                                            <div class="mb-3 mt-2">
                                                {{-- start validation --}}
                                                <input type="hidden" name="nama_dokumen_1" value=""
                                                    class="nama_dokumen req" data-label="Nama Dokumen" data-iter="1"
                                                    id="nama_dokumen-hidden-1">
                                                {{-- end validation --}}

                                                <input type="text" class="form-control nama-dokumen"
                                                    id="nama-dokumen-1" name="nama_dokumen[]"
                                                    placeholder="Masukkan Nama Dokumen" value="" data-iter="1"
                                                    onkeyup="rmValNamaDokumen(1)">

                                                {{-- start validation --}}
                                                <p class="text-danger error-text nama_dokumen_1-error my-0"
                                                    id="nama_dokumen-error-1"></p>
                                                {{-- end validation --}}

                                                <p class="text-danger error-text nama_dokumen-error my-0"
                                                    id="nama_dokumen-error-1"></p>

                                            </div>
                                            <div class="mb-3">
                                                {{-- start validation --}}
                                                <input type="hidden" name="file_dokumen_1" value=""
                                                    class="req file_dokumen" data-label="File Dokumen" data-iter="1"
                                                    id="file_dokumen-hidden-1">
                                                {{-- end validation --}}

                                                <input name="file_dokumen[]" class="form-control file-dokumen"
                                                    id="file-dokumen-1" type="file" multiple="true"
                                                    data-iter="1" accept="application/pdf"
                                                    onchange="rmValFileDokumen(1)">

                                                {{-- start validation --}}
                                                <p class="text-danger error-text file_dokumen_1-error my-0"
                                                    id="file_dokumen-error-1"></p>
                                                {{-- end validation --}}

                                                <p class="text-danger error-text file_dokumen-error my-0"
                                                    id="file_dokumen-error-1"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <p class="text-danger error-text dokumen-error my-0" id="dokumen-error-1"></p>
                        </div>
                    @endif
                    <div class="col-12 align-self-center col-add-dokumen">
                        <div class="text-center text-muted" onclick="addDokumen()" style="cursor: pointer">
                            <h1><i class="fas fa-plus-circle"></i></h1>
                            <h6>Tambah Dokumen</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group text-right">
        @component('dashboard.components.buttons.submit')
            @slot('label')
                {{ $submitLabel }}
                @endslot @slot('icon')
                {!! $submitIcon !!}
            @endslot
        @endcomponent </div>
</form>

@push('scripts')
    <script>
        if ('{{ isset($opdTerkait) }}') {
            const opdTerkait = {!! $opdTerkait ?? '[]' !!};
            for (let i = 0; i < opdTerkait.length; i++) {
                $('#opd-terkait option[value="' + opdTerkait[i] + '"]').prop('selected', true);
                $('#opd-terkait').trigger('change');
            }
        }

        $('.multiple').select2({
            placeholder: "- Bisa Pilih Lebih Dari Satu -",
            theme: "bootstrap",
        })

        $('#form').submit(function(e) {
            e.preventDefault();
            clearTextError()

            $('#desa-perencanaan').val() == '' ? $('#desa-hidden').addClass('req') : $('#desa-hidden')
                .removeClass('req');

            const formValidation = $('#form .req').serializeArray()
            validation(formValidation)

            if ('{{ $method == 'POST' }}') {
                var title = 'Kirim Data?'
                var text = 'Apakah anda yakin ingin mengirim data ini?'
            } else {
                var title = 'Perbarui Data?'
                var text = 'Apakah anda yakin ingin perbarui data ini?'
            }

            $('.rupiah').unmask();
            let formData = new FormData(this);

            if ('{{ $method }}' == 'PUT') {
                formData.append('deleteDocumentOld', itemDocumentOld)
            }

            swal({
                title: title,
                text: text,
                icon: "info",
                buttons: ["Batal", "Ya"],
            }).then((result) => {
                if (result) {
                    $.ajax({
                        type: "POST",
                        url: "{{ $action }}",
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        data: formData,
                        cache: false,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            console.log(response)
                            $('.rupiah').mask('000.000.000.000.000', {
                                reverse: true
                            })
                            if ($.isEmptyObject(response.error)) {
                                if (response == 'nama_dokumen_kosong_old') {
                                    swal({
                                        title: "Gagal!",
                                        text: "Terdapat Nama Dokumen yang kosong.",
                                        icon: "error",
                                    })
                                    $.each($('.nama-dokumen-old'), function(index, value) {
                                        if ($(value).val() == '') {
                                            $(value).addClass('is-invalid');
                                            $('#nama_dokumen-error-' + $(value)
                                                .data(
                                                    'iter')).text(
                                                'Nama Dokumen tidak boleh kosong.'
                                            )
                                        }
                                    });
                                }

                                if (response == 'nama_dokumen_kosong') {
                                    swal({
                                        title: "Gagal!",
                                        text: "Terdapat Nama Dokumen yang kosong.",
                                        icon: "error",
                                    })
                                    $.each($('.nama-dokumen'), function(index, value) {
                                        if ($(value).val() == '') {
                                            $(value).addClass('is-invalid');
                                            $('#nama_dokumen-error-' + $(value)
                                                .data(
                                                    'iter')).text(
                                                'Nama Dokumen tidak boleh kosong.'
                                            )
                                        }
                                    });
                                }

                                if (response ==
                                    'nama_dokumen_kosong_dan_file_dokumen_kosong') {
                                    swal({
                                        title: "Gagal!",
                                        text: "Terdapat Nama Dokumen dan File Dokumen yang kosong.",
                                        icon: "error",
                                    })
                                    $.each($('.nama-dokumen'), function(index, value) {
                                        if ($(value).val() == '') {
                                            $(value).addClass('is-invalid');
                                            $('#nama_dokumen-error-' + $(value)
                                                .data(
                                                    'iter')).text(
                                                'Nama Dokumen tidak boleh kosong.'
                                            )
                                        }
                                    });
                                    $.each($('.file-dokumen'), function(index, value) {
                                        if ($(value).val() == '') {
                                            $(value).addClass('is-invalid');
                                            $('#file_dokumen-error-' + $(value)
                                                .data(
                                                    'iter')).text(
                                                'File Dokumen tidak boleh kosong.'
                                            )
                                        }
                                    });
                                }

                                if (response == 'kirim') {
                                    swal({
                                        title: "Berhasil!",
                                        text: "Data berhasil dikirim dan sedang menunggu proses konfirmasi oleh admin.",
                                        icon: "success",
                                    }).then((value) => {
                                        location.href = "{{ url()->previous() }}";
                                    });
                                }

                                if (response == 'perbarui') {
                                    swal({
                                        title: "Berhasil!",
                                        text: "Data berhasil diperbarui.",
                                        icon: "success",
                                    }).then((value) => {
                                        location.href = "{{ url()->previous() }}";
                                    });
                                }

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
                    swal("Data batal dikirim/diperbarui.", {
                        icon: "error",
                    });
                    $('.rupiah').mask('000.000.000.000.000', {
                        reverse: true
                    })
                }
            });
        });

        const printErrorMsg = (msg) => {
            $.each(msg, function(key, value) {
                $('.' + key + '-error').text(value);
            });
        }
    </script>

    {{-- Dokumen --}}
    <script>
        // Dokumen
        $(document).on('change', '.file-dokumen-old', function() {
            let size = $(this)[0].files[0].size / 1024
            let id = $(this).data('id')
            let iter = $(this).data('iter');
            if (size > 20480) {
                swal({
                    title: "Gagal!",
                    text: "Ukuran dokumen terlalu besar! Maksimal 20MB",
                    icon: "error",
                }).then((value) => {
                    $(this).val('');
                });
            }
        });

        $(document).on('change', '.file-dokumen', function() {
            let size = $(this)[0].files[0].size / 1024
            if (size > 20480) {
                swal({
                    title: "Gagal!",
                    text: "Ukuran dokumen terlalu besar! Maksimal 20MB",
                    icon: "error",
                }).then((value) => {
                    $(this).val('');
                });
            }
        });

        let itemDocumentOld = [];

        function deleteDocumentOld(iter) {
            let val = $('#delete-document-old-' + iter).val();
            itemDocumentOld.push(val);
            $('#col-document-old-' + iter).fadeOut(function() {
                $('#col-document-old-' + iter).remove();
            });
        }

        function deleteDokumen(iter) {
            $('#col-dokumen-' + iter).fadeOut(function() {
                $('#col-dokumen-' + iter).remove();
            });
        }

        function rmValNamaDokumen(iter) {
            if ($('#nama-dokumen-' + iter).val() != '') {
                $('#nama_dokumen-hidden-' + iter).removeClass('req');
            } else {
                $('#nama_dokumen-hidden-' + iter).addClass('req');
            }
        }

        function rmValFileDokumen(iter) {
            if ($('#file-dokumen-' + iter).val() != '') {
                $('#file_dokumen-hidden-' + iter).removeClass('req');
            } else {
                $('#file_dokumen-hidden-' + iter).addClass('req');
            }
        }


        let iterDokumen = 0;

        function addDokumen() {
            if ((iterDokumen == 0)) {
                let count = {{ isset($maxDokumen) ? $maxDokumen : 1 }};
                iterDokumen = count + 1;
            }
            $('.col-add-dokumen').remove();
            $('#dokumen').append(`
            <div class="col-12 col-document" id="col-dokumen-` + iterDokumen + `">
                <div class="card box-upload mb-3" id="box-upload-` +
                iterDokumen + `" class="box-upload">
                    <div class="card-body pb-2">
                        <div class="row">
                            <div class="col-3 d-flex align-items-center justify-content-center">
                                <img src="{{ asset('assets/dashboard/img/pdf.png') }}" alt="" width="70px">
                            </div>
                            <div class="col-9">
                                <div class="mb-3 mt-2">
                                    <input type="hidden" name="nama_dokumen_` + iterDokumen +
                `" value=""
                                                        class="req nama_dokumen" data-label="Nama Dokumen" data-iter="` +
                iterDokumen + `"
                                                        id="nama_dokumen-hidden-` + iterDokumen +
                `">
                                                        <input type="text" class="form-control nama-dokumen" id="nama-dokumen-` +
                iterDokumen +
                `"
                                                        name="nama_dokumen[]" placeholder="Masukkan Nama Dokumen" value="" data-iter="` +
                iterDokumen +
                `"  onkeyup="rmValNamaDokumen(` + iterDokumen +
                `)">
                                                        <p class="text-danger error-text nama_dokumen-error my-0" id="nama_dokumen-error-` +
                iterDokumen +
                `"></p>
                                                        <p class="text-danger error-text nama_dokumen_` + iterDokumen + `-error my-0"
                                                                            id="nama_dokumen-error-` + iterDokumen +
                `"></p>
                                </div>

                                <div class="mb-3">
                                    <input type="hidden" name="file_dokumen_` + iterDokumen +
                `" value=""
                                                        class="req file_dokumen" data-label="File Dokumen" data-iter="` +
                iterDokumen + `"
                                                        id="file_dokumen-hidden-` + iterDokumen +
                `">
                                    <input name="file_dokumen[]" class="form-control file-dokumen" type="file" id="file-dokumen-` +
                iterDokumen + `"
                                        multiple="true" data-iter="` + iterDokumen +
                `" accept="application/pdf" onchange="rmValFileDokumen(` + iterDokumen + `)">
                <p class="text-danger error-text file_dokumen_` + iterDokumen + `-error my-0"
                                                        id="file_dokumen-error-` + iterDokumen +
                `"></p>
                                    <p class="text-danger error-text file_dokumen-error my-0" id="file_dokumen-error-` +
                iterDokumen + `"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button"
                        class="btn btn-danger fw-bold card-footer bg-danger text-center p-0 delete-document"
                        onclick="deleteDokumen(` + iterDokumen + `)"><i class="fas fa-trash-alt"></i>
                        Hapus</button>
                </div>
                <p class="text-danger error-text dokumen-error my-0" id="dokumen-error-1"></p>
            </div>
            <div class="col-12 align-self-center col-add-dokumen">
                <div class="text-center text-muted" onclick="addDokumen()" style="cursor: pointer">
                    <h1><i class="fas fa-plus-circle"></i></h1>
                    <h6>Tambah Dokumen</h6>
                </div>

            </div>
                
            `);
            iterDokumen++;
        }

        $('.nama-dokumen-old').keyup(function() {
            let iter = $(this).data('iter');
            $(`#nama_dokumen-hidden-${iter}`).val($(this).val())
        })
    </script>
@endpush
