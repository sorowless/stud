@extends('layouts.all')
@section('content')
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Статьи</h4>
                                <p class="category">Полный список</p>
                                <p class="category" style="text-align:right"><a href="/posts/add" style="color:#9A9A9A">Добавление</a></p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                    <th>№</th>
                                    <th>Наименование</th>
                                    <th>Автор</th>
                                    <th>Дата создания</th>
                                    <th>Дата изменений</th>
                                    <th>Действия</th>
                                    </thead>
                                    <tbody>
                                    @foreach($posts as $post)
                                        <tr>
                                            <td>{{$post->id}}</td>
                                            <td>{{$post->title}}</td>
                                            <td>{!! $post->author !!}</td>
                                            <td>{{$post->created_at->format('d-m-Y H:i')}}</td>
                                            <td>{{$post->updated_at->format('d-m-Y H:i')}}</td>
                                            <td><a href="{!! route('posts.edit',['id'=>$post->id]) !!}" style="color:black"><i class="pe-7s-pen"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <a href="javascript::" class='pdelete' style="color:black" rel="{{$post->id}}"><i class="pe-7s-close-circle"></i></a></td>
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
