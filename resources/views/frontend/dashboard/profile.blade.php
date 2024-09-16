@extends('frontend\dashboard\user_dashboard')
@section('content')

<div class="container-fluid">
            <div class="breadcrumb-content d-flex flex-wrap align-items-center justify-content-between mb-5">
                <div class="media media-card align-items-center">
                    <div class="media-img media--img media-img-md rounded-full">
                        <img class="rounded-full" src="{{ (!empty($profiledata->photo)) ? url('uploads/user_img/'.$profiledata->photo) : url('uploads/no_image.jpg') }}" alt="Student thumbnail image">
                    </div>
                    <div class="media-body">
                        <h2 class="section__title fs-30">Howdy, {{ $profiledata->name }}</h2>
                    </div><!-- end media-body -->
                </div><!-- end media -->
            </div><!-- end breadcrumb-content -->
            <div class="section-block mb-5"></div>
            <div class="dashboard-heading mb-5">
                <h3 class="fs-22 font-weight-semi-bold">My Profile</h3>
            </div>
            <div class="profile-detail mb-5">
                <ul class="generic-list-item generic-list-item-flash">
                    <li><span class="profile-name">Name:</span><span class="profile-desc">{{ $profiledata->name }}</span></li>
                    <li><span class="profile-name">User Name:</span><span class="profile-desc">{{ $profiledata->username }}</span></li>
                    <li><span class="profile-name">Email:</span><span class="profile-desc">{{ $profiledata->email }}</span></li>
                    <li><span class="profile-name">Phone Number:</span><span class="profile-desc">{{ $profiledata->phone }}</span></li>
                    <li>
                        <span class="profile-name">Address:</span>
                        <span class="profile-desc">{{ $profiledata->address }}</span>
                    </li>
                    <li>
                        <span class="profile-name">Description:</span>
                        <span class="profile-desc">{{ $profiledata->description }}</span>
                    </li>
                </ul>
                <a href="{{ route('user.profile.change') }}" type="submit" class="btn theme-btn mt-5">Edit Profile</a>
            </div>
        </div><!-- end container-fluid -->

@endsection

