<?php

namespace App\Http\Controllers;

use App\Cv;
use App\Mezun;

use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class CvController extends Controller
{

    //Cv listeleme ekrani
    public function get_cv_listele(){


        if (Session::has('kullanici_adi')) {

            $kullanici_adi = session()->get('kullanici_adi');

            $sorgu = Mezun::where('kullanici_adi', $kullanici_adi)->get()->last();

            $cv_sorgula=Cv::where('mezun_id', $sorgu->id)->get();

            return view('frontend.giris.cv.cv_listele')->with('sorgu',$cv_sorgula);

        }
        else{
            return redirect('/');
        }
    }

    //Cv duzenleme ekrani
    public function get_cv_duzenle($url){

        $kullanici_adi = session()->get('kullanici_adi');

        $mezunSorgu = Mezun::where('kullanici_adi', $kullanici_adi)->get()->last();

        $sorgu = Cv::where('id', $url)->get()->last();

        return view('frontend.giris.cv.cv_duzenle')->with('sorgu', $sorgu)->with('kullanici_adi',$mezunSorgu);

    }

    //Cv goruntuleme ekrani
    public function get_cv_goruntule($url){

        $kullanici_adi = session()->get('kullanici_adi');

        $mezunSorgu = Mezun::where('kullanici_adi', $kullanici_adi)->get()->last();
        $sorgu = Cv::where('id', $url)->get()->last();


        $pdf = PDF::loadView('frontend.giris.cv.cv_goruntule', compact('sorgu','mezunSorgu'));
        return $pdf->stream('ornek.pdf');



    }



   //Cv form ekrani
    public function get_cv(){


        if (Session::has('kullanici_adi')) {

            $kullanici_adi = session()->get('kullanici_adi');

            $sorgu = Mezun::where('kullanici_adi', $kullanici_adi)->get()->last();

            return view('frontend.giris.cv.cv')->with('sorgu', $sorgu);

        }
        else{
            return redirect('/');
        }
    }

    //Cv duzenleme islemleri
    public function post_cv_duzenle(Request $request,$url)
    {


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
            $logo_isim = md5($sayi).'.'. $logo_uzanti;
            Storage::disk('uploads')->makeDirectory('img');
            Image::make($logo->getRealPath())->resize(100, 100)->save('uploads/img/' . $logo_isim);

        }

        try {

            unset($request['_token']);

            if(isset($request->resim)){

                Cv::where('id',$url)->update(['resim'=>$logo_isim,
                    'cv_ad'=>$request->cv_ad,
                    'egitim_bilgileri'=>$request->egitim_bilgileri,
                    'yabanci_dil'=>$request->yabanci_dil,
                    'kisisel_bilgiler'=>$request->kisisel_bilgiler,
                    'bilgisayar_bilgisi'=>$request->bilgisayar_bilgisi,
                    'sertifikalar'=>$request->sertifikalar,
                    'referanslar'=>$request->referanslar,
                    'kariyer_hedefi'=>$request->kariyer_hedefi,
                    'alanlar'=>$request->alanlar

                ]);

            }
            else{

                $eski_resim=$request->gizli_resim;



                Cv::where('id',$url)->update(['resim'=>$eski_resim,
                    'cv_ad'=>$request->cv_ad,
                    'egitim_bilgileri'=>$request->egitim_bilgileri,
                    'yabanci_dil'=>$request->yabanci_dil,
                    'kisisel_bilgiler'=>$request->kisisel_bilgiler,
                    'bilgisayar_bilgisi'=>$request->bilgisayar_bilgisi,
                    'sertifikalar'=>$request->sertifikalar,
                    'referanslar'=>$request->referanslar,
                    'kariyer_hedefi'=>$request->kariyer_hedefi,
                    'alanlar'=>$request->alanlar

                ]);
            }


            return response(['durum'=>'success','baslik'=>'Basarili','icerik'=>'Kayit Basarili']);


        } catch (\Exception $e) {

            return response(['durum'=>'error','baslik'=>'Basarisiz','icerik'=>'Kayit Basarisiz']);

        }



    }

    //Cv ekleme islemi
    public function post_cv(Request $request){

            $kullanici_adi = session()->get('kullanici_adi');
            $sorgu = Mezun::where('kullanici_adi', $kullanici_adi)->get()->last();


        if (isset($request->resim)) {


            $validator = Validator::make($request->all(), [

                'resim' => 'mimes:jpg,jpeg,png,gif',

            ]);

            //Resim uzantili dosyalar yoksa hata mesaji ekrana yazilsin
            if ($validator->fails()) {
                return response(['durum' => 'error', 'baslik' => 'Bu formatlarda jpg,jpeg,png,gif bir seyler giriniz', 'icerik' => '']);
            }

            $sayi=rand(0,1000000000);



            $logo = Input::file('resim');
            $logo_uzanti = Input::file('resim')->getClientOriginalExtension();
            $logo_isim = md5($sayi).'.'. $logo_uzanti;
            Storage::disk('uploads')->makeDirectory('img');
            Image::make($logo->getRealPath())->resize(100, 100)->save('uploads/img/' . $logo_isim);


            Cv::create([

                'mezun_id' => $sorgu->id,
                'yabanci_dil' => $request->yabanci_dil,
                'kisisel_bilgiler' => $request->kisisel_bilgiler,
                'egitim_bilgileri' => $request->egitim_bilgileri,
                'bilgisayar_bilgisi' => $request->bilgisayar_bilgisi,
                'sertifikalar' => $request->sertifikalar,
                'referanslar' => $request->referanslar,
                'kariyer_hedefi' => $request->kariyer_hedefi,
                'alanlar' => $request->alanlar,
                'resim' => $request->resim,
                'cv_ad' => $request->cv_ad

            ]);


            return response(['durum' => 'success', 'baslik' => 'Cv basarılı sekilde olusturulmustur', 'icerik' => '']);

        }


    }

    //Cv silme islemi
    public function post_cv_sil(Request $request){

        try{

            Cv::where('id', $request->cv_id)->delete();

            Session::flash('flash_message','Silme islemi basarılı gerceklesmistir.');


            return Redirect::back();

        }
        catch (\Exception $e){

        }


    }


}
