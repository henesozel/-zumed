<?php

namespace App\Http\Controllers;

use App\Duyurular;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DuyuruController extends Controller
{

    public function get_duyuru()
    {
        if (Session::has('kullanici_adi'))
        {
            $duyurular=Duyurular::all();

            return view('frontend.giris.duyurular.duyurular',compact('duyurular'));
        }
        else{
            return redirect('/');
        }
    }
}
