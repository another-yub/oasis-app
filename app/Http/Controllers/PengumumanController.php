<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengumuman;
use App\Models\User;

class PengumumanController extends Controller
{
    public function index(){
        $allpengumuman = Pengumuman::latest()->paginate(4);
        return view('app.pengumuman.index', compact('allpengumuman'));
    }

    public function create(){
        $alluser = User::where('role', 'admin')->get();
        return view('app.pengumuman.index', compact('alluser'));
    }

    public function store(Request $request){
        try {
            Pengumuman::create([
                'judul' => $request->judul,
                'isi' => $request->isi,
                'admin_id' => $request->admin_id,
            ]);
            return redirect()->route('pengumuman.index')->with(['success' => 'Judul berhasil di tambahkan :)']);
        } catch (\Throwable $th) {
            return redirect()->route('pengumuman.index')->with(['error' => 'Judul gagal di tambahkan :(']);
        }
    }

    public function edit($id){
        $pengumuman = Pengumuman::where('id', $id)->first();
        if ($pengumuman == null) {
            return redirect()->route('pengumuman.index')->with(['error' => 'Data gagal di temukan :(']);
        }
        return view('app.pengumuman.index', compact('pengumuman'));
    }

    public function update(Request $request){
        try {
            $pengumuman = Pengumuman::where('id', $request->id)->first();
            $pengumuman->judul = $request->judul;
            $pengumuman->isi = $request->isi;
            $pengumuman->admin_id = $request->nama_admin;

            $pengumuman->save();
            return redirect()->route('pengumuman.index')->with(['success' => 'Data berhasil di ubah :)']);
        } catch (\Throwable $th) {
            return redirect()->route('pengumuman.index')->with(['error' => 'Data gagal di tambahkan : (']);
        }
    }

    public function delete($id){
        try {
            $pengumuman = Pengumuman::where('id', $id)->first();
            $pengumuman->delete();

            return redirect()->route('pengumuman.index')->with(['success' => 'Data berhasil di hapus :)']);
        } catch (\Throwable $th) {
            return redirect()->route('pengumuman.index')->with(['error' => 'Data gagal di hapus :(']);
        }
    }
}
