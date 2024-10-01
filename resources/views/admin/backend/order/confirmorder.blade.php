@extends('admin\admin_dashboard')

@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>






<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Manage Order</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Confirm Orders</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="card">
        <div class="card-body">
            <div class="d-lg-flex align-items-center mb-4 gap-3">
            </div>
            <div class="table-responsive">
                <table class="table mb-0">
                    <thead class="table-light">
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

                        @foreach ($payments as $payment)

                        <tr>

                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $payment->order_date }}</td>
                            <td>{{ $payment->invoice_no }}</td>
                            <td>{{ $payment->total_amount }}</td>
                            <td>{{ $payment->payment_type }}</td>
                            <td>
                                <div class="badge rounded-pill text-info bg-light-info p-2 text-uppercase px-3">
                                    <i class="bx bxs-circle align-middle me-1"></i>
                                    {{ $payment->status }}
                                </div>
                            </td>
                            <td>
                                <a href="{{ route('confirm.order.details',$payment->id) }}" class="btn btn-primary btn-sm radius-30 px-4">
                                    View Details
                                </a>
                            </td>

                            <td>
                                <div class="d-flex order-actions">
                                    <a href="javascript:;" class=""><i class='bx bxs-edit'></i></a>
                                    <a href="javascript:;" class="ms-3"><i class='bx bxs-trash'></i></a>
                                </div>
                            </td>
                        </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>


</div>



@endsection

