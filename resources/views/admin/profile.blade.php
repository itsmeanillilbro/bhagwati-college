@extends ('admin.layouts.adminmain')
@section('adminmain-container')
<div id="wrapper">
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to your Profile
                        <small></small>
                    </h1>
                    <form role="form" action="" method="POST" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="user_title">User Name</label>
                            <input type="text" name="username" class="form-control" value="" readonly>
                        </div>
                        <div class="form-group">
                            <label for="user_author">FirstName</label>
                            <input type="text" name="firstname" class="form-control" value="" required>
                        </div>

                        <div class="form-group">
                            <label for="user_status">LastName</label>
                            <input type="text" name="lastname" class="form-control" value="" required>
                        </div>
                        <div class="form-group">
                            <label for="user_tag">Email</label>
                            <input type="email" name="email" class="form-control" value="" required>
                        </div>
                        <div class="form-group">
                            <label for="usertag">Current Password</label>
                            <input type="password" name="currentpassword" class="form-control"
                                placeholder="Enter Current password" required>
                        </div>
                        <div class="form-group">
                            <label for="usertag">New Password</label>
                            <input type="password" name="newpassword" class="form-control"
                                placeholder="Enter New Password">
                        </div>
                        <div class="form-group">
                            <label for="usertag">Confirm New Password</label>
                            <input type="password" name="confirmnewpassword" class="form-control"
                                placeholder="Re-Enter New Password">
                        </div>
                        <hr>
                        <button type="submit" name="update" class="btn btn-primary" value="Update User">Update
                            User
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
