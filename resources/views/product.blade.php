@extends('layouts.master')

@section('title', $product->meta_title ?? '')
@section('description', $product->meta_description)

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12">
                @if ($product->section && $product->section->section)
                    {{ Breadcrumbs::render('product', $product->section->section, $product, $product->section) }}
                @elseif ($product->section)
                    {{ Breadcrumbs::render('product', $product->section, $product) }}
                @endif
            </div>
        </div>
    </div>

    @if ($product)
        <div class="site-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 mb-5 mb-md-0 order-md-2">
                        @if ($product->image)
                            <a class="image-popup" href="{{ asset('storage/' . $product->image) }}">
                                <img src="#" class="lozad" data-src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}" data-aos="fade-up">
                            </a>
                        @endif
                    </div>
                    <div class="col-md-6 pr-md-5 order-md-1">
                        <h1 class="line-height-xs text-black mb-4">{{ $product->title }}</h1>
                        <p class="mb-4">
                            {!! $product->detail_text !!}
                        </p>
                    </div>
                </div>
                <a href="{{ route('catalog') }}">к списку продукции</a>
            </div>
        </div>
    @endif

@endsection
