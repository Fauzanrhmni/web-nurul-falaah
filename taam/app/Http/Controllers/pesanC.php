<?php

namespace App\Http\Controllers;

use Jenssegers\Date\Date;

Date::setLocale('id');

use App\Models\DataPesan;
use Illuminate\Http\Request;

class pesanC extends Controller
{
    public function index(){
        return view('admin.pesan', [
            'title' => 'Pesan User',
            'pesan' => DataPesan::all(),
        ]);
    }

    public function destroy($id)
    {
        $pesan = DataPesan::find($id);

        if (!$pesan) {
            return redirect('/pesan')->with('error', 'Data pesan tidak ditemukan.');
        }

        $pesan->delete();

        return redirect('/pesan')->with('success', 'Data pesan berhasil dihapus.');
    }

    public function searchpesan(Request $request)
    {
        $query = $request->input('query');

        $pesan = DataPesan::where('nama', 'like', '%' . $query . '%')->get();

        return view('admin.pesan', ['title' => 'caripesan' ,'pesan' => $pesan, 'query' => $query]);
    }
}
