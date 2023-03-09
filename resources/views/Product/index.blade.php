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
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($data as $value)
                            <tr>
                                <td><img src="{{$value->photo}}" height="50px"></td>
                                <td>{{$value->name}}</td>
                                <td>{{$value->desc}}</td>
                                <td>{{$value->price}}</td>
                                <td>
                                    <a href="{{route("courses.edit",["id"=>$value->id])}}" class="badge bg-success">Edit</a>
                                    <a href="{{route("product.delete",["id"=>$value->id])}}" class="badge bg-danger">Delete</a>


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
