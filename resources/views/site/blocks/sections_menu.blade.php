<nav class="navbar navbar-expand-sm navbar-light white">
  <div class="container">
    <a class="navbar-brand d-block d-sm-none" href="#">Спортивные секции</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
      
      <div class="d-none d-sm-block">
		<div class="sections-icons row">
			@if(isset($sportSections))
                @foreach($sportSections as $section)
                  <div class="col">
                    <div class="view overlay sport_icons btn-light-blue" onclick="window.location='{{ route('section', [$section->id, $section->slug]) }}'">
                      <div class="sport_icons_border">
                        <div class="sport_icons_bg btn-light-blue">
                          <img class="" src="/images/sections/{{$section->photo_section_menu}}" alt="{{ $section->title }}">
                        </div>
                      </div>
                      
                      <span class="mask rgba-white-slight" title="{{ $section->title }}"></span>
                    </div>
                  </div>
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