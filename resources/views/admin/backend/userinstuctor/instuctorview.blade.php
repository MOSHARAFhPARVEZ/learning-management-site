@extends('admin\admin_dashboard')

@section('content')

<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Instuctors</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">All Instuctors</li>
							</ol>
						</nav>
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
										<th>Email</th>
										<th>Phone</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
                                    @foreach ($instuctors as $instuctor)
									<tr>
										<td>{{ $loop->iteration }}</td>
										<td><img src="{{ (!empty($instuctor->photo)) ? url('uploads/instuctor_img/'.$instuctor->photo) : url('uploads/no_image.jpg') }}" alt="" style="width: 40px; height:40px"></td>
										<td>{{ $instuctor->name }}</td>
										<td>{{ $instuctor->email }}</td>
										<td>{{ $instuctor->phone }}</td>
										<td>
                                           @if ($instuctor->UserOnline())
                                            <span class="badge badge-pill bg-success">Active Now</span>
                                            @else
                                            <span class="badge badge-pill bg-danger">{{ Carbon\Carbon::parse($instuctor->last_seen)->diffForHumans() }} </span>
                                            @endif
                                        </td>
									</tr>
                                    @endforeach
								</tbody>
								<tfoot>
                                    <tr>
										<th>Sl</th>
										<th>Image</th>
										<th>Name</th>
										<th>Email</th>
										<th>Phone</th>
										<th>Status</th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>

@endsection
