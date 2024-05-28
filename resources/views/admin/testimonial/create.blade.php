@extends ('admin.layouts.adminmain')
@section('adminmain-container')
<div id="wrapper">
        <div id="page-wrapper">

<div class="col-lg-12">
                    <h1 class="page-header">
                        Add testimonial
                    </h1>

                    <form role="form" action="{{route('testimonial.store')}}" method="POST" enctype="multipart/form-data">
@csrf
                        <div class="form-group">
                            <label for="tml_name">Name</label>
                            <input type="text" name="title" placeholder="Enter Name" value="" class="form-control" required="">
                        </div>

                        <div class="form-group">
                            <label for="tml_image">Image </label>
                            <font color="brown"> &nbsp;&nbsp;(Allowed image size: 1024 KB) </font>
                            <input type="file" name="image">
                        </div>

                        <div class="form-group">
                            <label for="tml_position">Position</label>
                            <input type="text" name="position" placeholder="Enter Position" value="" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label for="tml_text">Caption</label>
                            <textarea class="form-control" name="description"  cols="30" rows="15" ></textarea>
                        </div>
                        <button type="submit" name="publish_tml" class="btn btn-primary" value="publish tml">Publish</button>

                    </form>

                </div>
                </div>
                </div>
@endsection
