@extends ('admin.layouts.adminmain')
@section('adminmain-container')
<div id="wrapper">

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Update Gallery
                </h1>
                <form role="form" action="{{route('gallery.update',['gallery'=>$gallery])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')

                    <div class="form-group">
                        <label for="tml_name">Title</label>
                        <input type="text" name="title" class="form-control" value="{{$gallery->title}}">
                    </div>

                    <div class="input-group" style="margin-bottom: 13px;">
                        <label for="tml_status">Status</label>
                        <select name="status" class="form-control">
                            <option value="draft" {{$gallery->status==='draft'? 'selected':''}}>Draft</option>
                            <option value="published" {{$gallery->status==='published'?'selected':''}}>Publish</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="image">Cover Image</label>
                        <img class="img-responsive" width="200" src="{{asset('storage/images/gallery/' . $gallery->image)}}" alt="Gallery Photo">
                        <input type="file" name="image" style="margin-top: 7px;">
                    </div>

                    <button type="submit" name="update_tml" class="btn btn-primary" value="Update tml">Update
                        </button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection
