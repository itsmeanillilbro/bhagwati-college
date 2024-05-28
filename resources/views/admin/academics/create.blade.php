@extends ('admin.layouts.adminmain')
@section('adminmain-container')
    <div id="wrapper">
    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Add academic
                    </h1>


                    <form role="form" action="{{route('academic.store')}}" method="POST" enctype="multipart/form-data">
@csrf
                        <div class="form-group">
                            <label for="academic_title">Name</label>
                            <input type="text" name="academic_title" placeholder="Enter Name" value="" class="form-control" required>
                        </div>


                        <div class="form-group">
                            <label for="academic_image">Image </label>
                            <font color='brown'> &nbsp;&nbsp;(Allowed image size: 1024 KB) </font>
                            <input type="file" name="academic_img">
                        </div>
                        <div class="form-group">
                            <label for="academic_req">Description</label>
                            <textarea class="form-control" name="academic_para" id="academic_req" cols="30" rows="15">
</textarea>
                        </div>

                        <div class="form-group">
                            <label for="academic_image">Duration </label>

                            <input type="text" name="duration" class="form-control" required >
                        </div>

                        <button type="submit" name="publish_academic" class="btn btn-primary" value="publish academic">Publish</button>

                    </form>

                </div>
            </div>

        </div>

    </div>
</div>
</div>
