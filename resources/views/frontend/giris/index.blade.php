@extends('frontend.giris.app')


@section('icerik')


    <!-- page content -->
    <div class="right_col" role="main">

        <div class="col-md-4">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Duyurular</h2>

                    <div class="clearfix"></div>
                </div>

                @foreach($duyurular as $duyuru)
                    <div class="x_content">
                        <article class="media event">
                            <a class="pull-left date">
                                <p class="month">{{ date('F', strtotime($duyuru->created_at)) }}</p>
                                <p class="day">{{ date('d', strtotime($duyuru->created_at)) }}</p>
                            </a>
                            <div class="media-body">
                                <a class="title" target="_blank" href="/duyurular/">{{ $duyuru->duyuru_adi }}</a>
                                <p>{{  str_limit($duyuru->haber,50)}} </p>
                            </div>
                        </article>
                    </div>
                @endforeach
                <div class="x_title">
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <a href="/duyurular">Tümünü Gör</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Etkinlikler</h2>

                    <div class="clearfix"></div>
                </div>

                @foreach($etkinlikler as $etkinlik)
                <div class="x_content">
                    <article class="media event">
                        <a class="pull-left date">
                            <p class="month">{{ date('F', strtotime($etkinlik->tarih)) }}</p>
                            <p class="day">{{ date('d', strtotime($etkinlik->tarih)) }}</p>
                        </a>
                        <div class="media-body">
                            <a class="title" target="_blank" href="/etkinlik/goruntule/{{$etkinlik->id}}">{{ $etkinlik->baslik }}</a>
                            <p>{{str_limit($etkinlik->etkinlikTanimi,50) }}</p>
                        </div>
                    </article>
                </div>
                @endforeach
                <div class="x_title">
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <a href="/etkinlik/listele">Tümünü Gör</a>
                </div>
            </div>
        </div>


        <div class="col-md-4">
            <div class="x_panel">
                <div class="x_title">
                    <h2>İş İani</h2>

                    <div class="clearfix"></div>
                </div>

                @foreach($isİlani as $is)
                    <div class="x_content">
                        <article class="media event">
                            <a class="pull-left date">
                                <p class="month">{{ date('F', strtotime($is->created_at)) }}</p>
                                <p class="day">{{ date('d', strtotime($is->created_at)) }}</p>
                            </a>
                            <div class="media-body">
                                <a class="title" target="_blank" href="/isilani/listele/{{$is->id}}">{{ $is->baslik }}</a>
                                <p>{{ str_limit($is->calisma_sekli,50) }}</p>
                            </div>
                        </article>
                    </div>
                @endforeach
                <div class="x_title">
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <a href="/isilanic/listele">Tümünü Gör</a>
                </div>
            </div>
        </div>


    </div>
    <!-- /page content -->




@endsection


@section('css')


@endsection



@section('js')


@endsection