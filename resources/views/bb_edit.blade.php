@extends('layouts.base')

@section('title', 'Правка объявления :: Мои объявления')

@section('main')
    <form action="{{ route('bb.update', ['bb' => $bb->id]) }}" method="post">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <input type="text" value="{{ old('title', $bb->title)  }}" name="title" id="txTitle" class="form-control @error('title') is-invalid @enderror">
            @error('title')
            <span class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="txtContent">Описание</label>
            <textarea name="description" id="txtContent" rows="3">{{$bb->description}}</textarea>
        </div>
        <div class="form-group">
            <label for="txtPrice">Цена</label>
            <input name="price" id="txtPrice" class="form-control" value="{{ $bb->price }}">
        </div>
        <input type="text" class="btn btn-primary" value="Сохранить">
    </form>
@endsection
