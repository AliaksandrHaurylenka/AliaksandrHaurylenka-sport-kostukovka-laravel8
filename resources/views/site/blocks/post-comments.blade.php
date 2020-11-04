<!--Comments-->
<a href="#" id="comment"></a>
<div class="card card-comments my-3 wow fadeIn">

  <div class="card-header font-weight-bold">
		<span class="comments  grey-lighter-hover" title="Комментарии">
		    <i class="fas fa-comment"></i>
      {{ $post->commentsCount()->count() }}
		</span>
    <span class="comments ml-2 grey-lighter-hover" style="right: 4rem;" title="Просмотры">
		    <i class="fas fa-eye"></i>
      {{ $post->views }}
		</span>
  </div>

  <div class="card-body">

    @if(!$post->comments->isEmpty())
      @foreach ($post->getComments() as $comment)
        <div class="media d-block d-md-flex mt-3">
          @if($comment->author)
            <img class="d-flex mb-3 mx-auto " src="{{ App\Models\User::PATH.$comment->author->avatar }}" alt="">
          @else
            <img class="d-flex mb-3 mx-auto " src="{{ App\Models\User::PATH }}user2-160x160.jpg" alt="">
          @endif
          <div class="media-body text-center text-md-left ml-md-3 ml-0">
            <h5 class="mt-0 font-weight-bold h5-responsive">
              @if($comment->author)
                <h4>{{ $comment->author->name }}</h4>
              @else
                <h4>{{ $comment->name }}</h4>
              @endif
            </h5>
            <p class="comment-date">
              {{ $comment->created_at->diffForHumans() }}
            </p>
            <p>{{ $comment->text }}</p>
          </div>
        </div>
        <hr>
      @endforeach
    @endif

  </div>
</div>
<!--/.Comments-->
{{ $post->getComments()->links() }}