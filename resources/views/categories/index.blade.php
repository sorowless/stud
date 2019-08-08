@extends('layouts.all')
@section('content')
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Категории</h4>
                                <p class="category">Полный список</p>
                                <p class="category" style="text-align:right"><a href="/categories/add" style="color:#9A9A9A">Добавление</a></p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                    <th>№</th>
                                    <th>Наименование</th>
                                    <th>Описание</th>
                                    <th>Дата добавления</th>
                                    <th>Дата изменений</th>
                                    <th>Действия</th>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $category)
                                    <tr>
                                        <td>{{$category->id}}</td>
                                        <td>{{$category->title}}</td>
                                        <td>{!! $category->info !!}</td>
                                        <td>{{$category->created_at->format('d-m-Y H:i')}}</td>
                                        <td>{{$category->updated_at->format('d-m-Y H:i')}}</td>
                                        <td><a href="{!! route('categories.edit',['id'=>$category->id]) !!}" style="color:black"><i class="pe-7s-pen"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <a href="javascript::" class='cdelete' style="color:black" rel="{{$category->id}}"><i class="pe-7s-close-circle"></i></a></td>
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
