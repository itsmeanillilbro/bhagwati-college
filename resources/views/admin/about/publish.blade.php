@extends ('admin.layouts.adminmain')
@section('adminmain-container')
<div id="wrapper">

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        add about
                    </h1>
                    <form role="form" action="{{route('about.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <label for="title">Name</label>
                            <input type="text" name="title" placeholder="Enter Name" value=""
                                class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="image">Image </label>
                            <font color='brown'> &nbsp;&nbsp;(Allowed image size: 1024 KB) </font>
                            <input type="file" name="image">
                        </div>

                        <div class="form-group">
                            <label for="description">About Text</label>
                            <textarea class="form-control" name="description" id="" cols="30" rows="15"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary"
                           >Publish</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
