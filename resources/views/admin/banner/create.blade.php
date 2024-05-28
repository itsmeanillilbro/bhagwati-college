@extends ('admin.layouts.adminmain')
@section('adminmain-container')
<div id="wrapper">
        <div id="page-wrapper">

<div class="col-lg-12">
                    <h1 class="page-header">
                        Add Banner
                    </h1>

                    <form role="form" action="{{route('banner.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="banner_title">Banner Title</label>
                        <input type="text" name="title" placeholder="Enter title" value="" class="form-control" required>
                    </div>


                    <div class="form-group">
                        <label for="banner_image">Banner Image </label>
                        <font color='brown'> &nbsp;&nbsp;(Allowed image size: 1024 KB) </font>
                        <input type="file" name="image" required>
                    </div>

                    <div class="form-group">
                        <label for="banner_caption">Banner Caption</label>
                        <input type="text" name="caption" placeholder="Enter caption" value=""  class="form-control" required>

                    </div>
                    <button type="submit" name="publish_banner" class="btn btn-primary" value="publish banner">Publish Banner</button>
                </form>

            </div>
        </div>

    </div>

</div>
@endsection
