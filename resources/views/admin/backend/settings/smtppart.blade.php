@extends('admin\admin_dashboard')

@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Settings</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Settings SMTP</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <hr />
    <div class="card">
        <div class="card-body p-4">
            <h5 class="mb-4">Edit Category</h5>

            <form action="{{ route('admin.smtp.update') }}" method="POST" class="row g-3">
                @csrf

                <input type="hidden" class="form-control" name="id" id="input1"
                        value="{{ $smtp->id }}">


                <div class="col-md-6">
                    <label for="input2" class="form-label">Mailer</label>
                    <input type="text" class="form-control" value="{{ $smtp->mailer }}" name="mailer" id="input2">
                </div>

                <div class="col-md-6">
                    <label for="input2" class="form-label">Host</label>
                    <input type="text" class="form-control" value="{{ $smtp->host }}" name="host" id="input2">
                </div>

                <div class="col-md-6">
                    <label for="input2" class="form-label">Port</label>
                    <input type="text" class="form-control" value="{{ $smtp->port }}" name="port" id="input2">
                </div>

                <div class="col-md-6">
                    <label for="input2" class="form-label">Username</label>
                    <input type="text" class="form-control" value="{{ $smtp->username }}" name="username" id="input2">
                </div>

                <div class="col-md-6">
                    <label for="input2" class="form-label">Password</label>
                    <input type="text" class="form-control" value="{{ $smtp->password }}" name="password" id="input2">
                </div>

                <div class="col-md-6">
                    <label for="input2" class="form-label">Encryption</label>
                    <input type="text" class="form-control" value="{{ $smtp->encryption }}" name="encryption" id="input2">
                </div>

                <div class="col-md-6">
                    <label for="input2" class="form-label">From Address</label>
                    <input type="text" class="form-control" value="{{ $smtp->from_address }}" name="from_address" id="input2">
                </div>


                <div class="col-md-12">
                    <div class="d-md-flex d-grid align-items-center gap-3">
                        <button type="submit" class="btn btn-primary px-4">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

@endsection
