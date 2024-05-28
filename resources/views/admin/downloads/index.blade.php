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
                    <a href="{{ route('downloads.create',$tableId) }}" class="btn btn-primary">New</a>

                    </div>
                    All Downloads Files
                </h1>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Table Name</th>
                                            <th>Download Title</th>
                                            <th>File</th>
                                            <th>Delete</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                    @foreach($downloads as $ban)
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$ban->title}}</td>
                                        <td>{{$ban->title1}}</td>
                                        <td>{{$ban->file}}</td>
                                        <td>
                                            <form action="{{route('downloads.destroy', $ban->id)}}"  method="POST" >
                                         @csrf
                                        @method('DELETE')

                                         <button class="btn btn-danger  confirm-delete" >Delete</button>
                                         </form>
                                        </td>

                                    </tr>
                    @endforeach

                    </tbody>
                                        </table>
                                        <div class="pagination">
                                        {{$downloads->links()}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                        @endsection
