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
                        <a href="{{route('subsubmenu.create')}}" class="btn btn-primary">Add New</a>
                    </div>
                    All Sub-Submenu
                </h1>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Author</th>
                                            <th>SubMenu</th>
                                            <th>Subsubmenu</th>
                                            <!-- <th>Status</th> -->
                                            <!-- <th>URL</th> -->
                                            <th>Date</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                            <!-- <th>Publish</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                    @foreach($subsubmenu as $ban)
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$ban->author}}</td>
                                        <td>{{$ban->submenu->title1}}</td>
                                        <td>{{$ban->subsubmenutitle}}</td>
                                        <!-- <td>{{$ban->status}}</td> -->
                                        <!-- <td>{{$ban->link}}</td> -->
                                        <td>{{date('Y-m-d', strtotime($ban->created_at))}}</td>
                                        <td><a class="btn btn-primary" href="{{route('subsubmenu.edit', $ban->id)}}" >Edit</a></td>
                                        <td>
                                            <form action="{{route('subsubmenu.destroy', $ban->id)}}"  method="POST" >
                                         @csrf
                                        @method('DELETE')

                                         <button class="btn btn-danger  confirm-delete" >Delete</button>
                                         </form>
                                        </td>
                                        <!-- <td>
    <form action="{{ route('subsubmenu.publish', $ban->id) }}" method="post">
        @csrf
        <button type="submit" class="btn btn-success confirm-publish"  data-id="{{$ban->id}}" >Publish</a>
    </form>
</td> -->
                                    </tr>
                    @endforeach

                    </tbody>
                                        </table>
                                        <div class="pagination">
                                        {{$subsubmenu->links()}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                        @endsection
