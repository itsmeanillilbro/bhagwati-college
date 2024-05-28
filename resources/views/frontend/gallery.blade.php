@extends ('frontend.layouts.main')
@section ('main-container')

        <!-- Breadcrumb Start -->
        <div class="all-title-box">
            <div class="container text-center">
                <h1>Gallery<span class="m_1"><a href="{{url('/')}}">Home</a> / <a href="{{url('/gallery')}}">Gallery</a></span></h1>
            </div>
        </div>
        <!-- Breadcrumb End -->

        <section class="gallery-section">
            <!-- Container -->
            <div class="containersec">
                @foreach ($gallery as $gal)


                <!-- Gallery Items -->
                <div class="grid-item">
                    <!-- Box -->
                    <div class="box">
                        <!-- Image Holder -->
                        <div class="img-holder">
                            <a href="{{ route('gallery.images', $gal->id) }}"><img src="{{asset('storage/images/gallery/'. $gal->image)}}" alt="Sports Club"></a>
                        </div>
                        <!-- Content -->
                        <div class="box-content">
                            <span class="post">{{$gal->title}}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </section>

@endsection
