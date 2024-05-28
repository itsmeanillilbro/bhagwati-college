@extends('admin.layouts.adminmain')
@section('adminmain-container')

<div id="wrapper">
    <div id="page-wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        <div class="col-xs-4">
                            <a href="{{ route('images.create', $gallery_id)}}" class="btn btn-primary">Add New</a>
                        </div>
                        Images
                    </h1>
                    <div class="row image-container">
                        @foreach($images as $image)
                            <div class="image-card">
                                <img src="{{asset('storage/images/gallery/' . $image->images)}}" alt="Image not found">
                                <form action="{{ route('images.destroy',  [$image->id, $gallery_id])}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger  delete-btn confirm-delete "  >
                                        <i class=" fa-solid fa-delete-left"></i>
                                    </button>
                                </form>

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
