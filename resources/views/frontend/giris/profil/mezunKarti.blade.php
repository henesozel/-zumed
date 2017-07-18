@extends('frontend.giris.app')


@section('icerik')


    <div class="right_col" role="main">
        <!-- top tiles -->
        <div class="col-sm-12 col-md-12">
            <div class="well">
                <div class="container">
                    <div class="col-md-12">
                        <div class="form">

                            <form method="post" action="/profil/mezunKarti" id="my_Form">

                                {{ csrf_field() }}


        <br style="clear:both">

        <h3>Mezun ID Kartı</h3>



        <div class="form-group">
            <img src="/resimler/mezun.png" width="450px" height="250px" align="center">
        </div>

        <div class="form-group">
            <br><br>
            <p>
                Sevgili Mezunlarımız,<br>
                Mezun ID Kartı ile kampüsteki tüm imkanlardan yararlanmaya devam edebilirsiniz.
                <br>
                Şimdi birer mezun olarak kampüse bir başka gözle bakmanın zamanı: hocaları ve arkadaşlarınızı ziyaret edin, SGKM etkinliklerini kaçırmayın, kulüplerinizin etkinliklerini takip edin, spor imkânlarından yararlanmaya devam edin.
                <br><br><br><br><br>
            </p>
        </div>


       @if($sorgu->mezun_kart_aktif!=1)

        <div class="form-group">

            <button type="submit" id="submit" name="submit" class="btn btn-primary pull-right">Mezun ID Kart Oluştur</button>

        </div>

       @else

       @endif




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

            $('#my_Form').ajaxForm({



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


