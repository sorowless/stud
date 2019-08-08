@extends('layouts.all')
@section('content')
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Редактировать статью</h4>
                            </div>
                            <div class="content">
                                <form method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Название</label>
                                                <input type="text" class="form-control" name="title" value="{{$posts->title}}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Автор</label>
                                                <input type="text" class="form-control" name="author"  value="{{$posts->author}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Короткий текст</label>
                                                <textarea rows="4" class="form-control" name="short_text">{!! $posts->short_text !!}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Категория(ии)</label>
                                                <select class="form-control" name="categories[]" multiple size="4">
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->id}}" @if(in_array($category->id, $arrCategories)) selected @endif>{{$category->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Полный текст</label>
                                                <textarea rows="5" class="form-control" name="full_text">{!! $posts->full_text !!}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-info btn-fill pull-right">Редактировать</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        @stop
