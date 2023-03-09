@extends("template")
@section("body")
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{route("model_test.topics.store")}}">
                        @csrf
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">

                                    <select class="form-control" name="title_id" id="title_id" onchange="TitleValue()" required>
                                        <option disabled selected value="">Select Model Test Title</option>
                                        @foreach($title as $titles)
                                            <option value="{{$titles->id}}">{{$titles->test_title}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <select class="form-control" name="test_subject_id" id="test_subject_id">
                                        <option disabled selected value="">Select Model Subject</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <input type="text" id="roundText" class="form-control round" placeholder="Enter Topic Name" name="test_topic_name">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <input type="submit" class="btn btn btn-primary" value="Add New">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <section class="section">
        <div class="card">

            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Subject Name</th>
                        <th>Topic Name</th>
                        <th>Created Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>




                    @foreach($data as $key=>$subjects)

                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$subjects->test_title}}</td>
                            <td>{{$subjects->test_subject}}</td>
                            <td>{{$subjects->test_topic_name}}</td>
                            <td>{{$subjects->created_at}}</td>
                            <td>


                                <button type="button" class="badge bg-success" data-bs-toggle="modal"
                                        data-bs-target="#backdrop{{$subjects->id}}" style="border: none">
                                    Edit
                                </button>
                                <a class="badge bg-danger" href="{{route("model_test.topics.delete",[$subjects->id])}}">Delete</a>
                                <!--Disabled Backdrop Modal -->
                                <div class="modal fade text-left" id="backdrop{{$subjects->id}}" tabindex="-1" role="dialog"
                                     aria-labelledby="myModalLabel4" data-bs-backdrop="false" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel4">Subject</h4>
                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                            <form method="POST" action="{{route("model_test.topics.edit",[$subjects->id])}}">

                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">

                                                        <select class="form-control" name="title_id" id="title_id2" onchange="TitleValue2()" required>
                                                            <option disabled selected value="">Select Model Test Title</option>
                                                            @foreach($title as $titles)
                                                                <option value="{{$titles->id}}">{{$titles->test_title}}</option>
                                                            @endforeach
                                                        </select>

                                                    </div>
                                                </br>
                                                    <div class="form-group">
                                                        <select class="form-control" name="test_subject_id" id="test_subject_id2">
                                                            <option disabled selected value="">Select Model Subject</option>

                                                        </select>
                                                    </div>
                                                    </br>
                                                    <input type="text" class="form-control" name="test_topic_name" placeholder="Enter Topic Name" value="{{$subjects->test_topic_name}}">


                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light-secondary"
                                                            data-bs-dismiss="modal">
                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Close</span>
                                                    </button>
                                                    <input type="submit" class="btn btn-success" value="Save">
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                            </td>
                        </tr>

                    @endforeach


                    </tbody>
                </table>
            </div>
        </div>

    </section>
@endsection

@section("js")
    <script>
        var values=@json($subject);



        function TitleValue(){
            var title_id=document.getElementById("title_id").value;
            var test_subject_id=document.getElementById("test_subject_id");
            test_subject_id.innerHTML="";
            for(var a=0; a<values.length; a++){
                if(values[a]["title_id"]==title_id){
                    var option=document.createElement("option");
                    option.innerHTML=values[a]["test_subject"];
                    option.value=values[a]["id"];
                    test_subject_id.appendChild(option);
                }

            }
        }

        function TitleValue2(){
            var title_id=document.getElementById("title_id2").value;
            var test_subject_id=document.getElementById("test_subject_id2");
            test_subject_id.innerHTML="";
            for(var a=0; a<values.length; a++){
                if(values[a]["title_id"]==title_id){
                    var option=document.createElement("option");
                    option.innerHTML=values[a]["test_subject"];
                    option.value=values[a]["id"];
                    test_subject_id.appendChild(option);
                }

            }
        }

    </script>
@endsection

