@push('styles')
    <style>
        #peta {
            height: 450px;
            margin-top: 0px;
        }

        .dataTables_wrapper {
            padding-left: 0px !important;
            padding-right: 0px !important;
        }

        .select2-container {
            margin-bottom: 5px !important;
        }

        .select2-container {
            width: 100% !important;
        }
    </style>
@endpush


<div class="row">
    <div class="col-md-2">
        <div class="nav flex-column nav-pills nav-secondary nav-pills-no-bd nav-pills-icons" id="v-pills-tab-with-icon"
            role="tablist" aria-orientation="vertical">
            <a class="nav-link btn-tabs active" id="v-pills-indikator-tab-icons" data-toggle="pill"
                href="#v-pills-indikator-icons" role="tab" aria-controls="v-pills-indikator-icons"
                aria-selected="true">
                <i class="icon-docs"></i>
                Menentukan Sub Indikator
            </a>
            <a class="nav-link btn-tabs {{ $method == 'POST' ? 'disabled' : '' }}" id="v-pills-penduduk-tab-icons"
                data-toggle="pill" href="#v-pills-penduduk-icons" role="tab" aria-controls="v-pills-penduduk-icons"
                aria-selected="false">
                <i class="icon-people"></i>
                Menentukan Penduduk Yang Direalisasi
            </a>
        </div>
    </div>
    <div class="col-md-10">
        <div class="tab-content" id="v-pills-with-icon-tabContent">
            <div class="tab-pane fade show active py-2" id="v-pills-indikator-icons" role="tabpanel"
                aria-labelledby="v-pills-indikator-tab-icons">
                @component('dashboard.components.forms.realisasiSubIndikator',
                    [
                        'action' => $action,
                        'opd' => $opd,
                        'realisasiIntervensi' => $realisasiIntervensi ?? null,
                        'listPerencanaan' => $listPerencanaan,
                        'method' => $method,
                        'maxDokumen' => $method == 'PUT' ? $maxDokumen : null,
                        'submitLabel' => $method == 'POST' ? 'Simpan & Lanjut Pilih Penduduk' : 'Perbarui Data',
                        'submitIcon' => '<i class="fas fa-save"></i> ',
                    ])
                @endcomponent
            </div>
            <div class="tab-pane fade py-2 " id="v-pills-penduduk-icons" role="tabpanel"
                aria-labelledby="v-pills-penduduk-tab-icons">
                @component('dashboard.components.forms.realisasiPenentuanPenduduk',
                    [
                        'realisasiIntervensi' => $realisasiIntervensi ?? null,
                        'kecamatan' => $kecamatan,
                        'orangTua' => $orangTua,
                        'method' => $method,
                        'maxNomorPenduduk' => $method == 'PUT' ? $maxNomorPenduduk : null,
                        'urlKedua' => isset($urlKedua) ? $urlKedua : null,
                    ])
                @endcomponent
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script></script>
@endpush
