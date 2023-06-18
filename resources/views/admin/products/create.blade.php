@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-header">{{ __('Создание товара') }}</div>
                    <div class="bg-light p-4 rounded">
                        <form method="post" action="{{ route('admin.create-products-store') }}" novalidate enctype="multipart/form-data">
                            @csrf
                            @method('post')
                            <div class="mb-3">
                                <label for="name" class="form-label">Название</label>
                                <input value="{{ old('name') }}" type="text" class="form-control" name="name"
                                    placeholder="Название" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Описание</label>
                                <input value="{{ old('description') }}" type="text" class="form-control" name="description"
                                    placeholder="Описание" required>
                            </div>
                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="image" class="form-label">Изображение</label>
                                    <input type="file" name="image" class="form-control" placeholder="image">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Сохранить</button>
                            <a href="{{ route('admin.dashboard') }}" class="btn btn-default">Назад</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
