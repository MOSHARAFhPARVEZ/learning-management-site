@extends('admin\admin_dashboard')

@section('content')

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Admin</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Admin</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <hr />
    <div class="card">
        <div class="card-body p-4">
            <h5 class="mb-4">Edit Admin</h5>

            <form action="{{ route('update.admin',$user->id) }}" method="POST" class="row g-3">
                @csrf

                <div class="col-md-6">
                    <label for="input1" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="input1" value="{{ $user->name }}">
                </div>

                <div class="col-md-6">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" id="username" value="{{ $user->username }}">
                </div>

                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}">
                </div>

                <div class="col-md-6">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="tel" class="form-control" name="phone" id="phone" value="{{ $user->phone }}">
                </div>

                <div class="col-md-6">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" name="address" id="address" value="{{ $user->address }}">
                </div>


            <div class="col-md-6">
                <label for="input1" class="form-label">Role</label>
                <select class="form-select  @error('role') is-invalid @enderror" name="role">

                    <option value="">Open This Menu</option>
                    @foreach ($roles as $role)

                    <option value="{{ $role->id }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>{{ $role->name }}</option>

                    @endforeach

                </select>
                @error('role')
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
