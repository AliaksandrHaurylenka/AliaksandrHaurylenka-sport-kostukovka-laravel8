@include('site.blocks.sidebar.info')
@include('site.blocks.sidebar.referral-link')
@if(url()->full() != route('kontakty') && !strpos(url()->full(), '/post' ))
    @include('site.blocks.sidebar.subscribes-form')
@endif
{{--@include('site.blocks.sidebar.advertising')--}}
@include('site.blocks.sidebar.latests-posts')
@include('site.blocks.sidebar.popular-posts')
@include('site.blocks.sidebar.categories')
@include('site.blocks.sidebar.featured')
@include('site.blocks.sidebar.archive')
@include('site.blocks.sidebar.banners')
