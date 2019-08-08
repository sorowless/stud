@extends('layouts.all')
@section('content')
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Добавление категории</h4>
                            </div>
                            <div class="content">
                                <form method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Название</label>
                                                <input type="text" class="form-control" name="title" placeholder="Название категории">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Описание</label>
                                                <textarea rows="5" class="form-control" name="info" placeholder="Описание категории"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-info btn-fill pull-right" style="background-color:#C77FF2;border-color: #C77FF2;color:white">Добавить</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-user">
                            <table class="table table-hover table-striped">
                                <thead>
                                <th>Наименование</th>
                                <th>Описание</th>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{$category->title}}</td>
                                        <td>{!! $category->info !!}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        @stop
