@extends ('admin.layouts.adminmain')
@section('adminmain-container')
<div id="wrapper">

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Update Popups
                </h1>
                <form role="form" action="{{route('timeline.update', ['timeline' => $timeline])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')

                    <div class="form-group">
                        <label for="tml_name">Name</label>
                        <input type="text" name="title" class="form-control" value="{{$timeline->title}}">
                    </div>

                    <div class="input-group" style="margin-bottom: 13px;">
                        <label for="tml_status">Timeline Status</label>
                        <select name="status" class="form-control">
                            <option value="draft" {{$timeline->status === 'draft' ? 'selected' : ''}}>Draft</option>
                            <option value="published" {{$timeline->status === 'published' ? 'selected' : ''}}>Publish</option>
                        </select>
                    </div>

                    <div class="form-group">
		<label for="timeline_year">Timeline Year</label>
		<input type="date" name="timeline_year" class="form-control" value="{{$timeline->date}}">
	</div>
	<div class="form-group">
		<label for="timeline_text">timeline Text</label>
		<textarea  class="form-control" name="timeline_text" id="" cols="30" rows="10">{{old('text', $timeline->text)}}
		</textarea>
	</div>

                    <button type="submit" name="update_tml" class="btn btn-primary" value="Update tml">Update
                        Popup</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection
