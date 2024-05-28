@extends ('admin.layouts.adminmain')
@section('adminmain-container')

<div id="wrapper">
<div id="page-wrapper">
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    <div class="col-xs-4">
                        <a href="{{route('notice.create')}}" class="btn btn-primary">Add New</a>
                    </div>
                    All Notices
                </h1>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Author</th>
                                            <th>Title</th>
                                            <th>Status</th>
                                            <th>Image</th>
                                            <th>Date</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                            <th>Publish</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                    @foreach($notice as $noti)
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$noti->author}}</td>
                                        <td>{{$noti->title}}</td>
                                        <td>{{$noti->status}}</td>
                                        <td><img src="{{asset('storage/images/notice/' . $noti->image)}}"  style="width:100px; alt=""></td>

                                        <td>{{date('Y-m-d', strtotime($noti->created_at))}}</td>
                                        <td><a class="btn btn-primary" href="{{route('notice.edit', $noti->id)}}" >Edit</a></td>
                                        <td>
                                            <form action="{{route('notice.destroy', $noti->id)}}"  method="POST" >
                                         @csrf
                                        @method('DELETE')

                                         <button class="btn btn-danger  confirm-delete" >Delete</button>
                                         </form>
                                        </td>
                                        <td>
    <form action="{{ route('notice.publish', $noti->id) }}" method="post">
        @csrf
        <button type="submit" class="btn btn-success confirm-publish"  data-id="{{$noti->id}}" >Publish</a>
    </form>
</td>
                                    </tr>
                    @endforeach

                    </tbody>
                                        </table>
                                        <div class="pagination">
                                        {{$notice->links()}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                        @endsection
