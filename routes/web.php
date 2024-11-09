<?php

use App\Http\Controllers\ActiveuserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\BlogcategoryController;
use App\Http\Controllers\BlogpostController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\InstuctorController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\QuansController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\TeacherApplyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RedirectIfAuthenticated;

// frontend part
Route::get('/', [UserController::class, 'Index'])->name('index');
// user dashboard
Route::get('/dashboard', function () {
    return view('frontend.dashboard.index');
})->middleware(['auth','roles:user', 'verified'])->name('dashboard');



////////////////////////////////////////////////////////////////////////////////////////////
//user middleware part///////////////// user middleware part///////////user middleware part//
////////////////////////////////////////////////////////////////////////////////////////////
Route::middleware('auth')->group(function () {
    // profile part
    Route::get('/user/profile', [UserController::class, 'UserProfile'])->name('user.profile');
    Route::get('/user/profile/change', [UserController::class, 'UserProfileChange'])->name('user.profile.change');
    Route::post('/user/profile/update', [UserController::class, 'UserProfileUpdate'])->name('user.profile.update');
    // user logout part
    Route::get('/user/logout', [UserController::class, 'UserLogout'])->name('user.logout');
    // user change password part
    Route::get('/user/change/password', [UserController::class, 'UserChangePassword'])->name('user.password.change');
    Route::post('/user/update/password', [UserController::class, 'UserUpdatePassword'])->name('user.update.password');


    Route::controller(WishlistController::class)->group(function(){

        Route::get('/user/wishlist/index', 'UserWishListIndex')->name('user.wishlist.index');
        Route::get('/get-wishlist-course', 'GetWishListCourse');
        Route::get('/wishlist-remove/{id}', 'RemoveWishList');

    });

    Route::controller(ReviewController::class)->group(function(){

        Route::post('/user/review/store', 'UserReviewStore')->name('user.review.store');

    });


// course view part for user ///////////////////////////////////////////////////////////////
    Route::controller(OrderController::class)->group(function(){

        Route::get('/user/course', 'UserCourse')->name('user.course');
        Route::get('/user/course/view/{id}', 'UserCourseView')->name('user.course.view');
    }); //end method


// Answer and Question Part for User in Course View Page ////////////////////////////////////
    Route::controller(QuansController::class)->group(function(){

        Route::post('/user/course/question', 'UserCourseQuestion')->name('user.course.question');
    });//end method


});/////////////////////////////////////////////////////////////////////////////////////////
//end user middleware part /////////////// end user middleware part ////////////////////
////////////////////////////////////////////////////////////////////////////////////////////


// New Teacher apply part
Route::get('/teacher/apply', [TeacherApplyController::class, 'TeacherApply'])->name('teacher.apply');
Route::post('/teacher/apply/store', [TeacherApplyController::class, 'TeacherApplyStore'])->name('teacher.apply.store');

// Category part start
Route::post('/teacher/apply/store', [TeacherApplyController::class, 'TeacherApplyStore'])->name('teacher.apply.store');
// Category part end

// frontend part


require __DIR__.'/auth.php';

// all dashboard route part start
// All about admin
// admin login
Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login')->middleware(RedirectIfAuthenticated::class);

// ===== admin middleware part ========
route::middleware(['auth','roles:admin'])->group(function(){
// admin dashboard
Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
// logout
Route::get('/admin/logout', [AdminController::class, 'Adminlogout'])->name('admin.logout');
// admin profile
Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
Route::post('/admin/password/change', [AdminController::class, 'AdminPasswordChange'])->name('admin.password.change');
// category part
Route::controller(CategoryController::class)->group(function(){
    Route::get('/index/category','IndexCategory')->name('index.category');
    Route::get('/create/category','CrateCategory')->name('create.category');
    Route::post('/store/category','StoreCategory')->name('store.category');
    Route::get('/edit/category/{id}','EditCategory')->name('edit.category');
    Route::post('/update/category/{id}','UpdateCategory')->name('update.category');
    Route::get('/destroy/category/{id}','DestroyCategory')->name('destroy.category');
});


// instuctor part
Route::controller(TeacherApplyController::class)->group(function(){

    Route::get('/apply/instuctor/index','IndexApply')->name('instuctor.index');
    Route::get('/add/instuctor/{id}','AddAsInstuctor')->name('add.instuctor');
    Route::post('/store/instuctor','StoreInstuctor')->name('store.instuctor');
    Route::get('/all/instuctor','AllInstuctor')->name('all.instuctor');
    // route for active and inactive instuctor
    Route::get('/inactive/instuctor/{id}','InactiveInstuctor')->name('inactive.instuctor');
    Route::get('/active/instuctor/{id}','ActiveInstuctor')->name('active.instuctor');
    // Route::get('/destroy/category/{id}','DestroyCategory')->name('destroy.category');

});// END instuctor part

// admin all course part
Route::controller(AdminController::class)->group(function(){

    Route::get('/admin/course/index','AdminCourseIndex')->name('admin.course.index');
    Route::get('/admin/course/details/{id}','AdminCourseDetails')->name('admin.course.details');
    Route::get('/admin/inactive/course/{id}','AdminInactiveCourse')->name('admin.inactive.course');
    Route::get('/admin/active/course/{id}','AdminActiveCourse')->name('admin.active.course');

}); // End admin all course part



// admin all coupon part
Route::controller(CouponController::class)->group(function(){

    Route::get('/admin/coupon/index','AdminCouponIndex')->name('admin.coupon.index');
    Route::get('/admin/coupon/create','AdminCouponCreate')->name('admin.coupon.create');
    Route::post('/admin/coupon/store','AdminCouponStore')->name('admin.coupon.store');
    Route::get('/admin/coupon/edit/{id}','AdminCouponEdit')->name('admin.coupon.edit');
    Route::post('/admin/coupon/update/{id}','AdminCouponUpdate')->name('admin.coupon.update');
    Route::get('/admin/coupon/destroy/{id}','AdminCouponDestroy')->name('admin.coupon.destroy');

}); // End admin all coupon part

// admin all SettingController part
Route::controller(SettingController::class)->group(function(){

    Route::get('/admin/setting/smtp','AdminSettingSmtp')->name('admin.setting.smtp');
    Route::post('/admin/smtp/update','AdminSmtpUpdate')->name('admin.smtp.update');

}); // End admin all SettingController part


// admin all OrderController part
Route::controller(OrderController::class)->group(function(){

    Route::get('/admin/pending/order','AdminPendingOrder')->name('admin.pending.order');
    Route::get('/admin/confirm/order','AdminConfirmOrder')->name('admin.confirm.order');
    Route::get('/admin/order/details/{id}','AdminOrderDetails')->name('about.order.details');
    Route::get('/pending/confirm/{id}','PendingConfirm')->name('pending.confirm');
    Route::get('/confirm/order/details/{id}','ConfirmOrderDetails')->name('confirm.order.details');
    Route::get('/cancel/confirm/{id}','CancelConfirm')->name('cancel.confirm');


}); // End admin all OrderController part

// admin all ReportController part
Route::controller(ReportController::class)->group(function(){

    Route::get('/admin/report/view','AdminReportView')->name('admin.report.view');
    Route::post('/admin/search/date','AdminSearchDate')->name('admin.search.date');
    Route::post('/admin/search/month','AdminSearchMonth')->name('admin.search.month');
    Route::post('/admin/search/year','AdminSearchYear')->name('admin.search.year');

}); // End admin all ReportController part



// admin all ReviewController part
Route::controller(ReviewController::class)->group(function(){

    Route::get('/admin/review/view','AdminReviewView')->name('admin.review.view');
    Route::get('/inactive/review/{id}','InactiveReview')->name('inactive.review');
    Route::get('/active/review/{id}','ActiveReview')->name('active.review');

}); // End admin all ReviewController part


// admin all ReviewController part
Route::controller(ActiveuserController::class)->group(function(){

    Route::get('/admin/user/view','AdminUserView')->name('admin.user.view');
    Route::get('/admin/instuctor/view','AdminInstuctorView')->name('admin.instuctor.view');

}); // End admin all ReviewController part



// admin all BlogcategoryController part
Route::controller(SettingController::class)->group(function(){

    Route::get('/admin/site/settings','AdminSiteSettings')->name('admin.site.settings');
    Route::post('/admin/site/update','AdminSiteUpdate')->name('admin.site.update');

}); // End admin all BlogcategoryController part


// admin all RoleController part---[Permission Part]----//
Route::controller(RoleController::class)->group(function(){

    Route::get('/all/permission','AllPermission')->name('all.permission');
    Route::get('/create/permission','CreatePermission')->name('create.permission');
    Route::post('/store/permission','StorePermission')->name('store.permission');
    Route::get('/edit/permission/{id}','EditPermission')->name('edit.permission');
    Route::post('/update/permission/{id}','UpdatePermission')->name('update.permission');
    Route::get('/destroy/permission/{id}','DestroyPermission')->name('destroy.permission');

    // Import and Export Excel File in Permission Page
    Route::get('/import/permission','ImportPermission')->name('import.permission');
    Route::get('/export/permission','ExportPermission')->name('export.permission');
    Route::post('/import/permission/store','ImportPermissionStore')->name('import.permission.store');
}); // End admin all RoleController part


// admin all Role  part---[Role Part]----//
Route::controller(RoleController::class)->group(function(){

    Route::get('/all/role','AllRole')->name('all.role');
    Route::get('/create/role','CreateRole')->name('create.role');
    Route::post('/store/role','StoreRole')->name('store.role');
    Route::get('/edit/role/{id}','EditRole')->name('edit.role');
    Route::post('/update/role/{id}','UpdateRole')->name('update.role');
    Route::get('/destroy/role/{id}','DestroyRole')->name('destroy.role');

    // Import and Export Excel File in Role Page
    Route::get('/import/role','ImportRole')->name('import.role');
    Route::get('/export/role','ExportRole')->name('export.role');
    Route::post('/import/role/store','ImportRoleStore')->name('import.role.store');


    // Role add in Permission
    Route::get('/role/add/permission','RoleAddPermission')->name('role.add.permission');
    Route::post('/store/role/add/permission','StoreRoleAddPermission')->name('store.permission.add.role');
    Route::get('/index/role/has/permission','IndexRoleHasPermission')->name('index.role.has.permission');
    Route::get('/admin/edit/role/{id}','AdminEditRole')->name('admin.edit.role');
    Route::post('/update/permission/add/role/{id}','UpdateRolePermission')->name('update.permission.add.role');
    Route::get('/admin/destroy/role/{id}','AdminDestroyRole')->name('admin.destroy.role');
}); // End admin all RoleController part



// [---> Admin <--] all AdminController part
Route::controller(AdminController::class)->group(function(){

    Route::get('/all/admin','AllAdmin')->name('all.admin');
    Route::get('/create/admin','CreateAdmin')->name('create.admin');
    Route::post('/store/admin','AdminStore')->name('store.admin');
    Route::get('/edit/admin/{id}','AdminEdit')->name('edit.admin');
    Route::post('/update/admin/{id}','AdminUpdate')->name('update.admin');
    Route::get('/destroy/admin/{id}','AdminDestroy')->name('destroy.admin');


}); // End admin all BlogcategoryController part






// sub category part
Route::resource('/subcategory', SubCategoryController::class)->middleware('permission:subcategory.all');


});/////////// end admin middleware part/////////////////////////////
//////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////



// admin all BlogcategoryController part
Route::controller(BlogcategoryController::class)->group(function(){

    Route::get('/admin/blogcategory/view','AdminBlogCategoryView')->name('admin.blogcategory.view');
    Route::get('/create/blog/category','CreateBlogCategory')->name('create.blog.category');
    Route::post('/store/blog/category','BlogCategoryStore')->name('blog.category.store');
    Route::get('/edit/blog/category/{id}','EditBlogCategory')->name('edit.blog.category');
    Route::post('/update/blog/category/{id}','UpdateBlogCategory')->name('update.blog.category');
    Route::get('/destroy/blog/category/{id}','DestroyBlogCategory')->name('destroy.blog.category');

}); // End admin all BlogcategoryController part


// admin all BlogcategoryController part
Route::controller(BlogpostController::class)->group(function(){

    Route::get('/admin/blogpost/index','AdminBlogPostView')->name('admin.blogpost.view');
    Route::get('/create/blog/post','BlogPostCreate')->name('create.blog.post');
    Route::post('/store/blog/post','BlogPostStore')->name('blog.post.store');
    Route::get('/details/blog/post/{id}','BlogPostDetails')->name('details.blog.post');
    Route::get('/edit/blog/post/{id}','BlogPostEdit')->name('edit.blog.post');
    Route::post('/update/blog/post/{id}','BlogPostUpdate')->name('blog.post.update');
    Route::get('/destroy/blog/post/{id}','BlogPostDestroy')->name('destroy.blog.post');
    Route::get('/blog/details/{id}/{post_slug}','BlogDetails');
    Route::get('/blog/cat/list/{id}/{category_slug}','BlogCatList');
    Route::get('/all/blog','AllBlog')->name('all.blog');

}); // End admin all BlogcategoryController part


// instuctor login
Route::get('/instuctor/login', [InstuctorController::class, 'InstuctorLogin'])->name('instuctor.login')->middleware(RedirectIfAuthenticated::class);

/////////////////////////////////////////////////////////////////
// instuctor middleware part
/////////////////////////////////////////////////////////////////
route::middleware(['auth','roles:instuctor'])->group(function(){
Route::get('/instuctor/dashboard', [InstuctorController::class, 'InstuctorDashboard'])->name('instuctor.dashboard');
// logout
Route::get('/instuctor/logout', [InstuctorController::class, 'Instuctorlogout'])->name('instuctor.logout');
// instuctor profile
Route::get('/instuctor/profile', [InstuctorController::class, 'InstuctorProfile'])->name('instuctor.profile');

Route::post('/instuctor/profile/store', [InstuctorController::class, 'InstuctorProfileStore'])->name('instuctor.profile.store');

Route::get('/instuctor/change/password', [InstuctorController::class, 'InstuctorChangePassword'])->name('instuctor.change.password');

Route::post('/instuctor/password/update', [InstuctorController::class, 'InstuctorPasswordUpdate'])->name('instuctor.password.update');

Route::get('/about/instuctor/create/{id}', [InstuctorController::class, 'AboutInstuctorCreate'])->name('about.instuctor.create');

Route::post('/about/instuctor/store', [InstuctorController::class, 'InstuctorAboutStore'])->name('about.instuctor.store');

Route::get('/about/instuctor/edit/{id}', [InstuctorController::class, 'AboutInstuctorEdit'])->name('about.instuctor.edit');

Route::post('/about/instuctor/update/{id}', [InstuctorController::class, 'InstuctorAboutUpdate'])->name('about.instuctor.update');

Route::get('/about/instuctor/delete/{id}', [InstuctorController::class, 'AboutInstuctorDelete'])->name('about.instuctor.delete');

// Course part
Route::controller(CourseController::class)->group(function(){
    Route::get('/course/index','CourseIndex')->name('course.index');
    Route::get('/course/create','CourseCreate')->name('course.create');
    Route::post('/course/store','CourseStore')->name('course.store');
    Route::get('/course/details/{id}','CourseDetails')->name('course.details');
    Route::get('/course/edit/{id}','CourseEdit')->name('course.edit');
    Route::post('/course/update/{id}','CourseUpdate')->name('course.update');
    Route::post('/course/update/image/{id}','CourseUpdateImage')->name('course.update.image');
    Route::post('/course/update/video/{id}','CourseUpdateVideo')->name('course.update.video');
    Route::post('/course/update/goals/{id}','CourseUpdateGoals')->name('course.update.goals');
    Route::get('/course/destroy/{id}','CourseDestroy')->name('course.destroy');
});

// Course Section and Lecture part
Route::controller(CourseController::class)->group(function(){
    Route::get('/course/lecture/create/{id}','CourseLectureCreate')->name('course.lecture.create');
    // Route::get('/course/index','CourseIndex')->name('course.index');
    ////======== Section Part =======//////
    Route::post('/course/section/create/{id}','CourseSectionCreate')->name('course.section.create');
    Route::get('/course/section/edit/{id}','CourseSectionEdit')->name('course.section.edit');
    Route::post('/course/section/update/{id}','CourseSectionUpdate')->name('course.section.update');
    Route::get('/course/section/destroy/{id}','CourseSectionDestroy')->name('course.section.destroy');
    Route::get('/course/section/addlecture/{id}','CourseSectionAddlecture')->name('course.section.addlecture');
    Route::post('/addlecture/store/{id}','AddlectureStore')->name('addlecture.store');
    Route::get('/course/lecture/edit/{id}','CourseLectureEdit')->name('course.lecture.edit');
    Route::post('/course/lecture/update/{id}','CourseLectureUpdate')->name('course.lecture.update');
    Route::get('/course/lecture/destroy/{id}','CourseLectureDestroy')->name('course.lecture.destroy');
});

// OrderController part
Route::controller(OrderController::class)->group(function(){
    Route::get('/instuctor/all/order','InstuctorAllOrder')->name('instuctor.all.order');
    Route::get('/instuctor/order/details/{id}','InstuctorOrderDetails')->name('instuctor.order.details');
    Route::get('/instuctor/order/invoice/{id}','InstuctorOrderInvoice')->name('instuctor.order.invoice');

});

// Answer the Question Part for instuctor in Course View Page //////////////////////////////
    Route::controller(QuansController::class)->group(function(){

        Route::get('/instuctor/all/question', 'InstuctorAllQuestion')->name('instuctor.all.question');
        Route::get('/instuctor/question/details/{id}', 'InstuctorQuestionDetails')->name('instuctor.question.details');
        Route::post('/instuctor/question/answer/{id}', 'InstuctorQuestionAnswer')->name('instuctor.question.answer');

    });//end method


// instuctor all coupon part
Route::controller(CouponController::class)->group(function(){

    Route::get('/instuctor/coupon/index','InstuctorCouponIndex')->name('instuctor.coupon.index');
    Route::get('/instuctor/coupon/create','InstuctorCouponCreate')->name('instuctor.coupon.create');
    Route::post('/instuctor/coupon/store','InstuctorCouponStore')->name('instuctor.coupon.store');
    Route::get('/instuctor/coupon/edit/{id}','InstuctorCouponEdit')->name('instuctor.coupon.edit');
    Route::post('/instuctor/coupon/update/{id}','InstuctorCouponUpdate')->name('instuctor.coupon.update');
    Route::get('/instuctor/coupon/destroy/{id}','InstuctorCouponDestroy')->name('instuctor.coupon.destroy');

}); // End instuctor all coupon part


// instuctor all ReviewController part
Route::controller(ReviewController::class)->group(function(){

    Route::get('/instuctor/review/index','InstuctorReviewIndex')->name('instuctor.review.index');


}); // End instuctor all ReviewController part











}); // end instuctor middleware part//////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
// ////////Frontend Part start / / /  / / / / / / / / / / / / /
////////////////////////////////////////////////////////////////////////
// ////////Course Details Part start / / /  / / / / / / / / / / / / /
Route::get('/course/details/{id}/{slug}',[CourseController::class, 'CourseDetailsPage']);
///   /////// Course Details Part end/ / / / / / / / / / / / / / / /
///   /////// Categories wise coure/ / / / / / / / / / / / / / / /
Route::get('/category/{id}/{slug}',[FrontendController::class, 'CategorywiseCourse']);
Route::get('/subcategory/{id}/{slug}',[FrontendController::class, 'SubcategorywiseCourse']);
Route::get('/instuctor/details/{id}',[FrontendController::class, 'InstuctorDetails'])->name('instuctor.details');

// route for wishlist
Route::post('/add-to-wishlist/{course_id}',[WishlistController::class, 'AddToWishList']);

// route for add to cart
Route::post('/cart/data/store/{courseId}',[CartController::class, 'AddToCart']);
Route::post('/buy/data/store/{courseId}',[CartController::class, 'BuyCourse']);
Route::get('/cart/data',[CartController::class, 'CartData']);
// mini cart part
Route::get('/course/mini/cart',[CartController::class, 'CourseMiniCart']);
Route::get('/mini/cart/remove/{rowId}',[CartController::class, 'MiniCartRemove']);
////////////////////
// Cart All Route //
////////////////////
Route::controller(CartController::class)->group(function(){
    Route::get('/go/to/cart','GoToCart')->name('go.to.cart');
    Route::get('/get-cart-data','GetCartData');
    Route::get('/cart/remove/{rowId}','CartRemove');
}); //end method
///////////////
// coupon part //////////////////////////////////////////////////////
Route::controller(CartController::class)->group(function(){
    Route::post('/coupon-apply','CouponApply');
    Route::post('/inscoupon-apply','InsCouponApply');
    Route::get('/coupon-calculation','CouponCalculation');
    Route::get('/coupon-remove','CouponRemove');
});
///////////////
// checkout part //////////////////////////////////////////////////////
Route::controller(CartController::class)->group(function(){
   Route::get('/checkout','CheckoutIndex')->name('checkout');
   Route::post('/order/store','OrderStore')->name('order.store');
   Route::post('/stripe/order','StripeOrder')->name('stripe.order');
});

// Notification part
Route::controller(CartController::class)->group(function(){
   Route::post('/mark-notification-as-read/{notificationId}','ReadNotification');
});




// all dashboard route part end
