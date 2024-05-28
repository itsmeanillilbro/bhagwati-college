@extends ('frontend.layouts.main')
@section('main-container')
    <!-- Breadcrumb Start -->
    <div class="all-title-box">
        <div class="container text-center">
            <h1>notices<span class="m_1"><a href="{{ url('/') }}">Home</a> / <a href="{{ url('/notice') }}">notices</a></span>
            </h1>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <section class="main-section">
        <div class="container">
            <div class="row">
                @foreach($notices as $notice)
                <div class="col-md-4">
                    <div class="card">
                        <div class="image" style="background-image: url('{{ asset('storage/images/notice/' .$notice->image) }}');">

                            <h3><a href="{{asset('storage/images/notice/' .$notice->image)}}">{{Str::limit($notice->title,70)}}</a></h3>


                            <a  class="badge download-btn" href="{{ route('download', ['filename' => $notice->image]) }}"><i class="fas fa-download"></i></a>

                        </div>
                        <div class="content">
                            <span class="news-page">
                                <i class="fas fa-calendar"></i>
                                <span class="news-page">Date: <b>{{date('Y-m-d',strtotime($notice->created_at))}}</b></span>
                            </span>

                        </div>
                    </div>
                </div>
@endforeach

            </div>
            <div class="pagination" >
    {{$notices->links()}}
</div>
        </div>
    </section>

@endsection
