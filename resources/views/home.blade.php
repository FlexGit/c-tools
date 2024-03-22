@extends('layouts.master')

@section('title', $page->meta_title ?? '')
@section('description', $page->meta_description ?? '')

@section('content')
@if ($sliders->count())
    <div class="slide-one-item home-slider owl-carousel">
        @foreach ($sliders as $slider)
            <div class="site-blocks-cover overlay lozad" data-background-image="{{ asset('storage/' . $slider->image) }}">
                <div class="container">
                    <div class="row align-items-center justify-content-center text-center">
                        <div class="col-md-10">
                            <p class="slide-title mb-5">{{ $slider->title }}</p>
                            @if ($slider->url)
                                <p>
                                    <a href="{{ $slider->url }}" class="btn btn-white btn-outline-white py-3 px-5 rounded-0">Подробнее</a>
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif

@if ($aboutPage)
    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 pr-md-5 order-md-1">
                    <h2 class="display-3 line-height-xs text-black mb-4">{{ $aboutPage->title }}</h2>
                    <p class="mb-4">
                        {!! $aboutPage->detail_text !!}
                    </p>
                </div>
                <div class="col-md-6 bg-image bg-sm-height mb-5 mb-md-0 order-md-2 lozad" data-background-image="{{ asset('storage/' . $aboutPage->image) }}"></div>
            </div>
        </div>
    </div>
@endif

@if ($news->count())
    <div class="site-section">
        <div class="container">
            <div class="row mb-5 justify-content-center">
                <div class="col-12 text-center">
                    <h2 class="font-weight-light text-black display-4">Новости</h2>
                </div>
            </div>
            <div class="row justify-content-center align-items-stretch h-100">
                @foreach ($news as $oneNews)
                    <div class="col-lg-6 mb-4">
                        <div class="row no-gutters align-items-stretch h-100 half-sm">
                            <div class="col-md-6 bg-image bg-sm-height lozad" data-background-image="{{ asset('storage/' . $oneNews->image) }}"></div>
                            <div class="col-md-6 bg-light text">
                                <div class="p-4">
                                    <p>{{ $oneNews->created_at->format('d.m.Y') }}</p>
                                    <a href="{{ route('news', $oneNews->alias) }}">
                                        <h2 class="h5 mb-3 text-black line-height-sm">{{ $oneNews->title }}</h2>
                                    </a>
                                    <p>{{ $oneNews->preview_text }}</p>
                                    <p class="mb-0">
                                        <a href="{{ route('news', $oneNews->alias) }}">
                                            <small class="text-uppercase font-weight-bold text-black">Подробнее</small>
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif

@if ($menuSections->count())
    <div class="site-section">
        <div class="container">
            <div class="row mb-5 justify-content-center">
                <div class="col-12 text-center">
                    <h2 class="font-weight-light text-black display-4">Наша продукция</h2>
                </div>
            </div>
            <div class="row justify-content-center align-items-stretch h-100">
                @foreach ($menuSections as $section)
                    <div class="col-lg-6 mb-4">
                        <div class="row no-gutters align-items-stretch h-100 half-sm">
                            <div class="col-md-6 bg-image @if ($loop->iteration % 2) order-md-2 order-lg-1 @else order-md-1 order-lg-2 @endif bg-sm-height lozad" data-background-image="{{ asset('storage/' . $section->image) }}"></div>
                            <div class="col-md-6 bg-light text @if ($loop->iteration % 2) order-md-1 order-lg-2 @else order-md-2 order-lg-1 @endif">
                                <div class="p-4">
                                    <h2 class="h5 mb-3 text-black line-height-sm">{{ $section->title }}</h2>
                                    <p>{{ $section->preview_text }}</p>
                                    <p class="mb-0">
                                        <a href="{{ route('catalog', $section->alias) }}">
                                            <small class="text-uppercase font-weight-bold text-black">Подробнее</small>
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif

@if ($services->count())
    <div class="site-section">
        <div class="container">
            <div class="row mb-5 justify-content-center">
                <div class="col-12 text-center">
                    <h2 class="font-weight-light text-black display-4">Наши услуги</h2>
                </div>
            </div>
            <div class="row justify-content-between align-items-stretch h-100">
                @foreach ($services as $service)
                    <div class="col-lg-6 mb-4">
                        <div class="row no-gutters align-items-stretch h-100 half-sm">
                            <div class="col-md-6 bg-image order-md-2 order-lg-1 bg-sm-height lozad" data-background-image="{{ asset('storage/' . $service->image) }}"></div>
                            <div class="col-md-6 bg-light text order-md-1 order-lg-2">
                                <div class="p-4">
                                    <h2 class="h5 mb-3 text-black line-height-sm">{{ $service->title }}</h2>
                                    {{ strip_tags($service->preview_text) }}
                                    <p class="mb-0">
                                        <a href="{{ route('services', $service->alias) }}">
                                            <small class="text-uppercase font-weight-bold text-black">Подробнее</small>
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif

<div class="container">
    <div class="row mt-5 mb-5 justify-content-center">
        <div class="col-12 text-center">
            <h2 class="font-weight-light text-black display-4">Наши сертификаты</h2>
        </div>
    </div>
</div>
<div class="site-section bg-light">
    <div class="container">
        <div class="block-13">
            @foreach ($certificates as $certificate)
                @if (!$certificate->image)
                    @continue
                @endif
                <div class="block-47">
                    <blockquote class="block-47-quote">
                        <a class="image-popup" href="{{ asset('storage/' . $certificate->image) }}">
                            <img src="#" class="certificate lozad" data-src="{{ asset('storage/' . $certificate->image) }}" alt="{{ $certificate->title }}" width="178" height="251">
                        </a>
                    </blockquote>
                </div>
            @endforeach
        </div>
    </div>
</div>

<div class="container">
    <div class="row mt-5 mb-5 justify-content-center">
        <div class="col-12 text-center">
            <h2 class="font-weight-light text-black display-4">Наши партнёры</h2>
        </div>
    </div>
</div>
<div class="site-section bg-light">
    <div class="container">
        <div class="block-13">
            @foreach ($partners as $partner)
                @if (!$partner->image)
                    @continue
                @endif
                <div class="block-47">
                    <blockquote class="block-47-quote">
                        <img src="#" class="partner lozad" data-src="{{ asset('storage/' . $partner->image) }}" alt="{{ $partner->title }}" width="178" height="178">
                    </blockquote>
                </div>
            @endforeach
        </div>
    </div>
</div>

<div class="container text-center js-contacts-container">
    <div class="row mt-5 mb-5 justify-content-center">
        <div class="col-12 text-center">
            <h2 class="font-weight-light text-black display-4">Наши контакты</h2>
        </div>
    </div>
</div>
<div class="promo py-5 bg-primary">
    <div class="container text-center">
        <div class="d-flex justify-content-around flex-wrap font-weight-bolder">
            @if (isset($settingItems['phone1']))
                <a href="tel:{{ preg_replace('/[^0-9]/', '', $settingItems['phone1']->value) }}">
                    <span class="icon-phone mr-2 text-lg text-white"></span>
                    <span class="text-lg text-white">{{ $settingItems['phone1']->value }}</span>
                </a>
            @endif
            @if (isset($settingItems['phone2']))
                <a href="tel:{{ preg_replace('/[^0-9]/', '', $settingItems['phone2']->value) }}">
                    <span class="icon-phone mr-2 text-lg text-white"></span>
                    <span class="text-lg text-white">{{ $settingItems['phone2']->value }}</span>
                </a>
            @endif
            @if (isset($settingItems['email']))
                <a href="mailto:{{ $settingItems['email']->value }}">
                    <span class="icon-envelope mr-2 text-lg text-white"></span>
                    <span class="text-lg text-white">{{ $settingItems['email']->value }}</span>
                </a>
            @endif
        </div>
    </div>
</div>
<div class="site-section bg-light">
    <div class="container text-center">
        <div class="row d-flex justify-content-between">
            <div class="block-47 col-12 text text-lg text-center py-4 lead">
                <blockquote class="block-47-quote">
                    <div class="text-black mb-3 mr-1">
                        <strong>Адрес офиса</strong>
                        @if (isset($settingItems['office-address']))
                            <p>{{ strip_tags($settingItems['office-address']->value) }}</p>
                        @endif
                    </div>
                    @if (isset($settingItems['office-map']))
                        {!! $settingItems['office-map']->value !!}
                    @endif
                </blockquote>
            </div>
            <div class="block-47 col-12 text text-lg text-center py-4 lead">
                <blockquote class="block-47-quote">
                    <div class="text-black mb-3 mr-1">
                        <strong>Адрес производства</strong>
                        @if (isset($settingItems['manufacture-address']))
                            <p>{{ strip_tags($settingItems['manufacture-address']->value) }}</p>
                        @endif
                    </div>
                    @if (isset($settingItems['manufacture-map']))
                        {!! $settingItems['manufacture-map']->value !!}
                    @endif
                </blockquote>
            </div>
            <div class="block-47 col-12 text text-lg text-center py-4 lead">
                <blockquote class="block-47-quote">
                    <div class="text-black mb-3 mr-1">
                        <strong>Адрес склада</strong>
                        @if (isset($settingItems['warehouse-address']))
                            <p>{{ strip_tags($settingItems['warehouse-address']->value) }}</p>
                        @endif
                    </div>
                    @if (isset($settingItems['warehouse-map']))
                        {!! $settingItems['warehouse-map']->value !!}
                    @endif
                </blockquote>
            </div>
        </div>
    </div>
</div>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/main.js?v=' . time()) }}"></script>
@endpush
