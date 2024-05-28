@extends ('admin.layouts.adminmain')
@section('adminmain-container')
<div id="wrapper">

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Update Testimonial
                </h1>
                <form role="form" action="{{route('testimonial.update',['testimonial'=>$testimonial])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')

                    <div class="form-group">
                        <label for="tml_name">Name</label>
                        <input type="text" name="title" class="form-control" value="{{$testimonial->title}}">
                    </div>

                    <div class="input-group" style="margin-bottom: 13px;">
                        <label for="tml_status">Testimonial Status</label>
                        <select name="status" class="form-control">
                            <option value="draft" {{$testimonial->status==='draft'? 'selected':''}}>Draft</option>
                            <option value="published" {{$testimonial->status==='published'?'selected':''}}>Publish</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image">Testimonial Image</label>
                        <img class="img-responsive" width="200" src="{{asset('storage/images/testimonial/' . $testimonial->image)}}" alt="Testimonial Photo">
                        <input type="file" name="image" style="margin-top: 7px;">
                    </div>
                    <div class="form-group">
                        <label for="tml_position">Position</label>
                        <input type="text" name="position" class="form-control" value="{{$testimonial->position}}">
                    </div>
                    <div class="form-group">
                        <label for="tml_text">Testimonial Caption</label>
                        <textarea class="form-control" name="description" id="" cols="30" rows="10">{{old('description',$testimonial->description)}}
        </textarea>
                    </div>

                    <button type="submit" name="update_tml" class="btn btn-primary" value="Update tml">Update
                        Testimonial</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection
