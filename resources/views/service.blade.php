@extends('layouts.master')

@section('title', $service->meta_title ?? '')
@section('description', $service->meta_description)

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12">
                {{ Breadcrumbs::render('service', $service) }}
            </div>
        </div>
    </div>

    @if ($service)
        <div class="site-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 mb-5 mb-md-0 order-md-2">
                        @if ($service->image)
                            <a class="image-popup" href="{{ asset('storage/' . $service->image) }}">
                                <img src="#" class="lozad" data-src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}">
                            </a>
                        @endif
                    </div>
                    <div class="col-md-6 pr-md-5 order-md-1">
                        <h1 class="line-height-xs text-black mb-4">{{ $service->title }}</h1>
                        <p class="mb-4">
                            {!! $service->detail_text !!}
                        </p>
                    </div>
                </div>
                <a href="{{ route('services') }}">к списку услуг</a>
            </div>
        </div>
    @endif

@endsection
