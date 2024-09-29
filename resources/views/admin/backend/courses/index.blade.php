@extends('admin\admin_dashboard')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>



<div class="page-content">

    <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Manage Courses</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">All Courses</li>
                    </ol>
                </nav>
            </div>
        </div>
        <hr/>
    <!--end breadcrumb-->

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
                            <td>
                                <a href="{{ route('admin.course.details',$course->id) }}" class="btn btn-info">
                                        <i class="lni lni-eye"></i>
                                </a>
                            </td>
                            <td>
                                @if ($course->status == 1)
                                    <div class="col">
                                        <a href="{{ route('admin.inactive.course',$course->id) }}"
                                            class="d-flex align-items-center theme-icons shadow-sm p-2 cursor-pointer rounded">
                                            <div class="col">
                                                <button type="button" class="btn btn-outline-success px-2">
                                                    <i class="lni lni-checkmark"></i>
                                                    <span class="ms-2">Active</span>
                                                </button>
                                            </div>
                                        </a>
                                    </div>
                                @else
                                    <div class="col">
                                        <a href="{{ route('admin.active.course',$course->id) }}"
                                            class="d-flex align-items-center theme-icons shadow-sm p-2 cursor-pointer rounded">
                                            <div class="col">
                                                <button type="button" class="btn btn-outline-danger px-2">
                                                    <i class="lni lni-close"></i>
                                                    <span class="ms-2">InActive</span>
                                                </button>
                                            </div>
                                        </a>
                                    </div>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
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
                    </tfoot>
                </table>
            </div>
        </div>
    </div>


</div>






@endsection
