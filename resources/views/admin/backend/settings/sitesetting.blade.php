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
                    <li class="breadcrumb-item active" aria-current="page">Update Site Settings</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <hr />
    <div class="card">
        <div class="card-body p-4">
            <h5 class="mb-4">Update Site Settings</h5>

            <form action="{{ route('admin.site.update') }}" method="POST" enctype="multipart/form-data" class="row g-3">
                @csrf

                <input type="hidden" class="form-control" name="id" id="input1"
                        value="{{ $site->id }}">


                <div class="col-md-12">

                        <img src="{{ asset('uploads/logo') }}/{{  $site->logo }}" alt=""
                                    width="100">
                </div>
                <div class="mb-3">
                    <label for="formFileDisabled" class="form-label">Logo</label>
                    <input class="form-control" name="logo" type="file" id="formFileDisabled"
                        onchange="document.getElementById('web').src = window.URL.createObjectURL(this.files[0])">
                </div>
                <div class="form-group row">
                    <img src="" id="web" style="width: 120px ; ">
                </div>
                <div class="col-md-6">
                    <label for="input2" class="form-label">Phone</label>
                    <input type="text" class="form-control" value="{{ $site->phone }}" name="phone" id="input2">
                </div>

                <div class="col-md-6">
                    <label for="input2" class="form-label">Email</label>
                    <input type="text" class="form-control" value="{{ $site->email }}" name="email" id="input2">
                </div>

                <div class="col-md-6">
                    <label for="input2" class="form-label">Address</label>
                    <input type="text" class="form-control" value="{{ $site->address }}" name="address" id="input2">
                </div>

                <div class="col-md-6">
                    <label for="input2" class="form-label">Facebook</label>
                    <input type="text" class="form-control" value="{{ $site->facebook }}" name="facebook" id="input2">
                </div>

                <div class="col-md-6">
                    <label for="input2" class="form-label">Twitter</label>
                    <input type="text" class="form-control" value="{{ $site->twitter }}" name="twitter" id="input2">
                </div>

                <div class="col-md-6">
                    <label for="input2" class="form-label">Instragram</label>
                    <input type="text" class="form-control" value="{{ $site->instragram }}" name="instragram" id="input2">
                </div>

                <div class="col-md-6">
                    <label for="input2" class="form-label">Linkedin</label>
                    <input type="text" class="form-control" value="{{ $site->linkedin }}" name="linkedin" id="input2">
                </div>

                <div class="col-md-6">
                    <label for="input2" class="form-label">Copyright</label>
                    <input type="text" class="form-control" value="{{ $site->copyright }}" name="copyright" id="input2">
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
