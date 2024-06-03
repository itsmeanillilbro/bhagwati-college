@extends ('frontend.layouts.main')
@section('main-container')
    {{-- popup section --}}


    <!-- <div id="myModal" class="modal fade">

        <div class="modal-dialog modal-dialog-centered  modal-lg">
            <div class="modal-content">
                <div class="modal-header my-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                @foreach($popup as $po)
                <h3 class="text-center" >{{$po->title}}</h3>
                <div class="modal-body overflow-hidden">
                    <img class="img-fluid" src="{{ asset('storage/images/popup/' .$po->image) }}" alt="">
                </div>
                @endforeach
            </div>
        </div>
    </div> -->

    <div class="top-news"  >
    <div class="row" >
        <div class="col-md-12 tn-left" >
            <div class="row tn-slider">
                @foreach($banner as $ban)
                    <div class="col-md-12"  >
                        <div class="tn-img" >
                            <img src="{{asset('storage/images/banner/' .$ban->image)}}"  />
                            <div class="tn-title">
                                <h3>{{$ban->caption}}</h3>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

    <!-- Top News End-->

    <!-- Category News Start-->
    <div class="cat-news">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center" >Notices</h2>
                <div class="row cn-slider {{ count($notices) === 1 ? 'single-item' : (count($notices) === 2 ? 'few-items' : '') }}">
                    @foreach($notices as $noti)
                    <div class="col-md-4">
                        <div class="card ">
                            <div class="image" style="background-image: url('{{ asset('storage/images/notice/'. $noti->image) }}');  cursor:pointer;" onclick="location.href='{{asset('storage/images/notice/'. $noti->image)}}'" >
                                <h3>{{ Str::limit($noti->title, 80) }}</h3>
                                <a class="badge" download><i class="fas fa-download"></i></a>
                            </div>
                            <div class="content">
                                <span class="news-page">
                                    <i class="fas fa-calendar"></i>
                                    <span class="news-page">Date: <b>{{ date('Y-m-d', strtotime($noti->created_at)) }}</b></span>
                                </span>
                                <span class="news1-info-page">
                                    <i class="fas fa-clock"></i>
                                    <span class="news-page">Time: <b>{{ date('h:i A', strtotime($noti->created_at)) }}</b></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="btn-page text-center pb-4" >
                <a href="{{route('notice') }}" class="read-more">Read More</a>
            </div>
            </div>



        </div>
    </div>
</div>


    <!-- Category News End-->


    {{-- academics section start --}}
    <section class="pt-4 pb-4" style="background: aliceblue; padding-top: 5%;">
        <div class="container">
            <div class="col-md-8 text-center offset-md-2">
                <h3>Academics</h3>
                <p class="lead">Lorem Ipsum dolroin gravida nibh vel velit auctor aliquet.</p>
            </div>
            <div class="row main-page">

            @foreach($academics  as $aca)
                <div class="card-page">

                    <img src="{{ url('storage/images/academic/'.$aca->academic_img) }}" />
                    <span class="content-page">
                        <span class="title-page">
                            <a href="{{route('academic.details',$aca->id)}}">{{$aca->academic_title}}</a>
                        </span>
                        <span class="description-page">
                           {!!Str::limit($aca->academic_para,80)!!}
                        </span>
                        <span class="info-page">
                            <span class="sub-info-page">
                                <i class="fas fa-clock"></i>
                                <span class="details-page">Duration: <b>
                                      {{$aca->duration}}
                                    </b></span>
                            </span>
                        </span>

                    </span>
                </div>
@endforeach
            </div>
            <div class="btn-page text-center" style="padding: 2%;">
                <a href="{{ url('/academics') }}" class="read-more">Read More</a>
            </div>
        </div>
    </section>
    {{-- academics section end  --}}

    <!-- Main News Start-->
    <div class="main-news  pt-2" >
        <div class="container">
            <div class="col-md-8 text-center offset-md-2">
                <h3>Gallery</h3>
                <p class="lead">Lorem Ipsum dolroin gravida nibh vel velit auctor aliquet.</p>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        @foreach ($gallery as $gal )
                        <div class="col-md-4">
                            <div class="mn-img">
                                <img src="{{ asset('storage/images/gallery/' . $gal->image) }}" />
                                <div class="mn-title">
                                    <a href="{{ route('gallery.images', $gal->id) }}">{{$gal->title}}</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="btn-page text-center" style="padding: 5%;">
                <a href="{{ url('/gallery') }}" class="read-more">Read More</a>
            </div>
                </div>

            </div>

        </div>
    </div>
    <!-- Main News End-->
    {{-- news and events section start  --}}
    <section class="news-event pt-4 pb-4" data-aos="fade-up" data-aos-delay="200"
        style="background: aliceblue; padding-top: 5%;">
        <div class="container">
            <div class="col-md-8 text-center offset-md-2">
                <h3>News & Events</h3>
                <p class="lead">Lorem Ipsum dolroin gravida nibh vel velit auctor aliquet.</p>
            </div>
@php
$chunks = $news->take(6);
@endphp
            <div class="row text-light  ">
                @foreach ($chunks as $new)
                    <div class="col-12 col-sm-6 col-md-4 mb-4">
                        <div class="news-card">
                            <div class="ne-img overflow-hidden">
                                <a href="{{ asset('storage/images/news/' . $new->news_img) }}"><img class="img-fluid"
                                        src="{{ asset('storage/images/news/' . $new->news_img) }}" alt=""></a>
                            </div>
                            <div class="news-header">
                                <span class="news-page">
                                    <span class="news-info-page">
                                        <i class="fas fa-calendar"></i>
                                        <span class="news-page">Date: <b>
                                                {{ date('Y-m-d', strtotime($new->created_at)) }}
                                            </b></span>
                                    </span>
                                    <span class="news1-info-page">
                                        <i class="fas fa-clock"></i>
                                        <span class="news-page"><b>
                                                @if ($new->created_at->isToday())
                                                    Today
                                                @elseif($new->created_at->isYesterday())
                                                    Yesterday
                                                @else
                                                    {{ $new->created_at->diffForHumans() }}
                                                @endif
                                            </b></span>
                                    </span>
                      </span>
                                <div class="ps-2 pe-2 pt-2 pb-2">
                                    <h5><a href="{{ route('news_details',[$new->id]) }}" class="news-title">{{ $new->title }}</a></h5>
                                    @php
                                    $plainText = strip_tags($new->news_para);
                                    $limitedText = Str::limit($plainText, 70);
                                    @endphp
                                    <span class="news-para">{{ $limitedText }}</span>
                                </div>
                            </div>

                        </div>

                    </div>
                @endforeach


            </div>

            <div class="btn-page text-center" style="padding: 1%;">
                <a href="{{ url('/news') }}" class="read-more">Read More</a>
            </div>

        </div>

    </section>

    {{-- news and events section end --}}


    <!-- TESTIMONIAL SECTION -->
    <section class="client pt-3 pb-5"  >
    <div class="container-fluid">
        <div class="row text-center">
            <div class="col-12">
                <h1 class="display-3 fw-bold text-white">Testimonials</h1>
                <hr class="bg-white mb-4 mt-0 d-inline-block mx-auto" style="width: 100px; height:3px;">
                <p class="p-text text-white">What our teachers are saying</p>
            </div>
        </div>
    </div>
    <div class="container" >
        <div class="row align-items-md-center text-white">
            <div class="col-lg-12 col-md-12 col-sm-12" >
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel"  >

                    <div class="carousel-inner" >
                        @foreach ($testimonial as $key => $test)
                        <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                            <div class="row p-4">
                                <div class="t-card">
                                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                                    <p class="lh-lg"  style="max-width: 600px; margin: 0 auto;">{!!$test->description!!}</p>
                                    <i class="fa fa-quote-right" aria-hidden="true"></i><br>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-sm-2 pt-3">
                                        <img src="{{asset('storage/images/testimonial/'. $test->image)}}"
                                            class="rounded-circle img-responsive img-fluid testimonial-image">
                                    </div>
                                    <div class="col-sm-10">
                                        <div class="arrow-down d-none d-lg-block"></div>
                                        <h4><strong>{{$test->title}}</strong></h4>
                                        <p class="testimonial_subtitle"><span>{{$test->position}}</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="controls text-center">
                        <a class="left-arrow" href="#carouselExampleCaptions" data-bs-slide="prev"><i
                                class="fa fa-chevron-left" aria-hidden="true"></i></a>
                        <a class="right-arrow" href="#carouselExampleCaptions" data-bs-slide="next"><i
                                class="fas fa-chevron-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
