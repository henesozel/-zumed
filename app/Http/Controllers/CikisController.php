<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CikisController extends Controller
{
    public function get_cikis(Request $request)
    {
        if (Session::has('kullanici_adi')) {

            $request->session()->forget('kullanici_adi');

            $request->session()->flush();

            return redirect('/');

        }
        else{
            return view('frontend.login');
        }
    }
}
