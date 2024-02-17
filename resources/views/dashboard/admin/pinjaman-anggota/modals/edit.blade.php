<div class="modal fade" id="editDataPinjamanAnggota{{ $pinjaman_anggota->id }}" tabindex="-1" aria-labelledby="modalEditPinjamanAnggota{{ $pinjaman_anggota->id }}">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditPinjamanAnggota{{ $pinjaman_anggota->id }}">Ubah Pinjaman Anggota </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" action="{{ route('pinjaman-anggota.update', ['kelompok' => $kelompok, 'anggota' => $anggota, 'pinjaman_anggotum' => $pinjaman_anggota->first()->id]) }}">
                    @csrf
                    @method('put')
                    <div class="row g-3">
                        <input type="hidden" name="kelompok_id" value="{{ $kelompok }}">
                        <input type="hidden" name="anggota_id" value="{{ $anggota }}">
                        <input type="hidden" name="pinjaman_anggota_id" value="{{ $pinjaman_anggota->first()->id }}">
                        <div class="col-lg-12">
                            <div>
                                <label for="ejumlah_pinjaman" class="form-label">Jumlah Pinjaman</label>
                                <input type="number" min="1" value="{{ $pinjaman_anggota->first()->jumlah_pinjaman }}" class="form-control" name="ejumlah_pinjaman"
                                    id="ejumlah_pinjaman" placeholder="Masukkan jumlah pinjaman...">
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-12 mb-3">
                            <label for="eketerangan" class="form-label">Pilih Keterangan<span style="color: red;">*</span></label>
                            <select class="form-control" id="eketerangan" name="eketerangan">
                                <option value="">Pilih Keterangan</option>
                                <optgroup label="Keterangan">
                                    <option value="0" {{ $pinjaman_anggota->first()->keterangan == 0 ? 'selected' : ''}}>Belum Lunas</option>
                                    <option value="1" {{ $pinjaman_anggota->first()->keterangan == 1 ? 'selected' : ''}}>Lunas</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="col-lg-12">
                            <div>
                                <label for="etgl_pinjaman" class="form-label">Tanggal Pinjaman</label>
                                <input type="date"  value="{{\Carbon\Carbon::parse($pinjaman_anggota->first()->tgl_pinjaman)->format('Y-m-d')}}" class="form-control" name="etgl_pinjaman" id="etgl_pinjaman"
                                    placeholder="Masukkan tanggal pinjaman...">
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-12">
                            <div>
                                <label for="etgl_pencairan" class="form-label">Tanggal Pencairan</label>
                                <input type="date" value="{{\Carbon\Carbon::parse($pinjaman_anggota->first()->tgl_pencairan)->format('Y-m-d')}}" class="form-control" name="etgl_pencairan" id="etgl_pencairan"
                                    placeholder="Masukkan tanggal pencairan...">
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-12">
                            <div>
                                <label for="etgl_pelunasan" class="form-label">Tanggal Pelunasan</label>
                                <input type="date" value="{{\Carbon\Carbon::parse($pinjaman_anggota->first()->tgl_pelunasan)->format('Y-m-d')}}" class="form-control" name="etgl_pelunasan" id="etgl_pelunasan"
                                    placeholder="Masukkan tanggal pelunasan...">
                            </div>
                        </div><!--end col-->
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
