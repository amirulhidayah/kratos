<form id="{{ $form_id }}" action="#" method="POST" enctype="multipart/form-data">
    @csrf
    @if (isset($method) && $method == 'PUT')
        @method('PUT')
    @endif
    <div class="row">
        <div class="col-sm-12 col-lg-6">
            @component('dashboard.components.formElements.input',
                [
                    'label' => 'Nama',
                    'type' => 'text',
                    'id' => 'nama',
                    'name' => 'nama',
                    'wajib' => '<sup class="text-danger">*</sup>',
                    'placeholder' => 'Masukkan Nama',
                ])
            @endcomponent
        </div>
        <div class="col-sm-12 col-lg-6">
            @component('dashboard.components.formElements.select',
                [
                    'label' => 'Desa',
                    'id' => 'desa_id',
                    'name' => 'desa_id',
                    'class' => 'select2',
                    'wajib' => '<sup class="text-danger">*</sup>',
                ])
                @slot('options')
                @endslot
            @endcomponent
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
    @endif
    <script>
        $(document).ready(function() {
            getDesa();
        });

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

        var idKecamatan = "{{ $puskesmas->kecamatan_id ?? '' }}";
        var idDesa = "{{ $data->desa_id ?? '' }}";

        let getDesa = () => {
            $('#desa_id').html('');
            $('#desa_id').append('<option value="">--Pilih Salah Satu--</option>');
            $.ajax({
                url: "{{ url('list/desa') }}",
                type: 'GET',
                data: {
                    'kecamatan': idKecamatan,
                    'id': idDesa
                },
                success: function(response) {
                    response.data.map((data) => {
                        $('#desa_id').append('<option value="' + data.id + '">' +
                            data
                            .nama + '</option>');
                    });
                    if (idDesa) {
                        $('#desa_id').val(idDesa).trigger('change');
                    }
                }
            })
        }
    </script>
@endpush
