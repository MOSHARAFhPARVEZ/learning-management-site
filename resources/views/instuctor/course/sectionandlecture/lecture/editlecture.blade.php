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
                        <a href="{{ route('instuctor.dashboard') }}">
                            <i class="bx bx-home-alt"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Edit Lecture
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <hr>
    <!--end breadcrumb-->

    {{-- add lecture part start --}}
        <div class="card">
        <div class="card-body p-4">
            <h5 class="mb-4">Edit Lecture</h5>

            <form action="{{ route('course.lecture.update',$lecture->id) }}" method="POST" class="row g-3">
                @csrf

                <div class="col-md-6">
                    <label for="input1" class="form-label">Lecture Tittle</label>
                    <input type="text" class="form-control" name="lecture_tittle" id="input1" value="{{ $lecture->lecture_tittle }}" >

                </div>
                <div class="col-md-6">
                    <label for="input2" class="form-label">Url</label>
                    <input type="text" class="form-control" name="url" value="{{ $lecture->url }}" >

                </div>
                <div class="mb-3">
                    <label for="formFileDisabled" class="form-label">Content</label>
                    <textarea class="form-control" name="content" type="text">{{ $lecture->content }}</textarea>
                </div>

                <div class="col-md-12">
                    <div class="d-md-flex d-grid align-items-center gap-3">
                        <button type="submit" class="btn btn-primary px-4">Update</button>
                        <a href="{{ route('course.lecture.create',$lecture->course_id) }}" class="btn btn-danger px-4">Back</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- add lecture part end --}}


</div>


@endsection
