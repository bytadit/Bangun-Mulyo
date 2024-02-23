<?php

namespace App\Http\Controllers;

use App\Models\AnggotaKelompok;
use App\Models\Angsuran;
use App\Models\PejabatBumdes;
use App\Models\Peminjam;
use App\Models\Pinjaman;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\TemplateProcessor;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use App\Models\User; // Adjust the namespace as per your application
use Carbon\Carbon;
use Riskihajar\Terbilang\Facades\Terbilang;
use PhpOffice\PhpWord\Settings;

Settings::setOutputEscapingEnabled(true);


class CetakDokumen extends Controller
{
    public function proposalPinjaman(Request $request){
        // Fetch data from the database
        $users = User::all(); // Example: Fetching all users

        // Create a new PHPWord object
        $phpWord = new PhpWord();

        // Add a section to the document
        $section = $phpWord->addSection();

        // Add content to the section (example: table of users)
        $table = $section->addTable();
        foreach ($users as $user) {
            $table->addRow();
            $table->addCell()->addText($user->name);
            $table->addCell()->addText($user->email);
        }

        // Save the document to a temporary file
        $tempFile = tempnam(sys_get_temp_dir(), 'phpword');
        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save($tempFile);

        // Download the document
        return response()->download($tempFile, 'document.docx')->deleteFileAfterSend();
    }

    public function kuitansiAngsuran(Request $request){
        // Fetch data from the database
        $id_peminjam = $request->id_peminjam;
        $id_pinjaman = $request->id_pinjaman;
        $id_angsuran = $request->id_angsuran;

        $tgl_angsuran = Carbon::parse(Angsuran::where('id', $id_angsuran)->first()->tgl_angsuran);
        $thn_angs = $tgl_angsuran->format('Y');
        $bln_angs = $tgl_angsuran->format('m');
        $tgl_angs = $tgl_angsuran->day;
        $kode_kelompok = $id_peminjam;
        $nama_kelompok = Peminjam::where('id', $id_peminjam)->first()->nama;
        $jml_angsuran = number_format(Angsuran::where('id', $id_angsuran)->first()->angsuran_dibayarkan, 2, ',', '.');
        $terbilang = Terbilang::make(Angsuran::where('id', $id_angsuran)->first()->angsuran_dibayarkan);
        $orderedAngsuran = Angsuran::orderBy('tgl_angsuran')->pluck('id')->toArray();
        // Find the index of the desired ID in the array
        $urutan = array_search($id_angsuran, $orderedAngsuran) + 1;
        $nilai_pokok =  number_format(Angsuran::where('id', $id_angsuran)->first()->pokok, 2, ',', '.');
        $nilai_iuran = number_format(Angsuran::where('id', $id_angsuran)->first()->iuran, 2, ',', '.');
        $nama_ketua = AnggotaKelompok::where('kelompok_id', $id_peminjam)->where('jabatan_id', 1)->first()->nama;
        $nama_bendahara = PejabatBumdes::where('jabatan_id', 2)->first()->user->name;
        $tanggal_angsuran = $tgl_angsuran->format('d, F Y');
        $tgl_lunas = Pinjaman::where('id', $id_pinjaman)->first()->tgl_pelunasan;

        // Load the Word document template
        $templateProcessor = new TemplateProcessor(storage_path('app/kuitansi-spp.docx'));

        // Replace placeholders with actual data
        $templateProcessor->setValue('thn_angs', $thn_angs);
        $templateProcessor->setValue('bln_angs', $bln_angs);
        $templateProcessor->setValue('tgl_angs', $tgl_angs);
        $templateProcessor->setValue('id_peminjam', $id_peminjam);
        $templateProcessor->setValue('id_pinjaman', $id_pinjaman);
        $templateProcessor->setValue('kode_kelompok', $kode_kelompok);
        $templateProcessor->setValue('nama_kelompok', $nama_kelompok);
        $templateProcessor->setValue('jumlah_angsuran', $jml_angsuran);
        $templateProcessor->setValue('terbilang', $terbilang);
        $templateProcessor->setValue('urutan', $urutan);
        $templateProcessor->setValue('nilai_pokok', $nilai_pokok);
        $templateProcessor->setValue('nilai_iuran', $nilai_iuran);
        $templateProcessor->setValue('tgl_angsuran', Carbon::parse(Angsuran::where('id', $id_angsuran)->first()->tgl_angsuran)->isoFormat('D MMMM Y'));
        $templateProcessor->setValue('nama_ketua', $nama_ketua);
        $templateProcessor->setValue('nama_bendahara', $nama_bendahara);
        $templateProcessor->setValue('pokok_byr', $nilai_pokok);
        $templateProcessor->setValue('angs_bayar', $jml_angsuran);
        $templateProcessor->setValue('nilai_iuran', $nilai_iuran);
        $templateProcessor->setValue('sum_an', $urutan);
        $templateProcessor->setValue('tgl_lunas', $tgl_lunas != null ? Carbon::parse(Angsuran::where('id', $id_angsuran)->first()->tgl_pelunasan)->isoFormat('D MMMM Y') : 'Belum Lunas');

        // Save the document to a temporary file
        $tempFile = tempnam(sys_get_temp_dir(), 'Kuitansi-SPP-'. $tgl_angsuran);
        $templateProcessor->saveAs($tempFile);

        // Download the document
        return response()->download($tempFile, 'Kuitansi-SPP-'. $tgl_angsuran . '.docx')->deleteFileAfterSend();
    }

    public function dokumenPinjaman(Request $request){
        // Fetch data from the database
        $users = User::all(); // Example: Fetching all users

        // Create a new PHPWord object
        $phpWord = new PhpWord();

        // Add a section to the document
        $section = $phpWord->addSection();

        // Add content to the section (example: table of users)
        $table = $section->addTable();
        foreach ($users as $user) {
            $table->addRow();
            $table->addCell()->addText($user->name);
            $table->addCell()->addText($user->email);
        }

        // Save the document to a temporary file
        $tempFile = tempnam(sys_get_temp_dir(), 'phpword');
        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save($tempFile);

        // Download the document
        return response()->download($tempFile, 'document.docx')->deleteFileAfterSend();
    }
    public function kuitansiLunas(Request $request){
        // Fetch data from the database
        $users = User::all(); // Example: Fetching all users

        // Create a new PHPWord object
        $phpWord = new PhpWord();

        // Add a section to the document
        $section = $phpWord->addSection();

        // Add content to the section (example: table of users)
        $table = $section->addTable();
        foreach ($users as $user) {
            $table->addRow();
            $table->addCell()->addText($user->name);
            $table->addCell()->addText($user->email);
        }

        // Save the document to a temporary file
        $tempFile = tempnam(sys_get_temp_dir(), 'phpword');
        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save($tempFile);

        // Download the document
        return response()->download($tempFile, 'document.docx')->deleteFileAfterSend();
    }
}
