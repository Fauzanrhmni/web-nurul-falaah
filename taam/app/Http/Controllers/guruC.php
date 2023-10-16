<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use App\Models\guru;
use Illuminate\Http\Request;

class guruC extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guru = guru::all();
        return view('admin.guru',[
            'title' => 'Data Guru',
            'guru' => $guru
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.data_guru.create',[
            'title' => 'Tambah guru'
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
            'nama' => 'required|max:255',
            'telepone' => 'required|min:3|max:20',
            'alamat' => 'required|max:255'
        ], [
            'nama.required' => 'Nama harus diisi.',
            'nama.max' => 'Nama tidak boleh melebihi 255 karakter.',
            'telepone.required' => 'Nomor telepon harus diisi.',
            'telepone.min' => 'Nomor telepon minimal 3 karakter.',
            'telepone.max' => 'Nomor telepon tidak boleh melebihi 255 karakter.',
            'alamat.required' => 'Alamat harus diisi.',
            'alamat.max' => 'Alamat tidak boleh melebihi 255 karakter.'
        ]);

        guru::create($validatedData);

        return redirect('/guru')->with('success', 'Data berhasil ditambahkan.');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\guruM  $guruM
     * @return \Illuminate\Http\Response
     */
    public function show(guruM $guruM)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\guruM  $guruM
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $guru = guru::find($id);
        return view('admin.data_guru.edit',[
            'title' => 'Edit Guru',
            'guru' => $guru
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\guruM  $guruM
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'telepone' => 'required|min:3|max:255',
            'alamat' => 'required|max:255'
        ], [
            'nama.required' => 'Nama harus diisi.',
            'nama.max' => 'Nama tidak boleh melebihi 255 karakter.',
            'telepone.required' => 'Nomor telepon harus diisi.',
            'telepone.min' => 'Nomor telepon minimal 3 karakter.',
            'telepone.max' => 'Nomor telepon tidak boleh melebihi 255 karakter.',
            'alamat.required' => 'Alamat harus diisi.',
            'alamat.max' => 'Alamat tidak boleh melebihi 255 karakter.'
        ]);

        guru::find($id)->update([
            'nama' => $request->input('nama'),
            'telepone' => $request->input('telepone'),
            'alamat' => $request->input('alamat')
        ]);

        return redirect('/guru')->with('success', 'Data berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\guruM  $guruM
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guru = guru::find($id);

        if (!$guru) {
            return redirect('/guru')->with('error', 'Data guru tidak ditemukan.');
        }

        $guru->delete();

        return redirect('/guru')->with('success', 'Data guru berhasil dihapus.');
    }

    public function searchGuru(Request $request)
    {
        $query = $request->input('query');

        $guru = Guru::where('nama', 'like', '%' . $query . '%')->get();

        return view('admin.guru', ['title' => 'cariguru' ,'guru' => $guru, 'query' => $query]);
    }


}
