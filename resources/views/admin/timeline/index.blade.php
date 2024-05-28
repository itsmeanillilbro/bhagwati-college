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
                        <a href="{{route('timeline.create')}}" class="btn btn-primary">Add New</a>
                    </div>
                    Timelines
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
                                            <th>Timeline Year</th>
                                            <th>Text</th>
                                            <th>Date</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                            <th>Publish</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                    @foreach($timeline as $pop)
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$pop->author}}</td>
                                        <td>{{$pop->title}}</td>
                                        <td>{{$pop->status}}</td>
                                        <td>{{$pop->date}}</td>
                                        <td>{!!$pop->text!!}</td>
                                        <td>{{date('Y-m-d', strtotime($pop->created_at))}}</td>
                                        <td><a class="btn btn-primary" href="{{route('timeline.edit', $pop->id)}}" >Edit</a></td>
                                        <td>
                                            <form action="{{route('timeline.destroy', $pop->id)}}"  method="POST" >
                                         @csrf
                                        @method('DELETE')

                                         <button class="btn btn-danger  confirm-delete" >Delete</button>
                                         </form>
                                        </td>
                                        <td>
    <form action="{{ route('timeline.publish', $pop->id) }}" method="post">
        @csrf
        <button type="submit" class="btn btn-success confirm-publish"  data-id="{{$pop->id}}" >Publish</a>
    </form>
</td>
                                    </tr>
                    @endforeach

                    </tbody>
                                        </table>
                                        <div class="pagination">
                                        {{$timeline->links()}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                        @endsection
