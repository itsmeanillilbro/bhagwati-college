@extends ('admin.layouts.adminmain')
@section('adminmain-container')
<div id="wrapper">
  <div id="page-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header">
            <div class="col-xs-4">
              <a href="{{route('users.create')}}" class="btn btn-primary">Add New</a>
              @csrf
            </div>
            All Users
          </h1>

          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Created At</th>
                <th>Role</th>
                <th>Change Role</th>
                <th>Delete</th>
              </tr>
            </thead>

            <tbody id="user-table-body">
            @foreach($users as $user)
    <tr>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ date('Y-m-d', strtotime($user->created_at)) }}</td>
        <td id="user-role-{{ $user->id }}">{{ $user->role }}</td>
        <td>
            <form action="{{ route('users.role', [$user->id]) }}" method="post" id="user-role-form-{{ $user->id }}">
                @csrf

                 <div class="custom-select" style="">
                        <select name="new_role" class="form-select" required>
                            <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                            <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                        </select>
                    </div>
                    <div style="padding:10px 0 0 75px;">
                        <button type="button" class="btn btn-success change-role-btn" data-user-id="{{ $user->id }}" data-current-role="{{ $user->role }}">Change Role</button>
                    </div>

            </form>
        </td>
        <td>
         <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger confirm-delete1">Delete</button>
                </form>

        </td>
    </tr>
@endforeach

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
