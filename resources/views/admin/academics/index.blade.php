
@extends('admin.layouts.adminmain')
@section('adminmain-container')
<div id="wrapper">
        <div id="page-wrapper">

            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <div class="col-xs-4">
                                <a href="{{route('academic.create')}}" class="btn btn-primary">Add New</a>
                            </div>
                            all academic
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
                @foreach($academic as $aca)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$aca->author}}</td>
                        <td>{{$aca->academic_title}}</td>
                        <td>{{$aca->status}}</td>
                        <td> <img src="{{asset('storage/images/academic/' . $aca->academic_img)}}" alt=""  style="width:100px"></td>
                        <td>{{Date('Y-m-d', strtotime($aca->created_at))}}</td>
                        <td>
                            <a  href="{{route("academic.edit", $aca->id)}}"  class="btn btn-primary" >Edit</a>
                        </td>
                        <td>
                            <form action="{{route('academic.destroy', $aca->id)}}"  method="post" >
                            @csrf
                            @method('DELETE')
                            <button type="" class="btn btn-danger confirm-delete" >Delete</button>
                            </form>
                        </td>
                        <td>
                        <form action="{{ route('academic.publish', $aca->id) }}" method="post">
                         @csrf
                    <button type="submit" class="btn btn-success confirm-publish" data-id="{{$aca->id}}" >Publish</button>
                     </form>
                        </td>

                    </tr>
                    @endforeach
                    </tbody>
                                        </table>
                                        <div class="pagination " >
{{ $academic->links() }}
</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>


@endsection
