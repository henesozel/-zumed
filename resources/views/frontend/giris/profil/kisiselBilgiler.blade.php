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
                            <br style="clear:both">
                            <h3 style="margin-bottom: 5px; text-align: left;">Kişisel Bilgiler</h3>
                            <br><br>



                            <form method="post" action="/profil/kisiselBilgiler" enctype="multipart/form-data" id="my_Form">
                                <div class="form-group">

                                    {{ csrf_field() }}

                                    @if ($sorgu->resim==null||$sorgu->resim=='')
                                        <img  align="right"  src="http://cdn.kariyer.net/Website/Images/0.jpg" alt="resim" width="100px" height="100px" />
                                        <br><br><br><br><br><br>


                                    @else
                                            <img  align="right"  src="/uploads/img/{{ $sorgu->resim }}" alt="resim2" width="100px" height="100px"/>
                                            <br><br><br><br><br><br>

                                    @endif

                                    <input type="file" id="imgInp" class="pull-right" name="image" required><br><br>
                                    <input type="hidden" name="resim" value="{{ $sorgu->resim }}"><br><br>
                                    <input type="hidden" value="1" name="secenek">

                                    <button type="submit" class="pull-right" >Fotoğraf Değiştir</button>

                                </div>


                            </form>


                            <form  action="/profil/kisiselBilgiler" method="post" id="my_Form_1">

                                {{ csrf_field() }}

                                <div class="form-group">
                                    <br><br>
                                    <input type="hidden" value="0" name="secenek">
                                </div>



                                <div class="form-group">
                                    <label>Ad</label>
                                    {{ Form::bsText('ad','',$sorgu->ad,['class' => 'form-control','readonly'=>'yes']) }}
                                </div>

                                <div class="form-group">
                                    <label>Soyad</label>
                                    {{ Form::bsText('soyad','',$sorgu->soyad,['class' => 'form-control','readonly'=>'yes']) }}
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    {{ Form::bsText('email','',$sorgu->email) }}
                                </div>

                                <div class="form-group">
                                    <label>Cinsiyet</label>
                                    {{ Form::bsText('cinsiyet','',$sorgu->cinsiyet,['class' => 'form-control','readonly'=>'yes']) }}
                                </div>

                                <div class="form-group">
                                    <label>Bölüm</label>
                                    {{ Form::bsText('bolum','',$sorgu->bolum,['class' => 'form-control','readonly'=>'yes']) }}
                                </div>
                                <div class="form-group">
                                    <label>Mezuniyet Yılı</label>
                                    {{ Form::bsText('mezun_yili','',$sorgu->mezun_yili,['class' => 'form-control','readonly'=>'yes']) }}
                                </div>
                                <div class="form-group">
                                    <label>Telefon(+90)</label>
                                    {{ Form::bsText('telefon','',$sorgu->telefon) }}
                                </div>


                                <div class="form-group">
                                    <label>İş Yeri</label>
                                    {{ Form::bsTextArea('is_yeri','',$sorgu->is_yeri) }}
                                    <span class="help-block"><p id="characterLeft" class="help-block "></p></span>
                                </div>





                                    <button type="submit" id="submit" name="submit" class="btn btn-primary pull-right">Düzenle</button>
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
                            location.href = '/profil/kisiselBilgiler';
                        }

                    });
                }

            });
            $('#my_Form_1').ajaxForm({



                success:function(response) {

                    swal(

                            response.baslik,
                            response.icerik,
                            response.durum

                    )
                }

            });



        });






    </script>



@endsection


