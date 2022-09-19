<div class="modal fade" tabindex="-1" id="modal-buat-alasan">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Deskripsikan Alasan Mengapa Tidak Menyelesaikan Intervensi Ini Pada Tahun
                    Sebelumnya</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="form-buat-alasan" autocomplete="off">
                    @csrf
                    @method('PUT')
                    <div class="form-group pt-1">
                        <h6 class="mb-3">Sub Indikator: <span class="font-weight-bold"
                                id="modal-sub-indikator"></span></h6>
                        <label for="TextInput" class="form-label">Alasan: <sup class="text-danger">*</sup></label>
                        <textarea id="alasan-tidak-terselesaikan" name="alasan_tidak_terselesaikan" rows="7" class="form-control req"
                            placeholder="Masukkan Alasan ..." autocomplete="off" data-id="" data-label="Alasan">{{ $value ?? '' }}</textarea>
                        <span class="text-danger error-text alasan_tidak_terselesaikan-error"></span>
                    </div>
                    <div class="form-group text-right">
                        @component('dashboard.components.buttons.submit')
                            @slot('label')
                                Kirim
                            @endslot
                            @slot('icon')
                                <i class="fas fa-paper-plane"></i>
                            @endslot
                        @endcomponent
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                @component('dashboard.components.buttons.close')
                @endcomponent
            </div>
        </div>
    </div>
</div>


@push('scripts')
    <script>
        let perencanaan = null
        $(document).on('click', '.tambah-alasan', function() {
            clearTextError()
            let id = $(this).data('id')
            let sub_indikator = $(this).data('sub-indikator')
            perencanaan = id
            $('#modal-buat-alasan').modal('show');
            $('#modal-sub-indikator').text(sub_indikator)
            $('#alasan-tidak-terselesaikan').val('')
        })

        $('#form-buat-alasan').submit(function(e) {
            e.preventDefault();
            clearTextError()

            const formValidation = $('#form-buat-alasan .req').serializeArray()
            validation(formValidation)
            let formData = new FormData(this);

            swal({
                title: 'Apakah alasan yang anda inputkan sudah benar ?',
                text: 'Alasan yang telah terkirim tidak akan dapat diubah lagi.',
                icon: "info",
                buttons: ["Batal", "Ya"],
            }).then((result) => {
                if (result) {
                    $.ajax({
                        type: "POST",
                        url: "{{ $action }}/" + perencanaan,
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        data: formData,
                        cache: false,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            if ($.isEmptyObject(response.error)) {
                                swal({
                                    title: "Berhasil!",
                                    text: "Alasan berhasil dikirim.",
                                    icon: "success",
                                }).then((value) => {
                                    location.href = "{{ url()->current() }}";
                                });
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
                        },
                    })
                } else {
                    swal({
                        title: "Gagal!",
                        text: "Terjadi kesalahan, mohon periksa kembali data yang diinputkan.",
                        icon: "error",
                        button: "Ok",
                    });
                    printErrorMsg(response.error);
                }
            })
        })

        const printErrorMsg = (msg) => {
            $.each(msg, function(key, value) {
                $('.' + key + '-error').text(value);
            });
        }
    </script>
@endpush
