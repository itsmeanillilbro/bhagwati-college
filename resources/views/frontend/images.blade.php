@extends('frontend.layouts.main')
@section('main-container')

<!-- Breadcrumb Start -->
<div class="all-title-box">
    <div class="container text-center">
        <h1>{{ $gallery->title }} Images<span class="m_1"><a href="{{ url('/') }}">Home</a> / <a href="{{ route('gallery') }}">Gallery</a></span></h1>
    </div>
</div>
<!-- Breadcrumb End -->

<section class="gallery" >
    @foreach ($images as $image)
    <a data-lg-size="2500-2500" class="gallery-item" data-src="{{asset('storage/images/gallery/'.$image->images)}}" data-fancybox="gallery">
    <img class="img-fluid" src="{{asset('storage/images/gallery/'.$image->images)}}" />
  </a>
    @endforeach
</section>
@endsection
