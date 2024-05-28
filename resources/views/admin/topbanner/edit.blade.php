@extends ('admin.layouts.adminmain')
@section('adminmain-container')
<div id="wrapper">

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Update Banner
                </h1>
                <form role="form" action="{{route('topbanner.update',['topbanner'=>$topbanner])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')


                            <div class="form-group">
                                <label for="banner_title">Banner Link</label>
                                <input type="text" name="title" class="form-control" value="{{$topbanner->title}}">
                            </div>



                            <div class="input-group" style="margin-bottom: 13px;">
                                <label for="banner_status">Banner Status</label>
                                <select name="status" class="form-control">
                                <option value="draft" {{$topbanner->status==='draft'? 'selected':''}}>Draft</option>
                            <option value="published" {{$topbanner->status==='published'?'selected':''}}>Publish</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="banner_img">Banner Image</label>
                                <font color='brown'> &nbsp;&nbsp;(Recommended image size: 540*90) </font>
                                <img class="img-responsive" width="200" src="{{asset('storage/images/topbanner/' .$topbanner->image)}}" alt="Photo">
                                <input type="file" name="image" style="margin-top: 7px;">
                            </div>
                            <button type="submit" name="update_banner" class="btn btn-primary" value="Update banner">Update Banner</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
