@extends('layouts.base')

@section('title', $bb->title)

@section('main')
    <h2>{{ $bb->title }}</h2>
    <p>{{ $bb->content }}</p>
    <p>{{ $bb->price }} руб.</p>
    <p>Автор: {{ $bb->user->name }}</p>
    <p><a href="{{ route('index') }}">Нa перечень объявлений</a></p>
@endsection('main')
