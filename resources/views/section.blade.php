@extends('layouts.master')

@section('title', $section->meta_title ?? '')
@section('description', $section->meta_description)

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12">
                @if ($section->section)
                    {{ Breadcrumbs::render('section', $section->section, $section) }}
                @else
                    {{ Breadcrumbs::render('section', $section) }}
                @endif
            </div>
        </div>
    </div>

    @if ($section)
        <div class="site-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 mb-5 mb-md-0 order-md-2">
                        @if ($section->image)
                            <img src="{{ asset('storage/' . $section->image) }}" alt="{{ $section->title }}" data-aos="fade-up">
                        @endif
                    </div>
                    <div class="col-md-6 pr-md-5 order-md-1">
                        <h1 class="line-height-xs text-black mb-4">{{ $section->title }}</h1>
                        <p class="mb-4">
                            {!! $section->detail_text !!}
                        </p>
                    </div>
                </div>

                <div class="row justify-content-between align-items-stretch h-100 mt-5">
                    @foreach ($section->sections as $subSection)
                        <div class="col-lg-6 mb-4">
                            <div class="row no-gutters align-items-stretch h-100 half-sm">
                                <div class="col-md-6 bg-image order-md-2 order-lg-1 bg-sm-height" style="background-image: url({{ asset('storage/' . $subSection->image) }});" data-aos="fade" data-aos-delay="0"></div>
                                <div class="col-md-6 bg-light text order-md-1 order-lg-2">
                                    <div class="p-4">
                                        <a href="{{ route('catalog', [$subSection->section->alias, $subSection->alias]) }}">
                                            <h2 class="h5 mb-3 text-black line-height-sm">{{ $subSection->title }}</h2>
                                        </a>
                                        <p>{{ $subSection->preview_text }}</p>
                                        <p class="mb-0">
                                            <a href="{{ route('catalog', [$subSection->section->alias, $subSection->alias]) }}">
                                                <small class="text-uppercase font-weight-bold text-black">Подробнее</small>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="row justify-content-between align-items-stretch h-100 mt-5">
                    @foreach ($section->products as $product)
                        <div class="col-lg-6 mb-4">
                            <div class="row no-gutters align-items-stretch h-100 half-sm">
                                <div class="col-md-6 bg-image order-md-2 order-lg-1 bg-sm-height" style="background-image: url({{ asset('storage/' . $product->image) }});" data-aos="fade" data-aos-delay="0"></div>
                                <div class="col-md-6 bg-light text order-md-1 order-lg-2">
                                    <div class="p-4">
                                        <a href="@if ($section->section){{ route('catalog', [$section->section->alias, $section->alias, $product->alias]) }}@else{{ route('catalog', [$section->alias, $product->alias]) }}@endif">
                                            <h2 class="h5 mb-3 text-black line-height-sm">{{ $product->title }}</h2>
                                        </a>
                                        <p>{{ $product->preview_text }}</p>
                                        <p class="mb-0">
                                            <a href="@if ($section->section){{ route('catalog', [$section->section->alias, $section->alias, $product->alias]) }}@else{{ route('catalog', [$section->alias, $product->alias]) }}@endif">
                                                <small class="text-uppercase font-weight-bold text-black">Подробнее</small>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="mt-5">
                    <a href="{{ route('catalog') }}">к списку продукции</a>
                </div>
            </div>
        </div>
    @endif

@endsection
