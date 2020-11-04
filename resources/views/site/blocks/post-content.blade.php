<!--Card-->
<div class="card mb-4 wow fadeIn">

    <!--Card content-->
    <div class="card-body">

        <h4 class="text-center">
            @if($post->section_id != 0)
                <a href="{{route('category.show', $post->section->slug)}}" class="grey-lighter-hover"
                   style="text-decoration: underline;">
                    {{$post->getSectionTitle()}}
                </a>
            @else
                <a href="{{route('no-category.show')}}" class="grey-lighter-hover" style="text-decoration: underline;">
                    Без категории
                </a>
            @endif
        </h4>

        <h4 class="my-4">{{$post->title}}</h4>

    {!!$post->content!!}

    @include('site.blocks.horizontal-widget-1')

    @if($post->getImgGallery("/images/news/$post->folder"))
        <!--Grid row-->
            <div class="gallery">
                @foreach($post->getImgGallery("/images/news/$post->folder") as $img)
                    <div class="mb-3 pics animation all 1">
                        <a href="/{{$img}}" data-gal="prettyPhoto[{{$post->id}}]">
                            <img src="/{{$img}}" class="img-fluid rounded-0" alt="">
                        </a>
                    </div>
                @endforeach
            </div>
    @endif

    @if($post->getImgGallery('/images/simple_users/новости/'.$post->author->name.'/'.$post->folder))
        <!--Grid row-->
            <div class="gallery">
                @foreach($post->getImgGallery('/images/simple_users/новости/'.$post->author->name.'/'.$post->folder) as $img)
                    <div class="mb-3 pics animation all 1">
                        <a href="/{{$img}}" data-gal="prettyPhoto[{{$post->id}}]">
                            <img src="/{{$img}}" class="img-fluid rounded-0" alt="">
                        </a>
                    </div>
                @endforeach
            </div>
        @endif

        <div class="mt-3">
            @foreach($post->tags as $tag)
                <a href="{{route('tag.show', $tag->slug)}}" class="btn btn-light-blue btn-sm">{{$tag->title}}</a>
            @endforeach
        </div>


    </div><!--/Card content-->

</div>
<!--/.Card-->