@extends('layouts.master')

@section('title', $page->meta_title ?? '')
@section('description', $page->meta_description)

@section('content')
@if ($sliders->count())
    <div class="slide-one-item home-slider owl-carousel">
        @foreach ($sliders as $slider)
            <div class="site-blocks-cover overlay" style="background-image: url({{ asset('storage/' . (is_array($slider->image) ? str_ireplace('"', '', implode(' ', $slider->image)) : str_ireplace('"', '', $slider->image))) }});" data-aos="fade" data-stellar-background-ratio="0.5">
                <div class="container">
                    <div class="row align-items-center justify-content-center text-center">
                        <div class="col-md-10">
                            <h1 class="mb-5">{{ $slider->title }}</h1>
                            @if ($slider->url)
                                <p>
                                    <a href="{{ $slider->url }}" class="btn btn-primary py-3 px-5 rounded-0">Подробнее</a>
                                    <a href="#" class="btn btn-white btn-outline-white py-3 px-5 rounded-0">Подробнее</a>
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 bg-image bg-sm-height mb-5 mb-md-0 order-md-2" style="background-image: url('images/img_1_colored.jpg');" data-aos="fade-up"></div>
            <div class="col-md-6 pr-md-5 order-md-1">
                <h2 class="display-3 line-height-xs text-black mb-4">О компании</h2>
                <p class="mb-4">
                    {!! $aboutPage ? $aboutPage->detail_text : '' !!}
                </p>
            </div>
        </div>
    </div>
</div>

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
                            <div class="col-md-6 bg-image bg-sm-height" style="background-image: url({{ asset('storage/' . (is_array($oneNews->image) ? str_ireplace('"', '', implode(' ', $oneNews->image)) : str_ireplace('"', '', $oneNews->image))) }});" data-aos="fade" data-aos-delay="0"></div>
                            <div class="col-md-6 bg-light text">
                                <div class="p-4">
                                    <p>{{ $oneNews->created_at->format('d.m.Y') }}</p>
                                    <h2 class="h5 mb-3 text-black line-height-sm">{{ $oneNews->title }}</h2>
                                    <p>{{ $oneNews->preview_text }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif

@if ($sections->count())
    <div class="site-section">
        <div class="container">
            <div class="row mb-5 justify-content-center">
                <div class="col-12 text-center">
                    <h2 class="font-weight-light text-black display-4">Наша продукция</h2>
                </div>
            </div>
            <div class="row justify-content-center align-items-stretch h-100">
                @foreach ($sections as $section)
                    <div class="col-lg-6 mb-4">
                        <div class="row no-gutters align-items-stretch h-100 half-sm">
                            <div class="col-md-6 bg-image @if ($loop->iteration % 2) order-md-2 order-lg-1 @else order-md-1 order-lg-2 @endif bg-sm-height" style="background-image: url({{ asset('storage/' . (is_array($section->image) ? str_ireplace('"', '', implode(' ', $section->image)) : str_ireplace('"', '', $section->image))) }});" data-aos="fade" data-aos-delay="0"></div>
                            <div class="col-md-6 bg-light text @if ($loop->iteration % 2) order-md-1 order-lg-2 @else order-md-2 order-lg-1 @endif">
                                <div class="p-4">
                                    <h2 class="h5 mb-3 text-black line-height-sm">{{ $section->title }}</h2>
                                    <p>{{ $section->preview_text }}</p>
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
            <div class="row justify-content-center align-items-stretch h-100">
                @foreach ($services as $service)
                    <div class="col-lg-6 mb-4">
                        <div class="row no-gutters align-items-stretch h-100 half-sm">
                            <div class="col-md-6 bg-image @if ($loop->iteration == 2) order-md-2 order-lg-1 @elseif ($loop->iteration == 3) order-md-1 order-lg-2 @elseif ($loop->iteration == 4) order-md-2 @endif bg-sm-height" style="background-image: url({{ asset('storage/' . (is_array($service->image) ? str_ireplace('"', '', implode(' ', $service->image)) : str_ireplace('"', '', $service->image))) }});" data-aos="fade" data-aos-delay="@if ($loop->iteration == 2) 200 @elseif ($loop->iteration == 3) 300 @elseif ($loop->iteration == 4) 400 @else 0 @endif"></div>
                            <div class="col-md-6 bg-light text @if($loop->iteration == 2) order-md-1 order-lg-2 @endif @if($loop->iteration == 3) order-md-2 order-lg-1 @endif">
                                <div class="p-4">
                                    <h2 class="h5 mb-3 text-black line-height-sm">{{ $service->title }}</h2>
                                    <p>{{ strip_tags($service->preview_text) }}</p>
                                    <p class="mb-0"><a href="{{ route('page', $page->alias) }}" class=""><small class="text-uppercase font-weight-bold text-black">Подробнее</small></a></p>
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
        <div class="block-13" data-aos="fade">
            @foreach ($certificates as $certificate)
                <div class="block-47">
                    <blockquote class="block-47-quote">
                        <a class="image-popup" href="{{ asset('storage/' . $certificate->image) }}">
                            <img src="{{ asset('storage/' . $certificate->image) }}" alt="{{ $certificate->title }}">
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
        <div class="block-13" data-aos="fade">
            @foreach ($partners as $partner)
                @php($partnerImagePath = (is_array($partner->image) ? str_ireplace('"', '', implode(' ', $partner->image)) : str_ireplace('"', '', $partner->image)))
                @if (!$partnerImagePath || $partnerImagePath == '[]')
                    @continue
                @endif
                <div class="block-47">
                    <blockquote class="block-47-quote">
                        <img src="{{ asset('storage/' . $partnerImagePath) }}" alt="{{ $partner->title }}">
                    </blockquote>
                </div>
            @endforeach
        </div>
    </div>
</div>

<div class="container text-center">
    <div class="row mt-5 mb-5 justify-content-center">
        <div class="col-12 text-center">
            <h2 class="font-weight-light text-black display-4">Наши контакты</h2>
        </div>
    </div>
</div>
<div class="promo py-5 bg-primary" data-aos="fade">
    <div class="container text-center">
        <div class="d-flex justify-content-around flex-wrap font-weight-bolder">
            @if (isset($settingItems['phone1']))
                <a href="tel:{{ preg_replace('/[^0-9]/', '', $settingItems['phone1']->value) }}">
                    <span class="text-lg text-white">{{ $settingItems['phone1']->value }}</span>
                </a>
            @endif
            @if (isset($settingItems['phone2']))
                <a href="tel:{{ preg_replace('/[^0-9]/', '', $settingItems['phone2']->value) }}">
                    <span class="text-lg text-white">{{ $settingItems['phone2']->value }}</span>
                </a>
            @endif
            @if (isset($settingItems['email']))
                <a href="mailto:{{ $settingItems['email']->value }}">
                    <span class="text-lg text-white">{{ $settingItems['email']->value }}</span>
                </a>
            @endif
        </div>
    </div>
</div>
<div class="site-block-half d-block d-lg-flex bg-light" data-aos="fade">
    <div class="m-auto text order-1 text-center py-4">
        <span class="text-lg text-black mb-3">Адрес <strong>офиса</strong></span>
        @if (isset($settingItems['office-address']))
            <p class="lead">
                {{ $settingItems['office-address']->value }}
            </p>
        @endif
    </div>
    <div class="image order-2">
        @if (isset($settingItems['office-map']))
            {!! strip_tags($settingItems['office-map']->value, '<iframe>') !!}
        @endif
    </div>
</div>
<div class="site-block-half d-block d-lg-flex bg-light" data-aos="fade">
    <div class="m-auto text order-2 text-center py-4">
        <span class="text-lg text-black mb-3">Адрес <strong>производства</strong></span>
        @if (isset($settingItems['manufacture-address']))
            <p class="lead">
                {{ $settingItems['manufacture-address']->value }}
            </p>
        @endif
    </div>
    <div class="image order-1">
        @if (isset($settingItems['manufacture-map']))
            {!! strip_tags($settingItems['manufacture-map']->value, '<iframe>') !!}
        @endif
    </div>
</div>
<div class="site-block-half d-block d-lg-flex bg-light" data-aos="fade">
    <div class="m-auto text order-1 text-center py-4">
        <span class="text-lg text-black mb-3">Адрес <strong>склада</strong></span>
        @if (isset($settingItems['manufacture-address']))
            <p class="lead">
                {{ $settingItems['warehouse-address']->value }}
            </p>
        @endif
    </div>
    <div class="image order-2">
        @if (isset($settingItems['warehouse-map']))
            {!! strip_tags($settingItems['warehouse-map']->value, '<iframe>') !!}
        @endif
    </div>
</div>
<div class="py-5 bg-primary" data-aos="fade">
    <div class="container text-center">
        <h2 class="d-block mb-0 font-weight-light text-white">
            Остались вопросы? Напишите нам
        </h2>
    </div>
</div>
@endsection
