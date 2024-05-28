<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{route('dashboard')}}">ADMIN PANEL</a>
    </div>

    <ul class="nav navbar-right top-nav">
        <li><a href="{{url('/')}}" target="_blank">VISIT SITE</a></li>

        <li class="dropdown">

            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"><span
                        style="font-size:1rem; padding:10px; letter-spacing:2px;">{{ $username }}</span></i><b
                    class="caret"></b></a>

            <ul class="dropdown-menu">
                <li>
                    <a href="{{route('profile.edit')}}"><i class="fa fa-fw fa-user"></i> Profile</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-fw fa-power-off"></i> Log Out</a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </li>
    </ul>

    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li>
                <a href="{{route('dashboard')}}" class="active"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
            </li>

            <li>

            <li>
                <a href="javascript:;" class="dropdown-toggle" data-toggle="collapse" data-target="#popup"><i
                        class="fa-solid fa-fire-flame-curved"></i> Popup Item <i
                        class="fa-solid fa-chevron-down"></i></a>
                <ul id="popup" class="collapse">
                    <li>
                        <a href="{{route('popup.index')}}">View All</a>
                    </li>
                    <li>
                        <a href="{{route('popup.create')}}">Add New</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="dropdown-toggle" data-toggle="collapse" data-target="#menu"><i
                        class="fa-solid fa-bars"></i> Menu <i class="fa-solid fa-chevron-down"></i></a>
                <ul id="menu" class="collapse">
                    <li>
                        <a href="{{route('menu.index')}}">View All</a>
                    </li>
                    <li>
                        <a href="{{route('menu.create')}}">Add New</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="dropdown-toggle" data-toggle="collapse" data-target="#submenu"><i
                        class="fa-brands fa-mendeley"></i> Sub Menu <i class="fa-solid fa-chevron-down"></i></a>
                <ul id="submenu" class="collapse">
                    <li>
                        <a href="{{route('submenu.index')}}">View All</a>
                    </li>
                    <li>
                        <a href="{{route('submenu.create')}}">Add New</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubmenu"><i
                        class="fa-brands fa-mendeley"></i> SubMenu of Sub Menu <i
                        class="fa-solid fa-chevron-down"></i></a>
                <ul id="subsubmenu" class="collapse">
                    <li>
                        <a href="{{route('subsubmenu.index')}}">View All</a>
                    </li>
                    <li>
                        <a href="{{route('subsubmenu.create')}}">Add New</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="dropdown-toggle" data-toggle="collapse" data-target="#banner"><i
                        class="fa-solid fa-panorama"></i> Banner <i class="fa-solid fa-chevron-down"></i></a>
                <ul id="banner" class="collapse">
                    <li>
                        <a href="{{route('banner.index')}}">View All</a>
                    </li>
                    <li>
                        <a href="{{route('banner.create')}}">Add New</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="dropdown-toggle" data-toggle="collapse" data-target="#notice"><i
                        class="fa-solid fa-flag-checkered"></i> Notice <i class="fa-solid fa-chevron-down"></i></a>
                <ul id="notice" class="collapse">
                    <li>
                        <a href="{{route('notice.index')}}">View All</a>
                    </li>
                    <li>
                        <a href="{{route('notice.create')}}">Add New</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="dropdown-toggle" data-toggle="collapse" data-target="#news"><i
                        class="fa-regular fa-file-lines"></i> News & Events <i class="fa-solid fa-chevron-down"></i></a>
                <ul id="news" class="collapse">
                    <li>
                        <a href="{{url('/admin/news')}}">View All</a>
                    </li>
                    <li>
                        <a href="{{url('/admin/newspublish')}}">Add New</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="dropdown-toggle" data-toggle="collapse" data-target="#academic"><i
                        class="fa-solid fa-graduation-cap"></i> Academic <i class="fa-solid fa-chevron-down"></i></a>
                <ul id="academic" class="collapse">
                    <li>
                        <a href="{{route('academic.index')}}">View All</a>
                    </li>
                    <li>
                        <a href="{{route('academic.create')}}">Add New</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="dropdown-toggle" data-toggle="collapse" data-target="#gallery"><i
                        class="fa-regular fa-image"></i> Gallery <i class="fa-solid fa-chevron-down"></i></a>
                <ul id="gallery" class="collapse">
                    <li>
                        <a href="{{route('gallery.index')}}">View All</a>
                    </li>
                    <li>
                        <a href="{{route('gallery.create')}}">Add New</a>
                    </li>
                </ul>
            </li>


            <li>
                <a href="javascript:;" class="dropdown-toggle" data-toggle="collapse" data-target="#team"><i
                        class="fa fa-fw fa-users"></i> Teams <i class="fa-solid fa-chevron-down"></i></a>
                <ul id="team" class="collapse">
                    <li>
                        <a href="{{route('teams.index')}}">View All</a>
                    </li>
                    <li>
                        <a href="{{route('teams.create')}}">Add New</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="javascript:;" class="dropdown-toggle" data-toggle="collapse" data-target="#testimonial"><i
                        class="fa-solid fa-quote-left"></i> Testimonial <i class="fa-solid fa-chevron-down"></i></a>
                <ul id="testimonial" class="collapse">
                    <li>
                        <a href="{{route('testimonial.index')}}">View All</a>
                    </li>
                    <li>
                        <a href="{{route('testimonial.create')}}">Add New</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#downloads"><i
                        class="fa-solid fa-download"></i> Downloads Table <i class="fa-solid fa-chevron-down"></i></a>
                <ul id="downloads" class="collapse">
                    <li>
                        <a href="{{route('downloadstable.index')}}">View All</a>
                    </li>
                    <li>
                        <a href="{{route('downloadstable.create')}}">Add New</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#about"><i
                        class="fa-solid fa-building-columns"></i> About <i class="fa-solid fa-chevron-down"></i></a>
                <ul id="about" class="collapse">
                    <li>
                        <a href="{{url('/admin/about')}}">View All</a>
                    </li>
                    <li>
                        <a href="{{route('about.create')}}">Add New</a>
                    </li>
                </ul>
            </li>
            <li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#ssr"><i class="fa-solid fa-download"></i>
                    SSR <i class="fa-solid fa-chevron-down"></i></a>
                <ul id="ssr" class="collapse">
                    <li>
                        <a href="{{route('ssr.index')}}">View All</a>
                    </li>
                    <li>
                        <a href="{{route('ssr.create')}}">Add New</a>
                    </li>
                </ul>
            </li>

            @if (auth()->user()->role==='admin')


            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#user"><i class="fa fa-fw fa-users"></i>
                    Users <i class="fa-solid fa-chevron-down"></i></a>
                <ul id="user" class="collapse">
                    <li>
                        <a href="{{route('users.index')}}">View All Users</a>
                    </li>
                    <li>
                        <a href="{{route('users.create')}}">Add New User</a>
                    </li>
                </ul>
            </li>
            @endif
            <!-- <li>
                <a href="{{route('profile.edit')}}"><i class="fa fa-fw fa-user"></i> Profile </a>
            </li> -->
        </ul>
    </div>
</nav>
