<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Главная', route('home'));
});

// Home > Catalog
Breadcrumbs::for('catalog', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Продукция', route('catalog'));
});

// Home > Catalog > Section/Subsection
Breadcrumbs::for('section', function (BreadcrumbTrail $trail, $section, $subSection = null) {
    if ($subSection) {
        $trail->parent('section', $section);
        $trail->push($subSection->title, route('catalog', [$section->alias, $subSection->alias]));
    } else {
        $trail->parent('catalog');
        $trail->push($section->title, route('catalog', [$section->alias]));
    }
});

// Home > Catalog > Section/Subsection > Product
Breadcrumbs::for('product', function (BreadcrumbTrail $trail, $section, $product, $subSection = null) {
    if ($subSection) {
        $trail->parent('section', $section, $subSection);
        $trail->push($product->title, route('catalog', [$section->alias, $subSection->alias, $product->alias]));
    } else {
        $trail->parent('section', $section);
        $trail->push($product->title, route('catalog', [$section->alias, '', $product->alias]));
    }
});

// Home > News
Breadcrumbs::for('news', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Новости', route('news'));
});

// Home > News > OneNews
Breadcrumbs::for('oneNews', function (BreadcrumbTrail $trail, $oneNews) {
    $trail->parent('news');
    $trail->push($oneNews->title, route('news', $oneNews->alias));
});

// Home > Services
Breadcrumbs::for('services', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Услуги', route('service'));
});

// Home > Services > Service
Breadcrumbs::for('service', function (BreadcrumbTrail $trail, $service) {
    $trail->parent('services');
    $trail->push($service->title, route('service', $service->alias));
});

// Home > Contacts
Breadcrumbs::for('contacts', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Контакты', route('contacts'));
});
