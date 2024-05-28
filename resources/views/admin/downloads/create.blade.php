@extends ('admin.layouts.adminmain')
@section('adminmain-container')
<div id="wrapper">
        <div id="page-wrapper">

<div class="col-lg-12">
                    <h1 class="page-header">
                        Add Files
                    </h1>

                    <form role="form" action="{{ route('downloads.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="table_id" value="{{ $tableId }}">

                    <div class="form-group">
                        <label for="banner_title">Download Title</label>
                        <input type="text" name="title1" placeholder="Enter title" value="" class="form-control" required>
                    </div>


                    <div class="form-group">
                        <label for="banner_image">File </label>
                        <input type="file" name="file" required>
                    </div>


                    <button type="submit" name="publish_banner" class="btn btn-primary" value="publish banner">Add</button>
                </form>

            </div>
        </div>

    </div>

</div>
@endsection
