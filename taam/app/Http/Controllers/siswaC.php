<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use Jenssegers\Date\Date;

Date::setLocale('id');

use App\Models\siswa;
use App\Models\kelas;
use Illuminate\Http\Request;

class siswaC extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = siswa::with('kelas')->get();
        return view('admin.siswa', [
            'title' => 'Data siswa',
            'siswa' => $siswa,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $siswa = kelas::all();
        return view('admin.data_siswa.create', [
            'title' => 'Data Kelas',
            'siswa' => $siswa,
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
            'nama' => 'required|max:100',
            'tanggal_lahir' => 'required|max:255',
            'alamat' => 'required|max:255',
            'kelas_id' => 'required|max:25'
        ], [
            'nama.required' => 'Nama harus diisi.',
            'nama.max' => 'Nama tidak boleh melebihi 100 karakter.',
            'tanggal_lahir.required' => 'Nama harus diisi.',
            'tanggal_lahir.max' => 'Nama tidak boleh melebihi 255 karakter.',
            'alamat.required' => 'Alamat harus diisi.',
            'alamat.max' => 'Alamat tidak boleh melebihi 255 karakter.'
        ]);

        siswa::create($validatedData);

        return redirect('/siswa')->with('success', 'Data siswa berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $siswa = siswa::find($id); 
        $kelas = kelas::all(); 
        return view('admin.data_siswa.edit', [
            'title' => 'Edit siswa',
            'siswa' => $siswa,
            'kelas' => $kelas,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|max:100',
            'tanggal_lahir' => 'required|max:255',
            'alamat' => 'required|max:255',
            'kelas_id' => 'required|max:25'
        ], [
            'nama.required' => 'Nama harus diisi.',
            'nama.max' => 'Nama tidak boleh melebihi 100 karakter.',
            'tanggal_lahir.required' => 'Nama harus diisi.',
            'tanggal_lahir.max' => 'Nama tidak boleh melebihi 255 karakter.',
            'alamat.required' => 'Alamat harus diisi.',
            'alamat.max' => 'Alamat tidak boleh melebihi 255 karakter.'
        ]);
    
        $siswa = siswa::find($id);
    
        if (!$siswa) {
            return redirect('/siswa')->with('error', 'Data kelas tidak ditemukan.');
        }
    
        $siswa->update([
            'nama' => $request->input('nama'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'alamat' => $request->input('alamat'),
            'kelas_id' => $request->input('kelas_id')
        ]);
    
        return redirect('/siswa')->with('success', 'Data berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siswa = siswa::find($id);

        if (!$siswa) {
            return redirect('/siswa')->with('error', 'Data siswa tidak ditemukan.');
        }

        $siswa->delete();

        return redirect('/siswa')->with('success', 'Data siswa berhasil dihapus.');
    }

    public function searchsiswa(Request $request)
    {
        $query = $request->input('query');

        $siswa = siswa::where('nama', 'like', '%' . $query . '%')->get();

        return view('admin.siswa', ['title' => 'carisiswa' ,'siswa' => $siswa, 'query' => $query]);
    }
}
