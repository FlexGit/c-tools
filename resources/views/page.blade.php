@extends('layouts.master')

@section('title', $page->meta_title ?? '')
@section('description', $page->meta_description)

@section('content')

<div class="promo py-4 bg-primary" data-aos="fade">
    <div class="container">
        <h1 class="d-block mb-0 text-white text-center">{{ $page->title }}</h1>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12">
            {{ Breadcrumbs::render($page->alias) }}
        </div>
    </div>
</div>

<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                {!! $page->detail_text !!}
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @switch ($page->alias)
                    @case (app('\App\Models\Page')::SERVICES_ALIAS)
                        @if ($services->count())
                            @foreach ($services as $service)
                                <h2>{{ $service->title }}</h2>
                                <div class="pt-3 pb-3">
                                    {!! $service->detail_text !!}
                                    @if (!$loop->last)
                                        <hr>
                                    @endif
                                </div>
                            @endforeach
                        @endif
                        @break
                    @case (app('\App\Models\Page')::NEWS_ALIAS)
                        @if ($news->count())
                            @foreach ($news as $oneNews)
                                <p>{{ $oneNews->created_at }}</p>
                                <h3>{{ $oneNews->title }}</h3>
                                <div class="pt-3 pb-3">
                                    {{ $oneNews->preview_text }}
                                    @if (!$loop->last)
                                        <hr>
                                    @endif
                                </div>
                            @endforeach
                        @endif
                        @break
                    @case (app('\App\Models\Page')::SECTIONS_ALIAS)

                        @break
                @endswitch
            </div>
        </div>
    </div>
</div>

<div class="promo py-5 bg-primary" data-aos="fade">
    <div class="container text-center">
        {{--<h2 class="d-block mb-0 font-weight-light text-white"><a href="#" class="text-white d-block">Contact us for quotations</a></h2>--}}
    </div>
</div>

@endsection
