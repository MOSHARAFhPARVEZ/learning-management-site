@extends('instuctor\instuctor_dashboard')

@section('content')


<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Manage Order</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('instuctor.dashboard') }}"><i
                                class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Order Details</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <hr />

    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <table class="table mb-0">
                                <tr>
                                    <th><strong>Name:</strong></th>
                                    <td>{{ $payments->name }}</td>
                                </tr>
                                <tr>
                                    <th><strong>Email:</strong></th>
                                    <td>{{ $payments->email }}</td>
                                </tr>
                                <tr>
                                    <th><strong>Phone:</strong></th>
                                    <td>{{ $payments->phone }}</td>
                                </tr>
                                <tr>
                                    <th><strong>Address:</strong></th>
                                    <td>{{ $payments->address }}</td>
                                </tr>
                                <tr>
                                    <th><strong>Payment Type:</strong></th>
                                    <td>{{ $payments->cash_delivery }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <table class="table mb-0">
                                <tr>
                                    <th><strong>Total Amount:</strong></th>
                                    <td>${{ $payments->total_amount }}</td>
                                </tr>
                                <tr>
                                    <th><strong>Payment Type:</strong></th>
                                    <td>{{ $payments->payment_type }}</td>
                                </tr>
                                <tr>
                                    <th><strong>Invoice Number:</strong></th>
                                    <td>{{ $payments->invoice_no }}</td>
                                </tr>
                                <tr>
                                    <th><strong>Order Date:</strong></th>
                                    <td>{{ $payments->order_date }}</td>
                                </tr>
                                <tr>
                                    <th><strong>Status:</strong></th>
                                    <td>
                                        @if ($payments->status == "confirm")
                                            <span class="badge bg-success">Confirm</span>
                                        @else
                                            <span class="badge bg-danger"> Pending</span>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>Sl</th>
										<th>Course Image</th>
										<th>Course Name</th>
										<th>Category Name</th>
										<th>Instuctor</th>
										<th>Price</th>
									</tr>
								</thead>
								<tbody>
@php
    $total_price = 0;
@endphp
                                    @foreach ($orders as $order)
									<tr>
										<td>{{ $loop->iteration }}</td>
										<td><img src="{{ asset('uploads/course/course_image') }}/{{  $order->course->course_image }}" alt="" style="width: 40px; height:40px"></td>
										<td>{{  $order->course->course_name }}</td>
										<td>{{  $order->course->category->category_name }}</td>
										<td>{{ $order->user->name }}</td>
										<td>${{ $order->price }}</td>
									</tr>

@php
    $total_price += $order->price;
@endphp

                                    @endforeach

                                    <tr>
                                        <td colspan="5" ></td>
                                        <td class="col-md-3" >
                                            <strong>Total Price:{{ $total_price }}</strong>
                                        </td>
                                    </tr>
								</tbody>
								<tfoot>
                                    <tr>
										<th>Sl</th>
										<th>Course Image</th>
										<th>Course Name</th>
										<th>Category Name</th>
										<th>Instuctor</th>
										<th>Price</th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
            </div>
        </div>
    </div>

</div>









@endsection
