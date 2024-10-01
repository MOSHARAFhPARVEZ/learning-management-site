@extends('instuctor\instuctor_dashboard')

@section('content')

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Order Management</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('instuctor.dashboard') }}"><i
                                class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">All Orders</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <hr />
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>#Sl</th>
                            <th>Date</th>
                            <th>Invoice Number</th>
                            <th>Amount</th>
                            <th>Payment</th>
                            <th>status</th>
                            <th>Details</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $order->payment->order_date }}</td>
                            <td>{{ $order->payment->invoice_no }}</td>
                            <td>{{ $order->payment->total_amount }}</td>
                            <td>{{ $order->payment->payment_type }}</td>
                            <td>
                                @if ($order->payment->status == "confirm")
                                <span class="badge bg-success">Confirm</span>
                                @else
                                <span class="badge bg-danger"> Pending</span>
                                @endif

                            </td>
                            <td><a href="{{ route('instuctor.order.details',$order->payment->id) }}" class="btn btn-info">
                                <i class="lni lni-eye"></i>

                                </a></td>
                            <td>
                                <a href="{{ route('instuctor.order.invoice',$order->payment->id) }}" class="btn btn-danger" >
                                    <i class="lni lni-download"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#Sl</th>
                            <th>Date</th>
                            <th>Invoice Number</th>
                            <th>Amount</th>
                            <th>Payment</th>
                            <th>status</th>
                            <th>Details</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
