@extends('layouts.all')
@section('content')
            <div class="container-fluid">
                <div class="row">
                    @foreach($contacts as $contact)
                        <div class="col-md-4">
                            <div class="card">
                                <div class="header">
                                    <h5 class="title">{{$contact->title}}</h5>
                                    <p class="category">{{$contact->emailphone}}</p>
                                    <p class="category">{{$contact->created_at->format('d-m-Y H:i')}}</p>
                                    <a href="javascript::" class='condelete' style="color:black" rel="{{$contact->id}}"><button style="background-color:#C77FF2;border-color: #C77FF2;color:white">Обработано</button></a>
                                </div>
                                <div class="content table-responsive table-full-width">
                                    <p style="padding-left:10px">{!! $contact->info !!}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @stop
