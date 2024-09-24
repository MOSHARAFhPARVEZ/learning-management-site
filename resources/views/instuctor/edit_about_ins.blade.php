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
            <form action="{{ route('about.instuctor.update',$about->id) }}" method="post">
                @csrf
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Position</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text"  class="form-control"
                            value="{{ $about->position }}" name="position" />

                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Description</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <textarea class="form-control" name="description" >{{ $about->description }}</textarea>

                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Social One Name</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" name="social_one" class="form-control " value="{{ $about->social_one }}" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Social One Icon</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" name="social_one_icon" class="form-control" value="{{ $about->social_one_icon }}" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Social One Link</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" name="link_one" class="form-control" value="{{ $about->link_one }}" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Social two Name</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" name="social_two" class="form-control" value="{{ $about->social_two }}" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Social two Icon</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" name="social_two_icon" class="form-control" value="{{ $about->social_two_icon }}" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Social Two Link</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" name="link_two" class="form-control" value="{{ $about->link_two }}" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Social Three Name</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" name="social_three" class="form-control "
                                value="{{ $about->social_three }}" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Social Three Icon</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" name="social_three_icon" class="form-control" value="{{ $about->social_three_icon }}" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Social Three Link</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" name="link_three" class="form-control " value="{{ $about->link_three }}" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Social Four Name</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" name="social_four" class="form-control" value="{{ $about->social_four }}"/>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Social Four Icon</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" name="social_four_icon" class="form-control" value="{{ $about->social_four_icon }}"/>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Social Four Link</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" name="link_four" class="form-control" value="{{ $about->link_four }}" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Social Five Name</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" name="social_five" class="form-control" value="{{ $about->social_five }}" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Social Five Icon</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" name="social_five_icon" class="form-control" value="{{ $about->social_five_icon }}" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Social Five Link</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" name="link_five" class="form-control" value="{{ $about->link_five }}" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Bio</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <textarea class="form-control" name="bio" >{{ $about->bio }}</textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Experience One</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" name="experience_one" class="form-control" value="{{ $about->experience_one }}" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Experience One Number</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="number" name="experience_one_number" class="form-control" value="{{ $about->experience_one_number }}" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Experience Two</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" name="experience_two" class="form-control" value="{{ $about->experience_two }}" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Experience Two Number</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="number" name="experience_two_number" class="form-control" value="{{ $about->experience_two_number }}" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Experience Three</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" name="experience_three" class="form-control" value="{{ $about->experience_three }}" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Experience Three Number</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="number" name="experience_three_number" class="form-control" value="{{ $about->experience_three_number }}" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Experience Four</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" name="experience_four" class="form-control" value="{{ $about->experience_four }}"/>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Experience Four Number</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="number" name="experience_four_number" class="form-control" value="{{ $about->experience_four_number }}" />
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-9 text-secondary">
                            <input type="submit" class="btn btn-primary px-4" value="Update Changes" />
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>




</div>

@endsection
