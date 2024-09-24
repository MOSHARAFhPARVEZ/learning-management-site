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
                        User Profile
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">


                                <img src="{{ (!empty($profiledata->photo)) ? url('uploads/instuctor_img/'.$profiledata->photo) : url('uploads/no_image.jpg') }}"
                                    alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
                                <div class="mt-3">
                                    <h4>{{ $profiledata->name }}</h4>
                                    <p class="text-secondary mb-1">{{ $profiledata->username }}</p>
                                    <p class="text-muted font-size-sm">{{ $profiledata->email }}</p>
                                    <button class="btn btn-primary">Follow</button>
                                    <a href="#" class="btn btn-outline-primary">Edit About</a>
                                </div>
                            </div>
                            <hr class="my-4" />
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-globe me-2 icon-inline">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <line x1="2" y1="12" x2="22" y2="12"></line>
                                            <path
                                                d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
                                            </path>
                                        </svg>Website</h6>
                                    <span class="text-secondary">https://codervent.com</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <form action="{{ route('instuctor.profile.store') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="name" class="form-control"
                                            value="{{ $profiledata->name }}" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">User Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="username" class="form-control"
                                            value="{{ $profiledata->username }}" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="email" name="email" class="form-control"
                                            value="{{ $profiledata->email }}" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Address</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="address" class="form-control"
                                            value="{{ $profiledata->address }}" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Phone</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="tel" name="phone" class="form-control"
                                            value="{{ $profiledata->phone }}" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Description</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <textarea class="form-control"
                                            name="description">{{ $profiledata->description }}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Long Description</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <textarea class="form-control"
                                            name="long_description">{{ $profiledata->long_description }}</textarea>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Profile Photo</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="file" name="photo"
                                            onchange="document.getElementById('imageshow').src = window.URL.createObjectURL(this.files[0])"
                                            class="form-control" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Profile Photo</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <img id="imageshow"
                                            src="{{ (!empty($profiledata->photo)) ? url('uploads/instuctor_img/'.$profiledata->photo) : url('uploads/no_image.jpg') }}"
                                            alt="Admin" class="rounded-circle p-1 bg-primary" width="80">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="submit" class="btn btn-primary px-4" value="Save Changes" />
                                        <a href="{{ route('about.instuctor.create',$profiledata->id) }}"
                                            class="btn btn-info px-4">Add More</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>



                <div class="card">
                    <div class="card-body">

                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">Bio</th>
                                    <th scope="col">Position</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
@foreach ($about_ins as $item)
                                <tr>
                                    <td>{{ $item->bio }}</td>
                                    <td>{{ $item->position }}</td>
                                    <td>
                                        <a href="{{ route('about.instuctor.edit',$item->id) }}" class="btn btn-warning" title="Edit" >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit text-primary"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                        </a>

                                        <a href="{{ route('about.instuctor.delete',$item->id) }}" class="btn btn-danger" title="Delete" id="delete">
                                            <i class="lni lni-trash"></i>
                                        </a>


                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>


            </div>
        </div>
    </div>
</div>




@endsection
