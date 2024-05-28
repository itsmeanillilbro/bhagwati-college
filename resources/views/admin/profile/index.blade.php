@extends ('admin.layouts.adminmain')
@section('adminmain-container')
<div id="wrapper" >
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to your Profile

                        </h1>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update',['users'=>$user]) }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

<div class="form-group">
		<label for="user_title">User Name</label>
		<input type="text" name="name" class="form-control" value="{{old('name', $user->name)}}" >
	</div>

	<div class="form-group">
		<label for="user_tag">Email</label>
		<input type="email" name="email" class="form-control" value="{{old('email', $user->email)}}" required>
	</div>
	<div class="form-group">
		<label for="usertag">Current Password</label>
		<input type="password" name="currentpassword" class="form-control" placeholder="Enter Current password" required>
	</div>
	<div class="form-group">
		<label for="usertag">New Password</label>
        <font color="brown" >(Optional)</font>
		<input type="password" name="password" class="form-control" placeholder="Enter New Password">
        @error('password')
        <span class="text-danger">{{ $message }}</span>
    @enderror
	</div>
	<div class="form-group">
		<label for="usertag">Confirm New Password</label>
		<input type="password" name="password_confirmation" class="form-control" placeholder="Re-Enter New Password" >

    </div>

<button type="submit" name="update" class="btn btn-primary" value="Update User">Update User</button>
</form>

</div>



                    </div>
                </div>


            </div>


        </div>
    </div>
    </div>
@endsection
