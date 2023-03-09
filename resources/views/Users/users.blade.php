@extends("template");

@section("body")
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Users</h3>
                    <p class="text-subtitle text-muted">All Users</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Users</li>
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
                            <th>Profile</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Institute</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>

                @foreach($users as $user)
                    <tr>
                        <td><img src="{{$user->image}}" height="50" style="border-radius: 40px"> </td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->number}}</td>
                        <td>{{$user->institute}}</td>
                        <td>
                            @if($user->is_active==0)
                                <a href="{{route("users.active",["id"=>$user->id])}}" class="badge bg-success">Active</a>
                            @else
                                <a href="{{route("users.deactive",["id"=>$user->id])}}" class="badge bg-danger">Deactive</a>
                            @endif


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
