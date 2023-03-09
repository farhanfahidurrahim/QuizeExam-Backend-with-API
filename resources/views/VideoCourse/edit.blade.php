@extends("template")

@section("body")
    <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Video Course</h4>
                    </div>



                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="post" action="{{route("courses.edit",[$id])}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Title</label>
                                            <input type="text" class="form-control"
                                                   placeholder="Enter title" name="title" value="{{$data->title}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Class</label>
                                            <input type="text" id="last-name-column" class="form-control"
                                                   placeholder="Enter Class" name="class" value="{{$data->class}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column">Subject</label>
                                            <input type="text" id="city-column" class="form-control" value="{{$data->subject_name}}" placeholder="Enter Subject"
                                                   name="subject_name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="country-floating">Video Url</label>
                                            <input type="text" id="country-floating" class="form-control"
                                                   name="url" placeholder="Enter Video Url" value="{{$data->url}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="company-column">Thumbnail</label>
                                            <input type="file" name="thumbnail" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">

                                          <img src="{{$data->thumbnail}}" height="100px">
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
