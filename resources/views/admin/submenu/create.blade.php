@extends ('admin.layouts.adminmain')
@section('adminmain-container')
<div id="wrapper">
    <div id="page-wrapper">

        <div class="col-lg-12">
            <h1 class="page-header">
                Add Submenu
            </h1>

            <form role="form" action="{{route('submenu.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="submenu_name">Menu</label>
                    <select class="form-control" name="menu_id" required>
                        <option value="">Select Menu</option>
                        @foreach ($menus as $menu)
                        <option value="{{ $menu->id }}">{{ $menu->title }}</option> @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="submenu_name">Submenu Name</label>
                    <input type="text" name="title1" placeholder="Enter Submenu Name" value="" class="form-control"
                        required>
                </div>


                <div class="form-group">
                    <label for="submenu_url">Submenu URL</label>
                    <input type="text" name="link" placeholder="Enter submenu url" value="" class="form-control"
                        >
                </div>

                <div class="form-group">
                    <label for="password">Password Protection?</label>
                    <select id="password" name="password" class="form-control">
                        <option value="no">No</option>
                        <option value="yes">Yes</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="submenu_para">Submenu Content</label>
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
