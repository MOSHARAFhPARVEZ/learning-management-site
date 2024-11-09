@extends('admin\admin_dashboard')

@section('content')

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Admin</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">All Admin</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('create.admin') }}" class="btn btn-primary px-5">Add Admin</a>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    <hr/>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allAdmin as $admin)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <img src="{{ (!empty($admin->photo)) ? url('uploads/admin_img/'.$admin->photo) : url('uploads/no_image.jpg') }}"
                                    alt="Admin" class="rounded-circle p-1 bg-primary" width="60">
                            </td>
                            <td>{{ $admin->name  }}</td>
                            <td>{{ $admin->username }}</td>
                            <td>{{ $admin->email  }}</td>
                            <td>{{ $admin->address  }}</td>
                            <td>{{ $admin->phone  }}</td>
                            <td>
                                @foreach ($admin->roles as $item)
                                    <span>{{ $item->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                <a href="{{ route('edit.admin',$admin->id) }}" class="btn btn-warning">
                                    Edit
                                </a>
                                <a href="{{ route('destroy.admin',$admin->id) }}" class="btn btn-danger" id="delete">
                                    Delete
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
