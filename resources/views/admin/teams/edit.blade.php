@extends ('admin.layouts.adminmain')
@section('adminmain-container')
<div id="wrapper">

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Update Team Details
                    </h1>
                    <form role="form" action="{{route('teams.update', ['team' => $team])}}" method="POST" enctype="multipart/form-data">

    @method('PUT')
    @csrf
                        <div class="form-group">
                            <label for="about_title">Title</label>
                            <input type="text" name="title" class="form-control" value="{{$team->title}}">
                        </div>


                        <div class="input-group" style="margin-bottom: 13px;">
                        <label for="tml_status">Testimonial Status</label>
                       <select name="status" class="form-control">
                             <option value="draft" {{ $team->status === 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="published" {{ $team->status === 'published' ? 'selected' : '' }}>Publish</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="designation">Designation:</label>
                        <input type="text" name="designation" class="form-control" value="{{$team->designation}}">
                    </div>

                    <div class="form-group">
                        <label for="facebook">Facebook:</label>
                        <input type="text" name="facebook" class="form-control" value="{{$team->facebook}}">
                    </div>
                    <div class="form-group">
                        <label for="instagram">Instagram:</label>
                        <input type="text" name="instagram" class="form-control" value="{{$team->instagram}}">
                    </div>
                        <div class="form-group">
                            <label for="about_img">Image</label>
                            <img class="img-responsive" width="200" src="{{asset('storage/images/team/' . $team->image)}}" >
                            <input type="file" name="image" style="margin-top: 7px;">
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
