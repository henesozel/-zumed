<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//LoginController
Route::get('/','LoginController@index');
Route::post('/','LoginController@giris_kontrol');
Route::post('/kayit','LoginController@store');
Route::get('/kayit','LoginController@get_kayit');
Route::get('/sifre-yenile','LoginController@sifre_yenile');
Route::post('/sifre-yenile','LoginController@sifre_yenile_kontrol');

Route::get('/sifre-sifirla/{url}/{hash}','LoginController@sifre_sifirla');
Route::post('/sifre-sifirla/','LoginController@post_sifre_sifirla');



//MailController
Route::get('/welcome','MailController@mail_gonder');



//GirisController
Route::get('/anasayfa','GirisController@index');

//AyarlarController
Route::group(['prefix'=>'profil'],function(){

    Route::get('/ayarlar','AyarlarController@get_ayarlar');
    Route::get('/kisiselBilgiler','AyarlarController@get_kisiselBilgiler');
    Route::get('/mezunKarti','AyarlarController@get_mezunKarti');
    Route::get('/mezunKartim','AyarlarController@get_mezunKartim');
    Route::post('/mezunKarti','AyarlarController@post_mezunKarti');
    Route::post('/kisiselBilgiler','AyarlarController@post_kisiselBilgiler');
    Route::post('/ayarlar','AyarlarController@post_ayarlar');


});

//CvController
Route::group(['prefix'=>'cv'],function(){

    Route::get('/','CvController@get_cv');
    Route::post('/','CvController@post_cv');
    Route::get('/listele','CvController@get_cv_listele');
    Route::get('/duzenle/{url}','CvController@get_cv_duzenle');
    Route::get('/goruntule/{url}','CvController@get_cv_goruntule');
    Route::post('/duzenle/{url}','CvController@post_cv_duzenle');
    Route::post('/listele','CvController@post_cv_sil');



});


//IsController
Route::group(['prefix'=>'isilani'],function(){

    Route::get('/','IsController@get_is_ilani');
    Route::post('/','IsController@post_is_ilani');
    Route::get('/listele','IsController@get_is_ilani_listele');
    Route::get('/listele/{url}','IsController@get_is_ilani_goruntule');

});

//BilgilerController
Route::group(['prefix'=>'bilgi'],function(){

    Route::get('/sizdeEkleyin','BilgilerController@get_sizde_ekleyin');
    Route::post('/sizdeEkleyin','BilgilerController@post_sizde_ekleyin');
    Route::get('/','BilgilerController@index');

});

//EtkinlikController
Route::group(['prefix'=>'etkinlik'],function(){

    Route::get('/','EtkinlikController@get_etkinlik');
    Route::post('/','EtkinlikController@post_etkinlik');
    Route::get('/listele','EtkinlikController@get_listele');
    Route::get('/goruntule/{url}','EtkinlikController@get_goruntule');
    Route::get('/katil/{url}','EtkinlikController@get_etkinlik_katil');
    Route::get('/vazgec/{url}','EtkinlikController@get_etkinlik_vazgec');


});

//OdemeSistemiController
Route::group(['prefix'=>'/'],function(){

    Route::get('/odemeSistemi', 'OdemeSistemiController@get_index');
    Route::post('/odemeSistemi','OdemeSistemiController@post_index');
    Route::get('/odemeYap', 'OdemeSistemiController@get_odeme_yap');
    Route::post('/odemeYap','OdemeSistemiController@post_odeme_yap');
    Route::get('/odemeTamamla', 'OdemeSistemiController@get_odeme_tamamla');
    Route::post('/odemeTamamla','OdemeSistemiController@post_odeme_tamamla');


});


//İletisimController
Route::group(['prefix'=>'iletisim'],function(){

    Route::get('/','İletisimController@get_iletisim');
    Route::post('/','İletisimController@post_iletisim');


});

//ArkadasController
Route::group(['prefix'=>'arkadas'],function(){

    Route::get('/ara','ArkadasController@get_arkadas_ara');
    Route::get('/onay/{url}','ArkadasController@get_arkadas_onay');
    Route::get('/sil/{url}','ArkadasController@get_arkadas_sil');
    Route::get('/istekleri','ArkadasController@get_arkadas_istekleri');
    Route::get('listele','ArkadasController@get_arkadas_listele');

});

   Route::get('/profil/{url}' ,'ArkadasController@get_profil_goruntule');
   Route::post('/profil/{url}','ArkadasController@post_profil_goruntule');

//MesajController
Route::group(['prefix'=>'mesaj'],function(){

    Route::get('/{url}','MesajController@get_mesaj');
    Route::post('/{url}','MesajController@post_mesaj');
    Route::get('/at/{url}','MesajController@get_mesaj_at');
    Route::post('/at/{url}','MesajController@post_mesaj_at');


});


//DuyuruController
Route::get('/duyurular','DuyuruController@get_duyuru');


//CikisController
Route::get('/cikis','CikisController@get_cikis');