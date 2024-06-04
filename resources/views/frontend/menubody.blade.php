@extends ('frontend.layouts.main')
@section('main-container')


<div class="all-title-box">
            <div class="container text-center">
                <h1> {{$menubody->title}}<span class="m_1"><a href="{{url('/')}}">Home</a> / <a href="{{route('menu.body',$menubody->id)}}"> {{$menubody->title}}</a></span></h1>
            </div>
        </div>
<div class="text-center display-4" >

</div>

<div class="container">
{!! $menubody->description !!}
</div>


@endsection
