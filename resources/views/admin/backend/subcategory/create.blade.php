@extends('admin\admin_dashboard')

@section('content')

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Category</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Add Sub Category</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <hr />
    <div class="card">
        <div class="card-body p-4">
            <h5 class="mb-4">Create Category</h5>

            <form action="{{ route('subcategory.store') }}" method="POST"  class="row g-3">
                @csrf

                <div class="col-md-6">
                    <label for="input1" class="form-label">Category Name</label>
                    <select class="form-select  @error('category_id') is-invalid @enderror" name="category_id">
                        <option value="" >Select One Category</option>

                        @foreach ($category as $cat)

                        <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>

                        @endforeach

					</select>
                    @error('category_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="input1" class="form-label">Sub Category Name</label>
                    <input type="text" class="form-control @error('subcategory_name') is-invalid @enderror" name="subcategory_name" id="input1" placeholder="Sub Category Name">
                    @error('subcategory_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="input2" class="form-label">Sub Category Slug</label>
                    <input type="text" class="form-control @error('subcategory_slug') is-invalid @enderror" name="subcategory_slug" id="input2" placeholder="Category Slug">
                    @error('subcategory_slug')
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
