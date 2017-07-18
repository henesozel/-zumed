@extends('frontend.giris.app')


@section('icerik')


    <!-- page content -->
    <div class="right_col" role="main">

        <div class="col-md-12">
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
                                <a class="title" target="_blank" href="/duyurular/}">{{ $duyuru->duyuru_adi }}</a>
                                <p>{{ $duyuru->haber }}</p>
                            </div>
                        </article>
                    </div>
                @endforeach

            </div>
        </div>

    </div>








@endsection


@section('css')


@endsection



@section('js')


@endsection