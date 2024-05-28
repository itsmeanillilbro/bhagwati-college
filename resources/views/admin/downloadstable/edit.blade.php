@extends ('admin.layouts.adminmain')
@section('adminmain-container')
<div id="wrapper">

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Update SSR
                </h1>
                <form role="form" action="{{route('downloadstable.update',['downloadstable'=>$downloadstable])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')


                            <div class="form-group">
                                <label for="banner_title">Table Name</label>
                                <input type="text" name="title" class="form-control" value="{{$downloadstable->title}}">
                            </div>



                            <div class="input-group" style="margin-bottom: 13px;">
                                <label for="banner_status">Status</label>
                                <select name="status" class="form-control">
                                <option value="draft" {{$downloadstable->status==='draft'? 'selected':''}}>Draft</option>
                            <option value="published" {{$downloadstable->status==='published'?'selected':''}}>Publish</option>
                                </select>
                            </div>

                            <button type="submit" name="update_banner" class="btn btn-primary" value="Update banner">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
