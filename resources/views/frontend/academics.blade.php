@extends ('frontend.layouts.main')
@section('main-container')
    <!-- Breadcrumb Start -->
    <div class="all-title-box">
        <div class="container text-center">
            <h1>Academics<span class="m_1"><a href="{{ url('/') }}">Home</a> / <a
                        href="{{ url('/Academics') }}">Academics</a></span></h1>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <section class="pt-4 pb-4">
        <div class="container">
        <div class="row main-page">
            @foreach($academics as $aca)
            <div class="card-page">
                <img src="{{ asset('storage/images/academic/' .$aca->academic_img)}}" />
                <span class="content-page">
                    <span class="title-page">
                        <a href="{{route('academic.details',$aca->id)}}">{{$aca->academic_title}}</a>
                    </span>
                    <span class="description-page text-white">
                      {!! Str::limit($aca->academic_para,80)!!}
                    </span>
                    <!-- <span class="info-page">
                        <span class="sub-info-page">
                            <i class="fas fa-clock"></i>
                            <span class="details-page">Duration: <b>
                                    4 years
                                </b></span>
                        </span>
                        <span class="sub-info-page">
                            <i class="fas fa-graduation-cap"></i>
                            <span class="details-page">Faculty: <b>
                                    mgmt
                                </b></span>
                        </span>
                    </span> -->

                </span>
            </div>
@endforeach
        </div>
        </div>
    </section>
@endsection
