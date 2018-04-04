<!--left-fixed -navigation-->
<div class="sidebar" role="navigation">
    <div class="navbar-collapse" id="navbar">
        <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
            <ul class="nav" id="side-menu">
                @foreach($di->navigation->make() as $page)

                    @if (User::find(Cookie::get('auth_user_id'))['role'] == 'admin')
                        @if (isset($page['pages']) and is_array($page['pages']))
                            <li>
                                <a href="{{$page['url']}}"><i class="{{$page['icon']}} nav_icon"></i>{{$page['name']}}
                                    <span class="fa arrow"></span>
                                </a>

                                <ul class="nav nav-second-level collapse">
                                    @foreach($page['pages'] as $p)
                                        <li><a href="{{$p['url']}}">{{$p['name']}}<!---span class="nav-badge-btm">08</span--></a></li>
                                    @endforeach
                                </ul>
                            </li>
                        @else
                            <li>
                                <a href="{{$page['url']}}"><i class="{{$page['icon']}} nav_icon"></i>{{$page['name']}}</a>
                            </li>
                        @endif
                        @else
                            <li>
                                <a href="{{$di->navigation->make()[4]['url']}}">
                                    <i class="{{$di->navigation->make()[4]['icon']}} nav_icon"></i>
                                    {{$di->navigation->make()[4]['name']}}
                                </a>
                            </li>
                            @break;
                    @endif
                @endforeach

            </ul>
            <div class="clearfix" style="padding-bottom: 50px;"></div>
        </nav>
    </div>
    <!-- //sidebar-collapse -->
</div>
<!--left-fixed -navigation-->