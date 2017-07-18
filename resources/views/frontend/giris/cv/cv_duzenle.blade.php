@extends('frontend.giris.app')


@section('icerik')




    <!-- page content -->
    <div class="right_col" role="main">
        <!-- top tiles -->
        <div class="col-sm-12 col-md-12">
            <div class="well">
                <div class="container">
                    <div class="col-md-12">
                        <div class="form">
                            <form action="/cv/duzenle/{{ $sorgu->id }}" enctype="multipart/form-data" method="post" id="my_Form">
                                <br style="clear:both">
                                <h3 style="margin-bottom: 25px; text-align: center;">Cv Düzenle</h3>

                                <div class="form-group">
                                    <label>&nbsp;Resim</label>
                                    Gözat… <input type="file" id="imgInp" class="form-control"  name="resim">
                                    <br>
                                    <label> Resim Yolu</label>
                                    <br>
                                    <input type="text" name="gizli_resim" value="{{ $sorgu->resim }}" class="form-control" readonly="yes">

                                </div>

                                {{ csrf_field() }}



                                    {{Form::label('Ad')}}
                                    {{ Form::bsText('ad','',$kullanici_adi->ad,['class' => 'form-control','readonly'=>'yes']) }}


                                    {{Form::label('Soyad')}}
                                    {{ Form::bsText('soyad','',$kullanici_adi->soyad,['class' => 'form-control','readonly'=>'yes']) }}

                                    {{Form::label('Email')}}
                                    {{ Form::bsText('email','',$kullanici_adi->email,['class' => 'form-control','readonly'=>'yes']) }}


                                    {{Form::label('Telefon')}}
                                    {{ Form::bsText('telefon','',$kullanici_adi->telefon,['class' => 'form-control','readonly'=>'yes']) }}


                                    {{Form::label('Cv Adı')}}
                                    {{ Form::bsText('cv_ad','',$sorgu->cv_ad) }}


                                    {{Form::label('Egitim Bilgileri')}}
                                    {{ Form::bsTextArea('egitim_bilgileri','',$sorgu->egitim_bilgileri) }}

                                    {{Form::label('Yabancı Dil')}}
                                    {{ Form::bsText('yabanci_dil','',$sorgu->yabanci_dil) }}

                                    {{Form::label('Kişisel Bilgiler')}}
                                    {{ Form::bsTextArea('kisisel_bilgiler','',$sorgu->kisisel_bilgiler) }}

                                    {{Form::label('Bilgisayar Bilgisi')}}
                                    {{ Form::bsTextArea('bilgisayar_bilgisi','',$sorgu->bilgisayar_bilgisi) }}

                                    {{Form::label('Sertifikalar')}}
                                    {{ Form::bsTextArea('sertifikalar','',$sorgu->sertifikalar) }}

                                    {{Form::label('Referanslar')}}
                                    {{ Form::bsTextArea('referanslar','',$sorgu->referanslar) }}

                                    {{Form::label('Kariyer Hedefi')}}
                                    {{ Form::bsTextArea('kariyer_hedefi','',$sorgu->kariyer_hedefi) }}

                                    {{Form::label('Çalışılmak İstenilen Alanlar')}}
                                    {{ Form::bsTextArea('alanlar','',$sorgu->alanlar) }}



                                 <br><br>
                                <button type="submit" id="submit" name="submit" class="btn btn-primary pull-right">Gönder</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>



    <!-- /page content -->


@endsection


@section('css')

    <link rel="stylesheet" href="/css/sweetalert2.min.css"/>

@endsection


@section('js')

    <script src="/js/jquery.form.min.js"></script>
    <script src="/js/jquery.validate.min.js"></script>
    <script src="/js/messages_tr.min.js"></script>
    <script src="/js/sweetalert2.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){






            $('#my_Form').validate();
            $('#my_Form').ajaxForm({



                success:function(response) {

                    swal(

                            response.baslik,
                            response.icerik,
                            response.durum

                    ).then(function () {

                        if (response.durum == 'error') {

                        }
                        else {
                            location.href = '/cv/listele';
                        }

                    });
                }

            });




        });






    </script>



@endsection


