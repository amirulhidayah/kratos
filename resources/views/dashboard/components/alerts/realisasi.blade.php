<div class="col-12 {{ $totalMenungguKonfirmasiRealisasi == 0 ? 'd-none' : '' }}">
    <div class="card">
        <div class="card-header">
            <div class="card-head-row">
                <div class="card-title fw-bold text-primary"><i class="icon-bell"></i> Pemberitahuan</div>
            </div>
        </div>
        <div class="card-body">
            <div class="alert alert-{{ Auth::user()->role == 'OPD' ? 'danger' : 'warning' }} d-flex justify-content-between mb-0"
                role="alert">
                <span>
                    Terdapat <b>{{ $totalMenungguKonfirmasiRealisasi }}</b> data laporan realisasi yang
                    {!! Auth::user()->role == 'OPD'
                        ? 'berstatus "Ditolak".'
                        : 'berstatus "Menunggu Konfirmasi". Silahkan klik tombol <button id="btn-show" class="btn btn-rounded btn-primary btn-sm text-white shadow btn-lihat my-1" data-toggle="tooltip" data-placement="top" title="Lihat" style="cursor: not-allowed;"><i class="fas fa-eye"></i></button> pada kolom Aksi yang terdapat status "Menunggu Konfirmasi", kemudian klik <button class="btn btn-rounded btn-secondary btn-sm text-white shadow btn-lihat my-1" data-toggle="tooltip" data-placement="top" title="Konfirmasi" style="cursor: not-allowed;"><i class="fas fa-lg fa-clipboard-check"></i></button> pada laporan realisasi yang berstatus "Menunggu Konfimasi".' !!}
                    {!! Auth::user()->role == 'OPD'
                        ? 'Silahkan ubah data tersebut dengan klik tombol <button id="btn-show" class="btn btn-rounded btn-primary btn-sm text-white shadow btn-lihat my-1" data-toggle="tooltip" data-placement="top" title="Lihat" style="cursor: not-allowed;"><i class="fas fa-eye"></i></button> pada kolom Aksi yang terdapat status "Laporan Ditolak", kemudian klik <button class="btn btn-rounded btn-warning btn-sm my-1 text-white shadow" data-toggle="tooltip" data-placement="top" title="Ubah" style="cursor: not-allowed;"><i class="fas fa-edit"></i></button> pada laporan realisasi yang berstatus "Ditolak".'
                        : '' !!}
                </span>
            </div>
        </div>
    </div>
</div>
