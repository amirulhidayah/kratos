<div class="modal" tabindex="-1" id="modal-lihat">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Anak</h5>
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
                    <p class=" mb-0">Tanggal Lahir : </p>
                    <p id="tanggal-lahir">
                        -
                    </p>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <p class=" mb-0">Berat Badan Lahir : </p>
                    <p id="bb_lahir">
                        -
                    </p>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <p class=" mb-0">Tinggi Badan Lahir : </p>
                    <p id="tb_lahir">
                        -
                    </p>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <p class=" mb-0">Nama Ibu : </p>
                    <p id="nama_ibu">
                        -
                    </p>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <p class=" mb-0">NIK Ibu : </p>
                    <p id="nik_ibu">
                        -
                    </p>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <p class=" mb-0">Nama Ayah : </p>
                    <p id="nama_ayah">
                        -
                    </p>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <p class=" mb-0">NIK Ayah : </p>
                    <p id="nik_ayah">
                        -
                    </p>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <p class=" mb-0">Kecamatan : </p>
                    <p id="kecamatan">
                        -
                    </p>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <p class=" mb-0">Desa : </p>
                    <p id="desa">
                        -
                    </p>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <p class=" mb-0">Alamat : </p>
                    <p id="alamat">
                        -
                    </p>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <p class=" mb-0">Tanggal Pengukuran : </p>
                    <p id="tanggal-pengukuran">
                        -
                    </p>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <p class=" mb-0">Usia Saat Ukur : </p>
                    <p id="usia-saat-ukur">
                        -
                    </p>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <p class=" mb-0">Berat Saat Ukur : </p>
                    <p id="berat_ukur">
                        -
                    </p>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <p class=" mb-0">Tinggi Saat Ukur : </p>
                    <p id="tinggi_ukur">
                        -
                    </p>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <p class=" mb-0">Lingkar Lengan Atas : </p>
                    <p id="lila">
                        -
                    </p>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <p class=" mb-0">Kategori BB/U : </p>
                    <p id="bbu">
                        -
                    </p>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <p class=" mb-0">Kategori TB/U : </p>
                    <p id="tbu">
                        -
                    </p>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <p class=" mb-0">Kategori BB/TB : </p>
                    <p id="bbtb">
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

@push('scripts')
    <script>
        $(document).on('click', '#btn-lihat', function() {
            let id = $(this).val();
            $.ajax({
                url: "{{ url('master-data/anak') }}" + '/' + id,
                type: 'GET',
                success: function(response) {
                    if (response.status == 'success') {
                        $('#nama').html(response.anak.nama);
                        $('#nik').html(response.anak.nik);
                        $('#jenis-kelamin').html(response.anak.jenis_kelamin);
                        $('#tanggal-lahir').html(response.tanggalLahir);
                        $('#bb_lahir').html(response.anak.bb_lahir ? response.anak.bb_lahir + " Kg" :
                            '-');
                        $('#tb_lahir').html(response.anak.tb_lahir ? response.anak.tb_lahir + " Cm" :
                            '-');
                        $('#nama_ibu').html(response.orangTua.nama_ibu) ?? '-';
                        $('#nik_ibu').html(response.orangTua.nik_ibu ?? '-');
                        $('#nama_ayah').html(response.orangTua.nama_ayah ?? '-');
                        $('#nik_ayah').html(response.orangTua.nik_ayah ?? '-');
                        $('#kecamatan').html(response.kecamatan);
                        $('#desa').html(response.desa);
                        $('#alamat').html(response.orangTua.alamat);
                        $('#tanggal-pengukuran').html(response.tanggalPengukuran);
                        if (response.pengukuranAnakTerakhir) {
                            $('#usia-saat-ukur').html(response.pengukuranAnakTerakhir.usia_saat_ukur);
                            $('#berat_ukur').html(response.pengukuranAnakTerakhir.berat + ' Kg');
                            $('#tinggi_ukur').html(response.pengukuranAnakTerakhir.tinggi + ' Cm');
                            $('#lila').html(response.pengukuranAnakTerakhir.lila);
                            $('#bbu').html(response.pengukuranAnakTerakhir.bb_u);
                            $('#tbu').html(response.pengukuranAnakTerakhir.tb_u);
                            $('#bbtb').html(response.pengukuranAnakTerakhir.bb_tb);
                        } else {
                            $('#usia-saat-ukur').html('-');
                            $('#berat_ukur').html('-');
                            $('#tinggi_ukur').html('-');
                            $('#lila').html('-');
                            $('#bbu').html('-');
                            $('#tbu').html('-');
                            $('#bbtb').html('-');
                        }

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
