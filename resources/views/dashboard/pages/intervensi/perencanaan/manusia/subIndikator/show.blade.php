@extends('dashboard.layouts.main')

@section('title')
    Perencanaan Intervensi Manusia
@endsection

@section('titlePanelHeader')
    Detail Perencanaan Intervensi Manusia
@endsection

@section('subTitlePanelHeader')
    {{ $rencana_intervensi_manusia->sub_indikator }}
@endsection

@section('buttonPanelHeader')
    <a href="{{ url()->previous() }}" class="btn btn-secondary btn-round"><i class="fas fa-arrow-left mr-1"></i>
        Kembali</a>
@endsection

@push('styles')
    <style>
        #peta {
            height: 600px;
            margin-top: 0px;
        }
    </style>
@endpush

@section('contents')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Info Detail</div>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-bordered">
                        <li class="list-group-item d-flex justify-content-between align-items-center">Tanggal Pengajuan:
                            <span
                                class="font-weight-bold">{{ Carbon\Carbon::parse($rencana_intervensi_manusia->created_at)->translatedFormat('j F Y') }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Sub Indikator:<span
                                class="font-weight-bold">{{ $rencana_intervensi_manusia->sub_indikator }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">OPD:<span
                                class="font-weight-bold">{{ $rencana_intervensi_manusia->opd->nama }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Jumlah Penduduk:<span
                                class="font-weight-bold">
                                {{ $rencana_intervensi_manusia->pendudukPerencanaanManusia->count() }}
                            </span>
                        </li>
                        @if ($rencana_intervensi_manusia->opdTerkaitManusia->count() > 0)
                            <li class="list-group-item d-flex justify-content-between align-items-center">OPD Terkait
                                ({{ $rencana_intervensi_manusia->opdTerkaitManusia->count() }}):<span
                                    class="font-weight-bold">
                                    <ul>
                                        @foreach ($rencana_intervensi_manusia->opdTerkaitManusia as $item)
                                            <li class="d-flex justify-content-end align-items-end">
                                                {{ $item->opd->nama . ' ' }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </span>
                            </li>
                        @endif
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $rencana_intervensi_manusia->status == 1 ? 'Nilai Anggaran:' : 'Rencana Anggaran:' }}<span
                                class="font-weight-bold"><span>Rp. </span>
                                <span class="rupiah">{{ $rencana_intervensi_manusia->nilai_pembiayaan }}</span></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Sumber Dana:<span
                                class="font-weight-bold">{{ $rencana_intervensi_manusia->sumber_dana }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Status:
                            @if ($rencana_intervensi_manusia->status == 1)
                                <span class="font-weight-bold badge badge-success">Disetujui</span>
                            @elseif($rencana_intervensi_manusia->status == 2)
                                <span class="font-weight-bold badge badge-danger">Ditolak</span>
                            @else
                                <span class="font-weight-bold badge badge-warning">Menunggu Konfirmasi</span>
                            @endif
                        </li>
                        @if ($rencana_intervensi_manusia->status == 2)
                            <li class="list-group-item d-flex justify-content-between align-items-center">Alasan Ditolak:
                                <span
                                    class="font-weight-bold text-danger">{{ $rencana_intervensi_manusia->alasan_ditolak }}</span>
                            </li>
                        @endif
                        @if ($rencana_intervensi_manusia->status != 0)
                            <li class="list-group-item d-flex justify-content-between align-items-center">Tanggal
                                Konfirmasi:<span
                                    class="font-weight-bold">{{ Carbon\Carbon::parse($rencana_intervensi_manusia->tanggal_konfirmasi)->translatedFormat('j F Y') }}</span>
                            </li>
                        @endif

                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">List Dokumen Perencanaan</div>

                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-bordered">
                        @forelse ($rencana_intervensi_manusia->dokumenPerencanaanManusia as $item)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $item->nama }}
                                <a href="{{ Storage::url('uploads/dokumen/perencanaan/manusia/' . $item->file) }}"
                                    target="_blank" class="badge badge-primary" data-toggle="tooltip" data-placement="top"
                                    title="Download">
                                    <i class="fas fa-download"></i>

                                </a>
                            </li>
                        @empty
                            <h5 class="text-center">Tidak Ada Dokumen</h5>
                        @endforelse

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Data Penduduk Perencanaan Intervensi Manusia</div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive mt-2">
                        <table class="table table-hover table-striped table-bordered" id="{{ $id ?? 'dataTables' }}"
                            cellspacing="0" width="100%">
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
                                @foreach ($rencana_intervensi_manusia->pendudukPerencanaanManusia as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $item->penduduk->nama }}</td>
                                        <td class="text-center">{{ $item->penduduk->nik }}</td>
                                        <td class="text-center">{{ $item->penduduk->desa->nama }}</td>
                                        <td class="text-center"><button type="button"
                                                class="btn btn-primary btn-rounded btn-sm mr-1" id="btn-lihat"
                                                value="{{ $item->penduduk->id }}"><i class="far fa-eye"></i></button></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @if ($rencana_intervensi_manusia->status == 0 && Auth::user()->role == 'Admin')
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-title">Konfirmasi Perencanaan</div>

                        </div>
                    </div>
                    <div class="card-body pt-0">
                        @component('dashboard.components.forms.confirm',
                            [
                                'action' => url('rencana-intervensi-manusia/konfirmasi/' . $rencana_intervensi_manusia->id),
                            ])
                        @endcomponent
                    </div>
                </div>
            </div>
        @endif
    </div>

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
        $('#nav-perencanaan').addClass('active');
        $('#nav-perencanaan .collapse').addClass('show');
        $('#nav-perencanaan .collapse #li-manusia').addClass('active');

        $(document).ready(function() {})

        var table = $('#dataTables').DataTable({
            processing: true,
        })

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
