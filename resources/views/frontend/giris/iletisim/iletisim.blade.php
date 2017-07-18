@extends('frontend.giris.app')


@section('icerik')


    <div class="right_col" role="main">
        <!-- top tiles -->

        <h3>İletişim</h3>
        <br>
        <div class="row">

           @include('frontend.giris.iletisim.iletisim-ekSayfa')

            <div class="col-lg-8 mb-4">
                <h3>İletişim Formu</h3>
                <br>
                <form  method="post" action="/iletisim" id="my_Form">

                            {{ csrf_field() }}


                            {{ Form::label('Adınız Soyadınız:') }}
                            {{ Form::bsText('ad_soyad','',$ad.' '.$soyad,['class' => 'form-control','readonly'=>'yes']) }}



                            {{Form::label('E-Posta Adresiniz:')}}
                            {{ Form::bsText('email','',$email,['class' => 'form-control','readonly'=>'yes']) }}


                            {{Form::label('Mesaj:')}}
                            {{ Form::bsTextArea('mesaj','Mesaj') }}

                    <br>
                    <button type="submit" class="btn btn-primary">Gönder</button>
                </form>
            </div>
            <br><br>
            <hr>



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

                beforeSubmit:function() {

                    swal({
                        title: '<i class="fa fa-refresh fa-spin fa-3x fa-fw" aria-hidden="true"></i><span class="sr-only">Refreshing...</span>',
                        text: 'Lütfen Bekleyiniz ..',
                        showConfirmButton:false
                    })


                },

                success:function(response) {

                    swal(

                            response.baslik,
                            response.icerik,
                            response.durum

                    ).then(function () {

                        if (response.durum == 'error') {

                        }
                        else {
                            location.href = '/iletisim/';
                        }

                    });
                }

            });




        });






    </script>



@endsection


