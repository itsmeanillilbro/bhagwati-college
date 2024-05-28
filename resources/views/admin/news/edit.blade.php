@extends ('admin.layouts.adminmain')
@section('adminmain-container')
    <div id="wrapper">
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            update news
                        </h1>
                        <form role="form" action="{{route('news.update',['news'=>$news])}}" method="POST" enctype="multipart/form-data">
@csrf
@method('put')

                            <div class="form-group">
                                <label for="news_title">News Title</label>
                                <input type="text" name="title" class="form-control" value="{{$news->title}}">
                            </div>

                            <div class="form-group">
                                <label for="news_tag">News Tags</label>
                                <input type="text" name="news_tag" class="form-control" value="{{$news->news_tag}}">
                            </div>

                            <div class="input-group" style="margin-bottom: 13px;">
                                <label for="news_status">News Status</label>
                                <select name="status" class="form-control">
                             <option value="draft" {{ $news->status === 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="published" {{ $news->status === 'published' ? 'selected' : '' }}>Publish</option>
                        </select>
                            </div>

                            <div class="form-group">
                                <label for="news_img">News Image</label>
                                <img class="img-responsive" width="200" src="{{asset('storage/images/news/'.$news->news_img)}}" alt="Photo">
                                <input type="file" name="news_img" style="margin-top: 7px;">
                            </div>
                            <div class="form-group">
                                <label for="news_para">News Content</label>
                                <textarea class="form-control" name="news_para" id="" cols="30" rows="10">{{old('news_para',$news->news_para)}}
                                    </textarea>
                            </div>

                            <button type="submit" name="update_news" class="btn btn-primary" value="Update News">Update
                                News
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
