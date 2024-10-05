@extends('admin\admin_dashboard')

@section('content')

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Report</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">View Report</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <hr />
    <div class="card">
        <div class="card-body p-4">

            <div class="row">

{{-- ////Search by date part//// --}}
<div class="col-md-4">
    <form action="{{ route('admin.search.date') }}" method="POST"  class="row g-3">
        @csrf

        <div class="col-md-12">
            <label for="input1" class="form-label">Search By Date</label>
            <input type="date" class="form-control @error('order_date') is-invalid @enderror" name="order_date" id="input1">
            @error('order_date')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-12">
            <div class="d-md-flex d-grid align-items-center gap-3">
                <button type="submit" class="btn btn-primary px-4"> Search</button>
            </div>
        </div>
    </form>
</div> {{-- ////Search by date part//// --}}

                {{-- ////Search by month and year part//// --}}
                <div class="col-md-4">
                    <form action="{{ route('admin.search.month') }}" method="POST"  class="row g-3">
                        @csrf

                        <div class="col-md-12">
                            <label for="input1" class="form-label">Search By Month</label>
								<select class="form-select mb-3 @error('order_month') is-invalid @enderror" name="order_month" aria-label="Default select example">
									<option selected="">Search By Month</option>
									<option value="January">January</option>
									<option value="February">February</option>
									<option value="March">March</option>
									<option value="April">April</option>
									<option value="May">May</option>
									<option value="June">June</option>
									<option value="July">July</option>
									<option value="August">August</option>
									<option value="September">September</option>
									<option value="October">October</option>
									<option value="November">November</option>
									<option value="December">December</option>
								</select>
                            @error('order_month')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <label for="input1" class="form-label">Search By Year</label>
								<select class="form-select mb-3 @error('order_year') is-invalid @enderror" name="order_year" aria-label="Default select example">
									<option selected="">Search By Year</option>
									<option value="2022">2022</option>
									<option value="2023">2023</option>
									<option value="2024">2024</option>
									<option value="2025">2025</option>
									<option value="2026">2026</option>
									<option value="2027">2027</option>
									<option value="2028">2028</option>
									<option value="2029">2029</option>
									<option value="2030">2030</option>
								</select>
                            @error('order_year')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <div class="d-md-flex d-grid align-items-center gap-3">
                                <button type="submit" class="btn btn-primary px-4"> Search</button>
                            </div>
                        </div>
                    </form>

                </div>{{-- ////Search by month and year part//// --}}

{{-- ////Search by  year part//// --}}
<div class="col-md-4">
    <form action="{{ route('admin.search.year') }}" method="POST"  class="row g-3">
        @csrf

        <div class="col-md-12">
            <div class="col-md-12">
                <label for="input1" class="form-label">Search By Year</label>
                    <select class="form-select mb-3 @error('order_year') is-invalid @enderror" name="order_year" aria-label="Default select example">
                        <option selected="">Search By Year</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                        <option value="2026">2026</option>
                        <option value="2027">2027</option>
                        <option value="2028">2028</option>
                        <option value="2029">2029</option>
                        <option value="2030">2030</option>
                    </select>
                @error('year')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-12">
            <div class="d-md-flex d-grid align-items-center gap-3">
                <button type="submit" class="btn btn-primary px-4"> Search</button>
            </div>
        </div>
    </form>
</div>{{-- ////Search by  year part//// --}}
            </div>

        </div>
    </div>

</div>

@endsection
