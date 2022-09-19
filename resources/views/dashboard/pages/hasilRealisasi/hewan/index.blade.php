@extends('dashboard.layouts.main')

@section('title')
    Hasil Realisasi Pada Lokasi Hewan Ternak
@endsection

@section('titlePanelHeader')
    Hasil Realisasi Pada Lokasi Hewan Ternak
@endsection

@section('subTitlePanelHeader')
    {{-- Lorem ipsum dolor sit amet consectetur adipisicing elit. --}}
@endsection

@section('buttonPanelHeader')
@endsection

@section('contents')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Data Hasil Realisasi Pada Lokasi Hewan Ternak</div>
                        <div class="card-tools">
                            <form action="{{ url('export-hasil-realisasi-hewan') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-info btn-border btn-round btn-sm mr-2"
                                    id="export-penduduk" value="" name="desa_id">
                                    <i class="fas fa-lg fa-download"></i>
                                    Export Data Hasil Realisasi
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
                                    'label' => 'Tampilkan Data Berdasarkan Tahun',
                                    'id' => 'tahun-filter',
                                    'name' => 'tahun_filter',
                                    'class' => 'select2 filter',
                                ])
                                @slot('options')
                                    <option value="semua">Semua</option>
                                    @foreach ($filterTahun as $item)
                                        <option value="{{ $item['tahun'] }}">{{ $item['tahun'] }}</option>
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
                                    @foreach ($filterOpd as $item)
                                        <option value="{{ $item['id'] }}">{{ $item['opd'] }}</option>
                                    @endforeach
                                @endslot
                            @endcomponent
                        </div>
                        <div class="col-md-4">
                            @component('dashboard.components.formElements.select',
                                [
                                    'label' => 'Sub Indikator',
                                    'id' => 'indikator-filter',
                                    'name' => 'indikator_filter',
                                    'class' => 'select2 filter',
                                ])
                                @slot('options')
                                    <option value="semua">Semua</option>
                                    @foreach ($filterSubIndikator as $item)
                                        <option value="{{ $item['id'] }}">{{ $item['sub_indikator'] }}</option>
                                    @endforeach
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
                                            <th>Lokasi Hewan Ternak</th>
                                            <th>List Sub Indikator Intervensi</th>
                                            <th>List OPD</th>
                                            <th>Tanggal Intervensi</th>
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
        $('#nav-hasil-realisasi-hewan').addClass('active');

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
            ajax: {
                url: "{{ url('hasil-realisasi-hewan') }}",
                data: function(d) {
                    d.tahun_filter = $('#tahun-filter').val();
                    d.opd_filter = $('#opd-filter').val();
                    d.indikator_filter = $('#indikator-filter').val();
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
                        url: "{{ url('rencana-intervensi-hewan') }}" + '/' + id,
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
