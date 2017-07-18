<?php

namespace App\Http\Controllers;

use App\Mezun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Validator;
use Alert;
use Mail;

class İletisimController extends Controller
{
    //İletisim sayfasi ekrani
    public function get_iletisim()
    {
        if (Session::has('kullanici_adi')) {

            $kullanici_adi = session()->get('kullanici_adi');

            $sorgu=Mezun::where('kullanici_adi',$kullanici_adi)->get()->first();

            $ad=$sorgu->ad;
            $soyad=$sorgu->soyad;
            $email=$sorgu->email;

            return view('frontend.giris.iletisim.iletisim',compact('ad','soyad','email'));
        }
    }

    //Mail gonderme
    public function post_iletisim(Request $request){

        $mesaj=['mesaj'=>$request->mesaj,'email'=>$request->email];

        //Mail gonderme islemi
        $result=Mail::send(['text' =>'iletisim_message'],$mesaj,function ($message) {
            $email =request()->email;
            $message->from($email, 'IZUMED');


            $email =request()->email;
            $message->to('izumed.izumed@gmail.com','İletisim')->subject('İletisim Mesajlari');
        });

        if(!$result){
            return  response(['durum'=>'success','baslik'=>'Mesajınız Gönderilmistir','icerik'=>'']);
        }
        else{
            return  response(['durum'=>'error','baslik'=>'Mesajınız Gönderilememiştir','icerik'=>'']);
        }


    }

}
