@php
    $courses = App\Models\Course::where('status',1)->orderBy('id','ASC')->limit(6)->get();
    $categories =App\Models\Category::orderBy('category_name','ASC')->get()
@endphp
<section class="course-area pb-120px">
    <div class="container">
        <div class="section-heading text-center">
            <h5 class="ribbon ribbon-lg mb-2">Choose your desired courses</h5>
            <h2 class="section__title">The world's largest selection of courses</h2>
            <span class="section-divider"></span>
        </div><!-- end section-heading -->
        <ul class="nav nav-tabs generic-tab justify-content-center pb-4" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="business-tab" data-toggle="tab" href="#business" role="tab" aria-controls="business" aria-selected="true">All</a>
            </li>

            {{-- =========================== --}}
            {{-- ===== All category Part ===== --}}
            {{-- =========================== --}}

            @foreach ($categories as $category)
            <li class="nav-item">
                <a class="nav-link" id="business-tab" data-toggle="tab" href="#business{{ $category->id }}" role="tab" aria-controls="business" aria-selected="false">{{ $category->category_name }}</a>
            </li>
            @endforeach

        </ul>
    </div><!-- end container -->
    <div class="card-content-wrapper bg-gray pt-50px pb-120px">
        <div class="container">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="business" role="tabpanel" aria-labelledby="business-tab">
                    <div class="row">

                        {{-- =========================== --}}
                        {{-- ===== All Course Part ===== --}}
                        {{-- =========================== --}}

                        @foreach ($courses as $course)

                        <div class="col-lg-4 responsive-column-half">
                            <div class="card card-item card-preview" data-tooltip-content="#tooltip_content_1{{ $course->id }}">
                                <div class="card-image">
                                    <a href="{{ url('course/details/'.$course->id.'/'.$course->course_name_slug) }}" class="d-block">
                                        <img class="card-img-top lazy" src="{{ asset('uploads/course/course_image') }}/{{  $course->course_image }}" data-src="{{ asset('uploads/course/course_image') }}/{{  $course->course_image }}" alt="Card image cap">
                                    </a>

                    {{-- Discount Calculation --}}
                    @php
                        $amount = $course->selling_price - $course->discount_price;
                        $discount = ($amount / $course->selling_price) * 100;
                    @endphp
                    {{-- Discount Calculation --}}
                                    <div class="course-badge-labels">

                                        @if ($course->bestseller == 1)
                                        <div class="course-badge">Bestseller</div>
                                        @endif

                                        @if ($course->highestrated == 1)
                                        <div class="course-badge sky-blue">Highest Rated</div>
                                        @endif

                                        @if ($course->discount_price == NULL)
                                        <div class="course-badge blue">New</div>
                                        @else
                                        <div class="course-badge blue">{{round($discount)}}%</div>
                                        @endif


                                    </div>
                                </div><!-- end card-image -->



@php
    $reviewcount = App\Models\Review::where('course_id',$course->id)->where('status',1)->latest()->get();
    $avarage = App\Models\Review::where('course_id',$course->id)->where('status',1)->avg('ratings');
    $enrollmentCourse = App\Models\Order::where('course_id',$course->id)->count();

@endphp

                                <div class="card-body">
                                    <h6 class="ribbon ribbon-blue-bg fs-14 mb-3">{{  $course->label }}</h6>
                                    <h5 class="card-title"><a href="{{ url('course/details/'.$course->id.'/'.$course->course_name_slug) }}">{{ $course->course_name }}</a></h5>
                                    <p class="card-text"><a href="{{ route('instuctor.details',$course->instactor_id) }}">{{  $course->instuctor->name }}</a></p>
                                    <div class="rating-wrap d-flex align-items-center py-2">
                                        <div class="review-stars">


                            @if ( $avarage == 0)
                            <span class="la la-star-o"></span>
                            <span class="la la-star-o"></span>
                            <span class="la la-star-o"></span>
                            <span class="la la-star-o"></span>
                            <span class="la la-star-o"></span>

                            @elseif ( $avarage == 1 || $avarage <2)

                            <span class="la la-star"></span>
                            <span class="la la-star-o"></span>
                            <span class="la la-star-o"></span>
                            <span class="la la-star-o"></span>
                            <span class="la la-star-o"></span>

                            @elseif ( $avarage == 2 || $avarage <3)

                            <span class="la la-star"></span>
                            <span class="la la-star"></span>
                            <span class="la la-star-o"></span>
                            <span class="la la-star-o"></span>
                            <span class="la la-star-o"></span>

                            @elseif ( $avarage == 3 || $avarage <4)

                            <span class="la la-star"></span>
                            <span class="la la-star"></span>
                            <span class="la la-star"></span>
                            <span class="la la-star-o"></span>
                            <span class="la la-star-o"></span>

                            @elseif ( $avarage == 4 || $avarage <5)

                            <span class="la la-star"></span>
                            <span class="la la-star"></span>
                            <span class="la la-star"></span>
                            <span class="la la-star"></span>
                            <span class="la la-star-o"></span>

                            @elseif ( $avarage == 5)

                            <span class="la la-star"></span>
                            <span class="la la-star"></span>
                            <span class="la la-star"></span>
                            <span class="la la-star"></span>
                            <span class="la la-star"></span>

                            @endif



                                        </div>
                                        <span class="rating-total pl-1">({{ $enrollmentCourse }})</span>
                                    </div><!-- end rating-wrap -->
                                    <div class="d-flex justify-content-between align-items-center">

                                        @if ($course->discount_price == NULL )
                                        <p class="card-price text-black font-weight-bold">
                                            ${{ $course->selling_price }}
                                        </p>
                                        @else
                                        <p class="card-price text-black font-weight-bold">${{ $course->discount_price }} <span class="before-price font-weight-medium">${{ $course->selling_price }}</span>
                                        </p>
                                        @endif


                                        <div class="icon-element icon-element-sm shadow-sm cursor-pointer" title="Add to Wishlist" id="{{ $course->id }}" onclick="addToWishlist(this.id)" ><i class="la la-heart-o"></i></div>
                                    </div>
                                </div><!-- end card-body -->
                            </div><!-- end card -->
                        </div><!-- end col-lg-4 -->

                        @endforeach


                        {{-- =========================== --}}
                        {{-- === All Course Part Emd === --}}
                        {{-- =========================== --}}

                    </div><!-- end row -->

                </div><!-- end tab-pane -->


                @foreach ($categories as $category)


                <div class="tab-pane fade" id="business{{ $category->id }}" role="tabpanel" aria-labelledby="business-tab">
                    <div class="row">


@php
    $catwisedata = App\Models\Course::where('category_id',$category->id)->where('status',1)->orderBy('id','DESC')->get();

@endphp

                        @forelse ($catwisedata as $course)


                        <div class="col-lg-4 responsive-column-half">
                            <div class="card card-item card-preview" data-tooltip-content="#tooltip_content_2">
                                <div class="card-image">
                                    <a href="{{ url('course/details/'.$course->id.'/'.$course->course_name_slug) }}" class="d-block">
                                        <img class="card-img-top lazy" src="{{ asset('uploads/course/course_image') }}/{{  $course->course_image }}" data-src="{{ asset('uploads/course/course_image') }}/{{  $course->course_image }}" alt="Card image cap">
                                    </a>
                                </div><!-- end card-image -->
                                <div class="card-body">

                                    <div class="course-badge-labels">
                    {{-- Discount Calculation --}}
                    @php
                        $amount = $course->selling_price - $course->discount_price;
                        $discount = ($amount / $course->selling_price) * 100;
                    @endphp
                    {{-- Discount Calculation --}}

                                        @if ($course->bestseller == 1)
                                        <div class="course-badge">Bestseller</div>
                                        @endif

                                        @if ($course->highestrated == 1)
                                        <div class="course-badge sky-blue">Highest Rated</div>
                                        @endif

                                        @if ($course->discount_price == NULL)
                                        <div class="course-badge blue">New</div>
                                        @else
                                        <div class="course-badge blue">{{round($discount)}}%</div>
                                        @endif

                                    </div>


@php
    $reviewcount = App\Models\Review::where('course_id',$course->id)->where('status',1)->latest()->get();
    $avarage = App\Models\Review::where('course_id',$course->id)->where('status',1)->avg('ratings');
    $enrollmentCourse = App\Models\Order::where('course_id',$course->id)->count();

@endphp

                                    <h6 class="ribbon ribbon-blue-bg fs-14 mb-3">{{  $course->label }}</h6>
                                    <h5 class="card-title"><a href="{{ url('course/details/'.$course->id.'/'.$course->course_name_slug) }}">{{  $course->course_name }}</a></h5>
                                    <p class="card-text"><a href="{{ route('instuctor.details',$course->instactor_id) }}">{{  $course->instuctor->name }}</a></p>
                                    <div class="rating-wrap d-flex align-items-center py-2">
                                        <div class="review-stars">
                                            <span class="rating-number">{{ round($avarage,1) }}</span>


                            @if ( $avarage == 0)
                            <span class="la la-star-o"></span>
                            <span class="la la-star-o"></span>
                            <span class="la la-star-o"></span>
                            <span class="la la-star-o"></span>
                            <span class="la la-star-o"></span>

                            @elseif ( $avarage == 1 || $avarage <2)

                            <span class="la la-star"></span>
                            <span class="la la-star-o"></span>
                            <span class="la la-star-o"></span>
                            <span class="la la-star-o"></span>
                            <span class="la la-star-o"></span>

                            @elseif ( $avarage == 2 || $avarage <3)

                            <span class="la la-star"></span>
                            <span class="la la-star"></span>
                            <span class="la la-star-o"></span>
                            <span class="la la-star-o"></span>
                            <span class="la la-star-o"></span>

                            @elseif ( $avarage == 3 || $avarage <4)

                            <span class="la la-star"></span>
                            <span class="la la-star"></span>
                            <span class="la la-star"></span>
                            <span class="la la-star-o"></span>
                            <span class="la la-star-o"></span>

                            @elseif ( $avarage == 4 || $avarage <5)

                            <span class="la la-star"></span>
                            <span class="la la-star"></span>
                            <span class="la la-star"></span>
                            <span class="la la-star"></span>
                            <span class="la la-star-o"></span>

                            @elseif ( $avarage == 5)

                            <span class="la la-star"></span>
                            <span class="la la-star"></span>
                            <span class="la la-star"></span>
                            <span class="la la-star"></span>
                            <span class="la la-star"></span>

                            @endif

                                        </div>
                                        <span class="rating-total pl-1">({{ $enrollmentCourse }})</span>
                                    </div><!-- end rating-wrap -->
                                    <div class="d-flex justify-content-between align-items-center">


                                        @if ($course->discount_price == NULL )
                                        <p class="card-price text-black font-weight-bold">
                                            ${{ $course->selling_price }}
                                        </p>
                                        @else
                                        <p class="card-price text-black font-weight-bold">${{ $course->discount_price }} <span class="before-price font-weight-medium">${{ $course->selling_price }}</span>
                                        </p>
                                        @endif


                                        <div class="icon-element icon-element-sm shadow-sm cursor-pointer" title="Add to Wishlist"><i class="la la-heart-o"></i>
                                        </div>
                                    </div>
                                </div><!-- end card-body -->
                            </div><!-- end card -->
                        </div><!-- end col-lg-4 -->

                        @empty
                        <h5 class="text-danger">No Course Found<b>!!!</b></h5>

                        @endforelse

                    </div><!-- end row -->
                </div><!-- end tab-pane -->

                @endforeach


            </div><!-- end tab-content -->
            <div class="more-btn-box mt-4 text-center">
                <a href="course-grid.html" class="btn theme-btn">Browse all Courses <i class="la la-arrow-right icon ml-1"></i></a>
            </div><!-- end more-btn-box -->
        </div><!-- end container -->
    </div><!-- end card-content-wrapper -->
</section><!-- end courses-area -->




                        {{-- =========================== --}}
                        {{-- ==== tooltip_templates= === --}}
                        {{-- =========================== --}}

@php
    $courseData = App\Models\Course::get();
@endphp

@foreach ($courseData as $course)


<div class="tooltip_templates">
    <div id="tooltip_content_1{{  $course->id }}">
        <div class="card card-item">
            <div class="card-body">
                <p class="card-text pb-2">By <a href="{{ route('instuctor.details',$course->instactor_id) }}">{{  $course->instuctor->name }}</a></p>
                <h5 class="card-title pb-1"><a href="{{ url('course/details/'.$course->id.'/'.$course->course_name_slug) }}">{{  $course->course_name }}</a></h5>
                <div class="d-flex align-items-center pb-1">
                    @if ($course->bestseller == 1)
                        <div class="course-badge">Bestseller</div>&nbsp;
                    @else
                    <h6 class="ribbon fs-14 mr-2">New</h6>&nbsp;
                    @endif
                    <p class="text-success fs-14 font-weight-medium">Updated<span class="font-weight-bold pl-1">{{ $course->created_at->format('d M Y') }}</span></p>
                </div>
                <ul class="generic-list-item generic-list-item-bullet generic-list-item--bullet d-flex align-items-center fs-14">
                    <li>{{  $course->duration }}</li>
                    <li>{{  $course->label }}</li>
                </ul>
                <p class="card-text pt-1 fs-14 lh-22">{{ $course->prerequisites }}</p>

@php
    $goals = App\Models\Coursegoal::where('course_id',$course->id)->orderBy('id','DESC')->get();
@endphp

                <ul class="generic-list-item fs-14 py-3">

                    @foreach ($goals as $goal)

                    <li>
                        <i class="la la-check mr-1 text-black">

                        </i>
                         {{ $goal->goal_name }}
                    </li>

                    @endforeach
                </ul>
                <div class="d-flex justify-content-between align-items-center">
                    <button type="submit" class="btn theme-btn flex-grow-1 mr-3" onclick="addToCart({{ $course->id }},'{{ $course->course_name }}','{{ $course->course_name_slug }}','{{ $course->instactor_id }}','{{ $course->course_image }}')" ><i class="la la-shopping-cart mr-1 fs-18"></i> Add to Cart</button>


                    <div class="icon-element icon-element-sm shadow-sm cursor-pointer" title="Add to Wishlist" id="{{ $course->id }}" onclick="addToWishlist(this.id)"><i class="la la-heart-o"></i></div>
                </div>
            </div>
        </div><!-- end card -->
    </div>
</div><!-- end tooltip_templates -->

@endforeach






