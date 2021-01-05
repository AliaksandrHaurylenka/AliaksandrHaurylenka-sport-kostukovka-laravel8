<?
header('Content-Type: text/html; charset=utf-8');


//Включение всех ошибок и предупреждений
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
?>
<!DOCTYPE html>
<html class="no-js" lang="ru-Ru">
    <head>
        @include('site.blocks.head')
    </head>

    <body class="postpage-v4">
        @include('site.blocks.address-top')
        @include('site.modal-ads')
        <header id="app">
            <div class="flash message">
                @include('flash::message')
            </div>
            <div class="flash">
                @include('admin.errors')
            </div>

            @include('site.blocks.nav')

            @if(url()->full() == route('main'))
                @include('site.blocks.carousel')
            @endif

            @include('site.blocks.sections_menu')
        </header>
        <main>
            <div class="container-fluid grey lighten-4">
                <div class="container">
                    <div class="pt-3">
                        @yield('breadcrumbs')
                    </div>


                    <!--Blog-->
                    <div class="row">
                        <!--Main listing-->
                        <div class="col-md-8 col-12">
                            @yield('content')
                        </div>
                        <!--Main listing-->

                        <!--Sidebar-->
                        <div class="col-md-4 col-12">
                            @include('site.blocks.sidebar.sidebar')
                        </div>
                        <!--Sidebar-->
                    </div>

                </div>
            </div>
        </main>
        @include('site.blocks.footer')
        @include('site.blocks.scripts')
    </body>
</html>