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
                    <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <hr />
    <div class="card">
        <div class="card-body p-4">
            <h5 class="mb-4">Edit Category</h5>

            <form action="{{ route('update.category',$category->id) }}" method="POST" enctype="multipart/form-data" class="row g-3">
                @csrf

                <div class="col-md-12">
                    <img src="{{ (!empty($category->image)) ? url('uploads/category_img/'.$category->image) : url('uploads/no_image.jpg') }}"
                        alt="Admin" class="p-1 bg-primary" width="200">
                </div>
                <div class="col-md-6">
                    <label for="input1" class="form-label">Category Name</label>
                    <input type="text" class="form-control" name="category_name" id="input1"
                        value="{{ $category->category_name }}">
                </div>
                <div class="col-md-6">
                    <label for="input2" class="form-label">Category Slug</label>
                    <input type="text" class="form-control" value="{{ $category->category_slug }}" name="category_slug"
                        id="input2" placeholder="Category Slug">
                </div>
                <div class="mb-3">
                    <label for="formFileDisabled" class="form-label">Category Image</label>
                    <input class="form-control" name="image" type="file" id="formFileDisabled"
                        onchange="document.getElementById('web').src = window.URL.createObjectURL(this.files[0])">
                </div>
                <div class="form-group row">
                    <img src="" id="web" style="width: 120px ; heighr: 120px;">
                </div>
                <div class="col-md-12">
                    <div class="d-md-flex d-grid align-items-center gap-3">
                        <button type="submit" class="btn btn-primary px-4">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

@endsection
