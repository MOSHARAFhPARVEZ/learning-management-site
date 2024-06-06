@extends('frontend\dashboard\user_dashboard')
@section('content')

<div class="container-fluid">
    <div class="breadcrumb-content d-flex flex-wrap align-items-center justify-content-between mb-5">
        <div class="media media-card align-items-center">
            <div class="media-img media--img media-img-md rounded-full">
                <img class="rounded-full"
                    src="{{ (!empty($profiledata->photo)) ? url('uploads/user_img/'.$profiledata->photo) : url('uploads/no_image.jpg') }}"
                    alt="Student thumbnail image">
            </div>
            <div class="media-body">
                <h2 class="section__title fs-30">Howdy, {{ $profiledata->name }}</h2>
            </div><!-- end media-body -->
        </div><!-- end media -->
    </div><!-- end breadcrumb-content -->
    <div class="tab-pane fade show active" id="edit-profile" role="tabpanel" aria-labelledby="edit-profile-tab">
        <div class="setting-body">
            <h3 class="fs-17 font-weight-semi-bold pb-4">Change Password</h3>

            <form action="{{ route('user.update.password') }}" method="post" class="row">
                @csrf
                <div class="input-box col-lg-4">
                    <label class="label-text">Old Password</label>
                    <div class="form-group">
                        <input class="form-control form--control @error('old_password') is-invalid @enderror" type="password" id="old_password" name="old_password" placeholder="Old Password">
                        <span class="la la-lock input-icon"></span>
                        @error('old_password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div><!-- end input-box -->
                <div class="input-box col-lg-4">
                    <label class="label-text">New Password</label>
                    <div class="form-group">
                        <input class="form-control form--control @error('new_password') is-invalid @enderror" type="password" id="new_password" name="new_password" placeholder="New Password">
                        <span class="la la-lock input-icon"></span>
                        @error('new_password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div><!-- end input-box -->
                <div class="input-box col-lg-4">
                    <label class="label-text">Confirm New Password</label>
                    <div class="form-group">
                        <input class="form-control form--control" type="password" id="new_password_confirmation" name="new_password_confirmation"
                            placeholder="Confirm New Password">
                        <span class="la la-lock input-icon"></span>
                    </div>
                </div><!-- end input-box -->
                <div class="input-box col-lg-12 py-2">
                    <button class="btn theme-btn">Change Password</button>
                </div><!-- end input-box -->

            </form>

        </div><!-- end tab-pane -->
    </div>
</div>

@endsection
