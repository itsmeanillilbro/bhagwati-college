@extends ('frontend.layouts.main')
@section ('main-container')

<!-- Breadcrumb Start -->
<div class="all-title-box">
    <div class="container text-center">
        <h1>About Us<span class="m_1"><a href="{{url('/')}}">Home</a> / <a href="{{url('/about')}}">About Us</a></span>
        </h1>
    </div>
</div>
<!-- Breadcrumb End -->

<div id="overviews" class="section lb">
    @foreach($entries as $ab)
        <div class="container " style="max-width:1250px" >
        <div class="col-lg-12 d-flex about mb-5 pb-5 ">
        <div class="mt-4 col-lg-6 col-md-6 col-sm-12 about-para" >
            <h2>About Us</h2>
                    <p class="">
                        {!!$ab->description!!}
                    </p>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 about-image">
                    <img class="img-fluid about-image1" src="{{asset('storage/images/about/' . $ab->image)}}" alt="aboutimg"
                        style="">
                </div>


    @endforeach
        </div>
    </div><!-- end container -->



    <div class="about__section-wrapper-bottom">
                <div class="about__section-wrapper-bottom-title">
                    <h3 class="title">
                        Why Choose Us?                    </h3>
                </div>

                <div class="about__section-wrapper-bottom-des">
                    <!-- <ul class="des-menu">
                        <li class="des-menu-list">
                            Nagarjuna  is working in the education field since 1988
                        </li>


                    </ul> -->
                    <ul class="des-menu">
	<li class="des-menu-list">Nagarjuna is working in the education field since 1988</li>
	<li class="des-menu-list">Enough spacious space with Basketball court, Badminton court, enough parking space.</li>
	<li class="des-menu-list">Many times our students have able to achieve top position in the TU results.</li>
	<li class="des-menu-list">Resourceful library, we provide all textbooks for every student in every semester.</li>
	<li class="des-menu-list">BIM from 2002 AD</li>
	<li class="des-menu-list">BSc CSIT since 2010 .</li>
</ul>
                </div>
            </div>
</div><!-- end section -->


@endsection
