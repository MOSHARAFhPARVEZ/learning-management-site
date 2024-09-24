{{-- //// Start Wishlist Add Part //// --}}

<script type="text/javascript">

    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
    })

    function addToWishlist(course_id){

        $.ajax({
            type: "POST",
            datatype: 'json',
            url: "/add-to-wishlist/"+course_id,

            success:function(response){
            }
        })
    }
    // wishlist();

</script>
{{-- //// End Wishlist Add Part //// --}}


{{-- //// Start Wishlist Load Part //// --}}

<script type="text/javascript">


    function wishlist() {
        $.ajax({
            type:"GET",
            datatype: "json",
            url: "/get-wishlist-course/",


        success:function(response){

$('#wishQty').text(response.wishQty);

            var rows = ""
            $.each(response.wishlist, function(key,value){
                rows +=`
                <div class="col-lg-4 responsive-column-half">
        <div class="card card-item">
            <div class="card-image">
                <a href="/course/details/${value.course.id}/${value.course.course_name_slug}" class="d-block">
                    <img class="card-img-top" src="/${value.course.course_image}" alt="Card image cap">
                </a>
            </div><!-- end card-image -->
            <div class="card-body">
                <h6 class="ribbon ribbon-blue-bg fs-14 mb-3">${value.course.label}</h6>
                <h5 class="card-title"><a href="/course/details/${value.course.id}/${value.course.course_name_slug}">${value.course.course_name}</a>
                </h5>
                <div class="d-flex justify-content-between align-items-center">

                    ${value.course.discount_price == null
                    ?`<p class="card-price text-black font-weight-bold">
                        ${value.course.selling_price}
                    </p>`
                    :`<p class="card-price text-black font-weight-bold">
                        ${value.course.discount_price}
                        <span class="before-price font-weight-medium">
                            ${value.course.selling_price}
                        </span>
                    </p>`
                    }

                    <div class="icon-element icon-element-sm shadow-sm cursor-pointer" data-toggle="tooltip" data-placement="top" title="Remove from Wishlist" id="${value.id}" onclick="wishListRemove(this.id)" >
                        <i class="la la-heart"></i>
                    </div>

                </div>
            </div><!-- end card-body -->
        </div><!-- end card -->
    </div><!-- end col-lg-4 -->

                `
            });
            $('#wishlist').html(rows);
        }
        })
    }

    wishlist();

    // wishlist remove part start //
    function wishListRemove(id){
        $.ajax({
            type: "GET",
            datatype: 'json',
            url: "/wishlist-remove/"+id,

            success:function(response){
wishlist();

            }

        })

    }

    // wishlist remove part end //

</script>
{{-- //// End Wishlist Load Part //// --}}



{{-- //// Start Add To Cart Part //// --}}

<script type="text/javascript">

    function addToCart(courseId , courseName, courseNameSlug, instactorId){
        $.ajax({
            type: "POST",
            datatype: 'json',
            data: {
                _token: '{{ csrf_token() }}',
                course_name: courseName,
                course_name_slug: courseNameSlug,
                instactor_id: instactorId
            },
            url: "/cart/data/store/"+courseId,
            success: function(data){
                miniCart();
            }
        });
    }

</script>
{{-- //// End Add To Cart Part //// --}}


{{-- //// Start Mini Cart Part //// --}}

<script type="text/javascript">

function miniCart(){
    $.ajax({
        type: 'GET',
        url: '/course/mini/cart',
        datatype: 'json',

        success:function(response){

            var miniCart = ""

            $.each(response.carts, function(key,value){

                $('span[id="cartSubTotal"]').text(response.cartTotal);

                $('span[id="cartQty"]').text(response.cartQty);

                miniCart += `

                    <li class="media media-card">
                        <a href="/course/details/${value.id}/${value.options.course_name_slug}" class="media-img">
                            <img src="/${value.options.course_image}"
                                alt="Cart image">
                        </a>
                        <div class="media-body">
                            <h5>
                                <a href="/course/details/${value.id}/${value.options.course_name_slug}">
                                    ${value.name}
                                </a>
                                </h5>
                                <p class="text-black font-weight-semi-bold lh-18">
                                    ${value.price}
                                </p>
                                <a class="btn" type="submit" id="${value.rowId}" onclick="miniCartRemove(this.id)" >
                                    <i class="la la-times"></i>
                                </a>
                        </div>
                    </li>

                `
            });
            $('#miniCart').html(miniCart);

        }
    })
}
miniCart();

// start mini cart part

function miniCartRemove(rowId){
    $.ajax({
        type: "GET",
        datatype: 'json',
        url: '/mini/cart/remove/'+rowId,

        success:function(data){
            miniCart();
        }
    })
}

// end mini cart part



</script>
{{-- //// End Mini Cart Part //// --}}





{{-- //// Start  Cart Part //// --}}

<script type="text/javascript">

    function cart(){
        $.ajax({
            type: "GET",
            datatype: 'json',
            url: '/get-cart-data',

            success:function(response){

                var rows = ""
                $.each(response.carts, function (key,value){

                    $('span[id="cartSubTotal"]').text(response.cartTotal);

                    rows +=`

                    <tr>
                    <th scope="row">
                        <div class="media media-card">
                            <a href="course-details.html" class="media-img mr-0">
                                <img src="/${value.options.course_image}" alt="Cart image">
                            </a>
                        </div>
                    </th>
                    <td>
                        <a href="/course/details/${value.id}/${value.options.course_name_slug}" class="text-black font-weight-semi-bold">${value.name}</a>
                    </td>
                    <td>
                        <ul class="generic-list-item font-weight-semi-bold">
                            <li class="text-black lh-18">$${value.price}</li>
                        </ul>
                    </td>
                    <td>
                        <button type="button" class="icon-element icon-element-xs shadow-sm border-0" data-toggle="tooltip" data-placement="top" title="Remove" id="${value.rowId}" onclick="cartRemove(this.id)" >
                            <i class="la la-times"></i>
                        </button>
                    </td>
                </tr>


                    `

                });
                $('#cartPage').html(rows);

            }
        })
    }

    cart();

    // cart remove part
    function cartRemove(rowId){
        $.ajax({
            type: "GET",
            datatype: 'json',
            url: '/cart/remove/'+rowId,

            success:function(data){
                cart();
                miniCart();
            }
        })
    }
    // cart remove part


</script>
{{-- //// End  Cart Part //// --}}
