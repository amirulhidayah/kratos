@extends('dashboard.layouts.main')

@section('title')
    Jenjang Sekolah
@endsection

@section('titlePanelHeader')
    Jenjang Sekolah
@endsection

@section('subTitlePanelHeader')
    {{-- Lorem ipsum dolor sit amet consectetur adipisicing elit. --}}
@endsection

@section('buttonPanelHeader')
    {{-- <a href="#" class="btn btn-secondary btn-round"><i class="fas fa-plus"></i>
        Tambah</a> --}}
@endsection

@push('styles')
@endpush

@section('contents')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Data Jenjang Sekolah</div>
                        <div class="card-tools">
                            <form action="{{ url('master-data/jenjang-sekolah/export') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-info btn-border btn-round btn-sm mr-2">
                                    <i class="fas fa-lg fa-download"></i>
                                    Export Jumlah Data
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <ul class="nav nav-pills nav-secondary nav-pills-no-bd mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-profile-tab-nobd" data-toggle="pill"
                                        href="#pills-tabel" role="tab" aria-controls="pills-tabel"
                                        aria-selected="false">Tabel</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-jumlah-tab-nobd" data-toggle="pill" href="#pills-jumlah"
                                        role="tab" aria-controls="pills-jumlah" aria-selected="false">Jumlah
                                        Data</a>
                                </li>
                            </ul>
                            <div class="tab-content mb-3" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-tabel" role="tabpanel"
                                    aria-labelledby="pills-profile-tab-nobd">
                                    <div class="row mt-5">
                                        <div class="col">
                                            <div class="card fieldset">
                                                <table class="table table-hover ">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">No</th>
                                                            <th scope="col">Jenjang</th>
                                                            <th scope="col">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>SD</td>
                                                            <td>
                                                                <a href="{{ url('master-data/sekolah/sd') }}"
                                                                    class="btn btn-success btn-rounded btn-sm"><i
                                                                        class="far fa-eye"></i> </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>SMP</td>
                                                            <td>
                                                                <a href="{{ url('master-data/sekolah/smp') }}"
                                                                    class="btn btn-success btn-rounded btn-sm"><i
                                                                        class="far fa-eye"></i> </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>3</td>
                                                            <td>SMA</td>
                                                            <td>
                                                                <a href="{{ url('master-data/sekolah/sma-smk') }}"
                                                                    class="btn btn-success btn-rounded btn-sm"><i
                                                                        class="far fa-eye"></i> </a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-jumlah" role="tabpanel"
                                    aria-labelledby="pills-jumlah-tab-nobd">
                                    <div class="my-2">
                                        <div class="owl-carousel owl-theme owl-img-responsive">
                                            @foreach ($jumlahData as $jumlah)
                                                <div class="col-sm-12 col-md-12 item">
                                                    <div class="card card-stats card-round border">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <div class="row">
                                                                        <div class="col-2">
                                                                            <div class="icon-big text-center">
                                                                                <i class="flaticon-agenda text-primary"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-10 col-stats">
                                                                            <div class="numbers">
                                                                                <p class="card-category">Jenjang</p>
                                                                                <h4 class="card-title">
                                                                                    {{ $jumlah['jenjang'] }}
                                                                                </h4>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="d-flex justify-content-center mt-2">
                                                                        <p class="fw-bold mb-0">Jumlah Data</p>
                                                                    </div>
                                                                    <div class="d-flex justify-content-between mt-2">
                                                                        <p class=" mb-0">Jumlah Sekolah : </p>
                                                                        <p
                                                                            class="badge bg-primary text-light border-0 mb-0">
                                                                            {{ $jumlah['jumlah_sekolah'] }}
                                                                        </p>
                                                                    </div>
                                                                    <div class="d-flex justify-content-between mt-2">
                                                                        <p class=" mb-0">Jumlah Siswa : </p>
                                                                        <p
                                                                            class="badge bg-primary text-light border-0 mb-0">
                                                                            {{ $jumlah['total_siswa'] }}
                                                                        </p>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="d-flex justify-content-center mt-2">
                                                                        <p class="fw-bold mb-0">Jumlah Siswa Berdasarkan
                                                                            Jenis
                                                                            Kelamin</p>
                                                                    </div>
                                                                    <div class="d-flex justify-content-between mt-2">
                                                                        <p class=" mb-0">Laki - Laki : </p>
                                                                        <p
                                                                            class="badge bg-primary text-light border-0 mb-0">
                                                                            {{ $jumlah['siswa_laki'] }}
                                                                        </p>
                                                                    </div>
                                                                    <div class="d-flex justify-content-between mt-2">
                                                                        <p class=" mb-0">Perempuan : </p>
                                                                        <p
                                                                            class="badge bg-primary text-light border-0 mb-0">
                                                                            {{ $jumlah['siswa_perempuan'] }}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="d-flex justify-content-center mt-2">
                                                                        <p class="fw-bold mb-0">Jumlah Data Per Desa
                                                                        </p>
                                                                    </div>
                                                                    @foreach ($jumlah['desa'] as $desa)
                                                                        <div class="d-flex justify-content-center mt-2">
                                                                            <p class="fw-bold mb-0">Desa
                                                                                {{ $desa['desa'] }}
                                                                            </p>
                                                                        </div>
                                                                        <div class="d-flex justify-content-between mt-2">
                                                                            <p class=" mb-0">Jumlah Sekolah : </p>
                                                                            <p
                                                                                class="badge bg-primary text-light border-0 mb-0">
                                                                                {{ $desa['jumlah_sekolah'] }}
                                                                            </p>
                                                                        </div>
                                                                        <div class="d-flex justify-content-between mt-2">
                                                                            <p class=" mb-0">Jumlah Siswa : </p>
                                                                            <p
                                                                                class="badge bg-primary text-light border-0 mb-0">
                                                                                {{ $desa['total_siswa'] }}
                                                                            </p>
                                                                        </div>
                                                                        <div class="d-flex justify-content-between mt-2">
                                                                            <p class=" mb-0">Laki - Laki : </p>
                                                                            <p
                                                                                class="badge bg-primary text-light border-0 mb-0">
                                                                                {{ $desa['siswa_laki'] }}
                                                                            </p>
                                                                        </div>
                                                                        <div class="d-flex justify-content-between mt-2">
                                                                            <p class=" mb-0">Perempuan : </p>
                                                                            <p
                                                                                class="badge bg-primary text-light border-0 mb-0">
                                                                                {{ $desa['siswa_perempuan'] }}
                                                                            </p>
                                                                        </div>
                                                                        <hr>
                                                                    @endforeach
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        })
    </script>

    <script>
        $('#nav-master-sekolah').addClass('active');
    </script>
@endpush
