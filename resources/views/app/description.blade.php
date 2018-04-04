@extends('app.parent')
@section('title', 'Network page')

@section('content')
    <section id="services">
        <div class="container">
            <div class="row">
                @foreach($goods as $server => $product)
                    <div class="col-sm-12 wow fadeInLeft animated" data-wow-duration="500ms" data-wow-delay="300ms">
                        <h1 class="title text-left m-l-15 p-t-30">Сервер {{$server}}</h1>
                        <p class="m-l-15">Чтобы приобрести привилегию, вам нужно вернутся <a href="//{{$_SERVER['SERVER_NAME']}}">назад</a></p>
                        @foreach($product as $g)
                            @if ($g['description'])
                            <div class="col-md-4 padding wow fadeIn p-b-5 p-t-30" data-wow-duration="1000ms" data-wow-delay="300ms">
                                <div class="panel panel-default m-r-10 m-l-10">
                                    <div class="panel-heading"><h2>{{$g['name']}}  | {{$g['price']}} руб.</h2></div>
                                    <div class="panel-body">
                                        <div>@php echo $g['description'] @endphp</div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--/#services-->

@endsection