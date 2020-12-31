@include('admin.includes.header')
    <body>
		<!-- Main Wrapper -->
        <div class="main-wrapper">

			<!-- Header -->
            <div class="header">

				<!-- Logo -->
                <div class="header-left">
                    <a href="{{ route('adminDashboard') }}" class="logo">
						<img src="{{ asset('public/uploads/'.$theme->header_logo) }}" width="200" height="60" alt="">
					</a>
                </div>
				<!-- /Logo -->

				<a id="toggle_btn" href="javascript:void(0);">
					<span class="bar-icon">
						<span></span>
						<span></span>
						<span></span>
					</span>
				</a>



				<a id="mobile_btn" class="mobile_btn" href="index.html#sidebar"><i class="fa fa-bars"></i></a>

				<!-- Header Menu -->
				<ul class="nav user-menu">
					@php
					$current_user = Auth::guard('admin')->user();
					@endphp
					<li class="nav-item dropdown has-arrow main-drop">
						<a href="index.html#" class="dropdown-toggle nav-link" data-toggle="dropdown">
							 <span class="user-img">
					            <img src="{{ asset('public/uploads/admin/profile/' . $current_user->image) }}" alt="{{ $current_user->image }}">
							<span class="status online"></span>
							<span class="status online"></span></span>
                            <span></span>
                        </a>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="{{ route('adminProfile')}}">My Profile</a>
                            <a class="dropdown-item" href="{{ route('changePassword') }}">Change Password</a>
                            <a class="dropdown-item" href="{{ route('admin.logout') }}">Logout</a>
						</div>
					</li>
				</ul>
				<!-- /Header Menu -->

				<!-- Mobile Menu -->
				<div class="dropdown mobile-user-menu">
					<a href="index.html#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
					<div class="dropdown-menu dropdown-menu-right">
						<a class="dropdown-item" href="{{ route('adminProfile')}}">My Profile</a>
						<a class="dropdown-item" href="{{ route('changePassword') }}">Change Password</a>
						<a class="dropdown-item" href="{{ route('admin.logout') }}">Logout</a>
					</div>
				</div>
				<!-- /Mobile Menu -->

            </div>
			<!-- /Header -->

		@include('admin.includes.sidebar_v2')

			<!-- Page Wrapper -->
            <div class="page-wrapper">

				@yield('content')

            </div>
			<!-- /Page Wrapper -->

        </div>


@include('admin.includes.footer')
