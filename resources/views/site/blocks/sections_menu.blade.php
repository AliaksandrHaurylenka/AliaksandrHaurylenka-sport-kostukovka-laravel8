<nav class="navbar navbar-expand-sm navbar-light white">
  <div class="container">
    <a class="navbar-brand d-block d-sm-none" href="#">Спортивные секции</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <div class="d-none d-sm-block">
        <!-- Card deck -->
        <div class="card-group">
          @if(isset($sportSections))
            @foreach($sportSections as $section)
              <!-- Card -->
              <div class="card mb-4 z-depth-0">
                <!--Card image-->
                <div class="view overlay" onclick="window.location='{{ route('section', [$section->id, $section->slug]) }}'">
                  <img class="card-img-top"
                       src="/images/sections/{{$section->photo_section_menu}}"
                       style="max-width: 140px" alt="">
                    <span class="mask rgba-white-slight"></span>
                </div>

                <!--Card content-->
                <div class="card-body d-none d-lg-block for-active-button">
                  <!--Text-->
                  <p class="card-text">{!! getLengthString($section->description, 50) !!}</p>
                  <a href="{{ route('section', [$section->id, $section->slug]) }}" class="btn btn-light-blue btn-md text-white">Подробнее</a>
                </div>
              </div>
              <!-- Card -->
            @endforeach
          @endif
        </div>
      </div>
      <!-- Card deck -->
      <!-- Links -->
      <ul class="navbar-nav mr-auto d-block d-sm-none">
        @if(isset($sportSections))
          @foreach($sportSections as $section)
            <li class="nav-item">
              <a class="nav-link" href="{{ route('section', [$section->id, $section->slug]) }}">
                {{$section->title}}
              </a>
            </li>
          @endforeach
        @endif
      </ul>
    </div>
  </div><!--/container-->
</nav>