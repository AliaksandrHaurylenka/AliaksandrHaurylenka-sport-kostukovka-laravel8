<!-- Section: Categories -->
<section class="section mb-5 wow fadeIn">

  <!-- Card -->
  <div class="card card-body pb-0">
    <div class="single-post">

      <h6 class="h6-responsive font-weight-bold dark-grey-text text-center spacing grey lighten-4 py-2 mb-4">
        <strong>НОВОСТИ ПО КАТЕГОРИЯМ</strong>
      </h6>

      <ul class="list-group my-4">
        @foreach($sportSections as $category)
          <li class="list-group-item d-flex justify-content-between align-items-center">
            <a class="elegant-darker-hover" href="{{route('category.show', $category->slug)}}">
              <p class="mb-0">{{$category->title}}</p>
            </a>
            <span class="badge teal badge-pill font-small">{{$category->posts()->count()}}</span>
          </li>
        @endforeach
          <li class="list-group-item d-flex justify-content-between align-items-center">
            <a class="elegant-darker-hover" href="{{route('no-category.show')}}">
              <p class="mb-0">Без категории</p>
            </a>
            <span class="badge teal badge-pill font-small">{{$noCategory}}</span>
          </li>
      </ul>
    </div>

  </div>

</section>
<!-- Section: Categories -->