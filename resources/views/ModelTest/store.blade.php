@extends("template")

@section("body")
    <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Model Test</h4>
                    </div>



                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="post" action="{{route("model_test.store")}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Model Test Title</label>
                                            <select name="title_id" class="form-control" onchange="TitleChange()" id="title_id" required>
                                                <option disabled selected value="">Select Title</option>
                                                @foreach($title as $titles)
                                                    <option value="{{$titles->id}}">{{$titles->test_title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Model Test Subject</label>
                                            <select class="form-control" name="test_subject_id" id="test_subject_id" onchange="SelctSubject()" required>
                                                <option disabled selected value="">Select Subject</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Quiz Topic</label>
                                            <select class="form-control" name="test_topic_id" id="test_topic_id" required>
                                                <option disabled selected value="">Select Topic</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column">Question</label>
                                            <input type="text" id="city-column" class="form-control"  placeholder="Enter Question"
                                                   name="question" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="country-floating">Option-1</label>
                                            <input type="text" id="country-floating" class="form-control"
                                                   name="option1" placeholder="Enter Option"  required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="country-floating">Option-2</label>
                                            <input type="text" id="country-floating" class="form-control"
                                                   name="option2" placeholder="Enter Option"  required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="country-floating">Option-3</label>
                                            <input type="text" id="country-floating" class="form-control"
                                                   name="option3" placeholder="Enter Option"  required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="country-floating">Option-4</label>
                                            <input type="text" id="country-floating" class="form-control"
                                                   name="option4" placeholder="Enter Option"  required>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="country-floating">Correct Ans</label>
                                            <input type="text" id="country-floating" class="form-control"
                                                   name="correct_ans" placeholder="Enter Correct Ans"  required>
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

@section("js")
    <script>
        var values=@json($subjects);



        function TitleChange(){
            var value=document.getElementById("title_id").value;
            var subject_id=document.getElementById("test_subject_id");
            subject_id.innerHTML="";
            var option=document.createElement("option");
            option.innerHTML="Select Subject";
            option.setAttribute("selected","")
            option.setAttribute("disabled","")
            option.setAttribute("value","")
            subject_id.appendChild(option);
            for(var a=0; a<values.length; a++){
                if(values[a]["title_id"]==value){

                    var option=document.createElement("option");
                    option.innerHTML=values[a]["test_subject"];
                    option.value=values[a]["id"];
                    subject_id.appendChild(option);
                }
            }
        }
function SelctSubject(){
    var values=@json($topics);
    var value=document.getElementById("test_subject_id").value;
    var test_topic_id=document.getElementById("test_topic_id");
    test_topic_id.innerHTML="";
    var option=document.createElement("option");
    option.innerHTML="Select Subject";
    option.setAttribute("selected","")
    option.setAttribute("disabled","")
    option.setAttribute("value","")
    test_topic_id.appendChild(option);
    for(var a=0; a<values.length; a++){
        if(values[a]["test_subject_id"]==value){

            var option=document.createElement("option");
            option.innerHTML=values[a]["test_topic_name"];
            option.value=values[a]["id"];
            test_topic_id.appendChild(option);
        }
    }
}


    </script>
@endsection


