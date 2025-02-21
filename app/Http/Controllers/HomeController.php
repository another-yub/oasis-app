<?php

namespace App\Http\Controllers;

use App\Models\Pemilihan;
use App\Models\Kandidat;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $pemilihan = Pemilihan::get()->groupBy('kandidat_id');
        $totalSuaraPemilihan = Pemilihan::get()->count();

        $allkandidat = Kandidat::all();

        $totalSuara = [];
        foreach ($pemilihan as $key => $value) {

            $totalSuara[$key]['perolehan_suara'] = $value->count();
            $totalSuara[$key]['persentase'] = ($value->count() / $totalSuaraPemilihan) * 100;
        }

        // dd($totalSuara);

        return view('app.home.index', compact('allkandidat', 'totalSuara'));
    }

    public function apiRekap(Request $request)
    {
        $pemilihan = Pemilihan::get()->groupBy('kandidat_id');
        $totalSuaraPemilihan = Pemilihan::get()->count();

        $allkandidat = Kandidat::all();

        $totalSuara = [];
        foreach ($pemilihan as $key => $value) {

            $totalSuara[$key]['perolehan_suara'] = $value->count();
            $totalSuara[$key]['persentase'] = ($value->count() / $totalSuaraPemilihan) * 100;
        }

        $data= [];

        foreach($allkandidat as $kandidat)
        {
            $data[$kandidat->id] = [
                'nama_kandidat' => $kandidat->nama_kandidat,
                'visi' => $kandidat->visi,
                'misi' => $kandidat->misi,
                'perolehan_suara' => $totalSuara[$kandidat->id]['perolehan_suara'],
                'persentase' => $totalSuara[$kandidat->id]['persentase'],
            ];
        }

        return response()->json($data);
    }
}
