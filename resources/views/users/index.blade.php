@extends('layouts.all')
@section('content')
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Пользователи</h4>
                                <p class="category">Полный список</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                    <th>№</th>
                                    <th>Имя</th>
                                    <th>Email</th>
                                    <th>Админ</th>
                                    <th>Учитель</th>
                                    <th>Ученик</th>
                                    <th>Гость</th>
                                    <th>Дата регистрации</th>
                                    <th>Действия</th>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <form action="{{ route('users.changeR',['id'=>$user->id]) }}" method="post">
                                                <td>{{$user->id}}</td>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->email}}</td>
                                                <td><input name="role_admin" type="checkbox" {{$user->hasRole('admin') ? 'checked' : ''}} ></td>
                                                <td><input name="role_teacher" type="checkbox" {{$user->hasRole('teacher') ? 'checked' : ''}}></td>
                                                <td><input name="role_student" type="checkbox" {{$user->hasRole('student') ? 'checked' : ''}}></td>
                                                <td><input name="role_user" type="checkbox" {{$user->hasRole('user') ? 'checked' : ''}}></td>
                                            <td>{{$user->created_at->format('d-m-Y H:i')}}</td>
                                                <td><a href="javascript::" class='udelete' style="color:black" rel="{{$user->id}}"><button><i class="pe-7s-close-circle"></i></button></a>
                                                @csrf
                                                <button type="submit"><i class="pe-7s-pen"></i></button></td>

                                            </form>
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
