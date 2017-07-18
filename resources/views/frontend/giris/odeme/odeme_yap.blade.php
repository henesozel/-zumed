<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        /* Padding - just for asthetics on Bootsnipp.com */
        body { margin-top:80px; }

        /* CSS for Credit Card Payment form */
        .deneme {
            background:white;
            padding: 40px 40px 40px 40px;
            max-width: 400px;
            margin: auto auto auto auto;



        }
        .credit-card-box .panel-title {
            display: inline;
            font-weight: bold;
        }
        .credit-card-box .form-control.error {
            border-color: red;
            outline: 0;
            box-shadow: inset 0 1px 1px rgba(0,0,0,0.075),0 0 8px rgba(255,0,0,0.6);
        }
        .credit-card-box label.error {
            font-weight: bold;
            color: red;
            padding: 2px 8px;
            margin-top: 2px;
        }
        .credit-card-box .payment-errors {
            font-weight: bold;
            color: red;
            padding: 2px 8px;
            margin-top: 2px;
        }
        .credit-card-box label {
            display: block;
        }
        /* The old "center div vertically" hack */
        .credit-card-box .display-table {
            display: table;
        }
        .credit-card-box .display-tr {
            display: table-row;
        }
        .credit-card-box .display-td {
            display: table-cell;
            vertical-align: middle;
            width: 50%;
        }
        /* Just looks nicer */
        .credit-card-box .panel-heading img {
            min-width: 180px;
        }
    </style>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
    <script type="text/javascript">
        $(function(){


            var saniye = 300;
            $.geriyeSay = function(){
                if (saniye > 1){
                    saniye--;
                    $("#navbar strong").text(saniye);
                } else {
                    // yönlendirme işlemi
                    window.location.href = "/anasayfa";
                }
            }
            $("#navbar strong").text(saniye);
            setInterval("$.geriyeSay()", 1000);

        });
    </script>
    <style type="text/css">
        body {margin: auto}
        #navbar {padding: 10px; background: #f6f6f6; border-bottom: 4px solid #ddd; font: 14px Arial}
    </style>
</head>
<body>

<div class="deneme">
    <div class="container">
        <div class="row">
            <!-- You can make it whatever width you want. I'm making it full width
                 on <= small devices and 4/12 page width on >= medium devices -->
            <div class="col-xs-12 col-md-4">

                @php

                   $sayi=rand(0,100000000);



                @endphp


                <!-- CREDIT CARD FORM STARTS HERE -->
                <div class="panel panel-default credit-card-box">
                    <div class="panel-heading display-table" >
                        <div class="row display-tr" >
                            <h3 class="panel-title display-td" >Ödeme Detayları</h3>
                            <div class="display-td" >
                                <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form role="form" id="payment-form" method="POST" action="/odemeTamamla" ovalidate autocomplete="on">
                            <div class="row">
                                {{ csrf_field() }}
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label class="col-md-5">Kart Numarası</label>

                                        <label class="col-md-7">{{ 'XXXX-XXXX-XXXX-'.substr($cardNumber,-4) }}</label>


                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label class="col-md-5">Tutar</label>
                                        <label class="col-md-7">{{ $odenicekMiktar }} TL</label>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label class="col-md-4">Tarih</label>
                                        <label class="col-md-8">{{ date('m/d/Y') }}</label>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label class="col-md-4">Güvenlik Mesajı</label>
                                        <input type="text" class="col-md-8" name="code" />

                                    </div>
                                </div>
                            </div>
                            <div class="row" id="navbar">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label class="col-md-4" >Süre</label>
                                        <label class="col-md-8"><strong></strong></label>

                                    </div>
                                </div>
                            </div>

                            <input type="hidden" value="{{ $sayi }}" name="sifre">
                            <input type="hidden"  name="odenicekMiktar" value="{{ $odenicekMiktar }}">
                            <input type="hidden"  name="id" value="{{ $id }}">
                            <input type="hidden"  name="kisiSayisi" value="{{ $kisiSayisi }}">


                    <div class="row">
                        <div class="col-xs-12">
                            <button class="btn-primary btn-lg btn-block" type="submit">Tamamla</button>
                        </div>
                    </div>
                    <div class="row" style="display:none;">
                        <div class="col-xs-12">
                            <p class="payment-errors"></p>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <!-- CREDIT CARD FORM ENDS HERE -->


        </div>



    </div>
</div>
</div>

</body>
</html>





