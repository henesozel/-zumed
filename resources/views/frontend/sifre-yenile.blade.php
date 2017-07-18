<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>IZUMED</title>


    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

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


    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
    <script src="http://malsup.github.io/min/jquery.form.min.js"></script>

    <script src="/js/sweetalert2.min.js"></script>



</head>

<body class="login">
<div>


    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form action="/sifre-yenile" method="POST" id="my_Form">
                    <h1>Şifreyi Yenile</h1>

                    {{ csrf_field() }}


                    {{ Form::bsEmail('email','Email') }}



                    <div class="row">
                        <div class="text-right">
                            <input type="submit"  value="Şifreyi Yenile" id="btn" class="btn btn-default  pull-right submit">

                        </div>
                    </div>


                </form>
            </section>
        </div>


    </div>
</div>





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
                        location.href = '/sifre-yenile';
                    }
                    else {
                        location.href = '/';
                    }

                });
            }

        });

    });



</script>













</body>
</html>
