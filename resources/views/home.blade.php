@extends('layouts.all')
@section('content')
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 mx-auto" style="text-align: center">
                        <div class="header">
                            <h2 class="title">Добро пожаловать</h2>
                            <h3 class="title"><a style="color: #DF76BF;" href="{!! route('users.edit',['id'=>Auth::user()->id]) !!}">{{Auth::user()->name}}</a></h3>
                            <h5 class="title"><a style="color: #DF76BF;" href="{!! route('users.edit',['id'=>Auth::user()->id]) !!}">Перейти в профиль</a></h5>
                        </div>

                    </div>
                </div>
            </div>
        @stop
