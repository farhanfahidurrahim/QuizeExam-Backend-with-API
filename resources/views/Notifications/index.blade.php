@extends("template")
@section("body")
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{route("notification.store")}}">
                        @csrf
                        <div class="row">

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" id="roundText" class="form-control round" placeholder="Enter Title" name="title">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" id="roundText" class="form-control round" placeholder="Enter Message" name="message">
                                </div>
                            </div>
                            <div class="col-sm-4">
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
                        <th>Message</th>
                        <th>Date</th>
                    </tr>
                    </thead>
                    <tbody>



                    @foreach($data as $key=>$notification)

                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$notification->title}}</td>
                            <td>{{$notification->message}}</td>
                            <td>{{$notification->created_at}}</td>

                        </tr>

                    @endforeach


                    </tbody>
                </table>
            </div>
        </div>

    </section>
@endsection
