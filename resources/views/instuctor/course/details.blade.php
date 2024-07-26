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
                <a href="{{ route('course.index') }}" class="btn btn-danger px-5">Back </a>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    <hr />
    <div class="card">
        <div class="card-body">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th scope="col">Course Title</th>
                        <th scope="col">Course Name Slug</th>
                        <th scope="col">Description</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Sub Category Name</th>
                        <th scope="col">Label</th>
                        <th scope="col">Duration</th>
                        <th scope="col">Resources</th>
                        <th scope="col">Certificate</th>
                        <th scope="col">Prerequisites</th>
                        {{-- <th scope="col">Goals</th> --}}
                        <th scope="col">Bestseller</th>
                        <th scope="col">Highestrated</th>
                        <th scope="col">Featured</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $courses->course_title }}</td>
                        <td>{{ $courses->course_name_slug }}</td>
                        <td>{{ $courses->description }}</td>
                        <td>{{ $courses->category->category_name }}</td>
                        <td>{{ $courses->subcategory->subcategory_name }}</td>
                        <td>{{ $courses->label }}</td>
                        <td>{{ $courses->duration }}</td>
                        <td>{{ $courses->resources }}</td>
                        <td>
                            @if ($courses->certificate == 1)
                               <p>Yes</p>
                            @else
                                <p>No</p>
                            @endif
                        </td>
                        <td>{{ $courses->prerequisites }}</td>
                        <td>
                            @if ($courses->bestseller == 1)
                               <p>Yes</p>
                            @else
                                <p>No</p>
                            @endif
                        </td>
                        <td>
                            @if ($courses->highestrated == 1)
                               <p>Yes</p>
                            @else
                                <p>No</p>
                            @endif
                        </td>
                        <td>
                            @if ($courses->featured == 1)
                               <p>Yes</p>
                            @else
                                <p>No</p>
                            @endif
                        </td>
                        <td>
                            @if ($courses->status == 1)
                               <p>Active</p>
                            @else
                                <p>Inactive</p>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
