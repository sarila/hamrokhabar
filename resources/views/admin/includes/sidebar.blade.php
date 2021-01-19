<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
		<div id="sidebar-menu" class="sidebar-menu">
			<ul>
				<li class="menu-title"> 
					<span>Main</span>
				</li>
				<li>
					<a href="{{route('adminDashboard')}}"><i class="la la-dashboard"></i> <span> Dashboard</span></a>
				</li>
				<li>
					<a href="{{route('setting')}}"><i class="la la-cog"></i> <span> Setting</span></a>
				</li>
				<li>
					<a href="{{route('category')}}"><i class="la la-list-alt"></i> <span> Category</span></a>
				</li>
				<li>
					<a href="{{route('tag')}}"><i class="la la-tag"></i> <span>Tag</span></a>
				</li>


				<li class="submenu">
					<a href="javascript:" class=""><i class="la la-newspaper-o"></i> <span>News</span> <span class="menu-arrow"></span></a>
					<ul style="display: none;">
						<li class=""><a href="{{ route('news') }}">Published News</a></li>
						<li class=""><a href="{{ route('news') }}">Draft News</a></li>
						<li class=""><a href="{{ route('news') }}">Deleted News</a></li>
						<li class=""><a href="{{ route('addNews') }}">Add News</a></li>
					</ul>
				</li>
			</ul>
		</div>
    </div>
</div>
<!-- /Sidebar -->