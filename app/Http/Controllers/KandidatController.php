<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kandidat;

class KandidatController extends Controller
{
    public function index(){
        $allkandidat = Kandidat::latest()->paginate(4);
        return view('app.kandidat.index', compact('allkandidat'));
    }

    public function create(){
        return view('app.kandidat.create');
    }

    public function store(Request $request){
        try {
            Kandidat::create([
                'nama_kandidat' => $request->nama_kandidat,
                'kelas' => $request->kelas,
                'visi' => $request->visi,
                'misi' => $request->misi,
            ]);

            return redirect()->route('kandidat.index')->with(['success' => 'Data berhasil di tambahkan']);
        } catch (\Throwable $th) {
            return redirect()->route('kandidat.index')->with(['error' => 'Data gagal di tambahkan']);
        }
    }

    public function edit($id){
        $kandidat = Kandidat::where('id', $id)->first();
        if ($kandidat == null) {
            return redirect()->route('kandidat.index')->with(['error' => 'Data tidak di temukan :(']);
        }
        return view('app.kandidat.edit', compact('kandidat'));
    }

    public function update(Request $request){
        try {
            $kandidat = Kandidat::where('id', $request->id)->first();
            $kandidat->nama_kandidat = $request->nama_kandidat;
            $kandidat->kelas = $request->kelas;
            $kandidat->visi = $request->visi;
            $kandidat->misi = $request->misi;

            $kandidat->save();

            return redirect()->route('kandidat.index')->with(['success' => 'Data berhasil di ubah :)']);
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->route('kandidat.index')->with(['error' => 'Data gagal di ubah :(']);
        }
    }

    public function delete($id){
        try {
            $kandidat = Kandidat::where('id', $id)->first();

            $kandidat->delete();
            return redirect()->route('kandidat.index')->with(['success' => 'Data berhasil di hapus :)']);
        } catch (\Throwable $th) {
            return redirect()->route('kandidat.index')->with(['error' => 'Data gagal di hapus :)']);
        }
    }
}
