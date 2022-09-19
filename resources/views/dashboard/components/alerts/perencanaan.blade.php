<div
    class="col-12 {{ $totalMenungguKonfirmasiPerencanaan == 0 && $totalAlasanTidakTerselesaikan == 0 ? 'd-none' : '' }}">
    <div class="card">
        <div class="card-header">
            <div class="card-head-row">
                <div class="card-title fw-bold text-primary"><i class="icon-bell"></i> Pemberitahuan</div>
            </div>
        </div>
        <div class="card-body">
            @if ($totalAlasanTidakTerselesaikan > 0)
                <div class="alert alert-secondary d-flex justify-content-between mt-2" role="alert">
                    <span>
                        Terdapat <b>{{ $totalAlasanTidakTerselesaikan }}</b>
                        {!! Auth::user()->role == 'OPD'
                            ? ' data perencanaan yang belum diselesaikan pada tahun sebelumnya dan belum ditambahkan alasan mengapa tidak di selesaikan. Silahkan klik tombol <button class="btn btn-sm btn-danger btn-rounded shadow mt-1 font-weight-bold" style="cursor: not-allowed;"><i class="fas fa-plus"></i> Tambahkan Alasan</button> pada perencanaan tersebut untuk mengirimkan alasannya.'
                            : ' data perencanaan yang memberikan informasi mengenai alasan mengapa tidak menyelesaikan perencanaan tersebut pada tahun sebelumnya. Silahkan klik tombol <button class="btn btn-sm btn-danger btn-rounded shadow mt-1 font-weight-bold" style="cursor: not-allowed;"><i class="fas fa-eye"></i> Lihat Alasan (Belum Dibaca)</button> pada kolom "Status" perencanaan tersebut.' !!}
                    </span>
                </div>
            @endif
            @if ($totalMenungguKonfirmasiPerencanaan > 0)
                <div class="alert alert-{{ Auth::user()->role == 'OPD' ? 'danger' : 'warning' }} d-flex justify-content-between mb-0"
                    role="alert">
                    <span>
                        Terdapat <b>{{ $totalMenungguKonfirmasiPerencanaan }}</b> data perencanaan yang
                        {!! Auth::user()->role == 'OPD'
                            ? 'berstatus "Ditolak"'
                            : 'berstatus "Menunggu Konfimasi". Silahkan klik tombol <button class="btn btn-rounded btn-secondary btn-sm text-white shadow btn-lihat my-1" data-toggle="tooltip" data-placement="top" title="Konfirmasi" style="cursor: not-allowed;"><i class="fas fa-lg fa-clipboard-check"></i></button> dikolom Aksi pada data perencanaan yang berstatus "Menunggu Konfimasi".' !!}
                        {!! Auth::user()->role == 'OPD'
                            ? 'Silahkan ubah data tersebut dengan klik tombol <button id="btn-edit" class="btn btn-rounded btn-warning btn-sm my-1 text-white shadow" data-toggle="tooltip" data-placement="top" title="Ubah" style="cursor: not-allowed;"><i class="fas fa-edit" ></i></button> dikolom Aksi pada data perencanaan yang ditolak dan kemudian perbarui datanya.'
                            : '' !!}
                    </span>
                </div>
            @endif
        </div>
    </div>
</div>
