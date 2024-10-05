@extends('instuctor\instuctor_dashboard')

@section('content')

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Question & Answer Management</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('instuctor.dashboard') }}"><i
                                class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">All Question</li>
                </ol>
            </nav>
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
                            <th>#Sl</th>
                            <th>Course Name</th>
                            <th>User Name</th>
                            <th>Subject</th>
                            <th>Time</th>
                            <th>Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($questions as $question)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $question->course->course_name }}</td>
                            <td>{{ $question->user->name }}</td>
                            <td>{{ $question->subject }}</td>
                            <td>{{ Carbon\Carbon::parse($question->created_at)->diffForHumans() }}</td>
                            <td>
                                <a href="{{ route('instuctor.question.details',$question->id) }}" class="btn btn-info">
                                <i class="lni lni-eye"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#Sl</th>
                            <th>Course Name</th>
                            <th>User Name</th>
                            <th>Subject</th>
                            <th>Time</th>
                            <th>Details</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
