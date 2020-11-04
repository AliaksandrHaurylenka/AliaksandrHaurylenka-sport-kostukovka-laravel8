<!-- Banners -->
<section class="section mb-5 wow fadeIn">

  <!-- Card -->
  <div class="card card-body pb-0">
    <div class="single-post">

      <h6 class="h6-responsive font-weight-bold dark-grey-text text-center spacing grey lighten-4 py-2 mb-4">
        <strong>ПОЛЕЗНЫЕ ССЫЛКИ</strong>
      </h6>
      @if(isset($banners))
        @foreach ($banners as $banner)
          <a href="{{$banner->link}}" target="_blank" class="">
            <img src="{{ App\Models\Banner::PATH.$banner->banner }}" class="img-fluid mb-2 hoverable" alt="">
          </a>
        @endforeach
      @endif
    </div>

  </div>

</section>
<!-- /Banners -->