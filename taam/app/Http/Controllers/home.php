<?php

namespace App\Http\Controllers;

use Jenssegers\Date\Date;

Date::setLocale('id');

use App\Models\guru;
use App\Models\siswa;
use App\Models\kelas;
use App\Models\sekolah;
use App\Models\DataPesan;
use App\Models\fasilitas;
use App\Models\akademik;
use Illuminate\Http\Request;

class home extends Controller
{
    public function index(){
        return view('home', [
        'title' => 'TAAM Nurul Falaah',
        'sekolah' => Sekolah::find(1),
        'jumlahguru' => guru::count(),
        'jumlahsiswa' => siswa::count(),
        'jumlahkelas' => kelas::count(),
        'fasilitas' => fasilitas::all()
        ]);
    }

    public function prosesForm(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'pesan' => 'required|max:255',
        ]);

        // Simpan data ke dalam database
        DataPesan::create([
            'nama' => $request->input('nama'),
            'no_hp' => $request->input('no_hp'),
            'pesan' => $request->input('pesan'),
            // Tambahkan kolom lain sesuai kebutuhan
        ]);

        session()->flash('pesan', 'Pesan Anda telah berhasil dikirim.');

        return redirect()->back();
    }


    public function kalender(){
        return view('kka', [
        'title' => 'Kalender Akademik',
        'sekolah' => Sekolah::find(1),
        'akademik' => akademik::all()
        ]);
    }

    public function data_siswa()
    {
        $kelas = Kelas::all(); // Ambil semua data kelas
        $siswa = Siswa::all(); // Ambil semua data siswa
        $guru = guru::all(); // Ambil semua data guru

        $kelasData = [];

        foreach ($kelas as $k) {
            $kelasData[$k->nama_kelas] = $siswa->where('kelas_id', $k->id)->sortBy('nama');
        }

        return view('data_siswa', [
            'title' => 'Data Siswa',
            'sekolah' => Sekolah::find(1),
            'kelasData' => $kelasData,
            'siswa' => $guru,
        ]);
    }

    public function profile(){
        return view('profile', [
            'sekolah' => Sekolah::find(1),
        'title' => 'profile'
        ]);
    }

    public function fasilitas()
    {
        return view('fasilitas',[
            'sekolah' => Sekolah::find(1),
            'fasilitas' => fasilitas::all(),
            'title' => 'FasiltasTaam'
        ]);
    }

}
