<section class="mb-5 wow fadeIn">
  <div class="related-heading">
    <h4>Прочтите также:</h4>
  </div>
  <div class="flexslider">
    <ul class="slides">
      @foreach($post->related(20) as $item)
        <li class="text-center view overlay">
          <img src="{{$item->getImage()}}" alt="" >
          <a href="{{route('post.show', $item->slug)}}">
            <span class="mask rgba-white-slight"></span>
            <span class="grey-lighter-hover">{{Str::limit($item->title, $limit=50, $end='...')}}</span>
          </a>
        </li>
      @endforeach
    </ul>
  </div>
</section>