<?php

namespace App\Http\Controllers;

use App\Models\AnggotaKelompok;
use App\Models\Peminjam;
use App\Models\Pinjaman;
use App\Models\PinjamanAnggota;
use App\Models\ReferensiJabatan;
use Illuminate\Http\Request;
use Alert;
use App\Models\Angsuran;

class PinjamanAnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $kelompok = $request->route('kelompok');
        $pinjaman_kelompok = $request->route('pinjaman_kelompok');
        $anggota = $request->route('anggota');
        $anggotas = AnggotaKelompok::where('kelompok_id', $kelompok)->get();
        $pinjaman_anggotas = PinjamanAnggota::where('pinjaman_id', $pinjaman_kelompok)->get();
        $jabatans = ReferensiJabatan::all();
        return view('dashboard.admin.pinjaman-anggota.index', [
            'title' => 'Pinjaman Anggota ' . AnggotaKelompok::where('id', $anggota)->first()->nama,
            'pinjaman' => Pinjaman::where('id', $pinjaman_kelompok)->get(),
            'anggotas' => $anggotas,
            'pinjaman_kelompok' => $pinjaman_kelompok,
            'anggota' => $anggota,
            'jabatans' => $jabatans,
            'pinjaman_anggotas' => $pinjaman_anggotas,
            'kelompok' => $kelompok,
            'kelompok_name' => Peminjam::where('id', $kelompok)->first()->nama,
            'anggota_name' => AnggotaKelompok::where('id', $anggota)->first()->nama,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $anggota_name = AnggotaKelompok::where('id', $request->anggota_id)->first()->nama;
        $pinjaman_id = $request->pinjaman_id;
        $data = PinjamanAnggota::create([
            'pinjaman_id' => $pinjaman_id,
            'anggota_id' => $request->anggota_id,
            'jumlah_pinjaman' => $request->jumlah_pinjaman,
            'nilai_angsuran' => $request->nilai_angsuran,
            'iuran' => (1.3/100) * $request->jumlah_pinjaman,
            'pokok' => $request->nilai_angsuran - ((1.3/100) * $request->jumlah_pinjaman),
            'jaminan' => $request->jaminan,
            'nilai_jaminan' => $request->nilai_jaminan,
            'keterangan' => $request->keterangan,
        ]);

        Pinjaman::where('id', $pinjaman_id)->update([
            'jumlah_pinjaman' => PinjamanAnggota::where('pinjaman_id', $pinjaman_id)->sum('jumlah_pinjaman'),
            'jumlah_iuran' => PinjamanAnggota::where('pinjaman_id', $pinjaman_id)->sum('iuran'),
            'jumlah_angsuran' => PinjamanAnggota::where('pinjaman_id', $pinjaman_id)->sum('nilai_angsuran'),
            'jumlah_pokok' => PinjamanAnggota::where('pinjaman_id', $pinjaman_id)->sum('pokok')
        ]);
        Alert::success('Sukses!', 'Data Pinjaman Anggota '. $anggota_name .' berhasil diatur!');
        return redirect()->route('pinjaman-kelompok.index', ['kelompok' => $request->kelompok_id, 'pinjaman_kelompok' => $request->pinjaman_id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kelompok_id = $request->kelompok_id;
        $anggota_id = $request->anggota_id;
        $pinjaman_anggota_id = $request->pinjaman_anggota_id;
        $anggota_name = AnggotaKelompok::where('id', $anggota_id)->first()->nama;

        $data = PinjamanAnggota::where('id', $pinjaman_anggota_id)
        ->update([
            'anggota_id' => $anggota_id,
            'jumlah_pinjaman' => $request->ejumlah_pinjaman,
            'tgl_pinjaman' => $request->etgl_pinjaman,
            'tgl_pencairan' => $request->etgl_pencairan,
            'tgl_pelunasan' => $request->etgl_pelunasan,
            'keterangan' => $request->eketerangan,
        ]);
        Alert::success('Sukses!', 'Data Pinjaman Anggota '. $anggota_name .' berhasil diubah!');
        return redirect()->route('pinjaman-anggota.index', ['kelompok' => $kelompok_id, 'anggota' => $anggota_id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
