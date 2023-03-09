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
                            <th>Order ID</th>
                            <th>User</th>
                            <th>Products</th>
                            <th>Payment</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($data as $value)
                            <tr>

                                <td>{{$value->id}}</td>
                                <td>{{$value->name}}</td>
                                <td>
                                @php
                                    $products=json_decode($value->info);
                                @endphp

                                    <table class="table">
                                        <tr>
                                            <th>Photo</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Qty</th>
                                            <th>Total</th>
                                        </tr>
                                        @foreach($products as $product)
                                        <tr>
                                            <td><img src="{{$product->image}}" height="50px"></td>
                                            <td>{{$product->product_name}}</td>
                                            <td>{{$product->price}}</td>
                                            <td>{{$product->qty}}</td>
                                            <td>{{$product->total}}</td>
                                        </tr>
                                        @endforeach
                                    </table>

                                </td>
                                <td>


                                    <button type="button" class="badge bg-success" data-bs-toggle="modal"
                                            data-bs-target="#backdrop{{$value->id}}" style="border: none">
                                        Show Info
                                    </button>
                                    <!--Disabled Backdrop Modal -->
                                    <div class="modal fade text-left" id="backdrop{{$value->id}}" tabindex="-1" role="dialog"
                                         aria-labelledby="myModalLabel4" data-bs-backdrop="false" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel4">Payment Info</h4>
                                                    <button type="button" class="close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                        <i data-feather="x"></i>
                                                    </button>
                                                </div>

                                             <table class="table">
                                                 <tr>
                                                     <td class="text-center">Name</td>
                                                     <td class="text-center">{{$value->payment_user_name}}</td>
                                                 </tr>
                                                 <tr>
                                                     <td class="text-center">Email</td>
                                                     <td class="text-center">{{$value->email}}</td>
                                                 </tr>
                                                 <tr>
                                                     <td class="text-center">Number</td>
                                                     <td class="text-center">{{$value->number}}</td>
                                                 </tr>
                                                 <tr>
                                                     <td class="text-center">Address</td>
                                                     <td class="text-center">{{$value->address}}</td>
                                                 </tr>
                                                 <tr>
                                                     <td class="text-center">Payment Type</td>
                                                     <td class="text-center">{{$value->payment_type}}</td>
                                                 </tr>
                                                 <tr>
                                                     <td class="text-center">Trx ID</td>
                                                     <td class="text-center">{{$value->trx_id}}</td>
                                                 </tr>
                                                 <tr>
                                                     <td class="text-center">Amount</td>
                                                     <td class="text-center">{{$value->amount}}</td>
                                                 </tr>
                                             </table>

                                            </div>
                                        </div>
                                </td>






                                </td>
                                <td><p class="text text-success">{{$value->status}}</p></td>

                                <td>
                                    <a href="{{route("product.orders.status",[$value->id,"Approve"])}}" class="badge bg-warning">Approve</a>
                                    <a href="{{route("product.orders.status",[$value->id,"Delivery"])}}" class="badge bg-success">Delivery</a>
                                    <a href="{{route("product.orders.status",[$value->id,"Cancel"])}}" class="badge bg-danger">Cancel</a>

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
