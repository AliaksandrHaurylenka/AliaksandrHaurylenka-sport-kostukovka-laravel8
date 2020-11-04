@inject('request', 'Illuminate\Http\Request')
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">


            <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
                <a href="{{ url('/admin/home') }}">
                    <i class="fa fa-wrench"></i>
                    <span class="title">@lang('quickadmin.qa_dashboard')</span>
                </a>
            </li>

            @if(\Auth::check() && \Auth::user()->role_id == 1)

                @can('menu_access')
                    <li>
                        <a href="{{ route('admin.menus.index') }}">
                            <i class="fa fa-gears"></i>
                            <span>@lang('quickadmin.menu.title')</span>
                        </a>
                    </li>
                @endcan

                @can('sport_event_access')
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-calendar"></i>
                            <span>@lang('quickadmin.sport-events.title')</span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">

                            @can('tag_access')
                                <li>
                                    <a href="{{ route('admin.tags.index') }}">
                                        <i class="fa fa-tags"></i>
                                        <span>@lang('quickadmin.tag.title')</span>
                                    </a>
                                </li>
                            @endcan

                            @can('post_access')
                                <li>
                                    <a href="{{ route('admin.posts.index') }}">
                                        <i class="fa fa-calendar"></i>
                                        <span>@lang('quickadmin.post.title')</span>
                                        <span class="pull-right-container">
                                {{--идем в Providers->AppServiceProvider--}}
                                    <small class="label pull-right bg-green">{{ $postsPublicCount }}</small>
                                </span>
                                    </a>
                                </li>
                            @endcan

                            @can('comment_access')
                                <li>
                                    <a href="{{ route('admin.comments.index') }}">
                                        <i class="fa fa-commenting"></i>
                                        <span>@lang('quickadmin.comment.title')</span>
                                        <span class="pull-right-container">
                                    <small class="label pull-right bg-green">{{ $newsCommentsCount }}</small>
                                </span>
                                    </a>
                                </li>
                            @endcan


                            {{--@can('poststag_access')
                            <li>
                                <a href="{{ route('admin.poststags.index') }}">
                                    <i class="fa fa-gears"></i>
                                    <span>@lang('quickadmin.poststag.title')</span>
                                </a>
                            </li>@endcan--}}

                        </ul>
                    </li>
                @endcan

                @can('ad_access')
                    <li>
                        <a href="{{ route('admin.ads.index') }}">
                            <i class="fa fa-bullhorn"></i>
                            <span>@lang('quickadmin.ads.title')</span>
                            <span class="pull-right-container">
                                {{--идем в Providers->AppServiceProvider--}}
                            <small class="label pull-right bg-green">{{$adsPublicCount}}</small>
                        </span>
                        </a>
                    </li>
                @endcan

                @can('carousel_access')
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-sliders"></i>
                            <span>@lang('quickadmin.carousel.title')</span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                            @can('main_access')
                                <li>
                                    <a href="{{ route('admin.mains.index') }}">
                                        <i class="fa fa-gear"></i>
                                        <span>@lang('quickadmin.main.title')</span>
                                    </a>
                                </li>
                            @endcan

                            @can('history_access')
                                <li>
                                    <a href="{{ route('admin.histories.index') }}">
                                        <i class="fa fa-gear"></i>
                                        <span>@lang('quickadmin.history.title')</span>
                                    </a>
                                </li>
                            @endcan

                        </ul>
                    </li>
                @endcan

                @can('people_access')
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-users"></i>
                            <span>@lang('quickadmin.people.title')</span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                            @can('director_access')
                                <li>
                                    <a href="{{ route('admin.directors.index') }}">
                                        <i class="fa fa-user"></i>
                                        <span>@lang('quickadmin.director.title')</span>
                                    </a>
                                </li>
                            @endcan

                            @can('coach_access')
                                <li>
                                    <a href="{{ route('admin.coaches.index') }}">
                                        <i class="fa fa-user"></i>
                                        <span>@lang('quickadmin.coach.title')</span>
                                    </a>
                                </li>
                            @endcan

                            @can('board_access')
                                <li>
                                    <a href="{{ route('admin.boards.index') }}">
                                        <i class="fa fa-user"></i>
                                        <span>@lang('quickadmin.board.title')</span>
                                    </a>
                                </li>
                            @endcan

                            @can('pride_access')
                                <li>
                                    <a href="{{ route('admin.prides.index') }}">
                                        <i class="fa fa-user"></i>
                                        <span>@lang('quickadmin.pride.title')</span>
                                    </a>
                                </li>
                            @endcan

                        </ul>
                    </li>
                @endcan

                @can('section_access')
                    <li>
                        <a href="{{ route('admin.sections.index') }}">
                            <i class="fa fa-list-ul"></i>
                            <span>@lang('quickadmin.section.title')</span>
                        </a>
                    </li>
                @endcan

                @can('service_access')
                    <li>
                        <a href="{{ route('admin.services.index') }}">
                            <i class="fa fa-pencil-square-o"></i>
                            <span>@lang('quickadmin.service.title')</span>
                        </a>
                    </li>
                @endcan

                @can('timetable_access')
                    <li>
                        <a href="{{ route('admin.timetables.index') }}">
                            <i class="fa fa-clock-o"></i>
                            <span>@lang('quickadmin.timetable.title')</span>
                        </a>
                    </li>
                @endcan

                @can('contact_access')
                    <li>
                        <a href="{{ route('admin.contacts.index') }}">
                            <i class="fa fa-address-card"></i>
                            <span>@lang('quickadmin.contact.title')</span>
                        </a>
                    </li>
                @endcan

                @can('gomelglass_access')
                    <li>
                        <a href="{{ route('admin.gomelglasses.index') }}">
                            <i class="fa fa-industry"></i>
                            <span>@lang('quickadmin.gomelglass.title')</span>
                        </a>
                    </li>
                @endcan

                @can('banner_access')
                    <li>
                        <a href="{{ route('admin.banners.index') }}">
                            <i class="fa fa-picture-o"></i>
                            <span>@lang('quickadmin.banner.title')</span>
                        </a>
                    </li>
                @endcan

                @can('users_access')
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-users"></i>
                            <span>@lang('quickadmin.polzovateli.title')</span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                            @can('role_access')
                                <li>
                                    <a href="{{ route('admin.roles.index') }}">
                                        <i class="fa fa-briefcase"></i>
                                        <span>@lang('quickadmin.roles.title')</span>
                                    </a>
                                </li>
                            @endcan

                            @can('user_access')
                                <li>
                                    <a href="{{ route('admin.users.index') }}">
                                        <i class="fa fa-user"></i>
                                        <span>@lang('quickadmin.users.title')</span>
                                    </a>
                                </li>
                            @endcan

                            @can('subscribe_access')
                                <li>
                                    <a href="{{ route('admin.subscribes.index') }}">
                                        <i class="fa fa-user-plus"></i>
                                        <span>@lang('quickadmin.subscribe.title')</span>
                                    </a>
                                </li>
                            @endcan

                        </ul>
                    </li>
                @endcan

                <li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}">
                    <a href="{{ route('auth.change_password') }}">
                        <i class="fa fa-key"></i>
                        <span class="title">@lang('quickadmin.qa_change_password')</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('auth.logout')}}" onclick="$('#logout').submit();">
                        <i class="fa fa-arrow-left"></i>
                        <span class="title">@lang('quickadmin.qa_logout')</span>
                    </a>
                </li>

            @elseif(\Auth::check() && \Auth::user()->role_id == 2)
                @can('ad_access')
                    <li>
                        <a href="{{ route('admin.ads.index') }}">
                            <i class="fa fa-bullhorn"></i>
                            <span>@lang('quickadmin.ads.title')</span>
                        </a>
                    </li>
                @endcan

                @can('post_access')
                    <li>
                        {{--<a href="{{ route('no_admin_posts.index') }}">--}}
                        <a href="{{ route('admin.posts.index') }}">
                            <i class="fa fa-list-ul"></i>
                            <span>Мои посты</span>
                        </a>
                    </li>
                @endcan

                <li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}">
                    <a href="{{ route('auth.change_password') }}">
                        <i class="fa fa-key"></i>
                        <span class="title">@lang('quickadmin.qa_change_password')</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('auth.logout')}}" onclick="$('#logout').submit();">
                        <i class="fa fa-arrow-left"></i>
                        <span class="title">@lang('quickadmin.qa_logout')</span>
                    </a>
                </li>

            @endif
        </ul>
    </section>
</aside>

