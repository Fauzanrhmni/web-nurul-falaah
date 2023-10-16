<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

use App\Models\fasilitas;
use App\Models\sekolah;
use Illuminate\Http\Request;

class fasilitasC extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.fasilitasAdmin',[
            'title' => 'FasiltasTaam',
            'fasilitas' => fasilitas::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.data_fasilitas.create',[
            'title' => 'Tambah Fasilitas',
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
        $request->validate([
            'judul' => 'required|max:255',
            'gambar' => 'image|max:5024',
        ]);

        $fasilitas = new Fasilitas();
        $fasilitas->judul = $request->input('judul');

        if ($request->file('gambar')) {
            $imagePath = $request->file('gambar')->store('fasilitas', 'public');
            $fasilitas->gambar = $imagePath; // Simpan path gambar ke database
        }

        
        if ($fasilitas->save()) {
            return redirect('/fasilitasAdmin')->with('success', 'Profil fasilitas berhasil diperbarui.');
        } else {
            return redirect('/fasilitasAdmin')->with('error', 'Gagal menyimpan profil fasilitas.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function show(fasilitas $fasilitas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function edit(fasilitas $fasilitas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, fasilitas $fasilitas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fasilitas = Fasilitas::find($id);

        if (!$fasilitas) {
            return redirect('/fasilitasAdmin')->with('error', 'Data fasilitas tidak ditemukan.');
        }

        // Hapus gambar dari penyimpanan
        if ($fasilitas->gambar) {
            Storage::delete('public/' . $fasilitas->gambar);
        }

        $fasilitas->delete();

        return redirect('/fasilitasAdmin')->with('success', 'Data fasilitas berhasil dihapus.');
    }

}
