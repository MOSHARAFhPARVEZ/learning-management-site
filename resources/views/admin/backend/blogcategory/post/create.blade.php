@extends('admin\admin_dashboard')

@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Blog</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Create Post</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <hr />
    <div class="card">
        <div class="card-body p-4">
            <h5 class="mb-4">Create Post</h5>

            <form action="{{ route('blog.post.store') }}" method="POST" enctype="multipart/form-data" class="row g-3">
                @csrf

                <div class="col-md-6">
                    <label for="input2" class="form-label">Post Title</label>
                    <input type="text" class="form-control @error('post_title') is-invalid @enderror"
                        name="post_title" id="input2" placeholder="Course Title">
                    @error('post_title')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Basic</label>
                    <input type="text" class="form-control @error('post_title') is-invalid @enderror" data-role="tagsinput" name="post_tags">

                    @error('post_title')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="input1" class="form-label">Blog Category Name</label>
                    <select class="form-select  @error('blogcat_id') is-invalid @enderror" name="blogcat_id">
                        <option value="">Select One Blog Category</option>

                        @foreach ($blogCategory as $cat)

                        <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>

                        @endforeach

                    </select>
                    @error('blogcat_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="formFileDisabled" class="form-label">Post Image</label>
                    <input class="form-control @error('post_image') is-invalid @enderror" name="post_image"
                        type="file" id="formFileDisabled"
                        onchange="document.getElementById('web').src = window.URL.createObjectURL(this.files[0])">
                    @error('post_image')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group row">
                    <img src="" id="web" style="width: 120px ; heighr: 120px;">
                </div>

                <div class="col-md-12">
                    <label for="input2" class="form-label">Description</label>
                    <textarea name="long_descrip" class="form-control @error('long_descrip') is-invalid @enderror"
                        id="editor" placeholder="Description ..." rows="3"></textarea>
                    @error('long_descrip')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-12">
                    <div class="d-md-flex d-grid align-items-center gap-3">
                        <button type="submit" class="btn btn-primary px-4">Add</button>
                    </div>
                </div>



            </form>
        </div>
    </div>

</div>





{{-- CK Editor --}}
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });

</script>
{{-- CK Editor --}}

@endsection
