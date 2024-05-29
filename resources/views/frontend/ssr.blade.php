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
        <table class="table table-bordered ">

            <thead class="bg-download">
                <tr>
                    <th class="serial-no" scope="col">SN</th>
                    <th scope="col">Title</th>
                    <th scope="col">Downloads</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    @foreach($ssr as $sr)
                        <td>{{$loop->iteration}}</td>
                        <td>{{$sr->title}}</td>
                        <td><a class='down-title' href="{{ route('ssr.download', ['filename' => $sr->file]) }}">{{ $sr->file }}</a></td>
                    @endforeach
                </tr>
            </tbody>
        </table>
    </div>
</section>

@endsection
