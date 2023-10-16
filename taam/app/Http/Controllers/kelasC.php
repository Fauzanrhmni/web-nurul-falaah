<?php

namespace App\Http\Controllers;

use App\Models\guru;
use App\Models\kelas;
use Illuminate\Http\Request;

class kelasC extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = Kelas::with('guru')->get(); // Mengambil semua kelas dengan relasi guru
        return view('admin.kelas', [
            'title' => 'Data Kelas',
            'kelas' => $kelas,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::with('guru')->get();
        $guru = Guru::all();
        return view('admin.data_kelas.create', [
            'title' => 'Data Kelas',
            'kelas' => $kelas,
            'guru' => $guru,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_kelas' => 'required|max:255',
            'wali_kelas' => 'required|max:255'
        ], [
            'nama_kelas.required' => 'Nama_kelas harus diisi.',
            'nama_kelas.max' => 'Nama_kelas tidak boleh melebihi 255 karakter.',
            'alamat.required' => 'Alamat harus diisi.',
            'alamat.max' => 'Alamat tidak boleh melebihi 255 karakter.'
        ]);

        kelas::create($validatedData);

        return redirect('/kelas')->with('success', 'Data kelas berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show(kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kelas = kelas::find($id); 
        $guru = Guru::all();
        return view('admin.data_kelas.edit', [
            'title' => 'Edit Kelas',
            'kelas' => $kelas, // Memasukkan kelas ke tampilan
            'guru' => $guru,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
{
    $request->validate([
        'nama_kelas' => 'required|max:255',
        'wali_kelas' => 'required|max:255'
    ], [
        'nama_kelas.required' => 'Nama harus diisi.',
        'nama_kelas.max' => 'Nama tidak boleh melebihi 255 karakter.',
        'wali_kelas.required' => 'Nama wali kelas harus diisi.',
        'wali_kelas.min' => 'Nama wali kelas minimal 3 karakter.',
        'wali_kelas.max' => 'Nama wali kelas tidak boleh melebihi 255 karakter.'
    ]);

    $kelas = Kelas::find($id);

    if (!$kelas) {
        return redirect('/kelas')->with('error', 'Data kelas tidak ditemukan.');
    }

    $kelas->update([
        'nama_kelas' => $request->input('nama_kelas'),
        'wali_kelas' => $request->input('wali_kelas'),
    ]);

    return redirect('/kelas')->with('success', 'Data berhasil diupdate.');
}



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kelas = kelas::find($id);

        if (!$kelas) {
            return redirect('/kelas')->with('error', 'Data kelas tidak ditemukan.');
        }

        $kelas->delete();

        return redirect('/kelas')->with('success', 'Data kelas berhasil dihapus.');
    }

    public function searchKelas(Request $request)
    {
        $query = $request->input('query');

        $kelas = kelas::where('nama_kelas', 'like', '%' . $query . '%')->get();

        return view('admin.kelas', ['title' => 'carikelas' ,'kelas' => $kelas, 'query' => $query]);
    }
}
