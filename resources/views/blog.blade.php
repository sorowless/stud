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
                        <span class="subheading">Новости</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            @foreach($posts as $post)
            <div class="post-preview">
                <a href="{!! route('blog.show', ['id'=>$post->id, 'slug'=>str_slug($post->title)]) !!}">
                    <h2 class="post-title">
                        {!! $post->title !!}
                    </h2>
                    <h3 class="post-subtitle">
                        {!! $post->short_text !!}
                    </h3>
                </a>
                <p class="post-meta">Опубликовал
                    <a href="#">{!! $post->author !!}</a>
                    в {!! $post->created_at->format('H:i d/m/Y') !!}</p>
            </div>
            <hr>
            @endforeach
            <!-- Pager -->
            <div class="clearfix">
                <a class="" href="#">{{ $posts->links('vendor.pagination.bootstrap-4') }}</a>
            </div>
        </div>
    </div>
    </div>
@stop
