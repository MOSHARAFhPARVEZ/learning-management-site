@extends('instuctor\instuctor_dashboard')
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Instuctor Profile</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('instuctor.dashboard') }}"><i
                                class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        User About
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3>About Instuctor</h3>
            </div>
            <form action="{{ route('about.instuctor.store') }}" method="post">
                @csrf
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Position</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" name="position" class="form-control @error('position') is-invalid @enderror" placeholder="Position" />

                            @error('position')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Description</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Description"></textarea>

                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Social One Name</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" name="social_one" class="form-control @error('social_one') is-invalid @enderror" placeholder="Social One Name" />

                            @error('social_one')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Social One Icon</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" name="social_one_icon" class="form-control @error('social_one_icon') is-invalid @enderror"
                                placeholder="Social One Icon" />

                            @error('social_one_icon')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Social One Link</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" name="link_one" class="form-control @error('link_one') is-invalid @enderror" placeholder="Social One Link" />

                            @error('link_one')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Social two Name</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" name="social_two" class="form-control @error('social_two') is-invalid @enderror" placeholder="Social two Name" />

                            @error('social_two')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Social two Icon</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" name="social_two_icon" class="form-control @error('social_two_icon') is-invalid @enderror"
                                placeholder="Social two Icon" />

                            @error('social_two_icon')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Social Two Link</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" name="link_two" class="form-control @error('link_two') is-invalid @enderror" placeholder="Social Two Link" />

                            @error('link_two')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Social Three Name</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" name="social_three" class="form-control @error('social_three') is-invalid @enderror"
                                placeholder="Social Three Name" />

                            @error('social_three')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Social Three Icon</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" name="social_three_icon" class="form-control @error('social_three_icon') is-invalid @enderror"
                                placeholder="Social Three Icon" />

                            @error('social_three_icon')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Social Three Link</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" name="link_three" class="form-control @error('link_three') is-invalid @enderror" placeholder="Social Three Link" />

                            @error('link_three')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Social Four Name</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" name="social_four" class="form-control @error('social_four') is-invalid @enderror" placeholder="Social Four Name" />

                            @error('social_four')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Social Four Icon</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" name="social_four_icon" class="form-control @error('social_four_icon') is-invalid @enderror"
                                placeholder="Social Four Icon" />

                            @error('social_four_icon')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Social Four Link</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" name="link_four" class="form-control @error('link_four') is-invalid @enderror" placeholder="Social Four Link" />

                            @error('link_four')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Social Five Name</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" name="social_five" class="form-control @error('social_five') is-invalid @enderror" placeholder="Social Five Name" />

                            @error('social_five')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Social Five Icon</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" name="social_five_icon" class="form-control @error('social_five_icon') is-invalid @enderror"
                                placeholder="Social Five Icon" />

                            @error('social_five_icon')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Social Five Link</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" name="link_five" class="form-control @error('link_five') is-invalid @enderror" placeholder="Social Five Name" />

                            @error('link_five')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Bio</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <textarea class="form-control @error('bio') is-invalid @enderror" name="bio" placeholder="Bio"></textarea>

                            @error('bio')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Experience One</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" name="experience_one" class="form-control @error('experience_one') is-invalid @enderror"
                                placeholder="Experience One" />

                            @error('experience_one')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Experience One Number</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="number" name="experience_one_number" class="form-control @error('experience_one_number') is-invalid @enderror"
                                placeholder="Experience One Number" />

                            @error('experience_one_number')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Experience Two</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" name="experience_two" class="form-control @error('experience_two') is-invalid @enderror"
                                placeholder="Experience Two" />

                            @error('experience_two')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Experience Two Number</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="number" name="experience_two_number" class="form-control @error('experience_two_number') is-invalid @enderror"
                                placeholder="Experience Two Number" />

                            @error('experience_two_number')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Experience Three</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" name="experience_three" class="form-control @error('experience_three') is-invalid @enderror"
                                placeholder="Experience Three" />

                            @error('experience_three')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Experience Three Number</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="number" name="experience_three_number" class="form-control @error('experience_three_number') is-invalid @enderror"
                                placeholder="Experience Three Number" />

                            @error('experience_three_number')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Experience Four</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" name="experience_four" class="form-control @error('experience_four') is-invalid @enderror"
                                placeholder="Experience Four" />

                            @error('experience_four')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Experience Four Number</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="number" name="experience_four_number" class="form-control @error('experience_four_number') is-invalid @enderror"
                                placeholder="Experience Four Number" />

                            @error('experience_four_number')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                    </div>






                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-9 text-secondary">
                            <input type="submit" class="btn btn-primary px-4" value="Save Changes" />
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>



</div>

@endsection
