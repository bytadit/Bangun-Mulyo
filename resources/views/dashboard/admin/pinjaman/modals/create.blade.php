<div class="modal fade" id="createDataPinjaman" tabindex="-1" aria-labelledby="modalCreatePinjaman">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCreatePinjaman">Atur Detail Pinjaman Kelompok</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" action="{{route('pinjaman.store')}}">
                    @csrf
                    <div class="row g-3">
                        <input type="hidden" name="peminjam_id" value="{{ $kelompok }}">
                        <div class="col-lg-12 mb-3">
                            <label for="keterangan" class="form-label">Pilih Keterangan<span style="color: red;">*</span></label>
                            <select class="form-control" id="keterangan" name="keterangan">
                                <option value="">Pilih Keterangan</option>
                                <optgroup label="Keterangan">
                                    <option value="0">Belum Lunas</option>
                                    <option value="1">Lunas</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="col-lg-12">
                            <div>
                                <label for="tgl_pinjaman" class="form-label">Tanggal Pinjaman</label>
                                <input type="date" class="form-control" name="tgl_pinjaman" id="tgl_pinjaman" placeholder="Masukkan tanggal pinjaman...">
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-12">
                            <div>
                                <label for="periode_pinjaman" class="form-label">Periode Pinjaman</label>
                                <input type="number" min="1" class="form-control" name="periode_pinjaman" id="periode_pinjaman" placeholder="Masukkan periode pinjaman...">
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-12">
                            <div>
                                <label for="jumlah_pinjaman" class="form-label">Jumlah Pinjaman</label>
                                <input type="number" min="1" class="form-control" name="jumlah_pinjaman" id="jumlah_pinjaman" placeholder="Masukkan jumlah pinjaman...">
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-12">
                            <label for="keperluan" class="form-label">Keperluan<span style="color: red;">*</span></label>
                            <textarea rows="3" name="keperluan" class="form-control" id="keperluan"></textarea>
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
