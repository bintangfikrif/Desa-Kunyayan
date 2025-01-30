<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Kades;

class HomeController extends Controller
{
    //
    public function home(){
        $beritas = Berita::latest()->get();
        return view('welcome', compact("beritas"));
    }

    public function berita($id){
        $berita = Berita::findOrFail($id);
        return view('detail_berita', compact("berita"));
    }
    
    public function profile(){
        $kades = Kades::all();
        return view('profil', compact('kades'));
    }
}
