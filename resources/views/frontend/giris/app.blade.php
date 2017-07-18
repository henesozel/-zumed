
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>İZUMED</title>

    <!-- Bootstrap -->
    <link href="/frontend/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/frontend/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/frontend/vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="/frontend/build/css/custom.min.css" rel="stylesheet">



    @yield('css')

</head>

<body class="nav-md">

@php
if (\Illuminate\Support\Facades\Session::has('kullanici_adi'))
{



$kullanici_adi=session()->get('kullanici_adi');

$sorgu=\App\Mezun::where('kullanici_adi',$kullanici_adi)->get()->last();

$arkadasSorgu=\App\Arkadas::where([['takip_edilen',$sorgu->id],['onayla','0']])->get();


$mesajSorgu=\App\Mesaj::where([['mesaj_atilan',$sorgu->id],['okundu','0']])->get();


if(isset($mesajSorgu)){
   foreach ($mesajSorgu as $mesaj){
      $dizi[$mesaj->mesaj_atan]=$mesaj;
   }
}







}
@endphp




<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="index.html" class="site_title"><span>İZUMED</span></a>
                </div>

                <div class="clearfix"></div>



                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        @if($sorgu->resim==null)
                            <img src="/uploads/img/user.png" alt="..." class="img-circle profile_img">
                        @else
                            <img src="/uploads/img/{{$sorgu->resim}}" alt="{{ $sorgu->ad.' '.$sorgu->soyad }}" class="img-circle profile_img">
                        @endif

                    </div>
                    <div class="profile_info">
                        <span>Hoşgeldin,</span>
                        <h2>{{ $sorgu->ad }} {{ $sorgu->soyad }}</h2>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- /menu profile quick info -->

                <br />


                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3>İzumed</h3>
                        <ul class="nav side-menu">
                            <li><a href="/anasayfa"><i class="fa fa-home"></i>Anasayfa</a>
                            </li>
                            <li><a><i class="fa fa-user"></i>Profil<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="/profil/ayarlar">Ayarlar</a></li>
                                    <li><a href="/profil/kisiselBilgiler">Kişisel Bilgiler</a></li>
                                    <li><a href="/profil/mezunKarti">Mezun Kartı</a></li>
                                    <li><a href="/profil/mezunKartim" target="_blank">Mezun Kartı Goruntule</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-file-text"></i>Cv<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="/cv/">Cv Oluştur</a></li>
                                    <li><a href="/cv/listele">Cv Listele</a></li>

                                </ul>
                            </li>

                            <li><a><i class="fa fa-users"></i>Arkadaşlar<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="/arkadas/ara">Arkadaş Ara</a></li>
                                    <li><a href="/arkadas/listele">Arkadaş Listele</a></li>
                                    <li><a href="/arkadas/istekleri">Arkadaş İstekleri</a></li>
                                </ul>
                            </li>
                            <li><a href="/mesaj/t"><i class="fa fa-envelope"></i>Mesajlar</a>
                            <li><a><i class="fa fa-list-alt"></i>İş İlanları<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="/isilani">İş İlanı Formu Oluştur</a></li>
                                    <li><a href="/isilani/listele">İş İlanları Listele</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-calendar"></i>Etkinlikler<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="/etkinlik">Etkinlik Formu Oluştur</a></li>
                                    <li><a href="/etkinlik/listele">Etkinlik Listele</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-graduation-cap"></i>Mezunlardan Bilgiler<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="/bilgi/sizdeEkleyin">Sizde Ekleyin</a></li>
                                    <li><a href="/bilgi">Mezunlardan Bilgi</a></li>

                                </ul>
                            </li>
                            <li><a href="/iletisim"><i class="fa fa-envelope"></i>İletişim</a>
                            </li>
                            <li><a href="/cikis"><i class="fa fa-power-off"></i>Çıkış</a>
                            </li>
                        </ul>
                    </div>


                </div>
                <!-- /sidebar menu -->



                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" title="Settings">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Lock">
                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>



                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                @if($sorgu->resim==null)
                                    <img src="/uploads/img/user.png" alt="...">{{ $sorgu->ad.' '.$sorgu->soyad }}
                                @else
                                    <img src="/uploads/img/{{$sorgu->resim}}" alt="{{ $sorgu->ad.' '.$sorgu->soyad }}">{{ $sorgu->ad.' '.$sorgu->soyad }}
                                @endif

                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="/profil/ayarlar"> Profil</a></li>
                                <li><a href="/cikis/"><i class="fa fa-sign-out pull-right"></i> Çıkış</a></li>
                            </ul>
                        </li>

                        <li role="presentation" class="dropdown">


                            <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-envelope-o"></i>
                                @if(!isset($dizi))
                                    <span class="badge bg-green"></span>
                                @else
                                    <span class="badge bg-green">{{ count($dizi) }}</span>
                                @endif
                            </a>
                            <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">

                                @if(isset($dizi))

                                @foreach($dizi as $mesaj)


                                    @php

                                        $sorguMezun=\App\Mezun::where('id',$mesaj->mesaj_atan)->get()->last();


                                    @endphp

                                <li>

                                    <a href="/mesaj/at/{{$sorguMezun->kullanici_adi}}">


                                        <span class="image">
                                             @if($sorguMezun->resim==null)
                                                <img class="img-circle" src="/uploads/img/user.png" alt="{{ $sorguMezun->ad }} {{ $sorguMezun->soyad }}" width="45px" height="45px">
                                            @else
                                                <img class="img-circle" src="/uploads/img/{{$sorguMezun->resim}}" alt="{{ $sorguMezun->ad.' '.$sorguMezun->soyad }}" width="45px" height="45px">
                                            @endif

                                        </span>
                                        <span>
                          <span>{{ $sorguMezun->ad }} {{ $sorguMezun->soyad }}</span>
                          <span class="time">{{$mesaj->created_at}}</span>
                        </span>
                                        <span class="message">
                          {{ $mesaj->mesaj_icerigi }}
                        </span>
                                    </a>
                                </li>


                                @endforeach

                                    @if(isset($dizi))
                                        <li>
                                            <div class="text-center">
                                                <a href="/mesaj/t">
                                                    <strong>Tümünü Gör</strong>
                                                    <i class="fa fa-angle-right"></i>
                                                </a>
                                            </div>
                                        </li>
                                    @endif

                                    @endif
                            </ul>
                        </li>

                        <!-- Arkadas İsteklerinin Bulundugu yer   -->




                        <li role="presentation" class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                <i class="glyphicon glyphicon-user"></i>
                                @if(count($arkadasSorgu)==0)
                                    <span class="badge bg-green"></span>
                                @else
                                    <span class="badge bg-green">{{ count($arkadasSorgu) }}</span>
                                @endif
                            </a>
                            <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">

                                @foreach($arkadasSorgu as $arkadas)

                                    @php

                                        $sorguMezun=\App\Mezun::where('id',$arkadas->takip_eden)->get()->last();


                                    @endphp

                                <li>
                                    <span class="message">
                                    <table class="table table-responsive" height="80px">

                                        <tr>
                                            <td>

                                        <span class="image">
                                             @if($sorguMezun->resim==null)
                                                <img class="img-circle" src="/uploads/img/user.png" alt="{{ $sorguMezun->ad }} {{ $sorguMezun->soyad }}" width="45px" height="45px">
                                            @else
                                                <img class="img-circle" src="/uploads/img/{{$sorguMezun->resim}}" alt="{{ $sorguMezun->ad.' '.$sorguMezun->soyad }}" width="45px" height="45px">
                                            @endif

                                        </span>
                                            </td>
                                            <td>
                                                <span>{{ $sorguMezun->ad }} {{ $sorguMezun->soyad }}</span>
                                            </td>
                                            <td>
                                                <a href="/arkadas/onay/{{ $arkadas->id }}" type="button"  class="btn btn-success">Onayla</a>

                                            </td>

                                            <td>
                                                <a href="/arkadas/sil/{{ $arkadas->id }}" type="button"  class="btn btn-danger">Sil</a>
                                            </td>


                                        </tr>

                                    </table>
                                </span>

                                </li>

                                @endforeach
                                    @if(count($arkadasSorgu)!=0)
                                <li>
                                    <div class="text-center">
                                        <a href="/arkadas/istekleri">
                                            <strong>Tümünü Gör</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </li>
                                    @endif
                            </ul>
                        </li>








                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->

        @yield('icerik')


        <!-- footer content -->
        <footer>
            <div class="pull-right">
                <a href="/anasayfa">IZUMED</a>
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>

<!-- jQuery -->





<script src="/frontend/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->


<script src="/frontend/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="/frontend/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="/frontend/vendors/nprogress/nprogress.js"></script>

<!-- Custom Theme Scripts -->
<script src="/frontend/build/js/custom.min.js"></script>
@yield('js')



</body>
</html>



