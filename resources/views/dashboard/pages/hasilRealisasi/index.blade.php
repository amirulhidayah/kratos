@extends('dashboard.layouts.main')

@section('title')
    Hasil Realisasi
@endsection

@section('titlePanelHeader')
    Hasil Realisasi
@endsection

@section('subTitlePanelHeader')
    <p style="font-size: 15px">Tahun : <span id="tahunLabel">
            @php
                if ($tahun != '' && $tahun != 'Semua') {
                    echo $tahun;
                } else {
                    echo 'Semua';
                }
            @endphp
        </span>
    </p>
@endsection

@section('buttonPanelHeader')
    <button class="btn btn-secondary btn-round" data-toggle="modal" data-target="#modal-filter"><i class="fas fa-filter"></i>
        Filter Tahun</button>
@endsection

@push('styles')
    <style>
        #peta {
            height: 600px;
            margin-top: 0px;
        }

        .dataTables_wrapper {
            padding-left: 0px !important;
            padding-right: 0px !important;
        }


        .select2-container {
            width: 100% !important;
        }
    </style>
@endpush

@section('contents')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Data Hasil Realisasi</div>
                    </div>
                </div>
                <div class="card-body pt-3">
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <ul class="nav nav-pills nav-secondary nav-pills-no-bd mb-3" id="pills-tab"
                                        role="tablist">
                                        <li class="nav-item submenu">
                                            <a class="nav-link active show" id="pills-tab-semua" data-toggle="pill"
                                                href="#pills-semua" role="tab" aria-controls="pills-peta"
                                                aria-selected="false">Semua</a>
                                        </li>
                                        <li class="nav-item submenu">
                                            <a class="nav-link" id="pills-tab-kecamatan" data-toggle="pill"
                                                href="#pills-kecamatan" role="tab" aria-controls="pills-kecamatan"
                                                aria-selected="false">Kecamatan</a>
                                        </li>
                                        <li class="nav-item submenu">
                                            <a class="nav-link" id="pills-tab-desa" data-toggle="pill" href="#pills-desa"
                                                role="tab" aria-controls="pills-desa" aria-selected="true">Desa</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg">
                                    <div class="tab-content mb-3" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="pills-semua" role="tabpanel"
                                            aria-labelledby="pills-home-tab-nobd">
                                            @component('dashboard.pages.hasilRealisasi.semua',
                                                [
                                                    'opd' => $opd,
                                                    'kecamatan' => $kecamatan,
                                                    'sub_indikator' => $sub_indikator,
                                                ])
                                            @endcomponent
                                        </div>
                                        <div class="tab-pane fade" id="pills-kecamatan" role="tabpanel"
                                            aria-labelledby="pills-home-tab-nobd">
                                            @component('dashboard.pages.hasilRealisasi.kecamatan',
                                                [
                                                    'opd' => $opd,
                                                    'sub_indikator' => $sub_indikator,
                                                ])
                                            @endcomponent
                                        </div>
                                        <div class="tab-pane fade" id="pills-desa" role="tabpanel"
                                            aria-labelledby="pills-profile-tab-nobd">
                                            @component('dashboard.pages.hasilRealisasi.desa',
                                                [
                                                    'opd' => $opd,
                                                    'kecamatan' => $kecamatan,
                                                    'sub_indikator' => $sub_indikator,
                                                ])
                                            @endcomponent
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

    {{-- Modal Filter Tahun --}}
    <form action="" method="GET">
        <div class="modal fade" id="modal-filter" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Filter Dashboard</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @component('dashboard.components.formElements.select',
                            [
                                'label' => 'Tahun',
                                'id' => 'tahun',
                                'name' => 'tahun',
                                'class' => 'select2',
                                'wajib' => '<sup class="text-danger">*</sup>',
                            ])
                            @slot('options')
                                <option value="Semua">Semua</option>
                                @foreach ($daftarTahun as $tahun)
                                    <option value="{{ $tahun }}" {{ ($_GET['tahun'] ?? '') == $tahun ? 'selected' : '' }}>
                                        {{ $tahun }}</option>
                                @endforeach
                            @endslot
                        @endcomponent
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-border" data-dismiss="modal">Keluar</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-filter"></i> Filter</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('scripts')
    <script>
        $('#nav-hasil-realisasi').addClass('active');
        var map = null;

        let tahun = $('#tahunLabel').text().trim()
        $('.tahun-filter-export').val(tahun)

        if (tahun != "Semua") {
            $('.title-card-tahun').text(' | Tahun: ' + tahun)
        }

        $('.select2').select2({
            placeholder: "Semua",
            theme: "bootstrap",
        })
    </script>
@endpush
