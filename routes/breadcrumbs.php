<?php

use DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator as Crumbs;


Breadcrumbs::register('main', function (Crumbs $crumbs) {
    $crumbs->push('Главная', route('main'));
});

Breadcrumbs::register('uslugi', function (Crumbs $crumbs) {
    $crumbs->parent('main');
    $crumbs->push('Услуги');
});

Breadcrumbs::register('raspisanie', function (Crumbs $crumbs) {
    $crumbs->parent('main');
    $crumbs->push('Расписание');
});

Breadcrumbs::register('kontakty', function (Crumbs $crumbs) {
    $crumbs->parent('main');
    $crumbs->push('Контакты');
});

Breadcrumbs::register('doska-pocheta', function (Crumbs $crumbs) {
    $crumbs->parent('main');
    $crumbs->push('Доска почета');
});

Breadcrumbs::register('oao-gomelsteklo', function (Crumbs $crumbs) {
    $crumbs->parent('main');
    $crumbs->push('ОАО "Гомельстекло"');
});

Breadcrumbs::register('kostyukovskie-luzhniki', function (Crumbs $crumbs) {
    $crumbs->parent('main');
    $crumbs->push('Костюковские Лужники');
});

Breadcrumbs::register('section', function (Crumbs $crumbs, $section) {
    $crumbs->parent('main');
    $crumbs->push($section->title);
});

Breadcrumbs::register('novosti', function (Crumbs $crumbs) {
    $crumbs->parent('main');
    $crumbs->push('Новости', route('novosti'));
});

Breadcrumbs::register('category.show', function (Crumbs $crumbs, $section) {
    $crumbs->parent('novosti');
    $crumbs->push($section->title, route('category.show', $section->slug));
});

Breadcrumbs::register('tag.show', function (Crumbs $crumbs, $tag_title) {
    $crumbs->parent('novosti');
    $crumbs->push($tag_title->title);
});

Breadcrumbs::register('year', function (Crumbs $crumbs, $year) {
    $crumbs->parent('novosti');
    $crumbs->push($year);
});

Breadcrumbs::register('user_name', function (Crumbs $crumbs, $user_name) {
    $crumbs->parent('novosti');
    $crumbs->push($user_name->name);
});

Breadcrumbs::register('no-category.show', function (Crumbs $crumbs) {
    $crumbs->parent('novosti');
    $crumbs->push('Без категории', route('no-category.show'));
});

Breadcrumbs::register('archive_month_year', function (Crumbs $crumbs, $month, $year) {
    $crumbs->parent('novosti');
    $crumbs->push($month.' '.$year);
});

Breadcrumbs::register('post.show', function (Crumbs $crumbs, $section, $post) {
    if($section){
        $crumbs->parent('category.show', $section);
        $crumbs->push($post->title);
    }
    else {
        $crumbs->parent('no-category.show');
        $crumbs->push($post->title);
    }
});