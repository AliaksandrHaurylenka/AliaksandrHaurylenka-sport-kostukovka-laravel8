<!--Navbar -->
<nav class="navbar navbar-expand-lg navbar-light white">
    <div class="container">
        <a class="navbar-brand" href="{{ route('main') }}"><img src="/images/logo.jpg" height="50" alt="Спорт-Костюковка"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main"
                aria-controls="main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="main">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link home" href="{{route('main')}}">Главная
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                @if(isset($menus))
                    @foreach($menus as $menu)
                        <li class="nav-item">
                            <a class="nav-link {{$menu->slug}}" href='{{route("$menu->slug")}}'>{{$menu->title}}</a>
                        </li>
                    @endforeach
                @endif

                <li class="nav-item dropdown">
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
                </li>
            </ul>

            <button type="button" class="btn primary-color-dark" data-toggle="modal" data-target="#centralModalSm">
                <span class="white-lighter-hover">Объявления</span>
            </button>

            <ul class="navbar-nav ml-auto nav-flex-icons">
                <li class="nav-item unique-color rounded-circle">
                    <a href="https://vk.com/club143916012" target="_blank"
                       class="nav-link white-text waves-effect waves-light">
                        <i class="fab fa-vk"></i>
                    </a>
                </li>
                <li class="nav-item dropdown d-none d-sm-block">
                    <a class="nav-link dropdown-toggle text-black-50"
                       data-toggle="dropdown"
                       aria-haspopup="true"
                       aria-expanded="false"
                       role="navigation">
                        <i class="fas fa-user fa-lg"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-primary">
                        @if(\Auth::check())
                            <p><a class="dropdown-item" href="{{ route('profile') }}">Мой профиль</a></p>
                            <p><a class="dropdown-item" href="{{ route('cabinet') }}">Личный кабинет</a></p>
                        @else
                            <span><a class="dropdown-item" href="{{ route('cabinet') }}">Вход</a></span>
                        @endif
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!--/.Navbar -->