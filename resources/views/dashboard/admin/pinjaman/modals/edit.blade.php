<div class="modal fade" id="editDataPinjaman" tabindex="-1" aria-labelledby="modalEditPinjaman">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditPinjaman">Ubah Data Peminjam Kelompok</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" action="{{route('pinjaman.update', ['pinjaman' => $kelompok])}}">
                    @csrf
                    @method('put')
                    <div class="row g-3">
                        <input type="hidden" name="peminjam_id" value="{{ $kelompok }}">
                        <input type="hidden" name="pinjaman_id" value="{{ $pinjaman->first()->id }}">
                        <div class="col-lg-12 mb-3">
                            <label for="eketerangan" class="form-label">Pilih Keterangan<span style="color: red;">*</span></label>
                            <select class="form-control" id="eketerangan" name="eketerangan">
                                <option value="">Pilih Keterangan</option>
                                <optgroup label="Keterangan">
                                    <option value="0" {{ $pinjaman->first()->keterangan == 0 ? 'selected' : ''}}>Belum Lunas</option>
                                    <option value="1" {{ $pinjaman->first()->keterangan == 1 ? 'selected' : ''}}>Lunas</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="col-lg-12">
                            <div>
                                <label for="etgl_pinjaman" class="form-label">Tanggal Pinjaman</label>
                                <input type="date" value="{{\Carbon\Carbon::parse($pinjaman->first()->tgl_pinjaman)->format('Y-m-d')}}" class="form-control" name="etgl_pinjaman" id="etgl_pinjaman" placeholder="Masukkan tanggal pinjaman...">
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-12">
                            <div>
                                <label for="eperiode_pinjaman" class="form-label">Periode Pinjaman</label>
                                <input type="number" min="1" value="{{ $pinjaman->first()->periode_pinjaman }}" class="form-control" name="eperiode_pinjaman" id="eperiode_pinjaman" placeholder="Masukkan periode pinjaman...">
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-12">
                            <div>
                                <label for="ejumlah_pinjaman" class="form-label">Jumlah Pinjaman</label>
                                <input type="number" min="1" value="{{ $pinjaman->first()->jumlah_pinjaman }}" class="form-control" name="ejumlah_pinjaman" id="ejumlah_pinjaman" placeholder="Masukkan jumlah pinjaman...">
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-12">
                            <label for="ekeperluan" class="form-label">Keperluan<span style="color: red;">*</span></label>
                            <textarea rows="3" name="ekeperluan" class="form-control" id="ekeperluan">{{ $pinjaman->first()->keperluan }}</textarea>
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
