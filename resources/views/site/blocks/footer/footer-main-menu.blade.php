<div class="col-md-2 col-lg-2 col-xl-2 mx-auto my-4" id="menu-footer">

  <!-- Links -->
  <h6 class="text-uppercase font-weight-bold">Меню</h6>
  <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
  <ul class="list-unstyled">
    <li>
      <a href="{{route('main')}}">Главная</a>
    </li>
    @if(isset($menus))
      @foreach($menus as $menu)
        <li>
          <a href="{{route($menu->slug)}}"
             class="footer-{{$menu->slug}}">{{$menu->title}}
          </a>
        </li>
      @endforeach
    @endif

    {{--<li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle"
         data-toggle="dropdown"
         aria-haspopup="true"
         aria-expanded="false"
         role='navigation'>История
      </a>
      <div class="dropdown-menu dropdown-primary">
        @if(isset($menus_drop))
          @foreach($menus_drop as $menu)
            <p><a class="dropdown-item" href='{{route("$menu->slug")}}'>{{$menu->title}}</a></p>
          @endforeach
        @endif
      </div>
    </li>--}}
  </ul>
</div>