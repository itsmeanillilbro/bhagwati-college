
@extends ('admin.layouts.adminmain')
@section('adminmain-container')
    <div id="wrapper">
<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Update academic
                        </h1>
                        <form role="form" action="{{route('academic.update',['academic'=>$academic])}}" method="POST" enctype="multipart/form-data">
@csrf
@method('put')
	<div class="form-group">
		<label for="academic_title">Academic Title</label>
		<input type="text" name="academic_title" class="form-control" value="{{$academic->academic_title}}">
	</div>

	<div class="input-group" style="margin-bottom: 13px;">
		<label for="academic_status">Academic Status</label>
			<select name="status" class="form-control">
            <option value="draft" {{$academic->status === 'draft' ? 'selected' : '' }} >Draft</option>
            <option value="published" {{$academic->status === 'published' ? 'selected' : ''}} >Publish</option>
</select>
	</div>
    <div class="form-group">
        <label for="academic_img">academic Image</label>
		<img class="img-responsive" width="200" src="{{asset('storage/images/academic/' . $academic->academic_img)}}" alt="academic Photo">
		<input type="file" name="academic_img" style="margin-top: 7px;">
    </div>
	<div class="form-group">
		<label for="academic_text">Description</label>
		<textarea  class="form-control" name="academic_text" id="" cols="30" rows="10">{{old('academic_para',$academic->academic_para)}}
		</textarea>
	</div>

    <div class="form-group">
		<label for="academic_title">Duration</label>
		<input type="text" name="duration" class="form-control" value="{{$academic->duration}}">
	</div>


	<button type="submit" name="update_academic" class="btn btn-primary" value="Update academic">Update academic</button>
</form>
</div>
</div>
</div>
</div>
</div>
</div>

