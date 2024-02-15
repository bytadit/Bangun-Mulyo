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
        $anggota = $request->route('anggota');
        $anggotas = AnggotaKelompok::where('kelompok_id', $kelompok)->get();
        $pinjaman_anggota = PinjamanAnggota::where('anggota_id', $anggota)->get();
        $jabatans = ReferensiJabatan::all();
        return view('dashboard.admin.pinjaman-anggota.index', [
            'title' => 'Pinjaman Anggota ' . AnggotaKelompok::where('id', $anggota)->first()->nama,
            'anggotas' => $anggotas,
            'anggota' => $anggota,
            'jabatans' => $jabatans,
            'angsurans' => Angsuran::where('pinjaman_anggota_id', $pinjaman_anggota->first()->id)->get(),
            'pinjaman_anggota' => $pinjaman_anggota,
            'kelompok' => $kelompok,
            'kelompok_name' => Peminjam::where('id', $kelompok)->first()->nama,
            'anggota_name' => AnggotaKelompok::where('id', $anggota)->first()->nama
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
        $kelompok_id = $request->kelompok_id;
        $anggota_id = $request->anggota_id;
        $anggota_name = AnggotaKelompok::where('id', $anggota_id)->first()->nama;

        $data = PinjamanAnggota::create([
            'anggota_id' => $anggota_id,
            'pinjaman_ke' => $request->pinjaman_ke,
            'jumlah_pinjaman' => $request->jumlah_pinjaman,
            'tgl_pinjaman' => $request->tgl_pinjaman,
            'tgl_pencairan' => $request->tgl_pencairan,
            'tgl_pelunasan' => $request->tgl_pelunasan,
            'nilai_angsuran' => $request->nilai_angsuran,
        ]);
        Alert::success('Sukses!', 'Data Pinjaman Anggota '. $anggota_name .' berhasil diatur!');
        return redirect()->route('pinjaman-anggota.index', ['kelompok' => $kelompok_id, 'anggota' => $anggota_id]);
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
        $anggota_name = AnggotaKelompok::where('id', $anggota_id)->first()->nama;

        $data = PinjamanAnggota::create([
            'anggota_id' => $anggota_id,
            'pinjaman_ke' => $request->epinjaman_ke,
            'jumlah_pinjaman' => $request->ejumlah_pinjaman,
            'tgl_pinjaman' => $request->etgl_pinjaman,
            'tgl_pencairan' => $request->etgl_pencairan,
            'tgl_pelunasan' => $request->etgl_pelunasan,
            'nilai_angsuran' => $request->enilai_angsuran,
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
