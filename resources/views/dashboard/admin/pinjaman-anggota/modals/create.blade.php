<div class="modal fade" id="createDataPinjamanAnggota" tabindex="-1" aria-labelledby="modalCreatePinjamanAnggota">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCreatePinjamanAnggota">Atur Pinjaman Anggota {{ $anggota_name }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" action="{{ route('pinjaman-anggota.store', ['kelompok' => $kelompok, 'anggota' => $anggota]) }}">
                    @csrf
                    <div class="row g-3">
                        <input type="hidden" name="kelompok_id" value="{{ $kelompok }}">
                        <input type="hidden" name="anggota_id" value="{{ $anggota }}">
                        <div class="col-lg-12">
                            <div>
                                <label for="pinjaman_ke" class="form-label">Pinjaman Ke-</label>
                                <input type="text" class="form-control" name="pinjaman_ke" id="pinjaman_ke"
                                    placeholder="Masukkan pinjaman ke...">
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-12">
                            <div>
                                <label for="jumlah_pinjaman" class="form-label">Jumlah Pinjaman</label>
                                <input type="number" min="1" class="form-control" name="jumlah_pinjaman"
                                    id="jumlah_pinjaman" placeholder="Masukkan jumlah pinjaman...">
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-12">
                            <div>
                                <label for="nilai_angsuran" class="form-label">Nilai Angsuran</label>
                                <input type="number" min="1" class="form-control" name="nilai_angsuran"
                                    id="nilai_angsuran" placeholder="Masukkan nilai angsuran...">
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-12">
                            <div>
                                <label for="tgl_pinjaman" class="form-label">Tanggal Pinjaman</label>
                                <input type="date" class="form-control" name="tgl_pinjaman" id="tgl_pinjaman"
                                    placeholder="Masukkan tanggal pinjaman...">
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-12">
                            <div>
                                <label for="tgl_pencairan" class="form-label">Tanggal Pencairan</label>
                                <input type="date" class="form-control" name="tgl_pencairan" id="tgl_pencairan"
                                    placeholder="Masukkan tanggal pencairan...">
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-12">
                            <div>
                                <label for="tgl_pelunasan" class="form-label">Tanggal Pelunasan</label>
                                <input type="date" class="form-control" name="tgl_pelunasan" id="tgl_pelunasan"
                                    placeholder="Masukkan tanggal pelunasan...">
                            </div>
                        </div><!--end col-->
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
