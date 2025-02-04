<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/landingPage') }}/img/lambang-sigi.png" type="image/x-icon" />

    <!-- Map CSS -->
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.css" />

    <!-- Libs CSS -->
    <link rel="stylesheet" href="{{ asset('assets/landingPage') }}/css/libs.bundle.css" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('assets/landingPage') }}/css/theme.bundle.css" />

    <!-- Title -->
    <title>SMAS - Stunting</title>
</head>

<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <!-- Brand -->
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('assets/landingPage') }}/img/logo-sigi.png" class="navbar-brand-img" alt="...">
            </a>

            <!-- Toggler -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="navbarCollapse">

                <!-- Toggler -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fe fe-x"></i>
                </button>
                <!-- Button -->
                @auth
                    <a href="{{ url('dashboard') }}" class="navbar-btn btn btn-sm btn-primary lift ms-auto">
                        <span class="fe fe-monitor d-none d-md-inline p-0 m-0"></span> Beranda
                    </a>
                @else
                    <a href="{{ url('login') }}" class="navbar-btn btn btn-sm btn-primary lift ms-auto">
                        <span class="fe fe-log-in d-none d-md-inline p-0 m-0"></span> Masuk
                    </a>
                @endauth
            </div>

        </div>
    </nav>

    <!-- WELCOME -->
    <section class="pt-4 pt-md-11">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md-5 col-lg-6 order-md-2">

                    <!-- Image -->
                    <img src="{{ asset('assets/landingPage') }}/img/landing-hero2.png"
                        class="img-fluid mw-md-150 mw-lg-130 mb-6 mb-md-0" alt="..." data-aos="fade-up"
                        data-aos-delay="100">

                </div>
                <div class="col-12 col-md-7 col-lg-6 order-md-1" data-aos="fade-up">

                    <!-- Heading -->
                    <h1 class="display-3 text-center text-md-start mb-2">
                        Selamat Datang di Aplikasi <br> <span class="text-primary fw-bold mt-1">SMAS - Stunting</span>
                    </h1>
                    <span class="text-primary mb-5" style="font-size: 22px">(Smart Monitoring Intervensi
                        Stunting)</span>

                    <div class="text-center text-md-start mt-4">
                        @auth
                            <a href="{{ url('dashboard') }}" class="btn btn-primary shadow lift me-1">
                                <span class="fe fe-monitor d-none d-md-inline p-0 m-0"></span> Beranda
                            </a>
                        @else
                            <a href="{{ url('login') }}" class="btn btn-primary shadow lift me-1">
                                <span class="fe fe-log-in d-none d-md-inline p-0 m-0"></span> Masuk
                            </a>
                        @endauth
                        <a href="https://www.sigikab.go.id/" target="_blank" class="btn btn-primary-soft lift">
                            Website Pemerintah Kab. Sigi <i class="fe fe-globe d-none d-md-inline ms-1"></i>
                        </a>
                    </div>

                </div>
            </div> <!-- / .row -->
        </div> <!-- / .container -->
    </section>

    <!-- HUB -->
    <section class="py-8 pt-md-11 pb-md-9">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 text-center" data-aos="fade-up" data-aos-delay="50">

                    <!-- Icon -->
                    <div class="icon text-primary mb-3">
                        <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <g fill="none" fill-rule="evenodd">
                                <path d="M0 0h24v24H0z"></path>
                                <path d="M18 2h2a3 3 0 013 3v14a3 3 0 01-3 3h-2V2z" fill="#335EEA" opacity=".3">
                                </path>
                                <path
                                    d="M5 2h12a3 3 0 013 3v14a3 3 0 01-3 3H5a1 1 0 01-1-1V3a1 1 0 011-1zm7 9a2 2 0 100-4 2 2 0 000 4zm-5 5.5c-.011.162.265.5.404.5h9.177c.418 0 .424-.378.418-.5-.163-3.067-2.348-4.5-5.008-4.5-2.623 0-4.775 1.517-4.99 4.5z"
                                    fill="#335EEA"></path>
                            </g>
                        </svg>
                    </div>

                    <!-- Heading -->
                    <h3 class="mb-3">
                        Kontak
                    </h3>

                    <!-- Text -->
                    <p class="text-muted mb-0 mb-md-0">
                    <ul class="list-unstyled text-muted mb-6 mb-md-8 mb-lg-0">
                        <li class="mb-1">
                            <span class="fe fe-phone"></span> (0451) 8202666
                        </li>
                    </ul>
                    </p>

                </div>
                <div class="col-12 col-md-6 text-center" data-aos="fade-up" data-aos-delay="100">

                    <!-- Icon -->
                    <div class="icon text-primary mb-3">
                        <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <g fill="none" fill-rule="evenodd">
                                <path d="M0 0h24v24H0z"></path>
                                <path
                                    d="M12 21a9 9 0 110-18 9 9 0 010 18zm2.165-13.645l-4.554 3.007a.5.5 0 00-.224.388l-.327 5.448a.5.5 0 00.775.447l4.554-3.007a.5.5 0 00.224-.388l.327-5.448a.5.5 0 00-.775-.447z"
                                    fill="#335EEA"></path>
                            </g>
                        </svg>
                    </div>

                    <!-- Heading -->
                    <h3>
                        Alamat
                    </h3>

                    <!-- Text -->
                    <p class="text-muted mb-0">
                        <i class="fe fe-map-pin"></i> Jalan Trans Palu-Palolo, Bora, Sigi Biromaru, Kabupaten Sigi,
                        Sulawesi Tengah 94364, Indonesia
                    </p>

                </div>
            </div> <!-- / .row -->
        </div> <!-- / .container -->
    </section>

    <!-- FOOTER -->
    <footer class="py-2 bg-dark">
        <div class="container">
            <div class="row">
                <div class="col">
                    {{-- copyright --}}
                    <p class="text-center text-muted small mb-0">
                        &copy; @php
                            echo date('Y');
                        @endphp <a href="https://www.sigikab.go.id/" target="_blank"
                            class="text-muted">Pemerintah Kabupaten Sigi</a>
                        {{-- | Designed by vectorpocket
                        and
                        vectorjuice on <a href="https://www.freepik.com/" class="text-muted"
                            terget="_blank">Freepik --}}
                        </a>
                        {{-- <h6 class="text-white">Copy</h6> --}}
                </div>
            </div> <!-- / .row -->
        </div> <!-- / .container -->
    </footer>

    <!-- JAVASCRIPT -->
    <!-- Map JS -->
    <script src='https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.js'></script>

    <!-- Vendor JS -->
    <script src="{{ asset('assets/landingPage') }}/js/vendor.bundle.js"></script>

    <!-- Theme JS -->
    <script src="{{ asset('assets/landingPage') }}/js/theme.bundle.js"></script>

</body>

</html>
