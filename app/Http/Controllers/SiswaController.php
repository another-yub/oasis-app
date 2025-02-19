<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\User;

class SiswaController extends Controller
{
    public function index(){
        $allsiswa = Siswa::latest()->paginate(4);
        return view('app.siswa.index', compact('allsiswa'));
    }

    public function create(){
        $alluser = User::where('role', 'siswa')->get();
        return view('app.siswa.create', compact('alluser'));
    }

    public function store(Request $request){
        try {
            Siswa::create([
                'nis' => $request->nis,
                'kelas' => $request->kelas,
                'status_memilih' => $request->status_memilih,
                'user_id' => $request->nama_lengkap,
            ]);

            return redirect()->route('siswa.index')->with(['success' => 'Data berhasil di tambahkan :)']);
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->route('siswa.index')->with(['error' => 'Data gagal di tambahkan :)']);
        }
    }

    public function edit($id){
        $alluser = User::all();
        $siswa = Siswa::where('id', $id)->first();
        if ($siswa == null) {
            return redirect()->route('siswa.index')->with(['error' => 'Data tidak di temukan :)']);
        }
        return view('app.siswa.edit', compact('siswa', 'alluser'));
    }

    public function update(Request $request){
        try {
            $siswa = Siswa::where('id', $request->id)->first();
            $siswa->nis = $request->nis;
            $siswa->kelas = $request->kelas;
            $siswa->status_memilih = $request->status_memilih;
            $siswa->user_id = $request->nama_lengkap;

            $siswa->save();

            return redirect()->route('siswa.index')->with(['success' => 'Data berhasil di ubah :)']);
        } catch (\Throwable $th) {
            return redirect()->route('siswa.index')->with(['error' => 'Data gagal di ubah :(']);
        }
    }

    public function delete($id){
        try {
            $siswa = Siswa::where('id', $id)->first();
            $siswa->delete();
            
            return redirect()->route('siswa.index')->with(['success' => 'Data berhasil di hapus :)']);
        } catch (\Throwable $th) {
            return redirect()->route('siswa.index')->with(['error' => 'Data gagal di hapus :(']);
        }
    }
}
