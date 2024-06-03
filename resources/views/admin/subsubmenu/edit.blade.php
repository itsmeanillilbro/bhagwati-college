@extends ('admin.layouts.adminmain')
@section('adminmain-container')
<div id="wrapper">

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Update SubMenu of Submenu
                </h1>
                <form role="form" action="{{route('subsubmenu.update',['subsubmenu'=>$subsubmenu, 'menus'=>$menus])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                <label for="banner_title">SubMenu</label>
                <select class="form-control" name="submenu_id" required>
                <label for="banner_title">enu</label>
    <!-- <option value="">Select SubMenu</option> -->
    @foreach ($menus as $menu)
  <option value="{{ $menu->id }}" {{ $subsubmenu->submenu_id == $menu->id ? 'selected' : '' }}>
    {{ $menu->title1 }}
  </option>
@endforeach
y
</select>
</div>

                            <div class="form-group">
                                <label for="banner_title">Submenu</label>
                                <input type="text" name="subsubmenutitle" class="form-control" value="{{$subsubmenu->subsubmenutitle}}">
                            </div>

                            <!-- <div class="input-group" style="margin-bottom: 13px;">
                                <label for="banner_status">Status</label>
                                <select name="status" class="form-control">
                                <option value="draft" {{$subsubmenu->status==='draft'? 'selected':''}}>Draft</option>
                            <option value="published" {{$subsubmenu->status==='published'?'selected':''}}>Publish</option>
                                </select>
                            </div> -->

                            <div class="form-group">
                                <label for="banner_img">Submenu URL</label>

                                <input type="text" name="link" class="form-control" value="{{$subsubmenu->link}}" >
                            </div>

                            <div class="form-group">
                    <label for="password">Password Protection?</label>
                    <select id="password" name="password" class="form-control" required>
                        <option value="no" {{ $subsubmenu->password === 'no' ? 'selected' : '' }}>No</option>
                        <option value="yes" {{ $subsubmenu->password === 'yes' ? 'selected' : '' }}>Yes</option>
                    </select>
                </div>

                            <div class="form-group">
                            <label for="submenu_para">Submenu Content</label>
                            <textarea class="form-control" name="description" id="" cols="30" rows="15">{{old('description',$subsubmenu->description)}}</textarea>
                        </div>
                            <button type="submit" name="update_banner" class="btn btn-primary" value="Update banner">Update Banner</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
