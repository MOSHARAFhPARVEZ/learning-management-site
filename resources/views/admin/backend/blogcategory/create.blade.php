@extends('admin\admin_dashboard')

@section('content')

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Blog Category</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Add Blog Category</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <hr />
    <div class="card">
        <div class="card-body p-4">
            <h5 class="mb-4">Create Blog Category</h5>

            <form action="{{ route('blog.category.store') }}" method="POST" class="row g-3">
                @csrf

                <div class="col-md-6">
                    <label for="input1" class="form-label">Blog Category Name</label>
                    <input type="text" class="form-control @error('category_name') is-invalid @enderror" name="category_name" id="input1" placeholder="Category Name">
                    @error('category_name')
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
