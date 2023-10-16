<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

use App\Models\user;
use App\Models\sekolah;
use App\Models\siswa;
use App\Models\kelas;
use App\Models\guru;
use App\Models\akademik;

class adminC extends Controller
{
    public function index(){
        $sekolah = Sekolah::find(1);
        $user = user::all();
        return view('admin.index',[
        'title' => 'TAAM Nurul Falaah',
        'sekolah' => $sekolah,
        'user' => $user,        
        'jumlahSiswa' => siswa::count(),        
        'jumlahKelas' => kelas::count(),        
        'jumlahGuru' => guru::count(),       
        'jumlahAkademik' => akademik::count(),       
        ]);
    }

    public function edit($id)
    {
        $sekolah = Sekolah::find($id);
        $user = user::all();
        return view('admin.index', [
            'title' => 'TAAM Nurul Falaah',
            'sekolah' => $sekolah,
            'user' => $user
        ]);
    }

    public function update(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
        'nama' => 'required|max:255',
        'alamat' => 'required|max:255',
        'telepone' => 'required|max:255',
        'email' => 'required|max:255',
        'nama_kepala' => 'required',
        'sambutan_kepala' => 'required',
        'logo_sekolah' => 'image|max:1024', // Ganti 'image|file' dengan 'image'
        'visi' => 'required',
        'misi' => 'required',
        'sejarah' => 'required',
    ]);

    if ($validator->fails()) {
        return redirect("/sekolah/$id/edit")
            ->withErrors($validator)
            ->withInput();
    }

    $sekolah = Sekolah::find($id);
    $sekolah->nama_sekolah = $request->input('nama');
    $sekolah->alamat_sekolah = $request->input('alamat');
    $sekolah->telepone_sekolah = $request->input('telepone');
    $sekolah->email_sekolah = $request->input('email');
    $sekolah->nama_kepala = $request->input('nama_kepala');
    $sekolah->sambutan_kepala = $request->input('sambutan_kepala');
    $sekolah->visi = $request->input('visi');
    $sekolah->misi = $request->input('misi');
    $sekolah->sejarah = $request->input('sejarah');
    
    if ($request->file('logo_sekolah')) {
        if ($sekolah->logo_sekolah) {
            Storage::delete($sekolah->logo_sekolah);
        }
        $imagePath = $request->file('logo_sekolah')->store('upload','public');
        $sekolah->logo_sekolah = $imagePath; // Simpan path gambar ke database
    }

    // Update atribut lain sesuai kebutuhan
    $sekolah->save();

    return redirect('/dashboard')->with('success', 'Profil sekolah berhasil diperbarui.');
}

    

    //admin
    public function create()
    {
        return view('admin.staff_admin.create',[
            'title' => 'Tambah Admin'
        ]);
    }
    
    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'username' => 'required|min:3|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|min:8', // tambahkan aturan minimal karakter di sini
        ]);
    
        
        if ($validator->fails()) {
            return redirect('/admin/create')
                ->withErrors($validator)
                ->withInput();
        }
    
        // Hasilkan hashed password sebelum menyimpan ke database
        $validatedData = $validator->validate();
        $validatedData['password'] = Hash::make($request->input('password'));
    
        User::create($validatedData);
    
        return redirect('/dashboard')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit_admin($id)
    {
        $edit_admin = User::find($id);
        return view('admin.staff_admin.edit', [
            'title' => 'edit admin',
            'edit_admin' => $edit_admin]);
    }

    public function update_admin(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
        ]);
        
        if ($validator->fails()) {
            return redirect("/admin/$id/edit")
                ->withErrors($validator)
                ->withInput();
        }
    
        $admin = User::find($id);
    
        if (!$admin) {
            return redirect('/dashboard')->with('error', 'Data siswa tidak ditemukan.');
        }
    
        $admin->name = $request->input('name');
        $admin->username = $request->input('username'); // Perbaiki nama kolom
        $admin->email = $request->input('email');
        // Hash password jika perlu
        if ($request->input('password')) {
            $admin->password = Hash::make($request->input('password'));
        }
    
        $admin->save();
    
        return redirect('/dashboard')->with('success', 'Data Admin berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $admin = user::find($id);

        if (!$admin) {
            return redirect('/dashboard')->with('error', 'Data admin tidak ditemukan.');
        }

        $admin->delete();

        return redirect('/dashboard')->with('success', 'Data admin berhasil dihapus.');
    }



}

