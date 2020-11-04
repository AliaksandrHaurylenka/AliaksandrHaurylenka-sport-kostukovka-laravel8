@extends('layouts.site')

@section('title', 'Новости.Спорт-Костюковка')
@section('description', 'г. Гомель, микрорайон Костюковка, Государственное учреждение "Физкультурно-оздоровительный центр "Костюковка-Спорт"')

@section('breadcrumbs')
    {!! Breadcrumbs::render(); !!}
@endsection

@section('content')

    <div class="d-flex d-flex justify-content-start align-items-end">
        <h1 class="h1-responsive mt-5">Спортивные события</h1>
        <span class="badge teal badge-pill font-small ml-2 mb-4">{{ $allPosts->count() }}</span>
    </div>


    <!--Section: Blog v.3-->
    <section class="section extra-margins mt-5 pb-3 text-center text-lg-left">
        <hr class="mb-4">
    @if(isset($posts))
        @foreach($posts as $post)
            <!--Grid row-->
                <div class="row my-3">

                    <!--Grid column-->
                    <div class="col-md-12">
                        <!--Card-->
                        <div class="card">

                            <!--Card image-->
                            <div class="view overlay">
                                <img src="{{$post->getImage()}}" class="card-img-top" alt="">
                                <a href="{{route('post.show', $post->slug)}}">
                                    {{--                            <a href="{{route('post.show', $post)}}">--}}
                                    <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>
                            <!--/.Card image-->

                            <!--Card content-->
                            <div class="card-body mx-4">
                                <h4 class="text-center mb-3">
                                    @if($post->section_id != 0)
                                        <a href="{{route('category.show', $post->section->slug)}}"
                                           class="grey-lighter-hover" style="text-decoration: underline;">
                                            {{$post->getSectionTitle()}}
                                        </a>
                                    @else
                                        <a href="{{route('no-category.show')}}" class="grey-lighter-hover"
                                           style="text-decoration: underline;">
                                            Без категории
                                        </a>
                                    @endif
                                </h4>
                                <!--Title-->
                                <h4 class="card-title">
                                    <a href="{{route('post.show', $post->slug)}}"
                                       class="grey-lighter-hover">{{$post->title}}</a>
                                </h4>
                                <div class="font-weight-bold">
                                    <a href="{{route('post.show', $post->slug)}}/#comment" title="Комментарии"
                                       class=" grey-lighter-hover">
                                        <span class="comments">
                                            <i class="fa fa-comment"></i>
                                            {{$post->commentsCount()->count()}}
                                        </span>
                                    </a>
                                        
                                    <span class="comments ml-2  grey-lighter-hover" style="right: 4rem;"
                                          title="Просмотры">
        						    <i class="fas fa-eye"></i>
        						    {{$post->views}}
        						</span>
                                </div>
                                <hr>
                                <!--Text-->

                                <div class="dark-grey-text mb-3">{!! Str::limit($post->content, $limit = 300, $end = '...') !!}</div>
                                <p class="font-small font-weight-bold blue-grey-text mb-1">
                                    <i class="far fa-clock-o"></i> {{$post->getDate()}}</p>
                                <p class="font-small dark-grey-text mb-0 font-weight-bold">
                                    С уважением
                                    <u>
                                        <a href="{{route('user_posts.show', [$post->author->id, $post->author->name])}}"
                                       class="grey-lighter-hover">
                                        {{$post->author->name}}
                                        </a>
                                    </u>
                                </p>
                                <p class="text-right mb-0 text-uppercase dark-grey-text font-weight-bold">
                                    <a href="{{route('post.show', $post->slug)}}" class="grey-lighter-hover">Далее
                                        <i class="fas fa-chevron-right" aria-hidden="true"></i>
                                    </a>
                                </p>
                            </div>
                            <!--/.Card content-->

                        </div>
                        <!--/.Card-->

                    </div>
                    <!--Grid column-->

                </div>
                <!--/Grid row-->
            @endforeach
        @endif
    </section>
    <!--Section: Blog v.3-->

    <!--Pagination dark grey-->
    {{$posts->links()}}
    <!--Pagination dark grey-->

    @include('site.blocks.block-rtb-1')
    @include('site.blocks.horizontal-widget-1')

@endsection