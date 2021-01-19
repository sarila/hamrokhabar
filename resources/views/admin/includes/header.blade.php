<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="Smarthr - Bootstrap Admin Template">
		<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
        <meta name="author" content="Dreamguys - Bootstrap Admin Template">
        <meta name="robots" content="noindex, nofollow">
        <title> @yield('title') </title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('public/uploads/assets/img/favicon.png') }}">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('public/adminPanel/assets/css/bootstrap.min.css') }}">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{ asset('public/adminPanel/assets/css/font-awesome.min.css') }}">
		
		<!-- Lineawesome CSS -->
        <link rel="stylesheet" href="{{ asset('public/adminPanel/assets/css/line-awesome.min.css') }}">
		
		<!-- Chart CSS -->
		<link rel="stylesheet" href="{{ asset('public/adminPanel/assets/plugins/morris/morris.css') }}">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="{{ asset('public/adminPanel/assets/css/style.css') }}">
		
		<!-- Datatable CSS -->
		<link rel="stylesheet" href="{{ asset('public/adminPanel/assets/css/dataTables.bootstrap4.min.css') }}">
		<!-- CSS for sweetalert -->
		<link rel="stylesheet" href="{{ asset('public/adminPanel/assets/css/sweetalert.css') }}">
		<!-- Toaster -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

		<!-- CSS for select 2 -->
		<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

		
    </head>