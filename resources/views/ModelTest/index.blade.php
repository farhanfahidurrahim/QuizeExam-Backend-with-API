@extends("template");

@section("body")
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Model Test</h3>
                    <p class="text-subtitle text-muted">All Questions</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Questions</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    Users
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Subject</th>
                            <th>Topic</th>
                            <th>Question</th>
                            <th>Option-1</th>
                            <th>Option-2</th>
                            <th>Option-3</th>
                            <th>Option-4</th>
                            <th>Answer</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($data as $result)
                            <tr>
                                <td>{{$result->test_title}}</td>
                                <td>{{$result->test_subject}}</td>
                                <td>{{$result->test_topic_name}}</td>
                                <td>{{$result->question}}</td>
                                <td>{{$result->option1}}</td>
                                <td>{{$result->option2}}</td>
                                <td>{{$result->option3}}</td>
                                <td>{{$result->option4}}</td>
                                <td>{{$result->correct_ans}}</td>
                                <td><a class="badge bg-danger" href="{{route("model_test.delete",[$result->id])}}">Delete</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>
@endsection
