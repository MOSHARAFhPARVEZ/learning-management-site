<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="{{ asset('backend') }}/assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text">Admin</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
				</div>
			 </div>
			<!--navigation-->
			<ul class="metismenu" id="menu">

                <li class="menu-label">Dashboard</li>
				<li>
					<a href="{{ route('admin.dashboard') }}">
						<div class="parent-icon"><i class='bx bx-home-alt'></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>
				</li>


				<li class="menu-label">UI Elements</li>

                @if (Auth::user()->can('category.menu'))

				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-cart'></i>
						</div>
						<div class="menu-title">Category</div>
					</a>
					<ul>
                        @if (Auth::user()->can('category.all'))

						<li> <a href="{{ route('index.category') }}"><i class='bx bx-radio-circle'></i>All Category</a>
						</li>

                        @endif

                        @if (Auth::user()->can('subcategory.all'))

						<li> <a href="{{ route('subcategory.index') }}"><i class='bx bx-radio-circle'></i>All Sub Category</a>
						</li>

                        @endif
					</ul>
				</li>

                @endif
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-cart'></i>
						</div>
						<div class="menu-title">All About Instuctor</div>
					</a>
					<ul>
						<li> <a href="{{ route('instuctor.index') }}"><i class='bx bx-radio-circle'></i>Apply Instuctor</a>
						</li>
						<li> <a href="{{ route('all.instuctor') }}"><i class='bx bx-radio-circle'></i>All Instuctor</a>
						</li>
					</ul>
				</li>


				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-cart'></i>
						</div>
						<div class="menu-title">Manage Courses</div>
					</a>
					<ul>
						<li> <a href="{{ route('admin.course.index') }}"><i class='bx bx-radio-circle'></i>All Course</a>
						</li>
					</ul>
				</li>


				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-cart'></i>
						</div>
						<div class="menu-title">Manage Coupon</div>
					</a>
					<ul>
						<li> <a href="{{ route('admin.coupon.index') }}"><i class='bx bx-radio-circle'></i>All Coupon</a>
						</li>
					</ul>
				</li>


				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-cart'></i>
						</div>
						<div class="menu-title">Manage Settings</div>
					</a>
					<ul>
						<li> <a href="{{ route('admin.setting.smtp') }}"><i class='bx bx-radio-circle'></i>Manage SMTP</a>
						</li>
					</ul>
				</li>


				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-cart'></i>
						</div>
						<div class="menu-title">Manage Order</div>
					</a>
					<ul>
						<li> <a href="{{ route('admin.pending.order') }}"><i class='bx bx-radio-circle'></i>Pending Order</a>
						</li>
					</ul>
					<ul>
						<li> <a href="{{ route('admin.confirm.order') }}"><i class='bx bx-radio-circle'></i>Confirm Order</a>
						</li>
					</ul>
				</li>


				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-cart'></i>
						</div>
						<div class="menu-title">Manage Repot</div>
					</a>
					<ul>
						<li> <a href="{{ route('admin.report.view') }}"><i class='bx bx-radio-circle'></i>View Repot</a>
						</li>
					</ul>
					<ul>
						<li> <a href="{{ route('admin.confirm.order') }}"><i class='bx bx-radio-circle'></i>Confirm Order</a>
						</li>
					</ul>
				</li>


				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-cart'></i>
						</div>
						<div class="menu-title">Manage Review</div>
					</a>
					<ul>
						<li> <a href="{{ route('admin.review.view') }}"><i class='bx bx-radio-circle'></i>View Repot</a>
						</li>
					</ul>
				</li>



				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-cart'></i>
						</div>
						<div class="menu-title">Manage User</div>
					</a>
					<ul>
						<li> <a href="{{ route('admin.user.view') }}"><i class='bx bx-radio-circle'></i>View All User</a>
						</li>
					</ul>
					<ul>
						<li> <a href="{{ route('admin.instuctor.view') }}"><i class='bx bx-radio-circle'></i>View All Instuctor</a>
						</li>
					</ul>
				</li>



				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-cart'></i>
						</div>
						<div class="menu-title">Manage Blog</div>
					</a>
					<ul>
						<li> <a href="{{ route('admin.blogcategory.view') }}"><i class='bx bx-radio-circle'></i>View Blog Category</a>
						</li>
					</ul>
					<ul>
						<li> <a href="{{ route('create.blog.category') }}"><i class='bx bx-radio-circle'></i>Add Blog Category</a>
						</li>
					</ul>
				</li>


				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
						</div>
						<div class="menu-title">Blog Post</div>
					</a>
					<ul>
						<li> <a href="{{ route('admin.blogpost.view') }}"><i class='bx bx-radio-circle'></i>View Blog Post</a>
						</li>
						<li> <a href="{{ route('create.blog.post') }}"><i class='bx bx-radio-circle'></i>Add Blog Post</a>
						</li>
					</ul>
				</li>


				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
						</div>
						<div class="menu-title">Settings</div>
					</a>
					<ul>
						<li> <a href="{{ route('admin.site.settings') }}"><i class='bx bx-radio-circle'></i>Site Settings</a>
						</li>
					</ul>
				</li>


				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
						</div>
						<div class="menu-title">Role & Permission</div>
					</a>
					<ul>
						<li> <a href="{{ route('all.permission') }}"><i class='bx bx-radio-circle'></i>All Permission</a>
						</li>
						<li> <a href="{{ route('all.role') }}"><i class='bx bx-radio-circle'></i>All Role</a>
						</li>
						<li> <a href="{{ route('role.add.permission') }}"><i class='bx bx-radio-circle'></i>Add Role In Permission</a>
						</li>
						<li> <a href="{{ route('index.role.has.permission') }}"><i class='bx bx-radio-circle'></i>view Role In Permission</a>
						</li>
					</ul>
				</li>


				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
						</div>
						<div class="menu-title">Manage Admin</div>
					</a>
					<ul>
						<li> <a href="{{ route('all.admin') }}"><i class='bx bx-radio-circle'></i>All Admin</a>
						</li>
					</ul>
				</li>

				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
						</div>
						<div class="menu-title">Components</div>
					</a>
					<ul>
						<li> <a href="component-alerts.html"><i class='bx bx-radio-circle'></i>Alerts</a>
						</li>
						<li> <a href="component-accordions.html"><i class='bx bx-radio-circle'></i>Accordions</a>
						</li>
					</ul>
				</li>
				<li class="menu-label">Charts & Maps</li>
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class="bx bx-line-chart"></i>
						</div>
						<div class="menu-title">Charts</div>
					</a>
					<ul>
						<li> <a href="charts-apex-chart.html"><i class='bx bx-radio-circle'></i>Apex</a>
						</li>
						<li> <a href="charts-chartjs.html"><i class='bx bx-radio-circle'></i>Chartjs</a>
						</li>
						<li> <a href="charts-highcharts.html"><i class='bx bx-radio-circle'></i>Highcharts</a>
						</li>
					</ul>
				</li>
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class="bx bx-map-alt"></i>
						</div>
						<div class="menu-title">Maps</div>
					</a>
					<ul>
						<li> <a href="map-google-maps.html"><i class='bx bx-radio-circle'></i>Google Maps</a>
						</li>
						<li> <a href="map-vector-maps.html"><i class='bx bx-radio-circle'></i>Vector Maps</a>
						</li>
					</ul>
				</li>

				<li>
					<a href="https://themeforest.net/user/codervent" target="_blank">
						<div class="parent-icon"><i class="bx bx-support"></i>
						</div>
						<div class="menu-title">Support</div>
					</a>
				</li>
			</ul>
			<!--end navigation-->
		</div>
