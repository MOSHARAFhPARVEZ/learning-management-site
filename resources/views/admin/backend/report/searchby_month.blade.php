@extends('admin\admin_dashboard')

@section('content')

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Report</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Search By Month</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <hr/>
    <div class="card">
        <div class="crad-header">
            <h4>Search By {{ $month }}</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Date</th>
                            <th>Uaer</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Invoice</th>
                            <th>Amount</th>
                            <th>Payment</th>
                            <th>Stutas</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($payments as $payment)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $payment->order_date }}</td>
                            <td>{{ $payment->name }}</td>
                            <td>{{ $payment->email }}</td>
                            <td>{{ $payment->phone }}</td>
                            <td>{{ $payment->address }}</td>
                            <td>{{ $payment->invoice_no }}</td>
                            <td>{{ $payment->total_amount }}</td>
                            <td>{{ $payment->payment_type }}</td>
                            <td>
                                @if ($payment->status == "confirm")
                                <span class="badge bg-gradient-quepal text-white shadow-sm w-100">
                                    Confirm
                                </span>
                                @else
                                <span class="badge bg-gradient-bloody text-white shadow-sm w-100">Pending</span>
                                @endif

                            </td>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Sl</th>
                            <th>Date</th>
                            <th>Uaer</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Invoice</th>
                            <th>Amount</th>
                            <th>Payment</th>
                            <th>Stutas</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
