@extends('layouts.main')
@section('content')
    <!-- Page Header -->
    <header class="masthead login1011-more" style="background-image: url('{{URL::asset('images/bg-03.jpg')}}')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="post-heading">
                        <h1>{!! $post->title !!}</h1>
                        <h2 class="subheading">{!! $post->short_text !!}</h2>
                        <span class="meta">Опубликовал
              <a href="#">{!! $post->author !!}</a>
              в {!! $post->created_at->format('H:i d/m/Y') !!}</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Post Content -->
    <posts>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    {!! $post->full_text !!}
                </div>
            </div>
            <br>
            <hr>
            <br>
                @foreach($comments as $comment)
                <div class="row">
                    <div class="col-lg-8 col-md-10 mx-auto">
                        <div style="border:1px solid #C77FF2;">
                            <div class="row">
                            <div class="col-lg-2" style="margin-left:2px;font-size:12px">Оставил {{get_user($comment->user_id)->name}}<br>
                                в {{$comment->created_at->format('H:i d/m/Y')}}</div>
                            <div class="col-lg-6 col-md-8"><p>{!! $comment->comment !!}</p></div></div>
                        </div>
                    </div>
                </div>
                @endforeach
            <br>
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
            @if(\Illuminate\Support\Facades\Auth::check())
                <form method="post" action="{!! route('comments.add') !!}">
                    {!! csrf_field() !!}
                    @csrf
                    <input type="hidden" value="{{$post->id}}" name="post_id">
                    <p>Комментарий:<br>
                        <textarea class="form-control" name="comment"></textarea></p>
                    <div class="content-r">
                    <button type="submit" class="btn btn-success" style="background-color:#C77FF2;border-color: #C77FF2;color:white">Добавить комментарий</button>
                    </div>
                </form>
            @endif
                </div>
            </div>
        </div>
    </posts>
@stop
