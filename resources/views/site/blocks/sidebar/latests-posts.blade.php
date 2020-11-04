<!-- Section: POPULAR posts -->
<section class="section widget-content my-5 wow fadeIn">

    <!--/ Card -->
    <div class="card card-body pb-0">

        <h6 class="h6-responsive font-weight-bold dark-grey-text text-center spacing grey lighten-4 py-2 mb-4">
            <strong>ПОСЛЕДНИЕ СОБЫТИЯ</strong>
        </h6>

        @foreach($resentPosts as $post)
            <div class="single-post">
            <!-- Grid row -->
            <div class="row mb-4">
                <div class="col-sm-5 col-md-12 col-lg-6">

                    <!-- Image -->
                    <div class="view overlay">
                        <img src="{{$post->getImage()}}" class="img-fluid z-depth-1 rounded-0" alt="sample image">
                        <a href="{{route('post.show', $post->slug)}}">
                            <div class="mask waves-light"></div>
                        </a>
                    </div>
                </div>

                <!-- Excerpt -->
                <div class="col-sm-7 col-md-12 col-lg-6">
                    <h6 class="mt-1 mt-sm-0 mt-md-1 mb-md-0 mb-lg-2 font-small">
                        <a href="{{route('post.show', $post->slug)}}" class="text-dark">
                            <strong>{{ mb_ucfirst(mb_strtolower($post->title)) }}</strong>
                        </a>
                    </h6>

                    <div class="post-data">
                        <p class="font-small grey-text mb-0">
                            <i class="far fa-clock-o"></i> {{$post->getDate()}}</p>
                    </div>
                </div>
                <!--/ Excerpt -->
            </div>
            <!--/ Grid row -->
        </div>
        @endforeach
    </div>
</section>
<!--/ Section: POPULAR posts -->
