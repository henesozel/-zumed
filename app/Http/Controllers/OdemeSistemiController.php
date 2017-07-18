<?php

namespace App\Http\Controllers;



use App\Etkinlik;
use App\EtkinlikOdeme;
use App\Mezun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Mail;


class OdemeSistemiController extends Controller
{

    //Odeme icin bilgilerin geldigi ekran
    public function get_index(){

        if (Session::has('kullanici_adi')) {

            if(($_SERVER["REQUEST_METHOD"] == "POST")){

                return view('frontend.giris.odeme.odeme_sayfasi');
            }
            else{

                echo 'Yetkin yok';

            }
        }
        else{
            return redirect('/');
        }
    }

    //Odeme icin bilgilerin alindigi form icin kayit
    public function post_index(Request $request){

        if (Session::has('kullanici_adi')) {
            return view('frontend.giris.odeme.odeme_sayfasi')->with('kisiSayisi',$request->kisiSayisi)->with('odenicekMiktar',$request->tutar)->with('id',$request->id)->with('kisiSayisi',$request->kisiSayisi);
        }
        else{
            return redirect('/');
        }
    }

    //Odeme yapma ekrani
    public function get_odeme_yap(){

        if (Session::has('kullanici_adi')) {

            if(($_SERVER["REQUEST_METHOD"] == "POST")){

                return view('frontend.giris.odeme.odeme_yap');
            }
            //Yetkisiz Sayfaya Girmek isterse
            else{

                echo 'Yetkin yok';

            }
        }
        //Sisteme giris yapilmadiysa
        else{
            return redirect('/');
        }
    }

    //Odeme yapma islemleri gerceklesir
    public function post_odeme_yap(Request $request){

        if (Session::has('kullanici_adi')) {

            if(($_SERVER["REQUEST_METHOD"] == "POST")){

                $cardNumber=$request->cardNumber;
                $id=$request->id;
                $kisiSayisi=$request->kisiSayisi;
                $odenicekMiktar=$request->odenicekMiktar;

                return view('frontend.giris.odeme.odeme_yap',compact('cardNumber','id','odenicekMiktar','kisiSayisi'));
            }
            //Yetkisiz Sayfaya Girmek isterse
            else{

                echo 'Yetkin yok';

            }
        }
        //Sisteme giris yapilmadiysa
        else{
            return redirect('/');
        }
    }

    public function get_odeme_tamamla(){

        if (Session::has('kullanici_adi')) {

            if(($_SERVER["REQUEST_METHOD"] == "POST")){

                return view('frontend.giris.odeme.odeme_tamamla');
            }
            //Yetkisiz Sayfaya Girmek isterse
            else{

                echo 'Yetkin yok';

            }
        }
        //Sisteme giris yapilmadiysa
        else{
            return redirect('/');
        }
    }

    //Odeme tamamla islemleri
    public function post_odeme_tamamla(Request $request){

        if (Session::has('kullanici_adi')) {

            if(($_SERVER["REQUEST_METHOD"] == "POST")){

                $kullanici_adi = session()->get('kullanici_adi');




                //Girilen Sifre Dogru ise
                if($request->sifre==$request->code){
                    $kayit=EtkinlikOdeme::create(['etkinlik_id'=>$request->id,'kullanici_adi'=>$kullanici_adi,'odenicekMiktar'=>$request->odenicekMiktar,'kisiSayisi'=>$request->kisiSayisi]);
                    Etkinlik::where('id',$request->id)->update(['gorunum'=>'1']);
                    $sorgu=Mezun::where('kullanici_adi',$kullanici_adi)->get()->first();

                    $etkinlik_no=rand(0,100000000000);

                    $odenicekMiktar=$request->odenicekMiktar;

                    $tarih=date('d m Y H:i:s');



                    $data=['etkinlik_no'=>$etkinlik_no,'odenicekMiktar'=>$odenicekMiktar,'tarih'=>$tarih,'ad'=>$sorgu->ad,'soyad'=>$sorgu->soyad];

                    //Mail Gönderme islemi
                    Mail::send(['text' =>'odeme_mail'],$data,function ($message) {
                        $message->from('izumed@gmail.com', 'IZUMED');





                        //kod tekrari
                        $kullanici_adi = session()->get('kullanici_adi');
                        $sorgu=Mezun::where('kullanici_adi',$kullanici_adi)->get()->first();

                        $email=$sorgu->email;


                        $message->to($email,'Sifre Yenileme')->subject('Siparis Detay');






                    });



                    return view('frontend.giris.odeme.odeme_tamamla',compact('etkinlik_no','odenicekMiktar','tarih'));
                }
                //Yanlis ise
                else{
                   return view('frontend.giris.index');
                }


            }
            //Yetkisiz Sayfaya Girmek isterse
            else{

                echo 'Yetkin yok';

            }
        }
        //Sisteme giris yapilmadiysa
        else{
            return redirect('/');
        }
    }





}
