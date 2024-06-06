@extends('frontend\master')

@section('content')

<!--================================
         START HERO AREA
=================================-->
@include('frontend\component\heroarea')
<!--================================
        END HERO AREA
=================================-->

<!--======================================
        START FEATURE AREA
 ======================================-->
 @include('frontend\component\featurearea')
<!--======================================
       END FEATURE AREA
======================================-->

<!--======================================
        START CATEGORY AREA
======================================-->
@include('frontend\component\categoryarea')
<!--======================================
        END CATEGORY AREA
======================================-->

<!--======================================
        START COURSE AREA ONE
======================================-->
@include('frontend\component\coursesareaone')
<!--======================================
        END COURSE AREA ONE
======================================-->

<!--======================================
        START COURSE AREA TWO
======================================-->
@include('frontend\component\coursesareatwo')
<!--======================================
        END COURSE AREA TWO
======================================-->

<!-- ================================
       START FUNFACT AREA
================================= -->
@include('frontend\component\funfactarea')
<!-- ================================
       START FUNFACT AREA
================================= -->

<!--======================================
        START CTA AREA
======================================-->
@include('frontend\component\ctaarea')
<!--======================================
        END CTA AREA
======================================-->

<!--================================
         START TESTIMONIAL AREA
=================================-->
@include('frontend\component\testimonialarea')
<!--================================
        END TESTIMONIAL AREA
=================================-->

<div class="section-block"></div>

<!--======================================
        START ABOUT AREA
======================================-->
@include('frontend\component\aboutarea')
<!--======================================
        END ABOUT AREA
======================================-->

<div class="section-block"></div>

<!--======================================
        START REGISTER AREA
======================================-->
@include('frontend\component\registerarea')
<!--======================================
        END REGISTER AREA
======================================-->

<div class="section-block"></div>

<!-- ================================
       START CLIENT-LOGO AREA
================================= -->
@include('frontend\component\clientlogoarea')
<!-- ================================
       START CLIENT-LOGO AREA
================================= -->

<!-- ================================
       START BLOG AREA
================================= -->
@include('frontend\component\blogarea')
<!-- ================================
       START BLOG AREA
================================= -->

<!--======================================
        START GET STARTED AREA
======================================-->
@include('frontend\component\getstartedarea')
<!-- ================================
       START GET STARTED AREA
================================= -->

<!--======================================
        START SUBSCRIBER AREA
======================================-->
@include('frontend\component\subscriberarea')
<!--======================================
        END SUBSCRIBER AREA
======================================-->


@endsection


