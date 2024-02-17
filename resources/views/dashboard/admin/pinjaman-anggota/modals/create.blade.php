<div class="modal fade" id="createDataPinjamanAnggota" tabindex="-1" aria-labelledby="modalCreatePinjamanAnggota">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCreatePinjamanAnggota">Tambah Pinjaman Anggota</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" action="{{ route('pinjaman-anggota.store', ['kelompok' => $kelompok, 'pinjaman_kelompok' => $pinjaman_kelompok]) }}">
                    @csrf
                    <div class="row g-3">
                        <input type="hidden" name="pinjaman_id" value="{{ $pinjaman_kelompok }}">
                        <input type="hidden" name="kelompok_id" value="{{ $kelompok }}">

                        <h6 class="fs-15 mb-1">
                            Jangka Waktu : {{ $pinjaman->first()->jangka_waktu }} Bulan
                        </h6>
                        <div class="col-lg-12 mb-3">
                            <label for="anggota_id" class="form-label">Pilih Anggota<span style="color: red;">*</span></label>
                            <select class="form-control" id="anggota_id" name="anggota_id">
                                <option value="">Pilih Anggota Kelompok</option>
                                <optgroup label="Nama Anggota">
                                    @foreach($anggotas as $anggota)
                                        <option value="{{ $anggota->id }}">{{ $anggota->nama }}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>
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
                                <label for="jaminan" class="form-label">Jaminan</label>
                                <input type="text" class="form-control" name="jaminan"
                                    id="jaminan" placeholder="Masukkan jaminan...">
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-12">
                            <div>
                                <label for="nilai_jaminan" class="form-label">Nilai Jaminan</label>
                                <input type="number" min="1" class="form-control" name="nilai_jaminan"
                                    id="nilai_jaminan" placeholder="Masukkan nilai jaminan...">
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-12 mb-3">
                            <label for="keterangan" class="form-label">Keterangan (opsional)<span style="color: red;">*</span></label>
                            <textarea rows="3" name="keterangan" class="form-control" id="keterangan"></textarea>
                        </div>
                        <div class="col-lg-12">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </form>
            </div>
        </div>
    </div>
</div>
