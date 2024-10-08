@extends('admin\admin_dashboard')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Review</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">View Reviews</li>
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
                            <th>Sl</th>
                            <th>User Name</th>
                            <th>Instuctor Name</th>
                            <th>Course Name</th>
                            <th>Ratings</th>
                            <th>Comments</th>
                            <th>Stutas</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reviews as $review)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $review->user->name }}</td>
                            <td>{{ $review->instuctor->name }}</td>
                            <td>{{ $review->course->course_name }}</td>
                            <td>{{ $review->ratings }}</td>
                            <td>{{ $review->comments }}</td>
                            <td>
                                @if ($review->status == 1)
                                <div class="col">
                                    <a href="{{ route('inactive.review',$review->id) }}"
                                        class="d-flex align-items-center theme-icons shadow-sm p-2 cursor-pointer rounded">
                                        <div class="col">
                                            <button type="button" class="btn btn-outline-primary px-2">
                                                <i class="lni lni-checkmark"></i>
                                                <span class="ms-2">Active</span>
                                            </button>
                                        </div>
                                    </a>
                                </div>
                                @else

                                <div class="col">
                                    <a href="{{ route('active.review',$review->id) }}"
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
                            <th>User Name</th>
                            <th>Instuctor Name</th>
                            <th>Course Name</th>
                            <th>Ratings</th>
                            <th>Comments</th>
                            <th>Stutas</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>






@endsection
