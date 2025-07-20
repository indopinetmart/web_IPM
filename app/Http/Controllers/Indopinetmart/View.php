<?php

namespace App\Http\Controllers\Indopinetmart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 use Illuminate\Support\Facades\URL;

class View extends Controller
{
     public function index()
    {
        $signedSplashUrl = URL::signedRoute('perwira.splash'); // tanpa waktu
        $signedSplashUrlpineT = URL::signedRoute('pinet.splash'); // tanpa waktu
        return view('indopinetmart.index', compact('signedSplashUrl','signedSplashUrlpineT'));
    }

    public function splash(Request $request)
    {
        $signedUrl = URL::temporarySignedRoute('perwira.view', now()->addMinutes(5));
        return view('perwira.splashscreen', compact('signedUrl')); // Splash screen sebelum redirect
    }
     // Halaman tujuan PERWIRA
    public function viewPerwira(Request $request)
    {
        return view('perwira.view_perwira'); // Ganti sesuai isi halaman PERWIRA kamu
    }


     public function underconstruction(){
        return view('indopinetmart.under_construction');
     }
}
