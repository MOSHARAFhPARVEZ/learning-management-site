@extends('frontend\master')

@section('content')


<!-- ================================
    START BREADCRUMB AREA
================================= -->
<section class="breadcrumb-area section-padding img-bg-2">
    <div class="overlay"></div>
    <div class="container">
        <div class="breadcrumb-content d-flex flex-wrap align-items-center justify-content-between">
            <div class="section-heading">
                <h2 class="section__title text-white">Blog</h2>
            </div>
            <ul class="generic-list-item generic-list-item-white generic-list-item-arrow d-flex flex-wrap align-items-center">
                <li><a href="{{ route('index') }}">Home</a></li>
                <li>Blog</li>
            </ul>
        </div><!-- end breadcrumb-content -->
    </div><!-- end container -->
</section><!-- end breadcrumb-area -->
<!-- ================================
    END BREADCRUMB AREA
================================= -->

<!-- ================================
       START BLOG AREA
================================= -->
<section class="blog-area section--padding">
    <div class="container-fluid">
        <div class="row">


            @foreach ($blogs as $blog)
            <div class="col-lg-4">
                <div class="card card-item">
                    <div class="card-image">
                        <a href="{{ url('blog/details/'.$blog->id . '/' . $blog->post_slug) }}" class="d-block">
                            <img class="card-img-top lazy" src="{{ asset('uploads/post_image') }}/{{  $blog->post_image }}" data-src="{{ asset('uploads/post_image') }}/{{  $blog->post_image }}" alt="Card image cap">
                        </a>
                        <div class="course-badge-labels">
                            <div class="course-badge">{{  $blog->created_at->format('M d Y') }}</div>
                        </div>
                    </div><!-- end card-image -->
                    <div class="card-body">
                        <h5 class="card-title"><a href="{{ url('blog/details/'.$blog->id . '/' . $blog->post_slug) }}">{{  $blog->post_title }}</a></h5>
                        <ul class="generic-list-item generic-list-item-bullet generic-list-item--bullet d-flex align-items-center flex-wrap fs-14 pt-2">
                            <li class="d-flex align-items-center">By<a href="#">TechyDevs</a></li>
                            <li class="d-flex align-items-center"><a href="#">4 Comments</a></li>
                            <li class="d-flex align-items-center"><a href="#">130 Likes</a></li>
                        </ul>
                        <div class="d-flex justify-content-between align-items-center pt-3">
                            <a href="{{ url('blog/details/'.$blog->id . '/' . $blog->post_slug) }}" class="btn theme-btn theme-btn-sm theme-btn-white">Read More <i class="la la-arrow-right icon ml-1"></i></a>
                            <div class="share-wrap">
                                <ul class="social-icons social-icons-styled">
                                    <li class="mr-0"><a href="#" class="facebook-bg"><i class="la la-facebook"></i></a></li>
                                    <li class="mr-0"><a href="#" class="twitter-bg"><i class="la la-twitter"></i></a></li>
                                    <li class="mr-0"><a href="#" class="instagram-bg"><i class="la la-instagram"></i></a></li>
                                </ul>
                                <div class="icon-element icon-element-sm shadow-sm cursor-pointer share-toggle" title="Toggle to expand social icons"><i class="la la-share-alt"></i></div>
                            </div>
                        </div>
                    </div><!-- end card-body -->
                </div><!-- end card -->
            </div><!-- end col-lg-4 -->
            @endforeach


        </div><!-- end row -->
        <div class="text-center pt-3">
            <nav aria-label="Page navigation example" class="pagination-box">

                {{ $blogs->links('vendor.pagination.custom') }}

            </nav>
        </div>
    </div><!-- end container-fluid -->
</section><!-- end blog-area -->
<!-- ================================
       START BLOG AREA
================================= -->



@endsection


