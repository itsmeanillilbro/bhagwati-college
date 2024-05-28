@extends ('admin.layouts.adminheader')
@extends ('admin.layouts.adminfooter')
@if ($errors->any())
    <script>
        @foreach ($errors->all() as $error)
            toastr.error("{{ $error }}");
        @endforeach
    </script>
@endif

<div class="container">
        <div class="login-form  justify-content-center">
            <div class="text-center mb-4">
                <div>
                    <img class="img-fluid" src="{{url('frontend\img\logo.png')}}" alt="logo" width="25%">
                </div>
                <h3>Admin Panel</h3>
            </div>
            <form method="POST" action="{{ route('login') }}" class="admin-login needs-validation" novalidate>
                @csrf

                <div class="row">
                    <div class="col-md-12 mb-3" >
                        <label for="user_name">Username:</label>
                        <div class="input-group  input-group1">
                            <input type="text" class="form-control" id="user_name" placeholder="Enter Username" name="email" aria-describedby="inputGroupPrepend" required>

                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="user_password">Password:</label>
                        <div class="input-group  input-group1">
                            <input type="password" class="form-control" id="user_password" placeholder="Enter Password" name="password" aria-describedby="inputGroupPrepend" required>

                        </div>
                    </div>
                </div>
<br>
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                        <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="text-center">
                    <button class="mybtn btn" type="submit" name="login">Submit</button>
                </div>
            </form>
        </div>
    </div>
