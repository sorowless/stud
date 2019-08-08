@extends('layouts.main')
@section('content')
    <!-- Page Header -->
    <header class="masthead login1011-more" style="background-image: url('images/bg-03.jpg')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h2>МБОУ "Первомайский ЦО"</h2>
                        <span class="subheading">Контакты</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 mx-auto">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div style="text-align:center">
                                    <h3>Контакты</h3>
                                </div>
                                <hr>
                                <div class="content">
                                    п. Первомайское, <br>ул. Ленина, д 48<br>
                                    <hr>
                                            Телефоны: 8(813)78 68-491,<br>
                                       8(813)78 68 440<br><hr>
                                       Факс: 8(813)78 68-491<br><hr>
                                        Email: pervom@vbg.lokos.net<br>
                                </div>
                            </div>
                        </div></div>
                        <div class="row">
                        <div class="col-md-12">
                            <div class="card card-img">
                                <div class="image">
                                    <img src="{{URL::asset('images/map.png')}}" alt="..."/>
                                </div>
                            </div>
                        </div></div>
                            <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div style="text-align: center">
                                    <h3 >Обратная связь</h3>
                                </div>
                                <hr>
                                <div class="content">
                                    <form method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Тема</label>
                                                    <input type="text" class="form-control" name="title" placeholder="Тема">
                                                </div>
                                            </div></div>
                                            <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Контакты</label>
                                                    <input type="email" class="form-control" name="emailphone" placeholder="Email" >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Сообщение</label>
                                                    <textarea type="text" class="form-control" name="info" placeholder="Сообщение"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-info btn-fill pull-right" style="border-color:#C77FF2;background-color: #C77FF2">Отправить</button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- Pager -->
                <div class="clearfix">
                    <a class="" href="#"></a>
                </div>
            </div>
        </div>
    </div>
@stop
