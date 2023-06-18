@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">{{ __('Кабинет администратора') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('Вы вошли!') }}
                    </div>
                </div>
            </div>

            <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-header">{{ __('Список новостей') }}</div>
                    <div class="card-body">
                        <a href="{{ route('admin.create-products') }}" class="nav-link text-decoration-underline fw-bold">
                            {{ __('Создать новость') }}
                        </a>
                    </div>
                    <table class="table table-bordered">
                        <tr>
                            <th>#</th>
                            <th>Изображение</th>
                            <th>Название</th>
                            <th>Описание</th>
                            <th width="280px">Действие</th>
                        </tr>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td><img src="{{ asset('/image/' . $product->image) }}" width="100px"></td>
                                <td>{{ $product->name }}</td>
                                <td>
                                    @php
                                        echo rtrim(mb_substr(strip_tags(html_entity_decode($product->description)), 0, 150)) . '...';
                                    @endphp
                                </td>
                                <td class="d-flex justify-content-center gap-3">
                                    <a href="{{ route('home') . '/admin' . '/products' . '/' . $product->id . '/' . 'edit' }}" class="btn btn-sm btn-outline-secondary">Редактировать</a>

                                    <form action="{{ route('admin.products-destroy', $product->id) }}" method="get">
                                        @csrf
                                        @method('get')
                                        <button type="submit" class="btn btn-sm btn-danger">Удалить</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
