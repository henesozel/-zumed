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
                            <form action="/cv/" enctype="multipart/form-data" method="post" id="my_Form">
                                <br style="clear:both">
                                <h3 style="margin-bottom: 25px; text-align: center;">Cv Oluştur</h3>

                                <div class="form-group">
                                    <label>&nbsp;Resim</label>
                                    Gözat… <input type="file" id="imgInp" class="form-control"  name="resim" required>
                                </div>

                                {{ csrf_field() }}


                                {{Form::label('Ad')}}
                                {{ Form::bsText('ad','',$sorgu->ad,['class' => 'form-control','readonly'=>'yes']) }}


                                {{Form::label('Soyad')}}
                                {{ Form::bsText('soyad','',$sorgu->soyad,['class' => 'form-control','readonly'=>'yes']) }}


                                {{Form::label('Email')}}
                                {{ Form::bsText('email','',$sorgu->email,['class' => 'form-control','readonly'=>'yes']) }}



                                {{Form::label('Telefon')}}
                                {{ Form::bsText('telefon','',$sorgu->telefon,['class' => 'form-control','readonly'=>'yes']) }}


                                   {{Form::label('Cv Adı')}}
                                   {{ Form::bsText('cv_ad','Cv Adı') }}

                                   {{Form::label('Egitim Bilgileri')}}
                                   {{ Form::bsTextArea('egitim_bilgileri','Egitim Bilgileri') }}

                                   {{Form::label('Yabancı Dil')}}
                                   {{ Form::bsText('yabanci_dil','Yabancı Dil') }}

                                   {{Form::label('Kişisel Bilgiler')}}
                                   {{ Form::bsTextArea('kisisel_bilgiler','Kişisel Bilgiler') }}

                                    {{Form::label('Bilgisayar Bilgisi')}}
                                    {{ Form::bsTextArea('bilgisayar_bilgisi','Bilgisayar Bilgisi') }}

                                    {{Form::label('Sertifikalar')}}
                                    {{ Form::bsTextArea('sertifikalar','Sertifikalar') }}

                                   {{Form::label('Referanslar')}}
                                   {{ Form::bsTextArea('referanslar','Referanslar') }}

                                   {{Form::label('Kariyer Hedefi')}}
                                   {{ Form::bsTextArea('kariyer_hedefi','Kariyer Hedefi') }}

                                   {{Form::label('Çalışılmak İstenilen Alanlar')}}
                                   {{ Form::bsTextArea('alanlar','Çalışılmak İstenilen Alanlar') }}


                                     <br>
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


