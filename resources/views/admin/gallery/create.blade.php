@extends ('admin.layouts.adminmain')
@section('adminmain-container')
<div id="wrapper">
        <div id="page-wrapper">

<div class="col-lg-12">
                    <h1 class="page-header">
                        Add Gallery
                    </h1>

                    <form role="form" action="{{route('gallery.store')}}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="tml_name">Title</label>
        <input type="text" name="title" placeholder="Enter Name" value="" class="form-control" required="">
    </div>

    <div class="form-group">
        <label for="gallery_image">Cover Image </label>
        <font color='brown'> &nbsp;&nbsp;(Allowed image size: 1024 KB) </font>
        <input type="file" name="image">
    </div>

    <div class="form-group">
        <label for="gallery_images">Select Multiple Images</label>
        <font color='brown'> &nbsp;&nbsp;(Allowed image size: 1024 KB) </font>
        <input type="file" name="multipleimages[]" multiple>
    </div>

    <button type="submit" name="publish_tml" class="btn btn-primary" value="publish tml">Publish</button>

</form>


                </div>
                </div>
                </div>
@endsection
