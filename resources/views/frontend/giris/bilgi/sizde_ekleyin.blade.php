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
                            <div class="form">


                                <form role="form"  action="/bilgi/sizdeEkleyin" method="post" id="my_Form">
                                    <br style="clear:both">
                                    <h3 style="margin-bottom: 25px; text-align: center;">Sizde Ekleyin</h3>



                                    {{ csrf_field() }}

                                    {{ Form::label('Ad') }}
                                    {{ Form::bsText('ad','',$sorgu->ad,['class' => 'form-control','readonly'=>'yes']) }}

                                    {{ Form::label('Soyad') }}
                                    {{ Form::bsText('soyad','',$sorgu->soyad,['class' => 'form-control','readonly'=>'yes']) }}

                                    {{ Form::label('Email') }}
                                    {{ Form::bsEmail('email','',$sorgu->email,['class' => 'form-control','readonly'=>'yes']) }}

                                    {{Form::label('Haber')}}
                                    {{ Form::bsTextArea('haber','Haber','',['class' => 'form-control','maxlength'=>'500']) }}
                                    <span class="help-block"><p id="characterLeft" class="help-block ">En fazla 500 karakter</p></span>

                                    <br>


                                    <button type="submit" id="submit" name="submit" class="btn btn-primary pull-right">Gönder</button>

                                </form>
                            </div>
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
                            location.href = '/bilgi/sizdeEkleyin';
                        }

                    });
                }

            });




        });






    </script>



@endsection