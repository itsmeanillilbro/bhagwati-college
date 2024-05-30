@extends ('admin.layouts.adminmain')
@section('adminmain-container')
<div id="wrapper">
        <div id="page-wrapper">

<div class="col-lg-12">
                    <h1 class="page-header">
                        Add Menu
                    </h1>

                    <form role="form" action="{{route('menu.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="banner_title">Name</label>
                        <input type="text" name="title" placeholder="Enter title" value="" class="form-control" required>
                    </div>
                    <font color="brown" >(Only applicable when there are no Sub-Menus)</font>

                    <div class="form-group">
                        <label for="banner_image">Menu Link </label>

                        <input type="text" name="link"  class="form-control">
                    </div>

                    <div class="form-group">
                    <label for="password">Password Protection?</label>
                    <select id="password" name="password" class="form-control" required>
                        <option value="no">No</option>
                        <option value="yes">Yes</option>
                    </select>
                </div>

                    <div class="form-group">
                    <label for="submenu_para">Menu Content</label>
                    <textarea class="form-control" name="description" id="" cols="30" rows="15"></textarea>
                </div>

                    <button type="submit" name="publish_banner" class="btn btn-primary" value="publish banner">Publish</button>
                </form>

            </div>
        </div>

    </div>

</div>
@endsection
