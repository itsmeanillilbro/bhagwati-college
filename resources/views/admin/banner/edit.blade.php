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
                <form role="form" action="{{route('banner.update',['banner'=>$banner])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')


                            <div class="form-group">
                                <label for="banner_title">Banner Title</label>
                                <input type="text" name="title" class="form-control" value="{{$banner->title}}">
                            </div>



                            <div class="input-group" style="margin-bottom: 13px;">
                                <label for="banner_status">Banner Status</label>
                                <select name="status" class="form-control">
                                <option value="draft" {{$banner->status==='draft'? 'selected':''}}>Draft</option>
                            <option value="published" {{$banner->status==='published'?'selected':''}}>Publish</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="banner_img">Banner Image</label>
                                <img class="img-responsive" width="200" src="{{asset('storage/images/banner/' .$banner->image)}}" alt="Photo">
                                <input type="file" name="image" style="margin-top: 7px;">
                            </div>
                            <div class="form-group">
                                <label for="banner_caption">Banner Caption</label>

                                <input class="form-control" type="text" name="caption" value="{{old('caption',$banner->caption)}}">
                            </div>

                            <button type="submit" name="update_banner" class="btn btn-primary" value="Update banner">Update Banner</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
