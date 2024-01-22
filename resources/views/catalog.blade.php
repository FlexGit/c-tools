@extends('layouts.master')

@section('title', $page->meta_title ?? '')
@section('description', $page->meta_description)

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12">
                {{ Breadcrumbs::render('catalog') }}
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <h1 class="line-height-xs text-black mb-5">Продукция</h1>
            @foreach ($sections as $section)
                <div class="row mb-5">
                    <div class="col-md-6 mb-5 mb-md-0 order-md-2">
                        <a href="{{ route('catalog', $section->alias) }}">
                            @if ($section->image)
                                <img src="{{ asset('storage/' . $section->image) }}" alt="{{ $section->title }}" data-aos="fade-up">
                            @endif
                        </a>
                    </div>
                    <div class="col-md-6 pr-md-5 order-md-1">
                        <a href="{{ route('catalog', $section->alias) }}">
                            <h4 class="line-height-xs text-black mb-4">{{ $section->title }}</h4>
                        </a>
                        <div class="mb-4">
                            {!! $section->preview_text !!}
                        </div>
                        <ul>
                            @foreach ($section->sections as $subSection)
                                <li>
                                    <a href="{{ route('catalog', [$section->alias, $subSection->alias]) }}">{{ $subSection->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                        <p class="mb-0">
                            <a href="{{ route('catalog', $section->alias) }}">
                                <small class="text-uppercase font-weight-bold text-black">Подробнее</small>
                            </a>
                        </p>
                    </div>
                </div>
            @endforeach
            <div class="d-flex justify-content-center mt-5">{{ $sections->links() }}</div>
        </div>
    </div>

@endsection
