<?php

namespace App\Http\Controllers;

use App\Mezun;
use Illuminate\Http\Request;
use Validator;
use Alert;
use Mail;

class LoginController extends Controller
{
    //Giris ekrani
    public function index(){
        return view('frontend.login');
    }

    //Kayit ekrani
    public function get_kayit(){
        return view('frontend.kayit');
    }

    //Giris Sayfasi icin kontrol
    public function giris_kontrol(Request $request){



            $sifre=md5($request->sifre);

            $mezuns=Mezun::where([
                ['kullanici_adi',$request->kullanici_adi],
                ['sifre',$sifre]])->get()->last();

            $aktif=Mezun::where('aktif','1')->get()->last();

            //Uye aktifse
            if($aktif){
                //kullaniciadi ve sifre dogruysa
            if($mezuns){

                $request->session()->put('kullanici_adi',$request->kullanici_adi);

                //return  response(['durum'=>'success','baslik'=>'Basarili','icerik'=>'Kayıt Başarılı']);

            }
            //Yanlissa
            else{

                return response(['durum'=>'error','baslik'=>'Kullanıcı Adı yada Şifre Hatalı','icerik'=>'']);

            }
            }
            else{
                return response(['durum'=>'error','baslik'=>'Uyeliginiz aktif edilmemistir','icerik'=>'']);
            }




    }


    //Kontrol yapilir ve veritabanina ekleme islemi yapilir
    public function store(Request $request){

            $hash=encrypt(rand(1,1000000));

            Mezun::create([

                'kullanici_adi'=>$request->kullanici_adi,
                'sifre'=>md5($request->sifre),
                'ad'=>$request->ad,
                'soyad'=>$request->soyad,
                'email'=>$request->email,
                'bolum'=>$request->bolum,
                'mezun_yili'=>$request->mezun_yili,
                'telefon'=>$request->telefon,
                'cinsiyet'=>$request->cinsiyet,
                'hash'=>$hash


            ]);



            return  response(['durum'=>'success','baslik'=>'Basarili','icerik'=>'Kayıt Başarılı']);

        }

     //sifre yenileme ekrani
     public function sifre_yenile(){
         return view('frontend.sifre-yenile');
     }

     //sifre sifirlama islemi yapilir
     public function post_sifre_sifirla(Request $request){

          //sifreler uyusmuyorsa
         if($request->sifre!=$request->sifre1){
             return response(['durum'=>'error','baslik'=>'Sifreler uyusmamaktadır','icerik'=>'']);
         }
         //sifreler uyusuyorsa
         else{

             $hash=encrypt(rand(1,1000000));


             Mezun::where('id',$request->id)->update(['sifre'=>md5($request->sifre)]);
             Mezun::where('id',$request->id)->update(['hash'=>$hash]);

             return  response(['durum'=>'success','baslik'=>'Sifre basarılı sekilde güncellenmistir','icerik'=>'']);
         }

     }

      //sifre sifirlama ekranina yonlendirme yapilir
     public function sifre_sifirla($url,$hash){


         $id=Mezun::where([
             ['id',$url],
             ['hash',$hash],])->get()->last();

          if(isset($id)){
              return view('frontend.sifre-sifirla')->with('id',$id->id);
          }
          else{
             return redirect('/');
          }


     }

     //Sifre yenileme islemi yapilir
    public function sifre_yenile_kontrol(Request $request)
    {

        $email=$request->email;
        $sorgu=Mezun::where('email',$email)->get()->last();

        if($sorgu){
            $email=$request->email;
            $data=['id'=>$sorgu->id,'hash'=>$sorgu->hash];
            Mail::send(['text' =>'welcome'],$data,function ($message) {
                $message->from('izumed@gmail.com', 'IZUMED');


                $email =request()->email;
                $message->to($email,'Sifre Yenileme')->subject('Sifre Yenileme!');
            });


            return  response(['durum'=>'success','baslik'=>'Sifreniz mail olarak gönderilmistir','icerik'=>'']);

        }
        else{

            return response(['durum'=>'error','baslik'=>'Lutfen sisteme kayıtlı mail adresi giriniz','icerik'=>'']);

        }


    }







}
