@extends ('admin.layouts.adminmain')
@section('adminmain-container')
<div id="wrapper">
        <div id="page-wrapper">

<div class="col-lg-12">
                    <h1 class="page-header">
                        Add Sub-Submenu
                    </h1>

                    <form role="form" action="{{route('subsubmenu.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                    <label for="submenu_name">SubMenu</label>
                    <select class="form-control" name="submenu_id" required>
  <option value="">Select SubMenu</option>
  @foreach ($submenus as $submenu)
      <option value="{{ $submenu->id }}">{{ $submenu->title1 }}</option>
  @endforeach
</select>
</div>
                    <div class="form-group">
                        <label for="submenu_name">Sub-Submenu Name</label>
                        <input type="text" name="subsubmenutitle" placeholder="Enter Submenu Name" value=""
                            class="form-control" required>
                    </div>


                    <div class="form-group">
                        <label for="submenu_url">Sub-Submenu URL</label>
                        <input type="text" name="link" placeholder="Enter submenu url" value=""
                            class="form-control" required>
                    </div>
                    <div class="form-group">
                            <label for="submenu_para">Sub-Submenu Content</label>
                            <textarea class="form-control" name="description" id="" cols="30" rows="15"></textarea>
                        </div>

                    <button type="submit" name="publish_submenu" class="btn btn-primary"
                        value="publish submenu">Publish</button>

                </form>

            </div>
        </div>

    </div>

</div>
@endsection
