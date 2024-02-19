<?php

namespace App\Http\Controllers;

use App\Models\AnggotaKelompok;
use App\Models\Angsuran;
use App\Models\Peminjam;
use App\Models\Pinjaman;
use Illuminate\Http\Request;

class AngsuranKelompokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $kelompok = $request->route('kelompok');
        $pinjaman_kelompok = $request->route('pinjaman_kelompok');
        $angsurans = Angsuran::where('pinjaman_id', $pinjaman_kelompok)->get();
        $pinjaman = Pinjaman::where('id', $pinjaman_kelompok)->get();
        $kelompok_name = Peminjam::where('id', $kelompok)->first()->nama;
        return view('dashboard.admin.angsuran-kelompok.index', [
            'title' => 'Riwayat Angsuran Kelompok ' . $kelompok_name,
            'pinjaman' => $pinjaman,
            'kelompok' => $kelompok,
            'pinjaman_kelompok' => $pinjaman_kelompok,
            'kelompok_name' => $kelompok_name,
            'angsurans' => $angsurans
        ]);
    }

    public function daftarPeminjam()
    {
        $kelompoks = Peminjam::where('jenis_peminjam', 1)->get();
        return view('dashboard.admin.angsuran-kelompok.peminjam', [
            'title' => 'Peminjam Kelompok',
            'kelompoks' => $kelompoks,
            'anggotas' => AnggotaKelompok::all(),
            'pinjamans' => Pinjaman::all()
        ]);
    }

    public function daftarPinjaman(Request $request)
    {
        $kelompok = $request->route('kelompok');
        $kelompok_name = Peminjam::where('id', $kelompok)->first()->nama;
        return view('dashboard.admin.angsuran-kelompok.pinjaman', [
            'title' => 'Pinjaman Kelompok ' . $kelompok_name,
            'kelompok' => $kelompok,
            'kelompok_name' => $kelompok_name,
            'pinjamans' => Pinjaman::where('peminjam_id', $kelompok)->get()
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
