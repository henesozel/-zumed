<?php

namespace App\Http\Controllers;


use App\Duyurular;
use App\Etkinlik;
use App\Mezun;
use App\IsIlani;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class GirisController extends Controller
{

    //Giris ekrani
    public function index()
    {

        if (Session::has('kullanici_adi'))
        {

            $etkinlikler=Etkinlik::where('onayla','1')->orderBy('tarih', 'asc')->limit('7')->get();
            $isİlani=IsIlani::where('onayla','1')->orderBy('created_at', 'asc')->limit('7')->get();
            $duyurular=Duyurular::all();

            return view('frontend.giris.index',compact('etkinlikler','isİlani','duyurular'));
        }
        else{
            return view('frontend.login');
        }


    }



}
