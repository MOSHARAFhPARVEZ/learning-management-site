@extends('instuctor\instuctor_dashboard')
@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">
            Course Management
        </div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="bx bx-home-alt"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Create Lecture
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="row">
        <div class="col-12 ">
            <hr>
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('uploads/course/course_image') }}/{{  $course->course_image }}"
                            class="rounded-circle p-1 border" width="90" height="90" alt="...">
                        <div class="flex-grow-1 ms-3">
                            <h5 class="mt-0">{{  $course->course_name }}</h5>
                            <p class="mb-0">
                                {{  $course->course_title}}
                            </p>
                        </div>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">Add Section</button>
                        <!-- End Button trigger modal -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        @foreach ($section as $key => $item)
        <div class="col-12">
            <hr>
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1 ms-3">
                            <h5 class="mt-0">{{  $item->section_tittle }}</h5>
                        </div>


                        <div class="flex-grow-1 ms-3">
                            <a href="{{ route('course.section.edit',$item->id) }}" class="btn btn-warning" title="Edit">
                                Edit
                            </a>
                            <a href="{{ route('course.section.destroy',$item->id) }}" class="btn btn-danger"
                                title="Delete" id="delete">
                                Delete
                            </a>
                            <a href="{{ route('course.section.addlecture',$item->id) }}" class="btn btn-secondary"
                                title="Add Lecture">
                                Add Lecture
                            </a>

                        </div>
                    </div>
                    <div class="container mt-2">
                        @foreach ($item->lectures as $lecture)


                            <div class="d-flex justify-content-between align-items-center ms-3">
                                <strong>{{ $loop->iteration }} . {{ $lecture->lecture_tittle }}</strong>
                                <div class="btn-group">
                                    <a href="{{ route('course.lecture.edit',$lecture->id) }}" class="btn btn-warning mb-2" title="Edit">
                                        Edit
                                    </a> &nbsp;
                                    <form action="{{ route('course.lecture.destroy',$lecture->id) }}" method="post">
                                        @csrf
                                    <button type="submit" class="btn btn-danger mb-2" title="Delete" id="delete">
                                        Delete
                                    </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Section</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="{{ route('course.section.create',$course->id) }}" method="post">
                    @csrf

                    <div class="col-md-12">
                        <label for="input1" class="form-label">Section Tittle<b>:</b> </label>
                        <input type="text" class="form-control @error('section_tittle') is-invalid @enderror"
                            name="section_tittle" id="input1" placeholder="Section Tittle">
                        @error('section_tittle')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

            </div>
            <div class="modal-footer">

                <button type="submit" class="btn btn-primary">Save</button>
            </div>

            </form>
        </div>
    </div>
</div>


@endsection
