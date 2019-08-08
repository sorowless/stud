@extends('layouts.all')
@section('content')
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Профиль</h4>
                            </div>
                            <div class="content">
                                <form method="POST" enctype="multipart/form-data" action="{{ route('users.edit', $users->id) }}">
                                    @csrf
                                    @method('PATCH')
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Логин</label>
                                                <input type="text" class="form-control" name="name" value="{{$users->name}}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>ФИО</label>
                                                <input type="text" class="form-control" name="FIO"  value="{{$users->FIO}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" class="form-control" name="email" value="{{$users->email}}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <input type="text" class="form-control" name="phone"  value="{{$users->phone}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>birthdayDate</label>
                                                <input type="date" class="form-control" name="email" value="{{$users->birthdayDate}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Photo</label>
                                                <input type="file" class="form-control" name="photo">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-info btn-fill pull-right">Редактировать</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="image">
                                <img src="{{URL::asset('images/bg-12.jpg')}}" alt="..."/>
                            </div>
                            <div class="content">
                                <div class="author">
                                    <a href="#">
                                        @if($users->photo)
                                        <img class="avatar border-gray" src="{{URL::asset('storage/'.$users->photo)}}" alt="..."/>
                                        @elseif($users->photo==null)
                                            <img class="avatar border-gray" src="{{URL::asset('images/non.png')}}" alt="..."/>
                                        @endif
                                        <h4 class="title">{{$users->FIO}}<br />
                                            <small>{{$users->name}}</small>
                                            <br>
                                            @if(Auth::user()->hasRole('admin'))
                                                <small>Администратор</small>
                                             @elseif(Auth::user()->hasRole('teacher'))
                                                <small>Учитель</small>
                                            @elseif(Auth::user()->hasRole('student'))
                                                <small>Ученик</small>
                                            @elseif(Auth::user()->hasRole('user'))
                                                <small>Пользователь</small>
                                            @endif
                                        </h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        @stop
