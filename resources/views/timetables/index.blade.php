@extends('layouts.all')
@section('content')
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Расписание</h4>
                                <p class="category">Полный список</p>
                                <p class="category" style="text-align:right"><a href="/timetable/add" style="color:#9A9A9A">Добавление</a></p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                    <th>№</th>
                                    <th>Дата</th>
                                    <th>Кабинет</th>
                                    <th>Класс</th>
                                    <th>Предмет</th>
                                    <th>Урок</th>
                                    <th>Действия</th>
                                    </thead>
                                    <tbody>
                                    @foreach($timetables as $timetable)
                                        <tr>
                                            <td>{{$timetable->id}}</td>
                                            <td>{{$timetable->lesson_date->format('d-m-Y')}}</td>
                                            <td>{{$timetable->cab}}</td>
                                            <td>{!! get_clas($timetable->clas)->name !!}</td>
                                            <td>{!! get_subj($timetable->subj)->name !!}</td>
                                            <td>{!! $timetable->lesn !!}</td>
                                            <td><a href="{!! route('timetable.edit',['id'=>$timetable->id]) !!}" style="color:black"><i class="pe-7s-pen"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <a href="javascript::" class='tdelete' style="color:black" rel="{{$timetable->id}}"><i class="pe-7s-close-circle"></i></a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
       @stop
