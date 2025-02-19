<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemilihan;
use App\Models\Kandidat;

class PemilihanController extends Controller
{
    public function index(){
        $allkandidat = Kandidat::latest()->paginate('4');
        return view('app.pemilihan.index', compact('allkandidat'));
    }

    public function edit($id){
        $kandidat = Kandidat::where('id', $id)->first();
        if ($kandidat == null) {
            return redirect()->route('kandidat.index')->with(['error' => 'Data gagal di temukan :(']);
        }
        return view('app.pemilihan.edit', compact('kandidat'));
    }
}
