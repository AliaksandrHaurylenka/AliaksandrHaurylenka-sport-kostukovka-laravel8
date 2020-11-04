<h1 class="h1-responsive mt-5">{{ $sport }}</h1>

@if(isset($photo_sports, $coaches, $coaches_archive, $prides))
	<section class="mt-5 wow fadeIn">
		<hr class="mb-4">
			<div class="mb-4"><img src="/images/sections/{{ $photo_sports->photo_sport }}" class="img-fluid z-depth-1-half" alt=""></div>
			<div class="font-size-1rem">{!! $photo_sports->description !!}</div>
	</section>


	<section class="mt-5 wow fadeIn">
		<h2 class="h2-responsive m-0">Тренерский состав</h2>
		<hr class="mb-4">
		@foreach($coaches as $coach)	
		<!-- News jumbotron -->
		<div class="jumbotron text-center hoverable p-0">
		<!-- Grid row -->
		<div class="row">
			<!-- Grid column -->
			<div class="col-md-4 offset-md-1 m-0">
			<!-- Featured image -->
			<div class="view overlay">
				<img src="/images/coaches/{{ $coach->photo }}" class="img-fluid" alt="">
				<a href="/images/coaches/{{ $coach->photo }}" data-gal="prettyPhoto[coachs]">
				<div class="mask rgba-white-slight"></div>
				</a>
			</div>
			</div>
			<!-- Grid column -->
			<!-- Grid column -->
			<div class="col-md-7 text-md-left ml-3 mt-1">
			<h4 class="h4 my-2">{{ $coach->name }}</h4>
			<div class="font-weight-normal">{!! $coach->description !!}</div>
			</div>
			<!-- Grid column -->
		</div>
		<!-- Grid row -->
		</div>
		<!-- News jumbotron -->
		@endforeach
		
	</section>


	<section class="my-5 wow fadeIn">
		<!--Accordion wrapper-->
		<div class="accordion md-accordion accordion-1" id="accordionEx23" role="tablist">
			<div class="card">
				<div class="card-header blue lighten-3 z-depth-1" role="tab" id="heading96">
				<h5 class="text-uppercase mb-0 py-1">
					<a class="white-text font-weight-bold" data-toggle="collapse" href="#collapse96" aria-expanded="true"
					aria-controls="collapse96">
					Архив тренеров
					<i class="fas fa-plus-circle"></i>
					</a>
				</h5>
				</div>
				<div id="collapse96" class="collapse" role="tabpanel" aria-labelledby="heading96" data-parent="#accordionEx23">
				<div class="card-body row">
					@foreach($coaches_archive as $coach)
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-4 view overlay">
								<img src="/images/coaches/{{ $coach->photo }}" class="img-fluid" alt="">
								<a href="/images/coaches/{{ $coach->photo }}" data-gal="prettyPhoto[archive]">
								<span class="mask rgba-white-slight"></span>
								</a> 
							</div>
							
							<div class="col-md-8 archive-description-coach">
								<h6 class="h6-responsive text-uppercase mt-1 font-weight-bold d-inline">{{ $coach->name }} - </h6>
								{!! $coach->description !!}
							</div>
						</div>
						
					</div>
					@endforeach
				</div>
				</div>
			</div>
			<div class="card">
				<div class="card-header blue lighten-3 z-depth-1" role="tab" id="heading97">
					<h5 class="text-uppercase mb-0 py-1">
						<a class="collapsed font-weight-bold white-text" data-toggle="collapse" href="#collapse97"
						aria-expanded="false" aria-controls="collapse97">
						Наша гордость
						<i class="fas fa-plus-circle"></i>
						</a>
					</h5>
				</div>
				<div id="collapse97" class="collapse show" role="tabpanel" aria-labelledby="heading97" data-parent="#accordionEx23">
					<div class="card-body row example-1 square scrollbar-cyan bordered-cyan">
						@foreach($prides as $men)
						<div class="col-md-6">
							<div class="row">
								<div class="col-md-4 view overlay">
									<img src="/images/prides/{{ $men->photo }}" class="img-fluid" alt="">
									<a href="/images/prides/{{ $men->photo }}" data-gal="prettyPhoto[prides]">
									<span class="mask rgba-white-slight"></span>
									</a>
									<h6 class="h6-responsive text-center text-uppercase mt-1">{{ $men->name }}</h6>
								</div>
								
								<div class="col-md-8">
									{!! $men->description !!}
								</div>
							</div>	
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
		<!--Accordion wrapper-->
	</section>
@endif