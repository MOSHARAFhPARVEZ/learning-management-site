@extends('admin\admin_dashboard')

@section('content')

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Blog</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">All Blog Post</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('create.blog.post') }}" class="btn btn-primary px-5">Add Blog Post </a>
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
                            <th>Blog Title</th>
                            <th>Blog Category</th>
                            <th>Blog Image</th>
                            <th>Blog Details</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blogpost as $blog)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $blog->post_title }}</td>
                            <td>{{ $blog->blogcate->category_name }}</td>
                            <td><img src="{{ asset('uploads/post_image') }}/{{  $blog->post_image }}" alt="" style="width: 40px; height:40px"></td>
                            <td>
                                <a href="{{ route('details.blog.post',$blog->id) }}" class="btn btn-info">
                                <i class="lni lni-eye"></i>

                                </a>
                            </td>
                            <td>
                                <a href="{{ route('edit.blog.post',$blog->id) }}" class="btn btn-warning">
                                    Edit
                                </a>
                                <a href="{{ route('destroy.blog.post',$blog->id) }}" class="btn btn-danger"
                                    id="delete">
                                    Delete
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Sl</th>
                            <th>Blog Title</th>
                            <th>Blog Category</th>
                            <th>Blog Image</th>
                            <th>Blog Details</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
