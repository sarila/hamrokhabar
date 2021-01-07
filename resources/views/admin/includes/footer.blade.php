		
		<!-- jQuery -->
        <script src="{{asset('public/adminPanel/assets/js/jquery-3.2.1.min.js')}}"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="{{asset('public/adminPanel/assets/js/popper.min.js')}}"></script>
        <script src="{{asset('public/adminPanel/assets/js/bootstrap.min.js')}}"></script>
		
		<!-- Slimscroll JS -->
		<script src="{{asset('public/adminPanel/assets/js/jquery.slimscroll.min.js')}}"></script>
		
		<!-- Chart JS -->
		<script src="{{asset('public/adminPanel/assets/plugins/morris/morris.min.js')}}"></script>
		<script src="{{asset('public/adminPanel/assets/plugins/raphael/raphael.min.js')}}"></script>
		<script src="{{asset('public/adminPanel/assets/js/chart.js')}}"></script>
		
		<!-- Custom JS -->
		<script src="{{asset('public/adminPanel/assets/js/app.js')}}"></script>
		<!-- Datatable JS -->
		<script src="{{ asset('public/adminPanel/assets/datatables/datatables.js') }}"></script>
		<script src="{{ asset('public/adminPanel/assets/datatables/DataTables-1.10.18/js/dataTables.bootstrap4.min.js') }}"></script>
		<!-- JS for sweet alert -->
		<script src="{{ asset('public/adminPanel/assets/js/sweetalert.min.js') }}"></script>
		<script src="{{ asset('public/adminPanel/assets/js/jquery.sweet-alert.custom.js') }}"></script>

		<!-- Tiny MCE Text Editor -->
		<script src="{{ asset('public/ckeditor/ckeditor.js') }}"></script>		
		<script>
			CKEDITOR.replace( 'description', {
			    filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
			    filebrowserUploadMethod: 'form'
			});
		</script>
	@yield('js')
		
    </body>
</html>