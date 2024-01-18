<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Главная
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Главная', route('home'));
});

// Главная > Контакты
Breadcrumbs::for('contacts', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Контакты', route('page', 'contacts'));
});

// Главная > Каталог
Breadcrumbs::for('catalog', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Каталог', route('page', 'catalog'));
});

// Главная > Услуги
Breadcrumbs::for('services', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Услуги', route('page', 'services'));
});

// Главная > Новости
Breadcrumbs::for('news', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Новости', route('page', 'news'));
});

// Главная > Раздел
Breadcrumbs::for('sections', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Разделы', route('page', 'section'));
});

// Главная > Раздел
Breadcrumbs::for('section', function (BreadcrumbTrail $trail, $section) {
    $trail->parent('home');
    $trail->push($section->title, route('section', $section->alias));
});

// Главная > Раздел > Продукция
Breadcrumbs::for('product', function (BreadcrumbTrail $trail, $product) {
    $trail->parent('home');
    $trail->push($product->title, route('section', $product->alias));
});
