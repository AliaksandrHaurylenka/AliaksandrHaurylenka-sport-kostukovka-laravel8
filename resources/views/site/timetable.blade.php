@extends('layouts.site')

@section('title', 'Расписание.Спорт-Костюковка')
@section('description', 'г. Гомель, микрорайон Костюковка, Государственное учреждение "Физкультурно-оздоровительный центр "Костюковка-Спорт"')

@section('breadcrumbs')
  {!! Breadcrumbs::render(); !!}
@endsection

@section('content')
<h1 class="h1-responsive mt-5">Расписание</h1>
<section class="mt-5">
    <hr class="mb-4">
    @if(isset($timetable))
    	@foreach($timetable as $time)
    	<!--Grid row-->
    	<div class="row  wow fadeIn">
    	 
    		<!--Grid column-->
            <div class="col-lg-5 mb-4">
                <a href="/images/timetable/{{$time->photo}}" data-gal="prettyPhoto[timetable]">
                    <img src="/images/timetable/{{$time->photo}}" class="img-fluid" alt="">
                </a>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-6 ml-xl-4 mb-4">
                <div class="dark-grey-text">
                	{!!$time->timetable!!}
                </div>           
            </div>
            <!--Grid column-->
        </div>
    	<!--Grid row-->
    	<hr class="mb-5">
    	@endforeach
    @endif
    
    @include('site.blocks.block-rtb-1')
</section>
@endsection