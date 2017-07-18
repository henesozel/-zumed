<?php

namespace App\Http\Controllers;

use App\Arkadas;
use App\Cv;
use App\Mezun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ArkadasController extends Controller
{
    //Arkadas arama ekrani
    public function get_arkadas_ara(Request $request){

        //Kullanici oturuma giris yapmissa
        if (Session::has('kullanici_adi')) {

            $kullanici_adi = session()->get('kullanici_adi');

            $sorgu = Mezun::where('kullanici_adi', $kullanici_adi)->get()->last();


             $ara=$request->ara;

             //Aktif olan kullanici icin ad ve soyada gore arama sorgusu
             $aramaIslemi = Mezun::where([['ad','like','%'.$ara.'%'],['aktif','1']])->orWhere([['soyad','like','%'.$ara.'%'],['aktif','1']])->get();

            return view('frontend.giris.arkadas.arkadas_ara',compact('sorgu','ara','aramaIslemi'));

        }
        //Kullanici oturuma giris yapmamissa
        else{
            return redirect('/');
        }
    }


    public function get_profil_goruntule($url){
        if (Session::has('kullanici_adi')) {
            $kullanici_adi = session()->get('kullanici_adi');
            $mezunSorgu=Mezun::where('kullanici_adi',$kullanici_adi)->get()->first();
            $sorgu = Mezun::where('kullanici_adi', $url)->get()->first();
            $cvSorgu=Cv::where('mezun_id',$sorgu->id)->get()->first();
            $arkadas=Arkadas::where([['takip_eden',$mezunSorgu->id],['takip_edilen',$sorgu->id]])->orwhere([['takip_edilen',$mezunSorgu->id],['takip_eden',$sorgu->id]])->get()->first();


            return view('frontend.giris.arkadas.profil_goruntule',compact('sorgu','cvSorgu','mezunSorgu','arkadas','url'));

        }
        //Kullanici oturuma giris yapmamissa
        else{
            return redirect('/');
        }

    }

    public function post_profil_goruntule($url,Request $request){

        if (Session::has('kullanici_adi')) {
            if(($_SERVER["REQUEST_METHOD"] == "POST")){

                $mezunSorgu=Mezun::where('kullanici_adi',$url)->get()->first();

                $arkadasTakipEden=Arkadas::where([['takip_eden',$request->id],['takip_edilen',$mezunSorgu->id]])->get()->first();
                $arkadasTakipEdilen=Arkadas::where([['takip_eden',$mezunSorgu->id],['takip_edilen',$request->id]])->get()->first();

                if($arkadasTakipEden || $arkadasTakipEdilen){

                    //echo 'Arkadas İstegi gonderemezsiniz';
                    return back();

                }
                else{
                    $arkadasEkleme=Arkadas::create([
                        'takip_eden' => $request->id,
                        'takip_edilen' => $mezunSorgu->id
                    ]);
                    //Arkadas Ekleme basarili ise
                    if($arkadasEkleme){
                        Session::flash('flash_message','Arkadaslık istegi basarılı şekilde gönderilmistir.');
                        return back();
                    }
                    //Arkadas Ekleme basarisiz ise
                    else{

                    }
                }

            }
            //Post edilmemisse
            else{
                return redirect('/anasayfa');
            }

        }
        //Kullanici oturuma giris yapmamissa
        else{
            return redirect('/');
        }

    }

    public function get_arkadas_onay($url){

        if (Session::has('kullanici_adi')) {


            if(isset($_SERVER['HTTP_REFERER'])){

                 $arkadas=Arkadas::where('id',$url)->update(['onayla'=>'1']);
                 $arkadasSorgu=Arkadas::where('id',$url)->get()->first();

                if($arkadas){

                    $mezunSorgu=Mezun::where('id',$arkadasSorgu->takip_eden)->get()->first();

                    return redirect('/profil/'.$mezunSorgu->kullanici_adi);
                }
                else{
                    echo 'Basarisiz ekleme isteginiz';
                }


            }
            else{

                return redirect('/anasayfa');
            }
        }
        //Kullanici oturuma giris yapmamissa
        else{
            return redirect('/');
        }


    }

    public function get_arkadas_sil($url){

        if (Session::has('kullanici_adi')) {

            //istedigim sayfadan geldiyse
            if(isset($_SERVER['HTTP_REFERER'])){

                $arkadas=Arkadas::where('id',$url)->delete();

                if($arkadas){

                    Session::flash('flash_message','Silme islemi basarılı gerceklesmistir.');

                   return back();
                }
                else{
                    echo 'Basarisiz silme  istegi';
                }


            }
            else{

                return redirect('/anasayfa');
            }
        }
        //Kullanici oturuma giris yapmamissa
        else{
            return redirect('/');
        }
    }


    public function get_arkadas_istekleri(){
        if (Session::has('kullanici_adi')) {

            $kullanici_adi = session()->get('kullanici_adi');
            $mezun=Mezun::where('kullanici_adi',$kullanici_adi)->get()->first();

            $arkadasSorgu=Arkadas::where([['takip_edilen',$mezun->id],['onayla','0']])->get();


            return view('frontend.giris.arkadas.arkadas_istekleri',compact('arkadasSorgu'));



        }
        //Kullanici oturuma giris yapmamissa
        else{
            return redirect('/');
        }
    }

    public function get_arkadas_listele(){

        if (Session::has('kullanici_adi')) {

            $kullanici_adi = session()->get('kullanici_adi');
            $mezun=Mezun::where('kullanici_adi',$kullanici_adi)->get()->first();

            $arkadasSorgu=Arkadas::where([['takip_edilen',$mezun->id],['onayla','1']])->orwhere([['takip_eden',$mezun->id],['onayla','1']])->get();


            return view('frontend.giris.arkadas.arkadas_listele',compact('arkadasSorgu','kullanici_adi'));



        }
        //Kullanici oturuma giris yapmamissa
        else{
            return redirect('/');
        }
    }





}
