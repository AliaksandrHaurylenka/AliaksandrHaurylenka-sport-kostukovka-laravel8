<section class="wow fadeIn">
<h2 class="h2-resposive">Фотогаллерея</h2>
	<!--Grid row-->
	<div class="gallery">
        @foreach($gallery as $img)
        <div class="mb-3 pics animation all 1">
          <a href="/images/main/{{$img->photo}}" data-gal="prettyPhoto[mainBuilding]">
            <img src="/images/main/{{$img->photo}}" class="img-fluid rounded-0" alt="">
          </a>
        </div>
        @endforeach
    </div>
</section>