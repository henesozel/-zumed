@extends('frontend.giris.app')


@section('icerik')

    <div class="right_col" role="main">
        <div class="row">


            @foreach ($arkadasSorgu as $arkadas)

                @php
                    $mezunSorgu=\App\Mezun::where('id',$arkadas->takip_eden)->orwhere('id',$arkadas->takip_edilen)->get();
                @endphp

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">


                        @foreach($mezunSorgu as $mezun)


                               @if($mezun->kullanici_adi!=$kullanici_adi)



                            <div class="x_content">
                                <div class="col-md-4 col-sm-4 col-xs-12 profile_left">
                                    <div class="profile_img">
                                        <div id="crop-avatar">
                                            <!-- Current avatar -->

                                            @if($mezun->resim==null)
                                                <img class="img-responsive avatar-view" src="/uploads/img/user.png" alt="{{ $mezun->ad }} {{ $mezun->soyad }}" width="100px" height="100px">
                                            @else
                                                <img class="img-responsive avatar-view" src="/uploads/img/{{$mezun->resim}}" alt="{{ $mezun->ad.' '.$mezun->soyad }}" width="100px" height="100px">
                                            @endif


                                        </div>
                                    </div>
                                    <a href="/profil/{{$mezun->kullanici_adi}}"><h3>{{ $mezun->ad }} {{ $mezun->soyad }}</h3></a>

                                    <ul class="list-unstyled user_data">
                                        <li><i class="fa fa-envelope user-profile-icon"></i> {{ $mezun->email }}
                                        </li>

                                        <li>
                                            <i class="fa fa-briefcase user-profile-icon"></i> {{ $mezun->is_yeri }}
                                        </li>
                                        <li>
                                            <a href="/arkadas/sil/{{ $arkadas->id }}" type="button"  class="btn btn-primary">Arkadaşlıktan Çıkar</a>
                                            <a href="/mesaj/at/{{ $mezun->kullanici_adi }}" type="button"  class="btn btn-primary">Mesaj At</a>
                                        </li>

                                    </ul>




                                </div>








                            </div>
                    </div>
                </div>



              @endif
            @endforeach
            @endforeach








        </div>
    </div>




@endsection



@section('css')

@endsection


@section('js')

@endsection