@extends('admin.includes.admin_design')
@section('title') Dashboard - {{ $theme->website_name }}  @endsection
@section('content')
<!-- Page Content -->
    <div class="content container-fluid">

    @php
        $current_user = Auth::guard('admin')->user();
    @endphp
		<!-- Page Header -->
	<div class="page-header">
		<div class="row">
			<div class="col-sm-12">
				<h3 class="page-title">Welcome {{ $current_user->first_name }} {{ $current_user->last_name }}</h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item active">Dashboard</li>
				</ul>
			</div>
		</div>
	</div>
		<!-- /Page Header -->
</div>
				<!-- /Page Content -->
   
@endsection
