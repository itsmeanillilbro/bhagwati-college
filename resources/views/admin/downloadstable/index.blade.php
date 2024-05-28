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
                        <a href="{{route('downloadstable.create')}}" class="btn btn-primary">Add New Table</a>
                    </div>
                    All Tables
                </h1>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Author</th>
                                            <th>Table Name</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th>Files</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                            <th>Publish</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                    @foreach($downloadstable as $ban)
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$ban->author}}</td>
                                        <td>{{$ban->title}}</td>
                                        <td>{{$ban->status}}</td>
                                        <td>{{date('Y-m-d', strtotime($ban->created_at))}}</td>
                                        <!-- <td style="display:flex; justify-content:center; border:none;">
    <a href="{{ route('downloads.list', ['table_id' => $ban->id]) }}" class="glyphicon glyphicon-edit" style="text-decoration:none;"></a>
</td> -->
<td>
    <a href="{{route('downloads.list', ['table_id' => $ban->id]) }}" class="btn btn-info" >Add</a>
</td>
                                        <td><a class="btn btn-primary" href="{{route('downloadstable.edit', $ban->id)}}" >Edit</a></td>
                                        <td>
                                            <form action="{{route('downloadstable.destroy', $ban->id)}}"  method="POST" >
                                         @csrf
                                        @method('DELETE')

                                         <button class="btn btn-danger  confirm-delete" >Delete</button>
                                         </form>
                                        </td>
                                        <td>
    <form action="{{ route('downloadstable.publish', $ban->id) }}" method="post">
        @csrf
        <button type="submit" class="btn btn-success confirm-publish"  data-id="{{$ban->id}}" >Publish</a>
    </form>
</td>
                                    </tr>
                    @endforeach

                    </tbody>
                                        </table>
                                        <div class="pagination">
                                        {{$downloadstable->links()}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                        @endsection
