<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Интересный проект, который захватывает!">
    <title>{{Setting::get('name_site')}} | @yield('title')</title>
    <link href="{{asset('app/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('app/css/main.min.css?v=mcserv')}}" rel="stylesheet">
    <script type="text/javascript">
        function getIp(e) {
            swal({
                title: 'Скопируйте наш IP!',
                html: '{{Setting::get('ip_address')}}',
                animation: false,
                customClass: 'animated tada',
            })
        }
    </script>

    <link rel="shortcut icon" href="{{asset('app/images/ico/favicon.ico')}}">

    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('app/images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('app/images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('app/images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('app/images/ico/apple-touch-icon-57-precomposed.png')}}">
</head>
<!--/head-->

<body>
<div class="preloader"><i class="fa fa-sun-o fa-spin"></i></div>
	<header id="header">
        <div class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/">
                    	<h1><img src="{{asset('app/images/logo.png')}}" alt="logo"></h1>
                    </a>
                </div>
            </div>
        </div>
    </header>
    <!--/#header-->


    <section id="home-slider">
        <div class="container">
            <div class="main-slider">
                <div class="slide-text">
                    <h1>Мы - {{Setting::get('name_site')}}</h1>
                    <p>Лучший майнкрафт проект, для игры с
                        друзьями! А если у тебя нет друзей, не спеши расстраиваться,
                        ты найдешь их на нашем проекте, в два счёта.
                        Не убедительно? Так зайди и убедись.</p>
                    <a href="#" onclick="getIp(event)" class="btn btn-common hidden-xs">{{Setting::get('ip_address')}}</a>
                </div>
                <img src="{{asset('app/images/home/slider/slide1/house.png')}}" class="img-responsive slider-house" alt="slider image">
                <img src="{{asset('app/images/home/slider/slide1/circle1.png')}}" class="slider-circle1" alt="slider image">
                <img src="{{asset('app/images/home/slider/slide1/circle2.png')}}" class="slider-circle2" alt="slider image">
                <img src="{{asset('app/images/home/slider/slide1/cloud1.png')}}" class="slider-cloud1" alt="slider image">
                <img src="{{asset('app/images/home/slider/slide1/cloud2.png')}}" class="slider-cloud2" alt="slider image">
                <img src="{{asset('app/images/home/slider/slide1/cloud3.png')}}" class="slider-cloud3" alt="slider image">
                <img src="{{asset('app/images/home/cycle.png')}}" class="slider-cycle" alt="">
            </div>
        </div>
    </section>
    <!--/#home-slider-->

        @yield('content')

    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center bottom-separator">
                    <img src="{{asset('app/images/home/minecraft.png')}}" class="img-responsive inline" alt="">
                </div>
                <div class="col-md-6 col-sm-12 col-md-offset-3">
                    <p class="text-center">
                        Мы - творческое объединение, которое воплощает ваши фантазии
                        в реальность. Мы те, кто сделает за вас всю "грязную" работу,
                        в которйо вам еще долго пришлось-бы разбираться. Мы лучшие из лучших, и тут дальше текст...
                    </p>
                </div>
                <div class="col-sm-12">
                    <div class="copyright-text text-center">
                        <p><a href="//vk.com/mcdone">Администратор</p></a>
						<p>Почта: raskyl@mail.ru</p>
                    </div>
                </div>
            </div>
        </div>


    </footer>
    <!--/#footer-->

    <script type="text/javascript" src="{{asset('app/js/jquery.min.js')}}"></script>
    <script>
        // portfolio filter
        $(window).load(function(){

            $('.main-slider').addClass('animate-in');
            $('.preloader').fadeOut('slow');
            //End Preloader
        });
    </script>
    <script type="text/javascript" src="{{asset('app/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('app/js/script.js')}}"></script>
    <script type="text/javascript" src="{{asset('app/js/wow.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            // Initiat WOW JS
            new WOW().init();
        });
    </script>

    @yield('scripts')
</body>
</html>
