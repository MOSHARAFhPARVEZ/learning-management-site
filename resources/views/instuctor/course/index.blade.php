@extends('instuctor\instuctor_dashboard')

@section('content')

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Course Management</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">All Courses</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('course.create') }}" class="btn btn-primary px-5">Add Course </a>
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
                            <th>Course Image</th>
                            <th>Course Name</th>
                            <th>Category Name</th>
                            <th>Sub Category Name</th>
                            <th>Selling Price</th>
                            <th>Discount Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses as $course)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><img src="{{ asset('uploads/courses_img') }}/{{  $course->course_image }}" alt=""
                                    style="width: 40px; height:40px"></td>
                            <td>{{ $course->course_name }}</td>
                            <td>{{ $course->category_id }}</td>
                            <td>{{ $course->subcategory_id }}</td>
                            <td>{{ $course->selling_price }}</td>
                            <td>{{ $course->discount_price }}</td>
                            <td>
                                <a href="{{ route('edit.category',$course->id) }}" class="btn btn-warning">
                                    Edit
                                </a>
                                <a href="{{ route('destroy.category',$course->id) }}" class="btn btn-danger"
                                    id="delete">
                                    Delete
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Sl</th>
                            <th>Category Image</th>
                            <th>Category Name</th>
                            <th>Category Slug</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
