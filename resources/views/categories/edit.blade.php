@extends('layouts.all')
@section('content')
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Редактировать категорию</h4>
                            </div>
                            <div class="content">
                                <form method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Название</label>
                                                <input type="text" class="form-control" name="title" value="{{$category->title}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Описание</label>
                                                <textarea rows="5" class="form-control" name="info">{!!$category->info!!}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-info btn-fill pull-right" style="background-color:#C77FF2;border-color: #C77FF2;color:white">Редактировать</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @stop
