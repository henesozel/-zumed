@extends('frontend.giris.app')

@section('icerik')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">


            </div>
            <div class="clearfix"></div>



            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">

                        <div class="x_content">

                            <form class="form-horizontal form-label-left" action="/odemeSistemi" method="post" >


                                {{ csrf_field() }}


                                <span class="section" align="text-center">Etkinlik Ödeme</span>




                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Kullanıcı Adı
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" value="{{ $mezun->kullanici_adi }}" readonly="yes" type="text"/>
                                </div>
                                    </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Kişi Sayısı <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="number" id="kisi" name="kisiSayisi" required  class="form-control col-md-7 col-xs-12"  onchange="myFunction()">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Ödenecek Miktar<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="miktar" name="tutar" readonly="yes" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                <input type=hidden id="ucret" value="{{ $etkinlik->ucret }}">
                                <input type="hidden" id="toplamKisi" value="{{ $topla }}">
                                <input type="hidden" id="toplam" value="{{ $etkinlik->kisiSayisi }}">
                                <input type="hidden" name="id" value="{{ $etkinlik->id }}">




                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <button id="send" type="submit" class="btn btn-success">Gönder</button>
                                    </div>
                                </div>


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

@endsection


@section('js')

    <script src="/js/jquery.form.min.js"></script>
    <script src="/js/jquery.validate.min.js"></script>

    <script>

        function myFunction() {
            var x = parseInt(document.getElementById("kisi").value);
            var a = parseInt(document.getElementById("toplam").value);
            var t = parseInt(document.getElementById("toplamKisi").value);

              if(parseInt(x)<=0){
                  alert("Kisi sayisi en az 1 olmalıdır");
              }
            else {


                  var toplam = t + x;


                  if (parseInt(toplam) > a) {
                      var b = a - t;

                      alert(b + " kisilik kontenjanımız kalmıstır");
                      x = parseInt(document.getElementById("kisi").value = 0);

                  } else {


                      var sayi = document.getElementById("ucret").value;
                      var sayi1 = document.getElementById("miktar").value = sayi * x;
                  }

              }
        }
    </script>

@endsection
