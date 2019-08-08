<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <script src="{{URL::asset('js/alertify.min.js')}}"></script>
    <!-- include the style -->
    <link rel="stylesheet" href="{{URL::asset('css/alertify.min.css')}}" />
    <!-- include a theme -->
    <link rel="stylesheet" href="{{URL::asset('css/themes/default.min.css')}}" />

    <!-- Bootstrap core CSS     -->
    <link href="{{URL::asset('css/bootstrap.min.css')}}" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="{{URL::asset('css/animate.min.css')}}" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="{{URL::asset('css/light-bootstrap-dashboard.css?v=1.4.0')}}" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{URL::asset('css/demo.css')}}" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="{{URL::asset('css/pe-icon-7-stroke.css')}}" rel="stylesheet" />
    <style>
        .content2 {
            position: relative;
            right: 20px;
            width: 100%;
            text-align: right;
            font-size: 18px;
            color: #899199;
        }
    </style>
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-image="{{URL::asset('images/bg-02.jpg')}}">

        <div class="sidebar-wrapper">
            <div class="logo">
                <a class="simple-text" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="{{ route('home') }}">
                        <i class="pe-7s-user"></i>
                        <p>Профиль</p>
                    </a>
                </li>
                <li>
                    <a href="{{ route('timetable') }}">
                        <i class="pe-7s-note2"></i>
                        <p>Расписание</p>
                    </a>
                </li>
                <li>
                    <a href="https://dnevnik.ru/">
                        <i class="pe-7s-global"></i>
                        <p>Онлайн-дневник</p>
                    </a>
                </li>
                <li>
                    <a href="{{ route('blog') }}">
                        <i class="pe-7s-news-paper"></i>
                        <p>Новости</p>
                    </a>
                </li>
                <li>
                    <a href="{{ route('contacts') }}">
                        <i class="pe-7s-call"></i>
                        <p>Контакты</p>
                    </a>
                </li>
                <li>
                    <a href="{{ route('invite') }}">
                        <i class="pe-7s-study"></i>
                        <p>Поступление</p>
                    </a>
                </li>
                <li>
                    <a href="{{ route('adm') }}">
                        <i class="pe-7s-users"></i>
                        <p>Администрация</p>
                    </a>
                </li>
                <li>
                    <a href="{{ route('docs') }}">
                        <i class="pe-7s-copy-file"></i>
                        <p>Документы</p>
                    </a>
                </li>
                <li>
                    <a href="{{ route('own') }}">
                        <i class="pe-7s-id"></i>
                        <p>Учредители</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Меню</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>Упс!</strong> Что-то пошло не так.

                        </div>
                    @endif
                    @if(Auth::user()->isAdm())
                        <ul class="nav navbar-nav navbar-left">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="pe-7s-key"></i>
                                    <b class="caret hidden-lg hidden-md"></b>
                                    <p class="hidden-lg hidden-md">
                                        Админ панель
                                        <b class="caret"></b>
                                    </p>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="/categories/index">Категории</a></li>
                                    <li><a href="/posts/index">Статьи</a></li>
                                    <li><a href="/users/index">Пользователи</a></li>
                                    <li><a href="/comments/index">Комментарии</a></li>
                                    <li><a href="/contacts/index">Обращения</a></li>
                                </ul>
                            </li>
                        </ul>
                    @endif

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="{{ route('home') }}" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                                <p> {{ Auth::user()->name }}</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <p> {{ __('Выйти') }} </p>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                        <li class="separator hidden-lg"></li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
            @yield('content')
        </div>
        <div class="content2">
            <div>
                &#169;  2019
            </div>
        </div>
       
    </div>
</div>

@include('messages')
</body>

<!--   Core JS Files   -->
<script src="{{URL::asset('js/jquery.3.2.1.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('js/bootstrap.min.js')}}" type="text/javascript"></script>

<!--  Charts Plugin -->
<script src="{{URL::asset('js/chartist.min.js')}}"></script>

<!--  Notifications Plugin    -->
<script src="{{URL::asset('js/bootstrap-notify.js')}}"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="{{URL::asset('js/light-bootstrap-dashboard.js?v=1.4.0')}}"></script>

<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script src="{{URL::asset('js/demo.js')}}"></script>
@include('deletes')
<script type="text/javascript">
    $(document).ready(function(){

        demo.initChartist();


    });
</script>

</html>
