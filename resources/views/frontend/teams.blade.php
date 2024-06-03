@extends ('frontend.layouts.main')
@section ('main-container')

        <!-- Breadcrumb Start -->
        <div class="all-title-box">
            <div class="container text-center">
                <h1>Teams<span class="m_1"><a href="{{url('/')}}">Home</a> / <a href="{{url('/teams')}}">Teams</a></span></h1>
            </div>
        </div>
        <!-- Breadcrumb End -->

        <div id="teachers" class="section wb">
            <div class="container">
                <div class="row">
                @foreach ($teams as  $team)
                    <div class="col-lg-3 col-md-6 col-12">



                        <div class="our-team">
                            <div class="team-img">
                                <img src="{{asset('storage/images/team/'. $team->image)}}">
                                <div class="social">
                                    <ul>
                                        <li><a href="{{$team->facebook}}" class="fab fa-facebook"></a></li>
                                        <li><a href="{{$team->instagram}}" class="fab fa-instagram"></a></li>

                                    </ul>
                                </div>
                            </div>
                            <div class="team-content">
                                <h3 class="title">{{$team->title}}</h3>
                                <span class="post">{{$team->designation}}</span>
                            </div>
                        </div>
                    </div>

                    @endforeach

                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end section -->

@endsection
