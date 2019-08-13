<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Login</title>
</head>
<body>

<form method="post" action="{{ route('admin_login_submit')}}">

	{{csrf_field()}}

	<div>
		<input name="mobile">
	</div>

	<div>
		<input name="password">
	</div>

	{{$errors->first('mobile')}}

	<button type="submit">submit</button>

</form>

</body>
</html>
