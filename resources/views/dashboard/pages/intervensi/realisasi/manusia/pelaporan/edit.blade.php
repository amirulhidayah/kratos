@extends('dashboard.layouts.main')

@section('title')
    Ubah Laporan Realisasi Intervensi Manusia
@endsection

@section('titlePanelHeader')
    Ubah Laporan Realisasi Intervensi Manusia | <span style="text-decoration: underline">Laporan Tanggal:
        {{ Carbon\Carbon::parse($realisasiIntervensiManusia->created_at)->translatedFormat('j F Y') }}</span>
@endsection

@section('subTitlePanelHeader')
    {{ $rencanaIntervensiManusia->sub_indikator }}
@endsection

@section('buttonPanelHeader')
    <a href="{{ url()->previous() }}" class="btn btn-secondary btn-round"><i class="fas fa-arrow-left mr-1"></i>
        Kembali</a>
@endsection

@push('styles')
    <style>
        #tabelLokasiTerealisasi_wrapper .dataTables_filter {
            width: 100% !important;
            margin-bottom: 10px !important;
            text-align: center !important;
        }
    </style>
@endpush

@section('contents')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Form Laporan Realisasi Intervensi Manusia</div>
                    </div>
                </div>
                <div class="card-body pt-1">
                    @if ($realisasiIntervensiManusia->status == 2)
                        <div class="row">
                            <div class="col">
                                <div class="alert alert-danger mt-3 font-weight-bold" role="alert">Alasan Ditolak: <span
                                        class="text-danger">{{ $realisasiIntervensiManusia->alasan_ditolak }}</span></div>
                            </div>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col">
                            @component('dashboard.components.forms.realisasiManusia',
                                [
                                    'action' => route('realisasi-intervensi-manusia.update', $realisasiIntervensiManusia->id),
                                    'realisasiIntervensiManusia' => $realisasiIntervensiManusia,
                                    'rencanaIntervensiManusia' => $rencanaIntervensiManusia,
                                    'countSisaAnggaran' => $countSisaAnggaran,
                                    'desa' => $desa,
                                    'penduduk' => $pendudukPerencanaanManusia,
                                    'pendudukArr' => $pendudukPerencanaanManusiaArr,
                                    'maxDokumen' => $realisasiIntervensiManusia->dokumenRealisasiManusia()->count(),
                                    'method' => 'PUT',
                                    'submitLabel' => 'Perbarui Data',
                                    'submitIcon' => '<i class="fas fa-save"></i> ',
                                ])
                            @endcomponent
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Pendudduk Yang Belum Terealisasi</div>
                    </div>
                </div>
                <div class="card-body px-2">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped" id="tabelLokasiTerealisasi" cellspacing="0"
                            width="100%">
                            <thead>
                                <tr class="text-center fw-bold">
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NIK</th>
                                    <th>Desa</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataPendudukBelumRealisasi as $item)
                                    <tr>
                                        <td class="text-center">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>{{ $item->nama }}</td>
                                        <td class="text-center">{{ $item->nik }}</td>
                                        <td class="text-center">{{ $item->desa->nama }}</td>
                                        <td class="text-center"><button type="button"
                                                class="btn btn-primary btn-rounded btn-sm mr-1" id="btn-lihat"
                                                value="{{ $item->id }}"><i class="far fa-eye"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Penduduk --}}
    <div class="modal" tabindex="-1" id="modal-lihat">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Penduduk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="d-flex justify-content-between mt-2">
                        <p class=" mb-0">Nama : </p>
                        <p id="nama">
                            -
                        </p>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <p class=" mb-0">NIK : </p>
                        <p id="nik">
                            -
                        </p>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <p class=" mb-0">Jenis Kelamin : </p>
                        <p id="jenis-kelamin">
                            -
                        </p>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <p class=" mb-0">Tempat, Tanggal Lahir : </p>
                        <p id="ttl">
                            -
                        </p>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <p class=" mb-0">Agama : </p>
                        <p id="agama">
                            -
                        </p>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <p class=" mb-0">Pendidikan Terakhir : </p>
                        <p id="pendidikan">
                            -
                        </p>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <p class=" mb-0">Pekerjaan : </p>
                        <p id="pekerjaan">
                            -
                        </p>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <p class=" mb-0">Golongan Darah : </p>
                        <p id="golongan-darah">
                            -
                        </p>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <p class=" mb-0">Status Perkawinan : </p>
                        <p id="status-perkawinan">
                            -
                        </p>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <p class=" mb-0">Tanggal Perkawinan : </p>
                        <p id="tanggal-perkawinan">
                            -
                        </p>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <p class=" mb-0">Kewarganegaraan : </p>
                        <p id="kewarganegaraan">
                            -
                        </p>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <p class=" mb-0">Nomor Paspor : </p>
                        <p id="nomor-paspor">
                            -
                        </p>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <p class=" mb-0">Nomor Kitap : </p>
                        <p id="nomor-kitap">
                            -
                        </p>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <p class=" mb-0">Alamat : </p>
                        <p id="alamat">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, repellat!
                        </p>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <p class=" mb-0">Desa : </p>
                        <p id="desa">
                            -
                        </p>
                    </div>
                </div>
                <div class="modal-footer">
                    @component('dashboard.components.buttons.close')
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $('#nav-realisasi').addClass('active');
        $('#nav-realisasi .collapse').addClass('show');
        $('#nav-realisasi .collapse #li-manusia-2').addClass('active');

        var tableLokasiRealisasi = $('#tabelLokasiTerealisasi').DataTable({});

        $(document).on('click', '#btn-lihat', function() {
            let id = $(this).val();
            $.ajax({
                url: "{{ url('master-data/penduduk') }}" + '/' + id,
                type: 'GET',
                success: function(response) {
                    if (response.status == 'success') {
                        $('#nama').html(response.data.nama);
                        $('#nik').html(response.data.nik);
                        $('#jenis-kelamin').html(response.data.jenis_kelamin);
                        $('#ttl').html(response.data.ttl);
                        $('#agama').html(response.data.agama);
                        $('#pendidikan').html(response.data.pendidikan);
                        $('#pekerjaan').html(response.data.pekerjaan);
                        $('#golongan-darah').html(response.data.golongan_darah);
                        $('#status-perkawinan').html(response.data.status_perkawinan);
                        $('#tanggal-perkawinan').html(response.data.tanggal_perkawinan);
                        $('#kewarganegaraan').html(response.data.kewarganegaraan);
                        $('#nomor-paspor').html(response.data.no_paspor);
                        $('#nomor-kitap').html(response.data.no_kitap);
                        $('#alamat').html(response.data.alamat);
                        $('#desa').html(response.data.desa);
                        $('#modal-lihat').modal('show');
                    }
                },
                error: function(response) {
                    swal("Gagal", "Data Gagal Diambil, Silahkan Coba Kembali", {
                        icon: "error",
                        buttons: false,
                        timer: 1000,
                    });
                }
            })
        })
    </script>
@endpush
