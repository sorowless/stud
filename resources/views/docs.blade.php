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
                        <span class="subheading">Документы</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-5 mx-auto" style="text-align: center">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-text" style="padding-top: 5px;padding-bottom: 5px">
                                    <a href="{{url('/documents/ustav.pdf')}}" download>Устав</a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card card-text" style="padding-top: 5px;padding-bottom: 5px">
                                    <a href="{{url('/documents/invite.pdf')}}" download>Правила приёма</a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card card-text" style="padding-top: 5px;padding-bottom: 5px">
                                    <a href="{{url('/documents/rejim.pdf')}}" download>Режим учебных занятий</a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card card-text" style="padding-top: 5px;padding-bottom: 5px">
                                    <a href="{{url('/documents/otchs.pdf')}}" download>Порядок и основание перевода, отчисления</a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card card-text" style="padding-top: 5px;padding-bottom: 5px">
                                    <a href="{{url('/documents/konfed.pdf')}}" download>Политика конфидециальности</a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card card-text" style="padding-top: 5px;padding-bottom: 5px">
                                    <a href="{{url('/documents/collectiv.pdf')}}" download>Коллективный договор</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       @stop
