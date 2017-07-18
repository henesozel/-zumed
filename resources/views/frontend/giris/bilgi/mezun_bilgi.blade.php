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

                        <h3>Mezunlardan Kısa Bilgiler</h3>



                                <section class="row-section">


                                        <div class="col-md-12  row-block">
                                            <ul id="sortable">

                                                @foreach($sorgu as $s)



                                                    @php

                                                    $ms=\App\Mezun::where('id', $s->mezun_id)->get()->first();

                                                    @endphp



                                                    <li><div class="media">
                                                        <div class="media-left align-self-center">

                                                            @if($ms->resim==null)

                                                                <img src="/uploads/img/user.png" alt=""
                                                                     class="rounded-circle">
                                                                <br>
                                                                {{$s->created_at->toDateString()}}

                                                            @else

                                                                <img src="/uploads/img/{{$ms->resim}}" alt=""
                                                                      class="rounded-circle">
                                                                <br>
                                                                {{$s->created_at->toDateString()}}



                                                            @endif

                                                        </div>
                                                        <div class="media-body">
                                                            <h4>{{$ms->ad}}&nbsp; {{$ms->soyad}}<br><br></h4>
                                                            <p>{{ $s->haber }}</p>
                                                        </div>

                                                    </div>
                                                        </li>


                                                @endforeach



                                            </ul>


                                        </div>

                                </section>




                        <hr>


                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<!-- /page content -->

@endsection


@section('css')

    <style type="text/css">


        @import url('https://fonts.googleapis.com/css?family=Kumar+One');
        @import url("//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css");
        .row-section{float:left; width:100%;  /* fallback for old browsers */

        }
        .row-section h2{float:left; width:100%; color:#fff; margin-bottom:30px; font-size: 14px;}
        .row-section h2 span{font-family: 'Kumar One', cursive; display:block; font-size:45px; text-transform:none; margin-bottom:20px; margin-top:30px;}
        .row-section h2 a{color:#d2abce;}
        .row-section .row-block{background:#fff; padding:20px; margin-bottom:50px;}
        .row-section .row-block ul{margin:0; padding:0;}
        .row-section .row-block ul li{list-style:none; margin-bottom:20px;}
        .row-section .row-block ul li:last-child{margin-bottom:0;}
        .row-section .row-block ul li:hover{cursor:grabbing;}
        .row-section .row-block .media{border:1px solid #d5dbdd; padding:5px 20px; border-radius: 5px; box-shadow:0px 2px 1px rgba(0,0,0,0.04); background:#fff;}
        .row-section .media .media-left img{width:75px;}
        .row-section .media .media-body p{padding: 0 15px; font-size:14px;}
        .row-section .media .media-body h4 {color: #6b456a; font-size: 18px; font-weight: 600; margin-bottom: 0; padding-left: 14px; margin-top:12px;}
        .btn-default{background:#6B456A; color:#fff; border-radius:30px; border:none; font-size:16px;}

    </style>


@endsection



@section('js')

<script>
    $( function() {
    $( "#sortable" ).sortable();
    $( "#sortable" ).disableSelection();
    } );
    </script>
    <script	  src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>




@endsection