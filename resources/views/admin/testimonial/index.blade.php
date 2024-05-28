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
                        <a href="{{route('testimonial.create')}}" class="btn btn-primary">Add New</a>
                    </div>
                    All Testimonial
                </h1>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Author</th>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th>Image</th>
                                            <th>Position</th>
                                            <th>Date</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                            <th>Publish</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                    @foreach($testimonial as $test)
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$test->author}}</td>
                                        <td>{{$test->title}}</td>
                                        <td>{{$test->status}}</td>
                                        <td><img src="{{asset('storage/images/testimonial/' . $test->image)}}"  style="width:100px; alt=""></td>
                                        <td>{{$test->position}}</td>
                                        <td>{{date('Y-m-d', strtotime($test->created_at))}}</td>
                                        <td><a class="btn btn-primary" href="{{route('testimonial.edit', $test->id)}}" >Edit</a></td>
                                        <td>
                                            <form action="{{route('testimonial.destroy', $test->id)}}"  method="POST" >
                                         @csrf
                                        @method('DELETE')

                                         <button class="btn btn-danger  confirm-delete" >Delete</button>
                                         </form>
                                        </td>
                                        <td>
    <form action="{{ route('testimonial.publish', $test->id) }}" method="post">
        @csrf
        <button type="submit" class="btn btn-success confirm-publish"  data-id="{{$test->id}}" >Publish</a>
    </form>
</td>
                                    </tr>
                    @endforeach

                    </tbody>
                                        </table>
                                        <div class="pagination">
                                        {{$testimonial->links()}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                        @endsection
