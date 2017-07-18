<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>IZUMED</title>



    <!-- Bootstrap -->
    <link href="frontend/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/frontend/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/frontend/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="/frontend/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="/frontend/build/css/custom.min.css" rel="stylesheet">

    <link rel="stylesheet" href="/css/sweetalert2.min.css"/>



    <!-- Benim Eklediklerim -->

    <script src="/js/jquery.form.min.js"></script>
    <script src="/js/jquery.validate.min.js"></script>
    <script src="/js/messages_tr.min.js"></script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
    <script src="http://malsup.github.com/jquery.form.js"></script>
    <script src="/js/sweetalert2.min.js"></script>





</head>

<body class="login">
<div>



    <div class="login_wrapper">
        <div class="animate form login_form">
            <br><br>


            <section class="login_content">


                <form  id="my_Form" method="POST" action="/kayit" data-parsley-validate class="form-horizontal form-label-left">
                    <h1>Kayıt Ol</h1>



                    {{ csrf_field() }}

                    {{ Form::bsText('kullanici_adi','Kullanıcı Adı') }}
                    {{ Form::bsPassword('sifre',['class' => 'form-control','placeholder'=>'Sifre','required'=>'required']) }}
                    {{ Form::bsText('ad','Ad') }}
                    {{ Form::bsText('soyad','Soyad') }}
                    {{ Form::bsEmail('email','Email') }}
                    {{ Form::bsText('bolum','Bölüm') }}

                    <div class="field-wrap">

                        <select class="input-large form-control" name="cinsiyet">

                            <option value="Erkek" selected="selected">Erkek</option>
                            <option value="Bayan">Bayan</option>

                        </select>

                    </div>

                    <br>



                    {{ Form::bsText('mezun_yili','Mezun Yılı') }}
                    {{ Form::bsText('telefon','Telefon') }}


                    <div class="col-sm-6 col-sm-offset-3">
                        <input type="submit" align="center" value="Kayıt Ol" class="btn btn-default submit">
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">Zaten üye misin ?
                            <a href="/" class="to_register">Giriş Yap</a>
                        </p>

                        <div class="clearfix"></div>
                        <br />


                    </div>
                </form>
            </section>
        </div>


    </div>
</div>


    <!--Benim ekledigim   -->

    <!--End -->






    <script type="text/javascript">

            $(document).ready(function(){


                $('#my_Form').ajaxForm({


                    beforeSubmit:function() {

                    },

                    success:function(response) {

                        swal(

                                response.baslik,
                                response.icerik,
                                response.durum
                        ).then(function() {
                            location.href = '/';
                        });

                    }

                });

            });



   </script>


<!--Benim ekledigim   -->

    <!--End -->





</body>
</html>

