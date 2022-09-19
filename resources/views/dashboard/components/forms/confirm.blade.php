<form action="#" id="{{ $form ?? 'form' }}" method="POST" enctype="multipart/form-data" autocomplete="off">
    @csrf
    @if (isset($method) && $method == 'PUT')
        @method('PUT')
    @endif
    <div class="form-group">
        @component('dashboard.components.formElements.select',
            [
                'label' => 'Konfirmasi',
                'id' => 'konfirmasi',
                'name' => 'status',
                'class' => 'select2 req',
                'wajib' => '<sup class="text-danger">*</sup>',
            ])
            @slot('options')
                <option value="1">Setujui</option>
                <option value="2">Tolak</option>
            @endslot
        @endcomponent
    </div>
    <div class="form-group d-none" id="fg-alasan-ditolak">
        @component('dashboard.components.formElements.textArea',
            [
                'label' => 'Alasan Ditolak',
                'id' => 'alasan-ditolak',
                'name' => 'alasan_ditolak',
                'class' => 'form-control',
                'wajib' => '<sup class="text-danger">*</sup>',
            ])
        @endcomponent
    </div>
    <div class="form-group text-right">
        @component('dashboard.components.buttons.submit',
            ['label' => 'Konfirmasi', 'icon' => '<i class="fas fa-clipboard-check"></i>'])
        @endcomponent
    </div>
</form>

@push('scripts')
    <script>
        $('#konfirmasi').change(function() {
            $('#alasan-ditolak').val('');
            if ($(this).val() == 1) {
                $('#fg-alasan-ditolak').addClass('d-none');
                $('#alasan-ditolak').removeClass('req');
            } else {
                $('#fg-alasan-ditolak').removeClass('d-none');
                $('#alasan-ditolak').addClass('req');
            }
        });

        $('#form').submit(function(e) {
            e.preventDefault();
            $('.error-text').html('')
            const formValidation = $('#form .req').serializeArray()
            validation(formValidation)
            let formData = new FormData(this);
            swal({
                title: 'Konfirmasi Data Ini ?',
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
                            if ($.isEmptyObject(response.error)) {
                                swal({
                                    title: "Berhasil!",
                                    text: "Data berhasil dikonfirmasi.",
                                    icon: "success",
                                }).then((value) => {
                                    location.href = "{{ url()->previous() }}";
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
                    });
                } else {
                    swal("Data batal dikonfirmasi.", {
                        icon: "error",
                    });
                }
            });
            const printErrorMsg = (msg) => {
                $.each(msg, function(key, value) {
                    $('.' + key + '-error').text(value);
                });
            }


        });
    </script>
@endpush
