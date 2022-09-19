<div class="modal fade" tabindex="-1" id="modal-lihat-alasan">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Alasan Mengapa Tidak Menyelesaikan Intervensi Ini Pada Tahun
                    Sebelumnya</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group pt-1">
                    <h6 class="mb-3">Sub Indikator: <span class="font-weight-bold" id="modal-sub-indikator2"></span>
                    </h6>
                    <label for="TextInput" class="form-label">Alasan:</label>
                    <p style="font-style: italic" id="deskripsi-alasan"></p>
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
        let perencanaan2 = null
        $(document).on('click', '.lihat-alasan', function() {
            clearTextError()
            let id = $(this).data('id')
            let sub_indikator = $(this).data('sub-indikator')
            let alasan = $(this).data('alasan')
            let status_baca = $(this).data('status-baca')
            perencanaan2 = id
            $('#modal-lihat-alasan').modal('show');
            $('#modal-sub-indikator2').text(sub_indikator)
            $('#deskripsi-alasan').text(alasan)

            if (("{{ Auth::user()->role }}" == "Admin") && (status_baca == 0)) {
                $.post("{{ $action }}/" + perencanaan2, {
                    "_token": "{{ csrf_token() }}"
                }).done(function(data) {
                    $("#modal-lihat-alasan").modal("hide").on("hidden.bs.modal", function() {
                        location.reload();
                    });
                });
            }
        })
    </script>
@endpush
