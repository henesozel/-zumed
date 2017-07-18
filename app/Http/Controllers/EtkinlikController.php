<?php

namespace App\Http\Controllers;

use App\EtkinlikOdeme;
use Barryvdh\DomPDF\Facade as PDF;
use App\Etkinlik;
use App\Mezun;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class EtkinlikController extends Controller
{
    //etkinlikFormu sayfasi
    public function get_etkinlik(){

        if (Session::has('kullanici_adi')) {

        return view('frontend.giris.etkinlik.etkinlik');

        }
        else{
            return redirect('/');
        }
    }
    //etkinlik kayit islemi yapilir
    public function post_etkinlik(Request $request){


        $kullanici_adi = session()->get('kullanici_adi');
        $sorgu = Mezun::where('kullanici_adi', $kullanici_adi)->get()->last();


        try {

            if (isset($request->resim)) {


                $validator = Validator::make($request->all(), [

                    'resim' => 'mimes:jpg,jpeg,png,gif',

                ]);

                //Resim uzantili dosyalar yoksa hata mesaji ekrana yazilsin
                if ($validator->fails()) {
                    return response(['durum' => 'error', 'baslik' => 'Bu formatlarda jpg,jpeg,png,gif bir seyler giriniz', 'icerik' => '']);
                }

                $sayi = rand(0, 1000000000);


                $logo = Input::file('resim');
                $logo_uzanti = Input::file('resim')->getClientOriginalExtension();
                $logo_isim = md5($sayi) . '.' . $logo_uzanti;
                Storage::disk('uploads')->makeDirectory('img');
                Image::make($logo->getRealPath())->resize(100, 100)->save('uploads/img/' . $logo_isim);

                //Veritabanina kayit icin tarih formati degistirilir
                $date = Carbon::createFromFormat('m/d/Y', $request->tarih);


                //Etkinlik tablosuna veriler kaydediliyor
                Etkinlik::create([

                    'mezun_id' => $sorgu->id,
                    'baslik' => $request->baslik,
                    'resim' => $request->resim,
                    'kisiSayisi' => $request->kisiSayisi,
                    'etkinlikTanimi' => $request->etkinlikTanimi,
                    'ucret' => $request->ucret,
                    'tarih' => $date



                ]);


                return response(['durum' => 'success', 'baslik' => 'Basarılı sekilde olusturulmustur', 'icerik' => '']);

            }
        }
        catch (\Exception $e){

            return response(['durum'=>'error','baslik'=>'Basarisiz','icerik'=>'Kayit Basarisiz']);

        }


    }

    //etkinlikleri listeleme
    public function get_listele(){

            if (Session::has('kullanici_adi')) {

                $kullanici_adi = session()->get('kullanici_adi');
                $sorgu=Etkinlik::where('onayla','1')->get();


              $etkinlikOdeme=EtkinlikOdeme::where('kullanici_adi',$kullanici_adi)->get();

            return view('frontend.giris.etkinlik.etkinlik_listele',compact('sorgu','etkinlikOdeme','kullanici_adi'));

          }
        else{
            return redirect('/');
        }
    }

    //etkinlikleri listeleme
    public function get_goruntule($url){

        if (Session::has('kullanici_adi')) {

            $sorgu=Etkinlik::where('id',$url)->get()->first();

            if($sorgu){

                $pdf = PDF::loadView('frontend.giris.etkinlik.etkinlik_goruntule', compact('sorgu'));
                return $pdf->stream('etkinlik.pdf');
            }
            else{
                echo 'hata';
            }
        }
        else{
            return redirect('/');
        }

    }

    //etkinliklere katilma islemi yapilir
    public function get_etkinlik_katil($url){

        if (Session::has('kullanici_adi')) {

            //Sessionla kullanici_adi alinir
            $kullanici_adi = session()->get('kullanici_adi');

            //Onay 1 ucret 0 dan farklıysa etkinlik sorgusu
            $etkinlik=Etkinlik::where([['id',$url],['onayla','1'],['ucret','!=','0']])->get()->first();

            //Sisteme giris yapan kisinin sorgusu icin
            $mezun=Mezun::where('kullanici_adi',$kullanici_adi)->get()->first();

            //Etkinlik Odeme taplosunda kac kisi var
            $say=EtkinlikOdeme::where([['kisiSayisi','!=','0'],['etkinlik_id',$url]])->get();

            //Etkinlik odeme kontrol icin sorgu
            $kontrolKayit=EtkinlikOdeme::where([['etkinlik_id',$url],['kullanici_adi',$kullanici_adi]])->get()->last();

            //Etkinlik ucreti icin sorgu
            $sorgu=Etkinlik::where('id',$url)->get()->first();



                $topla = 0;

                foreach ($say as $s) {

                    $topla = $topla + $s->kisiSayisi;

                }

                //Ucretli etkinlikler icin
                if ($etkinlik) {

                    //etkinlik odememe kayit yoksa islemleri yap
                    if(!$kontrolKayit){
                        return view('frontend.giris.etkinlik.etkinlik_katil', compact('etkinlik', 'mezun', 'topla'));
                    }
                    //etkinlige zaten katilmissin
                    else{
                        echo 'Etkinlige zaten katılmıssınız';
                        return Redirect::back();
                    }
                }//Ucretsiz etkinlikler icin
                else {


                    if(($topla+1)<=$sorgu->kisiSayisi){

                        //Ucretsiz etkinlige katilmamissa
                        if(!$kontrolKayit){
                            EtkinlikOdeme::create(['etkinlik_id'=>$url,'kullanici_adi'=>$kullanici_adi,'odenicekMiktar'=>'0','kisiSayisi'=>'1']);
                            Etkinlik::where('id',$url)->update(['gorunum'=>'1']);
                            Session::flash('flash_message','Etkinlige katılma isleminiz basarılı bir sekilde  gerceklesmistir.');
                            return Redirect::back();
                        }
                        //Ucretsiz Etkinlige katilmissa izin yok
                        else{
                            echo 'Etkinlige zaten katılmıssınız';
                            return Redirect::back();
                        }

                    }
                    else{
                        echo 'Yer yok';
                    }



                }




        }
        else{
            return redirect('/');
        }
    }

    //Etkinlige katilma isleminden vazgecme islemi
    public function get_etkinlik_vazgec($url){

        if (Session::has('kullanici_adi')) {

            //Etkinlik Odemeden etkinlik siliniyor
            EtkinlikOdeme::where('etkinlik_id', $url)->delete();
            //Etkinlik tablosundaki gorunum 0 olarak guncelleniyor
            Etkinlik::where('id',$url)->update(['gorunum'=>'0']);

            //Ekrana mesaj yazisi
            Session::flash('flash_message','Etkinlige katılmaktan vazgectiniz.');


            return Redirect::back();

        }
        else{
            return redirect('/');
        }
    }


}
