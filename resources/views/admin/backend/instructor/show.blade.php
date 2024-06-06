@extends('admin\admin_dashboard')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Instuctor</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Apply For Instuctor</li>
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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Stutas</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($instuctors as $instuctor)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $instuctor->name }}</td>
                            <td>{{ $instuctor->email }}</td>
                            <td>
                                @if ($instuctor->status == 1)
                                <span class="btn btn-success">Active</span>
                                @else
                                <span class="btn btn-danger">InActive</span>
                                @endif
                            </td>
                            <td>
                                @if ($instuctor->status == 1)
                                <div class="col">
                                    <a href="{{ route('inactive.instuctor',$instuctor->id) }}"
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
                                    <a href="{{ route('active.instuctor',$instuctor->id) }}"
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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Stutas</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>






@endsection
