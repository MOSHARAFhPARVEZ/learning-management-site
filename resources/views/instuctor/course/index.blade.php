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
                            <th>Selling Price</th>
                            <th>Discount Price</th>
                            <th>Details</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses as $course)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><img src="{{ asset('uploads/course/course_image') }}/{{  $course->course_image }}" alt=""
                                    style="width: 40px; height:40px"></td>
                            <td>{{ $course->course_name }}</td>
                            <td>{{ $course->category->category_name }}</td>
                            <td>{{ $course->selling_price }}</td>
                            <td>{{ $course->discount_price }}</td>
                            <td><a href="{{ route('course.details',$course->id) }}" class="btn btn-info">
                                    <i class="lni lni-list"></i>
                                </a></td>
                            <td>
                                <a href="{{ route('course.edit',$course->id) }}" class="btn btn-warning" title="Edit" >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit text-primary"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                </a>
                                <a href="{{ route('course.destroy',$course->id) }}" class="btn btn-danger" title="Delete"
                                    id="delete">
                                    <i class="lni lni-trash"></i>
                                </a>
                                <a href="{{ route('course.lecture.create',$course->id) }}" class="btn btn-secondary" title="Lecture">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-folder-plus text-primary"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path><line x1="12" y1="11" x2="12" y2="17"></line><line x1="9" y1="14" x2="15" y2="14"></line></svg>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Sl</th>
                            <th>Course Image</th>
                            <th>Course Name</th>
                            <th>Selling Price</th>
                            <th>Discount Price</th>
                            <th>Details</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
