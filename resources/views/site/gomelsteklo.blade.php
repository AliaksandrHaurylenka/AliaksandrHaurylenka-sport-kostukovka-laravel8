@extends('layouts.site')

@section('title', 'Гомельстекло.Спорт-Костюковка')
@section('description', 'г. Гомель, микрорайон Костюковка, Государственное учреждение "Физкультурно-оздоровительный центр "Костюковка-Спорт"')

@section('breadcrumbs')
  {!! Breadcrumbs::render(); !!}
@endsection

@section('content')
    <h1 class="h1-responsive mt-5">ОАО "Гомельстекло"</h1>
    <section class="wow fadeIn mt-5 mb-3">
        <hr class="mb-4">
        <img src="/images/gomelglasses/gomelsteklo.jpg" class="img-fluid mb-3" alt="Гомельстекло">
        <div class="font-size-1rem">
            <p>До 2015 года «Физкультурно-оздоровительный центр «КОСТЮКОВКА-СПОРТ» входил в состав подразделения ОАО «Гомельстекло» и именовался «Спортивно-оздоровительный комплекс» ОАО «Гомельстекло».</p>
            <p>В связи с финансовыми затруднениями, генеральным директором ОАО «Гомельстекло» Сергеем Николаевичем Ковалевым, было принято решение передать «Спортивно-оздоровительный комплекс» «ОТДЕЛУ ОБРАЗОВАНИЯ, СПОРТА И ТУРИЗМА ГОМЕЛЬСКОГО ГОРОДСКОГО ИСПОЛНИТЕЛЬНОГО КОМИТЕТА».</p>
            <p>Ежегодно, входя в состав подразделения ОАО «Гомельстекло», в «Спортивно-оздоровительном комплексе» проводилась круглогодичная СПАРТАКИАДА между цехами Стекольного завода по десяти видам спорта: настольный теннис, лыжи, плавание, волейбол, многоборье (бег, прыжки в длину, подтягивание), шашки, шахматы, футбол, дартс, бильярд.</p>
        </div>
    </section>

    @include('site.blocks.block-rtb-1')

    <section class="wow fadeIn my-3">
        <!--Accordion wrapper-->
        <div class="accordion md-accordion accordion-1" id="accordionEx23" role="tablist">
            @include('site.glass.glassTemplate', ['sport' => 'Настольный теннис', 'num' => '1', 'sp' => 'tennis', 'show' => 'show'])
            @include('site.glass.glassTemplate', ['sport' => 'Лыжи', 'num' => '2', 'sp' => 'sky', 'show' => ''])
            @include('site.glass.glassTemplate', ['sport' => 'Плавание', 'num' => '3', 'sp' => 'swimming', 'show' => ''])
            @include('site.glass.glassTemplate', ['sport' => 'Волейбол', 'num' => '4', 'sp' => 'volleyball', 'show' => ''])
            @include('site.glass.glassTemplate', ['sport' => 'Многоборье', 'num' => '5', 'sp' => 'athletics', 'show' => ''])
            @include('site.glass.glassTemplate', ['sport' => 'Шахматы', 'num' => '6', 'sp' => 'chess', 'show' => ''])
            @include('site.glass.glassTemplate', ['sport' => 'Дартс', 'num' => '7', 'sp' => 'darts', 'show' => ''])
        </div>
        <!--Accordion wrapper-->
    </section>
@endsection