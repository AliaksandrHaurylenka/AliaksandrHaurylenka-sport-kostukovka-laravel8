<!--Featured posts-->
<section class="mb-5 wow fadeIn">

    <!--Grid row-->
    <div class="row mt-4">
        <!--Grid column-->
        <div class="col-md-12">

            <!--Carousel Wrapper-->
            <div id="carousel-example-4" class="carousel slide carousel-fade z-depth-1-half" data-ride="carousel">

                <!--Slides-->
                <div class="carousel-inner" role="listbox">

                    @foreach($featuredPosts as $post)
                        <div class="carousel-item">
                            <!--Mask color-->
                            <div class="view">
                                <img src="{{$post->getImage()}}" class="img-fluid" alt="">
                                <a href="{{route('post.show', $post->slug)}}">
                                    <div class="mask flex-center rgba-black-light"></div>
                                </a>
                            </div>
                            <!--Caption-->
                            <div class="carousel-caption">
                                <div class="animated fadeInDown">
                                    <h5 class="h5-responsive">
                                        <a href="{{route('post.show', $post->slug)}}" class="white-text font-weight-bold">
                                            {{ Str::limit($post->title, $limit = 50, $end = '...') }}
                                        </a>
                                    </h5>
                                </div>
                            </div>
                            <!--Caption-->
                        </div>
                    @endforeach

                </div>
                <!--Slides-->

                <!--Controls-->
                <a class="carousel-control-prev" href="#carousel-example-4" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel-example-4" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
                <!--.Controls-->
            </div>
            <!--Carousel Wrapper-->

        </div>
        <!--Grid column-->

    </div>
    <!--Grid row-->

</section>
<!--Featured posts-->