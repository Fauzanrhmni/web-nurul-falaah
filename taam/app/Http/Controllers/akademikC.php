<?php

namespace App\Http\Controllers;

use App\Models\akademik;
use Illuminate\Http\Request;

use Jenssegers\Date\Date;

Date::setLocale('id');

class akademikC extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.akademik', [
            'title' => 'Data akademik',
            'akademik' => akademik::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.data_akademik.create', [
            'title' => 'Tambah akademik',
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
            'kegiatan' => 'required|max:100',
            'tgl_awal' => 'required|max:100',
            'tgl_akhir' => 'required|max:100'
        ], [
            'kegiatan.required' => 'kegiatan harus diisi.',
            'kegiatan.max' => 'kegiatan tidak boleh melebihi 100 karakter.',
            'tgl_awal.required' => 'tgl_awal harus diisi.',
            'tgl_awal.max' => 'tgl_awal tidak boleh melebihi 100 karakter.',
            'tgl_akhir.required' => 'tgl_akhir harus diisi.',
            'tgl_akhir.max' => 'tgl_akhir tidak boleh melebihi 100 karakter.'
        ]);

        akademik::create($validatedData);

        return redirect('/akademik')->with('success', 'Data akademik berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\akademik  $akademik
     * @return \Illuminate\Http\Response
     */
    public function show(akademik $akademik)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\akademik  $akademik
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $akademik = akademik::find($id); 
        return view('admin.data_akademik.edit', [
            'title' => 'Edit akademik',
            'akademik' => $akademik,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\akademik  $akademik
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kegiatan' => 'required|max:100',
            'tgl_awal' => 'required|max:100',
            'tgl_akhir' => 'required|max:100'
        ], [
            'kegiatan.required' => 'kegiatan harus diisi.',
            'kegiatan.max' => 'kegiatan tidak boleh melebihi 100 karakter.',
            'tgl_awal.required' => 'tgl_awal harus diisi.',
            'tgl_awal.max' => 'tgl_awal tidak boleh melebihi 100 karakter.',
            'tgl_akhir.required' => 'tgl_akhir harus diisi.',
            'tgl_akhir.max' => 'tgl_akhir tidak boleh melebihi 100 karakter.'
        ]);

        $akademik = akademik::find($id);

        if (!$akademik) {
            return redirect('/akademik')->with('error', 'Data akademik tidak ditemukan.');
        }

        $akademik->update([
            'kegiatan' => $request->input('kegiatan'),
            'tgl_awal' => $request->input('tgl_awal'),
            'tgl_akhir' => $request->input('tgl_akhir'),
        ]);

        return redirect('/akademik')->with('success', 'Data berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\akademik  $akademik
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $akademik = akademik::find($id);

        if (!$akademik) {
            return redirect('/akademik')->with('error', 'Data akademik tidak ditemukan.');
        }

        $akademik->delete();

        return redirect('/akademik')->with('success', 'Data akademik berhasil dihapus.');
    }

    public function searchakademik(Request $request)
    {
        $query = $request->input('query');

        $akademik = akademik::where('kegiatan', 'like', '%' . $query . '%')->get();

        return view('admin.akademik', ['title' => 'cariakademik' ,'akademik' => $akademik, 'query' => $query]);
    }
}
