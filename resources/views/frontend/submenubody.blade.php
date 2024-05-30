@extends ('frontend.layouts.main')
@section('main-container')


<div class="all-title-box">
            <div class="container text-center">
                <h1> {{$submenubody->title1}}<span class="m_1"><a href="{{url('/')}}">Home</a> / <a href="{{route('submenu.body',$submenubody->id)}}"> {{$submenubody->title1}}</a></span></h1>
            </div>
        </div>
<div class="text-center display-4" >

</div>

<div class="container">
{!! $submenubody->description !!}
</div>
@endsection
