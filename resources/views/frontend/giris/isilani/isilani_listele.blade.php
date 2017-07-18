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

                            <h3>İş İlanları</h3>



                            <div class="x_panel">
                                <div class="x_content">
                                    <div class="row">

                                        @foreach($sorgu as $gelenBilgi)


                                        <div class="col-md-4 portfolio-item">

                                            <a href="/isilani/listele/{{ $gelenBilgi->id  }}" target="_blank">

                                                <img src="https://dummyimage.com/700x400/a3a3a3/1f1d1f.png&text=%C4%B0%C5%9F+%C4%B0lan%C4%B1" class="img-responsive">
                                            </a>
                                            <h3>
                                                <a href= "/isilani/listele/{{ $gelenBilgi->id  }}" target="_blank">{{ $gelenBilgi->baslik }} </a>
                                            </h3>
                                            <a href="/isilani/listele/{{ $gelenBilgi->id  }}" target="_blank"><p>{{ $gelenBilgi->calisma_sekli }}</p></a>
                                        </div>

                                        @endforeach





                                    </div>

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

@endsection


