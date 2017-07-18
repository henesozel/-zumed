@extends('frontend.giris.app')

@section('icerik')
    <div class="right_col" role="main">






        <div class="container">
            <div class="chat_container">
                <div class="col-sm-3 chat_sidebar">
                    <div class="row">
                        <div id="custom-search-input">
                            <div class="input-group col-md-12">
                                <input type="text" class="  search-query form-control" placeholder="Ara" />
                                <button class="btn btn-danger" type="button">
                                    <span class=" glyphicon glyphicon-search"></span>
                                </button>
                            </div>
                        </div>



                        <div class="dropdown all_conversation">
                            <button class="dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-weixin" aria-hidden="true"></i>
                                Mesajlar
                            </button>

                        </div>


                        <div class="member_list">
                            <ul class="list-unstyled">





                                @foreach ($arkadasSorgu as $arkadas)

                                    @php
                                        $mezunSorgu=\App\Mezun::where('id',$arkadas->takip_eden)->orwhere('id',$arkadas->takip_edilen)->get();
                                    @endphp

                                    @foreach($mezunSorgu as $mezun)


                                        @if($mezun->kullanici_adi!=$kullanici_adi)

                                          <a href="{{ $mezun->kullanici_adi }}">
                                            <li class="left clearfix">
                                                <span class="chat-img pull-left">
                                                    @if($mezun->resim==null)
                                                       <img class="img-circle" src="/uploads/img/user.png" alt="{{ $mezun->ad }} {{ $mezun->soyad }}" width="100px" height="100px">
                                                   @else
                                                       <img class="img-circle" src="/uploads/img/{{$mezun->resim}}" alt="{{ $mezun->ad.' '.$mezun->soyad }}" width="100px" height="100px">
                                                   @endif
                                                </span>
                                                <div class="chat-body clearfix">
                                                    <div class="header_sec">
                                                        <strong class="primary-font">{{ $mezun->ad }} {{ $mezun->soyad }}</strong> <strong class="pull-right">
                                                        </strong>
                                                    </div>
                                                    <div class="contact_sec">
                                                        <strong class="primary-font">Message Gelicek bu kısma </strong> <span class="badge pull-right"></span>
                                                    </div>
                                                </div>
                                            </li>
                                          </a>

                                        @endif

                                    @endforeach

                                @endforeach






                            </ul>
                        </div>


                    </div>

                </div>
                <!--chat_sidebar-->
                @if(isset($url))

                <div class="col-sm-9 message_section">
                    <div class="row">






                        <div class="chat_area" id="txt-area">



                            @if(count($mesaj)>0)

                                <ul class="list-unstyled">

                                    @foreach($mesaj as $msj)

                                        @if($msj->mesaj_atan != $mesajAtan->id)

                                            <li class="left clearfix">
                     <span class="chat-img1 pull-left">


                       @if($mesajAtilan->resim==null)
                             <img class="img-circle" src="/uploads/img/user.png" alt="{{ $mesajAtilan->ad }} {{ $mesajAtilan->soyad }}" width="100px" height="100px">
                         @else
                             <img class="img-circle" src="/uploads/img/{{$mesajAtilan->resim}}" alt="{{ $mesajAtilan->ad.' '.$mesajAtilan->soyad }}" width="100px" height="100px">
                         @endif
                     </span>
                                                <div class="chat-body1 clearfix">
                                                    <div class="col-md-12 col-md-12">
                                                        <p style="background:#E8FFD4;">{{ $msj->mesaj_icerigi }}
                                                            @if(strlen($msj->mesaj_icerigi))
                                                            @for($i=0;$i<20;$i++)
                                                            &emsp;
                                                            @endfor
                                                            @endif
                                                        </p>
                                                    </div>

                                                    <div class="chat_time pull-right">{{$msj->created_at->diffForHumans()}}</div>
                                                </div>
                                            </li>

                                            <br>

                                        @else


                                            <li class="left clearfix admin_chat">
                     <span class="chat-img1 pull-right">
                         @if($mesajAtan->resim==null)
                             <img class="img-circle" src="/uploads/img/user.png" alt="{{ $mesajAtan->ad }} {{ $mesajAtan->soyad }}" width="100px" height="100px">
                         @else
                             <img class="img-circle" src="/uploads/img/{{$mesajAtan->resim}}" alt="{{ $mesajAtan->ad.' '.$mesajAtan->soyad }}" width="100px" height="100px">
                         @endif
                         </span>
                                                <div class="chat-body1 clearfix">
                                                    <p style="background:#FCFBF6;"> {{ $msj->mesaj_icerigi }} @if(strlen($msj->mesaj_icerigi))
                                                        @for($i=0;$i<40;$i++)
                                                        &emsp;
                                                        @endfor
                                                        @endif</p>
                                                    <div class="chat_time pull-left">{{$msj->created_at->diffForHumans()}}</div>
                                                </div>
                                            </li>


                                        @endif


                                    @endforeach





                                </ul>

                            @endif


                        </div><!--chat_area-->



                        <form action="" method="post">

                            {{ csrf_field() }}
                            <div class="message_write">
                                <textarea class="form-control" placeholder="Mesaj Yaz" name="mesaj_icerigi"></textarea>
                                <div class="clearfix"></div>
                                <div class="chat_bottom">
                                    <input type="submit" class="pull-right btn btn-success" value="Gönder">
                                </div>
                            </div>
                        </form>


                    </div>



                </div> <!--message_section-->

                @endif
            </div>
        </div>



    </div>
@endsection


@section('css')

    <style type="text/css">
        #custom-search-input {
            background: #e8e6e7 none repeat scroll 0 0;
            margin: 0;
            padding: 10px;
        }
        #custom-search-input .search-query {
            background: #fff none repeat scroll 0 0 !important;
            border-radius: 4px;
            height: 33px;
            margin-bottom: 0;
            padding-left: 7px;
            padding-right: 7px;
        }
        #custom-search-input button {
            background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
            border: 0 none;
            border-radius: 3px;
            color: #666666;
            left: auto;
            margin-bottom: 0;
            margin-top: 7px;
            padding: 2px 5px;
            position: absolute;
            right: 0;
            z-index: 9999;
        }
        .search-query:focus + button {
            z-index: 3;
        }
        .all_conversation button {
            background: #f5f3f3 none repeat scroll 0 0;
            border: 1px solid #dddddd;
            height: 38px;
            text-align: left;
            width: 100%;
        }
        .all_conversation i {
            background: #e9e7e8 none repeat scroll 0 0;
            border-radius: 100px;
            color: #636363;
            font-size: 17px;
            height: 30px;
            line-height: 30px;
            text-align: center;
            width: 30px;
        }
        .all_conversation .caret {
            bottom: 0;
            margin: auto;
            position: absolute;
            right: 15px;
            top: 0;
        }
        .all_conversation .dropdown-menu {
            background: #f5f3f3 none repeat scroll 0 0;
            border-radius: 0;
            margin-top: 0;
            padding: 0;
            width: 100%;
        }
        .all_conversation ul li {
            border-bottom: 1px solid #dddddd;
            line-height: normal;
            width: 100%;
        }
        .all_conversation ul li a:hover {
            background: #dddddd none repeat scroll 0 0;
            color:#333;
        }
        .all_conversation ul li a {
            color: #333;
            line-height: 30px;
            padding: 3px 20px;
        }
        .member_list .chat-body {
            margin-left: 47px;
            margin-top: 0;
        }
        .top_nav {
            overflow: visible;
        }
        .member_list .contact_sec {
            margin-top: 3px;
        }
        .member_list li {
            padding: 6px;
        }
        .member_list ul {
            border: 1px solid #dddddd;
        }
        .chat-img img {
            height: 34px;
            width: 34px;
        }
        .member_list li {
            border-bottom: 1px solid #dddddd;
            padding: 6px;
        }
        .member_list li:last-child {
            border-bottom:none;
        }
        .member_list {
            height: 380px;
            overflow-x: hidden;
            overflow-y: auto;
        }
        .sub_menu_ {
            background: #e8e6e7 none repeat scroll 0 0;
            left: 100%;
            max-width: 233px;
            position: absolute;
            width: 100%;
        }
        .sub_menu_ {
            background: #f5f3f3 none repeat scroll 0 0;
            border: 1px solid rgba(0, 0, 0, 0.15);
            display: none;
            left: 100%;
            margin-left: 0;
            max-width: 233px;
            position: absolute;
            top: 0;
            width: 100%;
        }
        .all_conversation ul li:hover .sub_menu_ {
            display: block;
        }
        .new_message_head button {
            background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
            border: medium none;
        }
        .new_message_head {
            background: #f5f3f3 none repeat scroll 0 0;
            float: left;
            font-size: 13px;
            font-weight: 600;
            padding: 18px 10px;
            width: 100%;
        }
        .message_section {
            border: 1px solid #dddddd;
        }
        .chat_area {
            float: left;
            height: 300px;
            overflow-x: hidden;
            overflow-y: auto;
            width: 100%;
        }
        .chat_area li {
            padding: 14px 14px 0;
        }
        .chat_area li .chat-img1 img {
            height: 40px;
            width: 40px;
        }
        .chat_area .chat-body1 {
            margin-left: 50px;
        }
        .chat-body1 p {
            background: #fbf9fa none repeat scroll 0 0;
            padding: 10px;
        }
        .chat_area .admin_chat .chat-body1 {
            margin-left: 0;
            margin-right: 50px;
        }
        .chat_area li:last-child {
            padding-bottom: 10px;
        }
        .message_write {
            background: #f5f3f3 none repeat scroll 0 0;
            float: left;
            padding: 15px;
            width: 100%;
        }

        .message_write textarea.form-control {
            height: 70px;
            padding: 10px;
        }
        .chat_bottom {
            float: left;
            margin-top: 13px;
            width: 100%;
        }
        .upload_btn {
            color: #777777;
        }
        .sub_menu_ > li a, .sub_menu_ > li {
            float: left;
            width:100%;
        }
        .member_list li:hover {
            background: #428bca none repeat scroll 0 0;
            color: #fff;
            cursor:pointer;
        }
    </style>


@endsection


@section('js')

    <script src="https://use.fontawesome.com/45e03a14ce.js"></script>

@endsection






