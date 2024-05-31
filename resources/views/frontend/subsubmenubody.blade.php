@extends ('frontend.layouts.main')
@section('main-container')


<div class="all-title-box">
            <div class="container text-center">
                <h1> {{$subsubmenubody->subsubmenutitle}}<span class="m_1"><a href="{{url('/')}}">Home</a> / <a href="{{route('subsubmenu.body',$subsubmenubody->id)}}"> {{$subsubmenubody->subsubmenutitle}}</a></span></h1>
            </div>
        </div>
<div class="text-center display-4" >

</div>

<div class="container">
{!! $subsubmenubody->description !!}
</div>
@endsection
