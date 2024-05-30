@extends ('admin.layouts.adminmain')
@section('adminmain-container')
<div id="wrapper">

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Update Menu
                </h1>
                <form role="form" action="{{route('menu.update',['menu'=>$menu])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')


                            <div class="form-group">
                                <label for="banner_title">Name</label>
                                <input type="text" name="title" class="form-control" value="{{$menu->title}}">
                            </div>



                            <div class="input-group" style="margin-bottom: 13px;">
                                <label for="banner_status">Status</label>
                                <select name="status" class="form-control">
                                <option value="draft" {{$menu->status==='draft'? 'selected':''}}>Draft</option>
                            <option value="published" {{$menu->status==='published'?'selected':''}}>Publish</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="banner_img">Menu Link</label>
                                <font color="brown" >(Only applicable when there are no Sub-Menus)</font>
                                <input type="text" name="link" class="form-control" value="{{$menu->link}}" ">
                            </div>


                            <div class="form-group">
                    <label for="password">Password Protection?</label>
                    <select id="password" name="password" class="form-control" required>
                        <option value="no" {{ $menu->password === 'no' ? 'selected' : '' }}>No</option>
                        <option value="yes" {{ $menu->password === 'yes' ? 'selected' : '' }}>Yes</option>
                    </select>
                </div>

                            <div class=" form-group">
                            <label for="submenu_para">Menu Content</label>
                            <textarea class="form-control" name="description" id="" cols="30"
                                rows="15">{{old('description', $menu->description)}}</textarea>
                        </div>
                            <button type="submit" name="update_banner" class="btn btn-primary" value="Update banner">Update Banner</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
