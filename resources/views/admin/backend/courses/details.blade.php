@extends('admin\admin_dashboard')

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
                <a href="{{ route('admin.course.index') }}" class="btn btn-danger px-5">Back </a>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    <hr />

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <table class="table mb-0">


                            {{-- <tr> --}}
                                <tr>
                                    <td scope="col">Course Title</td>
                                    <td>{{ $courses->course_title }}</td>
                                </tr>
                                <tr>
                                    <td scope="col">Course Name Slug</td>
                                    <td>{{ $courses->course_name_slug }}</td>
                                </tr>
                                <tr>
                                    <td scope="col">Category</td>
                                    <td>{{ $courses->category->category_name }}</td>
                                </tr>
                                <tr>
                                    <td scope="col">Sub Category</td>
                                    <td>{{ $courses->subcategory->subcategory_name }}</td>
                                </tr>
                                <tr>
                                    <td scope="col">Selling Price</td>
                                    <td>{{ $courses->selling_price }}</td>
                                </tr>
                                <tr>
                                    <td scope="col">Discount Price</td>
                                    <td>{!! $courses->discount_price  !!}</td>
                                </tr>
                                <tr>
                                    <td scope="col">Description</td>
                                    <td>{!! $courses->description  !!}</td>
                                </tr>
                                <tr>
                                    <td scope="col">Video</td>
                                    <td>
                                        <video width="300" height="130" controls>
                                            <source src="{{ asset($courses->course_video) }}" type="video/mp4">
                                        </video>
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <table class="table mb-0">


                            {{-- <tr> --}}


                                <tr>
                                    <td scope="col">Label</td>
                                    <td>{{ $courses->label }}</td>
                                </tr>
                                <tr>
                                    <td scope="col">Duration</td>
                                    <td>{{ $courses->duration }}</td>
                                </tr>
                                <tr>
                                    <td scope="col">Resources</td>
                                    <td>{{ $courses->resources }}</td>
                                </tr>
                                <tr>
                                    <td scope="col">Certificate</td>
                                    <td>
                                        @if ($courses->certificate == 1)
                                            <p>Yes</p>
                                        @else
                                            <p>No</p>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="col">Prerequisites</td>
                                    <td>{{ $courses->prerequisites }}</td>
                                </tr>
                                <tr>
                                    <td scope="col">Bestseller</td>
                                    <td>
                                        @if ($courses->bestseller == 1)
                                            <p>Yes</p>
                                        @else
                                            <p>No</p>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="col">Highest Rated</td>
                                    <td>
                                        @if ($courses->highestrated == 1)
                                            <p>Yes</p>
                                        @else
                                            <p>No</p>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="col">Featured</td>
                                    <td>
                                        @if ($courses->featured == 1)
                                            <p>Yes</p>
                                        @else
                                            <p>No</p>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="col">Status</td>
                                    <td>
                                        @if ($courses->status == 1)
                                            <p class="badge bg-success">Active</p>
                                        @else
                                            <p class="badge bg-danger">Inactive</p>
                                        @endif
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


</div>

@endsection
