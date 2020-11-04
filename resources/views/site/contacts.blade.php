@extends('layouts.site')

@section('title', 'Контакты.Спорт-Костюковка')
@section('description', 'г. Гомель, микрорайон Костюковка, Государственное учреждение "Физкультурно-оздоровительный центр "Костюковка-Спорт"')

@section('breadcrumbs')
  {!! Breadcrumbs::render(); !!}
@endsection

@section('content')

  @include('site.blocks.grafic')

  <h1 class="h1-responsive mt-5">Контакты</h1>

  <section class="mt-5 wow fadeIn">
    <hr class="mb-4">
    <!-- Card deck -->
    <div class="card-deck">

      <!-- Card -->
      <div class="card mb-4">

        <!--Card content-->
        <div class="card-body">

          <!--Title-->
          <h4 class="card-title text-center">{{Config::get('myconfig.title_sdushor')}}</h4>

          <p class="note note-primary">Директор: <strong>{{$director_sdyshor->name}}</strong></p>
          <img class="img-fluid mb-2" src="/images/directors/{{$director_sdyshor->photo}}"
               alt="{{$director_sdyshor->name}}">

          <!--Text-->
          <p class="card-text">Контактные телефоны:</p>

          <ol>
            <li>{{Config::get('myconfig.phone_administrator')}} - администратор;</li>
            <li>{{Config::get('myconfig.phone_buhalteria_sdushor')}} - бухгалтерия;</li>
            <li>{{Config::get('myconfig.phone_fax_sdushor')}} - факс;</li>
            <li>{{Config::get('myconfig.phone_director_sdushor')}} - директор.</li>
          </ol>

          <p class="card-text">E-mail:</p>
          <ol>
            <li>{{Config::get('myconfig.email_sdushor')}}</li>
          </ol>

        </div>

      </div>
      <!-- Card -->

      <!-- Card -->
      <div class="card mb-4">

        <!--Card content-->
        <div class="card-body">

          <h4 class="card-title text-center">{{Config::get('myconfig.title_sok')}}</h4>

          <p class="note note-primary">Директор: <strong>{{$director_sok->name}}</strong></p>
          <img class="img-fluid mb-2" src="/images/directors/{{$director_sok->photo}}" alt="{{$director_sok->name}}">
          <!--Text-->
          <p class="card-text">Контактные телефоны:</p>

          <ol>
            <li>{{Config::get('myconfig.phone_administrator')}} - администратор;</li>
            <li>{{Config::get('myconfig.phone_administrator_mobil')}} - моб. тел. администратор;</li>
            <li>{{Config::get('myconfig.phone_buhalteria_sok')}} - бухгалтерия;</li>
            <li>{{Config::get('myconfig.phone_fax_sok')}} - факс;</li>
            <li>{{Config::get('myconfig.phone_director_sok')}} - директор.</li>
          </ol>

          <p class="card-text">E-mail:</p>
          <ol>
            <li>{{Config::get('myconfig.email_sok')}}</li>
            <li><a href="" data-toggle="modal" data-target="#grafic">График приема граждан</a></li>
            <li>Книга замечаний и предложений находится у администратора ГУ "ФОЦ "Костюковка-спорт"</li>
          </ol>

        </div>

      </div>
      <!-- Card -->

    </div>
    <!-- Card deck -->
  </section>

    @include('site.blocks.block-rtb-1')

  <section class="mt-5 wow fadeIn">
    <div class="map">
      <script async
              src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=5SfjickNneKPf4DhF1E5yOaigbrfI4GB&amp;width=100%&amp;height=416&amp;lang=ru_RU&amp;sourceType=constructor&amp;scroll=true"></script>
    </div>
    <!-- Buttons-->
    <div class="row text-center">
      <div class="col-4">
        <a href="https://yandex.by/maps/155/gomel/?from=api-maps&l=map&ll=30.917329%2C52.531329&mode=usermaps&origin=jsapi_2_1_74&um=constructor%3A5SfjickNneKPf4DhF1E5yOaigbrfI4GB&z=16"
           class="btn-floating blue accent-1" target="_blank">
          <i class="fas fa-map-marker-alt"></i>
        </a>
        <p class="d-none d-md-block">{{Config::get('myconfig.street')}}</p>
        <p class="mb-md-0 d-none d-md-block">{{Config::get('myconfig.area')}}, {{Config::get('myconfig.city')}}</p>
      </div>
      <div class="col-4">
        <a href="tel:{{Config::get('myconfig.phone_administrator_mobil')}}" class="btn-floating blue accent-1">
          <i class="fas fa-phone"></i>
        </a>
        <p class="d-none d-md-block">{{Config::get('myconfig.phone_administrator_mobil')}}</p>
        <p class="mb-md-0 d-none d-md-block">{{Config::get('myconfig.time_work')}}</p>
      </div>
      <div class="col-4">
        <a href="mailto:{{Config::get('myconfig.email_sok')}}" class="btn-floating blue accent-1" target="_blank">
          <i class="fas fa-envelope"></i>
        </a>
        <p class="d-none d-md-block">{{Config::get('myconfig.email_sok')}}</p>
      </div>
    </div>
  </section>

  @include('site.blocks.contact-form')


  
@endsection