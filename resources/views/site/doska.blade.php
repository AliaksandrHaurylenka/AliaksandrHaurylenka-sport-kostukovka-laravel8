@extends('layouts.site')

@section('title', 'Доска почета.Спорт-Костюковка')
@section('description', 'г. Гомель, микрорайон Костюковка, Государственное учреждение "Физкультурно-оздоровительный центр "Костюковка-Спорт"')

@section('breadcrumbs')
  {!! Breadcrumbs::render(); !!}
@endsection

@section('content')
  <section class="wow fadeIn mt-5">
    <h1 class="h1-responsive text-uppercase">Быстрее</h1>
    <h1 class="h1-responsive text-uppercase text-center">Выше</h1>
    <h1 class="h1-responsive text-uppercase text-right">Сильнее</h1>
  </section>

  <section class="wow fadeIn mt-5">
    <hr class="mb-4">
    <h2 class="h2-responsive text-center mb-3">Директора Спортивно-оздоровительного комплекса</h2>
    <div class="row">
    @if(isset($director_sok))
      @foreach($director_sok as $sok)
        <!-- Card -->
        <div class="card col-md-4 text-center mb-3">
        {!! Html::image(App\Models\Director::PATH.$sok->photo,'',['class'=>'card-img-top']) !!}
        <!-- Card content -->
          <div class="card-body">
            <!-- Title -->
            <h5 class="card-title">{{$sok->name}}</h5>
            <!-- Text -->
            {!! $sok->description !!}
          </div>
        </div>
        <!-- Card -->
        @endforeach
      @endif
    </div>
  </section>

  <section class="wow fadeIn mt-5">
    <h2 class="h2-responsive text-center mb-3">Директора Спортивной Детско-юношеской школы</h2>
    <div class="row">
    @if(isset($director_sdyshor))
      @foreach($director_sdyshor as $sok)
        <!-- Card -->
          <div class="card col-md-4 text-center mb-3">
          {!! Html::image(App\Models\Director::PATH.$sok->photo,'',['class'=>'card-img-top']) !!}
          <!-- Card content -->
            <div class="card-body">
              <!-- Title -->
              <h4 class="card-title">{{$sok->name}}</h4>
              <!-- Text -->
              {!! $sok->description !!}
            </div>
          </div>
          <!-- Card -->
        @endforeach
      @endif
    </div>
  </section>

    @include('site.blocks.block-rtb-1')

  <section class="wow fadeIn my-3">
    <!--Accordion wrapper-->
    <div class="accordion md-accordion accordion-1" id="accordionEx23" role="tablist">
      <div class="card">
        <div class="card-header blue lighten-3 z-depth-1" role="tab" id="heading96">
          <h5 class="text-uppercase mb-0 py-1">
            <a class="white-text font-weight-bold" data-toggle="collapse" href="#collapse96" aria-expanded="true"
               aria-controls="collapse96">
              Доска почета
              <i class="fas fa-plus-circle"></i>
            </a>
          </h5>
        </div>
        <div id="collapse96" class="collapse show" role="tabpanel" aria-labelledby="heading96" data-parent="#accordionEx23">
          <div class="card-body row example-1 square scrollbar-cyan bordered-cyan">
            @if(isset($boards))
              @foreach($boards as $coach)
                <div class="col-md-6 mb-3">
                  <div class="row">
                    <div class="col-md-5 view overlay">
                      {!! Html::image(App\Models\Board::PATH.$coach->photo,'',['class'=>'img-fluid']) !!}
                      <a href="/images/board/{{$coach->photo}}" rel="prettyPhoto[board]">
                        <div class="mask rgba-white-slight"></div>
                      </a>
                      <h6 class="h6-responsive mb-1 text-center text-uppercase mt-1">{{$coach->name}}</h6>
                    </div>

                    <div class="col-md-7">
                      {!!$coach->description!!}
                    </div>
                  </div>

                </div>
              @endforeach
            @endif
          </div>
        </div>

      </div>
    </div>
    <!--Accordion wrapper-->
  </section>
@endsection