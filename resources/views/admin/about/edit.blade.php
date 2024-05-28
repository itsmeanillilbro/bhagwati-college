@extends ('admin.layouts.adminmain')
@section('adminmain-container')
<div id="wrapper">

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Update About
                    </h1>
                    <form role="form" action="{{route('about.update', ['about' => $about])}}" method="POST" enctype="multipart/form-data">

    @method('PUT')
    @csrf
                        <div class="form-group">
                            <label for="about_title">Title</label>
                            <input type="text" name="title" class="form-control" value="{{$about->title}}">
                        </div>


                        <div class="input-group" style="margin-bottom: 13px;">
                        <label for="tml_status">Testimonial Status</label>
                       <select name="status" class="form-control">
                             <option value="draft" {{ $about->status === 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="published" {{ $about->status === 'published' ? 'selected' : '' }}>Publish</option>
                        </select>
                    </div>
                        <div class="form-group">
                            <label for="about_img">Image</label>
                            <img class="img-responsive" width="200" src="{{asset('storage/images/about/' . $about->image)}}" >
                            <input type="file" name="image" style="margin-top: 7px;">
                        </div>
                        <div class="form-group">
                            <label for="about_text">Edit description</label>
                            <textarea class="form-control" name="description" id="text" cols="30" rows="10" >{{old('description', $about->description) }}
                           </textarea>
                        </div>

                        <button type="submit" name="update_about" class="btn btn-primary" value="Update about">Update
                            </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
