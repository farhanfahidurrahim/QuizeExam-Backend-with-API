@extends("template");

@section("body")
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">

                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Video Courses</a></li>
                            <li class="breadcrumb-item active" aria-current="page">All</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">

                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                        <tr>
                            <th>Thumbnail</th>
                            <th>Title</th>
                            <th>Class</th>
                            <th>Subject</th>
                            <th>Url</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($courses as $course)
                            <tr>
                                <td><img src="{{$course->thumbnail}}" height="50px"></td>
                                <td>{{$course->title}}</td>
                                <td>{{$course->class}}</td>
                                <td>{{$course->subject}}</td>
                                <td><a href="{{$course->subject}}" target="_blank" class="btn btn-warning">View</a></td>
                                <td>
                                    <a href="{{route("courses.edit",["id"=>$course->id])}}" class="badge bg-success">Edit</a>
                                    <a href="{{route("courses.delete",["id"=>$course->id])}}" class="badge bg-danger">Delete</a>


                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>
@endsection
