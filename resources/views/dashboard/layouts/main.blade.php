<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Schistosomiasis | @yield('title')</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ asset('assets/dashboard') }}/img/lambang-sigi.png" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="{{ asset('assets/dashboard') }}/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands",
                    "simple-line-icons"
                ],
                urls: ['{{ asset('assets/dashboard') }}/css/fonts.min.css']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/dashboard') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/dashboard') }}/css/atlantis.css">

    {{-- Leaflet --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
        integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
        crossorigin="" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.css" />
    <link rel="stylesheet"
        href="https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/leaflet.fullscreen.css" />

    <style>
        #overlay {
            position: fixed;
            top: 0;
            left: 0;
            z-index: 100000;
            width: 100%;
            height: 100%;
            display: none;
            background: rgba(0, 0, 0, 0.6);
        }

        .cv-spinner {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .spinner {
            width: 40px;
            height: 40px;
            border: 4px #ddd solid;
            border-top: 4px #2e93e6 solid;
            border-radius: 50%;
            animation: sp-anime 0.8s infinite linear;
        }

        @keyframes sp-anime {
            100% {
                transform: rotate(360deg);
            }
        }

        @media screen and (max-width:600px) {
            .dataTables_filter {
                margin-top: 10px;
            }
        }

        .dataTables_filter {
            display: inline !important;
            float: right !important;
        }

        .dataTables_filter.col-sm {
            margin-top: 10px;
        }

        .dt-buttons {
            display: inline !important;

            margin-left: 10px !important;
            float: left !important;
            ;

        }

        .dt-button-collection {
            margin-top: 10px !important;
            margin-bottom: 10px !important;
        }

        .buttons-columnVisibility {
            margin-bottom: 5px;
            background-color: rgba(var(--danger-rgb), 0.15);
            color: var(--danger-color);
            border-color: transparent;
            display: inline-block;
            font-weight: 400;
            line-height: 1.5;
            ont-size: 14px;
            border-radius: 2rem;
            padding: .25rem .5rem;
            text-align: center;
            text-decoration: none;
            vertical-align: middle;
            user-select: none;
            border: 0.1px solid grey;
            transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }

        .buttons-columnVisibility:hover {
            background-color: rgba(var(--primary-rgb), 0.15);
            color: var(--primary-color);
            border: 0.1px solid transparent;
        }

        .dt-button-collection .active {
            margin-bottom: 5px;
            background-color: #48ABF7;
            color: white;
            border-color: transparent;
            display: inline-block;
            font-weight: 400;
            line-height: 1.5;
            ont-size: 14px;
            border-radius: 2rem;
            padding: .25rem .5rem;
            text-align: center;
            text-decoration: none;
            vertical-align: middle;
            user-select: none;
            border: 1px solid transparent;
            border-top-color: transparent;
            border-right-color: transparent;
            border-bottom-color: transparent;
            border-left-color: transparent;
            transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }

        .dataTables_length {
            display: inline !important;
            margin-bottom: 5px !important;
            float: left;
        }

        .paginate_button {
            font-size: 12px !important;
        }

        .dataTables_paginate {
            margin-top: 10px !important;
        }

        .btn:focus {
            color: white
        }

        .labelPolygon {
            background-color: transparent;
            border-color: transparent;
            box-shadow: none;
            z-index: 999;
            font-weight: bold;
        }
    </style>
    @stack('styles')
</head>

<body>
    <div id="overlay">
        <div class="cv-spinner">
            <span class="spinner"></span>
        </div>
    </div>

    <div class="wrapper fullheight-side sidebar_minimize">
        <div class="main-header">
            @include('dashboard.layouts.logoHeader')
            @include('dashboard.layouts.navbarHeader')
        </div>

        @include('dashboard.layouts.sidebar')
        <div class="main-panel">
            <div class="container">
                <div class="panel-header bg-primary-gradient">
                    <div class="page-inner pb-5 pt-5">
                        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                            <div>
                                <h2 class="text-white fw-bold">@yield('titlePanelHeader')</h2>
                                <h4 class="text-white">@yield('subTitlePanelHeader')</h4>
                            </div>
                            <div class="ml-md-auto py-2 py-md-0">
                                @yield('buttonPanelHeader')
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-inner mt--5">
                    @yield('contents')
                </div>
            </div>
            @include('dashboard.layouts.footer')
        </div>



    </div>
    <!--   Core JS Files   -->
    <script src="{{ asset('assets/dashboard') }}/js/core/jquery.3.2.1.min.js"></script>
    <script src="{{ asset('assets/dashboard') }}/js/core/popper.min.js"></script>
    <script src="{{ asset('assets/dashboard') }}/js/core/bootstrap.min.js"></script>

    <!-- jQuery UI -->
    <script src="{{ asset('assets/dashboard') }}/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script src="{{ asset('assets/dashboard') }}/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="{{ asset('assets/dashboard') }}/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

    <!-- Moment JS -->
    <script src="{{ asset('assets/dashboard') }}/js/plugin/moment/moment.min.js"></script>
    <script src="{{ asset('assets/dashboard') }}/js/plugin/moment/moment-with-locales.min.js"></script>


    <!-- Chart JS -->
    <script src="{{ asset('assets/dashboard') }}/js/plugin/chart.js/chart.min.js"></script>

    <!-- jQuery Sparkline -->
    <script src="{{ asset('assets/dashboard') }}/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

    <!-- Chart Circle -->
    <script src="{{ asset('assets/dashboard') }}/js/plugin/chart-circle/circles.min.js"></script>

    <!-- Datatables -->
    <script src="{{ asset('assets/dashboard') }}/js/plugin/datatables/datatables.min.js"></script>

    {{-- DataTables Extensions --}}
    <script src="{{ asset('assets/dashboard') }}/js/plugin/datatables/dataTables.buttons.min.js"></script>
    <script src="{{ asset('assets/dashboard') }}/js/plugin/datatables/jszip.min.js"></script>
    <script src="{{ asset('assets/dashboard') }}/js/plugin/datatables/buttons.html5.min.js"></script>
    <script src="{{ asset('assets/dashboard') }}/js/plugin/datatables/buttons.print.min.js"></script>
    <script src="{{ asset('assets/dashboard') }}/js/plugin/datatables/buttons.colVis.min.js"></script>

    <!-- Bootstrap Notify -->
    <script src="{{ asset('assets/dashboard') }}/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

    <!-- Bootstrap Toggle -->
    <script src="{{ asset('assets/dashboard') }}/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>

    <!-- jQuery Vector Maps -->
    <script src="{{ asset('assets/dashboard') }}/js/plugin/jqvmap/jquery.vmap.min.js"></script>
    <script src="{{ asset('assets/dashboard') }}/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

    <!-- Google Maps Plugin -->
    <script src="{{ asset('assets/dashboard') }}/js/plugin/gmaps/gmaps.js"></script>

    <!-- Dropzone -->
    <script src="{{ asset('assets/dashboard') }}/js/plugin/dropzone/dropzone.min.js"></script>

    <!-- Fullcalendar -->
    <script src="{{ asset('assets/dashboard') }}/js/plugin/fullcalendar/fullcalendar.min.js"></script>

    <!-- DateTimePicker -->
    <script src="{{ asset('assets/dashboard') }}/js/plugin/datepicker/bootstrap-datetimepicker.min.js"></script>

    <!-- Bootstrap Tagsinput -->
    <script src="{{ asset('assets/dashboard') }}/js/plugin/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>

    <!-- Bootstrap Wizard -->
    <script src="{{ asset('assets/dashboard') }}/js/plugin/bootstrap-wizard/bootstrapwizard.js"></script>

    <!-- jQuery Validation -->
    <script src="{{ asset('assets/dashboard') }}/js/plugin/jquery.validate/jquery.validate.min.js"></script>

    <!-- Summernote -->
    <script src="{{ asset('assets/dashboard') }}/js/plugin/summernote/summernote-bs4.min.js"></script>

    <!-- Select2 -->
    <script src="{{ asset('assets/dashboard') }}/js/plugin/select2/select2.full.min.js"></script>

    <!-- Sweet Alert -->
    <script src="{{ asset('assets/dashboard') }}/js/plugin/sweetalert/sweetalert.min.js"></script>

    <!-- Owl Carousel -->
    <script src="{{ asset('assets/dashboard') }}/js/plugin/owl-carousel/owl.carousel.min.js"></script>

    <!-- Magnific Popup -->
    <script src="{{ asset('assets/dashboard') }}/js/plugin/jquery.magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Atlantis JS -->
    <script src="{{ asset('assets/dashboard') }}/js/atlantis.min.js"></script>

    {{-- Leaflet --}}
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
        integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
        crossorigin=""></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-ajax/2.1.0/leaflet.ajax.js"
        integrity="sha512-eYE5o0mD7FFys0tVot8r4AnRXzVVXhjVpzNK+AcHkg4zNLvUAaCOJyLFKjmfpJMj6L/tuCzMN7LULBvNDhy5pA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src='https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/Leaflet.fullscreen.min.js'></script>
    <script src="{{ asset('assets/dashboard') }}/js/jquery.mask.js"></script>

    <script>
        $('.select2').select2({
            placeholder: "- Pilih Salah Satu -",
            theme: "bootstrap",
        })

        function clearTextError() {
            $('.error-text').html('')
            $('.nama-dokumen').removeClass('is-invalid')
            $('.file-dokumen').removeClass('is-invalid')
            $('.nama-dokumen-old').removeClass('is-invalid')
            $('.file-dokumen-old').removeClass('is-invalid')
        }

        $(function() {
            moment.locale('id');
            $('.tanggal').mask('00-00-0000');
            $('.rupiah').mask('000.000.000.000.000', {
                reverse: true
            })
            $('.waktu').mask('00:00');
            $('.angka').mask('00000000000000000000');
        })

        var overlay = $('#overlay').hide();
        $(document)
            .ajaxStart(function() {
                overlay.show();
            })
            .ajaxStop(function() {
                overlay.hide();
            });

        $('.numerik').on('input', function(e) {
            var val = $(this).val();
            if (isNaN(val)) {
                val = val.replace(/[^0-9\.-]/g, '');
            }
            $(this).val(val);
        });

        $('.uang').mask('000.000.000.000.000.000.000', {
            reverse: true
        });

        function formatRupiah(angka) {
            var reverse = angka.toString().split('').reverse().join(''),
                ribuan = reverse.match(/\d{1,3}/g);
            ribuan = ribuan.join('.').split('').reverse().join('');
            return ribuan;
        }

        function validation(formData) {
            $('.error-text').html('');
            $('.req').removeClass('is-invalid');
            let count = 0
            $.each(formData, function(i, field) {
                let getAttr = document.getElementsByName(field.name);
                let getNodeName = getAttr[0].nodeName;
                let getType = getAttr[0].type;
                let attr = $(getNodeName + "[name=" + field.name + "]");
                if ((attr.val() == "")) {
                    if (attr.hasClass('req garis datar')) {
                        $('.' + field.name + '-error').html('<b>' + attr.data('label') +
                            '</b> tidak boleh kosong. Berikan garis datar (-) apabila ingin tetap mengosongkannya.'
                        );
                    } else if (attr.hasClass('req')) {
                        $('.' + field.name + '-error').html('<b>' + attr.data('label') +
                            '</b> tidak boleh kosong.'
                        );
                    }
                    count++;
                    // attr.addClass('is-invalid')
                }
            });
            if (count > 0) {
                swal({
                    title: "Gagal!",
                    text: "Terdapat " + count + " kolom yang tidak boleh kosong.",
                    icon: "error"
                }).then(function() {
                    $('.rupiah').mask('000.000.000.000.000', {
                        reverse: true
                    })
                });
                e.preventDefault()
            }
        }

        function sisaAnggaran(batasPenggunaanAnggaran) {
            if ($('#penggunaan-anggaran').val() > batasPenggunaanAnggaran) {
                $('.penggunaan_anggaran-error').html(
                    '<b>Penggunaan Anggaran</b> tidak boleh melebihi nilai maksimal yang telah ditentukan.'
                );
                swal({
                    title: "Gagal!",
                    text: "Terjadi kesalahan, mohon periksa kembali data yang diinputkan.",
                    icon: "error",
                    button: "Ok",
                }).then((value) => {
                    $('.rupiah').mask('000.000.000.000.000', {
                        reverse: true
                    })
                });
                e.preventDefault();
            }
        }
    </script>

    @stack('scripts')

</body>

</html>
