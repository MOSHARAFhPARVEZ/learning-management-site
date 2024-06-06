@extends('admin\admin_dashboard')

@section('content')

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Instuctor</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Add Instuctor</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <hr />
    <div class="card">
        <div class="card-body p-4">
            <h5 class="mb-4">Add Instuctor</h5>

            <form action="{{ route('store.instuctor') }}" method="POST" class="row g-3">
                @csrf

                <div class="col-md-6">
                    <label for="input1" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="input1" value="{{ $applyinstuctor->name }}">
                </div>
                <div class="col-md-6">
                    <label for="input2" class="form-label">Email</label>
                    <input type="text" class="form-control" name="email" id="input2" value="{{ $applyinstuctor->email }}">
                </div>
                <div class="col-md-6">
                    <label for="input2" class="form-label">Password</label>
                    <input type="text" class="form-control @error('password') is-invalid @enderror" name="password" id="input2" placeholder="Instuctor Password">
                    @error('password')
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
