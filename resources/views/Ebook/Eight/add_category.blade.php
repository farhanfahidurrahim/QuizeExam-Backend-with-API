@extends("template")

@section("body")
    <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Add E'book : Class Eight - Category PDF</h3>
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
	                        <ol class="breadcrumb">
	                            <li class="breadcrumb-item"><a href="{{ route('english.grammer.index') }}" class="btn btn-primary">Index</a></li>
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
                            <form class="form" method="post" action="{{route("eight.cat.store")}}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column">Add Category</label>
                                            <input type="text" id="city-column" class="form-control" placeholder="Enter Category" name="category_name" required>
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
                            <th>Category Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($data as $result)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$result->category_name}}</td>
                                {{-- <td><a class="badge bg-danger" href="{{route("learn.noun.destroy",[$result->id])}}">Delete</a>
                                </td> --}}
                                <td class="d-flex">
                                    <form class="px-3"
                                        onclick="return confirm('Are you sure you want to delete this contact?')"
                                        method="POST" action="{{ route('eight.cat.destroy', $result->id) }}">
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


