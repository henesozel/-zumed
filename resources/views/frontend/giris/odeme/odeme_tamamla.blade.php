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


                <!-- CREDIT CARD FORM STARTS HERE -->
                <div class="panel panel-default credit-card-box">
                    <div class="panel-heading display-table" >
                        <div class="row display-tr" >
                            <h3 class="panel-title display-td">Etkinlik Ödeme Detayları</h3>
                            <div class="display-td" >

                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                            <div class="row">
                                {{ csrf_field() }}

                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label class="col-md-12" style="color:green"><h3>&nbsp;&nbsp;Ödeme Tamamlandı</h3></label>


                                        </div>
                                    </div>
                                </div>


                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label class="col-md-5">Etkinlik  Numarası</label>

                                        <label class="col-md-7">{{ $etkinlik_no }}</label>


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
                                        <label class="col-md-8">{{ $tarih }}</label>

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-10">
                                    <br><br><br>
                                    &nbsp;&nbsp;<a class="btn btn-primary" href="/anasayfa" role="button">AnaSayfaya Geri Dön</a>
                                </div>
                            </div>

                    </div>
                </div>
                <!-- CREDIT CARD FORM ENDS HERE -->


            </div>



        </div>
    </div>
</div>

</body>
</html>







