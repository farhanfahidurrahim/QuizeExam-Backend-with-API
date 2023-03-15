@extends("template")

@section("body")
    <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                     <div class="card-header">
                        <h4 class="card-title">Add Bank : Math - All PDF</h4>
                    </div>

                     <!-- Alert message (start) -->
                    @if(Session::has('message'))
                        <div class="alert {{ Session::get('alert-class') }} ">
                             {{ Session::get('message') }}
                        </div>
                    @endif
                    <!-- Alert message (end) -->

                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="post" action="{{route("bank.store")}}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="subject_name" value="Math">
                                {{-- <input type="hidden" name="topic_name" value="Noun"> --}}
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">PDF Title</label>
                                        	<input type="text" id="city-column" class="form-control"  placeholder="Enter PDF Title" name="title" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column">PDF File Upload</label>
                                            <input type="file" id="city-column" class="form-control" placeholder="Enter Question"
                                                   name="pdf_file_path" required accept="application/pdf">
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </section>

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h4>All Math - PDF</h4>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Learn / English / Noun</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                {{-- <div class="card-header">
                    Users
                </div> --}}
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                        <tr>
                            <th>Serial</th>
                            <th>Subject Name</th>
                            <th>PDF Title</th>
                            <th>PDF Path</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($data as $result)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$result->subject_name}}</td>
                                <td>{{$result->title}}</td>
                                <td>{{$result->pdf_file_path}}</td>
                                {{-- <td><a class="badge bg-danger" href="{{route("learn.noun.destroy",[$result->id])}}">Delete</a>
                                </td> --}}
                                <td class="d-flex">
                                    <form class="px-3"
                                        onclick="return confirm('Are you sure you want to delete this contact?')"
                                        method="POST" action="{{ route('learn.noun.destroy', $result->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger active">Delete</button>
                                    </form>
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

@section("js")

@endsection