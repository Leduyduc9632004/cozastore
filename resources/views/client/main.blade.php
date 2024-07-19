<!DOCTYPE html>
<html lang="en">
<head>
	<title>@yield('title')</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	@include('client.others.links')
</head>
<body class="animsition">
	
@include('client.others.header')

		

<div class="">
	@yield('content')
</div>




@include('client.others.footer')
@include('client.others.script')

</body>
</html>