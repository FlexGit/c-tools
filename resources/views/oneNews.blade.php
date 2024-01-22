@extends('layouts.master')

@section('title', $oneNews->meta_title ?? '')
@section('description', $oneNews->meta_description)

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            {{ Breadcrumbs::render('oneNews', $oneNews) }}
        </div>
    </div>
</div>

@if ($oneNews)
    <div class="site-section">
        <div class="container">
            <p>{{ $oneNews->created_at->format('d.m.Y') }}</p>
            <div class="row">
                <div class="col-md-6 mb-5 mb-md-0 order-md-2">
                    @if ($oneNews->image)
                        <a class="image-popup" href="{{ asset('storage/' . $oneNews->image) }}">
                            <img src="{{ asset('storage/' . $oneNews->image) }}" alt="{{ $oneNews->title }}" data-aos="fade-up">
                        </a>
                    @endif
                </div>
                <div class="col-md-6 pr-md-5 order-md-1">
                    <h1 class="line-height-xs text-black mb-4">{{ $oneNews->title }}</h1>
                    <p class="mb-4">
                        {!! $oneNews->detail_text !!}
                    </p>
                </div>
            </div>
            <a href="{{ route('news') }}">к списку новостей</a>
        </div>
    </div>
@endif

@endsection
