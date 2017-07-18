@extends('frontend.giris.app')

@section('icerik')



    <!-- page content -->
    <div class="right_col" role="main">
        <!-- top tiles -->
        <div class="col-sm-12 col-md-12">
            <div class="well">
                <div class="container">
                    <div class="col-md-12">
                        <div class="form">

                            <h3>Etkinlik</h3>



                            <div class="x_panel">
                                <div class="x_content">



                                    @if(Session::has('flash_message'))
                                        <div class="alert alert-success"> {!! session('flash_message') !!}</div>
                                    @endif

                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Etkinlik İsmi</th>
                                            <th>Etkinlik Tarihi</th>
                                            <th>Etkinlik Görüntüle</th>
                                            <th>Etkinlik Katıl</th>
                                            <th>Etkinlik Katılmaktan Vazgec</th>
                                        </tr>
                                        </thead>

                                        <br>


                                        <tbody>

                                        @foreach($sorgu as $s)




                                        <tr>


                                            <td>{{ $s->baslik }}</td>
                                            <td>{{ $s->tarih }}</td>

                                                    <td><a class="btn btn-primary"  target="_blank" href="/etkinlik/goruntule/{{ $s->id }}" role="button">Etkinlik Görüntüle</a></td>

                                            @if($s->gorunum=="1")

                                                <td><a class="btn btn-primary" href="" role="button" disabled>Etkinlik Katıl</a></td>

                                                <td><a class="btn btn-primary" href="/etkinlik/vazgec/{{ $s->id }}" role="button">Etkinlik Katılmaktan Vazgec</a></td>


                                            @else

                                                <td><a class="btn btn-primary" href="/etkinlik/katil/{{ $s->id }}" role="button">Etkinlik Katıl</a></td>

                                                <td><a class="btn btn-primary" href="" role="button" disabled>Etkinlik Katılmaktan Vazgec</a></td>


                                            @endif





                                        </tr>




                                            @endforeach

                                        </tbody>


                                    </table>




                            </div>
                        </div>





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

    <script type="text/javascript">

        $(document).ready(function() {

            $('div.alert').delay(3000).slideUp(300);

        });

    </script>


@endsection