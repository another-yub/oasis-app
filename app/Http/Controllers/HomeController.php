<?php

namespace App\Http\Controllers;

use App\Models\Pemilihan;
use App\Models\Kandidat;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $pemilihan = Pemilihan::get()->groupBy('kandidat_id');
        $totalSuaraPemilihan = Pemilihan::get()->count(); 

        $allkandidat = Kandidat::all();
        
        $totalSuara = [];
        foreach($pemilihan as $key => $value)
        {
            
            $totalSuara[$key]['perolehan_suara'] = $value->count();
            $totalSuara[$key]['persentase'] = ($value->count() / $totalSuaraPemilihan) * 100;
        }

        // dd($totalSuara);

        return view('app.home.index', compact('allkandidat', 'totalSuara'));
    }
}
