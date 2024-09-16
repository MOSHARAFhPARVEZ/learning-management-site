@extends('instuctor\instuctor_dashboard')
@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Course Management</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('course.index') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Course</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <hr />
    <div class="card">
        <div class="card-body p-4">
            <h5 class="mb-4">Edit Course</h5>
            <form action="{{ route('course.update',$course->id) }}" method="post" enctype="multipart/form-data"
                class="row g-3">
                @csrf

                {{-- <div class="col-md-6" >
                    <img >
                </div> --}}
                <div class="col-md-6">
                    <label for="input1" class="form-label">Course Name</label>
                    <input type="text" class="form-control @error('course_name') is-invalid @enderror"
                        value="{{ $course->course_name }}" name="course_name" id="input1" placeholder="Course Name">
                    @error('course_name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="input2" class="form-label">Course Title</label>
                    <input type="text" class="form-control @error('course_title') is-invalid @enderror"
                        value="{{ $course->course_title }}" name="course_title" id="input2" placeholder="Course Title">
                    @error('course_title')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="input2" class="form-label">Course Name Slug</label>
                    <input type="text" class="form-control @error('course_name_slug') is-invalid @enderror"
                        value="{{ $course->course_name_slug }}" name="course_name_slug" id="input2"
                        placeholder="Course Name Slug">
                    @error('course_name_slug')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label for="input2" class="form-label">Description</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                        id="editor" placeholder="Description ..." rows="3">
                        {{ $course->description }}
                    </textarea>
                    @error('description')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="input1" class="form-label">Category Name</label>
                    <p><b>Category Name: &nbsp;</b>{{ $course->category->category_name }}</p>
                    <select class="form-select  @error('category_id') is-invalid @enderror" name="category_id">
                        <option value="">Select One Category</option>

                        @foreach ($categories as $cat)

                        <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>

                        @endforeach

                    </select>
                    @error('category_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="input1" class="form-label">Sub Category Name</label>
                    <p><b>Sub Category Name: &nbsp;</b>{{ $course->subcategory->subcategory_name }}</p>
                    <select class="form-select  @error('subcategory_id') is-invalid @enderror" name="subcategory_id">
                        <option value="">Select One Sub Category</option>

                        @foreach ($subcategories as $cat)

                        <option value="{{ $cat->id }}">{{ $cat->subcategory_name }}</option>

                        @endforeach

                    </select>
                    @error('subcategory_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>


                {{-- <div class="col-md-6">
                    <label for="input2" class="form-label">Intro Video </label>
                    <input class="form-control @error('course_video') is-invalid @enderror" name="course_video"
                        type="file" accept="video/mp4, video/webm">
                    @error('course_video')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
        </div> --}}

        <div class="col-md-6">
            <label for="input2" class="form-label">Label</label>
            <p><b>Label: &nbsp;</b>{{ $course->label }}</p>
            <select class="form-select @error('label') is-invalid @enderror" name="label">
                <option value="">Select One Label</option>

                <option value="Beginner">Beginner</option>
                <option value="Middle">Middle</option>
                <option value="Advance">Advance</option>
                <option value="All Lavel">All Lavel</option>

            </select>
            @error('label')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-4">
            <label for="input2" class="form-label">Duration</label>
            <input type="text" class="form-control @error('duration') is-invalid @enderror" name="duration"
                value="{{ $course->duration }}" id="input2" placeholder="Duration">
            @error('duration')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-4">
            <label for="input2" class="form-label">Resources</label>
            <input type="number" class="form-control @error('resources') is-invalid @enderror" name="resources"
                value="{{ $course->resources }}" id="input2" placeholder="Resources">
            @error('resources')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-4">
            <label for="input2" class="form-label">Selling Price</label>
            <input type="number" class="form-control @error('selling_price') is-invalid @enderror"
                value="{{ $course->selling_price }}" name="selling_price" id="input2" placeholder="Selling Price">
            @error('selling_price')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-4">
            <label for="input2" class="form-label">Discount Price</label>
            <input type="number" class="form-control @error('discount_price') is-invalid @enderror"
                name="discount_price" id="inp.ut2" value="{{ $course->discount_price }}" placeholder="Discount Price">
            @error('discount_price')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-8">
            <label for="input2" class="form-label">Prerequisites</label>
            <textarea type="text" class="form-control @error('prerequisites') is-invalid @enderror" name="prerequisites"
                id="input2" placeholder="Prerequisites">{{ $course->prerequisites }}</textarea>
            @error('prerequisites')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-4">
            <label for="input1" class="form-label">Certificate</label>
            <p><b>Certificate: &nbsp;</b>{{ $course->certificate }}</p>
            <select class="form-select @error('certificate') is-invalid @enderror" name="certificate">
                <option value="">Select One</option>

                <option value="Yes">Yes</option>
                <option value="No">No</option>

            </select>
            @error('certificate')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <hr>

        <div class="row">

            <div class="col-md-4">
                <div class="form-check">
                    <input class="form-check-input" name="bestseller" type="checkbox" value="1" id="flexCheckChecked"
                        {{ $course->bestseller == '1' ? 'checked' : '' }}>
                    <label class="form-check-label" for="flexCheckChecked">Bestseller</label>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-check">
                    <input class="form-check-input" name="highestrated" type="checkbox" value="1" id="flexCheckChecked1"
                        {{ $course->highestrated == '1' ? 'checked' : '' }}>
                    <label class="form-check-label" for="flexCheckChecked1">Highestrated</label>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-check">
                    <input class="form-check-input" name="featured" type="checkbox" value="1" name="featured"
                        id="flexCheckChecked2" {{ $course->featured == '1' ? 'checked' : '' }}>
                    <label class="form-check-label" for="flexCheckChecked2">Featured</label>
                </div>
            </div>

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

{{-- /////Course Image Update part start /////--}}
<div class="page-content">
    <div class="card">
        <div class="card-body p-4">
            <h5 class="mb-4">Course Image Change</h5>
            <form action="{{ route('course.update.image',$course->id) }}" method="post" enctype="multipart/form-data"
                class="row g-3">
                @csrf

                <div class="col-md-4">
                    <img id="imageshow"
                        src="{{ (!empty($course->course_image)) ? url('uploads/course/course_image/'.$course->course_image) : url('uploads/no_image.jpg') }}"
                        alt="Admin" width="200">
                </div>

                <div class="col-md-8">
                    <label for="formFileDisabled" class="form-label">Course Image</label>
                    <input class="form-control @error('course_image') is-invalid @enderror" name="course_image"
                        type="file" id="formFileDisabled"
                        onchange="document.getElementById('web').src = window.URL.createObjectURL(this.files[0])">
                    @error('course_image')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group ">
                    <img src="" id="web" style="width: 120px ; heighr: 120px;">
                </div>


                <div class="col-md-12">
                    <div class="d-md-flex d-grid align-items-center gap-3">
                        <button type="submit" class="btn btn-primary px-4">Update Image</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
{{-- /////Course Image Update part End /////--}}

{{-- /////Course Intro Video Update part start /////--}}
<div class="page-content">
    <div class="card">
        <div class="card-body p-4">
            <h5 class="mb-4">Course Intro Video Change</h5>
            <form action="{{ route('course.update.video',$course->id) }}" method="post" enctype="multipart/form-data"
                class="row g-3">
                @csrf

                <div class="col-md-7">
                    <label for="input2" class="form-label">Intro Video </label>
                    <input class="form-control @error('course_video') is-invalid @enderror" name="course_video"
                        type="file" accept="video/mp4, video/webm">
                    @error('course_video')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-5">
                    <video width="300" height="130" controls>
                        <source src="{{ asset($course->course_video) }}" type="video/mp4">
                    </video>
                </div>


                <div class="col-md-12">
                    <div class="d-md-flex d-grid align-items-center gap-3">
                        <button type="submit" class="btn btn-primary px-4">Update Video</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
{{-- /////Course Intro Video Update part End /////--}}

{{-- /////Course Goal Update part start /////--}}
<div class="page-content">
    <div class="card">
        <div class="card-body p-4">
            <h5 class="mb-4">Course Goal Change</h5>
            <form action="{{ route('course.update.goals',$course->id) }}" method="post" enctype="multipart/form-data"
                class="row g-3">
                @csrf

                <!--   //////////// Goal Option /////////////// -->

                @foreach ($goals as $item)
                <div class="row add_item">
                    <div class="whole_extra_item_delete" id="whole_extra_item_delete">
                        <div class="container mt-2">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="goals" class="form-label"> Goals </label>
                                        <input type="text" name="course_goals[]" id="goals"
                                            class="form-control @error('course_goals') is-invalid @enderror"
                                            value="{{ $item->goal_name }}">
                                    </div>
                                </div>
                                @error('course_goals')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <div class="form-group col-md-6" style="padding-top: 30px;">
                                    <a class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i>
                                        Add More..
                                    </a>
                                    <span class="btn btn-danger btn-sm removeeventmore"><i
                                            class="fa fa-minus-circle">Remove</i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <!---end row-->
                <!--   //////////// End Goal Option /////////////// -->
                <div class="col-md-12">
                    <div class="d-md-flex d-grid align-items-center gap-3">
                        <button type="submit" class="btn btn-primary px-4">Update Goal</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
{{-- /////Course Goal Update part End /////--}}

<!--========== Start of add multiple class with ajax ==============-->
<div style="visibility: hidden">
    <div class="whole_extra_item_add" id="whole_extra_item_add">
        <div class="whole_extra_item_delete" id="whole_extra_item_delete">
            <div class="container mt-2">
                <div class="row">


                    <div class="form-group col-md-6">
                        <label for="goals">Goals</label>
                        <input type="text" name="course_goals[]" id="goals" class="form-control" placeholder="Goals  ">
                    </div>
                    <div class="form-group col-md-6" style="padding-top: 20px">
                        <span class="btn btn-success btn-sm addeventmore"><i class="fa fa-plus-circle">Add</i></span>
                        <span class="btn btn-danger btn-sm removeeventmore"><i
                                class="fa fa-minus-circle">Remove</i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!---end row-->
<!--========== End of add multiple class with ajax ==============-->
<script type="text/javascript">
    $(document).ready(function () {
        var counter = 0;
        $(document).on("click", ".addeventmore", function () {
            var whole_extra_item_add = $("#whole_extra_item_add").html();
            $(this).closest(".add_item").append(whole_extra_item_add);
            counter++;
        });
        $(document).on("click", ".removeeventmore", function (event) {
            $(this).closest("#whole_extra_item_delete").remove();
            counter -= 1
        });
    });

</script>



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
