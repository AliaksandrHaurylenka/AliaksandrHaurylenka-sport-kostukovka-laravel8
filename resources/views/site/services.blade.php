@extends('layouts.site')

@section('title', 'Услуги.Спорт-Костюковка')
@section('description', 'г. Гомель, микрорайон Костюковка, Государственное учреждение "Физкультурно-оздоровительный центр "Костюковка-Спорт"')

@section('breadcrumbs')
  {!! Breadcrumbs::render(); !!}
@endsection

@section('content')
  <h1 class="h1-responsive mt-5">Прейскурант услуг</h1>

  <section class="mt-5">
    <hr class="mb-4">
    @if(isset($services_day_evening, $services, $services_season_ticket_5_10, $services_season_ticket_10, $others))
      @foreach($services_day_evening as $service)
      <ul class="list-group mb-3  text-uppercase wow fadeIn">
        <li class="list-group-item d-flex justify-content-between align-items-center">
          {{$service->service}}
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center grey lighten-4">
          День
          <span class="badge primary-color-dark badge-pill">{{$service->price}} руб.</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center grey lighten-4">
          Вечер
          <span class="badge primary-color-dark badge-pill">{{$service->price_the_evening}} руб.</span>
        </li>
      </ul>
      @endforeach
      
      @include('site.blocks.block-rtb-1')

      @foreach($services as $service)
      <ul class="list-group my-3  text-uppercase wow fadeIn">
        <li class="list-group-item d-flex justify-content-between align-items-center">
          {{$service->service}}
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center grey lighten-4">
          1 занятие
          <span class="badge primary-color-dark badge-pill">{{$service->price}} руб.</span>
        </li>
      </ul>
      @endforeach

      @include('site.blocks.horizontal-widget-1')

      <h2 class="h2-responsive mt-5 wow fadeIn">Абонементная система</h2>
      @foreach($services_season_ticket_5_10 as $service)
      <ul class="list-group mb-3  text-uppercase wow fadeIn">
        <li class="list-group-item d-flex justify-content-between align-items-center">
          {{$service->service}}
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center grey lighten-4">
          Абонемент (5 занятий)
          <span class="badge primary-color-dark badge-pill">{{$service->price_5_lessons}} руб.</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center grey lighten-4">
          Абонемент (10 занятий)
          <span class="badge primary-color-dark badge-pill">{{$service->price_10_lessons}} руб.</span>
        </li>
      </ul>
      @endforeach
      
      
      @foreach($services_season_ticket_10 as $service)
      <ul class="list-group my-3  text-uppercase wow fadeIn">
        <li class="list-group-item d-flex justify-content-between align-items-center">
          {{$service->service}}
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center grey lighten-4">
          Абонемент (10 занятий)
          <span class="badge primary-color-dark badge-pill">{{$service->price_10_lessons}} руб.</span>
        </li>
      </ul>
      @endforeach



      <h2 class="h2-responsive mt-5 wow fadeIn">Дополнительные услуги</h2>
      @foreach($others as $service)
      <ul class="list-group mb-3  text-uppercase wow fadeIn">
        <li class="list-group-item d-flex justify-content-between align-items-center">
          {{$service->service}}
          <span class="badge primary-color-dark badge-pill">{{$service->price_other}} руб.</span>
        </li>
      </ul>
      @endforeach
    @endif
  </section>

  <p>* - уточняйте у администратора {{Config::get('myconfig.phone_administrator')}}</p>
@endsection