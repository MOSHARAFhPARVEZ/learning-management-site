@extends('admin\admin_dashboard')

@section('content')

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Blog Post Management</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Blog Post Details</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <hr />

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <table class="table mb-0">
                        <tr>
                            <td scope="col"><b>Description <i>:</i> </b></td>
                            <td>{!! $blog->long_descrip  !!}</td>
                        </tr>
                        <tr>
                            <td scope="col"><b>News Tags <i>:</i> </b></td>
                            <td>{{ $blog->post_tags }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>


</div>

@endsection
