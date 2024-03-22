@extends('layouts.master')

@section('title', $page->meta_title ?? '')
@section('description', $page->meta_description)

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12">
                {{ Breadcrumbs::render('services') }}
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <h1 class="line-height-xs text-black mb-5">Услуги</h1>
            @foreach ($services as $service)
                <div class="row mb-5">
                    <div class="col-md-6 mb-5 mb-md-0 order-md-2">
                        @if ($service->image)
                            <a href="{{ route('services', $service->alias) }}">
                                <img src="#" class="lozad" data-src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}">
                            </a>
                        @endif
                    </div>
                    <div class="col-md-6 pr-md-5 order-md-1">
                        <a href="{{ route('services', $service->alias) }}">
                            <h4 class="line-height-xs text-black mb-4">{{ $service->title }}</h4>
                        </a>
                        <div class="mb-4">
                            {!! $service->preview_text !!}
                        </div>
                        <p class="mb-0">
                            <a href="{{ route('services', $service->alias) }}">
                                <small class="text-uppercase font-weight-bold text-black">Подробнее</small>
                            </a>
                        </p>
                    </div>
                </div>
            @endforeach
            <div class="d-flex justify-content-center mt-5">{{ $services->links() }}</div>
        </div>
    </div>

@endsection
