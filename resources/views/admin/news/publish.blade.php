@extends ('admin.layouts.adminmain')
@section('adminmain-container')
    <div id="wrapper">
        <div id="page-wrapper">

            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            add news
                        </h1>
                        <form role="form" action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="news_title">News Title</label>
                                <input type="text" name="title" placeholder="Enter title" value=""
                                    class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="news_image">News Image </label>
                                <font color='brown'> &nbsp;&nbsp;(Allowed image size: 1024 KB) </font>
                                <input type="file" name="news_img">
                            </div>
                            <div class="form-group">
                                <label for="news_tag">News Tags</label>
                                <input type="text" name="news_tag" placeholder="Enter some tags seperated by comma (,)"
                                    value="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="news_para">News Content</label>
                                <textarea class="form-control" name="news_para" id="" cols="30" rows="15"></textarea>
                            </div>
                            <button type="submit" name="publish_news" class="btn btn-primary" value="publish news">Publish
                                News</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
