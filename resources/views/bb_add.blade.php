@extends('layouts.base')

@section('title', 'Добавление объявления :: Мои объявления')

@section('main')
    <form action="{{route('bb.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="">Навзвание</label>
            <input type="text" name="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror " >
            @error('title')
            <span class="invalid-feedback">
                <strong>{{$message}}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="txtContent">Описание</label>
            <textarea name="description" id="txtContent" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="txtPrice">Цена</label>
            <input name="price" id="txtPrice" class="form-control">
        </div>
        <input type="submit" class="btn btn-primary" value="Добавить">
    </form>
@endsection
