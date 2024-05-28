@extends ('admin.layouts.adminmain')
@section('adminmain-container')
<div id="wrapper">
        <div id="page-wrapper">

<div class="col-lg-12">
                    <h1 class="page-header">
                        Add Timeline
                    </h1>

                    <form role="form" action="{{route('timeline.store')}}" method="POST" enctype="multipart/form-data">
@csrf
                        <div class="form-group">
                            <label for="tml_name">Title</label>
                            <input type="text" name="title" placeholder="Enter Name" value="" class="form-control" required="">
                        </div>

                        <div class="form-group">
                            <label for="timeline_year">Timeline Year</label>
                            <input type="date" name="date" placeholder="Enter timeline year" value="" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="timeline_text">Timeline Text</label>
                            <textarea class="form-control" name="text" id="" cols="30" rows="15"></textarea>
                        </div>
                        <button type="submit" name="publish_tml" class="btn btn-primary" value="publish tml">Publish</button>

                    </form>

                </div>
                </div>
                </div>
@endsection
