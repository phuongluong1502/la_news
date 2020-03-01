<html><head><title>Trang quản trị</title>
  <link href="{{ asset('public/css/app.css') }}" rel="stylesheet" type="text/css" />
  <script src="{{ asset('public/js/app.js') }}" type="text/js"></script>
  <style> * { font-family:Times New Roman}</style>
</head>
<body>
	<div class="col-sm-12">
	  @if(session()->get('success'))
		<div class="alert alert-success">
		  {{ session()->get('success') }}  
		</div>
	  @endif
	</div>
   	<div class="col-sm-12">
	  @if(session()->get('success'))
		<div class="alert alert-success">
		  {{ session()->get('success') }}  
		</div>
	  @endif
  	</div>
  	<div>
		<a style="margin: 19px;" href="{{ route('theloai.create')}}" class="btn btn-primary"> Tạo thể loại </a>
	</div>  
 
  	<div class="container">
   	 @yield('main')
  	</div>  
</body></html>
