@extends('layouts.all')
@section('content')
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Комментарии</h4>
                                <p class="category">Полный список</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                    <th>№</th>
                                    <th>Статья</th>
                                    <th>Пользователь</th>
                                    <th>Комментарий</th>
                                    <th>Статус</th>
                                    <th>Дата создания</th>
                                    <th>Действия</th>
                                    </thead>
                                    <tbody>
                                    @foreach($comments as $comment)
                                        <tr>
                                            <td>{{$comment->id}}</td>
                                            <td>{{get_post($comment->post_id)->title}}</td>
                                            <td>{{get_user($comment->user_id)->name}}</td>
                                            <td>{{$comment->comment}}</td>
                                            <td>@if($comment->status=='1') Активен @else На модерации <a href="{!! route('comments.accept',['id'=>$comment->id]) !!}"><button title="Одобрить"><i class="pe-7s-check"></i></button></a>@endif</td>
                                            <td>{{$comment->created_at->format('d-m-Y H:i')}}</td>
                                            <td><a href="javascript::" class='comdelete' style="color:black" rel="{{$comment->id}}"><button><i class="pe-7s-close-circle"></i></button></a></td>
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
