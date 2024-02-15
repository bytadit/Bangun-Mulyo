<div class="modal fade" id="editDataPinjamanAnggota" tabindex="-1" aria-labelledby="modalEditPinjamanAnggota">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditPinjamanAnggota">Ubah Pinjaman Anggota {{ $anggota_name }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" action="{{ route('pinjaman-anggota.update', ['kelompok' => $kelompok, 'anggota' => $anggota, 'pinjaman_anggotum' => $pinjaman_anggota->first()->id]) }}">
                    @csrf
                    @method('put')
                    <div class="row g-3">
                        <input type="hidden" name="kelompok_id" value="{{ $kelompok }}">
                        <input type="hidden" name="anggota_id" value="{{ $anggota }}">
                        <div class="col-lg-12">
                            <div>
                                <label for="epinjaman_ke" class="form-label">Pinjaman Ke-</label>
                                <input type="text" class="form-control" value="{{ $pinjaman_anggota->first()->pinjaman_ke }}" name="epinjaman_ke" id="epinjaman_ke"
                                    placeholder="Masukkan pinjaman ke...">
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-12">
                            <div>
                                <label for="ejumlah_pinjaman" class="form-label">Jumlah Pinjaman</label>
                                <input type="number" min="1" value="{{ $pinjaman_anggota->first()->jumlah_pinjaman }}" class="form-control" name="ejumlah_pinjaman"
                                    id="ejumlah_pinjaman" placeholder="Masukkan jumlah pinjaman...">
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-12">
                            <div>
                                <label for="enilai_angsuran" class="form-label">Nilai Angsuran</label>
                                <input type="number" min="1" value="{{ $pinjaman_anggota->first()->nilai_angsuran }}" class="form-control" name="enilai_angsuran"
                                    id="enilai_angsuran" placeholder="Masukkan nilai angsuran...">
                            </div>
                        </div><!--end col-->
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
