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
					<!-- Notifications -->
					<li class="nav-item dropdown">
						<a href="data-tables.html#" class="dropdown-toggle nav-link" data-toggle="dropdown">
							<i class="fa fa-bell-o"></i> <span class="badge badge-pill">{{count($current_user->unreadNotifications)}}</span>
						</a>
						<div class="dropdown-menu notifications">
							<div class="topnav-dropdown-header">
								<span class="notification-title">Notifications</span>
								<a href="javascript:void(0)" class="clear-noti"> Clear All </a>
							</div>

							<div class="noti-content">
								<ul class="notification-list">
									@foreach($current_user->notifications as $notification)
									<li class="notification-message">
										<a href="activities.html">
											<div class="media">

												<span class="avatar">
													<img alt="" src="{{ asset('public/uploads/admin/profile/' . $current_user->image) }}">
												</span>
												<div class="media-body">
													<p class="noti-details">{{($notification->data)['message'] ?? 'N/A'}}</p>
													<p class="noti-details">{{($notification->data)['comment'] ?? 'N/A'}}</p>
													<p class="noti-time"><span class="notification-time">{{$notification->updated_at->diffForHumans()}}</span></p>
												</div>
											</div>
										</a>
									</li>
									@endforeach
								</ul>
							</div>
							<div class="topnav-dropdown-footer">
								<a href="activities.html">View all Notifications</a>
							</div>
						</div>
					</li>
					<!-- /Notifications -->
					
					<li class="nav-item dropdown has-arrow main-drop">
					    <a href="index.html#" class="dropdown-toggle nav-link" data-toggle="dropdown">
					        <span class="user-img">
					            <img src="{{ asset('public/uploads/admin/profile/' . $current_user->image) }}" alt="{{ $current_user->image }}">
							<span class="status online"></span>
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

		@include('admin.includes.sidebar')

			<!-- Page Wrapper -->
            <div class="page-wrapper">

				@yield('content')

            </div>
			<!-- /Page Wrapper -->

        </div>

@include('admin.includes.footer')
