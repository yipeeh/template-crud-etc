@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">{{ __('Новости') }}</div>
                    <div class="card-body d-flex justify-content-between flex-wrap">
                        @if ($products->isEmpty())
                            <span class="text-align-center my-3">{{ __('Новостей нет..') }}</span>
                        @else
                            @foreach ($products as $p)
                                <div class="col-lg-4 col-12 p-2">
                                    <div class="card shadow-sm h-100">
                                        <img src="{{ asset('/image/' . $p->image) }}" alt="">
                                        <div class="card-body">
                                            <span class="fw-bold">{{ $p->name }}</span>
                                            <p>
                                                @php
                                                    echo rtrim(mb_substr(strip_tags(html_entity_decode($p->description)), 0, 150)) . '...';
                                                @endphp
                                            </p>
                                            <div class="d-flex align-items-center flex-wrap justify-content-between">

                                                <small class="text-body-secondary mb-3">{{ $p->created_at }}</small>
                                                @auth
                                                    <div class="products-btn d-flex gap-3">
                                                        <a href={{ route('home') . '/products' . '/' . $p->id . '/' . 'show' }}>
                                                            <div class="btn-group">
                                                                <button type="button"
                                                                    class="btn btn-sm btn-outline-success">Подробнее</button>
                                                            </div>
                                                        </a>
                                                    </div>
                                                @endauth
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
