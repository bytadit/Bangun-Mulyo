<?php

namespace App\Http\Controllers;

use App\Models\Angsuran;
use App\Models\Peminjam;
use App\Models\Pinjaman;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AngsuranSingleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $single = $request->route('single');
        $pinjaman_single = $request->route('pinjaman_single');
        $angsurans = Angsuran::where('pinjaman_id', $pinjaman_single)->get();
        $pinjaman = Pinjaman::where('id', $pinjaman_single)->get();
        $single_name = Peminjam::where('id', $single)->first()->nama;
        $tgl_lunas = Pinjaman::where('id', $pinjaman_single)->first()->tgl_pelunasan;
        $tgl_pinjaman = Pinjaman::where('id', $pinjaman_single)->first()->tgl_pinjaman;

        $bulan_iuran = Carbon::parse($tgl_pinjaman)->diffInMonths(Carbon::parse($tgl_lunas));

        return view('dashboard.admin.angsuran-single.index', [
            'title' => 'Riwayat Angsuran single ' . $single_name,
            'pinjaman' => $pinjaman,
            'single' => $single,
            'tgl_lunas' => $tgl_lunas,
            'tgl_pinjaman' => $tgl_pinjaman,
            'bulan_iuran' => $bulan_iuran,
            'periode' => Pinjaman::where('id', $pinjaman_single)->first()->periode_pinjaman,
            'pinjaman_single' => $pinjaman_single,
            'single_name' => $single_name,
            'angsurans' => $angsurans
        ]);
    }

    public function daftarPeminjam()
    {
        $singles = Peminjam::where('jenis_peminjam', 2)->get();
        return view('dashboard.admin.angsuran-single.peminjam', [
            'title' => 'Peminjam Perorangan',
            'singles' => $singles,
            'pinjamans' => Pinjaman::all()
        ]);
    }

    public function daftarPinjaman(Request $request)
    {
        $single = $request->route('single');
        $single_name = Peminjam::where('id', $single)->first()->nama;

        return view('dashboard.admin.angsuran-single.pinjaman', [
            'title' => 'Pinjaman ' . $single_name,
            'single' => $single,
            'single_name' => $single_name,
            'pinjamans' => Pinjaman::where('peminjam_id', $single)->get()
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
