<div class="modal fade" id="createDataAnggotaKelompok" tabindex="-1" aria-labelledby="modalCreateAnggotaKelompok">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCreateAnggotaKelompok">Tambah Anggota Kelompok</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" action="{{ route('detail-kelompok.store', ['kelompok' => $kelompok]) }}">
                    @csrf
                    <div class="row g-3">
                        <input type="hidden" name="peminjam_id" value="{{ $kelompok }}">
                        <div class="col-lg-12">
                            <div>
                                <label for="nik" class="form-label">NIK</label>
                                <input type="text" class="form-control" name="nik" id="nik"
                                    placeholder="Masukkan nik anggota...">
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-12">
                            <div>
                                <label for="nama" class="form-label">Nama Anggota Kelompok</label>
                                <input type="text" class="form-control" name="nama" id="nama"
                                    placeholder="Masukkan nama anggota...">
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-12 mb-3">
                            <label for="jenis_kelamin" class="form-label">Pilih Jenis Kelamin<span
                                    style="color: red;">*</span></label>
                            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                <option value="">Pilih Jenis Kelamin</option>
                                <optgroup label="Pilih Jenis Kelamin">
                                    <option value="1">Laki-Laki</option>
                                    <option value="2">Perempuan</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <label for="jabatan_id" class="form-label">Pilih Jabatan<span
                                    style="color: red;">*</span></label>
                            <select class="form-control" id="jabatan_id" name="jabatan_id">
                                <option value="">Pilih Jabatan</option>
                                <optgroup label="Pilih Jabatan">
                                    @foreach ($jabatans as $jabatan)
                                        <option value="{{ $jabatan->id }}">{{ $jabatan->nama_jabatan }}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>
                        <div class="col-lg-12">
                            <div>
                                <label for="noHP" class="form-label">Nomor HP Anggota Kelompok</label>
                                <input type="text" class="form-control" name="noHP" id="noHP"
                                    placeholder="Masukkan nomor handphone anggota...">
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-12">
                            <div>
                                <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir"
                                    placeholder="Masukkan tanggal lahir...">
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-12">
                            <div>
                                <label for="pekerjaan" class="form-label">Pekerjaan Anggota Kelompok</label>
                                <input type="text" class="form-control" name="pekerjaan" id="pekerjaan"
                                    placeholder="Masukkan pekerjaan anggota...">
                            </div>
                        </div><!--end col-->

                        <div class="col-lg-12">
                            <label for="alamat" class="form-label">Alamat<span
                                    style="color: red;">*</span></label>
                            <textarea rows="3" name="alamat" class="form-control" id="alamat"></textarea>
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
