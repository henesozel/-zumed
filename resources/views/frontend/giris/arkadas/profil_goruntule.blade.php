@extends('frontend.giris.app')


@section('icerik')


    @if($url == $mezunSorgu->kullanici_adi)

        <div class="alert alert-danger">
            <b>Hata</b>
        </div>

    @else



    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Profil</h3>
                </div>


            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">



                        @if(Session::has('flash_message'))
                            <div class="alert alert-success"> {!! session('flash_message') !!}</div>
                        @endif


                        <div class="x_content">
                            <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                                <div class="profile_img">
                                    <div id="crop-avatar">
                                        <!-- Current avatar -->

                                        @if($sorgu->resim==null)
                                            <img class="img-responsive avatar-view" src="/uploads/img/user.png" alt="{{ $sorgu->ad }} {{ $sorgu->soyad }}" width="100px" height="100px">
                                        @else
                                            <img class="img-responsive avatar-view" src="/uploads/img/{{$sorgu->resim}}" alt="{{ $sorgu->ad.' '.$sorgu->soyad }}" width="100px" height="100px">
                                        @endif


                                    </div>
                                </div>
                                <h3>{{ $sorgu->ad }} {{ $sorgu->soyad }}</h3>

                                <ul class="list-unstyled user_data">
                                    <li><i class="fa fa-envelope user-profile-icon"></i> {{ $sorgu->email }}
                                    </li>

                                    <li>
                                        <i class="fa fa-briefcase user-profile-icon"></i> {{ $sorgu->is_yeri }}
                                    </li>

                                </ul>

                                <form action="" method="post">

                                    {{ csrf_field() }}

                                    <input type="hidden" value="{{ $mezunSorgu->id }}" name="id">

                                    @if($arkadas)

                                        @if(($arkadas->takip_eden == $mezunSorgu->id))


                                            @if($arkadas->onayla == "1")
                                                <a href="/arkadas/sil/{{ $arkadas->id }}" type="button"  class="btn btn-primary">Arkadaşlıktan Çıkar</a>
                                            @else
                                                <button type="submit"  class="btn btn-primary"><i class='fa fa-user-plus m-right-xs'></i>  Arkadaşlık İstegi Gönderilmiştir</button>

                                            @endif



                                        @else

                                            @if($arkadas->onayla == "1")
                                                <a href="/arkadas/sil/{{ $arkadas->id }}" type="button"  class="btn btn-primary">Arkadaşlıktan Çıkar</a>

                                            @else


                                                <a href="/arkadas/onay/{{ $arkadas->id }}" type="button"  class="btn btn-success">Onayla</a>
                                                <a href="/arkadas/sil/{{ $arkadas->id }}" type="button"  class="btn btn-danger">Sil</a>

                                            @endif



                                        @endif

                                    @else



                                        <button type="submit"  class="btn btn-primary"><i class='fa fa-user-plus m-right-xs'></i>  Arkadaş Ekle</button>

                                    @endif



                                </form>






                            </div>


                            <!--
                            <div class="col-md-9 col-sm-9 col-xs-12">

                                <div class="profile_title">
                                    <div class="col-md-6">
                                        <h2>Kişisel Bilgiler</h2>
                                    </div>
                                    <div class="col-md-6">
                                    </div>
                                </div>


                            </div>
                            -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

@endsection


@section('css')




@endsection


@section('js')

    <script type="text/javascript">

        $(document).ready(function() {

            $('div.alert').delay(3000).slideUp(300);

        });

    </script>

@endsection