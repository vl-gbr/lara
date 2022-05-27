@extends('layouts.main')

@section('title')
    @parent Список последних новостей
@endsection

@section('menu')
    @include('menu')
@endsection

@section('content')
<h3>Last news</h3><br>
    @forelse ($news as $page)
        <h4>
            <a href="{{ route('newspage', $page['id']) }}">{{$page['title']}}</a>
        </h4>
        <span>Категория <i>{{$page['category']}}</i></span>
        <p>
            {{$page['text']}}
        </p>
    @empty
        <p>Нет новостей</p>
    @endforelse
@endsection