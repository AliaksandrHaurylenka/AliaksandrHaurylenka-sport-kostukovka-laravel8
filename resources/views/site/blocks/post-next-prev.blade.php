<section class="mb-5 wow fadeIn">

    <div class="row">
        <div class="col-sm-6">
        @if($post->hasPrevious())
            <!--Mask color-->
                <div class="view">
                    <img src="{{$post->getPrevious()->getImage() }}" class="img-fluid" alt="">
                    <a href="{{ route('post.show', $post->getPrevious()->slug) }}">
                        <span class="mask flex-center rgba-black-light"></span>
                    </a>
                </div>
                <!--Caption-->
                <div class="carousel-caption">
                    <div class="animated fadeInDown">
                        <h5 class="h5-responsive">
                            <a href="{{ route('post.show', $post->getPrevious()->slug) }}" class="white-text">
                                <span class="font-weight-bold"><u>{{ $post->getPrevious()->getDate()}}</u></span><br>{{  Str::limit($post->getPrevious()->title, $limit = 30, $end = '...') }}
                            </a>
                        </h5>
                    </div>
                </div>
            @endif
        </div>


        <div class="col-sm-6">
        @if($post->getNext())
            <!--Mask color-->
                <div class="view">
                    <img src="{{ $post->getNext()->getImage()}}" class="img-fluid" alt="">
                    <a href="{{ route('post.show', $post->getNext()->slug) }}">
                        <span class="mask flex-center rgba-black-light"></span>
                    </a>
                </div>
                <!--Caption-->
                <div class="carousel-caption">
                    <div class="animated fadeInDown">
                        <h5 class="h5-responsive">
                            <a href="{{ route('post.show', $post->getNext()->slug) }}" class="white-text">
                                <span class="font-weight-bold"><u>{{ $post->getNext()->getDate() }}</u></span><br>{{ Str::limit($post->getNext()->title, $limit = 30, $end = '...') }}
                            </a>
                        </h5>
                    </div>
                </div>
            @endif
        </div>
    </div><!--blog next previous end-->

</section>