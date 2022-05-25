@extends('layouts.main')

@section('title')
    @parent <?=$page['title'] ?? ""?>
@endsection

@section('menu')
    @include('menu')
@endsection

@section('content')
    <h3>News page</h3>
    <h4>{{ ($page ? $page['id'] . '. ' : "") . ($page['title'] ?? "") }}</h4>
    <p>
        @if (($page) && $page['is_private'])
            Для чтения этой новости требуется регистрация
        @else
            {{ $page['text'] ?? "404 -- Page not found.." }}
        @endif
    </p>
@endsection