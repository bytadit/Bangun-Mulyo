<?php

namespace App\Http\Controllers;

use App\Models\AnggotaKelompok;
use App\Models\Angsuran;
use App\Models\Peminjam;
use App\Models\Pinjaman;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Alert;

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
        $tgl_lunas = Pinjaman::where('id', $pinjaman_kelompok)->first()->tgl_pelunasan;
        $tgl_pinjaman = Pinjaman::where('id', $pinjaman_kelompok)->first()->tgl_pinjaman;

        $bulan_iuran = Carbon::parse($tgl_pinjaman)->diffInMonths(Carbon::parse($tgl_lunas));

        return view('dashboard.admin.angsuran-kelompok.index', [
            'title' => 'Riwayat Angsuran Kelompok ' . $kelompok_name,
            'pinjaman' => $pinjaman,
            'kelompok' => $kelompok,
            'tgl_lunas' => $tgl_lunas,
            'tgl_pinjaman' => $tgl_pinjaman,
            'bulan_iuran' => $bulan_iuran,
            'periode' => Pinjaman::where('id', $pinjaman_kelompok)->first()->periode_pinjaman,
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
        $kelompok_id = $request->kelompok_id;
        $pinjaman_id = $request->pinjaman_id;
        $angsuran_id = $request->angsuran_id;
        $nilai_angsuran = Pinjaman::where('id', $pinjaman_id)->first()->jumlah_angsuran;
        $nilai_pinjaman = Pinjaman::where('id', $pinjaman_id)->first()->jumlah_pinjaman;
        $nilai_iuran = Pinjaman::where('id', $pinjaman_id)->first()->jumlah_iuran;
        $nilai_pokok = Pinjaman::where('id', $pinjaman_id)->first()->jumlah_pokok;

        $tgl_pinjaman = Pinjaman::where('id', $pinjaman_id)->first()->tgl_pinjaman;

        $total_pokok = Angsuran::where('id', $angsuran_id)->sum('pokok');
        $total_iuran = Angsuran::where('id', $angsuran_id)->sum('iuran');
        $total_simpanan = Angsuran::where('id', $angsuran_id)->sum('simpanan');

        $data = Angsuran::create([
            'pinjaman_id' => $pinjaman_id,
            'tgl_angsuran' => $request->tgl_angsuran,
            'iuran' => $nilai_iuran,
            'pokok' => $nilai_pokok,
            'angsuran_dibayarkan' => $request->angsuran_dibayarkan,
            'simpanan' => $request->angsuran_dibayarkan - $nilai_angsuran,
            'total_pokok_dibayarkan' => $total_pokok + $request->pokok,
            'total_iuran_dibayarkan' => $total_iuran + $request->iuran,
            'total_simpanan' => $total_simpanan + ($nilai_angsuran - $request->angsuran_dibayarkan),
            'pokok_tunggakan' => $nilai_pinjaman - ($total_pokok + $request->pokok),
            'iuran_tunggakan' => ($nilai_iuran * (Carbon::parse($tgl_pinjaman)->diffInMonths(Carbon::now()))) - ($total_iuran + $request->iuran),
            'keterangan' => $request->keterangan,
        ]);
        // PinjamanAnggota::create([
        //     'anggota_id' => $data->id,
        // ]);
        Alert::success('Sukses!', 'Data Riwayat Iuran Kelompok berhasil ditambahkan!');
        return redirect()->route('riwayat-angsuran-kelompok.index', ['kelompok' => $kelompok_id, 'pinjaman_kelompok' => $pinjaman_id]);
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
