<?php

namespace App\Http\Controllers;

use App\Models\Peminjam;
use App\Models\Pinjaman;
use Illuminate\Http\Request;

class AngsuranSingleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
