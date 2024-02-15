<?php

namespace App\Http\Controllers;

use App\Models\AnggotaKelompok;
use App\Models\Peminjam;
use App\Models\Pinjaman;
use Illuminate\Http\Request;

use Alert;
use App\Models\ReferensiJabatan;

class AnggotaKelompokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $kelompok = $request->route('kelompok');
        $anggotas = AnggotaKelompok::where('kelompok_id', $kelompok)->get();
        $pinjaman = Pinjaman::where('peminjam_id', $kelompok)->get();
        $jabatans = ReferensiJabatan::all();
        return view('dashboard.admin.anggota-kelompok.index', [
            'title' => 'Anggota Kelompok ' . Peminjam::where('id', $kelompok)->first()->nama,
            'anggotas' => $anggotas,
            'jabatans' => $jabatans,
            'pinjaman' => $pinjaman,
            'kelompok' => $kelompok,
            'kelompok_name' => Peminjam::where('id', $kelompok)->first()->nama
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
        $peminjam_id = $request->peminjam_id;
        $data = AnggotaKelompok::create([
            'kelompok_id' => $request->peminjam_id,
            'nik' => $request->nik,
            'nama' => $request->nama,
            'jabatan_id' => $request->jabatan_id,
            'jenis_kelamin' => $request->jenis_kelamin,
            'noHP' => $request->noHP,
            'alamat' => $request->alamat,
            'tgl_lahir' => $request->tgl_lahir,
            'pekerjaan' => $request->pekerjaan,
            'jaminan' => $request->jaminan,
            'nilai_jaminan'=> $request->nilai_jaminan,
        ]);
        Alert::success('Sukses!', 'Data Anggota Kelompok berhasil ditambahkan!');
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
        $anggota_id = $request->anggota_id;
        $peminjam_id = $request->peminjam_id;
        AnggotaKelompok::where('id', $anggota_id)
            ->update([
                'kelompok_id' => $request->peminjam_id,
                'nik' => $request->enik,
                'nama' => $request->enama,
                'jabatan_id' => $request->ejabatan_id,
                'jenis_kelamin' => $request->ejenis_kelamin,
                'noHP' => $request->enoHP,
                'alamat' => $request->ealamat,
                'tgl_lahir' => $request->etgl_lahir,
                'pekerjaan' => $request->epekerjaan,
                'jaminan' => $request->ejaminan,
                'nilai_jaminan'=> $request->enilai_jaminan,
            ]);
        Alert::success('Sukses!', 'Data anggota kelompok berhasil diubah!');
        return redirect()->route('anggota-kelompok.index', ['kelompok' => $peminjam_id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $anggota_id = $request->anggota_id;
        $peminjam_id = $request->peminjam_id;
        AnggotaKelompok::destroy($anggota_id);
        Alert::success('Sukses!', 'Data anggota kelompok berhasil dihapus!');
        return redirect()->route('anggota-kelompok.index', ['kelompok' => $peminjam_id]);
    }
}
