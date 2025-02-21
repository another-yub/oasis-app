<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemilihan;
use App\Models\Kandidat;
use App\Models\User;
use App\Models\Siswa;

class PemilihanController extends Controller
{
    public function index(){
        $allkandidat = Kandidat::latest()->paginate('4');
        return view('app.pemilihan.index', compact('allkandidat'));
    }

    public function edit($id){
        $allsiswa = Siswa::all();
        $kandidat = Kandidat::where('id', $id)->first();
        if ($kandidat == null) {
            return redirect()->route('kandidat.index')->with(['error' => 'Data gagal di temukan :(']);
        }
        return view('app.pemilihan.edit', compact('kandidat', 'allsiswa'));
    }

    public function update(Request $request){
        try {

                $siswa = Siswa::where('id', $request->nama_pemilih)->first();
                $siswa->status_memilih = $request->status_memilih;
                $siswa->save();    

            Pemilihan::create([
            'kandidat_id' => $request->kandidat_id,
            'siswa_id' => $request->nama_pemilih,
            'waktu_memilih' => $request->waktu_memilih,
            ]);

            return redirect()->route('pemilihan.index')->with(['success' => 'Pemilihan berhasil :)']);
        } catch (\Throwable $th) {
            return redirect()->route('pemilihan.index')->with(['error' => 'Pemilihan Gagal :(']);
            }
    }
}
