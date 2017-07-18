@extends('frontend.giris.app')


@section('icerik')



    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Arkadas Ara</h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="input-group">
                            <form action="/arkadas/ara" method="GET">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="ara">
                                    <span class="input-group-btn">
                          <button class="btn btn-default" type="submit">Ara</button>
                          </span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_content">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                                    <ul class="pagination pagination-split">
                                    </ul>
                                </div>



                                <div class="clearfix"></div>



                              <!-- Kullanici aranicak kelime girmisse  --!>
                                @if(!$ara==''||!$ara==null)

                                @foreach($aramaIslemi as $arama)

                                    <!-- Kullanicinin kullanici adi karsilastirilir -->
                                    @if($arama->kullanici_adi==$sorgu->kullanici_adi)

                                    @else
                                      <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                                          <div class="well profile_view">
                                              <div class="col-sm-12">
                                                  <h4 class="brief"><i></i></h4>
                                                  <div class="left col-xs-7">
                                                      <h2>{{ $arama->ad }} {{ $arama->soyad }}</h2>
                                                      <p><strong>Hakkında: </strong> {{ $arama->is_yeri }} </p>
                                                      <ul class="list-unstyled">
                                                          <li><i class="fa  fa-envelope"></i> Mail Adresi: {{ $arama->email }} </li>
                                                      </ul>
                                                  </div>
                                                  <div class="right col-xs-5 text-center">
                                                      @if($arama->resim==null)
                                                          <img src="/uploads/img/user.png" alt="..."  class="img-circle img-responsive">
                                                      @else
                                                          <img src="/uploads/img/{{$arama->resim}}" alt="{{ $arama->ad.' '.$arama->soyad }}"  class="img-circle img-responsive">
                                                      @endif
                                                  </div>
                                              </div>
                                              <div class="col-xs-12 bottom text-center">
                                                  <div class="col-xs-12 col-sm-6 emphasis">
                                                      <p class="ratings">
                                                          <a>4.0</a>
                                                          <a href="#"><span class="fa fa-star"></span></a>
                                                          <a href="#"><span class="fa fa-star"></span></a>
                                                          <a href="#"><span class="fa fa-star"></span></a>
                                                          <a href="#"><span class="fa fa-star"></span></a>
                                                          <a href="#"><span class="fa fa-star-o"></span></a>
                                                      </p>
                                                  </div>
                                                  <div class="col-xs-12 col-sm-6 emphasis">

                                                      <a  href="/profil/{{ $arama->kullanici_adi }}" type="button" class="btn btn-primary btn-xs">
                                                          <i class="fa fa-user"></i>   Profilini Görüntüle
                                                      </a>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                    @endif


                                @endforeach

                                <!-- Kullanici aranicak kelime girmemisse  -->

                                @else

                                <!-- Sonuc Yok  -->
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->


















@endsection

@section('js')


@endsection


@section('css')

@endsection