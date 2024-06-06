@extends('admin\admin_dashboard')

@section('content')

<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Category</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">All Category</li>
							</ol>
						</nav>
					</div>
                    <div class="ms-auto">
						<div class="btn-group">
							<a href="{{ route('create.category') }}" class="btn btn-primary px-5">Add Category </a>
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
										<th>Category Image</th>
										<th>Category Name</th>
										<th>Category Slug</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
                                    @foreach ($categories as $category)
									<tr>
										<td>{{ $loop->iteration }}</td>
										<td><img src="{{ asset('uploads/category_img') }}/{{  $category->image }}" alt="" style="width: 40px; height:40px"></td>
										<td>{{ $category->category_name }}</td>
										<td>{{ $category->category_slug }}</td>
										<td>
                                            <a href="{{ route('edit.category',$category->id) }}" class="btn btn-warning">
                                                Edit
                                            </a>
                                            <a href="{{ route('destroy.category',$category->id) }}" class="btn btn-danger" id="delete">
                                                Delete
                                            </a>
                                        </td>
									</tr>
                                    @endforeach
								</tbody>
								<tfoot>
                                    <tr>
										<th>Sl</th>
										<th>Category Image</th>
										<th>Category Name</th>
										<th>Category Slug</th>
										<th>Action</th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>

@endsection
