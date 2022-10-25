<div class="row my-2">
    <div class="col">
        <div class="card mb-0 border shadow-md">
            <div class="card-header">
                <div class="card-title">Data Penduduk Yang Telah
                    Diintervensi <div class="title-card-tahun d-inline fw-bold"></div>
                    <div class="card-tools float-right d-inline">
                        <form action="{{ url('realisasi-intervensi/export-hasil-realisasi-semua') }}" method="POST"
                            id="formExportHasilRealisasiSemua" autocomplete="off">
                            @csrf
                            <input type="hidden" name="tahun_filter" value="" class="tahun-filter-export">
                            <button type="submit" class="btn btn-secondary btn-border btn-round btn-sm mr-2"
                                value="" name="" id="btnExportSemua">
                                <i class="fas fa-lg fa-download"></i>
                                Export Data Hasil Realisasi
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body pt-2">
                <div class="row">
                    <div class="col-lg-12 col-md-12 mb-2">
                        @component('dashboard.components.formElements.select',
                            [
                                'label' => 'Sub Indikator',
                                'id' => 'sub-indikator-semua-filter',
                                'name' => 'sub_indikator_filter',
                                'class' => 'select2 filter filter-semua',
                            ])
                            @slot('options')
                                <option value="semua">Semua</option>
                                @foreach ($sub_indikator as $key => $val)
                                    <option value="{{ $key }}">{{ $val }}</option>
                                @endforeach
                            @endslot
                        @endcomponent
                    </div>
                    <div class="col-lg-3 col-md-6">
                        @component('dashboard.components.formElements.select',
                            [
                                'label' => 'Status',
                                'id' => 'sasaran-intervensi-semua-filter',
                                'name' => 'sasaran_intervensi_filter',
                                'class' => 'select2 filter filter-semua',
                            ])
                            @slot('options')
                                <option value="semua">Semua</option>
                                <option value="Orang Tua">Orang Tua</option>
                                <option value="Anak">Anak</option>
                            @endslot
                        @endcomponent
                    </div>
                    <div class="col-lg-3 col-md-6">
                        @component('dashboard.components.formElements.select',
                            [
                                'label' => 'OPD',
                                'id' => 'opd-semua-filter',
                                'name' => 'opd_filter',
                                'class' => 'select2 filter filter-semua',
                            ])
                            @slot('options')
                                <option value="semua">Semua</option>
                                @foreach ($opd as $key => $val)
                                    <option value="{{ $key }}">{{ $val }}</option>
                                @endforeach
                            @endslot
                        @endcomponent
                    </div>
                    <div class="col-lg-3 col-md-6">
                        @component('dashboard.components.formElements.select',
                            [
                                'label' => 'Kecamatan',
                                'id' => 'kecamatan-semua-filter',
                                'name' => 'kecamatan_filter',
                                'class' => 'select2 filter filter-semua',
                            ])
                            @slot('options')
                                <option value="semua">Semua</option>
                                @foreach ($kecamatan as $key => $val)
                                    <option value="{{ $key }}">{{ $val }}</option>
                                @endforeach
                            @endslot
                        @endcomponent
                    </div>
                    <div class="col-lg-3 col-md-6">
                        @component('dashboard.components.formElements.select',
                            [
                                'label' => 'Desa',
                                'id' => 'desa-semua-filter',
                                'name' => 'desa_filter',
                                'class' => 'select2 filter filter-semua',
                                'attribute' => 'disabled',
                            ])
                            @slot('options')
                            @endslot
                        @endcomponent
                    </div>
                    <div class="col mt-2">
                        <div class="table-responsive mt-2">
                            <table class="table table-hover table-striped table-bordered" id="{{ $id ?? 'dataTables' }}"
                                cellspacing="0" width="100%">
                                <thead>
                                    <tr class="text-center fw-bold">
                                        <th>No</th>
                                        <th>Status</th>
                                        <th>Nama</th>
                                        <th>List Sub Indikator</th>
                                        <th>List OPD</th>
                                        <th>Tanggal Intervensi</th>
                                        <th>Kecamatan</th>
                                        <th>Desa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $('#form').submit(function(e) {
            e.preventDefault();

        })

        $('#kecamatan-semua-filter').change(function() {
            $('#desa-semua-filter').removeAttr('disabled')
            $.get("{{ url('list/desa') }}", {
                kecamatan: $('#kecamatan-semua-filter').val(),
            }).done(function(response) {
                $('#desa-semua-filter').empty()
                $('#desa-semua-filter').append(
                    '<option value="semua" selected hidden>Semua</option>')
                for (let i = 0; i < response.data.length; i++) {
                    const id = response.data[i].id
                    const nama = response.data[i].nama
                    $('#desa-semua-filter').val('')
                    $('#desa-semua-filter').append($('<option>').val(id).text(nama))
                }
            });
        })

        var tableSemua = $('#dataTables').DataTable({
            processing: true,
            serverSide: true,
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            ajax: {
                url: "{{ url('tabel-hasil-realisasi') }}",
                data: function(d) {
                    d.tahun_filter = $('#tahunLabel').text();
                    d.status_filter = $('#sasaran-intervensi-semua-filter').val();
                    d.opd_filter = $('#opd-semua-filter').val();
                    d.kecamatan_filter = $('#kecamatan-semua-filter').val();
                    d.desa_filter = $('#desa-semua-filter').val();
                    d.sub_indikator_filter = $('#sub-indikator-semua-filter').val()
                    d.search_filter = $('input[type="search"]').val();
                }
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    className: 'text-center',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'status',
                    name: 'status',
                },
                {
                    data: 'nama',
                    name: 'nama',
                },
                {
                    data: 'list_indikator',
                    name: 'list_indikator',
                },
                {
                    data: 'list_opd',
                    name: 'list_opd',
                },
                {
                    data: 'tanggal_intervensi',
                    name: 'tanggal_intervensi',
                },
                {
                    data: 'nama_kecamatan',
                    name: 'nama_kecamatan',
                },
                {
                    data: 'nama_desa',
                    name: 'nama_desa',
                },
            ],
        });

        $('.filter-semua').change(function() {
            tableSemua.draw();
        })

        // $('.export-hasil-realisasi').click(function() {
        //     alert('test')
        // })
    </script>
@endpush
