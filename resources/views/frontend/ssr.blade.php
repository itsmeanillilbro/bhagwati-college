@extends ('frontend.layouts.main')
@section('main-container')
<!-- Breadcrumb Start -->
<div class="all-title-box">
    <div class="container text-center">
        <h1>SSR<span class="m_1"><a href="{{ url('/') }}">Home</a> / <a href="{{ url('/SSR') }}">SSR</a></span></h1>
    </div>
</div>
<!-- Breadcrumb End -->
<section>

    <div class="container my-5">
        <center>
            <h3 class="pt-2">ALL FILES</h3>
        </center>
        <br>
        @foreach($ssr as $sr)
            <div class="mx-3 my-3" style="font-size:1.6rem;" >
                <!-- <td><a class='down-title' href="{{ route('ssr.download', ['filename' => $sr->file]) }}">{{ $sr->file }}</a></td> -->
                {{$loop->iteration}}. <a class="text-primary"
                    href="{{asset("storage/images/file/" . $sr->file)}}">{{$sr->title}}</a><br>
            </div>
        @endforeach

    </div>
</section>

@endsection
