<!--Card-->
<div class="card mb-4 wow fadeIn">

  <div class="card-header font-weight-bold">
	С уважением
    <a href="{{ route('user_posts.show', [$post->author->id, $post->author->name]) }}" class="grey-lighter-hover">
        {{ $post->author->name }}
    </a>
    <span class="text-capitalize">| {{ $post->getDate() }}</span>
  </div>

  <!--Card content-->
  <div class="card-body">

    <div class="media d-block d-md-flex mt-3">
      <img class="d-flex mb-3 mx-auto z-depth-1" src="{{ $post->author->getImage() }}"
        alt="Generic placeholder image" style="width: 100px;">
      <div class="media-body text-center text-md-left ml-md-3 ml-0">
        <h5 class="mt-0 font-weight-bold">
          <a href="{{ route('user_posts.show', [$post->author->id, $post->author->name]) }}" class="grey-lighter-hover">
            {{ $post->author->name }}
          </a>
        </h5>
        {!! $post->author->description !!}
      </div>
    </div>

  </div>

</div>
<!--/.Card-->