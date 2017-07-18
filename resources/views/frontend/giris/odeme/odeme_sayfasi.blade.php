@extends('frontend.giris.odeme.app')

@section('icerik')
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
                            <h3 class="panel-title display-td" >Ödeme Detayları</h3>
                            <div class="display-td" >
                                <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form role="form" id="payment-form" method="POST" action="/odemeYap" ovalidate autocomplete="on">
                            <div class="row">
                                <div class="col-xs-12">

                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="cardNumber">Kart Numarası</label>
                                        <div class="input-group">
                                            <input
                                                    type="tel"
                                                    class="form-control"
                                                    name="cardNumber"
                                                    placeholder="Kart Numarası"
                                                    autocomplete="cc-number"
                                                    required autofocus
                                            />
                                            <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="couponCode">Kart Sahibinin Adı ve Soyadı</label>
                                        <input type="text" class="form-control" name="couponCode"
                                               placeholder="Kart Sahibinin Adı ve Soyadı"
                                               autocomplete="cc-cd"
                                               required />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-7 col-md-7">
                                    <div class="form-group">
                                        <label for="cardExpiry"><span class="hidden-xs">Son Kullanma Tarihi</span><span class="visible-xs-inline"></span></label>
                                        <input
                                                type="tel"
                                                class="form-control"
                                                name="cardExpiry"
                                                placeholder="MM / YYYY"
                                                autocomplete="cc-exp"
                                                required
                                        />
                                    </div>
                                </div>
                                <div class="col-xs-5 col-md-5 pull-right">
                                    <div class="form-group">
                                        <label for="cardCVC">CV CODE</label>
                                        <input
                                                type="tel"
                                                class="form-control"
                                                name="cardCVC"
                                                placeholder="CVC"
                                                autocomplete="cc-csc"
                                                required
                                        />
                                    </div>
                                </div>
                            </div>

                            <input type="hidden"  name="odenicekMiktar" value="{{ $odenicekMiktar }}">
                            <input type="hidden"  name="id" value="{{ $id }}">
                            <input type="hidden"  name="kisiSayisi" value="{{ $kisiSayisi }}">

                            <div class="row">
                                <div class="col-xs-12">
                                    <button class="btn-primary btn-lg btn-block" type="submit">Ödeme Yap</button>
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
@endsection

@section('css')

@endsection

@section('js')

@endsection