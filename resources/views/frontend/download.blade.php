@extends ('frontend.layouts.main')
@section('main-container')
    <!-- Breadcrumb Start -->
    <div class="all-title-box">
        <div class="container text-center">
            <h1>Downloads<span class="m_1"><a href="{{ url('/') }}">Home</a> / <a
                        href="{{ url('/download') }}">Downloads</a></span></h1>
        </div>
    </div>
    <!-- Breadcrumb End -->
    <section>
    @foreach($downloadsWithTables as $downloadWithTable)
        <div class="container">
            <center>
                <h3 class="pt-4" >{{ $downloadWithTable['table']->title }}</h3>
            </center>
            <br>
            <table class="table table-bordered">
                <thead class="bg-download">
                    <tr>
                        <th class="serial-no" scope="col">SN</th>
                        <th scope="col">Title</th>
                        <th scope="col">Downloads</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($downloadWithTable['downloads'] as $down)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $down->title }}</td>
                            <td><a class='down-title' href="{{ route('download1', ['filename' => $down->file]) }}">{{ $down->file }}</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endforeach
</section>

@endsection
