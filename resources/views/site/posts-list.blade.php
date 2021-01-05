@extends('layouts.site')

@if($section)
    @section('title', $section->title.'.Новости.Спорт-Костюковка')
@elseif($tag_title)
    @section('title', $tag_title->title.'.Новости.Спорт-Костюковка')
@elseif($year)
    @section('title', 'Архив'.$year.'.Новости.Спорт-Костюковка')
@elseif($user_name)
    @section('title', $user_name->name.'.Новости.Спорт-Костюковка')
@elseif($archive_month_year)
    @section('title', mb_convert_case($m, MB_CASE_TITLE, "UTF-8").'.'.$y.'.Новости.Спорт-Костюковка')
@else
    @section('title', 'Без категории.Новости.Спорт-Костюковка')
@endif

@section('description', 'г. Гомель, микрорайон Костюковка, Государственное учреждение "Физкультурно-оздоровительный центр "Костюковка-Спорт"')

@section('breadcrumbs')
    @if($section)
        {!! Breadcrumbs::render('category.show', $section); !!}
    @elseif($tag_title)
        {!! Breadcrumbs::render('tag.show', $tag_title); !!}
    @elseif($year)
        {!! Breadcrumbs::render('year', $year); !!}
    @elseif($user_name)
        {!! Breadcrumbs::render('user_name', $user_name); !!}
    @elseif($archive_month_year)
        {!! Breadcrumbs::render('archive_month_year', mb_convert_case($m, MB_CASE_TITLE, "UTF-8"), $y); !!}
    @else
        {!! Breadcrumbs::render('no-category.show'); !!}
    @endif
@endsection

@section('content')
    <!--Main listing-->

    <!--Section: Blog v.3-->
    <section class="section extra-margins pb-3 text-center text-lg-left">
        <h1 class="h1-responsive text-center mt-5 d-flex justify-content-center align-items-center">
            @if($section)
                {{ $section->title }}
                <span class="badge teal badge-pill font-small ml-2">{{ $allPosts->count() }}</span>
            @elseif($user_name)
                {{ $user_name->name }}
                <span class="badge teal badge-pill font-small ml-2">{{ $allPosts->count() }}</span>
            @elseif($tag_title)
                {{ $tag_title->title }}
                <span class="badge teal badge-pill font-small ml-2">{{ $allPosts->count() }}</span>
            @elseif($year)
                {{ $year }} г.
                <span class="badge teal badge-pill font-small ml-2">{{ $allPosts->count() }}</span>
            @elseif($archive_month_year)
                {{ mb_convert_case($m, MB_CASE_TITLE, "UTF-8").' '.$y }} г.
            @else
                Без категории
                <span class="badge teal badge-pill font-small ml-2">{{ $allPosts->count() }}</span>
            @endif
        </h1>
        @if ($year)
            <ul class="nav justify-content-center grey lighten-4">
                @foreach (App\Models\Post::archivesMonthYear($year) as $month)
                    <li class="nav-item d-flex justify-content-between align-items-center">
                        <u>
                            <a class="nav-link grey-text" href="{{ route('archive.month.year.show', [$month->month, $month->year]) }}">{{ $month->monthRU }}</a>
                        </u>
                        <span class="badge teal badge-pill font-small">{{$month->number}}</span>
                    </li>
                @endforeach
            </ul>

        @elseif($y)
            <ul class="nav justify-content-center grey lighten-4">
                @foreach (App\Models\Post::archivesMonthYear($y) as $month)
                {{-- @foreach ($y->archivesMonthYear($y) as $month) --}}
                    <li class="nav-item d-flex justify-content-between align-items-center">
                        <u>
                            <a class="nav-link grey-text" href="{{ route('archive.month.year.show', [$month->month, $month->year]) }}">{{ $month->monthRU . ' ' . $month->year }}</a>
                        </u>
                        <span class="badge teal badge-pill font-small">{{$month->number}}</span>
                    </li>
                @endforeach
            </ul>
        @endif
        <hr class="mt-1 mb-5">
    @if(isset($posts))
        @foreach($posts as $post)
            <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-lg-5 mb-4">
                        <!--Featured image-->
                        <div class="view overlay z-depth-1" style="height: auto;">
                            <img src="{{$post->getImage()}}" class="img-fluid" alt="">
                            <a href="{{route('post.show', $post->slug)}}">
                                <span class="mask rgba-white-slight"></span>
                            </a>
                        </div>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-6 ml-xl-4 mb-4">
                        <!--Grid row-->
                        <div class="row">

                            <!--Grid column-->
                            <div class="col-xl-6 col-md-6 text-sm-center text-md-right text-lg-left">
                                <p class="font-small font-weight-bold mb-1 spacing">
                                    <u>
                                        <a href="{{route('user_posts.show', [$post->author->id, $post->author->name])}}"
                                           class="orange-lighter-hover">
                                            <strong>{{$post->author->name}}</strong>
                                        </a>
                                    </u>
                                </p>
                            </div>
                            <!--Grid column-->

                            <!--Grid column-->
                            <div class="col-xl-5 col-md-6 text-sm-center text-md-left">
                                <p class="font-small grey-text">
                                    <em>{{$post->getDate()}}</em><br>
                                    @if(!strpos(url()->current(), 'archive_month_year'))
                                        <u>
                                            <a href="{{ route('archive.month.year.show', [$post->getMonth(), $post->getYear()]) }}"
                                               class="grey-text">
                                                <em>Все
                                                    за {{ App\Models\Post::getMonthName($post->getMonth()).' '.$post->getYear() }}</em><br>
                                            </a>
                                        </u>
                                    @endif

                                </p>
                            </div>
                            <!--Grid column-->

                        </div>
                        <!--Grid row-->

                        <h4 class="mb-3 dark-grey-text mt-0">
                            <strong>
                                <a href="{{route('post.show', $post->slug)}}" class="text-black-50">{{$post->title}}</a>
                            </strong>
                        </h4>
                        <div class="dark-grey-text">
                            {!! Str::limit($post->content, $limit = 150, $end = '...') !!}
                        </div>

                        <!--Deep-orange-->
                        <a href="{{route('post.show', $post->slug)}}"
                           class="btn btn-deep-orange btn-rounded btn-sm text-white">Далее</a>

                    </div>
                    <!--Grid column-->
                </div>
                <!--Grid row-->
                <hr class="mb-5">
            @endforeach

    </section>
    <!--Section: Blog v.3-->

    <!--Pagination dark grey-->
    {{$posts->links()}}
    <!--Pagination dark grey-->
    @endif

    @include('site.blocks.horizontal-widget-1')
    @include('site.blocks.block-rtb-1')

    <!--Main listing-->

@endsection