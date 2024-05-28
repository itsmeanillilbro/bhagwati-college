@extends ('admin.layouts.adminmain')
@section('adminmain-container')
<div id="wrapper">
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Add a new user
                    </h1>

                    <form role="form" action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="user_title">Username</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>



                        <div class="form-group">
                            <label for="role">Role:</label>
                            <select class="form-control" name="role" id="role" required>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="user_tag">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="user_tag">Password</label>
                            <input type="password" name="password" class="form-control" required>

                        </div>
                        <button type="submit" name="add" class="btn btn-primary" value="Add User">Add User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
