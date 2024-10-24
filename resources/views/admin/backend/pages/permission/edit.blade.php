@extends('admin\admin_dashboard')

@section('content')

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Role & Permission</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Permission</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <hr />
    <div class="card">
        <div class="card-body p-4">
            <h5 class="mb-4">Edit Permission</h5>

            <form action="{{ route('update.permission',$permission->id) }}" method="POST" class="row g-3">
                @csrf

                <div class="col-md-6">
                    <label for="input1" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="input1" value="{{ $permission->name }}">

                </div>


            <div class="col-md-6">
                <label for="input1" class="form-label">Group Name</label>
                <select class="form-select" name="group_name">

                    <option value="{{ $permission->group_name }}">{{ $permission->group_name }}</option>

                    <option value="Category">Category</option>
                    <option value="Instuctor">Instuctor</option>
                    <option value="Course">Course</option>
                    <option value="Coupon">Coupon</option>
                    <option value="Settings">Settings</option>
                    <option value="Order">Order</option>
                    <option value="Report">Report</option>
                    <option value="Review">Review</option>
                    <option value="User">User</option>
                    <option value="Blog">Blog</option>
                    <option value="Blog Post">Blog Post</option>
                    <option value="Role & Permission">Role & Permission</option>

                </select>
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
