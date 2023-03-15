@extends("template")

@section("body")
    <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">All Bank : English - PDF</h4>
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
	                        <ol class="breadcrumb">
	                            <li class="breadcrumb-item"><a href="{{ route('english.grammer.add') }}" class="btn btn-primary">Add Category</a></li>
	                        </ol>
                    	</nav>
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
                            <form class="form" method="post" action="{{ route('bank.english.store') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="subject_name" value="English">
                                <div class="row">
                                	<div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Category/Topic Name</label>
                                        <select name="topic_name" class="form-control" required>
                                            <option disabled selected value="">Select Topic</option>
                                           	@foreach($category as $row)		
                                                <option value="{{ $row->id }}">{{ $row->category_name }}</option>
                                            @endforeach
                                        </select>
                                        </div>
                                    </div>
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
                            <th>Topic Name</th>
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
                                <td>{{$result->bankeng->category_name}}</td>
                                <td>{{$result->title}}</td>
                                <td>{{$result->pdf_file_path}}</td>
                                {{-- <td><a class="badge bg-danger" href="{{route("learn.noun.destroy",[$result->id])}}">Delete</a>
                                </td> --}}
                                <td class="d-flex">
                                    <form class="px-3"
                                        onclick="return confirm('Are you sure you want to delete this contact?')"
                                        method="POST" action="{{ route('bank.english.destroy', $result->id) }}">
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


