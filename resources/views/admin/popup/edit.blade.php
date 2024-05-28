@extends ('admin.layouts.adminmain')
@section('adminmain-container')
<div id="wrapper">

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Update Popup
                </h1>
                <form role="form" action="{{route('popup.update',['popup'=>$popup])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')

                    <div class="form-group">
                        <label for="tml_name">Name</label>
                        <input type="text" name="title" class="form-control" value="{{$popup->title}}">
                    </div>

                    <div class="input-group" style="margin-bottom: 13px;">
                        <label for="tml_status">Popup Status</label>
                        <select name="status" class="form-control">
                            <option value="draft" {{$popup->status==='draft'? 'selected':''}}>Draft</option>
                            <option value="published" {{$popup->status==='published'?'selected':''}}>Publish</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="image">Popup Image</label>
                        <img class="img-responsive" width="200" src="{{asset('storage/images/popup/' . $popup->image)}}" alt="popup Photo">
                        <input type="file" name="image" style="margin-top: 7px;">
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
