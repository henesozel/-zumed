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

                            <h3>Cv</h3>



                            <div class="x_panel">
                                <div class="x_content">

                                    <table class="table">
                                        <thead>

                                        @if(Session::has('flash_message'))
                                            <div class="alert alert-success"> {!! session('flash_message') !!}</div>
                                        @endif

                                        <tr>
                                            <th>Cv İsmi</th>
                                            <th>Cv Tarihi</th>
                                            <th>Cv Görüntüle</th>
                                            <th>Cv Düzenle</th>
                                            <th>Cv Sil</th>
                                        </tr>
                                        </thead>

                                        <br>

                                        <tbody>

                                        @foreach($sorgu as $gelenBilgi)

                                        <tr>


                                            <td> {{  $gelenBilgi->cv_ad      }}</td>
                                            <td> {{  $gelenBilgi->created_at }}</td>
                                            <td><a class="btn btn-primary" target="_blank" href="/cv/goruntule/{{ $gelenBilgi->id  }}" role="button">Cv Görüntüle</a></td>
                                            <td><a class="btn btn-primary" href="/cv/duzenle/{{ $gelenBilgi->id  }}" role="button">Cv Düzenle</a></td>
                                            <td>
                                                <form id="my_Form" action="/cv/listele" method="post">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="cv_id" value="{{ $gelenBilgi->id }}">
                                                    <input type="submit" role="button" class="btn btn-primary" value="Sil">
                                                </form>


                                            </td>

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


