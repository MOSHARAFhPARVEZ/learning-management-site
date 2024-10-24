@extends('frontend\dashboard\user_dashboard')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="page-content">

@php
    $id = Auth::user()->id;
    $profiledata  = App\Models\User::find($id);
@endphp


<div class="breadcrumb-content d-flex flex-wrap align-items-center justify-content-between mb-5">
    <div class="media media-card align-items-center">
        <div class="media-img media--img media-img-md rounded-full">
            <img class="rounded-full" src="{{ (!empty($profiledata->photo)) ? url('uploads/user_img/'.$profiledata->photo) : url('uploads/no_image.jpg') }}"
                alt="Student thumbnail image">
        </div>
        <div class="media-body">
            <h2 class="section__title fs-30">{{ $profiledata->name }}</h2>
            <div class="rating-wrap d-flex align-items-center pt-2">
                <div class="review-stars">
                    <span class="rating-number">4.4</span>
                    <span class="la la-star"></span>
                    <span class="la la-star"></span>
                    <span class="la la-star"></span>
                    <span class="la la-star"></span>
                    <span class="la la-star-o"></span>
                </div>
                <span class="rating-total pl-1">(20,230)</span>
            </div><!-- end rating-wrap -->
        </div><!-- end media-body -->
    </div><!-- end media -->
</div><!-- end breadcrumb-content -->
<div class="section-block mb-5"></div>

<div class="dashboard-heading mb-5">
    <h3 class="fs-22 font-weight-semi-bold">My Wishlist</h3>
</div>
<div class="section-block mb-5"></div>
<div class="row" id="wishlist">







</div><!-- end row -->



<!-- Modal -->
<div class="modal fade modal-container" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <span class="la la-exclamation-circle fs-60 text-warning"></span>
                <h4 class="modal-title fs-19 font-weight-semi-bold pt-2 pb-1" id="deleteModalTitle">Your account will be
                    deleted permanently!</h4>
                <p>Are you sure you want to delete your account?</p>
                <div class="btn-box pt-4">
                    <button type="button" class="btn font-weight-medium mr-3" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn theme-btn theme-btn-sm lh-30">Ok, Delete</button>
                </div>
            </div><!-- end modal-body -->
        </div><!-- end modal-content -->
    </div><!-- end modal-dialog -->
</div><!-- end modal -->

@endsection
