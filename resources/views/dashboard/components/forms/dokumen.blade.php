<form id="{{ $form_id }}" action="#" method="POST" enctype="multipart/form-data">
    @csrf
    @if (isset($method) && $method == 'PUT')
        @method('PUT')
    @endif
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            @component('dashboard.components.formElements.input',
                [
                    'label' => 'Nama Dokumen',
                    'type' => 'text',
                    'id' => 'nama',
                    'name' => 'nama',
                    'wajib' => '<sup class="text-danger">*</sup>',
                    'placeholder' => 'Masukkan Nama Dokumen',
                ])
            @endcomponent
        </div>
        <div class="col-sm-12 col-lg-12">
            @component('dashboard.components.formElements.select',
                [
                    'label' => 'Tahun',
                    'id' => 'tahun_id',
                    'name' => 'tahun_id',
                    'class' => 'select2',
                    'wajib' => '<sup class="text-danger">*</sup>',
                ])
                @slot('options')
                    @foreach ($daftarTahun as $tahun)
                        <option value="{{ $tahun->id }}">{{ $tahun->tahun }}</option>
                    @endforeach
                @endslot
            @endcomponent
        </div>
        <div class="col-sm-12 col-lg-12 mt-3">
            <label for="formFile" class="form-label">Dokumen</label>
            <input class="form-control" type="file" id="file" name="file">
            @if (isset($method) && $method == 'PUT')
                <small class="form-text text-muted mb-2">Kosongkan dokumen jika tidak ingin merubah
                    dokumen</small>
            @endif
            <small for="formFile" class="form-label text-muted mt-1">Ukuran Dokumen Tidak Boleh Lebih dari 20
                MB</small><br>
            <span class="text-danger error-text file-error"></span>
        </div>
        <div class="col-12 d-flex justify-content-end mt-3">

            @component('dashboard.components.buttons.submit',
                [
                    'label' => 'Simpan',
                ])
            @endcomponent
        </div>
    </div>
</form>

@push('scripts')
    @if (isset($method) && $method == 'PUT')
        <script>
            $(document).ready(function() {});
        </script>
    @endif
    <script>
        $('#{{ $form_id }}').submit(function(e) {
            e.preventDefault();
            resetError();
            var formData = new FormData(this);
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
                            if (response.status == 'success') {
                                swal("Berhasil", "Data Berhasil Disimpan", {
                                    icon: "success",
                                    buttons: false,
                                    timer: 1000,
                                }).then(function() {
                                    window.location.href =
                                        "{{ $back_url }}";
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
                        },
                    });
                }
            });
        });

        $(function() {
            $('.modal').modal({
                backdrop: 'static',
                keyboard: false
            })
        })

        function resetError() {
            $(".error-text").each(function() {
                $(this).html('');
            })
        }

        const printErrorMsg = (msg) => {
            $.each(msg, function(key, value) {
                $('.' + key + '-error').text(value);
            });
        }
    </script>
@endpush
