<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Первомайский ЦО</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Styles -->
    <style>

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }
        .content2 {
            position: absolute;
            left: 0;
            bottom: 0;
            width: 100%;
            height: 80px;
            text-align: center;
            font-size: 18px;
            color: rgba(246, 237, 255, 0.52);
        }
        .title {
            font-size: 84px;
            color:white;
        }
        @media (max-width: 576px) {
            .title {
                font-size: 40px;
            }
        }
        .links > a {
            color: white;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body class="login1011-more" style="background-image: url('images/bg-12.jpg');">
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Личный кабинет</a>
            @else
                <a href="{{ route('login') }}">Вход</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Регистрация</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="content">
        <div class="title m-b-md">
            "Первомайский ЦО"
        </div>

        <div class="links">
            <a class="disabled" href="{{ route('docs') }}">Документы</a>
            <a href="{{ route('blog') }}">Новости</a>
            <a href="{{ route('contacts') }}">Контакты</a>
            <a href="{{ route('invite') }}">Поступление</a>
            <a href="{{ route('adm') }}">Администрация</a>
            <a href="{{ route('own') }}">Учредители</a>
        </div>
    </div>
        <div class="content2">
            <div>
                &#169; 2019
            </div>
        </div>
</div>
</body>
</html>
