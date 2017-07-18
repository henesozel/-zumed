<?php

namespace App\Http\Controllers;

use App\Mezun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;


class AyarlarController extends Controller
{

     //Ayarlar kisminda sifre degistirme ekrani
    public function get_ayarlar(){

        if (Session::has('kullanici_adi'))
        {

            $kullanici_adi=session()->get('kullanici_adi');

            return view('frontend.giris.profil.ayarlar')->with('s_kullanici_adi',$kullanici_adi);
        }
        else{
            return redirect('/');
        }


    }
    //kisisel bilgiler ekrani
    public function get_kisiselBilgiler(){

        if (Session::has('kullanici_adi')) {

            $kullanici_adi = session()->get('kullanici_adi');

            $sorgu = Mezun::where('kullanici_adi', $kullanici_adi)->get()->last();


            return view('frontend.giris.profil.kisiselBilgiler')->with('sorgu', $sorgu);

        }
        else{
            return redirect('/');
        }
    }

    //mezunKarti ekrani
    public function get_mezunKarti(){

        if (Session::has('kullanici_adi')) {

            $kullanici_adi = session()->get('kullanici_adi');

            $sorgu = Mezun::where('kullanici_adi', $kullanici_adi)->get()->last();

            return view('frontend.giris.profil.mezunKarti')->with('sorgu', $sorgu);

        }
        else{
            return redirect('/');
        }
    }
    //Mezun Karti goruntulenmesi
    public function get_mezunKartim(){

        if (Session::has('kullanici_adi')) {

            $kullanici_adi = session()->get('kullanici_adi');

            $sorgu = Mezun::where('kullanici_adi', $kullanici_adi)->get()->last();

            return view('frontend.giris.profil.mezunKartim')->with('sorgu', $sorgu);

        }
        else{
            return redirect('/');
        }
    }

    //MezunKarti olusturulmasi
    public function post_mezunKarti(){



            $kullanici_adi = session()->get('kullanici_adi');
            $mezun_kart_id=rand(100000000,999999999);



             Mezun::where('kullanici_adi',$kullanici_adi)->update(['mezun_kart_aktif'=>'1']);
             Mezun::where('kullanici_adi',$kullanici_adi)->update(['mezun_kart_id'=>$mezun_kart_id]);

            return response(['durum' => 'success', 'baslik' => 'Mezun Kartınız Olusturulmustur', 'icerik' => '']);




    }


    //resim islemleri burda yapilir
    public function post_kisiselBilgiler(Request $request)
    {

        $kullanici_adi = session()->get('kullanici_adi');


        if($request->secenek=="1") {


            if (isset($request->image)) {


                $validator = Validator::make($request->all(), [

                    'image' => 'mimes:jpg,jpeg,png,gif',

                ]);

                //Resim uzantili dosyalar yoksa hata mesaji ekrana yazilsin
                if ($validator->fails()) {
                    return response(['durum' => 'error', 'baslik' => 'Bu formatlarda jpg,jpeg,png,gif bir seyler giriniz', 'icerik' => '']);
                }

            }
            $sayi=rand(0,1000000000);


            $logo = Input::file('image');
            $logo_uzanti = Input::file('image')->getClientOriginalExtension();
            $logo_isim = md5($sayi).'.'. $logo_uzanti;

            Storage::disk('uploads')->makeDirectory('img');
            Image::make($logo->getRealPath())->resize(100, 100)->save('uploads/img/' . $logo_isim);

            //yeni resmi guncelleme islemi
            if (isset($request->image)) {

                Mezun::where('kullanici_adi', $kullanici_adi)->update(['resim' => $logo_isim]);

                return response(['durum' => 'success', 'baslik' => 'Resim başarılı sekilde yüklenmiştir', 'icerik' => '']);

            } //eski resmi hidden daki resim ismiyle guncelleme islemi
            else {

                $eski_logo = $request->resim;

                Mezun::where('kullanici_adi', $kullanici_adi)->update(['resim' => $eski_logo]);

                return response(['durum' => 'success', 'baslik' => 'Resim başarılı sekilde yüklenmiştir', 'icerik' => '']);
            }

        }
        else{

            Mezun::where('kullanici_adi',$kullanici_adi)->update(['email'=>$request->email]);
            Mezun::where('kullanici_adi',$kullanici_adi)->update(['is_yeri'=>$request->is_yeri]);
            Mezun::where('kullanici_adi',$kullanici_adi)->update(['telefon'=>$request->telefon]);

            return  response(['durum'=>'success','baslik'=>'Güncellleme islemi başarılı şekilde gerceklesmistir','icerik'=>'']);
        }



    }


     //Kullanicinin  sifre guncelleme islemleri yapilir
    public function post_ayarlar(Request $request){



            $kullanici_adi = session()->get('kullanici_adi');

            $sorgu = Mezun::where('kullanici_adi', $kullanici_adi)->get()->last();

        //Varolan sifre yanlis girilmisse
        if($sorgu->sifre!=md5($request->eskiSifre)){
            return response(['durum'=>'error','baslik'=>'Sifrenizi yanlış girdiniz','icerik'=>'']);
        }
        //Varolan sifre dogruysa
        else{

            //Formada girilen sifreler birbiriyle uyusmuyorsa
            if($request->sifre!=$request->sifre1){
                return response(['durum'=>'error','baslik'=>'Sifreler uyusmamaktadır','icerik'=>'']);
            }
            //Sifreler birbiriyle uyumluysa
            else{

                Mezun::where('id',$sorgu->id)->update(['sifre'=>md5($request->sifre)]);
                return  response(['durum'=>'success','baslik'=>'Sifre basarılı sekilde güncellenmistir','icerik'=>'']);
            }

        }




    }

}
