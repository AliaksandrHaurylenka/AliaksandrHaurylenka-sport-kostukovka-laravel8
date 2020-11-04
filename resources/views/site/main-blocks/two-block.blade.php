<section class="mt-5 wow fadeIn">
  <h2 class="h2-resposive">Спортивные секции</h2>
  <div class="row">
    @if(isset($sections))
      @foreach($sections as $section)
        <div class="col-lg-4 mb-3">
          <!-- Card -->
          <div class="card">

            <!-- Card image -->
            <div class="view overlay">
              <img class="card-img-top img-fluid" src="/images/sections/{{$section->photo}}" alt="Card image cap">
              <a href="/images/sections/{{$section->photo}}" data-gal="prettyPhoto[mainSections]">
                <div class="mask rgba-white-slight"></div>
              </a>
            </div>

            <!-- Card content -->
            <div class="card-body text-center">
              <a href="{{ route('section', [$section->id, $section->slug]) }}" class="btn btn-light-blue btn-md text-white waves-effect waves-light">
                {{$section->title}}
              </a>
            </div>

          </div>
          <!-- Card -->
        </div>
      @endforeach
    @endif
  </div>


</section>