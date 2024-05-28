@extends ('admin.layouts.adminmain')
@section('adminmain-container')
<div id="wrapper">
    <div id="page-wrapper">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to Dashboard
                        <small>{{$username}}</small>
                    </h1>

                </div>
            </div>

            <div class="row">
                <!-- USERS -->
                <div class="col-md-6 col-lg-3">
                    <div class="panel panel-dash">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-4x"></i>
                                </div>
                                <div class="col-xs-9">
                                    <div class="text-capitalize text-right">Users</div>
                                    <div class="text-capitalize text-right">({{$userscount}})</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{route('users.index')}}">
                            <div class="panel-footer">
                                <span class="text-capitalize pull-left">View All</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- TOP BANNER -->
                <div class="col-md-6 col-lg-3">
                    <div class="panel panel-dash">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa-solid fa-ribbon fa-4x"></i>
                                </div>
                                <div class="col-xs-9">
                                    <div class="text-capitalize text-right">topbanner</div>
                                    <div class="text-capitalize text-right">({{$topbannerCount}})</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{route('topbanner.index')}}">
                            <div class="panel-footer">
                                <span class="text-capitalize pull-left">View All</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- POPUP -->
                <div class="col-md-6 col-lg-3">
                    <div class="panel panel-dash">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa-solid fa-fire-flame-curved fa-4x"></i>
                                </div>
                                <div class="col-xs-9">
                                    <div class="text-capitalize text-right">popup</div>
                                    <div class="text-capitalize text-right">({{$popupcount}})</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{route('popup.index')}}">
                            <div class="panel-footer">
                                <span class="text-capitalize pull-left">View All</span>

                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- MENU -->
                <div class="col-md-6 col-lg-3">
                    <div class="panel panel-dash">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa-solid fa-bars fa-4x"></i>
                                </div>
                                <div class="col-xs-9">
                                    <div class="text-right text-capitalize">menu</div>
                                    <div class="text-capitalize text-right">({{$menucount}})</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{route('menu.index')}}">
                            <div class="panel-footer">
                                <span class="text-capitalize pull-left">View All</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- SUB MENU -->
                <div class="col-md-6 col-lg-3">
                    <div class="panel panel-dash">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa-brands fa-mendeley fa-4x"></i>
                                </div>
                                <div class="col-xs-9">
                                    <div class="text-right text-capitalize">submenu</div>
                                    <div class="text-capitalize text-right">({{$submenucount}})</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{route('submenu.index')}}">
                            <div class="panel-footer">
                                <span class="text-capitalize pull-left">View All</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- SUB TO SUBMENU -->
                <div class="col-md-6 col-lg-3">
                    <div class="panel panel-dash">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa-brands fa-mendeley fa-4x"></i>
                                </div>
                                <div class="col-xs-9">

                                    <div class="text-right text-capitalize">Sub to submenu</div>
                                    <div class="text-capitalize text-right">({{$subsubmenucount}})</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{route('subsubmenu.index')}}">
                            <div class="panel-footer">
                                <span class="text-capitalize pull-left">View All</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>


                <!-- BANNER -->
                <div class="col-md-6 col-lg-3">
                    <div class="panel panel-dash">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa-solid fa-panorama fa-4x"></i>
                                </div>
                                <div class="col-xs-9">

                                    <div class="text-right text-capitalize">banner</div>
                                    <div class="text-capitalize text-right">({{$bannercount}})</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{route('banner.index')}}">
                            <div class="panel-footer">
                                <span class="text-capitalize pull-left">View All</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- NOTICE -->
                <div class="col-md-6 col-lg-3">
                    <div class="panel panel-dash">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa-solid fa-flag-checkered fa-4x"></i>
                                </div>
                                <div class="col-xs-9">

                                    <div class="text-right text-capitalize">notice</div>
                                    <div class="text-capitalize text-right">({{$noticecount}})</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{route('notice.index')}}">
                            <div class="panel-footer">
                                <span class="text-capitalize pull-left">View All</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- NEWS & EVENTS -->
                <div class="col-md-6 col-lg-3">
                    <div class="panel panel-dash">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa-regular fa-file-lines fa-4x"></i>
                                </div>
                                <div class="col-xs-9">

                                    <div class="text-capitalize text-right">News & Events</div>
                                    <div class="text-capitalize text-right">({{$newscount}})</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{route('news.index')}}">
                            <div class="panel-footer">
                                <span class="pull-left">View All</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- TIMELINE -->
                <div class="col-md-6 col-lg-3">
                    <div class="panel panel-dash">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa-solid fa-timeline fa-4x"></i>
                                </div>
                                <div class="col-xs-9">

                                    <div class="text-capitalize text-right">timeline</div>
                                    <div class="text-capitalize text-right">({{$timelinecount}})</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{route('timeline.index')}}">
                            <div class="panel-footer">
                                <span class="pull-left">View All</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- ACADEMIC -->
                <div class="col-md-6 col-lg-3">
                    <div class="panel panel-dash">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa-solid fa-graduation-cap fa-4x"></i>
                                </div>
                                <div class="col-xs-9">

                                    <div class="text-capitalize text-right">academic</div>
                                    <div class="text-capitalize text-right">({{$academiccount}})</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{route('academic.index')}}">
                            <div class="panel-footer">
                                <span class="pull-left">View All</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- GALLERY -->
                <div class="col-md-6 col-lg-3">
                    <div class="panel panel-dash">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa-regular fa-image fa-4x"></i>
                                </div>
                                <div class="col-xs-9">

                                    <div class="text-capitalize text-right">gallery</div>
                                    <div class="text-capitalize text-right">({{$gallerycount}})</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{route('gallery.index')}}">
                            <div class="panel-footer">
                                <span class="pull-left">View All</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- TESTIMONIALS -->
                <div class="col-md-6 col-lg-3">
                    <div class="panel panel-dash">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa-solid fa-quote-left fa-4x"></i>
                                </div>
                                <div class="col-xs-9">

                                    <div class="text-capitalize text-right">testimonial</div>
                                    <div class="text-capitalize text-right">({{$testimonialcount}})</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{route('testimonial.index')}}">
                            <div class="panel-footer">
                                <span class="pull-left">View All</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- TEAMS -->
                <div class="col-md-6 col-lg-3">
                    <div class="panel panel-dash">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-4x"></i>
                                </div>
                                <div class="col-xs-9">

                                    <div class="text-capitalize text-right">teams</div>
                                    <div class="text-capitalize text-right">({{$teamscount}})</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{route('teams.index')}}">
                            <div class="panel-footer">
                                <span class="pull-left">View All</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

            </div>

        </div>

    </body>

</html>
@endsection
