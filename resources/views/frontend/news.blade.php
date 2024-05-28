@extends ('frontend.layouts.main')
@section('main-container')
    <!-- Breadcrumb Start -->
    <div class="all-title-box">
        <div class="container text-center">
            <h1>News & Events<span class="m_1"><a href="{{ url('/') }}">Home</a> / <a href="{{ url('/news') }}">News &
                        Events</a></span></h1>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <section class="news-event pt-4 pb-4  " data-aos="fade-up" data-aos-delay="200">

        <div class="container  ">

            <div class="row text-light  ">
                @foreach ($news as $new)
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
        </div>

    </section>
    <div class="pagination" >
    {{ $news->links() }}
    </div>
@endsection
