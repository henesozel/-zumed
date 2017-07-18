@extends('frontend.giris.app')


@section('icerik')

    <div class="right_col" role="main">
        <div class="row">


                @foreach ($arkadasSorgu as $arkadas)

            @php
                $mezunSorgu=\App\Mezun::where('id',$arkadas->takip_eden)->get();
            @endphp

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">

                        @if(Session::has('flash_message'))
                            <div class="alert alert-success"> {!! session('flash_message') !!}</div>
                        @endif


                    @foreach($mezunSorgu as $mezun)






                        <div class="x_content">
                            <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
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
                                <h3>{{ $mezun->ad }} {{ $mezun->soyad }}</h3>

                                <ul class="list-unstyled user_data">
                                    <li><i class="fa fa-envelope user-profile-icon"></i> {{ $mezun->email }}
                                    </li>

                                    <li>
                                        <i class="fa fa-briefcase user-profile-icon"></i> {{ $mezun->is_yeri }}
                                    </li>

                                </ul>








                            </div>



                            <div class="col-md-9 col-sm-9 col-xs-12">

                                <table align="right" width="80px">

                                    <tr>

                                        <td>
                                            <a href="/arkadas/onay/{{ $arkadas->id }}" type="button"  class="btn btn-success">Onayla</a>

                                        </td>

                                        <td>
                                            <a href="/arkadas/sil/{{ $arkadas->id }}" type="button"  class="btn btn-danger">Sil</a>
                                        </td>


                                    </tr>

                                </table>





                            </div>

                        </div>
                    </div>
                </div>




               @endforeach
        @endforeach








         </div>
        </div>
      </div>


    </div>




@endsection



@section('css')

@endsection


@section('js')

@endsection