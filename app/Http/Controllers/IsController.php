<?php

namespace App\Http\Controllers;

use App\Mezun;
use App\IsIlani;
;

use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class IsController extends Controller
{
    //Is ilani ekrani
    public function get_is_ilani(){

        if (Session::has('kullanici_adi')) {
            return view('frontend.giris.isilani.isilani');
        }
    }

    //Is ilani listeleme ekrani
    public function get_is_ilani_listele(){

        if (Session::has('kullanici_adi')) {

             $sorgu=IsIlani::where('onayla','1')->get();

            return view('frontend.giris.isilani.isilani_listele')->with('sorgu', $sorgu);
        }
    }

    //Is ilani goruntuleme ekrani
    public function get_is_ilani_goruntule($url)
    {
        if (Session::has('kullanici_adi')) {

            $sorgu=IsIlani::where([['onayla','1'],['id',$url]])->get()->first();

            if($sorgu){

                $pdf = PDF::loadView('frontend.giris.isilani.isilani_goruntule', compact('sorgu'));
                return $pdf->stream('is_ilani.pdf');
            }
            else{
                echo 'hata';
            }




        }
    }


    //Is ilani kaydetme islemileri yapilir
    public function post_is_ilani(Request $request){

        $kullanici_adi = session()->get('kullanici_adi');

        $sorgu = Mezun::where('kullanici_adi', $kullanici_adi)->get()->last();

        $date = Carbon::createFromFormat('m/d/Y', $request->tarih);

           try {


               IsIlani::create([

                   'mezun_id' => $sorgu->id,
                   'baslik' => $request->baslik,
                   'tecrube' => $request->tecrube,
                   'egitim_seviyesi' => $request->egitim_seviyesi,
                   'firma_sektor' => $request->firma_sektor,
                   'departman' => $request->departman,
                   'calisma_sekli' => $request->calisma_sekli,
                   'pozisyon_seviyesi' => $request->pozisyon_seviyesi,
                   'personel_sayisi' => $request->personel_sayisi,
                   'iletisim' => $request->iletisim,
                   'tarih' => $date

               ]);

               return response(['durum' => 'success', 'baslik' => 'Basarili', 'icerik' => 'Kayit Basarili']);

           }
           catch (\Exception $e){
               return response(['durum'=>'error','baslik'=>'Basarisiz','icerik'=>'Kayit Basarisiz']);
           }



    }







}
