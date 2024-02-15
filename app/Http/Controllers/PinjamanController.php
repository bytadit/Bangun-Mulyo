<?php

namespace App\Http\Controllers;

use App\Models\Pinjaman;
use Illuminate\Http\Request;

use Alert;

class PinjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $peminjam_id = $request->peminjam_id;
        $data = Pinjaman::create([
            'peminjam_id' => $peminjam_id,
            'tgl_pinjaman' => $request->tgl_pinjaman,
            'periode_pinjaman' => $request->periode_pinjaman,
            'jumlah_pinjaman' => $request->jumlah_pinjaman,
            'keperluan' => $request->keperluan,
            'keterangan' => $request->keterangan,
        ]);
        Alert::success('Sukses!', 'Data Pinjaman Kelompok berhasil diatur!');
        return redirect()->route('anggota-kelompok.index', ['kelompok' => $peminjam_id]);
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
        $pinjaman_id = $request->pinjaman_id;
        $peminjam_id = $request->peminjam_id;
        $kelompok = $request->route('kelompok');
        Pinjaman::where('id', $pinjaman_id)
            ->update([
                'peminjam_id' => $peminjam_id,
                'tgl_pinjaman' => $request->etgl_pinjaman,
                'periode_pinjaman' => $request->eperiode_pinjaman,
                'jumlah_pinjaman' => $request->ejumlah_pinjaman,
                'keperluan' => $request->ekeperluan,
                'keterangan' => $request->eketerangan,
            ]);
        Alert::success('Sukses!', 'Data pinjaman kelompok berhasil diubah!');
        return redirect()->route('anggota-kelompok.index', ['kelompok' => $peminjam_id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $peminjam_id = $request->peminjam_id;
        Pinjaman::destroy($peminjam_id);
        Alert::success('Sukses!', 'Data pinjaman kelompok berhasil dihapus!');
        return redirect()->route('peminjam-kelompok.index');
    }
}
