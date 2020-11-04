<h1 class="h1-responsive mt-5">Добро пожаловать на сайт спортивной организации</h1>
<section class="mt-5 wow fadeIn">
	<hr class="mb-4">
	@foreach($buildings as $building)
		<div class="mb-4"><img src="/images/main/{{$building->photo}}" class="img-fluid z-depth-1-half" alt=""></div>
		<div class="font-size-1rem">{!!$building->description!!}</div>
	@endforeach
</section>