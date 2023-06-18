@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 margin-tb d-flex justify-content-between">
                <div class="card-header">
                    <h2>
                        {{ __('Редактирование новости') }}
                    </h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-sm btn-outline-secondary" href="{{ route('home') }}">{{ __('Назад') }}</a>
                </div>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Ошибка!</strong> <br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('home') . '/products' . '/' . $products->id . '/' . 'update' }}" method="POST">
            @csrf
            @method('POST')

            <div class="row">
                <div class="mb-3">
                    <div class="form-group">
                        <label for="name" class="form-label">Название</label>
                        <input type="text" name="name" value="{{ $products->name }}" class="form-control"
                            placeholder="Название">
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-group">
                        <label for="description" class="form-label">Описание</label>
                        <textarea class="form-control" style="height:150px" name="detail" placeholder="Описание">
                            {{ $products->description }}
                        </textarea>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-group">
                        <label for="image" class="form-label">Изображение</label>
                        <input type="file" name="image" class="form-control" placeholder="image">
                        <img src="{{ asset('/image/' . $products->image) }}" alt="" width="400px" class="mt-3 rounded">
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-sm btn-outline-success">Сохранить изменения</button>
                </div>
            </div>

        </form>
    </div>
@endsection
