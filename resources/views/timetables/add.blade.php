@extends('layouts.all')
@section('content')
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Добавление урока</h4>
                            </div>
                            <div class="content">
                                <form method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Дата</label>
                                                <input type="date" class="form-control" name="lesson_date" placeholder="Дата урока" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Кабинет</label>
                                                <select class="form-control" name="cab">
                                                    @foreach($cabs as $cab)
                                                        <option value="{{$cab->id}}">{{$cab->number}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Учитель</label>
                                                <select class="form-control" name="teach">
                                                    @foreach($users as $user)
                                                        <option value="{{$user->id}}">{{$user->FIO}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Класс</label>
                                                <select class="form-control" name="clas">
                                                    @foreach($classes as $class)
                                                        <option value="{{$class->id}}">{{$class->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Предмет</label>
                                                <select class="form-control" name="subj">
                                                    @foreach($subjects as $subject)
                                                        <option value="{{$subject->id}}">{{$subject->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Урок</label>
                                                <select class="form-control" name="lesn">
                                                    @foreach($lessons as $lesson)
                                                        <option value="{{$lesson->id}}">{{$lesson->number}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-info btn-fill pull-right">Добавить</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @stop
