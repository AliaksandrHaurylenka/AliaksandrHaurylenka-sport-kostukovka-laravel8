<footer class="page-footer font-small primary-color-dark">

  <!-- Footer Links -->
  <div class="container text-center text-md-left">

    <!-- Grid row -->
    <div class="row">

      {{--Контакты--}}
      @include('site.blocks.footer.footer-contacts')
      {{--/Контакты--}}

      {{--Главное меню--}}
      @include('site.blocks.footer.footer-main-menu')
      {{--/Главное меню--}}

      {{--Спортивные секции--}}
      @include('site.blocks.footer.footer-sections-menu')
      {{--/Спортивные секции--}}

      {{--Обратная связь--}}
      @if(url()->full() != route('kontakty'))
        @include('site.blocks.form')
      @endif
      {{--/Обратная связь--}}

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

  <!-- Copyright -->
  <div class="footer-copyright">
    <div class="container">
      <div class="row align-items-center text-center py-3">
        <div class="col-sm-6  text-sm-left mb-2">
          @include('site.blocks.footer.footer-copyright')
        </div>

        <div class="col-sm-2 mb-2">
          @include('site.blocks.footer.metriks.liveinternet')
        </div>

        <div class="col-sm-2 mb-2">
          @include('site.blocks.footer.metriks.yandex-metrika')
        </div>

        {{--<div class="col-sm-2 text-center">
          @include('site.blocks.footer.metriks.PR-CY')
        </div>--}}

        <div class="col-sm-2">
          @include('site.blocks.footer.metriks.iks')
        </div>
      </div>
    </div>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->