@extends('layouts.master')

@section('title', $contacts->meta_title ?? '')
@section('description', $contacts->meta_description)

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12">
                {{ Breadcrumbs::render($contacts->alias) }}
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <h1 class="line-height-xs text-black mb-5">{{ $contacts->title }}</h1>
            <div class="row">
                <div class="col-12">
                    <div>
                        <p>
                            <strong>Телефон:</strong>
                            @if (isset($settingItems['phone1']))
                                <a href="tel:{{ preg_replace('/[^0-9]/', '', strip_tags($settingItems['phone1']->value)) }}">
                                    {{ strip_tags($settingItems['phone1']->value) }}
                                </a>
                            @endif
                            @if (isset($settingItems['phone2']))
                                &nbsp;&nbsp;<a href="tel:{{ preg_replace('/[^0-9]/', '', strip_tags($settingItems['phone2']->value)) }}">
                                    {{ strip_tags($settingItems['phone2']->value) }}
                                </a>
                            @endif
                        </p>
                        <hr />
                        <p>
                            <strong>E-mail:</strong>
                            @if (isset($settingItems['email']))
                                <a href="mailto:{{ strip_tags($settingItems['email']->value) }}">
                                    {{ strip_tags($settingItems['email']->value) }}
                                </a>
                            @endif
                        </p>
                        <hr />
                        <p>
                            <strong>Адрес офиса:</strong>
                            @if (isset($settingItems['office-address']))
                                {{ strip_tags($settingItems['office-address']->value) }}
                            @endif
                        </p>
                        @if (isset($settingItems['office-map']))
                            <p>
                                {!! strip_tags($settingItems['office-map']->value, '<iframe>') !!}
                            </p>
                        @endif
                        <hr />
                        <p>
                            <strong>Адрес производства:</strong>
                            @if (isset($settingItems['manufacture-address']))
                                {{ strip_tags($settingItems['manufacture-address']->value) }}
                            @endif
                        </p>
                        @if (isset($settingItems['manufacture-map']))
                            <p>
                                {!! strip_tags($settingItems['manufacture-map']->value, '<iframe>') !!}
                            </p>
                        @endif
                        <hr />
                        <p>
                            <strong>Адрес склада:</strong>
                            @if (isset($settingItems['warehouse-address']))
                                {{ strip_tags($settingItems['warehouse-address']->value) }}
                            @endif
                        </p>
                        @if (isset($settingItems['warehouse-map']))
                            <p>
                                {!! strip_tags($settingItems['warehouse-map']->value, '<iframe>') !!}
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
