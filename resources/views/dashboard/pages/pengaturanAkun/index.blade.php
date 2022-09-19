@extends('dashboard.layouts.main')

@section('title')
    Pengaturan Akun
@endsection

@section('titlePanelHeader')
    Pengaturan Akun
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
                        <div class="card-title">Pengaturan Akun</div>
                    </div>
                </div>
                <div class="card-body">
                    <form id="form-tambah" action="#" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-12">
                                <small class="form-text text-muted mb-2">Kosongkan password jika tidak ingin mengubah
                                    password</small>
                            </div>
                            <div class="col-sm-12 col-lg-6" id="form-username">
                                @component('dashboard.components.formElements.input',
                                    [
                                        'label' => 'Username',
                                        'type' => 'text',
                                        'id' => 'username',
                                        'name' => 'username',
                                        'wajib' => '<sup class="text-danger">*</sup>',
                                        'placeholder' => 'Masukkan Username',
                                    ])
                                @endcomponent
                            </div>
                            <div class="col-sm-12 col-lg-6" id="form-password">
                                @component('dashboard.components.formElements.input',
                                    [
                                        'label' => 'Password',
                                        'type' => 'text',
                                        'id' => 'password',
                                        'name' => 'password',
                                        'wajib' => '<sup class="text-danger">*</sup>',
                                        'placeholder' => 'Masukkan Password',
                                    ])
                                @endcomponent
                            </div>
                            @if (Auth::user()->role != 'OPD')
                                <div class="col-sm-12 col-lg-12" id="form-nama">
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
                            @endif
                            <div class="col-12 d-flex justify-content-end mt-3">

                                @component('dashboard.components.buttons.submit',
                                    [
                                        'label' => 'Simpan',
                                    ])
                                @endcomponent
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#username').val("{{ Auth::user()->username }}");
            $('#nama').val("{{ Auth::user()->nama }}");
        })
    </script>

    <script>
        $('#form-tambah').submit(function(e) {
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
                        url: "{{ url('pengaturan-akun') }}",
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        data: formData,
                        cache: false,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            console.log(response);
                            if (response.status == 'success') {
                                swal("Berhasil",
                                    "Data Berhasil Disimpan, Silahkan Login Kembali", {
                                        icon: "success",
                                        buttons: false,
                                        timer: 1000,
                                    }).then(function() {
                                    window.location.href =
                                        "{{ url('logout') }}";
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

    <script>
        $('#nav-master-akun').addClass('active');
    </script>
@endpush
