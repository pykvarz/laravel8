@extends('layouts.base')

@section('title', 'Удаление объявления :: Мои объявления')

@section('main')
    <form action="{{ route('bb.destroy', ['bb' => $bb->id]) }}" method="post">
        @csrf
        @method('DELETE')
        <input type="submit" class="btn btn-danger" value="Удалить">
    </form>
@endsection('main')
