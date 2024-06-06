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
                    <li class="breadcrumb-item active" aria-current="page">All Sub Category</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('subcategory.create') }}" class="btn btn-primary px-5">Add Sub Category </a>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    <hr />
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Category Name</th>
                            <th>Sub Category Name</th>
                            <th>Sub Category Slug</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subcategories as $subcategory)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $subcategory->category->category_name }}</td>
                            <td>{{ $subcategory->subcategory_name }}</td>
                            <td>{{ $subcategory->subcategory_slug }}</td>
                            <td>
                                <a href="{{ route('subcategory.edit',$subcategory->id) }}" class="btn btn-warning btn-sm">
                                    Edit
                                </a>
                                <form action="{{ route('subcategory.destroy',$subcategory->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger mt-2 btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Sl</th>
                            <th>Category Name</th>
                            <th>Sub Category Name</th>
                            <th>Sub Category Slug</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
