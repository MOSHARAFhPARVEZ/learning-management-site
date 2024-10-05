@extends('instuctor\instuctor_dashboard')

@section('content')

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Instuctor Coupon</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Add Coupon</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <hr />
    <div class="card">
        <div class="card-body p-4">
            <h5 class="mb-4">Instuctor Create Coupon</h5>

            <form action="{{ route('instuctor.coupon.store') }}" method="POST"  class="row g-3">
                @csrf

                <div class="col-md-6">
                    <label for="input1" class="form-label">Coupon Name</label>
                    <input type="text" class="form-control @error('coupon_name') is-invalid @enderror" name="coupon_name" id="input1" placeholder="Coupon Name">
                    @error('coupon_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="input2" class="form-label">Coupon Discount</label>
                    <input type="number" class="form-control @error('coupon_discount') is-invalid @enderror" name="coupon_discount" id="input2" placeholder="Coupon Discount">
                    @error('coupon_discount')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="input2" class="form-label">Select Course Discount</label>
                    <select class="form-select mb-3" aria-label="Default select example" name="course_id" >
                        <option selected="">Open this select menu</option>

                        @foreach ($courses as $course)

                        <option value="{{ $course->id }}">{{ $course->course_name }}</option>

                        @endforeach

                    </select>
                    @error('coupon_discount')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="input2" class="form-label">Coupon Validity</label>
                    <input type="date" class="form-control @error('coupon_validity') is-invalid @enderror" name="coupon_validity" id="input2" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" >
                    @error('coupon_validity')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-12">
                    <div class="d-md-flex d-grid align-items-center gap-3">
                        <button type="submit" class="btn btn-primary px-4">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

@endsection
