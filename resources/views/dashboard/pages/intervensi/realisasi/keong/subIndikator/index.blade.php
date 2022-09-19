@extends('dashboard.layouts.main')

@section('title')
    Realisasi Intervensi Habitat Keong
@endsection

@section('titlePanelHeader')
    Realisasi Intervensi Habitat Keong
@endsection

@section('subTitlePanelHeader')
    {{-- Lorem ipsum dolor sit amet consectetur adipisicing elit. --}}
@endsection

@section('buttonPanelHeader')
@endsection

@section('contents')
    <div class="row">
        @component('dashboard.components.alerts.realisasi',
            [
                'totalMenungguKonfirmasiRealisasi' => $totalMenungguKonfirmasiRealisasi,
            ])
        @endcomponent
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Data Realisasi Intervensi Habitat Keong</div>
                        <div class="card-tools">
                            <form action="{{ url('export-realisasi-keong') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-info btn-border btn-round btn-sm mr-2"
                                    id="export-penduduk" value="" name="desa_id">
                                    <i class="fas fa-lg fa-download"></i>
                                    Export Data Realisasi
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-3">
                    <div class="row mb-4">
                        <div class="col-md-4">
                            @component('dashboard.components.formElements.select',
                                [
                                    'label' => 'Tahun',
                                    'id' => 'tahun-filter',
                                    'name' => 'tahun_filter',
                                    'class' => 'select2 filter',
                                ])
                                @slot('options')
                                    <option value="semua">Semua</option>
                                    @foreach ($tahun as $item)
                                        <option value="{{ $item }}">{{ $item }}</option>
                                    @endforeach
                                @endslot
                            @endcomponent
                        </div>
                        <div class="col-md-4">
                            @component('dashboard.components.formElements.select',
                                [
                                    'label' => 'OPD',
                                    'id' => 'opd-filter',
                                    'name' => 'opd_filter',
                                    'class' => 'select2 filter',
                                ])
                                @slot('options')
                                    <option value="semua">Semua</option>
                                    @foreach ($realisasiKeong as $item)
                                        <option value="{{ $item->opd_id }}">{{ $item->opd->nama }}</option>
                                    @endforeach
                                @endslot
                            @endcomponent
                        </div>
                        <div class="col-md-4">
                            @component('dashboard.components.formElements.select',
                                [
                                    'label' => 'Status',
                                    'id' => 'status-filter',
                                    'name' => 'status_filter',
                                    'class' => 'select2 filter',
                                ])
                                @slot('options')
                                    <option value="semua">Semua</option>
                                    <option value="selesai">Selesai Terealisasi</option>
                                    <option value="belum_selesai">Belum Selesai Terealisasi</option>
                                    <option value="belum_ada_laporan">Belum Ada Laporan Sama Sekali</option>
                                    <option value="-">Menunggu Konfirmasi</option>
                                    <option value="2">Ditolak</option>
                                @endslot
                            @endcomponent
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped" id="{{ $id ?? 'dataTables' }}"
                                    cellspacing="0" width="100%">
                                    <thead>
                                        <tr class="text-center fw-bold">
                                            <th>No</th>
                                            <th>Tanggal Pembuatan Perencanaan</th>
                                            <th>Sub Indikator</th>
                                            <th>OPD</th>
                                            <th>Nilai Anggaran</th>
                                            <th>Penggunaan Anggaran</th>
                                            <th>Sisa Anggaran</th>
                                            <th>Progress</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
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
@endsection

@push('scripts')
    <script>
        $('#nav-realisasi').addClass('active');
        $('#nav-realisasi .collapse').addClass('show');
        $('#nav-realisasi .collapse #li-keong-2').addClass('active');

        $('.select2').select2({
            placeholder: "Semua",
            theme: "bootstrap",
        })

        var table = $('#dataTables').DataTable({
            processing: true,
            serverSide: true,
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            dom: 'lBfrtip',
            buttons: [{
                extend: 'colvis',
                className: 'btn btn-sm btn-info px-2 btn-export-table d-inline ml-3 font-weight',
                text: '<i class="fas fa-eye-slash"></i> Show/Hide Column',
            }],

            ajax: {
                url: "{{ route('realisasi-intervensi-keong.index') }}",
                data: function(d) {
                    d.tahun_filter = $('#tahun-filter').val();
                    d.opd_filter = $('#opd-filter').val();
                    d.status_filter = $('#status-filter').val();
                    d.search_filter = $('input[type="search"]').val();
                },
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    className: 'text-center',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'created_at',
                    name: 'created_at',
                    render: function(data) {
                        return moment(data).format('LL');
                    },
                    visible: false,
                    className: 'text-center',
                },
                {
                    data: 'sub_indikator',
                    name: 'sub_indikator',
                },
                {
                    data: 'opd',
                    name: 'opd',
                    className: 'text-center'
                },
                {
                    data: 'nilai_pembiayaan',
                    name: 'nilai_pembiayaan',
                    className: 'text-right',
                    render: $.fn.dataTable.render.number('.', ',', 0, 'Rp.'),
                },
                {
                    data: 'penggunaan_anggaran',
                    name: 'penggunaan_anggaran',
                    className: 'text-right',
                    render: $.fn.dataTable.render.number('.', ',', 0, 'Rp.'),
                    visible: false,
                },
                {
                    data: 'sisa_anggaran',
                    name: 'sisa_anggaran',
                    className: 'text-right',
                    render: $.fn.dataTable.render.number('.', ',', 0, 'Rp.'),
                    visible: false,
                },
                {
                    data: 'progress',
                    name: 'progress',
                    className: 'text-center',
                },
                {
                    data: 'status',
                    name: 'status',
                    className: 'text-center',
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    className: 'text-center'
                },
            ],
        });

        $('.filter').change(function() {
            table.draw();
        })

        $(document).on('click', '.btn-delete', function() {
            let id = $(this).val();
            var _token = "{{ csrf_token() }}";
            swal({
                title: 'Apakah Anda yakin?',
                text: "Data yang dipilih akan dihapus!",
                icon: "warning",
                dangerMode: true,
                buttons: ["Batal", "Ya"],
            }).then((result) => {
                if (result) {
                    $.ajax({
                        type: 'DELETE',
                        url: "{{ url('rencana-intervensi-keong') }}" + '/' + id,
                        data: {
                            _token: _token
                        },
                        success: function(data) {
                            swal({
                                title: "Berhasil!",
                                text: "Data yang dipilih berhasil dihapus.",
                                icon: "success",
                            }).then(function() {
                                table.ajax.reload();
                                $('#checkAllData').prop('checked', false);
                            });
                        }
                    })
                } else {
                    swal("Data batal dihapus.", {
                        icon: "error",
                    });
                }
            })
        })
    </script>
@endpush
