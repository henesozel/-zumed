@extends('frontend.giris.app')



@section('icerik')


    <!-- page content -->
    <div class="right_col" role="main">
        <!-- top tiles -->
        <div class="col-sm-12 col-md-12">
            <div class="well">
                <div class="container">
                    <div class="col-md-12">
                        <div>
                            <form  action="/profil/ayarlar" method="post" id="my_Form">
                                <br style="clear:both">
                                <h4 style="margin-bottom: 25px; text-align: left;">Şifre Değiştirme</h4>


                                {{ csrf_field() }}


                                <div class="form-group">
                                    <br>
                                    <label>Kullanıcı Adı</label>
                                    <input type="text" class="form-control" id="ad" value="{{ $s_kullanici_adi }}" readonly="yes">
                                </div>


                                <div class="form-group">
                                    <a href="#" id="deneme">Sifre Değiştir</a>
                                </div>

                                <div class="form-group">
                                    <input style="display:none;" id="gizle" type="password" class="form-control"  name="eskiSifre" placeholder="Eski Şifre" required>
                                </div>
                                <div class="form-group">
                                    <input style="display:none;" id="gizle2" type="password" class="form-control" minlength="8" name="sifre" placeholder="Yeni Şifre"  pattern="\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*" required>
                                </div>
                                <div class="form-group">
                                    <input style="display:none;" id="gizle3" type="password" class="form-control" minlength="8" name="sifre1" placeholder="Yeni Şifre(Tekrar)"  pattern="\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*" required>
                                </div>

                                <button type="submit" id="submit" name="submit" class="btn btn-primary pull-right">Gönder</button>

                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>




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

            $("a").click(function(){
                $("#gizle").fadeIn();
                $("#gizle2").fadeIn();
                $("#gizle3").fadeIn();
            });




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
                            location.href = '/anasayfa';
                        }

                    });
                }

            });


        });






    </script>



@endsection

