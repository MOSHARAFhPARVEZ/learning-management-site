@extends('frontend\master')
@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<!-- ================================
    START BREADCRUMB AREA
================================= -->
<section class="breadcrumb-area section-padding img-bg-2">
    <div class="overlay"></div>
    <div class="container">
        <div class="breadcrumb-content d-flex flex-wrap align-items-center justify-content-between">
            <div class="section-heading">
                <h2 class="section__title text-white">{{ $subcategory->subcategory_name }} Courses</h2>
            </div>
            <ul
                class="generic-list-item generic-list-item-white generic-list-item-arrow d-flex flex-wrap align-items-center">
                <li><a href="{{ route('index') }}">Home</a></li>
                <li>{{ $subcategory->category->category_name }}</li>
                <li>{{ $subcategory->subcategory_name }}</li>
            </ul>
        </div><!-- end breadcrumb-content -->
    </div><!-- end container -->
</section><!-- end breadcrumb-area -->
<!-- ================================
    END BREADCRUMB AREA
================================= -->

<!--======================================
        START COURSE AREA
======================================-->
<section class="course-area section--padding">
    <div class="container">
        <div class="filter-bar mb-4">
            <div class="filter-bar-inner d-flex flex-wrap align-items-center justify-content-between">
                <p class="fs-14">We found <span class="text-black">
                        {{ count($courses) }}</span> courses available for you</p>
                <div class="d-flex flex-wrap align-items-center">
                    <ul class="filter-nav mr-3">
                        <li><a href="course-grid.html" data-toggle="tooltip" data-placement="top" title="Grid View"
                                class="active"><span class="la la-th-large"></span></a></li>
                        <li><a href="course-list.html" data-toggle="tooltip" data-placement="top"
                                title="List View"><span class="la la-list"></span></a></li>
                    </ul>
                    <div class="select-container select--container">
                        <select class="select-container-select">
                            <option value="all-category">All Category</option>
                            <option value="newest">Newest courses</option>
                            <option value="oldest">Oldest courses</option>
                            <option value="high-rated">Highest rated</option>
                            <option value="popular-courses">Popular courses</option>
                            <option value="high-to-low">Price: high to low</option>
                            <option value="low-to-high">Price: low to high</option>
                        </select>
                    </div>
                </div>
            </div><!-- end filter-bar-inner -->
        </div><!-- end filter-bar -->
        <div class="row">
            <div class="col-lg-4">


                <div class="sidebar mb-5">
                    <div class="card card-item">
                        <div class="card-body">
                            <h3 class="card-title fs-18 pb-2">Search Field</h3>
                            <div class="divider"><span></span></div>
                            <form method="post">
                                <div class="form-group mb-0">
                                    <input class="form-control form--control pl-3" type="text" name="search"
                                        placeholder="Search courses">
                                    <span class="la la-search search-icon"></span>
                                </div>
                            </form>
                        </div>
                    </div><!-- end card -->
                    <div class="card card-item">
                    <div class="card-body">
                        <h3 class="card-title fs-18 pb-2">Course Categories</h3>
                        <div class="divider"><span></span></div>

                        @foreach ($categories as $category)
                        <ul class="generic-list-item">
                            <li><a
                                    href="{{ url('category/'.$category->id.'/'.$category->category_slug) }}">{{ $category->category_name }}</a>
                            </li>
                        </ul>
                        @endforeach

                    </div>
                </div><!-- end card -->
                    <div class="card card-item">
                        <div class="card-body">
                            <h3 class="card-title fs-18 pb-2">Ratings</h3>
                            <div class="divider"><span></span></div>
                            <div class="custom-control custom-radio mb-1 fs-15">
                                <input type="radio" class="custom-control-input" id="fiveStarRating"
                                    name="radio-stacked" required>
                                <label class="custom-control-label custom--control-label" for="fiveStarRating">
                                    <span class="rating-wrap d-flex align-items-center">
                                        <span class="review-stars">
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                        </span>
                                        <span class="rating-total pl-1"><span
                                                class="mr-1 text-black">5.0</span>(20,230)</span>
                                    </span>
                                </label>
                            </div>
                            <div class="custom-control custom-radio mb-1 fs-15">
                                <input type="radio" class="custom-control-input" id="fourStarRating"
                                    name="radio-stacked" required>
                                <label class="custom-control-label custom--control-label" for="fourStarRating">
                                    <span class="rating-wrap d-flex align-items-center">
                                        <span class="review-stars">
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                        </span>
                                        <span class="rating-total pl-1"><span class="mr-1 text-black">4.5 &
                                                up</span>(10,230)</span>
                                    </span>
                                </label>
                            </div>
                            <div class="custom-control custom-radio mb-1 fs-15">
                                <input type="radio" class="custom-control-input" id="threeStarRating"
                                    name="radio-stacked" required>
                                <label class="custom-control-label custom--control-label" for="threeStarRating">
                                    <span class="rating-wrap d-flex align-items-center">
                                        <span class="review-stars">
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                        </span>
                                        <span class="rating-total pl-1"><span class="mr-1 text-black">3.0 &
                                                up</span>(7,230)</span>
                                    </span>
                                </label>
                            </div>
                            <div class="custom-control custom-radio mb-1 fs-15">
                                <input type="radio" class="custom-control-input" id="twoStarRating" name="radio-stacked"
                                    required>
                                <label class="custom-control-label custom--control-label" for="twoStarRating">
                                    <span class="rating-wrap d-flex align-items-center">
                                        <span class="review-stars">
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                        </span>
                                        <span class="rating-total pl-1"><span class="mr-1 text-black">2.0 &
                                                up</span>(5,230)</span>
                                    </span>
                                </label>
                            </div>
                            <div class="custom-control custom-radio mb-1 fs-15">
                                <input type="radio" class="custom-control-input" id="oneStarRating" name="radio-stacked"
                                    required>
                                <label class="custom-control-label custom--control-label" for="oneStarRating">
                                    <span class="rating-wrap d-flex align-items-center">
                                        <span class="review-stars">
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                        </span>
                                        <span class="rating-total pl-1"><span class="mr-1 text-black">1.0 &
                                                up</span>(3,230)</span>
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div><!-- end card -->
                    <div class="card card-item">
                        <div class="card-body">
                            <h3 class="card-title fs-18 pb-2">Level</h3>
                            <div class="divider"><span></span></div>
                            <div class="custom-control custom-checkbox mb-1 fs-15">
                                <input type="checkbox" class="custom-control-input" id="levelCheckbox" required>
                                <label class="custom-control-label custom--control-label text-black"
                                    for="levelCheckbox">
                                    All Levels<span class="ml-1 text-gray">(20,300)</span>
                                </label>
                            </div><!-- end custom-control -->
                            <div class="custom-control custom-checkbox mb-1 fs-15">
                                <input type="checkbox" class="custom-control-input" id="levelCheckbox2" required>
                                <label class="custom-control-label custom--control-label text-black"
                                    for="levelCheckbox2">
                                    Beginner<span class="ml-1 text-gray">(5,300)</span>
                                </label>
                            </div><!-- end custom-control -->
                            <div class="custom-control custom-checkbox mb-1 fs-15">
                                <input type="checkbox" class="custom-control-input" id="levelCheckbox3" required>
                                <label class="custom-control-label custom--control-label text-black"
                                    for="levelCheckbox3">
                                    Intermediate<span class="ml-1 text-gray">(3,300)</span>
                                </label>
                            </div><!-- end custom-control -->
                            <div class="custom-control custom-checkbox mb-1 fs-15">
                                <input type="checkbox" class="custom-control-input" id="levelCheckbox4" required>
                                <label class="custom-control-label custom--control-label text-black"
                                    for="levelCheckbox4">
                                    Expert<span class="ml-1 text-gray">(1,300)</span>
                                </label>
                            </div><!-- end custom-control -->
                        </div>
                    </div><!-- end card -->
                    <div class="card card-item">
                        <div class="card-body">
                            <h3 class="card-title fs-18 pb-2">By Cost</h3>
                            <div class="divider"><span></span></div>
                            <div class="custom-control custom-checkbox mb-1 fs-15">
                                <input type="checkbox" class="custom-control-input" id="priceCheckbox" required>
                                <label class="custom-control-label custom--control-label text-black"
                                    for="priceCheckbox">
                                    Paid<span class="ml-1 text-gray">(19,300)</span>
                                </label>
                            </div><!-- end custom-control -->
                            <div class="custom-control custom-checkbox mb-1 fs-15">
                                <input type="checkbox" class="custom-control-input" id="priceCheckbox2" required>
                                <label class="custom-control-label custom--control-label text-black"
                                    for="priceCheckbox2">
                                    Free<span class="ml-1 text-gray">(1,300)</span>
                                </label>
                            </div><!-- end custom-control -->
                            <div class="custom-control custom-checkbox mb-1 fs-15">
                                <input type="checkbox" class="custom-control-input" id="priceCheckbox3" required>
                                <label class="custom-control-label custom--control-label text-black"
                                    for="priceCheckbox3">
                                    All<span class="ml-1 text-gray">(20,300)</span>
                                </label>
                            </div><!-- end custom-control -->
                        </div>
                    </div><!-- end card -->
                </div><!-- end sidebar -->
            </div><!-- end col-lg-4 -->
            <div class="col-lg-8">
                <div class="row">
                    {{-- @forelse ($collection as $item)

                    @empty

                    @endforelse --}}

                    @foreach ($courses as $course)
                    <div class="col-lg-6 responsive-column-half">
                        <div class="card card-item card-preview"
                            data-tooltip-content="#tooltip_content_1{{  $course->id }}">
                            <div class="card-image">
                                <a href="{{ url('course/details/'.$course->id.'/'.$course->course_name_slug) }}"
                                    class="d-block">
                                    <img class="card-img-top lazy"
                                        src="{{ asset('uploads/course/course_image') }}/{{ $course->course_image }}"
                                        data-src="{{ asset('uploads/course/course_image') }}/{{ $course->course_image }}"
                                        alt="Card image cap">
                                </a>

                                @php
                                $amount = $course->selling_price - $course->discount_price;
                                $discount = ($amount / $course->selling_price)*100
                                @endphp

                                <div class="course-badge-labels">

                                    @if ($course->bestseller)
                                    <div class="course-badge">Bestseller</div>
                                    @endif

                                    @if ($course->highestrated)
                                    <div class="course-badge">Highest Rated</div>
                                    @endif

                                    @if (!$course->discount_price == NULL)
                                    <div class="course-badge blue">{{ round($discount) }}%</div>
                                    @endif


                                </div>
                            </div><!-- end card-image -->
                            <div class="card-body">
                                <h6 class="ribbon ribbon-blue-bg fs-14 mb-3">{{ $course->label }}</h6>
                                <h5 class="card-title"><a
                                        href="{{ url('course/details/'.$course->id.'/'.$course->course_name_slug) }}">{{ $course->course_name }}</a>
                                </h5>
                                <p class="card-text"><a href="teacher-detail.html">{{ $course->instuctor->name }}</a>
                                </p>
                                <div class="rating-wrap d-flex align-items-center py-2">
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
                                <div class="d-flex justify-content-between align-items-center">

                                    @if ($course->discount_price == NULL)
                                    <p class="card-price text-black font-weight-bold">{{ $course->selling_price }}</p>
                                    @else
                                    <p class="card-price text-black font-weight-bold">{{ $course->discount_price }}
                                        <span
                                            class="before-price font-weight-medium">{{ $course->selling_price }}</span>
                                    </p>
                                    @endif
                                    <div class="icon-element icon-element-sm shadow-sm cursor-pointer"
                                        title="Add to Wishlist"><i class="la la-heart-o"></i></div>
                                </div>
                            </div><!-- end card-body -->
                        </div><!-- end card -->
                    </div><!-- end col-lg-6 -->
                    @endforeach

                </div><!-- end row -->
                <div class="text-center pt-3">
                    <nav aria-label="Page navigation example" class="pagination-box">
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true"><i class="la la-arrow-left"></i></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true"><i class="la la-arrow-right"></i></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <p class="fs-14 pt-2">Showing 1-10 of 56 results</p>
                </div>
            </div><!-- end col-lg-8 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end courses-area -->
<!--======================================
        END COURSE AREA
======================================-->


{{-- =========================== --}}
{{-- ==== tooltip_templates= === --}}
{{-- =========================== --}}
@foreach ($courses as $course)


<div class="tooltip_templates">
    <div id="tooltip_content_1{{  $course->id }}">
        <div class="card card-item">
            <div class="card-body">
                <p class="card-text pb-2">By <a href="teacher-detail.html">{{ $course->instuctor->name }}</a></p>
                <h5 class="card-title pb-1"><a
                        href="{{ url('course/details/'.$course->id.'/'.$course->course_name_slug) }}">{{ $course->course_name }}</a>
                </h5>
                <div class="d-flex align-items-center pb-1">

                    @if ($course->bestseller)
                    <div class="course-badge">Bestseller</div>&nbsp;
                    @endif

                    <p class="text-success fs-14 font-weight-medium">Updated<span class="font-weight-bold pl-1">
                            {{ $course->created_at->format('d M Y') }}</span></p>
                </div>
                <ul
                    class="generic-list-item generic-list-item-bullet generic-list-item--bullet d-flex align-items-center fs-14">
                    <li>{{ $course->duration }}</li>
                    <li>{{ $course->label}}</li>
                </ul>
                <p class="card-text pt-1 fs-14 lh-22">{{ $course->prerequisites }}</p>
                @php
                $goals = App\Models\Coursegoal::where('course_id',$course->id)->orderBy('id','DESC')->get();
                @endphp
                <ul class="generic-list-item fs-14 py-3">

                    @foreach ($goals as $goal)
                    <li>
                        <i class="la la-check mr-1 text-black"></i>
                        {{ $goal->goal_name }}
                    </li>
                    @endforeach

                </ul>
                <div class="d-flex justify-content-between align-items-center">
                    <a href="#" class="btn theme-btn flex-grow-1 mr-3"><i class="la la-shopping-cart mr-1 fs-18"></i>
                        Add to Cart</a>
                    <div class="icon-element icon-element-sm shadow-sm cursor-pointer" title="Add to Wishlist"><i
                            class="la la-heart-o"></i></div>
                </div>
            </div>
        </div><!-- end card -->
    </div>
</div><!-- end tooltip_templates -->


@endforeach


@endsection
