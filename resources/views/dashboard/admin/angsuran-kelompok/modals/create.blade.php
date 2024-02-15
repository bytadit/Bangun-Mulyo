<div class="modal fade" id="createDataAngsuranAnggota" tabindex="-1" aria-labelledby="modalCreateDataAngsuranAnggota">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCreateDataAngsuranAnggota">Tambah Riwayat Angsuran Anggota
                    {{ $anggota_name }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data"
                    action="{{ route('angsuran-anggota.store', ['kelompok' => $kelompok, 'anggota' => $anggota]) }}">
                    @csrf
                    <div class="row g-3">
                        <input type="hidden" name="pinjaman_anggota_id" value="{{ $pinjaman_anggota->first()->id }}">
                        <div class="col-lg-12">
                            <div>
                                <label for="tgl_angsuran" class="form-label">Tanggal Angsuran</label>
                                <input type="date" class="form-control" name="tgl_angsuran" id="tgl_angsuran"
                                    placeholder="Masukkan tanggal angsuran...">
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-12">
                            <div>
                                <label for="bunga" class="form-label">Bunga</label>
                                <input type="number" min="1" class="form-control" name="bunga" id="bunga"
                                    placeholder="Masukkan bunga...">
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-12">
                            <div>
                                <label for="pokok_dibayar" class="form-label">Pokok Dibayar</label>
                                <input type="number" min="1" class="form-control" name="pokok_dibayar" id="pokok_dibayar"
                                    placeholder="Masukkan pokok dibayar...">
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-12">
                            <div>
                                <label for="pokok_tunggakan" class="form-label">Pokok Tunggakan</label>
                                <input type="number" min="1" class="form-control" name="pokok_tunggakan" id="pokok_tunggakan"
                                    placeholder="Masukkan Pokok Tunggakan...">
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-12">
                            <div>
                                <label for="pokok_sisa" class="form-label">Pokok Sisa</label>
                                <input type="number" min="1" class="form-control" name="pokok_sisa" id="pokok_sisa"
                                    placeholder="Masukkan pokok sisa...">
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-12">
                            <label for="keterangan" class="form-label">Keterangan<span style="color: red;">*</span></label>
                            <textarea rows="3" name="keterangan" class="form-control" id="keterangan"></textarea>
                        </div>
                        <div class="col-lg-12">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </form>
            </div>
        </div>
    </div>
</div>
