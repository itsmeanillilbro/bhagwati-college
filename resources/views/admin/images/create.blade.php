@extends ('admin.layouts.adminmain')
@section('adminmain-container')
<div id="wrapper">
        <div id="page-wrapper">

<div class="col-lg-12">
                    <h1 class="page-header">
                        Add Images
                    </h1>

                    <form role="form" action="{{route('images.store')}}" method="POST" enctype="multipart/form-data">
@csrf
<input type="hidden" name="gallery_id" value="{{ $gallery_id}}">
                <div class="form-group">
                    <label for="gallery_images">Select Images </label>
                    <font color='brown'> &nbsp;&nbsp;(Allowed image size: 1024 KB) </font>
                    <input type="file" name="images[]" multiple>


                </div>
                <button type="submit" name="publish_images" class="btn btn-primary" value="publish gallery">Publish</button>

                    </form>

                </div>
                </div>
                </div>
@endsection
