<form id="{{ $form_id }}" action="#" method="POST" enctype="multipart/form-data">
    @csrf
    @if (isset($method) && $method == 'PUT')
        @method('PUT')
    @endif
    <div class="row">
        <div class="col-4">
            <div class="col-sm-12 col-lg-12">
                <div class="table-responsive table-sales">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td class="fw-bold">Nama : </td>
                                <td class="text-right">
                                    {{ $anak->nama }}
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">NIK : </td>
                                <td class="text-right">
                                    {{ $anak->nik }}
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Jenis Kelamin : </td>
                                <td class="text-right">
                                    {{ $anak->jenis_kelamin }}
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Tanggal Lahir : </td>
                                <td class="text-right">
                                    {{ \Carbon\Carbon::parse($anak->tanggal_lahir)->format('d F Y') }}
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Berat Badan Lahir : </td>
                                <td class="text-right">
                                    {{ $anak->bb_lahir }} Kg
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Tinggi Badan Lahir : </td>
                                <td class="text-right">
                                    {{ $anak->tb_lahir }} Cm
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Nama Ibu : </td>
                                <td class="text-right">
                                    {{ $anak->orangTua->nama_ibu ?? '-' }}
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">NIK Ibu : </td>
                                <td class="text-right">
                                    {{ $anak->orangTua->nik_ibu ?? '-' }}
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Nama Ayah : </td>
                                <td class="text-right">
                                    {{ $anak->orangTua->nama_ayah ?? '-' }}
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">NIK Ayah : </td>
                                <td class="text-right">
                                    {{ $anak->orangTua->nik_ayah ?? '-' }}
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Kecamatan : </td>
                                <td class="text-right">
                                    {{ $anak->orangTua->desa->kecamatan->nama ?? '-' }}
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Desa : </td>
                                <td class="text-right">
                                    {{ $anak->orangTua->desa->nama ?? '-' }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-8">
            @component('dashboard.components.forms.inputPengukuranAnak',
                [
                    'anak' => $anak,
                    'data' => $data ?? '',
                ])
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
