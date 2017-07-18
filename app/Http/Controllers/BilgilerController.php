<?php

namespace App\Http\Controllers;

use App\Bilgi;
use App\Mezun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BilgilerController extends Controller
{

    //Mezunlardan Bilgiler ekrani
    public function index(){

        if (Session::has('kullanici_adi')) {

            $kullanici_adi = session()->get('kullanici_adi');
            $sorgu=Bilgi::where('onayla','1')->get();

            if($sorgu){



                return view('frontend.giris.bilgi.mezun_bilgi',compact('sorgu'));

            }



        }
        else{
            return view('/');
        }
    }

    //mezunlardan bilgi ekleme ekrani
    public function get_sizde_ekleyin()
    {
        if (Session::has('kullanici_adi')) {

            $kullanici_adi = session()->get('kullanici_adi');
            $sorgu=Mezun::where('kullanici_adi',$kullanici_adi)->get()->first();

            return view('frontend.giris.bilgi.sizde_ekleyin',compact('sorgu'));

        }
        else{
            return view('/');
        }
    }

    //mezunlardan bilgi ekleme islemi gerceklesir
    public function post_sizde_ekleyin(Request $request){

        $kullanici_adi = session()->get('kullanici_adi');
        $sorgu=Mezun::where('kullanici_adi',$kullanici_adi)->get()->first();

        try{
            //Veritabanina ekleme  islemi gerceklestirilir
            Bilgi::create([
                'mezun_id' => $sorgu->id,
                'haber' => $request->haber
            ]);
            return response(['durum' => 'success', 'baslik' => 'Basarılı', 'icerik' => '']);
        }
        catch (\Exception $exception){
            return response(['durum' => 'error', 'baslik' => 'Basarısız', 'icerik' => '']);

        }


    }


}
