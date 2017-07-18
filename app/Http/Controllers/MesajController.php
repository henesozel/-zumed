<?php

namespace App\Http\Controllers;

use App\Mesaj;
use App\Mezun;
use App\Arkadas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MesajController extends Controller
{

  public function get_mesaj($url)
  {

      if (Session::has('kullanici_adi')) {

          $kullanici_adi = session()->get('kullanici_adi');

          $mezun = Mezun::where('kullanici_adi', $kullanici_adi)->get()->first();

          $arkadasSorgu = Arkadas::where([['takip_edilen', $mezun->id], ['onayla', '1']])->orwhere([['takip_eden', $mezun->id], ['onayla', '1']])->get();

          if($url=='t'){
              return view('frontend.giris.mesaj.mesaj', compact('arkadasSorgu', 'kullanici_adi'));
          }
          else{
              $mesajAtan = Mezun::where('kullanici_adi', $kullanici_adi)->get()->first();
              $mesajAtilan=Mezun::where('kullanici_adi',$url)->get()->first();

              $mesajSorgu=Mesaj::where([['mesaj_atan',$mesajAtilan->id],['mesaj_atilan',$mesajAtan->id]])->get();

              if(count($mesajSorgu)>0){
                  foreach ($mesajSorgu as $msg){
                      Mesaj::where('id',$msg->id)->update(['okundu'=>'1']);
                  }
              }


              $mesaj=Mesaj::where([['mesaj_atan',$mesajAtan->id],['mesaj_atilan',$mesajAtilan->id]])->orwhere([['mesaj_atilan',$mesajAtan->id],['mesaj_atan',$mesajAtilan->id]])->get() ;

              return view('frontend.giris.mesaj.mesaj_at', compact('mesajAtan', 'mesajAtilan','mesaj','arkadasSorgu','kullanici_adi','url'));
          }


      } //Kullanici oturuma giris yapmamissa
      else {
          return redirect('/');
      }

     }
     public function get_mesaj_at($url){

         if (Session::has('kullanici_adi')) {

             if(isset($_SERVER['HTTP_REFERER'])) {

                 $kullanici_adi = session()->get('kullanici_adi');

                 $mesajAtan = Mezun::where('kullanici_adi', $kullanici_adi)->get()->first();
                 $mesajAtilan=Mezun::where('kullanici_adi',$url)->get()->first();

                 $mesajSorgu=Mesaj::where([['mesaj_atan',$mesajAtilan->id],['mesaj_atilan',$mesajAtan->id]])->get();

                 if(count($mesajSorgu)>0){
                     foreach ($mesajSorgu as $msg){
                         Mesaj::where('id',$msg->id)->update(['okundu'=>'1']);
                     }
                 }





                 $mesaj=Mesaj::where([['mesaj_atan',$mesajAtan->id],['mesaj_atilan',$mesajAtilan->id]])->orwhere([['mesaj_atilan',$mesajAtan->id],['mesaj_atan',$mesajAtilan->id]])->get() ;

                 return view('frontend.giris.mesaj.mesaj_at', compact('mesajAtan', 'mesajAtilan','mesaj','kullanici_adi'));

             }else{
                 return redirect('/anasayfa');
             }


         } //Kullanici oturuma giris yapmamissa
         else {
             return redirect('/');
         }

     }

     public function post_mesaj_at(Request $request,$url){

         if (Session::has('kullanici_adi')) {

             $kullanici_adi = session()->get('kullanici_adi');

             $mesajAtan = Mezun::where('kullanici_adi', $kullanici_adi)->get()->first();
             $mesajAtilan=Mezun::where('kullanici_adi',$url)->get()->first();

             $mesaj=Mesaj::create(['mesaj_atan'=>$mesajAtan->id,'mesaj_atilan'=>$mesajAtilan->id,'mesaj_icerigi'=>$request->mesaj_icerigi]);



             return back();




         } //Kullanici oturuma giris yapmamissa
         else {
             return redirect('/');
         }
     }

    public function post_mesaj(Request $request,$url){

        if (Session::has('kullanici_adi')) {

            $kullanici_adi = session()->get('kullanici_adi');

            $mesajAtan = Mezun::where('kullanici_adi', $kullanici_adi)->get()->first();
            $mesajAtilan=Mezun::where('kullanici_adi',$url)->get()->first();

            $mesaj=Mesaj::create(['mesaj_atan'=>$mesajAtan->id,'mesaj_atilan'=>$mesajAtilan->id,'mesaj_icerigi'=>$request->mesaj_icerigi]);



            return back();




        } //Kullanici oturuma giris yapmamissa
        else {
            return redirect('/');
        }
    }



}
